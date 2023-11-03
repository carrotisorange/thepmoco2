<div>
    @props([
        'title',
    ])

    <span title="{{ $title }}" {{ $attributes->merge(['class' => '"px-2 text-sm leading-5 font-semibold rounded-full']) }} >
       {{ $slot }}
    </span>
</div>
