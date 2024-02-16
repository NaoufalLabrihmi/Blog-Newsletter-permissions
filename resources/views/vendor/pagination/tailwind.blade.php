@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
    <div class="sm:hidden flex justify-between flex-1">
        @if ($paginator->onFirstPage())
        {{-- Mobile Prev Disabled --}}
        <span
            class="dark:text-gray-600 dark:bg-stone-800 dark:border-gray-600 relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-300 bg-white border border-gray-300 rounded-full cursor-default">
            {!! __('pagination.previous') !!}
        </span>
        @else
        {{-- Mobile Prev Normal --}}
        <a href="{{ $paginator->previousPageUrl() }}"
            class="hover:text-gray-900 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:active:text-gray-100 dark:text-gray-100 dark:bg-stone-900 relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition duration-150 ease-in-out bg-white border border-gray-800 rounded-full">
            {!! __('pagination.previous') !!}
        </a>
        @endif

        {{-- Mobile Next Normal --}}
        @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}"
            class="hover:text-gray-900 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:active:text-gray-100 dark:text-gray-100 dark:bg-stone-900 relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition duration-150 ease-in-out bg-white border border-gray-800 rounded-full">
            {!! __('pagination.next') !!}
        </a>
        @else
        {{-- Mobile Next Disabled --}}
        <span
            class="dark:text-gray-600 dark:bg-stone-800 dark:border-gray-600 relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-300 bg-white border border-gray-300 rounded-full cursor-default">
            {!! __('pagination.next') !!}
        </span>
        @endif
    </div>

    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between hidden">
        {{-- Web Info Normal --}}
        <div>
            <p class="dark:text-gray-100 text-sm leading-5 text-gray-800">
                {!! __('Showing') !!}
                @if ($paginator->firstItem())
                <span class="font-medium">{{ $paginator->firstItem() }}</span>
                {!! __('to') !!}
                <span class="font-medium">{{ $paginator->lastItem() }}</span>
                @else
                {{ $paginator->count() }}
                @endif
                {!! __('of') !!}
                <span class="font-medium">{{ $paginator->total() }}</span>
                {!! __('results') !!}
            </p>
        </div>

        <div>
            <span class="gap-x-1 relative z-0 inline-flex rounded-full shadow-sm">
                {{-- Web Arrow Left Disabled --}}
                @if ($paginator->onFirstPage())
                <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <span
                        class="dark:text-gray-600 dark:bg-stone-800 dark:border-gray-600 relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-300 bg-white border border-gray-300 rounded-full cursor-default"
                        aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
                @else
                {{-- Web Arrow Left Normal --}}
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    class="hover:text-gray-900 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:active:text-gray-100 dark:text-gray-100 dark:bg-stone-900 relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-800 transition duration-150 ease-in-out bg-white border border-gray-800 rounded-full"
                    aria-label="{{ __('pagination.previous') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                <span aria-disabled="true">
                    <span
                        class="dark:text-gray-600 dark:bg-stone-800 dark:border-gray-600 relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-300 bg-white border border-gray-300 rounded-full cursor-default">{{
                        $element }}</span>
                </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                {{-- Links active --}}
                <span aria-current="page">
                    <span
                        class="dark:text-gray-600 dark:bg-stone-800 dark:border-gray-600 relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-300 bg-white border border-gray-300 rounded-full cursor-default">{{
                        $page }}</span>
                </span>
                @else
                {{-- Links normal --}}
                <a href="{{ $url }}"
                    class="hover:text-gray-900 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:active:text-gray-100 dark:text-gray-100 dark:bg-stone-900 relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-800 transition duration-150 ease-in-out bg-white border border-gray-800 rounded-full"
                    aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                    {{ $page }}
                </a>
                @endif
                @endforeach
                @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                {{-- Web Arrow Right Normal --}}
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                    class="hover:text-gray-900 focus:outline-none focus:ring ring-blue-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:active:text-gray-100 dark:text-gray-100 dark:bg-stone-900 relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-800 transition duration-150 ease-in-out bg-white border border-gray-800 rounded-full"
                    aria-label="{{ __('pagination.next') }}">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
                @else
                {{-- Web Arrow Left Disabled --}}
                <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <span
                        class="dark:text-gray-600 dark:bg-stone-800 relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-300 bg-white border border-gray-300 rounded-full cursor-default"
                        aria-hidden="true">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                </span>
                @endif
            </span>
        </div>
    </div>
</nav>
@endif