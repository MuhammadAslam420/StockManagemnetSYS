<!DOCTYPE html>
<html lang="en">

<head>
    <title>HIC_order_{{ $invoice->getSerialNumber() }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

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

        h4,
        .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4,
        .h4 {
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

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
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
    <p>Contact No: 0616006175</p>
    <p>Address: Industrial Estate multan, Punjab Pakistan</p>
    <p>Email:hic@gmail.com</p>

    <table class="table table-stripped mt-3">
        <thead>
            <tr>
                @if($invoice->status)
                <h4 class="text-uppercase cool-gray">
                    <strong>{{ $invoice->status }}</strong>
                </h4>
                @endif
            </tr>
        </thead>
        <tbody>
            <tr>

                <td class="border-0 pl-2">

                    @php
                    $order=DB::table('orders')->where('id',$invoice->getSerialNumber())->first();
                    @endphp
                    <p>{{ __('Order Serial No:') }} <strong>{{ $invoice->getSerialNumber() }}/HIC</strong></p>
                    <p>{{ __('Order status:') }} <strong>{{ $order->status }}</strong></p>
                    <p>{{ __('Order Delivery Date:') }} <strong>{{ $order->delivery_date }}</strong></p>
                    <p>{{ __('Order Gate Pass No#:') }} <strong>{{ $order->gate_pass_id }}</strong></p>
                    <p>{{ __('Order Gate Pass Status:') }} <strong>{{ $order->gate_pass }}</strong></p>
                    <p>{{ __('Order payment Due Date:') }} <strong>{{ $order->payment_due_date }}</strong></p>
                    <p>{{ __('Order Invoice Generate date:') }}: <strong>{{ Carbon\Carbon::today() }}</strong></p>
                </td>
                <td class="border-0 pl-2">

                    @php
                    $gate=DB::table('gate_passes')->where('order_id',$invoice->getSerialNumber())->first();
                    @endphp
                    <p>{{ __('Material Receiver Name:') }} <strong style="text-transform: capitalize;">{{ $gate->receiver_name }}</strong></p>
                    <p>{{ __('Receiver NIC:') }} <strong>{{ $gate->nic }}</strong></p>
                    <p>{{ __('Vehicle Number:') }} <strong>{{ $gate->vehicle_number }}</strong></p>
                    <p>{{ __('Order Gate Pass No#:') }} <strong>{{ $order->gate_pass_id }}</strong></p>
                    <p>{{ __('Order Gate Pass Creation Date:') }} <strong>{{ $order->gate_pass }}</strong></p>

                </td>
            </tr>

        </tbody>
    </table>

    {{-- Seller - Buyer --}}
    <table class="table">
        <thead>
            <tr>
                <th class="border-0 pl-0 party-header" width="48.5%">
                    {{ __('invoices::invoice.seller') }}
                </th>
                <th class="border-0" width="3%"></th>
                <th class="border-0 pl-0 party-header">
                    {{ __('invoices::invoice.buyer') }}
                </th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="px-0">
                    <p>Name:&nbsp;{{ Auth::user()->name }}</p>
                    <p>Email:&nbsp;{{ Auth::user()->email }}</p>
                    <p>Contact:&nbsp;{{ Auth::user()->mobile }}</p>
                </td>
                <td class="border-0"></td>
                <td class="px-0">
                    @php
                    $user=DB::table('users')->where('id',$order->user_id)->first();
                    @endphp
                    <p class="buyer-name">
                        Name:&nbsp;
                        <strong>

                            {{ $user->name }}
                        </strong>
                    </p>


                    <p class="buyer-address">
                        {{ __('invoices::invoice.address') }}: {{ $order->address }}
                    </p>
                    <p class="buyer-name">
                        Email:&nbsp;
                        <strong>

                            {{ $user->email }}
                        </strong>
                    </p>
                    <p class="buyer-name">
                        Contact:&nbsp;
                        <strong>


                        </strong>
                    </p>
                </td>

            </tr>
        </tbody>
    </table>

    {{-- Table --}}
    <table class="table table-items">
        <thead>
            <tr>
                <th scope="col" class="border-0 pl-0">{{ __('invoices::invoice.description') }}</th>
                <th scope="col" class="text-center border-0">{{ __('per unit weight') }}</th>
                <th scope="col" class="text-center border-0">{{ __('invoices::invoice.quantity') }}</th>
                <th scope="col" class="text-center border-0">{{ __('total weight') }}</th>

            </tr>
        </thead>
        <tbody>
            @php
            $items=DB::table('order_items')->where('order_id',$order->id)->get();
            @endphp
            @foreach($items as $item)
            <tr>
                @php
                $product=DB::table('products')->where('id',$item->product_id)->first();
                @endphp
                <td class="pl-0">
                    {{ $product->name }}
                </td>
                <td class="text-center">{{ $product->weight }}{{ $product->unit }}</td>
                <td class="text-center">{{ $item->quantity }} &nbsp; {{$product->packaging}}</td>
                <td class="text-center pr-0">
                    {{ $item->weight }}&nbsp;{{$product->unit}}
                </td>
            </tr>
            @endforeach
            {{-- Summary --}}






        </tbody>
    </table>




    <p>
        {{ trans('Signature') }}:______________________________________________
    </p>


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
</body>

</html>