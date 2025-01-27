@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])
@endif
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
<x-layout image="/images/background.png" text="Dashboard">

    <div class="row justify-content-center g-4 text-white">
        <div class="col-auto">
          </div>
          <div class="col-auto">
{{--            @auth--}}
{{--                @if (Auth::user()->is_admin)--}}
{{--                    <x-circle-button color='btn-primary' action="{{ route('users.index') }}">--}}
{{--                        Users--}}
{{--                    </x-circle-button>--}}
{{--                @endif--}}
{{--            @endauth--}}
          </div>
           <div class="col-auto">
            <x-circle-button color='btn-secondary' action="{{ route('games.index') }}">
                Games
            </x-circle-button>
          </div>
          <div class="col-auto">
            <x-circle-button color='btn-danger' action="{{ route('categories.index') }}">
              Categories
          </x-circle-button>

          </div>

      </div>
</x-layout>
