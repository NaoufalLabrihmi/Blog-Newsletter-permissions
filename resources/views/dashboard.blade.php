@section('title','Dashboard')
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl sm:px-6 lg:px-8 px-2 mx-auto">
            <div class="md:grid-cols-4 grid grid-cols-2 gap-4">
                @can('create post')
                <x-ds_card_a>
                    <a href="{{ route('post.create') }}" class="text-lg font-normal text-gray-900">Posts : {{
                        $postCount }}</a>
                </x-ds_card_a>
                @endcan
                @can('create tag')
                <x-ds_card_a>
                    <a href="{{ route('tag.create') }}" class="text-lg font-normal text-gray-900">Tags : {{ $tagCount
                        }}</a>
                </x-ds_card_a>
                @endcan
                @can('view user')
                <x-ds_card_a>
                    <a href="{{ route('user.index') }}" class="text-lg font-normal text-gray-900">Users : {{ $userCount
                        }}</a>
                </x-ds_card_a>
                @endcan
                @can('view subscribe')
                <x-ds_card_a>
                    <a href="{{ route('subscribe.index') }}" class="text-lg font-normal text-gray-900">Subscribers : {{
                        $subscribeCount }}</a>
                </x-ds_card_a>
                @endcan

            </div>
            <div class="mt-4">
                <x-ds_card_a>
                    <h1>Google Analytic</h1>
                </x-ds_card_a>
            </div>
        </div>
    </div>
</x-app-layout>