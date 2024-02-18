<footer class="mb-16">
    <div class="flex flex-col items-center mt-16">
        <div class="flex mb-3 space-x-4">
            <x-socialIcon>
                <x-slot name="href">https://www.facebook.com/</x-slot>
                <x-slot name="svg">
                    <x-socialIcons.facebook class="lg:h-8 dark:text-gray-100 block w-auto h-6 text-gray-600 fill-current" />
                </x-slot>
            </x-socialIcon>
            <x-socialIcon>
                <x-slot name="href">https://github.com/NaoufalLabrihmi</x-slot>
                <x-slot name="svg">
                    <x-socialIcons.github class="lg:h-8 dark:text-gray-100 block w-auto h-6 text-gray-600 fill-current" />
                </x-slot>
            </x-socialIcon>
            <x-socialIcon>
                <x-slot name="href">mailto:</x-slot>
                <x-slot name="svg">
                    <x-socialIcons.mail class="lg:h-8 dark:text-gray-100 block w-auto h-6 text-gray-600 fill-current" />
                </x-slot>
            </x-socialIcon>
            <x-socialIcon>
                <x-slot name="href">https://www.youtube.com/</x-slot>
                <x-slot name="svg">
                    <x-socialIcons.youtube class="lg:h-8 dark:text-gray-100 block w-auto h-6 text-gray-600 fill-current" />
                </x-slot>
            </x-socialIcon>
        </div>
        <div class="flex space-x-4">
            <a href="{{route('blog.index')}}">WORLD</a>
            <div> • </div>
            <div>{{date("Y")}}</div>
            <div> • </div>
            <p>Reserved</p>
        </div>
    </div>
</footer>