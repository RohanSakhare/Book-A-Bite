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

                <h1>Add</h1>

            </div><!-- End Page Title -->

            <section class="section ps-3 pe-3 mt-5">
                <div class="text-center mb-3">
                    <h1>Add Form</h1>
                </div>
                <div class="card shadow">
                    <div class="card-body pt-3">
                        <form action="{{ route('store_dessert') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-lg-6 col-12">
                                    <label for="image" class="form-label">Add Image</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-12">
                                    <label for="price_now" class="form-label">New Price</label>
                                    <input type="text" class="form-control" name="price_now" id="price_now"
                                        placeholder="price_now">
                                    @error('price_now')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-lg-6 col-12">
                                    <label for="price_before" class="form-label">Old Price</label>
                                    <input type="text" class="form-control" name="price_before" id="price_before"
                                        placeholder="price_before">
                                    @error('price_before')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>

            </section>

        </main>

    </div>

    @include('admin/common/footer-links')


</body>

</html>
