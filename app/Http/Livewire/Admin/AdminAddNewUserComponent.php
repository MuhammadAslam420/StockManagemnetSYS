<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAddNewUserComponent extends Component
{
    //use PasswordValidationRules;
    public $name;
    public $business_name;
    public $address;
    public $email;
    public $mobile;
    public $utype;
    public $password;
    public $password_confirmation;
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'email'=>'required',
            'mobile'=>'required',
            'utype'=>'required',
            'password'=>'required',

        ]);
    }
    public function addUser()
    {
        $this->validate([
                'name'=>'required',
                'email'=>'required',
                'mobile'=>'required',
                'utype'=>'required',
                'password'=>'required',

        ]);
       $user=new User();
       $user->name=$this->name;
       $user->business_name=$this->business_name;
       $user->address=$this->address;
       $user->email=$this->email;
       $user->mobile=$this->mobile;
       $user->utype=$this->utype;
       $user->password=Hash::make($this->password);
       $user->save();
       return redirect()->route('adduser')->with('message','user has been added');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-new-user-component')->layout('layouts.base');
    }
}
