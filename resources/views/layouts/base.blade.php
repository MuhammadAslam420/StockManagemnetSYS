<!DOCTYPE html>
<html lang="en">

<head>
    @php
    $setting=DB::table('en_settings')->find(1);
    @endphp
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @if($setting)
    {{ $setting->name }}
    @endif Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="stylesheet" type="text/css" href="{{  asset('assets/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  @if($setting)
  <link rel="shortcut icon" href="{{ asset('assets/images') }}/{{ $setting->logo }}" />
  @endif
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  @livewireStyles

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="{{ route('admin.dashboard') }}">
            @if($setting)<img src="{{ asset('assets/images')}}/{{ $setting->logo }}" class="mr-2"  alt="logo"/>
        @endif</a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}">@if($setting)<img src="{{ asset('assets/images')}}/{{ $setting->logo }}" alt="logo"/>
        @endif</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
          @livewire('admin.admin-cart-count-component')

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                @if($setting)
              <img src="{{ asset('assets/images')}}/{{ $setting->logo }}" alt="profile"/>
              @endif
              {{Auth::user()->utype}}
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{ route("setting") }}">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="ti-power-off text-primary"></i>
                Logout

              </a>

            </div>
          </li>
          <form id="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Product</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('addmaterial') }}">Purchase  Material</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('allmaterials') }}">Available Material</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('addproduct') }}">Add Stock Item</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('products') }}">Available Stock</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('generateorder') }}">Generate New Order</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('orders') }}">All Order List</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('pendingorders') }}">Pending Order List</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('processorders') }}">Process Order List</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('dispatchorders') }}">Dispatch Order List</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('deliveredorders') }}">Delivered Order List</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('cancelorders') }}">Cancel Order List</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.retrunItem') }}" >
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Return Item</span>
            </a>

          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">User </span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('supplier') }}"> Supplier </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('buyers') }}"> Buyers</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('adduser') }}"> Add New User </a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      {{ $slot }}
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{ asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{ asset('assets/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/js/off-canvas.js')}}"></script>
  <script src="{{ asset('assets/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('assets/js/template.js')}}"></script>
  <script src="{{ asset('assets/js/settings.js')}}"></script>
  <script src="{{ asset('assets/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets/js/dashboard.js')}}"></script>
  <script src="{{ asset('assets/js/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
  @livewireScripts

	@stack('scripts')
</body>

</html>

