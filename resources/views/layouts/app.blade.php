<x-base-layout>
    <main class="bg-gray-50">
        <div class="min-h-screen">
            @include('layouts.partials.admin_navigation')
            <!-- Page Content -->
            <section>
                {{ $slot }}
            </section>
        </div>
    </main>
</x-base-layout>