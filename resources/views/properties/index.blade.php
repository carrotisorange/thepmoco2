<x-main-layout>
    @section('title', 'Portfolio | The Property Manager')
    <div class="mx-auto md:w-full px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
        @if(!$properties->count())
        <nav aria-label="Progress">
            <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
                <li class="relative md:flex md:flex-1">
                    <!-- Completed Step -->
                    <a href="#" class="flex items-center px-6 py-4 text-sm font-medium" aria-current="step">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-indigo-600">
                            <span class="text-indigo-600">01</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-indigo-600">Create a property</span>
                    </a>

                    <!-- Arrow separator for lg screens and up -->
                    <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                            preserveAspectRatio="none">
                            <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </li>

                <li class="relative md:flex md:flex-1">
                    <!-- Current Step -->
                    <a href="#" class="group flex items-center">
                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span
                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                <span class="text-gray-500 group-hover:text-gray-900">02</span>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add units to
                                your
                                property</span>
                        </span>
                    </a>

                    <!-- Arrow separator for lg screens and up -->
                    <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                        <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                            preserveAspectRatio="none">
                            <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </li>



                <li class="relative md:flex md:flex-1">
                    <!-- Upcoming Step -->
                    <a href="#" class="group flex items-center">
                        <span class="flex items-center px-6 py-4 text-sm font-medium">
                            <span
                                class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                <span class="text-gray-500 group-hover:text-gray-900">03</span>
                            </span>
                            <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add tenants
                                to your
                                property</span>
                        </span>
                    </a>
                </li>

            </ol>
        </nav>
        {{-- <h2 class="text-2xl font-bold tracking-tight text-gray-900 font-pop">Welcome, {{
            auth()->user()->name }}!</h2> --}}
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="mt-32 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No properties</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new property.</p>
            <div class="mt-6">
                <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    <!-- Heroicon name: solid/plus -->
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    New Property
                </button>
            </div>
        </div>
        @else
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 font-pop">Welcome back, {{
                auth()->user()->name }}!</h2>
            <p class="mt-2 text-sm text-gray-700">Select a property.</p>

            <div class="mt-1 mb-5 grid grid-cols-5 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($properties as $property)
                <div class="group relative">
                    <div
                        class="w-full h-32 bg-white rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <a href="/property/{{ $property->property->uuid }}">
                            <img src="{{ asset('/brands/property_page.png') }}" alt="building"
                                class="w-40 object-center object-cover lg:w-full lg:h-full">
                        </a>
                    </div>
                    <h3 class="text-medium text-gray-700 font-semibold text-center">{{
                        $property->property->property }}</h3>
                </div>
                @endforeach
            </div>

            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Portfolio</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button"
                        onclick="window.location.href='/user/{{ auth()->user()->id }}/export/portforlio'"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Export Portforlio
                    </button>


                    @can('portforlio')
                    <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/unlock'"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">New
                        property</button>
                    @else
                    <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">New
                        property</button>
                    @endcan
                    {{-- <button type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Edit</button>
                    --}}

                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            @include('admin.tables.portforlio')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-main-layout>