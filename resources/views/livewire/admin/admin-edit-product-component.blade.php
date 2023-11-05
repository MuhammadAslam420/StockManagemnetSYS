
<div class="main-panel" wire:ignore>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                @if(Session::has('message'))
                <div class="alert bg-success text-light" role="alert">{{ Session::get('message') }}</div>

            @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update {{ $name }}</h4>

                        <form action="" class="forms-sample"  wire:submit.prevent="updateProduct">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Material Name" wire:model="name" wire:keyup="generateslug">
                                            @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <label for="sliug">Product Slug(Auto Generate)</label>
                                        <input type="text" class="form-control" id="sliug" name="slug"
                                            placeholder="Material Slug" wire:model="slug">
                                            @error('slug')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                            placeholder="0.0" wire:model="quantity">
                                            @error('quantity')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>
                                <div class="col-md-2">

                                    <div class="form-group">
                                        <label for="remaining_qty">Remaining Qty</label>
                                        <input type="text" class="form-control" id="remaining_qty" name="remaining_qty"
                                            placeholder="" wire:model="remaining_qty">
                                            @error('remaining_qty')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="color">Material Color</label>
                                        <select class="form-control form-control-lg" id="color" name="color" wire:model="color">
                                            <option value="">Select Material Color</option>
                                            <option value="green">Green</option>
                                            <option value="yellow">Yellow</option>
                                            <option value="blue">Blue</option>
                                            <option value="red">Red</option>
                                            <option value="white">White</option>
                                            <option value="orange">Orange</option>
                                        </select>
                                        @error('color')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="type">Material Type</label>
                                        <select class="form-control form-control-lg" id="type" name="type" wire:model="type">
                                            <option value="">Select Material Type</option>
                                            <option value="liquid">Liquid</option>
                                            <option value="solid">Solid</option>
                                            <option value="gas">Gas</option>
                                        </select>
                                        @error('type')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="stock">Stock Status</label>
                                        <select class="form-control form-control-lg" id="stock" name="stock" wire:model="stock">
                                            <option value="">Select Material Stock Status</option>
                                            <option value="instock">InStock</option>
                                            <option value="outoffstock">Out Off Stock</option>
                                        </select>
                                        @error('stock')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="weight">Weight</label>
                                        <input type="text" class="form-control" id="weight" name="weight"
                                            placeholder="0.0" wire:model="weight">
                                            @error('weight')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="total_weight">Total Weight</label>
                                        <input type="text" class="form-control" id="total_weight" name="total_weight"
                                            placeholder="0.0" wire:model="total_weight">
                                            @error('total_weight')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="remaining_weight">Remaining Weight</label>
                                        <input type="text" class="form-control" id="remaining_weight" name="remaining_weight"
                                            placeholder="0.0" wire:model="remaining_weight">
                                            @error('remaining_weight')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="unit">Unit</label>
                                        <select class="form-control form-control-lg" id="units" name="units" wire:model="units">
                                            <option value="">Select Material Measuring Unit</option>
                                            <option value="kg">kg</option>
                                            <option value="ltr">ltr</option>
                                        </select>
                                        @error('unit')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="packaging">Packaging Type</label>
                                        <select class="form-control form-control-lg" id="packaging" name="packaging" wire:model="packaging">
                                            <option value="">Select Material packaging</option>
                                            <option value="bag">bag</option>
                                            <option value="drum">drum</option>
                                            <option value="tin">Tin</option>
                                        </select>
                                        @error('packaging')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>
                            </div>
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="expiry_date">Material Expiry Date</label>
                                        <input type="date" class="form-control" id="expiry_date"
                                            name="expiry_date" placeholder="Material Expiry Date" wire:model="expiry_date">
                                            @error('expiry_date')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-12"><button type="submit" class="btn bg-primary text-light mr-2">Edit Material</button></div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    @livewire('admin.admin-footer-component')
    <!-- partial -->
</div>
