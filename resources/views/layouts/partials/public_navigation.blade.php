<div class="sm:block hidden">
    <div class="flex items-center">
        <x-blog-link href="{{route('blog.index')}}" :active="request()->routeIs('blog.index')">
            Blog
        </x-blog-link>
        <x-blog-link href="{{route('tags.index')}}" :active="request()->routeIs('tags.index')">
            Tags
        </x-blog-link>
        <x-blog-link href="{{route('about.index')}}" :active="request()->routeIs('about.index')">
            About
        </x-blog-link>
        <button class="dark:text-gray-100 ml-5 text-gray-800" @click="darkMode = !darkMode">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
            </svg>
        </button>
        <div class="relative ml-5" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
            <div @click="open = ! open">
                <button class="hover:text-gray-900 dark:text-white dark:hover:text-gray-100 text-gray-700">
                    @auth
                    <p class="font-bold">{{auth()->user()->name}}</p>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    @endauth
                </button>
            </div>

            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95"
                class="absolute right-0 z-50 w-48 mt-2 text-right rounded-md shadow-lg" style="display: none;"
                @click="open = false">
                <div class="ring-1 ring-black dark:ring-white ring-opacity-5 rounded-md">
                    @auth
                    @can('view dashboard')
                    <x-dropdown-link :href="route('dashboard')" class="dark:hover:bg-gray-700 rounded-md">
                        <span class="dark:text-white text-gray-800">{{ __('Dashboard') }}</span>
                    </x-dropdown-link>
                    @endcan
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                                this.closest('form').submit();"
                            class="dark:hover:bg-gray-700 rounded-md">
                            <span class="dark:text-white text-gray-800">{{ __('Log Out') }}</span>
                        </x-dropdown-link>
                    </form>
                    @else
                    <x-dropdown-link :href="route('login')" class="dark:hover:bg-gray-700 rounded-md">
                        <span class="dark:text-white text-gray-800">{{ __('Login') }}</span>
                    </x-dropdown-link>
                    <x-dropdown-link :href="route('register')" class="dark:hover:bg-gray-700 rounded-md">
                        <span class="dark:text-white text-gray-800">{{ __('Register') }}</span>
                    </x-dropdown-link>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sm:hidden relative flex items-center" x-data="{open: false}">
    <div class="mr-3">
        <button class="dark:text-gray-100 ml-5 text-gray-800" @click="darkMode = !darkMode">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
            </svg>
        </button>
    </div>
    <div>
        <button @click="open = !open">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
    <div class="bg-gray-100/90 dark:bg-gray-900/90 top-12 -right-4 absolute z-50 w-screen h-screen" x-show="open"
        @click.outside="open = false">
        <ul class=" p-6 space-y-5 text-lg list-none">
            <li class="text-sm font-thin tracking-widest capitalize border-b">{{env('APP_NAME')}}</li>
            @auth
            <li class="pb-3 mb-5 font-bold border-gray-900">{{auth()->user()->name}}</li>
            <li
                class="p-1 rounded {{request()->routeIs('dashboard') ? 'dark:bg-gray-700 bg-gray-200' : 'bg-transparent'}}">
                <x-blog-link href="{{route('dashboard')}}">
                    {{ __('Dashboard') }}
                </x-blog-link>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                                                                                    this.closest('form').submit();"
                        class="dark:hover:bg-gray-700 rounded-md">
                        <span class="dark:text-white text-gray-800">{{ __('Log Out') }}</span>
                    </x-dropdown-link>
                </form>
            </li>
            @else
            <li class="p-1 rounded {{request()->routeIs('login') ? 'dark:bg-gray-700 bg-gray-200' : 'bg-transparent'}}">
                <a href="{{route('login')}}">
                    Login
                </a>
            </li>
            @endauth
            <li class="border-b">

            </li>
            <li
                class="p-1 rounded {{request()->routeIs('blog.index') ? 'dark:bg-gray-700 bg-gray-200' : 'bg-transparent'}}">
                <x-blog-link href="{{route('blog.index')}}">
                    Blog
                </x-blog-link>
            </li>
            <li
                class="p-1 rounded {{request()->routeIs('tags.index') ? 'dark:bg-gray-700 bg-gray-200' : 'bg-transparent'}}">
                <x-blog-link href="{{route('tags.index')}}">
                    Tags
                </x-blog-link>
            </li>
            <li
                class="p-1 rounded {{request()->routeIs('about.index') ? 'dark:bg-gray-700 bg-gray-200' : 'bg-transparent'}}">
                <x-blog-link href="{{route('about.index')}}">
                    About
                </x-blog-link>
            </li>
        </ul>
    </div>
</div>