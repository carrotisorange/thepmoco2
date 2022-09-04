@props(['active'])

@php
$classes = ($active ?? false)
? 'bg-purple-500 text-white flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg'
: 'text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>