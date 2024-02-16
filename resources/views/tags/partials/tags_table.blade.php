<div
    class="dark:divide-gray-700 md:mt-12 md:flex-row md:items-center md:justify-start md:space-x-6 md:divide-y-0 flex flex-col items-start justify-start divide-y divide-gray-200">
    <div class="flex flex-wrap max-w-lg mb-10">
        @if (!$tags->isEmpty())
        @foreach ($tags as $tag)
        <div class="inline-flex mt-2 mb-2 mr-5">
            <p class="hover:text-green-600 dark:hover:text-green-400 mr-3 text-sm font-medium text-green-500 uppercase">
                {{$tag->name}}
            </p>
            <p class="dark:text-gray-300 -ml-2 text-sm font-semibold text-gray-600 uppercase">
                ({{$tag->posts()->count()}})
            </p>
            <div x-data="{open: false}" x-on:click.outside="open = false" class="relative">
                <button x-on:click="open = !open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
                <ul x-show="open" class="absolute top-0 z-50 p-2 bg-white rounded-md shadow-md">
                    <li><a href="{{route('tag.edit',$tag->slug)}}">Edit</a></li>
                    <li>
                        <form action="{{route('tag.delete', $tag->slug)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach
        @else
        <p class="text-blue-500">No tags added</p>
        @endif
    </div>
</div>