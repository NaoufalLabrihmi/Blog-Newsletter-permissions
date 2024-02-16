<x-app-layout>
    <x-slot name="title">Posts</x-slot>
    <div class="py-6">
        <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto">
            <div class="sm:rounded-xl overflow-hidden bg-white shadow-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold">Posts</h1>
                    <form action="{{route('post.store')}}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @include('posts.partials.form_control', [
                        'submit' => 'Create post',
                        ])
                    </form>
                    <div class="my-8">
                        @include('posts.partials.posts_table')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>