<div>
    @props([
        'link',
    ])
    <a class="text-blue-500 text-decoration-line: underline" target="_blank"
        href="{{ $link }}">
        {{ $slot }} </a>
</div>
