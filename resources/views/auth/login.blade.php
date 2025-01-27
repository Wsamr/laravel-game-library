<!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->

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
    <title>log in</title>
</head>
<body>
<div class="vh-100 flex align-items-center justify-content-center">
    <div class="row w-75 shadow-lg rounded-4 overflow-hidden">
        <!-- Left Side -->
        <div class="col-md-6 bg-light p-5">
            <h2 class="fw-bold mb-4 text-dark">Welcome back!</h2>
            <!-- Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <!-- Email -->
                <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-envelope-fill text-secondary"></i>
                        </span>
                    <input type="email" name="email" class="form-control shadow-none border-0" placeholder="E-mail"
                           required>
                    <x-form-error name="email" />

                </div>
                <!-- Password -->
                <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-lock-fill text-secondary"></i>
                        </span>
                    <input type="password" name="password" class="form-control shadow-none border-0"
                           placeholder="Password" required>
                    <x-form-error name="password" />

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
                <!-- Log in Button -->
                <div class="d-grid">
                    <button class="btn btn-primary text-uppercase fw-bold">Log In</button>
                </div>
            </form>
            <!-- Doesn't Have an Account -->
            <p class="mt-4 text-center text-secondary">
                doesn't have an account? <a href="/register" class="text-primary">Sign Up</a>
            </p>

        </div>
        <!-- Right Side -->
        <div class="col-md-6 d-flex align-items-center justify-content-center  bg-prestige-nami bg-cover">
            <div class="text-center p-4">
            </div>
        </div>
    </div>
</div>
<script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
