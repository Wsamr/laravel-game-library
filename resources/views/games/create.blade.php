@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif

<x-layout image="/images/background.png" text="Create Game">
<div class="container d-flex justify-content-center align-items-center">
        <div class="card shadow-lg">
            <div class="container">
                <div class="card p-4">
                    <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title and Description -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
                                <x-form-error name="title" />
                            </div>
                            <div class="col-md-6">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" placeholder="Description" name="description">
                                <x-form-error name="description" />
                            </div>
                        </div>
            
                        <!-- Price and Release Date -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Price" name="price">
                                <x-form-error name="price" />
                            </div>
                            <div class="col-md-6">
                                <label for="release-date" class="form-label">Release Date</label>
                                <input type="date" class="form-control" id="release-date" name="release_date">
                                <x-form-error name="release-date" />
                            </div>
                        </div>
            
                        <!-- Poster Image and Cover Image -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="poster-image" class="form-label">Poster Image</label>
                                <input type="file" class="form-control" id="poster-image" name="poster_image">
                                <x-form-error name="poster-image" />
                            </div>
                            <div class="col-md-6">
                                <label for="cover-image" class="form-label">Cover Image</label>
                                <input type="file" class="form-control" id="cover-image" name="cover_image">
                                <x-form-error name="cover-image" />
                            </div>
                        </div>
            
                        <!-- Color -->
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label for="color" class="form-label">Color</label>
                                <input type="color" class="form-control" id="color" placeholder="Color" name="color">
                                <x-form-error name="color" />
                            </div>
                        </div>
            
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-5">ADD</button>
                        </div>
                    </form>
                </div>
            </div>     
    </div>
    </div>
</x-layout>
