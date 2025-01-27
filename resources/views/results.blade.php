@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/home.css'])
@endif
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<x-layout text="Search results" image="/images/background.png">
    <div class="container my-4">
        <div class="row">
            @foreach ($games as $game)
                <div class="col-lg-3 col-md-4 col-6 mb-4"> <!-- Responsive columns -->
                    <div class="card h-100">
                        <!-- Game Image -->
                        <a href="{{route('games.show', $game)}}">

                        <img src="{{ '/storage/' . $game->poster_image }}" height="150" class="card-img-top" alt="{{ $game->title }}">
                        </a>
                            <!-- Card Body -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->title}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
