<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\EnSetting;
use Livewire\WithFileUploads;
use Carbon\Carbon;
class AdminSettingComponent extends Component
{
    use WithFileUploads;
    Public $business_name;
    Public $logo;
    Public $mobile;
    Public $email;
    Public $address;
    Public $contact;
    Public $registration_no;
    public $newlogo;
    public function mount()
    {
       $setting=EnSetting::where('id',1)->first();
       $this->business_name=$setting->name;
       $this->logo=$setting->logo;
       $this->mobile=$setting->mobile;
       $this->email=$setting->email;
       $this->address=$setting->address;
       $this->contact=$setting->contact;
       $this->registration_no=$setting->registration_no;
    }
    public function updateSetting()
    {
        $setting=EnSetting::find(1);
       $setting->name=$this->business_name;
       if($this->newlogo)
       {
        $imgName =Carbon::now()->timestamp.'.'.$this->newlogo->extension();
        $this->newlogo->storeAs('assets/images',$imgName);

       }
       $setting->logo=$imgName;
       $setting->mobile=$this->mobile;
       $setting->email=$this->email;
       $setting->address=$this->address;
       $setting->contact=$this->contact;
       $setting->registration_no=$this->registration_no;
       $setting->save();
       return redirect()->route('setting')->with('message','Setting has been Updated');

    }

    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
