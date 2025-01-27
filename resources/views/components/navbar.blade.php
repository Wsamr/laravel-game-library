@props([
    'text' => 'Game Vault',
])

<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
    <nav class="bg-transparent border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-content-between align-content-end p-6">
{{--            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">--}}
{{--                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />--}}
                <span class="text-white md:pl-16 self-center text-2xl font-semibold whitespace-nowrap dark:text-white text-center">{{ $text }}</span>
{{--            </a>--}}
{{--                <img class="self-center pt-3" src="/images/icons/logo.png" alt="" width="60" height="60">--}}

            <div class="flex md:order-2">
                <x-search-bar></x-search-bar>
                @guest
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a>
                @endguest
                @auth
                <div class="">
                    <a href="{{ route('users.show', Auth::user()->id )}}">
                        <div class="pl-4 flex gap-2">
                            <label class="align-content-center text-white">
                                {{ Auth::user()->name }}
                            </label>
                            <img src={{ ('/storage/' . Auth::user()->profile_pic) ?? "/images/profile.jpg" }} alt="" class="rounded-3xl" width="35" height="35">
                        </div>
                    </a>
                </div>
                @endauth
            </div>
        </div>
    </nav>

</div>
