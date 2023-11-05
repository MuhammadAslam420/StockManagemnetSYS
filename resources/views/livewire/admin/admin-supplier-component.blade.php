<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">{{ Auth::user()->name }}</h3>

                    </div>

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Supplier Balance Table</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Total Buying</th>
                                <th>Paid</th>
                                <th>Remaining Balance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @forelse ($users as $user )
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @php
                                $total=DB::table('supplier_balances')->where('user_id',$user->id)->sum('total_amount');
                                $deposite=DB::table('supplier_balances')->where('user_id',$user->id)->sum('total_withdraw');
                                $balance=DB::table('supplier_balances')->where('user_id',$user->id)->latest()->first();
                                @endphp
                                <td>{{ $total }}</td>
                                <td>{{ $deposite }}</td>
                                <td>
                                    @if($balance)
                                    {{ $balance->remaining_payment }}
                                    @else
                                    0.00
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('supplier-detail-pdf',['id'=>$user->id]) }}" class="btn bg-success"><i class="icon-paper menu-icon"></i></a>
                                    <a href="{{ route('supplier-detail',['id'=>$user->id]) }}" class="btn bg-info">Detail</a>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <img src="{{ Asset('assets/images/no_records.png') }}" class="img-fluid" alt="">
                            </tr>

                            @endforelse

                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
           </div>

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @livewire('admin.admin-footer-component')
    <!-- partial -->
</div>


