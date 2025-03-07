<!DOCTYPE html>
<html lang="en">


<head>
    @include('admin/common/header-links')
</head>


<body>

    @include('admin/common/header')

    <div class="px-3 bg-body">

        <main id="main" class="main">

            <div class="pagetitle mb-5">

                <h1>bookings</h1>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row ps-3 pe-3">
                    <div class="col-12">
                        <div class="card table-responsive shadow">
                            <div class="card-body pt-3 ">

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <h2>Booking : {{ $data->bookings_id }} </h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label for="name" class="form-label">Name : </label>
                                        <span id="name">{{ $data->name }}</span>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="email" class="form-label">Email : </label>
                                        <span id="email">{{ $data->email }}</span>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="number" class="form-label">Phone Number : </label>
                                        <span id="number">{{ $data->number }}</span>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="date" class="form-label">Date : </label>
                                        <span id="date">{{ $data->date }}</span>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="time" class="form-label">Time : </label>
                                        <span id="time">{{ $data->time }}</span>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="guests" class="form-label">Number of Guests : </label>
                                        <span id="guests"> {{ $data->guests }}</span>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label for="table_id" class="form-label">Table ID :</label>
                                        <span class="ms-2" id="table_id">{{ $data->table_id }}</span>
                                    </div>
                                    <div class="col-lg-12 mb-3">
                                        <label for="request" class="form-label">Special Requests : </label>
                                        <span id="request">
                                            @if ($data->request)
                                                {{ $data->request }}
                                            @else
                                                no request
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a class="text-white btn btn-dark " href="{{ route('booking') }}">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </section>

        </main>

    </div>

    @include('admin/common/footer-links')

</body>

</html>
