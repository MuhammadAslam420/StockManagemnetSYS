<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\OrderItem;
use Livewire\WithPagination;
class AdminProductDetailComponent extends Component
{
    public $product_id;
    public function mount($id)
    {
        $this->product_id=$id;
    }
    public function render()
    {
        $product=Product::find($this->product_id);
        $orders=OrderItem::where('product_id',$this->product_id)->paginate(12);
        return view('livewire.admin.admin-product-detail-component',['product'=>$product,'orders'=>$orders])->layout('layouts.base');
    }
}
