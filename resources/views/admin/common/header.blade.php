  {{-- spinner start  --}}
  <div id="preloader">
      <span class="loader"></span>
  </div>

  {{-- spinner end  --}}

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      @include('admin/common/sidebar')
      <!--  Main wrapper -->
      <div class="body-wrapper">
          <!--  Header Start -->
          <header class="app-header border-bottom bg-light">
              <nav class="navbar navbar-expand-lg navbar-light ">
                  <ul class="navbar-nav">
                      <li class="nav-item d-block d-xl-none">
                          <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                              href="javascript:void(0)">
                              <i class="ti ti-menu-2"></i>
                          </a>
                      </li>
                      {{-- <li class="nav-item">
                          <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                              <i class="ti ti-bell-ringing"></i>
                              <div class="notification bg-primary rounded-circle"></div>
                          </a>
                      </li> --}}
                  </ul>
                  <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                          <li class="nav-item dropdown">
                              <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                  data-bs-toggle="dropdown" aria-expanded="false">

                                  <i class="ti ti-user-filled user-icon-header rounded-circle  h3 "></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up dropdown-menu-dark "
                                  aria-labelledby="drop2">
                                  <div class="message-body">
                                      <a href="javascript:void(0)"
                                          class="d-flex align-items-center gap-2 dropdown-item">
                                          <i class="ti ti-user fs-6"></i>
                                          <p class="mb-0 fs-3">My Profile</p>
                                      </a>
                                      {{-- <a href="javascript:void(0)"
                                          class="d-flex align-items-center gap-2 dropdown-item">
                                          <i class="ti ti-mail fs-6"></i>
                                          <p class="mb-0 fs-3">My Account</p>
                                      </a>
                                      <a href="javascript:void(0)"
                                          class="d-flex align-items-center gap-2 dropdown-item">
                                          <i class="ti ti-list-check fs-6"></i>
                                          <p class="mb-0 fs-3">My Task</p> --}}
                                      {{-- </a> --}}
                                      <a href="{{ route('logout') }}"
                                          class="btn btn-outline-primary mx-3 mt-2 mb-2 d-block">Logout</a>
                                  </div>
                              </div>
                          </li>
                      </ul>
                  </div>
              </nav>
          </header>
          <!--  Header End -->
