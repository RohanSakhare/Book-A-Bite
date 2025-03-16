<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin/common/header-links')
</head>


<body>

    @include('admin/common/header')

    <div class="px-3 bg-body">

        <main id="main" class="main">

            <div class="pagetitle">

                <h1>Edit</h1>

            </div><!-- End Page Title -->

            <section class="section ps-3 pe-3 mt-5">
                <div class="card  mt-3 shadow">
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('update_features', $data->features_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="row mt-4">

                                <div class="col-lg-6 col-md-12 col-12 mt-3">
                                    <div class="form-group">
                                        <label for="title" class="form-label">title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ $data->title }}" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-12 mt-3">
                                    <div class="form-group">
                                        <label for="description" class="form-label">description</label>
                                        <input type="text" name="description" id="description" class="form-control"
                                            value="{{ $data->description }}" required>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                        </form>
                    </div>
                </div>
            </section>




        </main><!-- End #main -->

    </div>

    @include('admin/common/footer-links')


</body>

</html>
