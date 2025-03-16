<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin/common/header-links')
</head>


<body>

    @include('admin/common/header')
    {{-- @dd('messsage') --}}
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
                        <form action="{{ route('store_features') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row ">

                                <div class="mb-3 col-lg-6 col-12">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-lg-6 col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description"
                                        placeholder="add description"></textarea>
                                    @error('description')
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
