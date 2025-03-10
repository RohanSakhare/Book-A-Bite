      <!-- Sidebar Start -->
      <aside class="left-sidebar bg-dark text-white">
          <!-- Sidebar scroll-->
          <div>
              <div class="brand-logo d-flex align-items-center justify-content-between">
                  <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                      <h1 class="text-white">Resto</h1>
                  </a>
                  <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                      <i class="ti ti-x fs-8"></i>
                  </div>
              </div>
              <!-- Sidebar navigation-->
              <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">Home</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link  {{ request()->is('dashboard') ? 'active' : '' }}"
                              href="{{ route('dashboard') }}" aria-expanded="false">
                              <span>
                                  <i class="ti ti-layout-dashboard"></i>
                              </span>
                              <span class="hide-menu">Dashboard</span>
                          </a>
                      </li>
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">UI COMPONENTS</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link {{ request()->is('admin/header', 'admin/add_header', 'admin/edit_header/*') ? 'active' : '' }}"
                              href="{{ route('header') }}" aria-expanded="false">
                              <span>
                                  <i class="ti ti-article"></i>
                              </span>
                              <span class="hide-menu">Header</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link  {{ request()->is('admin/booking', 'admin/booking_view/*') ? 'active' : '' }}"
                              href="{{ route('booking') }}" aria-expanded="false">
                              <span>
                                  <i class="ti ti-alert-circle"></i>
                              </span>
                              <span class="hide-menu">Booking</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false"
                              onclick="toggleDropdown(this)">
                              <span>
                                  <i class="ti ti-menu"></i>
                              </span>
                              <span class="hide-menu">Menu</span>
                              <span class="ps-5 ms-5">
                                  <i class="fa-solid fa-angle-right text-end dropdown-arrow"></i>
                              </span>
                          </a>
                          <ul aria-expanded="false" class="collapse first-level ms-4 w-75">
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ request()->is('admin/appetizer', 'admin/add_appetizer', 'admin/edit_appetizer/*') ? 'active' : '' }}" href="{{ route('appetizer') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Appetizer</span>
                                </a>
                            </li>
                              <li class="sidebar-item">
                                  <a href="{{ route('main_course') }}" class="sidebar-link {{ request()->is('main_course') ? 'active' : '' }}">
                                      <span>
                                          <i class="ti ti-tools-kitchen-2"></i>
                                      </span>
                                      <span class="hide-menu">Main Course</span>
                                  </a>
                              </li>
                              <li class="sidebar-item">
                                  <a href="{{ route('dessert') }}" class="sidebar-link {{ request()->is('dessert') ? 'active' : '' }}">
                                      <span>
                                          <i class="ti ti-milkshake"></i>
                                      </span>
                                      <span class="hide-menu">Desserts</span>
                                  </a>
                              </li>
                          </ul>
                      </li>


                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-file-description"></i>
                              </span>
                              <span class="hide-menu">Testimonial</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                              <span>
                                  <i class="ti ti-typography"></i>
                              </span>
                              <span class="hide-menu">Contact Us</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                        <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
                            <span>
                                <i class="ti ti-typography"></i>
                            </span>
                            <span class="hide-menu">Our Features</span>
                        </a>
                    </li>
                      <li class="nav-small-cap">
                          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                          <span class="hide-menu">AUTH</span>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="{{ route('login') }}" aria-expanded="false">
                              <span>
                                  <i class="ti ti-login"></i>
                              </span>
                              <span class="hide-menu">Login</span>
                          </a>
                      </li>
                      <li class="sidebar-item">
                          <a class="sidebar-link" href="{{ route('register') }}" aria-expanded="false">
                              <span>
                                  <i class="ti ti-user-plus"></i>
                              </span>
                              <span class="hide-menu">Register</span>
                          </a>
                      </li>

                  </ul>

              </nav>
              <!-- End Sidebar navigation -->
          </div>
          <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->
