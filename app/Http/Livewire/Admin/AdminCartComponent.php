<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\MyCart;
use Cart;

class AdminCartComponent extends Component
{
    public $havecouponCode;
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $totalAfterDiscount;
    public $taxAfetrDiscount;

    public function increaseQuantity($rowId){
        $product =Cart::instance('cart')->get($rowId);
        $qty =$product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('admin.admin-cart-count-component','refreshComponent');


    }
    public function decreaseQuantity($rowId){
        $product =Cart::instance('cart')->get($rowId);
        $qty =$product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('admin.admin-cart-count-component','refreshComponent');


    }
    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('admin.admin-cart-count-component','refreshComponent');

        session()->flash('warning_msg','Product has been removed from Cart successfully');


    }
    public function destroyAll(){
        Cart::destroy();
        $this->emitTo('admin.admin-cart-count-component','refreshComponent');


    }
    public function render()
    {

        return view('livewire.admin.admin-cart-component')->layout('layouts.base');
    }
}
