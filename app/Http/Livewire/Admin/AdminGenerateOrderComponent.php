<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\MyCart;
use Cart;
class AdminGenerateOrderComponent extends Component
{
    public $price;
    public $qty;
    public $product_id;
    public $user_id;
    public function store()
    {
        $addcart=new MyCart();
        $addcart->product_id=$this->product_id;
        $product=Product::find($this->product_id);
        $addcart->product_name=$product->name;
        $addcart->price=$this->price;
        $addcart->qty=$this->qty;
        $addcart->save();
        $mycart=MyCart::find($addcart->id);
        Cart::instance('cart')->add($mycart->product_id,$mycart->product_name,$mycart->qty,$mycart->price)->associate('App\Models\Product');
        $this->emitTo('admin.admin-cart-count-component','refreshComponent');
        session()->flash('success_message','Item added to Cart');
    }
    public function render()
    {
        $products=Product::all();
        return view('livewire.admin.admin-generate-order-component',['products'=>$products])->layout('layouts.base');
    }
}
