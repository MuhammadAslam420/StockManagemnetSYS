<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Livewire\WithPagination;
use Carbon\Carbon;
class AdminOrderDispatchComponent extends Component
{
    use WithPagination;
    public $order_id;
    public $status;
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
        return redirect()->route('dispatchorders')->with('message','Status Has Been Changed Successfully');

    }
    public function render()
    {
        $orders=Order::where('status','dispatch')->paginate(12);
        return view('livewire.admin.admin-order-dispatch-component',['orders'=>$orders])->layout('layouts.base');
    }
}
