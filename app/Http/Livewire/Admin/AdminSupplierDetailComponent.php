<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class AdminSupplierDetailComponent extends Component
{
    public $user_id;
    public function mount($id)
    {
        $this->user_id=$id;
    }
    public function render()
    {
        $user=User::find($this->user_id);
        return view('livewire.admin.admin-supplier-detail-component',['user'=>$user])->layout('layouts.base');
    }
}
