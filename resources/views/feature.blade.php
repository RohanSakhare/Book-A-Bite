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
            <div class="row g-4 justify-content-center">
                @foreach ($features as $feature)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.{{ $loop->iteration * 2 }}s">
                        <div class="bg-white text-center h-100 p-4 p-xl-5 shadow">
                            <h4 class="mb-3">{{ $feature->title }}</h4>
                            <p class="mb-4">{{ $feature->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Feature End -->


    @include('common/footer')

    @include('common/footer-links')
</body>

</html>
