@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif

<x-layout image="/images/background.png" text="Create Category">
<div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center mb-5 fw-bold w-100">Categories</h2>
            <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Name Input -->
                <div class="mb-3">
                    <label for="Name" class="mb-2">Name</label><br>
                    <div class="input-group col-md-20">
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="name">
                        <x-form-error name="name" />
                        <br>
                    </div>
                </div>
                <!-- img input -->
                <div class="mb-3">
                    <label for="img" class="mb-2 ">Image</label><br>
                    <div class="input-group ">
                        <input type="file" class="form-control form-control-sm col-md-10 h-50 w-50" name="icon" placeholder="image link">
                        <x-form-error name="icon" />
                        <br>
                    </div>
                </div>
                <!-- Color -->
                <div class="mb-3">
                    <label for="color" class="mb-2 ">Color</label><br>
                    <div class="input-group ">
                        <input type="color" class="form-control form-control-sm col-md-10 h-50 w-50" name="color" placeholder="color">
                        <x-form-error name="color" />
                        <br>
                    </div>
                </div>
                <!-- Add Button -->
                <input type="submit" class="btn btn-primary w-100 mt-3" value="Add">
            </form>
        </div>
    </div>
</x-layout>