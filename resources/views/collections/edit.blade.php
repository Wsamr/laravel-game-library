@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif

<x-layout image="/images/background.png" text="Create Collection">
<div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg">
            <h2 class="text-center mb-5 fw-bold w-100">Collections</h2>
            <form method="POST" action="{{ route('collections.update', $collection) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- Name Input -->
                <div class="mb-3">
                    <label for="Name" class="mb-2">Name</label><br>
                    <div class="input-group col-md-20">
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="name" value="{{ $collection->name }}">
                        <x-form-error name="name" />
                        <br>
                    </div>
                </div>
                <!-- img input -->
                <div class="mb-3">
                    <label for="img" class="mb-2 ">Image</label><br>
                    <div class="input-group ">
                        <input type="file" class="form-control form-control-sm col-md-10 h-50 w-50" name="image" placeholder="image link" value="{{ $collection->image }}">
                        <x-form-error name="image" />
                        <br>
                    </div>
                </div>
                <!-- Description -->
                <div class="mb-3">
                    <label for="description" class="mb-2 ">Description</label><br>
                    <div class="input-group ">
                        <input type="text" class="form-control form-control-sm col-md-10 h-50 w-50" name="description" placeholder="description"value= "{{ $collection->description}}">
                        <x-form-error name="description" />
                        <br>
                    </div>
                </div>
                <!-- update Button -->
                <input type="submit" class="btn btn-primary w-100 mt-3" value="Update">
            </form>
        </div>
    </div>
</x-layout>