<div>
    @props([
        'index',
        'link',
        'subfeature'
    ])
    <a href="{{ $link }}" class="group">
        <span
            class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
            aria-hidden="true"></span>
        <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
            <span class="flex-shrink-0">
                <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                    <span class="text-gray-500">0{{$index}}</span>
                </span>
            </span>


            <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                <span class="text-xs font-medium text-gray-500">Step {{ $index}}:</span>
                <span class="text-xs font-medium text-gray-500">{{ $subfeature }}</span>
            </span>
        </span>
    </a>
</div>
