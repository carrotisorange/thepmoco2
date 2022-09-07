<x-new-layout>
    @section('title', $unit_details->unit. ' | '. Session::get('property_name'))
    <div class="mt-5">
        <div class="max-w-full mx-auto sm:px-6">
            <div class="pt-6 sm:pb-5">
                <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <ol role="list" class="flex items-center space-x-4">
                        <li>
                            <div class="flex items-center">
                                <a href="{{ url()->previous() }}">
                                    <img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}">
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
                        <div class="lg:col-start-5 lg:col-span-9">

                            <div class="flex justify-between">
                                <h1 class="text-3xl font-bold text-gray-900">{{ $unit_details->unit }}</h1>
                                <button
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                                    id="dropdownButton" data-dropdown-toggle="unitCreateDropdown" type="button">Add
                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7">
                                        </path>
                                    </svg></button>

                                <div id="unitCreateDropdown"
                                    class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                                    <ul class="py-1" aria-labelledby="dropdownButton">

                                        <li>
                                            <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create"
                                                                                    class=" block py-2 px-4 text-sm
                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                dark:text-gray-200 dark:hover:text-white">
                                                New tenant
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create"
                                                                                    class=" block py-2 px-4 text-sm
                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                dark:text-gray-200 dark:hover:text-white">
                                                New owner
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#/" class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" data-modal-toggle="add-building-modal">
                                                New building
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <a
                                    href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create"
                                    class="flex text-right text-sm font-medium text-purple-500 hover:text-purple-700">Add
                                    a
                                    new tenant</a>
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create"
                                    class="flex text-right text-sm font-medium text-purple-500 hover:text-purple-700">Add
                                    a
                                    new owner</a> --}}
                            </div>

                        </div>

                        <!-- Image gallery -->
                        <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-4 lg:row-start-1 lg:row-span-3">
                            <h2 class="sr-only">Images</h2>

                            <div class="grid grid-cols-1 lg:gap-6">
                                <img src="{{ asset('/brands/door_detail.png') }}" alt="door"
                                    class="lg:col-span-2 md:row-span-2 rounded-md">

                                <div class="flex items-center justify-center ml-5">
                                    {{-- <a href="#"
                                        class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Upload
                                        Picture </a> --}}
                                </div>


                            </div>
                        </div>

                        <div class="mt-8 lg:col-span-9">
                            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center grid grid-cols-5 gap-2 sm:grid-cols-5"
                                    id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                                            id="details-tab" data-tabs-target="#details" type="button" role="tab"
                                            aria-controls="details" aria-selected="true">Details</button>
                                    </li>

                                    <li class="mr-2" role="presentation">
                                        <button
                                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                                            id="owners-tab" data-tabs-target="#owners" type="button" role="tab"
                                            aria-controls="owners" aria-selected="false">Owners</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                                            id="tenants-tab" data-tabs-target="#tenants" type="button" role="tab"
                                            aria-controls="tenants" aria-selected="false">Tenants</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                                            id="rooms-tab" data-tabs-target="#rooms" type="button" role="tab"
                                            aria-controls="rooms" aria-selected="false">Rooms</button>
                                    </li>
                                    <li role="presentation">
                                        <button
                                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 dark:border-transparent text-gray-500 dark:text-gray-400 border-gray-100 dark:border-gray-700"
                                            id="furnitures-tab" data-tabs-target="#furnitures" type="button" role="tab"
                                            aria-controls="furnitures" aria-selected="false">Furnitures</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="myTabContent">
                                <div class="rounded-lg dark:bg-gray-800" id="details" role="tabpanel"
                                    aria-labelledby="details-tab">
                                    @livewire('unit-edit-component', ['unit_details' => $unit_details])
                                </div>

                                <div class="hidden rounded-lg dark:bg-gray-800" id="owners"
                                    role="tabpanel" aria-labelledby="owners-tab">
                                    @include('tables.deed_of_sales')
                                </div>
                                <div class="hidden rounded-lg dark:bg-gray-800" id="tenants"
                                    role="tabpanel" aria-labelledby="tenants-tab">
                                    @include('tables.contracts')
                                </div>
                                <div class="hidden rounded-lg dark:bg-gray-800" id="rooms"
                                    role="tabpanel" aria-labelledby="rooms-tab">
                                    rooms
                                </div>
                                <div class="hidden rounded-lg dark:bg-gray-800" id="furnitures"
                                    role="tabpanel" aria-labelledby="furnitures-tab">
                                    furnitures
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('modals.create-building-modal')
</x-new-layout>