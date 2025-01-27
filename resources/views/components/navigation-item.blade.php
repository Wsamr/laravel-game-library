@props([
    'color' => '',
    'active' => false,
    'href' => '#',
    'image' => ''
])

<a href="{{ $href }}"
    @if($active)
        class="hover:rounded-xl transition-all duration-300 ease-linear cursor-pointer"
        style="
        border-left-width: 3px;
        border-color: {{ $color }};
        border-radius: 0; /*DO NOT DELETE to prevent border from getting rounded by child */
        "
    @endif
>
    <div class="relative flex items-center justify-center
            h-12 w-12 mt-2 mb-2 mx-auto text-white
            rounded-3xl hover:rounded-xl
            transition-all duration-300 ease-linear cursor-pointer"
         @if($active)
             style='background: {{ $color }};'
         @else
             onmouseover="this.style.backgroundColor='{{ $color }}';"
             onmouseout="this.style.backgroundColor='transparent';"
         @endif
    >

        <img src="{{ $image }}" width="30" height="30" alt="">

    </div>
</a>

