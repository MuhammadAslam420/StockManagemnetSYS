<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ReturnItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Livewire\WithPagination;

class AdminReturnItemComponent extends Component
{
    use WithPagination;
    public $user_id;
    public $product_id;
    public $order_id;
    public $quantity;
    public $weight;
    public $reason;
    public $price;
    public $gate_pass_id;

    public function addReturnItem()
    {
        $order=Order::find($this->order_id);
        $itm=OrderItem::where('order_id',$this->order_id)->first();
        $item=new ReturnItem();
        $item->order_id=$this->order_id;
        $item->product_id=$itm->product_id;
        $item->quantity=$this->quantity;
        $item->weight=$this->weight;
        $item->price=$this->price;
        $item->gate_pass_id=$order->gate_pass_id;
        $item->reason=$this->reason;
        $item->save();
        return redirect()->route('admin.retrunItem')->with('message','Added Item');

    }
    public function render()
    {
        $users=User::where('utype','CLIENT')->get();
        $items=ReturnItem::paginate(12);
        return view('livewire.admin.admin-return-item-component',['users'=>$users,'items'=>$items])->layout('layouts.base');
    }
}
