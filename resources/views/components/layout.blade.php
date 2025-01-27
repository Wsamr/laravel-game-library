@props([
    'image' => '',
    'color' => '#6B3FA0',
    'text' => ''
])


<html>
<head>
    <title>
        Game Vault
    </title>
    {{--    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))--}}
    {{--        @vite(['resources/bootstrap/css/bootstrap.css', 'resources/bootstrap/js/bootstrap.js'])--}}
    {{--    @endif--}}

    {{--    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))--}}
    {{--        @vite(['resources/css/app.css', 'resources/js/app.js'])--}}
    {{--    @endif--}}

</head>
<body style='background-image: url("{{ $image }}"); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;'>

<div class="">
    <x-navbar text="{{ $text }}"></x-navbar>
    <div class="md:ml-16 px-6">
        {{ $slot }}
    </div>
    <x-navigation color="{{ $color }}"></x-navigation>
</div>

</body>
</html>
