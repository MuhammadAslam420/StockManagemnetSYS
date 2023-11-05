<div class="main-panel" wire:ignore>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 ">
                @if (Session::has('message'))
                    <div class="alert bg-success text-light" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create New User</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="" wire:submit.prevent="addUser">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="name" type="text" name="name"
                                        placeholder="User Name" wire:model="name" />
                                    <label for="name" class="label-control">User Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="business_name" type="text" name="business_name"
                                        placeholder="Business Name" wire:model="business_name" />
                                    <label for="name" class="label-control">Business Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="email" type="text" name="email"
                                        placeholder="Product email" wire:model="email" />
                                    <label for="email" class="label-control">User Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="mobile" type="text" name="mobile"
                                        placeholder="Mobile Number" wire:model="mobile" />
                                    <label for="mobile" class="label-control">Mobile</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="address" type="text" name="address"
                                        placeholder="User address" wire:model="address" />
                                    <label for="email" class="label-control">User Address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <Select class="form-control" name="utype" wire:model="utype">
                                        <option value="">Select User Type</option>
                                        <option value="ADMIN">System User</option>
                                        <option value="SUPPLIER">Supplier</option>
                                        <option value="CLIENT">Client</option>
                                    </Select>
                                    <label for="supplier" class="label-control">User Type</label>
                                </div>


                                <div class="form-floating mb-3">
                                    <input class="form-control" id="password" type="password" name="password"
                                        placeholder="password" wire:model="password" />
                                    <label for="password" class="label-control">Set Password</label>
                                </div>


                                <div class="form-floating mb-3">
                                    <button type="submit" class="btn bg-success">Add New User</button>
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
