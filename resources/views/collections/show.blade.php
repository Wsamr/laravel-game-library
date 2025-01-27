<!-- Nothing worth having comes easy. - Theodore Roosevelt -->
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif


<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->

<x-layout image="/images/background.png" text="{{ $collection->name }}">
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
        @foreach($collection->games as $game)
            <div
                class="backdrop-blur-sm bg-transparent text-white rounded-3xl p-4 border-purple-300 border-2 justify-between">
                {{--                        <img src="{{ $game->poster_image }}" class="card-img-top" alt="{{ $game->title }}">--}}
                <div class="flex flex-col justify-end">
                    <a href="{{route('games.show', $game)}}">
                        <h5 class="card-title">{{ $game->title }}</h5>
                    </a>
                    <p class="card-text">{{ $game->description }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ $game->price }}</p>
                    <p class="card-text"><strong>Rating:</strong> {{ $game->rating }}/5</p>
                    <div class="flex flex-col justify-stretch flex-grow">

                        <a href="{{ $game->epic_link }}" class="btn btn-primary">Epic Store</a>
                        <a href="{{ $game->steam_link }}" class="btn btn-secondary">Steam</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
