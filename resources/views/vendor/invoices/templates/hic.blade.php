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
                border:1px #212529 solid;
            }

            .table th,
            .table td {
                padding: 0.5rem;
                vertical-align: top;
                border:1px #212529 solid;
            }

            .table.table-items td {
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border:1px #212529 solid;
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

@if($invoice->buyer->name == 1)
<h2 class="card-title">Today Product Purchase</h2>
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Prod.ID</th>
                    <th>Name</th>
                    <th>Supplier</th>
                    <th>Badge</th>
                    <th>Type&Color</th>
                    <th>Qty</th>
                    <th>Weight</th>
                    <th>Packing</th>
                    <th>Price</th>
                    <th>Total.Cost</th>
                    <th>Expire</th>
                </tr>
            </thead>
            <tbody>
                @php
                $products=DB::table('materials')->where('created_at',today())->get();
                $i=1;
                @endphp
                @forelse ($products as $product )
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    @php
                    $user=DB::table('users')->find($product->user_id);
                    @endphp
                    <td>{{ $user->name }}</td>
                    <td>{{ $product->badge_number }}</td>
                    <td>{{ $product->type }}&nbsp;{{ $product->color }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->weight }}&nbsp;{{ $product->unit }}</td>
                    <td>{{ $product->packaging }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->quantity * $product->purchase_price }}</td>
                    <td>{{ $product->expiry_date }}</td>
                </tr>

                @empty

                @endforelse
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <h2 class="card-title">Today Order/Sale</h2>
        <table class="table mt-5">

             <tr>
                <th>Sr.No</th>
                <th>Order.ID</th>
                <th>Order Total</th>
                <th>Buyer</th>
                <th>Address</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Delivery Date</th>
                <th>GatePass.Id</th>
                <th>Date</th>
             </tr>
             @php
             $orders=DB::table('orders')->where('created_at',today())->get();
             $i=1;
             @endphp
             @forelse ($orders as $order )

             <tr>
                 <td>{{ $i++ }}</td>
                 <td>{{ $order->id }}</td>
                 <td>{{ $order->total }}</td>
                 @php
                 $user=DB::table('users')->find($order->user_id);
                 @endphp

                 <td>{{ $user->name }}</td>
                 <td>{{ $order->address }}</td>
                 <td>{{ $order->status }}</td>
                 <td>{{ $order->payment_due_date }}</td>
                 <td>{{ $order->delivery_date }}</td>
                 <td>{{ $order->gate_pass_id }}</td>
                 <td>{{ $order->created_at }}</td>
             </tr>


                <h2 class="card-title mt-5 text-primary">Order Items Detail</h2>
                <tr>
                <th>Sr.No</th>
                  <th>OrderId</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Weight</th>
                  <th>Total.Weight</th>
                </tr>
                @php
                $items=DB::table('order_items')->where('order_id',$order->id)->get();
                $m=1;
                @endphp
                @foreach ($items as $item )
                <tr>
                    <td>{{ $m++ }}</td>
                    <td>{{ $item->order_id }}</td>
                    @php
                    $product=DB::table('products')->find($item->product_id);
                    @endphp
                    <td>{{ $product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->price * $item->quantity }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->weight * $item->quantity }}</td>
                </tr>
                @endforeach

                    <h2 class="card-title mt-5 text-danger">Order Transaction Detail</h2>
                    <tr>
                        <th>Order.Id</th>
                        <th>Transaction Mode</th>
                        <th>Transaction Status</th>
                    </tr>
                    @php
                    $transaction=DB::table('transactions')->where('order_id',$order->id)->first();
                    @endphp
                    <tr style="margin-bottom:10px;">
                        <td>{{ $transaction->order_id }}</td>
                        <td>{{ $transaction->payment_mode }}</td>
                        <td>{{ $transaction->status }}</td>
                    </tr>

                @empty


                @endforelse

        </table>
    </div>
</div>
@elseif ($invoice->buyer->name == 2)
<h2 class="card-title">Last 7 Day's Product Purchase</h2>
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Prod.ID</th>
                    <th>Name</th>
                    <th>Supplier</th>
                    <th>Badge</th>
                    <th>Type&Color</th>
                    <th>Qty</th>
                    <th>Weight</th>
                    <th>Packing</th>
                    <th>Price</th>
                    <th>Total.Cost</th>
                    <th>Expire</th>
                </tr>
            </thead>
            <tbody>
                @php
                $products=DB::table('materials')->whereDate('created_at','>=',Carbon\Carbon::now()->subDays(7))->get();
                $i=1;
                @endphp
                @forelse ($products as $product )
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    @php
                    $user=DB::table('users')->find($product->user_id);
                    @endphp
                    <td>{{ $user->name }}</td>
                    <td>{{ $product->badge_number }}</td>
                    <td>{{ $product->type }}&nbsp;{{ $product->color }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->weight }}&nbsp;{{ $product->unit }}</td>
                    <td>{{ $product->packaging }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->quantity * $product->purchase_price }}</td>
                    <td>{{ $product->expiry_date }}</td>
                </tr>

                @empty

                @endforelse
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <h2 class="card-title">Last 7 Day's Order/Sale</h2>
        <table class="table mt-5">

             <tr>
                <th>Sr.No</th>
                <th>Order.ID</th>
                <th>Order Total</th>
                <th>Buyer</th>
                <th>Address</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Delivery Date</th>
                <th>GatePass.Id</th>
                <th>Date</th>
             </tr>
             @php
             $orders=DB::table('orders')->where('created_at','>=',Carbon\Carbon::today()->subDays(7))->get();
             $i=1;
             @endphp
             @forelse ($orders as $order )

             <tr>
                 <td>{{ $i++ }}</td>
                 <td>{{ $order->id }}</td>
                 <td>{{ $order->total }}</td>
                 @php
                 $user=DB::table('users')->find($order->user_id);
                 @endphp

                 <td>{{ $user->name }}</td>
                 <td>{{ $order->address }}</td>
                 <td>{{ $order->status }}</td>
                 <td>{{ $order->payment_due_date }}</td>
                 <td>{{ $order->delivery_date }}</td>
                 <td>{{ $order->gate_pass_id }}</td>
                 <td>{{ $order->created_at }}</td>
             </tr>


                <h2 class="card-title mt-5 text-primary">Order Items Detail</h2>
                <tr>
                <th>Sr.No</th>
                  <th>OrderId</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Weight</th>
                  <th>Total.Weight</th>
                </tr>
                @php
                $items=DB::table('order_items')->where('order_id',$order->id)->get();
                $m=1;
                @endphp
                @foreach ($items as $item )
                <tr>
                    <td>{{ $m++ }}</td>
                    <td>{{ $item->order_id }}</td>
                    @php
                    $product=DB::table('products')->find($item->product_id);
                    @endphp
                    <td>{{ $product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->price * $item->quantity }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->weight * $item->quantity }}</td>
                </tr>
                @endforeach

                    <h2 class="card-title mt-5 text-danger">Order Transaction Detail</h2>
                    <tr>
                        <th>Order.Id</th>
                        <th>Transaction Mode</th>
                        <th>Transaction Status</th>
                    </tr>
                    @php
                    $transaction=DB::table('transactions')->where('order_id',$order->id)->first();
                    @endphp
                    <tr style="margin-bottom:10px;">
                        <td>{{ $transaction->order_id }}</td>
                        <td>{{ $transaction->payment_mode }}</td>
                        <td>{{ $transaction->status }}</td>
                    </tr>

                @empty


                @endforelse

        </table>
    </div>
</div>
@elseif ($invoice->buyer->name == 3)
<h2 class="card-title">Last 15 Day's Product Purchase</h2>
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Prod.ID</th>
                    <th>Name</th>
                    <th>Supplier</th>
                    <th>Badge</th>
                    <th>Type&Color</th>
                    <th>Qty</th>
                    <th>Weight</th>
                    <th>Packing</th>
                    <th>Price</th>
                    <th>Total.Cost</th>
                    <th>Expire</th>
                </tr>
            </thead>
            <tbody>
                @php
                $products=DB::table('materials')->whereDate('created_at','>=',Carbon\Carbon::now()->subDays(15))->get();
                $i=1;
                @endphp
                @forelse ($products as $product )
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    @php
                    $user=DB::table('users')->find($product->user_id);
                    @endphp
                    <td>{{ $user->name }}</td>
                    <td>{{ $product->badge_number }}</td>
                    <td>{{ $product->type }}&nbsp;{{ $product->color }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->weight }}&nbsp;{{ $product->unit }}</td>
                    <td>{{ $product->packaging }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->quantity * $product->purchase_price }}</td>
                    <td>{{ $product->expiry_date }}</td>
                </tr>

                @empty

                @endforelse
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <h2 class="card-title">Last 15 Day's Order/Sale</h2>
        <table class="table mt-5">

             <tr>
                <th>Sr.No</th>
                <th>Order.ID</th>
                <th>Order Total</th>
                <th>Buyer</th>
                <th>Address</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Delivery Date</th>
                <th>GatePass.Id</th>
                <th>Date</th>
             </tr>
             @php
             $orders=DB::table('orders')->where('created_at','>=',Carbon\Carbon::today()->subDays(15))->get();
             $i=1;
             @endphp
             @forelse ($orders as $order )

             <tr>
                 <td>{{ $i++ }}</td>
                 <td>{{ $order->id }}</td>
                 <td>{{ $order->total }}</td>
                 @php
                 $user=DB::table('users')->find($order->user_id);
                 @endphp

                 <td>{{ $user->name }}</td>
                 <td>{{ $order->address }}</td>
                 <td>{{ $order->status }}</td>
                 <td>{{ $order->payment_due_date }}</td>
                 <td>{{ $order->delivery_date }}</td>
                 <td>{{ $order->gate_pass_id }}</td>
                 <td>{{ $order->created_at }}</td>
             </tr>


                <h2 class="card-title mt-5 text-primary">Order Items Detail</h2>
                <tr>
                <th>Sr.No</th>
                  <th>OrderId</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Weight</th>
                  <th>Total.Weight</th>
                </tr>
                @php
                $items=DB::table('order_items')->where('order_id',$order->id)->get();
                $m=1;
                @endphp
                @foreach ($items as $item )
                <tr>
                    <td>{{ $m++ }}</td>
                    <td>{{ $item->order_id }}</td>
                    @php
                    $product=DB::table('products')->find($item->product_id);
                    @endphp
                    <td>{{ $product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->price * $item->quantity }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->weight * $item->quantity }}</td>
                </tr>
                @endforeach

                    <h2 class="card-title mt-5 text-danger">Order Transaction Detail</h2>
                    <tr>
                        <th>Order.Id</th>
                        <th>Transaction Mode</th>
                        <th>Transaction Status</th>
                    </tr>
                    @php
                    $transaction=DB::table('transactions')->where('order_id',$order->id)->first();
                    @endphp
                    <tr style="margin-bottom:10px;">
                        <td>{{ $transaction->order_id }}</td>
                        <td>{{ $transaction->payment_mode }}</td>
                        <td>{{ $transaction->status }}</td>
                    </tr>

                @empty


                @endforelse

        </table>
    </div>
</div>
@else
<h2 class="card-title">All Product Purchase</h2>
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Prod.ID</th>
                    <th>Name</th>
                    <th>Supplier</th>
                    <th>Badge</th>
                    <th>Type&Color</th>
                    <th>Qty</th>
                    <th>Weight</th>
                    <th>Packing</th>
                    <th>Price</th>
                    <th>Total.Cost</th>
                    <th>Expire</th>
                </tr>
            </thead>
            <tbody>
                @php
                $products=DB::table('materials')->get();
                $i=1;
                @endphp
                @forelse ($products as $product )
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    @php
                    $user=DB::table('users')->find($product->user_id);
                    @endphp
                    <td>{{ $user->name }}</td>
                    <td>{{ $product->badge_number }}</td>
                    <td>{{ $product->type }}&nbsp;{{ $product->color }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->weight }}&nbsp;{{ $product->unit }}</td>
                    <td>{{ $product->packaging }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>{{ $product->quantity * $product->purchase_price }}</td>
                    <td>{{ $product->expiry_date }}</td>
                </tr>

                @empty

                @endforelse
            </tbody>
        </table>
    </div>
    <div class="table-responsive">
        <h2 class="card-title">Till Date Order/Sale</h2>
        <table class="table mt-5">

             <tr>
                <th>Sr.No</th>
                <th>Order.ID</th>
                <th>Order Total</th>
                <th>Buyer</th>
                <th>Address</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Delivery Date</th>
                <th>GatePass.Id</th>
                <th>Date</th>
             </tr>
             @php
             $orders=DB::table('orders')->where('created_at','>=',Carbon\Carbon::today()->subDays(7))->get();
             $i=1;
             @endphp
             @forelse ($orders as $order )

             <tr>
                 <td>{{ $i++ }}</td>
                 <td>{{ $order->id }}</td>
                 <td>{{ $order->total }}</td>
                 @php
                 $user=DB::table('users')->find($order->user_id);
                 @endphp

                 <td>{{ $user->name }}</td>
                 <td>{{ $order->address }}</td>
                 <td>{{ $order->status }}</td>
                 <td>{{ $order->payment_due_date }}</td>
                 <td>{{ $order->delivery_date }}</td>
                 <td>{{ $order->gate_pass_id }}</td>
                 <td>{{ $order->created_at }}</td>
             </tr>


                <h2 class="card-title mt-5 text-primary">Order Items Detail</h2>
                <tr>
                <th>Sr.No</th>
                  <th>OrderId</th>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Price</th>
                  <th>Weight</th>
                  <th>Total.Weight</th>
                </tr>
                @php
                $items=DB::table('order_items')->where('order_id',$order->id)->get();
                $m=1;
                @endphp
                @foreach ($items as $item )
                <tr>
                    <td>{{ $m++ }}</td>
                    <td>{{ $item->order_id }}</td>
                    @php
                    $product=DB::table('products')->find($item->product_id);
                    @endphp
                    <td>{{ $product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->price * $item->quantity }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->weight * $item->quantity }}</td>
                </tr>
                @endforeach

                    <h2 class="card-title mt-5 text-danger">Order Transaction Detail</h2>
                    <tr>
                        <th>Order.Id</th>
                        <th>Transaction Mode</th>
                        <th>Transaction Status</th>
                    </tr>
                    @php
                    $transaction=DB::table('transactions')->where('order_id',$order->id)->first();
                    @endphp
                    <tr style="margin-bottom:10px;">
                        <td>{{ $transaction->order_id }}</td>
                        <td>{{ $transaction->payment_mode }}</td>
                        <td>{{ $transaction->status }}</td>
                    </tr>

                @empty


                @endforelse

        </table>
    </div>
</div>
@endif




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
