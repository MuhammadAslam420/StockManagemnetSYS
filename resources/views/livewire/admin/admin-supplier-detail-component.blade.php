<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{ Auth::user()->name }}</h3>
                        <span>View Detail Balance Sheet And History of {{ $user->name }}</span>

                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $user->name }} Balance Table</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tabl-stripped">
                        <tbody>
                            <tr>
                                <td>Supplier Name:</td>
                                <td>{{ $user->name }}</td>
                                <td>Email:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Contact Number:</td>
                                <td>{{ $user->mobile }}</td>
                                <td>Address:</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                @php
                                    $balances = DB::table('supplier_balances')
                                        ->where('user_id', $user->id)
                                        ->get();
                                    $total_payment = DB::table('supplier_balances')
                                        ->where('user_id', $user->id)
                                        ->sum('total_amount');
                                    $total_payment_paid = DB::table('supplier_balances')
                                        ->where('user_id', $user->id)
                                        ->sum('withdraw_amount');
                                    //$total_payment_remaining=DB::table('supplier_balances')->where('user_id',$user->id)->latest()->first();
                                @endphp
                                <td>Total Item Purchase Cost:</td>
                                <td>{{ $total_payment }}</td>
                                <td>Total Payment Paid:</td>
                                <td>{{ $total_payment_paid }}</td>
                            </tr>

                        </tbody>
                    </table>
                    <br>
                    <table class="table table-stripped">
                        <h2 class="card-title">Balance History</h2>
                        <thead>
                            <tr>
                                <td>#</td>
                                <th>ID</th>
                                <th>Note</th>
                                <th>Amount</th>
                                <th>Transfer Amount</th>
                                <th>Transfer Date</th>
                                <th>Remaining Payment</th>
                                <th>Till Date Transfer</th>
                                <th>Created Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($balances as $balance)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $balance->id }}</td>
                                    <td>{{ $balance->notes }}</td>
                                    <td>{{ $balance->total_amount }}</td>
                                    <td>{{ $balance->withdraw_amount }}</td>
                                    <td>{{ $balance->withdraw_date }}</td>
                                    <td>{{ $balance->remaining_payment }}</td>
                                    <td>{{ $balance->total_withdraw }}</td>
                                    <td>{{ $balance->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    <table class="table table-bordered">
                        <h2 class="card-title">Material Purchase History</h2>
                        <thead>
                            <tr>
                                <td>#</td>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Badge Number</th>
                                <th>Quantity</th>
                                <th>Price Per Piece</th>
                                <th>Total Cost</th>
                                <th>Per Piece Weight</th>
                                <th>total Weight</th>
                                <th>Payment due Date</th>
                                <th>expiry Date</th>
                                <th>Purchase Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($user->materials as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->badge_number }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->purchase_price }}</td>
                                    <td>{{ $product->quantity * $product->purchase_price }}</td>
                                    <td>{{ $product->weight }}</td>
                                    <td>{{ $product->total_weight }}</td>
                                    <td>{{ $product->payment_due_date }}</td>
                                    <td>{{ $product->expiry_date }}</td>
                                    <td>{{ $product->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @livewire('admin.admin-footer-component')
    <!-- partial -->
</div>
