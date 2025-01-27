@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif

<x-layout image="/images/background.png" text="Categories">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg">
            <div class="container mt-5">
                <ul class="list-group ">
                    <div class="d-grid">
                    <a class="btn btn-primary text-uppercase fw-bold rounded-4 m-5"
                                href="{{ route('categories.create') }}" class="a_button">add</a>
                    </div>
                    <!-- List Item  -->
                    @foreach ($categories as $category)
                    <li class="list-group-item d-flex align-items-center  list-item">
                        {{-- @dd($category->icon); --}}
                        <div><img src="{{ '/storage/' . $category->icon  }}" alt="Avatar" class="w-*, h-* object-fit-* me-5" width="50" height="50"></div>
                        <div>
                            <h6 class="m-5">{{ $category->name }}</h6>
                        </div>
                        <div class="ms-auto">
                                <a class="btn btn-primary btn-lg me-2 rounded-4 justify-content-end" href="{{ route('categories.edit', $category) }}" class="a_button">Update</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-lg rounded-4 justify-content-end">Delete</button>
                            </form>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>
