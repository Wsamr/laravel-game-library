@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif

<div>
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
    <x-layout image="/images/background.png" text="{{ $user->name }}">
        <div class="container d-flex justify-content-center align-items-center">
                <form action="/logout" method="POST" id="logout">
                @csrf
                @method('DELETE')
                    <!-- Profile Photo -->
                   <div class="text-center">
                        <div class="d-flex justify-content-center">
                        <img src="{{ '/storage/' . $user->profile_pic }}"
                           class="img_profile rounded-circle img-fluid circle-image"
                                     alt="Profile Image">

                        </div>
                    </div><br>
                    <!-- Name -->
                    <div class="input-group mb-3  bg-white text-center rounded-4">
                        <label for="text" class="form-label text-center w-100"> {{ $user->username }}</label>
                    </div>
                    <!-- Email -->
                    <div class="input-group mb-3 bg-white text-center rounded-4">
                        <label for="email" class="form-label text-center w-100">{{ $user->email }}</label>
                    </div>
                    <!-- buttons -->
                    <div class=" d-grid">
                    <a class="btn btn-primary rounded-4 fw-bold w-100 mt-3 a_button" style="margin-right: 150px;" href="{{ route('users.edit', $user->id) }}" >
                        Update
                    </a>
                    <button form="logout" class="btn btn-primary rounded-4 fw-bold w-100 mt-2 " style="margin-right: 150px;" >Logout</button>
                   </div>
                </form>
        </div>
    </x-layout>
</div>
