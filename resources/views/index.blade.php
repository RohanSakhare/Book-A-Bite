<!DOCTYPE html>
<html lang="en">

<head>
    @include('common/header-links')

</head>

<body>
    @include('common/navbar')

    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($headers as $index => $header)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img class="w-100" src="{{ asset($header->image) }}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-lg-12 text-center">
                                        <h1 class="display-2 mb-5 animated slideInDown text-white">{{ $header->title }}
                                        </h1>
                                        <a href="#form" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Book
                                            Table</a>
                                        <a href="{{ route('menu') }}"
                                            class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">View Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Form Start -->
    <section id="form">
        <div class="container-fluid form-background">
            <div class="container-xxl py-5 ">
                <div class="row g-5 pt-5 pb-5 align-items-center justify-content-center">
                    <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                        <div class="card p-2 form-card wow fadeInUp mt-2 shadow" data-wow-delay="0.1s">
                            <h1 class="text-center pt-3 fw-bold">Book a Table</h1>
                            <div class="card-body section-header ">
                                <form id="bookingForm" class="mt-3" action="{{ route('store_booking') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Full Name" required>
                                            @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email-Id" required>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                                            <label for="number" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" id="number" pattern="\d{10}"
                                                placeholder="Phone Number" maxlength="10" name="number" required>
                                            @error('number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror


                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                min="<?php echo date('Y-m-d'); ?>" required>
                                            @error('date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                                            <label for="time" class="form-label">Time</label>
                                            <input type="time" class="form-control" id="time" name="time" required
                                                min="10:00" max="22:00">
                                            @error('time')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="text-danger" id="timeError" style="display: none;">Time must be
                                                between 10:00 AM and 10:00 PM.</div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mb-3">
                                            <label for="guests" class="form-label">Number of Guests</label>
                                            <select class="form-control" id="guests" name="guests" required>
                                                <option value="1">1 Person</option>
                                                <option value="2">2 People</option>
                                                <option value="3">3 People</option>
                                                <option value="4">4 People</option>
                                                <option value="5">5 People</option>
                                                <option value="6">6 People</option>
                                            </select>
                                            @error('guests')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Select a Table</label>
                                            <div class="row pt-3 restaurant-layout text-center ms-1 me-1">
                                                <div class="col-lg-4">
                                                    <div class="table one_table" data-table-id="1" data-capacity="2">
                                                        <p class="pt-4 text-center"> Table 1 (2 seats)</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">

                                                    <div class="table two_table" data-table-id="2" data-capacity="4">
                                                        <p class="pt-4 text-center">Table 2 (4 seats)</p>
                                                    </div>

                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="table three_table" data-table-id="3" data-capacity="6">
                                                        <p class="pt-4 text-center">Table 3 (6 seats)</p>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="table_id" id="table_id">
                                            </div>
                                            @error('table_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="request" class="form-label">Special Requests</label>
                                            <textarea class="form-control" id="request" name="request" rows="3"
                                                placeholder="Request"></textarea>
                                            @error('request')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Form End -->

    <!-- Features Start -->
    <div class="container-fluid bg-light bg-icon py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Why Choose Us?</h1>
                <p>Discover what makes <span class="">Book A Bite</span> the perfect dining destination. From
                    fresh
                    ingredients
                    to
                    exceptional service, we’ve got it all.</p>
            </div>



            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 features_container shadow">
                        <img class="img-fluid features_img  mb-4" src="{{ asset('assets/img/features/fresh.jpg') }}"
                            alt="Fresh Ingredients">
                        <h4 class="mb-3">Fresh Ingredients</h4>
                        <p class="mb-4">We source only the freshest, locally grown ingredients to create dishes that
                            burst with flavor and nutrition.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Learn
                            More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 features_container shadow">
                        <img class="img-fluid features_img mb-4" src="{{ asset('assets/img/features/chef.jpg') }}"
                            alt="Expert Chefs">
                        <h4 class="mb-3">Expert Chefs</h4>
                        <p class="mb-4">Our talented chefs bring years of experience and creativity to every dish,
                            ensuring a memorable dining experience.</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">Meet Our
                            Chefs</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 features_container shadow">
                        <img class="img-fluid features_img mb-4" src="{{ asset('assets/img/features/cozy.jpg') }}"
                            alt="Cozy Ambiance">
                        <h4 class="mb-3">Cozy Ambiance</h4>
                        <p class="mb-4">Enjoy a warm and inviting atmosphere, perfect for family dinners, romantic
                            dates, or casual gatherings and more..</p>
                        <a class="btn btn-outline-primary border-2 py-2 px-4 rounded-pill" href="">View
                            Gallery</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Menu Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Specialties</h1>
                        <p>Explore our delicious menu, crafted with fresh ingredients and passion. From starters to
                            desserts, we have something for everyone.</p>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill"
                                href="#tab-1">Starter</a>
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
                    <div class="owl-carousel  stater-carousel">
                        @foreach ($appetizers as $appetizer)
                            <div class="product-item shadow mb-3">
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
                        @endforeach
                    </div>
                </div>
                <!-- Main Course Tab -->
                <div id="tab-2" class="tab-pane fade show p-0">
                    <div class="owl-carousel  stater-carousel">
                        @foreach ($mainCourses as $mainCourse)
                            <div class="product-item shadow  mb-3">
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
                        @endforeach
                    </div>
                </div>

                <!-- Desserts Tab -->
                <div id="tab-3" class="tab-pane fade show p-0">
                    <div class="owl-carousel  stater-carousel">
                        @foreach ($desserts as $dessert)
                            <div class="product-item shadow mb-3">
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
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- Menu End -->

    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 " id="testimonial">
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