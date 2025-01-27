@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif

<x-layout image="/images/background.png" text="Collections">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4 shadow-lg">
            <div class="container">
                <ul class="list-group ">
                    <div class="d-grid">
                        <a class="btn btn-primary text-uppercase fw-bold rounded-4"
                                href="{{ route('collections.create') }}" class="a_button">add</a>
                    </div>
                    <!-- List Item  -->
                    @foreach ($collections as $collection)

                    <li class="list-group-item d-flex align-items-center  list-item">
                        {{-- @dd($collection->image); --}}

                        <div><img src="{{ '/storage/' . $collection->image  }}" alt="Avatar" class="w-*, h-* object-fit-* me-5" width="50" height="50"></div>
                    <a href="{{ route('collections.showByName', $collection->name) }}">

                        <div>
                            <h6 class="m-5">{{ $collection->name }}</h6>
                        </div>
</a>
                        <div>
                            <h6 class="m-5">{{ $collection->description }}</h6>
                        </div>
                        <div class="ms-auto">
                                <a class="btn btn-primary btn-lg me-2 rounded-4 justify-content-end" href="{{ route('collections.edit', $collection) }}" class="a_button">Update</a>
                            <form action="{{ route('collections.destroy', $collection) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-lg rounded-4 justify-content-end" value="Delete">
                            </form>
                        </div>
                    </li>

                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>
