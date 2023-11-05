<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\ReturnItem;
use App\Models\SupplierBalance;
use App\Models\Balance;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Support\Facades\Auth;

class AdminDashboardComponent extends Component
{

    public function hicPdf($id)
    {

        $customer = Invoice::makeParty([
            'name' => $id,
        ]);

        $item = Invoice::makeItem('Your service or product title')->pricePerUnit($id);

        return Invoice::make()->template('hic')->buyer($customer)->addItem($item)->filename('HIC Financial Report')
        ->logo(public_path('assets/images/HIC.png'))->stream();
    }
    public function render()
    {
        $ordertoday=Order::where('created_at',today())->count();
        $orders=Order::all();
        $clients=User::where('utype','CLIENT')->count();
        $sales=Order::sum('total');
        $todaysale=Order::where('created_at',today())->sum('total');
        $products=Product::all();
        $buyers=User::where('utype','SUPPLIER')->count();
        $retrun_items=ReturnItem::count();
        $paid=SupplierBalance::sum('total_amount');
        $paid_supplier=SupplierBalance::sum('withdraw_amount');
        $payment=SupplierBalance::latest()->first();
        $total_sale=Balance::latest()->first();
        $retrun_cost=ReturnItem::sum('price');
        return view('livewire.admin.admin-dashboard-component',['orders'=>$orders,
        'clients'=>$clients,'sales'=>$sales,'ordertoday'=>$ordertoday,'todaysale'=>$todaysale,'products'=>$products,
        'buyers'=>$buyers,'retrun_items'=>$retrun_items,'paid'=>$paid,'paid_supplier'=>$paid_supplier,'payment'=>$payment,
        'total_sale'=>$total_sale,'retrun_cost'=>$retrun_cost])->layout('layouts.base');

    }
}
