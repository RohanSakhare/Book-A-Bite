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

                <h1>Header</h1>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row ps-3 pe-3">
                    <div class="col-12">
                        <div class="card table-responsive shadow">
                            <div class="card-body pt-3">

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <h2>Header :</h2>
                                    </div>
                                    <div class="col-lg-6 mb-2 text-end">

                                        <a href="{{ route('add_header') }}" class="btn btn-primary">Add</a>

                                    </div>

                                </div>
                                <table id="table1" class="yajra-datatables table table-striped ta"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Img</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody  class="align-baseline">
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
                ajax: "{{ route('header_script') }}",
                columns: [{
                        data: 'header_id',
                        name: 'header_id'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'title',
                        name: 'title'
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
