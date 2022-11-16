<x-new-layout>
    @section('title','Utilities | '. Session::get('property_name'))
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Utilities</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                {{-- <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    New Contract</button> --}}

            </div>
        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>
                    <div class="flex min-h-full flex-col bg-white lg:relative">
                        <div class="flex flex-grow flex-col">
                            <main class="flex flex-grow flex-col bg-white">
                                <div class="mx-auto flex w-full max-w-7xl flex-grow flex-col px-4 sm:px-6 lg:px-8">
                                    {{-- <div class="flex-shrink-0 pt-10 sm:pt-16">
                                        <a href="/" class="inline-flex">
                                            <span class="sr-only">Your Company</span>
                                            <img class="h-12 w-auto" src="{{ asset('/brands/logo_cropped.png') }}"
                                                alt="">
                                        </a>
                                    </div> --}}
                                    <div class="my-auto flex-shrink-0 py-16 sm:py-32">
                                        <p class="text-base font-semibold text-indigo-600">404</p>
                                        <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                                            Page not found</h1>
                                        <p class="mt-2 text-base text-gray-500">Sorry, we couldn’t find the page you’re
                                            looking for.</p>
                                        <div class="mt-6">
                                            <a href="/property"
                                                class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                                                Go back portfolio
                                                <span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </main>
                            {{-- <footer class="flex-shrink-0 bg-gray-50">
                                <div class="mx-auto w-full max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
                                    <nav class="flex space-x-4">
                                        <a href="#"
                                            class="text-sm font-medium text-gray-500 hover:text-gray-600">Contact
                                            Support</a>
                                        <span class="inline-block border-l border-gray-300" aria-hidden="true"></span>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-500 hover:text-gray-600">Status</a>
                                        <span class="inline-block border-l border-gray-300" aria-hidden="true"></span>
                                        <a href="#"
                                            class="text-sm font-medium text-gray-500 hover:text-gray-600">Twitter</a>
                                    </nav>
                                </div> --}}
                            </footer>
                        </div>
                        <div class="hidden lg:absolute lg:inset-y-0 lg:right-0 lg:block lg:w-1/2">
                            <img class="absolute inset-0 h-full w-full object-cover"
                                src="{{ asset('/brands/oops.png') }}" alt="">
                        </div>
                    </div>
                    {{-- @include('tables.utilities') --}}

                </div>

            </div>
        </div>
    </div>

    <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    </div>
</x-new-layout>