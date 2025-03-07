</div>
</div>
<script src="{{ asset('admin-assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin-assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin-assets/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('admin-assets/js/app.min.js') }}"></script>
<script src="{{ asset('admin-assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin-assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ asset('admin-assets/js/dashboard.js') }}"></script>

<!-- Include only one version of jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include DataTables scripts -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

{{-- sweet alert  --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@if (Session::has('success'))
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'Close'
            });
        });
    </script>
    @php
        Session::forget('success');
    @endphp
@endif

@if (Session::has('error'))
    <script type="text/javascript">
        $(document).ready(function() {
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Close'
            });
        });
    </script>
    @php
        Session::forget('error');
    @endphp
@endif

<script>
    function confirmDelete(aboutId) {
        Swal.fire({
            title: "Are you sure?",
            text: "You Want to Delete it !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form if the user confirms
                document.getElementById('delete-form-' + aboutId).submit();
            }
        });
    }
</script>
