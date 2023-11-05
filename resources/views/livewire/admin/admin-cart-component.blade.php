<div class="main-panel" wire:ignore>
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Product In Cart</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table  class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ProductID</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>SubTotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                         @if(Cart::instance('cart')->count() > 0)
                                         @foreach (Cart::instance('cart')->content() as $item )
                                          <tr>
                                            <td>{{ $item->model->id }}</td>
                                            <td>{{ $item->model->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>
                                                <div class="quantity-input">
                                                    <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120" pattern="[0-9]*" style="width:50px;border-radius:8px;">
                                                    <a class="btn btn-success p-2" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')">+</a>
                                                    <a class="btn btn-danger p-2" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')">-</a>
                                                </div>
                                                </td>
                                                <td>{{ Cart::subtotal() }}</td>
                                            <td><a href="#"  wire:click.prevent="destroy('{{$item->rowId}}')">Delete</a></td>
                                            </tr>
                                         @endforeach
                                         @else
                                         <img src="{{ asset('assets/images/no-records.png') }}" class="img-thumbnail" alt="">
                                         @endif


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>
                                                    <a href="{{ route('checkout') }}" class="btn bg-primary text-white pull-right">CheckOut</a>
                                                </td>
                                            </tr>
                                        </tfoot>
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
