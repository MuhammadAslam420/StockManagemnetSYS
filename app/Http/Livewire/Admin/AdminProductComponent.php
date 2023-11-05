<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
//use App\Imports\ImportUser;
use App\Exports\ExportProduct;
use App\Models\EnSetting;

class AdminProductComponent extends Component
{
    use WithPagination;
    public $product_id;

    public function productInvoice($product_id)
    {
        $product=Product::find($product_id);
        $client = new Party([
            'name'          => $product->user->name,
            'phone'         => $product->user->mobile,
            'email'         => $product->user->email,
            'custom_fields' => [
                'note'        => 'IDDQD',
                'business id' => '365#GG',
            ],
        ]);

        $setting=EnSetting::find(1);


        $customer = new Party([
            'name'          => Auth::user()->name,
            'address'       => $setting->address,
            'code'          => $setting->registration_no,
            'custom_fields' => [
                'order number' => 'HCI'.$product->id,
            ],
        ]);



        $item = (new InvoiceItem())->title($product->name)->pricePerUnit($product->purchase_price)->quantity($product->quantity)->units($product->unit);

        $invoice = Invoice::make()
             ->series('HCI')
             ->status(__($product->name.' <=invoice::Supplier=> '.$product->user->name))
             ->sequence($product->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->dateFormat('m/d/Y')
            ->currencySymbol('Rs')
            ->currencyCode('PKR')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->addItem($item)
            ->filename($client->name)
            ->logo(public_path('assets/images/HIC.png'));
        return $invoice->stream();
    }
    public function allProductInvoice()
    {
        return Excel::download(new ExportProduct, 'products.xlsx');

    }
    public function render()
    {
        $products=Product::paginate(5);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}
