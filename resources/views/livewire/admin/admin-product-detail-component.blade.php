<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Welcome {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You are viewing Detail <span
                                class="text-primary">of &nbsp;{{ $product->name }}</span></h6>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card position-relative">
                    <div class="card-body">
                        <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2"
                            data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-6 d-flex flex-column justify-content-start">
                                            <div class="ml-xl-4 mt-3">
                                                <p class="card-title">Detailed Report {{ $product->name }}</p>
                                                <h1 class="text-primary">Quantity:&nbsp;{{ $product->quantity }}</h1>
                                                <h1 class="text-primary">Per Item Price:&nbsp;{{ $product->purchase_price }}</h1>
                                                <h1 class="text-primary">Weight:&nbsp;{{ $product->weight }}</h1>
                                                <h1 class="text-primary">Unit:&nbsp;{{ $product->unit }}</h1>
                                                <h1 class="text-primary">Total Weight:&nbsp;{{ $product->weight * $product->quantity }}&nbsp;{{ $product->unit }}</h1>
                                                <h1 class="text-primary">Type:&nbsp;{{ $product->type }}</h1>
                                                <h1 class="text-primary">Color:&nbsp;{{ $product->color }}</h1>
                                                <h1 class="text-primary">SKU:&nbsp;{{ $product->badge_number }} </h1>
                                                <p class="mb-2 mb-xl-0 text-danger">Supplier:&nbsp;{{ $product->user->name }}</p>
                                                <p class="mb-2 mb-xl-0 text-danger">Expiry Date:&nbsp;{{ $product->expiry_date }}</p>
                                                <h1 class="text-success">Sale Quantity:&nbsp;{{ $product->sale_quantity }}</h1>
                                                <h1 class="text-success">Earn:&nbsp;{{ $product->sale_quantity * $product->purchase_price }}</h1>
                                                <h1 class="text-success">Remaining Quantity:&nbsp;{{ $product->remaining_quantity}} </h1>
                                                <h1 class="text-success">Remaining Weight:&nbsp;{{ $product->remaining_weight}} </h1>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-xl-6">
                                            <div class="row">
                                                <div class="col-md-12 border-right">
                                                    <div class="table-responsive mb-3 mb-md-0 mt-3">
                                                        <table class="table table-borderless report-table">
                                                            @php
                                                            $items=DB::table("order_items")->where('product_id',$product->id)->get();
                                                            @endphp
                                                            @forelse ($items as $item )
                                                            <tr>
                                                                @php
                                                                $user=DB::table('users')->where('id',$item->user_id)->where('utype','CLIENT')->first();
                                                                @endphp
                                                                <td class="text-muted">{{ $user->name }}</td>
                                                                <td class="w-100 px-0">
                                                                    <div class="progress progress-md mx-4">
                                                                        <div class="progress-bar bg-primary"
                                                                            role="progressbar" style="width: {{ (($item->quantity)/100) * ($product->quantity)}}%"
                                                                            aria-valuenow="{{ $item->quantity }}" aria-valuemin="0"
                                                                            aria-valuemax="{{ $product->quantity }}"></div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h5 class="font-weight-bold mb-0">{{ $item->quantity * $item->price }}</h5>
                                                                </td>
                                                            </tr>

                                                            @empty
                                                            <tr>
                                                              <img src="{{ asset('assets/images/no-records.png') }}" class="img-thumbnail" alt="">
                                                            </tr>
                                                            @endforelse

                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title">{{ $product->name }}&nbsp; Sale Table</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="display expandable-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Order#</th>
                                                <th>Buyer Name</th>
                                                <th>Order Status</th>
                                                <th>Payemnt Method</th>
                                                <th>Due Date</th>
                                                <th>Sale Price</th>
                                                <th>Sale Quantity</th>
                                                <th>Total Sale Price</th>
                                                <th>Profit</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($orders as $order )
                                             <tr>
                                                <td>{{ $order->order_id }}</td>
                                                @php
                                                $client=DB::table('orders')->where('id',$order->order_id)->first();
                                                $user=DB::table('users')->find($client->user_id);
                                                @endphp
                                                <td>{{ $user->name }}</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>{{ $order->price }}</td>
                                                <td>{{ $order->quantity }}</td>
                                                <td>{{ $order->price * $order->quantity }}</td>
                                                <td>{{ ($order->price * $order->quantity) - ($product->purchase_price * $order->quantity) }}</td>
                                             </tr>
                                            @empty
                                            <tr>
                                                <img src="{{ asset('assets/images/no-records.png') }}" class="img-fluid" alt="">
                                            </tr>
                                            @endforelse
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
