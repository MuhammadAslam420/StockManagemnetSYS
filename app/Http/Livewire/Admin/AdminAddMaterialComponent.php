<?php

namespace App\Http\Livewire\Admin;

use App\Models\SupplierBalance;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Material;
use App\Models\User;

class AdminAddMaterialComponent extends Component
{
    public $name;
    public $slug;
    public $price;
    public $badge_number;
    public $color;
    public $type;
    public $packaging;
    public $weight;
    public $quantity;
    public $supplier_id;
    public $stock;
    public $unit;
    public $expiry_date;
    public $payment_due_date;
    public function generateslug()
    {
        $this->slug =Str::slug($this->name,'-');
    }
    public function updated($field)
    {
        $this->validateOnly($field,[
        'name'=>'required',
        'slug'=>'required|unique:products',
        'badge_number'=>'required',
        'price'=>'numeric',
        'color'=>'required',
        'type'=>'required',
        'unit'=>'required',
        'packaging'=>'required',
        'stock'=>'required',
        'quantity'=>'required|numeric',
        'weight'=>'required|numeric',
        'supplier_id'=>'required',
        'expiry_date'=>'required|date'
    ]);
     }
    public function addProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:products',
            'badge_number'=>'required',
            'price'=>'numeric',
            'color'=>'required',
            'type'=>'required',
            'unit'=>'required',
            'packaging'=>'required',
            'stock'=>'required',
            'quantity'=>'required|numeric',
            'weight'=>'required|numeric',
            'supplier_id'=>'required',
            'expiry_date'=>'required|date'
        ]);
        $user=User::find($this->supplier_id);
      $product=new Material();
      $product->name=$this->name;
      $product->slug=$this->slug;
      $product->user_id=$this->supplier_id;
      $product->user_name=$user->name;
      $product->purchase_price=$this->price;
      $product->badge_number=$this->badge_number;
      $product->color=$this->color;
      $product->type=$this->type;
      $product->quantity=$this->quantity;
      $product->weight=$this->weight;
      $product->unit=$this->unit;
      $product->packaging=$this->packaging;
      $product->total_weight=($this->quantity * $this->weight);
      $product->remaining_quantity=$this->quantity;
      $product->remaining_weight=($this->quantity * $this->weight);
      $product->stock=$this->stock;
      $product->payment_due_date=$this->payment_due_date;
      $product->expiry_date=$this->expiry_date;
      $product->save();
      $supplier=new SupplierBalance();
      $supplier->user_id=$this->supplier_id;
      $supplier->notes=' Buy new material '.$this->name.' from supplier';
      $supplier->total_amount=$this->quantity * $this->price;
      $sup=SupplierBalance::where('user_id',$this->supplier_id)->latest()->first();
      $supplier->remaining_payment=$sup->remaining_payment + ($this->quantity * $this->price);
      $supplier->save();
      return redirect()->route('addmaterial')->with('message', 'New Product has been Saved!');

    }
    public function render()
    {
        $suppliers=User::where('utype','SUPPLIER')->orderBy('id','desc')->get();
        return view('livewire.admin.admin-add-material-component',['suppliers'=>$suppliers])->layout('layouts.base');
    }
}
