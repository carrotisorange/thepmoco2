<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto px-4 sm:px-6 lg:px-11">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mt-10 px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-3xl font-bold text-gray-700">Units</h1>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/thumbnail'"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">View
                                as Thumbnail</button>
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/{{ Str::random(8) }}/edit'"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                                Units</button>
                            <button type="button"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Delete
                                Units</button>
                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                        <div class="sm:col-span-4">
                            <form>
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                                <div class="relative w-full mb-5">
                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <input type="search" id="default-search" wire:model="search"
                                        class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search..." required>

                                </div>
                        </div>

                        </form>

                        <div class="sm:col-span-2">
                            <form>
                                <label for="default-search"
                                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Filters</label>
                                <div class="relative w-full mb-5">
                                    <div
                                        class="flex absolute justify-end inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                        <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <x-button>Filter
                                        by Default</x-button>
                                </div>
                        </div>
                        </form>
                    </div>
                    <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div
                                class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div
                                    class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                </div>
                                <div class="max-w-2xl mx-auto py-8 px-4  sm:px-6 lg:max-w-7xl lg:px-8">
                                    <div class="flex items-center justify-between space-x-4">
                                        <h2 class="text-lg font-medium text-gray-900"></h2>

                                    </div>
                                    <div
                                        class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-6">

                                        <div>
                                            <img src="{{ asset('/brands/close_occupied.png') }}"
                                                class="object-center object-cover aspect-w-4 aspect-h-3 rounded-lg overflow-hidden">
                                            <h3 class="text-center mt-2">Unit 1</h3>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            {{-- <button type="button"
                                class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                                All</button> --}}
                        </div>
                    </div>
                </div>

                <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    {{-- <div class="flex-1 flex justify-between sm:hidden">
                        <a href="#"
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous </a>
                        <a href="#"
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next </a>
                    </div>--}}
                    {{-- <div class="mt-5 hidden sm:flex-1 sm:flex sm:items-center sm:justify-between"> --}}
                        {{ $units->links() }}
                        {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</x-new-layout>