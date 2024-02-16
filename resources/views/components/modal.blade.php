<div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" class="fixed top-0 left-0 w-full h-full"
        style="display: none;">
        <div class="bg-gray-900/80 flex items-center justify-center w-screen h-screen p-2">
            <div class="md:w-1/2 w-full p-2 bg-white rounded-md shadow-md">
                <button @click="open = false" class="hover:bg-gray-100 px-2 py-2 mb-5 bg-transparent rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                {{ $content }}
            </div>
        </div>
    </div>
</div>