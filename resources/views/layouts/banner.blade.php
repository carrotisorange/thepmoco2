<div class="flex items-center gap-x-6 bg-purple-500 px-6 py-2.5 sm:px-3.5 sm:before:flex-1">
    <p class="text-sm leading-6 text-white">
        <a href="#">
            <strong class="font-semibold">{{ env('APP_NAME') }}</strong><svg viewBox="0 0 2 2"
                class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
                <circle cx="1" cy="1" r="1" />
            </svg>This site is for testing purposes only&nbsp;
            {{-- <span aria-hidden="true">&rarr;</span> --}}
        </a>
    </p>
    <div class="flex flex-1 justify-end">
        <button type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]">
            {{-- <span class="sr-only">Dismiss</span>
            <svg class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path
                    d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
            </svg> --}}
        </button>
    </div>
</div>
