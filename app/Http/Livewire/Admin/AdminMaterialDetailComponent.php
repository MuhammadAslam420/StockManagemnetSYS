<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Material;

class AdminMaterialDetailComponent extends Component
{
    public $product_id;
    public function mount($id)
    {
        $this->product_id=$id;
    }
    public function render()
    {
        $product=Material::find($this->product_id);
        //$orders=OrderItem::where('product_id',$this->product_id)->paginate(12);
        return view('livewire.admin.admin-material-detail-component',['product'=>$product])->layout('layouts.base');
    }
}
