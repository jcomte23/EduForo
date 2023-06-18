<x-guest-layout>
    @if (Route::has('login'))
        <div x-data="{ open: false }" class="relative sm:fixed sm:top-0 p-3 text-right z-10">
            <div class="relative">
                <button @click="open = !open" type="button"
                    class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-white">
                    {{ __('Lang') }}
                    <svg x-bind:class="{ 'rotate-180': open }"
                        class="w-5 h-5 ml-2 -mr-1 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 -mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 w-max"
                    role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                    <div class="py-1 text-center" role="none">
                        <a href="{{ route('lang', 'es') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">Español</a>
                        <a href="{{ route('lang', 'fr') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">Français</a>
                        <a href="{{ route('lang', 'en') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">English</a>
                        <a href="{{ route('lang', 'it') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                            role="menuitem">Italiano</a>
                    </div>
                </div>
            </div>

            <div class="sm:fixed sm:top-0 sm:right-0 p-3 text-right z-10">
                <div class="">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">{{ __('Dashboard') }}</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">{{ __('Log in') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    @endif

    <div class="min-h-screen justify-center items-center pt-6 sm:pt-0">
        <center>
            <a href="/">
                <img src="{{ asset('img/logoAPP.png') }}" alt="Logo Aplication" width="10%" class="py-2">
            </a>
        </center>
        <h2 class="text-2xl text-center font-semibold">EduForo</h2>
        @forelse ($posts as $post)
            <div class="mt-6 ml-20 mr-20 px-6 py-4 bg-white sm:rounded-lg dark:bg-gray-800 shadow-md overflow-hidden ">
                <div class="p-6 border-b border-indigo-600 dark:border-white">
                    <div class="flex items-center">
                        <h4 class="text-lg font-semibold flex-grow-0">{{ $post->created_at->diffForHumans() }}</h4>
                        <img src="{{ $post->unionTblUsers->profile_photo_url }}" alt=""
                            class="ml-auto rounded-full">
                    </div>

                    <p class="mt-2 text-justify">{{ $post->message }}</p>

                    <div class="mt-4 flex items-center">
                        <span> {{ __('Posted by') }} :</span>
                        <span class="ml-2 text-blue-500">{{ $post->unionTblUsers->name }}</span>
                    </div>
                </div>
            </div>
        @empty
            <h1>No hay publicaciones creadas</h1>
        @endforelse
    </div>
    <div class="flex justify-center text-lg py-4">
        {{ $posts->links() }}
    </div>

</x-guest-layout>
