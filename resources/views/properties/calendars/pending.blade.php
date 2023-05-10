<x-new-layout>
    @section('title','Calendar | '. $property->property)

    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">

       
            <html class="h-full">
            <body class="h-full">
  
            <div class="grid min-h-full grid-cols-1 grid-rows-[1fr,auto,1fr] bg-white lg:grid-cols-[max(50%,36rem),1fr]">
                <header class="mx-auto w-full max-w-7xl px-6 pt-6 sm:pt-10 lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:px-8">
                    <a href="/">
                        <span class="sr-only">Your Company</span>
                        <img class="h-15 w-auto sm:h-12" src="{{ asset('/brands/full-logo.png') }}"
                            alt="" />
                    </a>
                </header>
                <main class="mx-auto w-full max-w-7xl px-6 py-24 sm:py-32 lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:px-8">
                    <div class="max-w-lg">
                        <p class="text-base font-semibold leading-8 text-indigo-600"></p>
                        <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Sorry for the inconvenience</h1>
                        <p class="mt-6 text-base leading-7 text-gray-600">This page is under maintenance.
                        </p>
                        <div class="mt-10">
                            <a href="/property/{{ $property->uuid }}" class="text-sm font-semibold leading-7 text-indigo-600"><span
                                    aria-hidden="true">&larr;</span> Back to dashboard</a>
                        </div>
                    </div>
                </main>
              
                <div class="lg:relative lg:col-start-2 lg:row-start-1 lg:row-end-4 lg:block">
                    <img src="{{ asset('/brands/full-logo.png') }}"
                        alt="" class="absolute inset-0 h-full w-full object-cover" />
                </div>
            </div>
  
        </div>
    </div>

</x-new-layout>