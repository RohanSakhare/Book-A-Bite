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

                <h1>Contact  </h1>
            </div><!-- End Page Title -->

            <section class="section">
                <div class="row ps-3 pe-3">
                    <div class="col-12">
                        <div class="card table-responsive shadow">
                            <div class="card-body pt-3">

                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <h2>Contact  :</h2>
                                    </div>

                                </div>

                                <table id="table1" class="yajra-datatables table table-striped ta"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Mail</th>
                                            <th>Subject</th>
                                            <th>Message</th>
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
                ajax: "{{ route('contactus_script') }}",
                columns: [{
                        data: 'contactus_id',
                        name: 'contactus_id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'mail',
                        name: 'mail'
                    },
                    {
                        data: 'subject',
                        name: 'subject'
                    },
                    {
                        data: 'message',
                        name: 'message'
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
