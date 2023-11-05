<div class="main-panel" wire:ignore>
    <div class="content-wrapper">

        <div class="row">
            <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">Checkout</p>
                        <div class="row">
                            <div class="col-12">
                              <form action="" wire:submit.prevent="placeOrder">
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="users" class="label-control">Select Client</label>
                                        <select name="user_id" id="user_id" class="form-control" wire:model="user_id">
                                            <option value="">Select Client</option>
                                            @foreach ($users as $user )
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id') <span class="text-danger">{{$message}}</span>  @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="users" class="label-control">Select Address</label>
                                        <input type="text" name="address" id="address" class="form-control" wire:model="address">
                                        @error('address') <span class="text-danger">{{$message}}</span>  @enderror
                                    </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="users" class="label-control">Select Payment Method</label>
                                        <select name="payment" id="payment" class="form-control" wire:model="payment">
                                            <option value="">Select Payment Mode</option>
                                            <option value="COD">Cash On Delivery</option>
                                            <option value="HBL">Habib Bank Ltd</option>
                                            <option value="MCB">Muslim Commercial Bank</option>
                                            <option value="MBL">Mezzan Bank Ltd</option>
                                            <option value="UBL">United Bank Ltd</option>
                                            <option value="ABL">Allied Bank Ltd</option>
                                            <option value="EasyPaisa">Telenor EasyPaisa</option>
                                            <option value="Jazzcash">Moblink Jazzcash</option>

                                        </select>
                                        @error('payment') <span class="text-danger">{{$message}}</span>  @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="users" class="label-control">Select Due Date</label>
                                        <input type="date" name="payment_due_date" id="payment_due_date" class="form-control" wire:model="payment_due_date">
                                        @error('payment_due_date') <span class="text-danger">{{$message}}</span>  @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="users" class="label-control">Select Delivery Date</label>
                                        <input type="date" name="delivery_date" id="delivery_date" class="form-control" wire:model="delivery_date">
                                        @error('delivery_date') <span class="text-danger">{{$message}}</span>  @enderror
                                    </div>
                                </div>
                              </div>
                              <button type="submit" class="btn bg-primary text-light">Complete Order</button>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment Detail</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                          @if (Cart::instance('cart')->count() > 0)
                          <tr>
                            <td>SubTotal</td>
                            <td>{{ Cart::subtotal() }}</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>{{ Cart::tax() }}</td>
                        </tr>
                        <tr>
                            <td>Grand Total</td>
                            <td>{{ Cart::total() }}</td>
                        </tr>

                          @endif
                        </table>
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
