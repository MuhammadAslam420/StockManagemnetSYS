<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminCartCountComponent extends Component
{
    protected $listeners = ['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.admin.admin-cart-count-component');
    }
}
