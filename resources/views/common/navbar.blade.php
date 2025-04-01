    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <!-- section header start  -->
    <section id="header">
        <!-- Navbar Start -->
        <div class="container-fluid fixed-top px-0 wow fadeIn text-white header-about" data-wow-delay="0.1s">

            <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
                <div class="col-lg-6 px-5 text-start">
                    <small><i class="fa fa-map-marker-alt me-2"></i>M2 Road, Chhatrapati Sambhajinagar, Maharashtra
                    </small>
                    <small class="ms-4"><i class="fa fa-envelope me-2"></i>bookabite@gmail.com</small>
                </div>
                <div class="col-lg-6 px-5 text-end">
                    <small>Follow us:</small>
                    <a class="text-body ms-3  " href="#"><i class="fab fa-facebook-f icon_header"></i></a>
                    <a class="text-body ms-3 " href="#"><i class="fab fa-twitter icon_header"></i></a>
                    <a class="text-body ms-3 " href="#"><i class="fab fa-linkedin-in icon_header"></i></a>
                    <a class="text-body ms-3 " href="#"><i class="fab fa-instagram icon_header"></i></a>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
                <a href="{{ route('home') }}" class="navbar-brand ms-4 ms-lg-0">
                    <h1 class="fw-bold text-primary m-0">Book<span class="text-secondary"> A </span>Bite</h1>
                </a>
                <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <i class="fa-solid fa-bars icon-navbar-toller"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto p-4 p-lg-0">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link  {{ Request::routeIs('home') ? 'active' : '' }}">Home</a>

                        <a href="{{ route('about') }}"
                            class="nav-item nav-link {{ Request::routeIs('about') ? 'active' : '' }}">About Us</a>

                        <a href="{{ route('menu') }}"
                            class="nav-item nav-link {{ Request::routeIs('menu') ? 'active' : '' }}">Menu</a>

                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="{{ route('feature') }}" class="dropdown-item {{ Request::routeIs('feature') ? 'active' : '' }}">Our Features</a>
                                <a href="{{ route('testimonial') }}"
                                    class="dropdown-item {{ Request::routeIs('testimonial') ? 'active' : '' }}">Testimonial</a>
                                <!-- <a href="404.html" class="dropdown-item">404 Page</a> -->
                            </div>
                        </div>
                        <a href="{{ route('contact') }}"
                            class="nav-item nav-link {{ Request::routeIs('contact') ? 'active' : '' }}">Contact Us</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->
    </section>
    <!-- section header end  -->
