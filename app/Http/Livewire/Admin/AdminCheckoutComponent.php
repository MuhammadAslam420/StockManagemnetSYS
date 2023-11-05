<?php

namespace App\Http\Livewire\Admin;

use App\Models\Balance;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
class AdminCheckoutComponent extends Component
{


    public $user_id;
    public $address;
    public $payment;
    public $payment_due_date;
    public $delivery_date;
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'address'=>'required',
            'payment'=>'required',
            'payment_due_date'=>'required',
            'delivery_date'=>'required',
            'user_id'=>'required'

        ]);
    }

    public function placeOrder()
    {
        $this->validate([
            'address'=>'required',
            'payment'=>'required',
            'payment_due_date'=>'required',
            'delivery_date'=>'required',
            'user_id'=>'required'
        ]);
        $order = new Order();
        $order->user_id = $this->user_id;
        $order->subtotal=Cart::instance('cart')->subtotal();
        $order->total=Cart::instance('cart')->total();
        $order->tax=Cart::instance('cart')->tax();
        $order->status='pending';
        $order->address=$this->address;
        $order->payment_due_date=$this->payment_due_date;
        $order->delivery_date=$this->delivery_date;
        $order->gate_pass_id=Carbon::now()->timestamp;
        $order->save();
        foreach(Cart::instance('cart')->content() as $item)
        {
           $orderItem= new OrderItem();
           $orderItem->order_id=$order->id;
           $orderItem->product_id= $item->id;
           $orderItem->price=$item->price;
           $orderItem->quantity=$item->qty;
           $product=Product::find($item->id);
           $orderItem->weight=($item->qty * $product->weight);
           $product->sale_quantity=($product->sale_quantity + $item->qty);
           $product->remaining_quantity=($product->remaining_quantity - $item->qty);
           $product->remaining_weight=($product->remaining_weight   - ($item->qty * $product->weight));
           $product->save();
           $orderItem->save();

        }
        $transaction = new Transaction();
        $transaction->order_id=$order->id;
        $transaction->payment_mode=$this->payment;
        $transaction->status='pending';
        $transaction->payment_due_date=$this->payment_due_date;
        $transaction->save();
        $balance=new Balance();
        $balance->user_id=$this->user_id;
        $balance->notes='Buy new items';
        $bal=Balance::where('user_id',$this->user_id)->latest()->first();
        $balance->remaining_payment=$bal->remaining_payment + (Cart::instance('cart')->total());
        $balance->save();
        $this->resetcart();
        // $this->orderConfirmationMail($order);

    }
    public function resetcart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();

    }

    public function orderConfirmationMail($order){
      Mail::to($order->email)->send(new OrderConfirmation($order));

    }
    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
        return redirect()->route('login');
    }
    else if($this->thankyou)
    {
        return redirect()->route('orders');
    }

}




    public function render()
    {
        $this->verifyForCheckout();
        $users=User::where('utype','CLIENT')->get();
        return view('livewire.admin.admin-checkout-component',['users'=>$users])->layout('layouts.base');
    }
}
