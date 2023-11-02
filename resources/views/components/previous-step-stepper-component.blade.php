<div>
    @props([
        'index',
        'link',
        'subfeature'
        ])
    <a href="{{ $link }}" aria-current="step">
        <span class="absolute top-0 left-0 h-full w-1  lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
        <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
            <span class="flex-shrink-0">
                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-600">
                    <!-- check icon -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </span>
    
            <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                <span class="text-xs font-medium text-purple-600">Step {{ $index }}:</span>
                <span class="text-xs font-medium text-gray-500">{{ $subfeature }}</span>
            </span>
        </span>
    </a>
</div>