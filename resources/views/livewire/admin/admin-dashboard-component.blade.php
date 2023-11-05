<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12 grid-margin transparent">
                <div class="row">
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Today’s Orders</p>
                                <p class="fs-30 mb-2">{{ $ordertoday }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Orders</p>
                                <p class="fs-30 mb-2">{{ $orders->count() }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale">
                            <div class="card-body">
                                <p class="mb-4">Today’s Sale</p>
                                <p class="fs-30 mb-2">{{ $todaysale }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Sales</p>
                                <p class="fs-30 mb-2">{{ $sales }}</p>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Total Product</p>
                                <p class="fs-30 mb-2">{{ $products->count() }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Number of Clients</p>
                                <p class="fs-30 mb-2">{{ $clients }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-blue">
                            <div class="card-body">
                                <p class="mb-4">Number of Supplier</p>
                                <p class="fs-30 mb-2">{{ $buyers }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 mb-lg-0 stretch-card transparent">
                        <div class="card card-light-danger">
                            <div class="card-body">
                                <p class="mb-4">Number of Retrun Items</p>
                                <p class="fs-30 mb-2">{{ $retrun_items }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mt-4 mb-lg-0 stretch-card transparent">
                        <div class="card bg-success">
                            <div class="card-body">
                                <p class="mb-4 text-light">Total Purchasing Cost</p>
                                <p class="fs-30 mb-2 text-light">{{ $paid }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mt-4 mb-lg-0 stretch-card transparent">
                        <div class="card bg-success">
                            <div class="card-body">
                                <p class="mb-4 text-light">Payemnt Paid To Supplier</p>
                                <p class="fs-30 mb-2 text-light">{{ $paid_supplier }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mt-4 mb-lg-0 stretch-card transparent">
                        <div class="card bg-success">
                            <div class="card-body">
                                <p class="mb-4 text-light">Payemnt Have To Paid</p>
                                @if($payment)
                                <p class="fs-30 mb-2 text-light">{{ $payment->remaining_payment }}</p>
                                @else
                                <p class="fs-30 mb-2 text-light">0</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mt-4 mb-lg-0 stretch-card transparent">
                        <div class="card bg-warning">
                            <div class="card-body">
                                <p class="mb-4">Sale Remaining Payment</p>
                                @if($total_sale)
                                <p class="fs-30 mb-2">{{ $total_sale->remaining_payment }}</p>
                                @else
                                <p class="fs-30 mb-2 text-light">0</p>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mt-4 mb-lg-0 stretch-card transparent">
                        <div class="card bg-danger">
                            <div class="card-body">
                                <p class="mb-4">Total Business</p>
                                <p class="fs-30 mb-2">{{ $paid + $sales }}</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4  mt-4 mb-lg-0 stretch-card transparent">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <p class="mb-4">Return Item Cost</p>
                                <p class="fs-30 mb-2">{{ $retrun_cost }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Sale, Purchase & Balance Pdf Download</h2>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Today Ledger</th>
                                    <th>Last 7 Day's Ledger Report</th>
                                    <th>Last 15 Day's Ledger Report</th>
                                    <th>Till Date Ledger Report</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="{{ route('hic_pdf',['id'=>1]) }}" class="btn btn-default bg-success p-2 text-light"><i class="icon-paper menu-icon"></i></a></td>
                                    <td><a href="{{ route('hic_pdf',['id'=>2]) }}" class="btn btn-default bg-success p-2 text-light"><i class="icon-paper menu-icon"></i></a></td>
                                    <td><a href="{{ route('hic_pdf',['id'=>3]) }}" class="btn btn-default bg-success p-2 text-light"><i class="icon-paper menu-icon"></i></a></td>
                                    <td><a href="{{ route('hic_pdf',['id'=>4]) }}" class="btn btn-default bg-success p-2 text-light"><i class="icon-paper menu-icon"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
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
