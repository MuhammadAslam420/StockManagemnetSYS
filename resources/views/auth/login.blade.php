
<x-login-layout>

    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
              <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                  <div class="brand-logo">
                    <img src="{{ asset('assets/images/HIC.png') }}" alt="logo">
                  </div>
                  <h4>Hello! let's get started</h4>
                  <h6 class="font-weight-light">Sign in to continue.</h6>
                  <x-jet-validation-errors class="mb-4" />
                        <form class="pt-3" method="POST" action="{{ route('login') }}">
                            @csrf
                    <div class="form-group">
                      <input  class="form-control form-control-lg"id="card-email"type="email" name="email" :value="old('email')" required autofocus  >
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" required autocomplete="current-password" class="form-control form-control-lg" >
                    </div>
                    <div class="mt-3">
                      <button type="submit" class="btn btn-block bg-danger btn-lg font-weight-medium auth-form-btn text-primary" >SIGN IN</button>
                    </div>
                    <div class="my-2 d-flex justify-content-between align-items-center">

                      <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                    </div>
                    {{-- <div class="mb-2">
                      <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                        <i class="ti-facebook mr-2"></i>Connect using facebook
                      </button>
                    </div> --}}
                    {{-- <div class="text-center mt-4 font-weight-light">
                      Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
                    </div> --}}
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>

</x-login-layout>
