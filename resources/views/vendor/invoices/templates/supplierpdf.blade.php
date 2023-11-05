<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $invoice->name }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style type="text/css" media="screen">
            html {
                font-family: sans-serif;
                line-height: 1.15;
                margin: 0;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
                font-size: 10px;
                margin: 36pt;
            }

            h4 {
                margin-top: 0;
                margin-bottom: 0.5rem;
            }

            p {
                margin-top: 0;
                margin-bottom: 1rem;
            }

            strong {
                font-weight: bolder;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            table {
                border-collapse: collapse;
            }

            th {
                text-align: inherit;
            }

            h4, .h4 {
                margin-bottom: 0.5rem;
                font-weight: 500;
                line-height: 1.2;
            }

            h4, .h4 {
                font-size: 1.5rem;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color: #212529;
            }

            .table th,
            .table td {
                padding: 0.75rem;
                vertical-align: top;
            }

            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .mt-5 {
                margin-top: 3rem !important;
            }

            .pr-0,
            .px-0 {
                padding-right: 0 !important;
            }

            .pl-0,
            .px-0 {
                padding-left: 0 !important;
            }

            .text-right {
                text-align: right !important;
            }

            .text-center {
                text-align: center !important;
            }

            .text-uppercase {
                text-transform: uppercase !important;
            }
            * {
                font-family: "DejaVu Sans";
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                line-height: 1.1;
            }
            .party-header {
                font-size: 1.5rem;
                font-weight: 400;
            }
            .total-amount {
                font-size: 12px;
                font-weight: 700;
            }
            .border-0 {
                border: none !important;
            }
            .cool-gray {
                color: #6B7280;
            }
        </style>
    </head>

    <body>
        {{-- Header --}}
        @if($invoice->logo)
            <img src="{{ $invoice->getLogo() }}" alt="logo" height="100">
        @endif
        @php
        $user=DB::table('users')->where('id',$invoice->getSerialNumber())->first();
        @endphp

        <table class="table mt-5">
            <tbody>
                <tr>

                    <td class="border-0 pl-0">
                        @if($invoice->status)
                            <h4 class="cool-gray" style="text-transform: capitalize;">
                                <strong>{{ $invoice->status }}</strong>
                            </h4>
                        @endif
                        <p>{{ __('Date') }}: <strong>{{ $invoice->getDate() }}</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
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
                    <table class="table">
                        <h2 class="card-title">Material Purchase History</h2>
                        <thead>
                            <tr>
                                <td>#</td>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Badge Number</th>
                                <th>Quantity</th>
                                <th>Total Cost</th>
                                <th>total Weight</th>
                                <th>Payment due Date</th>
                                <th>Purchase Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $materials=DB::table('materials')->where('user_id',$user->id)->get();
                            @endphp
                            @foreach ($materials as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->badge_number }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->quantity * $product->purchase_price }}</td>
                                    <td>{{ $product->total_weight }}</td>
                                    <td>{{ $product->payment_due_date }}</td>
                                    <td>{{ $product->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>



    @push('scrpts')

    <script type="text/php">
        if (isset($pdf) && $PAGE_COUNT > 1) {
            $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
            $size = 10;
            $font = $fontMetrics->getFont("Verdana");
            $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
            $x = ($pdf->get_width() - $width);
            $y = $pdf->get_height() - 35;
            $pdf->page_text($x, $y, $text, $font, $size);
        }
    </script>
    @endpush
    </body>
</html>
