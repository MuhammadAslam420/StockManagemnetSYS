<div class="main-panel" wire:ignore>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                @if(Session::has('message'))
                <div class="alert bg-success text-light" role="alert">{{ Session::get('message') }}</div>

            @endif
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Retrun Item</h4>
                        <form action="" class="forms-sample"  wire:submit.prevent="addReturnItem">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="order_id">Order ID</label>
                                        <input type="text" class="form-control" id="order_id" name="order_id"
                                            placeholder="badge number" wire:model="order_id">
                                            @error('order_id')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price">Qunatity</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                            placeholder="0.0" wire:model="quantity">
                                            @error('price')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="weight">Weight</label>
                                        <input type="text" class="form-control" id="weight" name="weight"
                                            placeholder="0.0" wire:model="weight">
                                            @error('weight')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price">Retrun Price</label>
                                        <input type="text" class="form-control" id="price" name="price"
                                            placeholder="0.0" wire:model="price">
                                            @error('price')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>



                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="reason">Reason of return</label>
                                        <textarea type="text" class="form-control" id="reason" name="reason"
                                            placeholder="Item Return reason" wire:model="reason"></textarea>
                                            @error('reason')<p class="text-danger">{{$message}}</p>@enderror
                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn bg-primary text-light mr-2">Add Return Item</button>

                        </form>
                        <h2 class="card-title pt-2">Retrun Items Table</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>OrderId</th>
                                    <th>Item</th>
                                    <th>Return Client</th>
                                    <th>Qty</th>
                                    <th>Weight</th>
                                    <th>Return Price</th>
                                    <th>Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @forelse ($items as $item )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->product->name }}</td>
                                    @php
                                    $order=DB::table("orders")->where('id',$item->order_id)->first();
                                    $user=DB::table('users')->find($order->user_id);
                                    @endphp
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->weight }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->reason }}</td>
                                </tr>
                                @empty
                                <tr><img src="{{ asset('assets/images/no-records.png') }}" class="img-fluid" alt=""></tr>

                                @endforelse
                            </tbody>
                        </table>
                        {{ $items->links() }}
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
