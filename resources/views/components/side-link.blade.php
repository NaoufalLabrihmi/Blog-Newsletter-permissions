@props(['active'])

@php
$classes = ($active ?? false)
? 'h-12 px-4 flex justify-start items-center w-full space-x-2 text-gray-600 focus:text-orange-500 bg-gray-200 rounded-lg'
: 'h-12 px-4 flex justify-start items-center w-full space-x-2 text-gray-400 focus:text-orange-500 hover:bg-gray-100 rounded-lg';
@endphp

<a {{$attributes->merge(['class' => $classes])}}>
    {{$slot}}
</a>