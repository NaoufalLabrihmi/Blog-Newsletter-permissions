<div class=" md:w-1/3 lg:w-1/4 w-full p-1">
    <div class="rounded-xl dark:bg-gray-700 w-full p-4 bg-white shadow-md">
        <div class="flex items-center">
            <p class="text-xl font-bold text-blue-800">{{$title ?? 'Title of Project'}}</p>
        </div>
        <div class="flex items-center mb-1">
            <p class="text-xs font-light text-gray-500">{{$created ?? '29 Sepetember 1989'}}</p>
        </div>
        <div class="flex items-center mb-4">
            <img src="{{asset($thumb)}}" alt="" class="w-full rounded-lg">
        </div>
        <div class="flex items-center justify-start my-2 space-x-2">
            @isset($tags)

            <div class="flex flex-row flex-wrap space-x-2">{{$tags}}</div>

            @endisset

        </div>
    </div>
</div>