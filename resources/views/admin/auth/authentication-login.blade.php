<!doctype html>
<html lang="en">

<head>
    @include('Admin/common/header-links')
    <link rel="stylesheet" href="{{ asset('admin-assets/css/auth.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body>

    {{-- spinner start  --}}
    <div id="preloader">
        <span class="loader"></span>
    </div>
    {{-- spinner end  --}}
    <div class="animated-background">
        <div class="gradient-sphere sphere-1"></div>
        <div class="gradient-sphere sphere-2"></div>
        <div class="gradient-sphere sphere-3"></div>
        <div class="particles" id="particles"></div>
    </div>

    <div class="login-container">
        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Sign in to continue your journey</p>
        </div>

        <form id="loginForm" action="{{ route('login-user') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" class="form-input"  id="email" name="email" placeholder="Email address" required>
                <i class="input-icon fas fa-envelope"></i>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="error-message" id="emailError"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-input" id="password" name="password" placeholder="Password" required>
                <i class="input-icon fas fa-lock"></i>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="error-message" id="passwordError"></span>
            </div>

            <button type="submit" class="submit-button">Sign In</button>
        </form>
    </div>
    <script>
        @if (session('fail'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('fail') }}',
            });
        @endif
    </script>

    @include('Admin/common/footer-links')

</body>

</html>
