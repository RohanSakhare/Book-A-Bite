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

                        <form action="{{ route('update_appetizer', $data->appetizer_id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- Hidden input to store current image path --}}
                            <input type="hidden" name="current_image" value="{{ $data->image }}">
                            {{-- image field  --}}

                            <div class="row mt-4">
                                <div class="col-lg-6 col-md-6 mt-md-3 col-12 mt-3 mt-lg-0">
                                    <label for="image" class="form-label">Add Image</label>
                                    <input type="file" name="image" id="image" class="form-control"
                                        value="{{ $data->image }}">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" col-lg-6 col-md-6  col-12 text-center mt-md-3 mt-3 mt-lg-0">
                                    <div>
                                        <label for="Image" class="form-label">Previous Image :</label>
                                    </div>
                                    <img src="{{ asset($data->image) }}" alt="image"
                                        class="img-fluid img-thumbnail shadow" style="width: 300px;">
                                </div>

                                <div class="mb-3 col-lg-6 col-md-12 col-12 ">
                                    <div class="form-group">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ $data->title }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 col-lg-6 col-12">
                                    <label for="price_now" class="form-label">New Price</label>
                                    <input type="text" class="form-control" name="price_now" id="price_now"
                                        value="{{ $data->price_now }}" required>
                                    @error('price_now')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-12">
                                    <label for="price_before" class="form-label">Old Price</label>
                                    <input type="text" class="form-control" name="price_before" id="price_before"
                                        value="{{ $data->price_before }}" required>
                                    @error('price_before')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
