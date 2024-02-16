<x-base-layout>
    <main class="dark:text-gray-50 text-gray-800">
        <x-layoutWrapper>
            <x-slot name="navigation">
                @include('layouts.partials.public_navigation')
            </x-slot>
            {{$slot}}
            @yield('content')
        </x-layoutWrapper>
    </main>
</x-base-layout>