<div>
    @props([
        'link',
    ])
    <a class="text-blue-500 text-decoration-line: underline" target="_blank" href="{{ $link }}">
        {{ Str::limit($slot,20) }}
    </a>
</div>
