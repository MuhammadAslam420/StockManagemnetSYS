<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Material;
use Livewire\WithPagination;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Models\EnSetting;
//use App\Imports\ImportUser;
use App\Exports\ExportMaterial;
class AdminMaterialComponent extends Component
{
    use WithPagination;
    public $product_id;
    public $material_id;
    public $material_quantity;


    public function productInvoice($product_id)
    {
        $product=Material::find($product_id);
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
    public function allMaterialSheet()
    {
        return Excel::download(new ExportMaterial, 'material.xlsx');

    }
    public function deleteMaterial($id)
    {
        $material=Material::find($id);
        $material->delete();
        return redirect()->route('allmaterials')->with('message','Item Has Benn deleted successfully');
    }
    public function updateMaterial()
    {
        $material=Material::find($this->material_id);
        //dd($material);
        $material->sale_quantity=$material->sale_quantity + $this->material_quantity;
        $material->remaining_quantity=$material->remaining_quantity - $this->material_quantity;
        $material->remaining_weight=$material->remaining_weight - ($material->weight * $this->material_quantity);
        $material->save();
        return redirect()->route('allmaterials')->with('message','Material has been minus from stock for product purpose');
    }
    public function render()
    {
        $products=Material::paginate(5);
        $suppliers=User::where('utype','SUPPLIER')->orderBy('id','desc')->get();
        return view('livewire.admin.admin-material-component',['products'=>$products,'suppliers'=>$suppliers])->layout('layouts.base');
    }
}
