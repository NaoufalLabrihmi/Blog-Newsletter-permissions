@props(['active'])

@php
$classes = ($active ?? false)
? 'dark:text-gray-100 dark:hover:text-gray-200 sm:p-4 hover:text-black p-1 font-bold text-gray-800'
: 'dark:text-gray-100 dark:hover:text-gray-200 sm:p-4 hover:text-black p-1 font-medium text-gray-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>