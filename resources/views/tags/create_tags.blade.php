<x-app-layout>
    <x-slot name="title">Tags</x-slot>
    <div class="py-6">
        <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto">
            <div class="sm:rounded-xl overflow-hidden bg-white shadow-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold">Tags</h1>
                    <form action="{{route('tag.store')}}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @include('tags.partials.form_control', [
                        'submit' => 'Create Tag',
                        'hidden' => 'hidden'
                        ])
                    </form>
                    <div class="md:mt-0 mt-5">
                        @include('tags.partials.tags_table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>