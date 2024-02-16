@section('title',$post->title)
@section('meta_keywords', $post->tags()->pluck('slug')->implode(', '))
@section('meta_description', $post->overview)
<x-public-layout>
    <x-sectionContainer>
        <article>
            <div class="xl:divide-y xl:divide-gray-200 xl:dark:divide-gray-700">
                <header class="xl:pb-6 pt-6">
                    <div class="space-y-1 text-center">
                        <dl class="space-y-10">
                            <div>
                                <dt class="sr-only">Published on</dt>
                                <dt class="sr-only">{{$post->visit()}}</dt>
                                <dd class="dark:text-gray-400 text-base font-medium leading-6 text-gray-500">
                                    <time datetime="{{$post->created_at}}">
                                        {{$post->created_at->format("d F Y")}}
                                    </time>
                                </dd>
                            </div>
                        </dl>
                        <div>
                            <x-pageTitle>{{$post->title}}</x-pageTitle>
                        </div>
                    </div>
                </header>

                <div class="md:flex-row flex flex-col-reverse">
                    <footer class="md:w-1/4 md:pr-4 w-full pr-0">
                        <div
                            class="dark:divide-gray-700 xl:col-start-1 xl:row-start-2 xl:divide-y text-sm font-medium leading-5 divide-gray-200">

                            <div class="xl:py-8 py-4">
                                <h2 class="dark:text-gray-400 text-xs tracking-wide text-gray-500 uppercase">
                                    Tags
                                </h2>
                                <div class="flex flex-wrap">
                                    @foreach ($post->tags as $tag)
                                    <div class="mb-1 mr-1">
                                        <x-tag>
                                            <a href="{{route('tag.show', $tag->slug)}}">
                                                {{$tag->name}}
                                            </a>
                                        </x-tag>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="xl:block xl:space-y-8 xl:py-8 flex justify-between py-4">
                                <div>
                                    @isset($previous)
                                    <h2 class="dark:text-gray-400 text-xs tracking-wide text-gray-500 uppercase">
                                        Previous article
                                    </h2>
                                    <div class="hover:text-green-600 dark:hover:text-green-400 text-green-500">
                                        <a href="{{route('post.show', $previous->slug)}}">{{$previous->title}}</a>
                                    </div>
                                    @endisset
                                </div>
                                <div>
                                    @isset($next)
                                    <h2 class="dark:text-gray-400 text-xs tracking-wide text-gray-500 uppercase">
                                        Next article
                                    </h2>
                                    <div class="hover:text-green-600 dark:hover:text-green-400 text-green-500">
                                        <a href="{{route('post.show', $next->slug)}}">{{$next->title}}</a>
                                    </div>
                                    @endisset
                                </div>
                            </div>


                        </div>
                        <div class="xl:pt-8 pt-4">
                            <a href="{{route('blog.index')}}">
                                &larr; Back to the blog
                            </a>
                        </div>
                    </footer>
                    <section class="md:w-3/4 w-full">
                        <div class="py-4 border-b">
                            <img class="w-full" src="{{asset($post->thumbnail)}}" alt="{{$post->slug}}">
                        </div>
                        <div class="flex flex-row py-2">
                            <x-button>{{__('Buy Drawing')}}</x-button>
                        </div>
                        <div class="mt-8 mb-8">
                            <x-h3 class="mb-3 underline">Overview</x-h3>
                            <div>{{ $post->overview }}</div>
                        </div>
                        @isset($post->images)
                        <section class="splide" aria-label="{{ $post->title.' images gallery' }}">
                            <div class="splide__slider">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach (json_decode($post->images, true) as $key => $value)
                                        <a class="splide__slide" href="{{ '/storage/images/posts/galeri/' . $value }}"
                                            data-lightbox="gallery" data-title="galley-{{ $key+1 }}">
                                            <img class="object-cover"
                                                src="{{ '/storage/images/posts/galeri/' . $value }}"
                                                alt="Gallery {{ $key }}" />
                                        </a>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </section>
                        @endisset
                        <div class="mt-8">
                            <div id="content">
                                {!!$post->description!!}
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </article>
    </x-sectionContainer>
</x-public-layout>
@push('script')
<script>
    lightbox.option({
              'resizeDuration': 200,
              'wrapAround': true
            })
</script>
@endpush