@section('title','Tags')
<x-public-layout>
    <section>
        <div
            class="dark:divide-gray-700 md:mt-24 md:flex-row md:items-center md:justify-center md:space-x-6 flex flex-col items-start justify-start divide-gray-200">
            <div class="md:space-y-5 pt-6 pb-8 space-x-2">
                <h1
                    class="dark:text-gray-100 sm:text-4xl sm:leading-10 md:leading-10 md:border-r-2 md:px-6 md:text-6xl text-3xl font-extrabold leading-9 tracking-tight text-gray-900">
                    {{$title ?? 'Tag'}}
                </h1>
            </div>
            <div class="flex flex-wrap max-w-lg space-x-1 space-y-1">
                @foreach ($tags as $tag)
                <div class="flex items-center">
                    <x-tag>
                        <a href="{{route('tag.show', $tag->slug)}}">
                            {{$tag->name}}
                            <span class="dark:text-gray-100 text-xs text-gray-700">({{$tag->posts()->count()}})</span>
                        </a>
                    </x-tag>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-public-layout>