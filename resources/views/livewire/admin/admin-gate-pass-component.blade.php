<div class="main-panel" wire:ignore>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 ">
                @if (Session::has('message'))
                    <div class="alert bg-success text-light" role="alert">{{ Session::get('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Generate Gate Pass</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <form action="" wire:submit.prevent="createGatePass">
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="receiver_name" type="text" name="receiver_name"
                                        placeholder="Receiver Name" wire:model="receiver_name" />
                                    <label for="receiver_name" class="label-control">Receiver Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="nic" type="text" name="nic"
                                        placeholder="Receiver Name" wire:model="nic" />
                                    <label for="nic" class="label-control">receiver NIC</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="vehicle_number" type="text" name="vehicle_number"
                                        placeholder=" vehicle number" wire:model="vehicle_number" />
                                    <label for="vehicle_number" class="label-control">Vehicle Number</label>
                                </div>


                                <div class="form-floating mb-3">
                                    <button type="submit" class="btn bg-success">Generate Gate Pass</button>
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
