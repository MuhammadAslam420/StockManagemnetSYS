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
                                                <p class="mb-2 mb-xl-0 text-danger">Supplier:&nbsp;{{ $product->user_name }}</p>
                                                <p class="mb-2 mb-xl-0 text-danger">Payment Due Date:&nbsp;{{ $product->payment_due_date }}</p>
                                                <p class="mb-2 mb-xl-0 text-danger">Expiry Date:&nbsp;{{ $product->expiry_date }}</p>
                                                <h1 class="text-success">Use Quantity:&nbsp;{{ $product->sale_quantity }}</h1>
                                                <h1 class="text-success">Usage Metrial Cost:&nbsp;{{ $product->sale_quantity * $product->purchase_price }}</h1>
                                                <h1 class="text-success">Remaining Quantity:&nbsp;{{ $product->remaining_quantity}} </h1>
                                                <h1 class="text-success">Remaining Weight:&nbsp;{{ $product->remaining_weight}} </h1>
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
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @livewire('admin.admin-footer-component')
    <!-- partial -->
</div>
