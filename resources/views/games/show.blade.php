<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif

<x-layout image="{{ '/storage/' . $game->cover_image }}" color="{{ $game->color }}" text="{{ $game->title }}">
    
    <div class="">
        <div class="flex mb-4  bg-transparent text-white">
                    <img src="{{ '/storage/' . $game->poster_image }}" class=" img-fluid w-25 rounded-5" alt="{{ $game->title }}">
            <div class="text-center justify-content-center align-items-center">
                <!-- <p class="card-text p-3 bg-light text-dark rounded fw-bold m-3 desc_font">{{ $game->description }}</p> -->
                <p class="card-text p-3 rounded fw-bold m-3 desc_font" style="background-color: rgba(255, 255, 255, 0.8); color: #000;">
    {{ $game->description }}
</p>

                <p class="card-text">${{ $game->price }}</p>
                <p class="card-text">{{ $game->rating }}/5</p>
                <p class="card-text"><strong>Release Date:</strong> {{ $game->release_date }}</p>
            </div>
             
        </div>
        
        @auth
        <div class="flex">
            <!-- play button -->
            <div class="container text-center mt-5">
                <a class="btn btn-primary rounded-4 w-25">
                    <i class="bi bi-play-fill"></i> Play
                </a>
            </div>
            <!-- play button -->

            <div class="container text-center mt-5">
                <a class="btn btn-primary rounded-4 w-25" href="{{ route('games.attachToCollection', $game->id) }}">
                    <i class="bi bi-play-fill"></i> Favourite
                </a>
            </div>
            <!-- play button -->
            <div class="container text-center mt-5">
                <a class="btn btn-primary rounded-4 w-25" href="{{ route('games.attachToCollection', $game->id) }}">
                    <i class="bi bi-play-fill"></i> Add to List
                </a>
            </div>
        </div>
    {{-- @dd(auth()->user()->is_admin); --}}
        @if(auth()->user()->is_admin || auth()->user()->is_contributor)
            <div class="mb-4">
            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning">Update</a>
            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
            </div>
        @endif
    @endauth
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</x-layout>


