<div>
    @include('layouts.notifications')
    @include('modals.popup-error')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $unit_details->unit }}</h1>
            </div>
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                        id="dropdownButton" data-dropdown-toggle="unitCreateDropdown" type="button">Add
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="unitCreateDropdown"
                        class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            @if($unit_details->is_the_unit_for_rent_to_tenant)
                            <li>
                                @if($unit_details->occupancy > $unit_details->contracts()->where('status',
                                'active')->count())
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create"
                                    class=" block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New tenant
                                </a>
                                @else
                                <a href="#/" data-modal-toggle="popup-error-modal" class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New tenant
                                </a>
                                @endif
                            </li>
                            @endif

                            <li>
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create"
                                    class=" block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New owner
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/guest/{{ Str::random(8) }}/create"
                                    class=" block py-2 px-4 text-sm
                                                                            text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                            dark:text-gray-200 dark:hover:text-white">
                                    New guest
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/concern/{{ Str::random(8) }}/create"
                                    class=" block py-2 px-4 text-sm
                                                                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                    dark:text-gray-200 dark:hover:text-white">
                                    New concern
                                </a>
                            </li>

                        </ul>
                    </div>

                    <a href="unit-calendar">
                        <button
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                            type="button">Calendar
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="text-white w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                            </svg>
                        </button>
                    </a>
                </div>

            </div>

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="grid grid-cols-2 lg:gap-6">

                    @if($unit_details->status_id == '1')
                    <img src="{{ asset('/brands/vacant.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @elseif($unit_details->status_id == '2')
                    <img src="{{ asset('/brands/occupied.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @elseif($unit_details->status_id == '3')
                    <img src="{{ asset('/brands/maintenance.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @elseif($unit_details->status_id == '4' || ($unit_details->status_id == '6'))
                    <img src="{{ asset('/brands/reserved.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @else
                    <img src="{{ asset('/brands/maintenance.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md" />
                    @endif

                    <div class="flex items-center justify-center ml-5">
                        {{-- <a href="#"
                            class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:purple">Upload

                        </a> --}}
                    </div>


                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="unit-tab"
                                data-tabs-target="#unit" type="button" role="tab" aria-controls="unit"
                                aria-selected="false">Unit</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="inventories-tab" data-tabs-target="#inventories" type="button" role="tab"
                                aria-controls="inventories" aria-selected="false">Inventories</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="owners-tab" data-tabs-target="#owners" type="button" role="tab"
                                aria-controls="owners" aria-selected="false">Owners</button>
                        </li>

                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="tenants-tab" data-tabs-target="#tenants" type="button" role="tab"
                                aria-controls="contacts" aria-selected="false">Tenants</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="guests-tab" data-tabs-target="#guests" type="button" role="tab"
                                aria-controls="guests" aria-selected="false">Guests</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="concerns-tab" data-tabs-target="#concerns" type="button" role="tab"
                                aria-controls="concerns" aria-selected="false">Concerns</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="utilities-tab" data-tabs-target="#utilities" type="button" role="tab"
                                aria-controls="utilities" aria-selected="false">Utilities</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="bills-tab" data-tabs-target="#bills" type="button" role="tab" aria-controls="bills"
                                aria-selected="false">Bills</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="financials-tab" data-tabs-target="#financials" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">Financials</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="unit" role="tabpanel"
                        aria-labelledby="unit-tab">
                        <div>
                            @include('forms.units.unit-edit')
                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="inventories" role="tabpanel"
                        aria-labelledby="inventories-tab">

                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($inventories->count())
                                    <div class="p-4">
                                        <button type="button" wire:loading.remove
                                            wire:click="redirectToTheCreateUnitInventoryPage"
                                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                                            Update Inventory
                                        </button>
                                        <button type="button" wire:loading disabled
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Loading...
                                        </button>
                                    </div>
                                    @include('units.tables.inventories')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No inventories</h3>

                                        <div class="mt-6">
                                            <button type="button" wire:loading.remove
                                                wire:click="redirectToTheCreateUnitInventoryPage"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                <!-- Heroicon name: mini/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                                Add your first inventory
                                            </button>
                                            <button type="button" wire:loading disabled
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="owners" role="tabpanel"
                        aria-labelledby="owners-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($deed_of_sales->count())
                                    @include('units.tables.owners')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No owners</h3>

                                        <div class="mt-6">
                                            <button type="button" wire:loading.remove
                                                wire:click="redirectToTheCreateOwnerPage"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                <!-- Heroicon name: mini/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                                Add your first owner
                                            </button>

                                            <button type="button" wire:loading disabled
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple" id="financials" role="tabpanel" aria-labelledby="financials-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @include('units.tables.financials')
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="tenants" role="tabpanel"
                        aria-labelledby="tenants-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($contracts->count())

                                    @include('units.tables.tenants')

                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No tenants</h3>

                                        <div class="mt-6">
                                            <button type="button" wire:loading.remove
                                                wire:click="redirectToTheCreateTenantPage"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                <!-- Heroicon name: mini/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                                Add your first tenant
                                            </button>

                                            <button type="button" wire:loading disabled
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                    @include('modals.popup-error')

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="guests" role="tabpanel"
                        aria-labelledby="guests-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($guests->count())

                                    @include('tables.guests')

                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No guests</h3>

                                        <div class="mt-6">
                                            <button type="button" wire:loading.remove
                                                wire:click="redirectToTheCreateGuestPage"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                <!-- Heroicon name: mini/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                                Add your first guest
                                            </button>

                                            <button type="button" wire:loading disabled
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="concerns" role="tabpanel"
                        aria-labelledby="concerns-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($concerns->count())

                                    @include('units.tables.concerns')
                                    @else
                                    <div class=" mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No concerns</h3>

                                        <div class="mt-6">
                                            <button type="button" wire:loading.remove
                                                wire:click="redirectToTheCreateConcernPage"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                <!-- Heroicon name: mini/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                                Add your first concern
                                            </button>

                                            <button type="button" wire:loading disabled
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Loading...
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="utilities" role="tabpanel"
                        aria-labelledby="utilities-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($utilities->count())
                                    @include('units.tables.utilities')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No utilities</h3>

                                        <div class="mt-6">
                                            <button type="button" wire:loading.remove
                                                wire:click="redirectToTheCreateUtilitiesPage"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                <!-- Heroicon name: mini/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                                Add your first utilities
                                            </button>

                                            <button type="button" wire:loading disabled
                                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Loading...
                                            </button>

                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="hidden p-4 purple rounded-lg dark:bg-gray-800" id="bills" role="tabpanel"
                        aria-labelledby="bills-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 purple sm:left-16">

                                    </div>
                                    @if($utilities->count())
                                    @include('tables.bills')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No bills</h3>

                                        <div class="mt-6">
                                            <button type="button"
                                                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/bills'"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                                <!-- Heroicon name: mini/plus -->
                                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                                </svg>
                                                Add your first bill
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>