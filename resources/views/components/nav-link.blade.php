@props(['active'])

@php
$classes = ($active ?? false)
? 'ml-3 bg-purple-500 text-white flex-shrink-0 inline-flex items-center justify-center h-8 w-8 rounded-lg'
: 'ml-2 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>