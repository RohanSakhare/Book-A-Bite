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
                            <div class="card-body pt-3">

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <h2>bookings :</h2>
                                    </div>


                                </div>
                                <table id="table1" class="yajra-datatables table table-striped ta"
                                    style="width:100%">
                                    <thead >
                                        <tr >
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>number</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>guests</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-baseline">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </section>

        </main>

    </div>

    @include('admin/common/footer-links')

    <script>
        $(document).ready(function() {
            var table = $('#table1').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('booking_script') }}",
                columns: [{
                        data: 'bookings_id',
                        name: 'bookings_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'number',
                        name: 'number'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'guests',
                        name: 'guests'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        });
    </script>

</body>

</html>
