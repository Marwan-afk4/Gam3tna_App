<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="background">
        <div class="container mt-5">
            <h2>Login</h2>
            <form class="row g-3 needs-validation" action="{{ route('login') }}" method="POST" novalidate>
                @csrf
                <div class="col-md-6">
                    <label for="validationCustomEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="validationCustomEmail" placeholder="Enter your email" required>
                    @error('email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="validationCustomPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="validationCustomPassword" placeholder="Enter your password" required>
                    @error('password')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
            <div class="mt-3 text-center">
                <p>Don't have an account? <a href="{{ route('signup') }}" class="signup-link">Sign up here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
