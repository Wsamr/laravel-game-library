
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/home.css'])
@endif
   <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->

<x-layout text="Home" image="images/background.png" >
    <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach ($categories->chunk(4) as $index => $chunk)
                <button type="button" data-bs-target="#categoryCarousel" data-bs-slide-to="{{ $index }}"
                    class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}"></button>
            @endforeach
        </div>

        <!-- Carousel Items -->
        <div class="carousel-inner">
            @foreach ($categories->chunk(4) as $chunkIndex => $chunk)
                <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach ($chunk as $category)
                            <div class="col-lg-3 col-md-4 col-6">

                                <div class="card" data-category-id="{{ $category->id }}">
                                    <img src="{{ '/storage/' . $category->icon }}" class="card-img-top" alt="{{ $category->name }}">
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $category->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container my-4">
        <div class="row">
            @foreach ($games as $game)
                <div class="col-lg-3 col-md-4 col-6 mb-4"> <!-- Responsive columns -->
                    <div class="card h-100">
                        <!-- Game Image -->
                        <a href="{{route('games.show', $game)}}">
                        <img src="{{ '/storage/' . $game->poster_image  }}" height="150" class="card-img-top" alt="{{ $game->title }}">
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
{{--    <script>--}}
{{--        document.querySelectorAll('.card').forEach(function(card) {--}}
{{--    card.addEventListener('click', function() {--}}
{{--        let categoryId = this.getAttribute('data-category-id');--}}

{{--        fetch(/get-games/${categoryId})--}}
{{--            .then(response => response.json())--}}
{{--            .then(data => {--}}
{{--                let gamesContainer = document.getElementById('games-container');--}}
{{--                gamesContainer.innerHTML = '';--}}
{{--                data.games.forEach(function(game) {--}}
{{--                    let gameElement = document.createElement('div');--}}
{{--                    gameElement.classList.add('game-card');--}}
{{--                    gameElement.innerHTML = `--}}
{{--                        <img src="${game.image}" alt="${game.name}">--}}
{{--                        <h5>${game.name}</h5>--}}
{{--                    `;--}}
{{--                    gamesContainer.appendChild(gameElement);--}}
{{--                });--}}
{{--            })--}}
{{--            .catch(error => console.error('Error:', error));--}}
{{--    });--}}
{{--});--}}
{{--    </script>--}}
</x-layout>
