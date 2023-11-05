<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        @if(Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">All  Product Stock  table</h4>
              <p class="card-description">
                Download <code> <a href="{{ route('allproduct_invoices') }}" class="p-2 btn bg-success text-light"><i class="icon-paper menu-icon text-light p-1"></i>Product.xlsx</a> </code>
              </p>
              <div class="table-responsive pt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>
                        #
                      </th>
                      <th>
                        Name
                      </th>
                      <th>
                        Slug
                      </th>
                      <th>
                        Sale Progress Bar
                      </th>
                      <th>
                        Total Cost
                      </th>
                      <th>
                        Total Weight
                      </th>
                      <th>
                        Remaining Weight
                      </th>
                      <th>Expiry Date</th>
                      <th>
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($products as $product )
                    <tr>
                        <td>
                          {{ $product->id }}
                        </td>
                        <td>
                         {{$product->name}}
                        </td>
                        <td>{{ $product->slug }}</td>
                        <td>
                          <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ (($product->sale_quantity)/100) * ($product->quantity) }}%" aria-valuenow="{{ $product->sale_quantity }}" aria-valuemin="0" aria-valuemax="{{ $product->quantity }}"></div>
                          </div>
                        </td>
                        <td>
                          {{ $product->purchase_price * $product->quantity }}
                        </td>
                        <td>{{ $product->total_weight }}</td>
                        <td>{{ $product->weight * $product->sale_quantity - $product->total_weight }}</td>

                        <td>
                          {{ $product->expiry_date }}
                        </td>
                        <td>
                         <a href="{{ route('invoice',['id'=>$product->id]) }}"  class="btn bg-danger text-light p-2"><i class="icon-paper menu-icon"></i></a>
                         <a href="{{ route('admin.product-detail',['id'=>$product->id]) }}" class="btn bg-info text-light p-2">Detail</a>
                         <a href="{{ route('admin.editproduct',['id'=>$product->id]) }}" class="btn bg-primary text-light p-2">Edit</a>
                        </td>
                      </tr>
                    @empty
                    <tr>
                    <img src="{{ asset('assets/images/no-records.png') }}" class="img-thumbnail" alt="no_record">
                      </tr>

                    @endforelse

                  </tbody>
                </table>
                {{ $products->links() }}
              </div>
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
