<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">Tenants</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button" data-modal-toggle="instructions-create-tenant-modal"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    <i class="fa-solid fa-plus"></i> &nbsp New tenant
                </button>

            </div>
        </div>

        <div class="mt-3">
            @if(App\Models\Property::find(Session::get('property'))->tenants()->count())

            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-4">

                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative w-full mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search" wire:model="search"
                            class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for name" required>

                    </div>

                </div>

                <div class="sm:col-span-2">
                    <select id="category" wire:model="category"
                        class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="" selected>Filter category</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->category }}">{{ $category->category }}</option>
                        @endforeach
                    </select>

                </div>

            </div>
            @endif
            {{ $tenants->links() }}
        </div>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden ring-black ring-opacity-5 md:rounded-lg">
                    @if(!App\Models\Property::find(Session::get('property'))->tenants()->count())
                    <nav aria-label="Progress">
                        <ol role="list"
                            class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
                            <li class="relative md:flex md:flex-1">
                                <!-- Completed Step -->
                                <a href="#" class="group flex w-full items-center">
                                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                                        <span
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-600 group-hover:bg-purple-800">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-sm font-medium text-gray-900">Create a
                                            property</span>
                                    </span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke"
                                            stroke="currentcolor" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>

                            <li class="relative md:flex md:flex-1">
                                <!-- Current Step -->
                                <a href="#" class="group flex w-full items-center">
                                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                                        <span
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-600 group-hover:bg-purple-800">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-sm font-medium text-gray-900">Add units</span>
                                    </span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke"
                                            stroke="currentcolor" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>

                            <li class="relative md:flex md:flex-1">
                                <!-- Current Step -->
                                <a href="#" class="group flex w-full items-center">
                                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                                        <span
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-purple-600 group-hover:bg-purple-800">
                                            <!-- Heroicon name: solid/check -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                        <span class="ml-4 text-sm font-medium text-gray-900">Add tenants</span>
                                    </span>
                                </a>

                                <!-- Arrow separator for lg screens and up -->
                                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke"
                                            stroke="currentcolor" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </li>


                            <li class="relative md:flex md:flex-1">
                                <!-- Upcoming Step -->
                                <a href="#" class="group flex items-center">
                                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                                        <span
                                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                                            <span class="text-gray-500 group-hover:text-gray-900">04</span>
                                        </span>
                                        <span
                                            class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add
                                            personnels</span>
                                    </span>
                                </a>
                            </li>

                        </ol>
                    </nav>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="mt-10 text-center mb-10">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No tenants</h3>
                        <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                        <div class="mt-6">
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit'"
                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                <!-- Heroicon name: mini/plus -->
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                </svg>
                                Select a unit and add your first tenant
                            </button>
                        </div>
                    </div>

                    @else
                    @include('tables.tenants')
                    @endif


                </div>
            </div>
        </div>
        @include('modals.instructions.create-tenant-modal')
    </div>