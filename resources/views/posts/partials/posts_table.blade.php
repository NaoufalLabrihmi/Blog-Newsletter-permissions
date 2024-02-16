<div>
    <ul>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @foreach ($posts as $post)
        <li class="flex flex-row items-center space-x-1">
            <div class="mr-2 divide-x-4">
                <h3 class="text-base font-semibold uppercase">{{$post->title}}</h3>
            </div>
            <div x-data="{open: false}" x-on:click.outside="open = false" class="relative">
                <button x-on:click="open = !open" class="flex items-center p-1 bg-gray-200 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                    </svg>
                </button>
                <ul x-show="open" class="absolute top-0 z-50 p-2 bg-white rounded-md shadow-md">
                    <li><a href="{{route('post.edit',$post->slug)}}">Edit</a></li>
                    <li>
                        <form action="{{route('post.delete', $post->slug)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </li>
                </ul>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="mt-4">
        {{$posts->links()}}
    </div>
</div>