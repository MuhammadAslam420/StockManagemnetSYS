<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Carbon\Carbon;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\EnSetting;
class AdminOrderComponent extends Component
{
    use WithPagination;
    public $order_id;
    public $status;
    public $order;

    public function orderInvoice($order)
    {
        $order=Order::find($order);
        $user=User::find($order->user_id);
        $client = new Party([
            'name'          => $user->name,
            'phone'         => $user->mobile,
            'email'         => $user->email,
        ]);
        $setting=EnSetting::find(1);


        $customer = new Party([
            'name'          => Auth::user()->name,
            'address'       => $setting->address,
            'code'          => $setting->registration_no,
            'custom_fields' => [
                'order number' => 'HCI'.$order->id,
            ],
        ]);



           foreach($order->orderItems as $itm)
         {
             $items = (new InvoiceItem())->title($itm->product->name)->pricePerUnit($itm->price)->quantity($itm->quantity);

         }
        $invoice = Invoice::make()->template('order')
             ->series('HCI')
             ->status(__('HIC Order Invoice No: '.$order->id))
             ->sequence($order->id)
            ->serialNumberFormat('{SEQUENCE}')
            ->seller($client)
            ->buyer($customer)
            ->date(now()->addWeeks(1))
            ->dateFormat('m/d/Y')
            ->currencySymbol('Rs')
            ->currencyCode('PKR')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->addItem($items)
            ->filename('HIC_Order_Invoice_No_'.$order->id)
            ->logo(public_path('assets/images/HIC.png'));
        return $invoice->stream();
    }
    public function statusChange($order_id,$status)
    {
        $order=Order::find($order_id);
        $order->status=$status;
        if($status === 'delivered')
        {
            $order->deliver_date=Carbon::today();
        }elseif($status === 'canceled')
        {
              $order->cancel_date=Carbon::today();
        }
        $order->save();
        session()->flash('message','status has been changed');
        return redirect()->route('orders')->with('message','Status Has Been Changed Successfully');

    }
    public function render()
    {
        $orders=Order::paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}
