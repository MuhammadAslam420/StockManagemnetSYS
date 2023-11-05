<div class="main-panel"  wire:ignore>
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{ Session::get('message') }}</div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Avaialable Material's table</h4>
                        <p class="card-description">
                            Download <code> <a href="{{ route('allmaterial_excelsheet') }}"
                                    class="p-2 btn bg-success text-light"><i
                                        class="icon-paper menu-icon text-light p-1"></i>Material.xlsx</a> </code>

                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Slug
                                        </th>
                                        <th>
                                            Supplier
                                        </th>
                                        <th>
                                            Usage Progress Bar
                                        </th>
                                        <th>Total Qty</th>
                                        <th>Usage Qty</th>
                                        <th>
                                            Total Cost
                                        </th>
                                        <th>
                                            Total Weight
                                        </th>
                                        <th>
                                            Remaining Weight
                                        </th>
                                        <th>Expiry Date</th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                        <tr>
                                            <td>
                                                {{ $product->id }}
                                            </td>
                                            <td>
                                                {{ $product->name }}
                                            </td>
                                            <td>{{ $product->slug }}</td>
                                            <td>
                                                {{ $product->user->name }}
                                            </td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: {{ ($product->sale_quantity / 100) * $product->quantity }}%"
                                                        aria-valuenow="{{ $product->sale_quantity }}" aria-valuemin="0"
                                                        aria-valuemax="{{ $product->quantity }}"></div>
                                                </div>
                                            </td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->sale_quantity }}</td>
                                            <td>
                                                {{ $product->purchase_price * $product->quantity }}
                                            </td>
                                            <td>{{ $product->total_weight }}</td>
                                            <td>{{ $product->weight * $product->sale_quantity - $product->total_weight }}
                                            </td>

                                            <td>
                                                {{ $product->expiry_date }}
                                            </td>
                                            <td>
                                                <a href="{{ route('material-detail', ['id' => $product->id]) }}"
                                                    class="btn bg-info text-light p-2">Detail</a>
                                                <a href="{{ route('editmaterial', ['id' => $product->id]) }}"
                                                    class="btn bg-primary text-light">
                                                    Edit/Update
                                                </a>


                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn bg-danger text-light p-2" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    <i
                                                        class="icon-trash menu-icon"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete Material Parmanentely</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <h1 class="text-danger">Are You sure you want to delete this item.</h1>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="#" wier:click.prevent="deleteMaterial('{{ $product->id }}')" class="btn bg-danger text-light">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <img src="{{ asset('assets/images/no-records.png') }}"
                                                class="img-thumbnail" alt="no_record">
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                        <h2 class="card-title pt-3">Update Material Use By Production
                            Department</h2>
                        <div class="table-responsive pt-3">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>

                                        <th>
                                            Name
                                        </th>

                                        <th>Total Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="" class="forms-sample" wire:submit.prevent="updateMaterial">
                                        <tr>
                                            <td>
                                                <div class="form-group">
                                                    <label for="material_id">Product Name</label>
                                                    <select name="material_id" class="form-control" wire:model="material_id">
                                                        <option value="">Select Material</option>
                                                        @foreach ($products as $product )
                                                        <option value="{{ $product->id }}">{{ $product->name }},&nbsp;{{ $product->remaining_quantity }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </td>
                                            <td>    <div class="form-group">
                                                <label for="material_quantity">Quantity</label>
                                                <input type="text" class="form-control" id="material_quantity" name="material_quantity"
                                                    placeholder="0.00"  wire:model="material_quantity">

                                            </div></td>
                                            <td><button type="submit" class="btn bg-primary text-light mr-2">Update</button></td>

                                        </tr>
                                    </form>

                                </tbody>
                            </table>
                        </div>
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
<!-- Button trigger modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Material Use Production</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" wire:ignore>
            <form action="" class="forms-sample" wire:submit.prevent="updateMaterial">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="material_id">Product Name</label>
                            <select name="material_id" class="form-control" wire:model="material_id">
                                <option value="">Select Material</option>
                                @foreach ($products as $product )
                                <option value="{{ $product->id }}">{{ $product->name }},&nbsp;{{ $product->remaining_quantity }}</option>
                                @endforeach
                            </select>

                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="material_quantity">Quantity</label>
                            <input type="text" class="form-control" id="material_quantity" name="material_quantity"
                                placeholder="0.00"  wire:model="material_quantity">

                        </div>
                    </div>
                    <button type="submit" class="btn bg-primary text-light mr-2">Update</button>
                </div>

            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
