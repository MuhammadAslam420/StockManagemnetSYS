<div class="main-panel" wire:ignore>
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                class="text-primary">
                                @if(Session::has('message'))
                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                                @endif
                            </span></h6>
                    </div>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <p class="card-title">All Orders Table</p>
                <div class="row">
                    <div class="col-12">
                        <table  class="display expandable-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>OrderId</th>
                                    <th>Buyer</th>
                                    <th>SubTotal</th>
                                    <th>Total</th>
                                    <th>Payment Due Date</th>
                                    <th>Delivery Date</th>
                                    <th>Status</th>
                                    <th>Gate Pass Id</th>
                                    <th>Gate Pass Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @forelse ($orders as $order )
                                 <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->payment_due_date }}</td>
                                    <td>{{ $order->delivery_date }}</td>
                                    <td >
                                        <div class="btn-group">
                                          <button type="button" class="btn bg-success dropdown-toggle text-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                          style="text-transform: capitalize;">
                                            {{ $order->status }}
                                          </button>
                                          <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#" wire:click.prevent="statusChange({{ $order->id }},'process')">Process</a>
                                            <a class="dropdown-item" href="#" wire:click.prevent="statusChange({{ $order->id }},'dispatch')">Dispatch</a>
                                            <a class="dropdown-item" href="#" wire:click.prevent="statusChange({{ $order->id }},'delivered')">Delivered</a>
                                            <a class="dropdown-item" href="#" wire:click.prevent="statusChange({{ $order->id }},'canceled')">Cancel</a>
                                           </div>
                                         </div>
                                    </td>
                                    <td>{{ $order->gate_pass_id }}</td>
                                    <td style="text-transform: uppercase;">{{ $order->gate_pass }}</td>
                                    <td>
                                        <a href="{{ route('orderinvoice',['id'=>$order->id]) }}" class="btn bg-primary text-light btn-sm"><i class="icon-paper menu-icon"></i></a>
                                        <a href="#" class="btn bg-primary text-light btn-sm">Detail</a>
                                        @if($order->gate_pass === 'issue')
                                        <a href="{{ route('gate_pass_print',['order_id'=>$order->id]) }}" class="btn bg-success text-light btn-sm">Print GatePass</a>
                                        @else
                                        <a href="{{ route('gatepass',['id'=>$order->id]) }}" class="btn bg-primary text-light btn-sm">GatePass Issue</a>
                                        @endif
                                    </td>
                                 </tr>
                                @empty
                                <tr>
                                    <img src="{{ asset('assets/images/no-records.png') }}" class="img-thumbnail" alt="">
                                </tr>

                                @endforelse
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                        {{ $orders->links() }}
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
