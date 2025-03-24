<!DOCTYPE html>
<html lang="en">

<head>

    @include('common/header-links')

</head>

<body>

    @include('common/navbar')

    <!-- Page Header Start -->
    <div class="background-garadient">
        <div class="container-fluid  page-header wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="display-3 mb-3 animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="{{ asset('assets/img/features/cozy.jpg') }}"
                            alt="restaurant img">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Delicious Food, Great Ambiance, Unforgettable Experience</h1>
                    <p class="mb-4">Welcome to The Book A Bite, where we serve delicious dishes made with the
                        freshest
                        ingredients sourced
                        locally. Our mission is to provide a memorable dining experience for every guest, whether you're
                        joining
                        us for a casual lunch or a special celebration.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Talented Chefs</p>
                    <p><i class="fa fa-check text-primary me-3"></i> traditional recipes and
                        innovative culinary techniques</p>
                    <p><i class="fa fa-check text-primary me-3"></i>offering a diverse menu</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

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

    @include('common/footer')

    @include('common/footer-links')
</body>

</html>
