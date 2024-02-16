<x-app-layout>
    <x-slot name="title">Edit Tag</x-slot>
    <div class="py-6">
        <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto">
            <div class="sm:rounded-xl overflow-hidden bg-white shadow-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold">Edit Tag</h1>
                    <form action="{{route('tag.update', $tag->slug)}}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        @include('tags.partials.form_control', ['submit' => 'Update Tag'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>