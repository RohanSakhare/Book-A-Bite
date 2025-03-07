<!doctype html>
<html lang="en">

<head>
    @include('Admin/common/header-links')
    <link rel="stylesheet" href="{{ asset('admin-assets/css/auth.css') }}">
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

        <form id="loginForm" action="{{ route('register-user') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="name" class="form-input" id="name" name="name" placeholder="Name"
                    value="{{ old('name') }}" required>
                    <i class="input-icon fa-regular fa-user"></i>
                {{-- <i class="input-icon fas fa-envelope"></i> --}}
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="error-message" id="emailError"></span>
            </div>
            <div class="form-group">
                <input type="email" class="form-input" id="email" name="email" placeholder="Email address"
                    required>
                <i class="input-icon fas fa-envelope"></i>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="error-message" id="emailError"></span>
            </div>

            <div class="form-group">
                <input type="password" class="form-input" id="password" name="password" placeholder="Password"
                    required>
                <i class="input-icon fas fa-lock"></i>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <span class="error-message" id="passwordError"></span>
            </div>

            <button type="submit" class="submit-button">Sign up</button>

            <div class="d-flex login-header mt-2 align-items-center justify-content-center">
                <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                <a class="text-primary fw-bold ms-2" href="{{ route('login') }}">Sign In</a>
            </div>
        </form>
    </div>
    @include('admin/common/footer-links')
</body>

</html>
