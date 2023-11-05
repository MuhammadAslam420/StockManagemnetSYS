<div class="main-panel" wire:ignore>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 ">
                @if (Session::has('message'))
                    <div class="alert bg-success text-light" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Update Setting</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="" wire:submit.prevent="updateSetting" enctype="multipart/form-data">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="newlogo" type="file" name="newlogo"
                                         wire:model="newlogo" />
                                         @if($logo)
                                         <img src="{{ asset('assets/images/HIC.png') }}" style="width:100px; " alt="logo">
                                         @endif
                                    <label for="logo" class="label-control">Business Logo</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="business_name" type="text" name="business_name"
                                        placeholder="Business Name" wire:model="business_name" />
                                    <label for="business_name" class="label-control">Business Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="text" name="email"
                                        placeholder="Product email" wire:model="email" />
                                    <label for="email" class="label-control">Email Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="mobile" type="text" name="mobile"
                                        placeholder="Mobile Number" wire:model="mobile" />
                                    <label for="mobile" class="label-control">Mobile</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="address" type="text" name="address"
                                        placeholder="User address" wire:model="address" />
                                    <label for="email" class="label-control">Business Address</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="contact" type="text" name="contact"
                                        placeholder="contact" wire:model="contact" />
                                    <label for="contact" class="label-control">Phone Number</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="registration_no" type="text" name="registration_no"
                                        placeholder="registration_no" wire:model="registration_no" />
                                    <label for="registration_no" class="label-control">Business Registration Number</label>
                                </div>


                                <div class="form-floating mb-3">
                                    <button type="submit" class="btn bg-success">Update Business SettingAdd New User</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @livewire('admin.admin-footer-component')

</div>
