<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl sm:px-6 lg:px-8 px-4 mx-auto">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('blog.index') }}">
                        <x-application-logo class="lg:h-10 block w-auto h-8 text-gray-600 fill-current" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="sm:-my-px sm:ml-10 sm:flex hidden space-x-8">
                    @can('view dashboard')
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @endcan
                    @can('create post')
                    <x-nav-link :href="route('post.create')" :active="request()->routeIs('post.create')">
                        {{ __('Posts') }}
                    </x-nav-link>
                    @endcan
                    @can('create tag')
                    <x-nav-link :href="route('tag.create')" :active="request()->routeIs('tag.create')">
                        {{ __('Tags') }}
                    </x-nav-link>
                    @endcan
                    @can('view user')
                    <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                        {{ __('Users') }}
                    </x-nav-link>
                    @endcan
                    @can('view subscribe')
                    <x-nav-link :href="route('subscribe.index')" :active="request()->routeIs('subscribe.index')">
                        {{ __('Subscribers') }}
                    </x-nav-link>
                    @endcan

                    <div class="inline-flex items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button @can('view role') disabled="false" @else disabled="true" @endcan
                                    class="hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out">
                                    <div>R&P</div>

                                    <div class="ml-1">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Roles and Permissions -->
                                @can('view role')
                                <x-dropdown-link :href="route('role.index')"
                                    class="{{ request()->routeIs('role.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                                    {{ __('Roles') }}
                                </x-dropdown-link>
                                @endcan
                                @can('view permission')
                                <x-dropdown-link :href="route('permission.index')"
                                    class="{{ request()->routeIs('permission.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                                    {{ __('Permissions') }}
                                </x-dropdown-link>
                                @endcan
                                @can('view assign')
                                <x-dropdown-link :href="route('assign.index')"
                                    class="{{ request()->routeIs('assign.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                                    {{ __('Assign Permissions to Role | web') }}
                                </x-dropdown-link>
                                @endcan
                                @can('view assign')
                                <x-dropdown-link :href="route('assignApi.index')"
                                    class="{{ request()->routeIs('assignApi.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                                    {{ __('Assign Permissions to Role | api') }}
                                </x-dropdown-link>
                                @endcan
                                @can('view assignUser')
                                <x-dropdown-link :href="route('assign.user.index')"
                                    class="{{ request()->routeIs('assign.user.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                                    {{ __('Assign Role to User') }}
                                </x-dropdown-link>
                                @endcan
                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="sm:flex sm:items-center sm:ml-6 hidden">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 flex items-center text-sm font-medium text-gray-500 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="sm:hidden flex items-center -mr-2">
                <button @click="open = ! open"
                    class="hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="sm:hidden hidden">
        <div class="space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <div class="space-y-1">
            <x-responsive-nav-link :href="route('post.create')" :active="request()->routeIs('post.create')">
                {{ __('Posts') }}
            </x-responsive-nav-link>
        </div>
        <div class="space-y-1">
            <x-responsive-nav-link :href="route('tag.create')" :active="request()->routeIs('tag.create')">
                {{ __('Tags') }}
            </x-responsive-nav-link>
        </div>
        <div class="space-y-1">
            <x-responsive-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
                {{ __('Users') }}
            </x-responsive-nav-link>
        </div>
        <div class="space-y-1">
            <x-responsive-nav-link :href="route('subscribe.index')" :active="request()->routeIs('subscribe.index')">
                {{ __('Subscribers') }}
            </x-responsive-nav-link>
        </div>

        <div class="space-y-1">
            <div class="items-center justify-center block px-4 py-2">
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button @can('view role') disabled="false" @else disabled="true" @endcan
                            class="hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 flex items-center text-base font-medium text-gray-500 transition duration-150 ease-in-out">
                            <div>R&P</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Roles and Permissions -->
                        @can('view role')
                        <x-dropdown-link :href="route('role.index')"
                            class="{{ request()->routeIs('role.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                            {{ __('Roles') }}
                        </x-dropdown-link>
                        @endcan

                        @can('view permission')
                        <x-dropdown-link :href="route('permission.index')"
                            class="{{ request()->routeIs('permission.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                            {{ __('Permissions') }}
                        </x-dropdown-link>
                        @endcan
                        @can('view assign')
                        <x-dropdown-link :href="route('assign.index')"
                            class="{{ request()->routeIs('assign.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                            {{ __('Assign Permissions to Role | web') }}
                        </x-dropdown-link>
                        @endcan
                        @can('view assign')
                        <x-dropdown-link :href="route('assignApi.index')"
                            class="{{ request()->routeIs('assignApi.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                            {{ __('Assign Permissions to Role | api') }}
                        </x-dropdown-link>
                        @endcan
                        @can('view assignUser')
                        <x-dropdown-link :href="route('assign.user.index')"
                            class="{{ request()->routeIs('assign.user.index') ? 'border-gray-800 border-l-2' : 'bg-transparent' }}">
                            {{ __('Assign Role to User') }}
                        </x-dropdown-link>
                        @endcan
                    </x-slot>
                </x-dropdown>
            </div>
        </div>


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>