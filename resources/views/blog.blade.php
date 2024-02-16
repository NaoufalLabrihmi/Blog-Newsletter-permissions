@section('title','Blog | Visiarch')
@section('meta_keywords', $tags->pluck('name')->implode(', '))
@section('meta_description', $posts->pluck('description')->implode(', '))
<x-public-layout>
    <section class="pb-6 border-b border-gray-300">
        <div>
            <div class="md:space-y5 pt-6 pb-8 space-y-2">
                <h2
                    class="dark:text-gray-100 sm:text-4xl sm:leading-10 md:text-5xl md:leading-snug text-3xl font-extrabold leading-9 tracking-tight text-gray-900">
                    {{ $title ?? 'All Post'}}
                </h2>
            </div>
            <div class="md:flex-row flex flex-col">
                <form action="{{route('posts.search')}}" method="get" class="flex flex-row">
                    <div class="relative max-w-lg">
                        <input id="query" name="query" type="text" aria-label="Search post"
                            placeholder="Search blog post"
                            class="focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-black w-full px-4 rounded-md">
                    </div>
                    <div class="flex ml-2">
                        <x-button_public>
                            Search
                        </x-button_public>
                    </div>
                </form>
                <div class="md:ml-8 md:mt-0 md:flex-row flex flex-col mt-8">
                    <div>
                        @isset($popularWeek)
                        <h2 class="dark:text-gray-400 text-xs tracking-wide text-gray-500 uppercase">
                            Most viewed this week </h2>
                        <div class="flex flex-row space-x-2">
                            @foreach ($popularWeek as $item)
                            <div class="hover:text-sky-600 dark:hover:text-sky-400 text-sky-500">
                                <a class="mr-4" href="{{route('post.show', $item->slug)}}">{{$item->title}}</a>
                            </div>
                            @endforeach
                        </div>
                        @endisset
                    </div>
                    <div class="md:ml-5 md:mt-0 mt-5 ml-0">
                        @isset($popularDay)
                        <h2 class="dark:text-gray-400 text-xs tracking-wide text-gray-500 uppercase">
                            Most viewed today </h2>
                        <div class="flex flex-row space-x-2">
                            @foreach ($popularDay as $item)
                            <div class="hover:text-sky-600 dark:hover:text-sky-400 text-sky-500">
                                <a class="mr-4" href="{{route('post.show', $item->slug)}}">{{$item->title}}</a>
                            </div>
                            @endforeach
                        </div>
                        @endisset
                    </div>

                </div>

            </div>
        </div>
    </section>
    <section>
        <ul class="dark:divide-gray-700 divide-y divide-gray-200" style="padding-left: -1rem">
            @if ($posts->count() === 0)
            <li class="py-8 list-none">No Content</li>
            @else
            @foreach ($posts as $post)
            <li class="py-8 list-none">
                <article class="xl:grid xl:grid-cols-4 xl:items-baseline xl:space-y-0 space-y-2">
                    <dl>
                        <dt class="sr-only">Published on</dt>
                        <dd class="dark:text-gray-400 text-base font-medium leading-6 text-gray-500">
                            <time datetime="{{$post->created_at}}">{{$post->created_at->diffForHumans()}}</time>
                        </dd>
                    </dl>
                    <div class="xl:col-span-3 space-y-3">
                        <div>
                            <h3 class="text-2xl font-bold leading-8 tracking-tight">
                                <a href="{{route('post.show', $post->slug)}}" class="dark:text-gray-100 text-gray-900">
                                    {{$post->title}}
                                </a>
                            </h3>
                            <div class="flex flex-wrap">
                                @foreach ($post->tags as $tag)
                                <div class="inline-flex mb-2 mr-1">
                                    <x-tag>
                                        <a href="{{route('tag.show', $tag->slug)}}">
                                            {{$tag->name}}
                                        </a>
                                    </x-tag>
                                </div>
                                @endforeach
                            </div>
                            <div class="md:flex-row flex flex-col">
                                <a href="{{route('post.show', $post->slug)}}"
                                    class="md:w-1/4 md:pr-2 item-center flex w-full pr-0">
                                    <img width="100%" height="100%" class="object-cover border rounded-md"
                                        src="{{asset($post->thumbnail)}}" alt="{{$post->slug}}">
                                </a>
                                <div class="md:w-3/4 md:pl-2 w-full pl-0">
                                    <div class="max-w-none dark:text-gray-400 prose text-gray-800">
                                        <p>{!! str()->limit($post->description, 250) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </li>
            @endforeach
            @endif

        </ul>
    </section>
    <section class="py-4">
        {{$posts->onEachSide(1)->links()}}
    </section>
    <section class="flex justify-center mt-8 -mb-8">
        <x-newsletter />
    </section>
</x-public-layout>