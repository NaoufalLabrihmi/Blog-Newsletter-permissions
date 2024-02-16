<x-sectionContainer>
    <div class="flex flex-col justify-between h-screen">
        <header class="flex items-center justify-between py-10">
            <div>
                <a href="{{route('blog.index')}}">
                    <div class="flex items-center justify-between">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('blog.index') }}">
                                <x-application-logo-dark
                                    class="lg:h-10 dark:block hidden w-auto h-8 text-gray-600 fill-current" />
                                <x-application-logo
                                    class="lg:h-10 dark:hidden block w-auto h-8 text-gray-600 fill-current" />
                            </a>
                        </div>
                        <div class="item-center md:block hidden ml-4 sr-only">
                            <h1 class="dark:text-gray-100 text-3xl tracking-wide text-gray-600">Visiarch<span
                                    class="sr-only">architect and apps developers</span></h1>
                        </div>

                    </div>
                </a>
            </div>
            <div class="flex items-center text-base leading-5">
                <div>
                    {{$navigation ?? null}}
                </div>
            </div>
        </header>
        <main class="mb-auto">{{$slot}}</main>
        <div class="py-12">
            <x-footer />
        </div>
    </div>
</x-sectionContainer>