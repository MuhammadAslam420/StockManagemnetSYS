<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminAddProductComponent extends Component
{
    public $name;
    public $slug;
    public $production_cost;
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
        'production_cost'=>'numeric',
        'color'=>'required',
        'type'=>'required',
        'unit'=>'required',
        'packaging'=>'required',
        'stock'=>'required',
        'quantity'=>'required|numeric',
        'weight'=>'required|numeric',
        'expiry_date'=>'required|date'
    ]);
     }
    public function addProduct()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:products',
            'badge_number'=>'required',
            'production_cost'=>'numeric',
            'color'=>'required',
            'type'=>'required',
            'unit'=>'required',
            'packaging'=>'required',
            'stock'=>'required',
            'quantity'=>'required|numeric',
            'weight'=>'required|numeric',

            'expiry_date'=>'required|date'
        ]);
      $product=new Product();
      $product->name=$this->name;
      $product->slug=$this->slug;
      $product->production_cost=$this->production_cost;
      $product->badge_number=$this->badge_number;
      $product->color=$this->color;
      $product->type=$this->type;
      $product->quantity=$this->quantity;
      $product->weight=$this->weight;
      $product->unit=$this->unit;
      $product->packaging=$this->packaging;
      $product->remaining_quantity=$this->quantity;
      $product->total_weight=($this->quantity * $this->weight);
      $product->stock=$this->stock;
      $product->expiry_date=$this->expiry_date;
      $product->save();
      return redirect()->route('products')->with('message', 'New Product has been Saved!');

    }
    public function render()
    {
        $suppliers=User::where('utype','SUPPLIER')->orderBy('id','desc')->get();
        return view('livewire.admin.admin-add-product-component',['suppliers'=>$suppliers])->layout('layouts.base');
    }
}
