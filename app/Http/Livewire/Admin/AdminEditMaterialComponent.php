<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Material;

class AdminEditMaterialComponent extends Component
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
    public $material_id;
    public $remaining_quantity;
    public $remaining_weight;
    public $total_weight;
    public function mount($id)
    {
        $this->material_id=$id;
        $material=Material::find($id);
       $this->name=$material->name;
       $this->slug=$material->slug;
       $this->color=$material->color;
       $this->type=$material->type;
       $this->packaging=$material->packaging;
       $this->weight=$material->weight;
       $this->quantity=$material->quantity;
       $this->stock=$material->stock;
       $this->unit=$material->unit;
       $this->expiry_date=$material->expiry_date;
       $this->payment_due_date=$material->payment_due_date;
       $this->remaining_quantity=$material->remaining_quantity;
       $this->remaining_weight=$material->remaining_weight;
       $this->total_weight=$material->total_weight;

    }

    public function editMaterial()
    {

        $material=Material::find($this->material_id);
       $material->name=$this->name;
       $material->slug=$this->slug;
       $material->color=$this->color;
       $material->type=$this->type;
       $material->quantity=$this->quantity;
       $material->weight=$this->weight;
       $material->unit=$this->unit;
       $material->packaging=$this->packaging;
       $material->total_weight=($this->quantity * $this->weight);
       $material->remaining_quantity=($this->remaining_quantity + ( $this->quantity - $this->remaining_quantity));
       $material->remaining_weight=($this->remaining_weight + (($this->quantity * $this->weight) - $this->remaining_weight));
       $material->stock=$this->stock;
       $material->expiry_date=$this->expiry_date;
       $material->payment_due_date=$this->payment_due_date;
       $material->save();
       return redirect()->route('allmaterials')->with('message','Material has been edited successfully');


    }
    public function render()
    {
        $suppliers=User::where('utype','SUPPLIER')->get();
        return view('livewire.admin.admin-edit-material-component',['suppliers'=>$suppliers])->layout('layouts.base');
    }
}
