<?php

namespace App\Http\Livewire\Admin;
use PDF;
use App\Models\Order;
use Livewire\Component;

class AdminOrderPdfComponent extends Component
{
    public function generatePDF($order)
    {
      $order=Order::find($order);
      $data=[
        'order_id'=>$order->id,
        'date'=>$order->created_at,
        'delivery'=>$order->delivery_date,
        'gatepass'=>$order->gate_pass_id,
        'gatepassstatus'=>$order->gate_pass,
        'due_date'=>$order->payment_due_date,
        'buyer_id'=>$order->user_id
      ];

        $pdf = PDF::loadView('livewire.admin.admin-order-pdf-component', $data);

        return $pdf->download('HIC.pdf');
    }
    public function render()
    {

        return view('livewire.admin.admin-order-pdf-component');
    }
}
