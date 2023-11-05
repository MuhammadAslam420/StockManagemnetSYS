<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\GatePass;
use App\Models\Order;
class AdminGatePassComponent extends Component
{
    public $gate_pass;
    public $order_id;
    public $receiver_name;
    public $nic;
    public $vehicle_number;
    public function mount($id)
    {
        $this->order_id=$id;
    }
    public function createGatePass()
    {
        $order=Order::find($this->order_id);
       $gatepass=new GatePass();
       $gatepass->order_id=$order->id;
       $gatepass->gate_pass=$order->gate_pass_id;
       $gatepass->receiver_name=$this->receiver_name;
       $gatepass->nic=$this->nic;
       $gatepass->vehicle_number=$this->vehicle_number;
       $gatepass->save();
       $order->gate_pass='issue';
       $order->save();
       return redirect()->route('orders')->with('message','gatepass has been generated successfully');
    }
    public function render()
    {

        return view('livewire.admin.admin-gate-pass-component')->layout('layouts.base');
    }
}
