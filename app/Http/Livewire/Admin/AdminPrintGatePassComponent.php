<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\Order;
use App\Models\GatePass;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminPrintGatePassComponent extends Component
{
    public $order;
    public function mount($order_id)
    {
        //dd($id);
        $this->order=$order_id;
    }
    public function printGatePass($order_id)
    {
        //dd($order_id);
        $gate=GatePass::where('order_id',$order_id)->first();
        $order=Order::find($order_id);
        //dd($order,$gate);
        $user=User::find($order->user_id);
        $client = new Party([
            'name'          => $user->name,
            'phone'         => $user->mobile,
            'email'         => $user->email,
        ]);
        $customer = new Party([
            'name'          => Auth::user()->name,
            'address'       => 'Industrial Estate Sher Shah Road Multan',
            'code'          => '#22663214',
            'custom_fields' => [
                'order number' => 'HIC'.$order->id,
            ],
        ]);



           foreach($order->orderItems as $itm)
         {
             $items = (new InvoiceItem())->title($itm->product->name)->pricePerUnit($itm->price)->quantity($itm->quantity);

         }
        $invoice = Invoice::make()->template('gatepass')
             ->series('HCI')
             ->status(__('GatePass Number: '.$order->gate_pass_id))
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
            ->filename('HIC_Gate_Pass_Of_Order_'.$order->id)
            ->logo(public_path('assets/images/HIC.png'));
        return $invoice->stream();

    }
    public function render()
    {
        return view('livewire.admin.admin-print-gate-pass-component');
    }
}
