@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endif

@props([
    'color' => ''
])

{{--            sm:h-16 sm:w-screen sm:bottom-0--}}
<div class="fixed md:top-0 md:left-0 md:h-screen md:w-16 sm:bottom-0 sm:left-0 sm:right-0 m-0 flex md:flex-col text-white sm:flex-row bg-cover backdrop-blur-lg sm:mt-10">
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->

{{--    <img class="self-center pt-3" src="/images/icons/logo.png" alt="" width="60" height="60">--}}

    <div class="flex md:flex-col sm:flex-row justify-center flex-grow gap-2">
        <x-navigation-item
            color="{{ $color }}"
            :active="request()->is('home*')"
            href="{{ route('home') }}"
            image="/images/icons/home.png">
        </x-navigation-item>
        <x-navigation-item
            color="{{ $color }}"
            :active="request()->is('collections/Library')"
            href="{{ route('collections.showByName', 'Library')}}"
            image="/images/icons/library.png">
        </x-navigation-item>
        <x-navigation-item
            color="{{ $color }}"
            :active="request()->is('collections/Favorite')"
            href="{{ route('collections.showByName', 'Favorite')}}"
            image="/images/icons/favorite.png">
        </x-navigation-item>
        <x-navigation-item
            color="{{ $color }}"
            :active="request()->is('collections')"
            href="{{ route('collections.index') }}"
            image="/images/icons/collections.png">
        </x-navigation-item>
        <x-navigation-item
            color="{{ $color }}"
            :active="request()->is('dashboard')"
            href="{{ route('dashboard') }}"
            image="/images/icons/dashboard.png">
        </x-navigation-item>

    </div>
</div>
