<div class="main-panel" wire:ignore>
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Add Product To Cart</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table  class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Product In Stock</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                          <tr>
                                            <form action="" wire:submit.prevent="store">

                                                <td>
                                                    <select name="product_id" id="product_id" wire:model="product_id" class="form-control">
                                                        <option value="">Available Product</option>
                                                        @foreach ($products as $product )
                                                        <option value="{{ $product->id }}">{{ $product->name }}&nbsp;({{ ($product->purchase_price) }})</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                   <input type="number" name="price" id="price" placeholder="0.00" class="form-control" wire:model="price">

                                                </td>
                                                <td>
                                                    <input type="number" name="qty" id="qty" placeholder="0.00" class="form-control" wire:model="qty">

                                                 </td>
                                                <td><button type="submit" class="btn bg-primary text-light">Add to Cart</button></td>
                                            </form>

                                        </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @livewire('admin.admin-footer-component')
    <!-- partial -->
</div>
