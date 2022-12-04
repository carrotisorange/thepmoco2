<div>
    @include('layouts.notifications')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-between">

                    <h1 class="text-3xl font-bold text-gray-900">{{ $tenant_details->tenant }}</h1>

                    <button
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                        id="dropdownButton" data-dropdown-toggle="tenantCreateDropdown" type="button">Add
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="tenantCreateDropdown"
                        class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/concern/create"
                                    class=" block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New concern
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/units"
                                    class=" block py-2 px-4 text-sm
                                                                        text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                        dark:text-gray-200 dark:hover:text-white">
                                    New contract
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/bills"
                                    class=" block py-2 px-4 text-sm
                                                                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                dark:text-gray-200 dark:hover:text-white">
                                    New bill
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/collections"
                                    class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                dark:text-gray-200 dark:hover:text-white">
                                    New collection
                                </a>
                            </li>

                        </ul>
                    </div>

                </div>

            </div>

            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="grid grid-cols-1 lg:gap-6">
                    <img src="{{ asset('/brands/avatar.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md">

                    <div class="flex items-center justify-center ml-5">
                        {{-- <a href="#"
                            class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Upload

                        </a> --}}
                    </div>


                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="tenant-tab"
                                data-tabs-target="#tenant" type="button" role="tab" aria-controls="tenant"
                                aria-selected="false">Tenant</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="contracts-tab" data-tabs-target="#contracts" type="button" role="tab" aria-controls="contracts"
                                aria-selected="false">Contracts</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="guardians-tab" data-tabs-target="#guardians" type="button" role="tab"
                                aria-controls="guardians" aria-selected="false">Guardians</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="references-tab" data-tabs-target="#references" type="button" role="tab"
                                aria-controls="references" aria-selected="false">References</button>
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
                                id="bills-tab" data-tabs-target="#bills" type="button" role="tab"
                                aria-controls="bills" aria-selected="false">Bills</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="collections-tab" data-tabs-target="#collections" type="button" role="tab" aria-controls="collections"
                                aria-selected="false">Collections</button>
                        </li>

                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="tenant" role="tabpanel"
                        aria-labelledby="tenant-tab">
                        <div>
                            @include('forms.tenants.tenant-edit')
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="contracts" role="tabpanel"
                        aria-labelledby="contracts-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    
                                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
                    
                                    </div>
                                    @include('tenants.tables.contracts')
                                </div>
                    
                            </div>
                    
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="guardians" role="tabpanel"
                        aria-labelledby="guardians-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                    </div>
                                    @include('tenants.tables.guardians')
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="references" role="tabpanel"
                        aria-labelledby="references-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                    </div>
                                    @include('tenants.tables.references')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="concerns" role="tabpanel"
                        aria-labelledby="concerns-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                    </div>
                                    @include('tenants.tables.concerns')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="bills" role="tabpanel"
                        aria-labelledby="bills-tab">
                        <x-button onclick="window.location.href='/property/{{ $tenant_details->property_uuid }}/tenant/{{ $tenant_details->uuid }}/bills'">Pay Bills</x-button>
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    
                                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
                    
                                    </div>
                                    @include('tenants.tables.bills')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="collections" role="tabpanel" aria-labelledby="collections-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    
                                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
                    
                                    </div>
                                    @include('tenants.tables.collections')
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>