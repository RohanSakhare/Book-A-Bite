<!DOCTYPE html>
<html lang="en">

<head>
    @include('common/header-links')
</head>

<body>

    @include('common/navbar')


    <!-- Page Header Start -->
    <div class="background-garadient">
        <div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <h1 class="display-3 mb-3 animated slideInDown">Features</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a class="text-body" href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-dark active" aria-current="page">Features</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Our Features</h1>
                <p>Experience the finest dining with our unique offerings that cater to every palate. Our commitment to
                    quality and service ensures a memorable experience.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-1.png" alt="">
                        <h4 class="mb-3">Farm-to-Table Freshness</h4>
                        <p class="mb-4">We source our ingredients directly from local farms to ensure the freshest and
                            most flavorful dishes. Every bite is a testament to our dedication to quality.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                        <h4 class="mb-3">Seasonal Menus</h4>
                        <p class="mb-4">Our chefs craft seasonal menus that highlight the best produce available.
                            Enjoy a variety of dishes that change with the seasons, offering something new and exciting
                            every visit.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-3.png" alt="">
                        <h4 class="mb-3">Eco-Friendly Practices</h4>
                        <p class="mb-4">We are committed to sustainability. From reducing food waste to using
                            eco-friendly packaging, we strive to minimize our environmental impact while delivering
                            exceptional dining experiences.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    @include('common/footer')

    @include('common/footer-links')
</body>

</html>
