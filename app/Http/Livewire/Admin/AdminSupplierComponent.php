<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Balance;
use Livewire\WithPagination;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Support\Facades\Auth;
use App\Models\Material;
use App\Models\EnSetting;
class AdminSupplierComponent extends Component
{
    use WithPagination;

    public function supplierBalancePdf($id)
    {
        $user=User::find($id);
        $setting=EnSetting::find(1);

        $customer = new Party([
            'name'          => Auth::user()->name,
            'address'       => $setting->address,
            'code'          => $setting->registration_no,
            'custom_fields' => [
                'order number' => 'HCI'.$user->id,
            ],
        ]);



        $item = (new InvoiceItem())->title($user->name)->pricePerUnit($user->id);
        $user=User::find($id);
        $invoice = Invoice::make()->template('supplierpdf')
             ->series('HCI')
             ->status(__($user->name.' Balance Payment History'))
             ->sequence($user->id)
            ->serialNumberFormat('{SEQUENCE}')
            ->buyer($customer)
            ->dateFormat('m/d/Y')
            ->currencySymbol('Rs')
            ->currencyCode('PKR')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint(',')
            ->addItem($item)
            ->filename($user->name)
            ->logo(public_path('assets/images/HIC.png'));
        return $invoice->stream();

    }
    public function render()
    {
        $users=User::where('utype','SUPPLIER')->paginate(12);
        return view('livewire.admin.admin-supplier-component',['users'=>$users])->layout('layouts.base');
    }
}
