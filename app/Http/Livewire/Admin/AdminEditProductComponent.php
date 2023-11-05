<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class AdminEditProductComponent extends Component
{
    public $product_id;
    public $name;
    public $slug;
    public $type;
    public $color;
    public $units;
    public $quantity;
    public $remaining_qty;
    public $packaging;
    public $weight;
    public $total_weight;
    public $remaining_weight;
    public $expiry_date;
    public $sale_quantity;
    public $stock;
    public function mount($id)
    {
        $this->product_id=$id;
        $product=Product::find($this->product_id);
       $this->name=$product->name;
       $this->slug=$product->slug;
       $this->type=$product->type;
       $this->color=$product->color;
       $this->units=$product->unit;
       $this->quantity=$product->quantity;
       $this->remaining_qty=$product->remaining_quantity;
       $this->packaging=$product->packaging;
       $this->weight=$product->weight;
       $this->total_weight=$product->total_weight;
       $this->remaining_weight=$product->remaining_weight;
       $this->expiry_date=$product->expiry_date;
       $this->sale_quantity=$product->sale_quantity;
       $this->stock=$product->stock;
    }
    public function updateProduct()
    {
        $product=Product::find($this->product_id);
       $product->name= $this->name;
       $product->slug= $this->slug;
       $product->color= $this->color;
       $product->type= $this->type;
       $product->quantity= $this->quantity;
       $product->weight= $this->weight;
       $product->unit= $this->units;
       $product->packaging= $this->packaging;
       $product->sale_quantity= $this->sale_quantity;
       $product->total_weight= $this->total_weight;
       $product->remaining_quantity= $this->remaining_qty;
       $product->remaining_weight= $this->remaining_weight;
       $product->stock= $this->stock;
       $product->expiry_date= $this->expiry_date;
       $product->save();
       return redirect()->route('products')->with('message','Product has been updated successfully');

    }
    public function render()
    {
        return view('livewire.admin.admin-edit-product-component')->layout('layouts.base');
    }
}
