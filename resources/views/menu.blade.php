<!DOCTYPE html>
<html lang="en">

<head>
    @include('common/header-links')
</head>

<body>
    @include('common/navbar')


    <!-- Page Header Start -->
    <div class="background-garadient">
        <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="display-3 mb-3 animated slideInDown">Menu</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page">Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Menu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Specialties</h1>
                        <p>Explore our delicious menu, crafted with fresh ingredients and passion. From stater to
                            desserts, we have something for everyone.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#tab-1">Stater</a>
                        </li>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Main
                                Course</a>
                        </li>
                        <li class="nav-item me-0">
                            <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Desserts</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content ">
                <!-- Starter Tab -->
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row">
                        @foreach ($appetizers as $appetizer)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                <div class="product-item shadow">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid manu-img w-100" src="{{ asset($appetizer->image) }}"
                                            alt="{{ $appetizer->title }}">
                                        <div
                                            class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            New</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="javascript:void(0);">{{ $appetizer->title }}</a>
                                        <span class="text-primary me-1">₹{{ $appetizer->price_now }}</span>
                                        <span
                                            class="text-body text-decoration-line-through">₹{{ $appetizer->price_before }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Main Course Tab -->
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="row">
                        @foreach ($mainCourses as $mainCourse)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                <div class="product-item shadow">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid manu-img w-100" src="{{ asset($mainCourse->image) }}"
                                            alt="{{ $mainCourse->title }}">
                                        <div
                                            class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            New</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="javascript:void(0);">{{ $mainCourse->title }}</a>
                                        <span class="text-primary me-1">₹{{ $mainCourse->price_now }}</span>
                                        <span
                                            class="text-body text-decoration-line-through">₹{{ $mainCourse->price_before }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Desserts Tab -->
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="row">
                        @foreach ($desserts as $dessert)
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                                <div class="product-item shadow">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid manu-img w-100" src="{{ asset($dessert->image) }}"
                                            alt="{{ $dessert->title }}">
                                        <div
                                            class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                            New</div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="javascript:void(0);">{{ $dessert->title }}</a>
                                        <span class="text-primary me-1">₹{{ $dessert->price_now }}</span>
                                        <span
                                            class="text-body text-decoration-line-through">₹{{ $dessert->price_before }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->

    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 ">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Review</h1>
                <p>What customers say about us</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-item position-relative bg-white p-5 mt-4">
                        <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                        <p class="mb-4">{{ $testimonial->review }}</p>
                        <div class="d-flex align-items-center">
                            <img class="flex-shrink-0 rounded-circle" src="{{ asset($testimonial->image) }}"
                                alt="{{ $testimonial->name }}">
                            <div class="ms-3">
                                <h5 class="mb-1">{{ $testimonial->name }}</h5>
                                <span>{{ $testimonial->profession }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    @include('common/footer')

    @include('common/footer-links')

</body>

</html>