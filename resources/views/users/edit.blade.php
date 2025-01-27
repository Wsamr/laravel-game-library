@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif

<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <x-layout image="/images/background.png" text="{{ $user->name }}">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg">
                <!-- Form -->
                <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="profile_pic" class="mb-2 ">Image</label><br>
                        <div class="input-group ">
                            <input type="file" class="form-control form-control-sm col-md-10 h-50 w-50" name="profile_pic" placeholder="image"><br>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="mb-2 ">Image</label><br>
                        <div class="input-group">
                            <input type="text" class="form-control form-control-sm col-md-10 h-50 w-50" name="name" placeholder="Enter your name" value="{{ $user->name }}"><br>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-envelope-fill text-secondary"></i>
                        </span>
                        <input type="email" class="form-control shadow-none border-0" name="email" placeholder="E-mail" required value="{{ $user->email }}">
                    </div>
                    <!-- Password -->
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-white border-0">
                            <i class="bi bi-lock-fill text-secondary"></i>
                        </span>
                        <input type="password" class="form-control shadow-none border-0" name="password" placeholder="Password">
                    </div>
                     <!-- buttons -->
                <div class="w-100 d-grid">
                    <input class="btn btn-primary rounded-4 fw-bold d-grid w-100" style="margin-right: 150px;" type="submit" value="Update">
                </div>
                </form>
        </div>
    </div>

    </x-layout>
</div>
