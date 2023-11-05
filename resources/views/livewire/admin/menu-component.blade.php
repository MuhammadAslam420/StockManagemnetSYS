  <nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
      <script>
          var navbarStyle = localStorage.getItem("navbarStyle");
          if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
          }
      </script>
      <div class="d-flex align-items-center">
          <div class="toggle-icon-wrapper">
              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
          </div><a class="navbar-brand" href="index.html">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="{{asset('assets/images/stocking.png')}}" alt="" width="40" /><span class="font-sans-serif">Stock</span></div>
          </a>
      </div>
      <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
          <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                  <li class="nav-item">
                      <!-- parent pages-->
                      <a class="nav-link" href="#dashboard">
                          <div class="d-flex align-items-center">
                              <span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span>
                              Dashboard
                          </div>
                      </a>

                  </li>
                  <li class="nav-item">
                      <!-- label-->
                      <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                          <div class="col-auto navbar-vertical-label">App</div>
                          <div class="col ps-0">
                              <hr class="mb-0 navbar-vertical-divider" />
                          </div>
                      </div><!-- parent pages-->




                      <a class="nav-link dropdown-indicator" href="#e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-shopping-cart"></span></span><span class="nav-link-text ps-1">E commerce</span></div>
                      </a>
                      <ul class="nav collapse false" id="e-commerce">
                          <li class="nav-item"><a class="nav-link dropdown-indicator" href="#product" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product</span></div>
                              </a><!-- more inner pages-->
                              <ul class="nav collapse false" id="product">
                                  <li class="nav-item"><a class="nav-link" href="{{route('products')}}" aria-expanded="false">
                                          <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product list</span></div>
                                      </a><!-- more inner pages-->
                                  </li>
                                  <li class="nav-item"><a class="nav-link" href="{{route('addproduct')}}" aria-expanded="false">
                                          <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add Product</span></div>
                                      </a><!-- more inner pages-->
                                  </li>

                              </ul>
                          </li>
                          <li class="nav-item"><a class="nav-link dropdown-indicator" href="#orders" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Transaction</span></div>
                              </a><!-- more inner pages-->
                              <ul class="nav collapse false" id="orders">
                                  <li class="nav-item"><a class="nav-link" href="app/e-commerce/orders/order-list.html" aria-expanded="false">
                                          <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All Transaction</span></div>
                                      </a><!-- more inner pages-->
                                  </li>

                              </ul>
                          </li>
                          <li class="nav-item"><a class="nav-link" href="{{route('balance')}}" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Balance Sheet</span></div>
                              </a><!-- more inner pages-->
                          </li>
                          <li class="nav-item"><a class="nav-link" href="{{route('categories')}}" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Category</span></div>
                              </a><!-- more inner pages-->
                          </li>

                      </ul>
                      <!-- parent pages-->

                  </li>
                  <li class="nav-item">
                      <!-- label-->
                      <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                          <div class="col-auto navbar-vertical-label">Pages</div>
                          <div class="col ps-0">
                              <hr class="mb-0 navbar-vertical-divider" />
                          </div>
                      </div><!-- parent pages-->

                      <a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
                          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">User</span></div>
                      </a>
                      <ul class="nav collapse false" id="user">
                          <li class="nav-item"><a class="nav-link" href="pages/user/profile.html" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Profile</span></div>
                              </a><!-- more inner pages-->
                          </li>
                          <li class="nav-item"><a class="nav-link" href="{{route('adduser')}}" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Add New User</span></div>
                              </a><!-- more inner pages-->
                          </li>
                      </ul><!-- parent pages-->
                      <a class="nav-link dropdown-indicator" href="#pricing" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="pricing">
                          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-tags"></span></span><span class="nav-link-text ps-1">Client & Supplier</span></div>
                      </a>
                      <ul class="nav collapse false" id="pricing">
                          <li class="nav-item"><a class="nav-link" href="{{route('buyers')}}" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Buyers</span></div>
                              </a><!-- more inner pages-->
                          </li>
                          <li class="nav-item"><a class="nav-link" href="{{route('supplier')}}" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Supplier</span></div>
                              </a><!-- more inner pages-->
                          </li>
                      </ul><!-- parent pages-->

                  </li>
                  <li class="nav-item">
                      <!-- label-->
                      <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                          <div class="col-auto navbar-vertical-label">Modules</div>
                          <div class="col ps-0">
                              <hr class="mb-0 navbar-vertical-divider" />
                          </div>
                      </div><!-- parent pages-->

                      <a class="nav-link dropdown-indicator" href="#tables" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="tables">
                          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-table"></span></span><span class="nav-link-text ps-1">Orders</span></div>
                      </a>
                      <ul class="nav collapse false" id="tables">
                          <li class="nav-item"><a class="nav-link" href="{{route('orders')}}" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders</span></div>
                              </a><!-- more inner pages-->
                          </li>
                          <li class="nav-item"><a class="nav-link" href="modules/tables/advance-tables.html" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Advance tables</span></div>
                              </a><!-- more inner pages-->
                          </li>
                          <li class="nav-item"><a class="nav-link" href="modules/tables/bulk-select.html" aria-expanded="false">
                                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Bulk select</span></div>
                              </a><!-- more inner pages-->
                          </li>
                      </ul>
                  </li>

              </ul>

          </div>
      </div>
  </nav>
  <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand-xl" style="display: none;">
      <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
      <a class="navbar-brand me-1 me-sm-3" href="index.html">
          <div class="d-flex align-items-center"><img class="me-2" src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40" /><span class="font-sans-serif">falcon</span></div>
      </a>

      <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
          <li class="nav-item">
              <div class="theme-control-toggle fa-icon-wait px-2"><input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" /><label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label><label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label></div>
          </li>
          <li class="nav-item">
              <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="app/e-commerce/shopping-cart.html"><span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;"></span><span class="notification-indicator-number">1</span></a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
                  <div class="card card-notification shadow-none">
                      <div class="card-header">
                          <div class="row justify-content-between align-items-center">
                              <div class="col-auto">
                                  <h6 class="card-header-title mb-0">Notifications</h6>
                              </div>
                              <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
                          </div>
                      </div>
                      <div class="scrollbar-overlay" style="max-height:19rem">
                          <div class="list-group list-group-flush fw-normal fs--1">
                              <div class="list-group-title border-bottom">NEW</div>
                              <div class="list-group-item">
                                  <a class="notification notification-flush notification-unread" href="#!">
                                      <div class="notification-avatar">
                                          <div class="avatar avatar-2xl me-3">
                                              <img class="rounded-circle" src="assets/img/team/1-thumb.png" alt="" />
                                          </div>
                                      </div>
                                      <div class="notification-body">
                                          <p class="mb-1"><strong>Emma Watson</strong> replied to your comment : "Hello world 😍"</p>
                                          <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">💬</span>Just now</span>
                                      </div>
                                  </a>
                              </div>
                              <div class="list-group-item">
                                  <a class="notification notification-flush notification-unread" href="#!">
                                      <div class="notification-avatar">
                                          <div class="avatar avatar-2xl me-3">
                                              <div class="avatar-name rounded-circle"><span>AB</span></div>
                                          </div>
                                      </div>
                                      <div class="notification-body">
                                          <p class="mb-1"><strong>Albert Brooks</strong> reacted to <strong>Mia Khalifa's</strong> status</p>
                                          <span class="notification-time"><span class="me-2 fab fa-gratipay text-danger"></span>9hr</span>
                                      </div>
                                  </a>
                              </div>
                              <div class="list-group-title border-bottom">EARLIER</div>
                              <div class="list-group-item">
                                  <a class="notification notification-flush" href="#!">
                                      <div class="notification-avatar">
                                          <div class="avatar avatar-2xl me-3">
                                              <img class="rounded-circle" src="assets/img/icons/weather-sm.jpg" alt="" />
                                          </div>
                                      </div>
                                      <div class="notification-body">
                                          <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                          <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>
                                      </div>
                                  </a>
                              </div>
                              <div class="list-group-item">
                                  <a class="border-bottom-0 notification-unread  notification notification-flush" href="#!">
                                      <div class="notification-avatar">
                                          <div class="avatar avatar-xl me-3">
                                              <img class="rounded-circle" src="assets/img/logos/oxford.png" alt="" />
                                          </div>
                                      </div>
                                      <div class="notification-body">
                                          <p class="mb-1"><strong>University of Oxford</strong> created an event : "Causal Inference Hilary 2019"</p>
                                          <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">✌️</span>1w</span>
                                      </div>
                                  </a>
                              </div>
                              <div class="list-group-item">
                                  <a class="border-bottom-0 notification notification-flush" href="#!">
                                      <div class="notification-avatar">
                                          <div class="avatar avatar-xl me-3">
                                              <img class="rounded-circle" src="assets/img/team/10.jpg" alt="" />
                                          </div>
                                      </div>
                                      <div class="notification-body">
                                          <p class="mb-1"><strong>James Cameron</strong> invited to join the group: United Nations International Children's Fund</p>
                                          <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🙋‍</span>2d</span>
                                      </div>
                                  </a>
                              </div>
                          </div>
                      </div>
                      <div class="card-footer text-center border-top"><a class="card-link d-block" href="app/social/notifications.html">View all</a></div>
                  </div>
              </div>
          </li>
          <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                      <img class="rounded-circle" src="assets/img/team/3-thumb.png" alt="" />
                  </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white dark__bg-1000 rounded-2 py-2">
                      <a class="dropdown-item" href="pages/user/profile.html">Profile &amp; account</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="pages/user/settings.html">Settings</a>
                      <form method="POST" action="{{ route('logout') }}" x-data>
                          @csrf
                          <a class="dropdown-item" href="{{ route('logout') }}" @click.prevent="$root.submit();">Logout</a>

                      </form>

                  </div>
              </div>
          </li>
      </ul>
  </nav>