<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style3.css">
    <title>Sign up</title>
</head>
<body>
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-75 shadow-lg rounded-4 overflow-hidden bg-prestige-nami bg-cover">
        <!-- Left Side -->
        <div class="col-md-6 bg-light p-5">
            <h2 class="fw-bold mb-4 text-dark">Welcome!</h2>
            <!-- Form -->
            <form action="{{ route('auth.register') }}" method="POST">
                @csrf
                <!-- Name -->
                <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-person-fill text-secondary"></i>
                        </span>
                    <input type="text" name="name" class="form-control shadow-none border-0" placeholder="Name" required>
                    <x-form-error name="name" />
                </div>
                <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-person-fill text-secondary"></i>
                        </span>
                    <input type="text" name="username" class="form-control shadow-none border-0" placeholder="Username" required>
                    <x-form-error name="username" />
                </div>
                <!-- Email -->
                <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-envelope-fill text-secondary"></i>
                        </span>
                    <input type="email" name="email" class="form-control shadow-none border-0" placeholder="E-mail" required>
                    <x-form-error name="email" />
                </div>
                <!-- Password -->
                <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-lock-fill text-secondary"></i>
                        </span>
                    <input type="password" name="password" class="form-control shadow-none border-0" placeholder="Password" required>
                    <x-form-error name="password" />
                </div>
                <!-- Confirm Password -->
                <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-lock-fill text-secondary"></i>
                        </span>
                    <input type="password" name="password_confirmation" class="form-control shadow-none border-0" placeholder="Confirm Password"
                           required>
                    <x-form-error name="password_confirmation" />
                </div>
                <!-- Terms Checkbox -->
                <div class="form-check mb-4">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label text-secondary" for="terms">
                        I read and agree to <a href="#" class="text-primary">Terms & Conditions</a>
                    </label>
                </div>
                <!-- social media -->
                <div class="icon-container">
                    <!-- PlayStation Icon -->
                    <a href="#" class="icon-playstation">
                        <i class="fa-brands fa-playstation"></i>
                    </a>
                    <!-- Xbox Icon -->
                    <a href="#" class="icon-xbox">
                        <i class="fa-brands fa-xbox"></i>
                    </a>
                    <!-- Apple Icon -->
                    <a href="#" class="icon-apple">
                        <i class="fa-brands fa-apple"></i>
                    </a>
                    <!-- Google Icon -->
                    <a href="#" class="icon-google">
                        <i class="fa-brands fa-google"></i>
                    </a>
                    <!-- Facebook Icon -->
                    <a href="#" class="icon-facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                </div>
                <br>
                <!-- Create Account Button -->
                <div class="d-grid">
                    <input class="btn btn-primary text-uppercase fw-bold" type="submit" value="Sign Up">
                </div>
            </form>
            <!-- Already Have an Account -->
            <p class="mt-4 text-center text-secondary">
                Already have an account? <a href="/login" class="text-primary">Log in</a>
            </p>
        </div>

        <!-- Right Side -->
        <div class="col-md-6 d-flex align-items-center justify-content-center text-white">
            <div class="text-center p-4">
            </div>
        </div>
    </div>
</div>
{{--<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>--}}

</body>
</html>

