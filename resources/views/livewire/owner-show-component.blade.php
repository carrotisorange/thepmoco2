<div>
    @include('layouts.notifications')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $owner_details->owner }}</h1>
            </div>

            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                        id="dropdownButton" data-dropdown-toggle="ownerCreateDropdown" type="button">Add
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="ownerCreateDropdown"
                        class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="dropdownButton">
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/unit"
                                    class=" block py-2 px-4 text-sm
                                                                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                    dark:text-gray-200 dark:hover:text-white">
                                    New unit
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/representative/create"
                                    class=" block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New representative
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/bank/create"
                                    class=" block py-2 px-4 text-sm
                                                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                dark:text-gray-200 dark:hover:text-white">
                                    New bank
                                </a>
                            </li>

                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/bills"
                                    class=" block py-2 px-4 text-sm
                                                                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                dark:text-gray-200 dark:hover:text-white">
                                    New bill
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/bills"
                                    class=" block py-2 px-4 text-sm
                                                                                                                            text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
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
                    <div class="flex items-center justify-center">
                        @if($owner_details->photo_id)
                        <img src="{{ asset('/storage/'.$owner_details->photo_id) }}" alt="door"
                            class="lg:col-span-2 md:row-span-2 rounded-md w-56 lg:w-full">
                        @else
                        <img src="{{ asset('/brands/avatar.png') }}" alt="door"
                            class="lg:col-span-2 md:row-span-2 rounded-md w-56 lg:w-full">
                        @endif

                    </div>

                    <div class="mt-5 flex items-center justify-center">
                        <p class="mt-5 text-lg text-center text-gray-700">
                            {{-- @if(!App\Models\User::where('email', $tenant_details->email)->count()) --}}
                            <button type="button" wire:click="sendCredentials"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Send access to owner
                            </button>

                        </p>
                    </div>


                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="font-bold inline-block p-4 rounded-t-lg border-b-2" id="owner-tab"
                                data-tabs-target="#owner" type="button" role="tab" aria-controls="owner"
                                aria-selected="false">Owner</button>
                        </li>

                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="units-tab" data-tabs-target="#units" type="button" role="tab" aria-controls="units"
                                aria-selected="false">Units</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="spouse-tab" data-tabs-target="#spouse" type="button" role="tab"
                                aria-controls="spouse" aria-selected="false">Spouse</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="representatives-tab" data-tabs-target="#representatives" type="button" role="tab"
                                aria-controls="representatives" aria-selected="false">Representatives</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="bills-tab" data-tabs-target="#bills" type="button" role="tab" aria-controls="bills"
                                aria-selected="false">Bills</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="collections-tab" data-tabs-target="#collections" type="button" role="tab"
                                aria-controls="collections" aria-selected="false">Collections</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="banks-tab" data-tabs-target="#banks" type="button" role="tab" aria-controls="banks"
                                aria-selected="false">Banks</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="p-4  rounded-lg dark:bg-gray-800" id="owner" role="tabpanel"
                        aria-labelledby="owner-tab">
                        <div>
                            @include('forms.owners.owner-edit')
                        </div>
                    </div>

                    <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="units" role="tabpanel"
                        aria-labelledby="units-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>
                                    @include('tables.deedofsales')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="representatives" role="tabpanel"
                        aria-labelledby="representatives-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>
                                    @include('tables.representatives')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="spouse" role="tabpanel"
                        aria-labelledby="spouse-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>
                                    @include('tables.spouses')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="bills" role="tabpanel"
                        aria-labelledby="bills-tab">
                        <x-button
                            onclick="window.location.href='/property/{{ $owner_details->property_uuid }}/owner/{{ $owner_details->uuid }}/bills'">
                            Pay Bills</x-button>
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>
                                    @include('tables.bills')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="collections" role="tabpanel"
                        aria-labelledby="collections-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>
                                    @include('tables.collections')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="banks" role="tabpanel"
                        aria-labelledby="banks-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>
                                    @include('tables.banks')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>