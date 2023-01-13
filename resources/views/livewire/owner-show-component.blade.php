<div>
    @include('layouts.notifications')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-between">

                    <h1 class="text-3xl font-bold text-gray-900">{{ $owner_details->owner }}</h1>

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
                                <a href="/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/unit"
                                    class=" block py-2 px-4 text-sm
                                                                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                    dark:text-gray-200 dark:hover:text-white">
                                    New unit
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/representative/create"
                                    class=" block py-2 px-4 text-sm
                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                    dark:text-gray-200 dark:hover:text-white">
                                    New representative
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/bank/create"
                                    class=" block py-2 px-4 text-sm
                                                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                dark:text-gray-200 dark:hover:text-white">
                                    New bank
                                </a>
                            </li>

                            <li>
                                <a href="/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/bills"
                                    class=" block py-2 px-4 text-sm
                                                                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                dark:text-gray-200 dark:hover:text-white">
                                    New bill
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/bills"
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
                    <img src="{{ asset('/brands/avatar.png') }}" alt="door"
                        class="lg:col-span-2 md:row-span-2 rounded-md">

                    <div class="mt-5 flex items-center justify-center ml-5">
                        <p class="mt-5 text-lg text-center text-gray-700">
                            @can('ownerportal')
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/owner/unlock'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Send access to owner portal
                            </button>
                            @else
                            @if(!App\Models\User::where('email', $owner_details->email)->count())
                            <button type="button" wire:click="sendCredentials"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                                <svg wire:loading wire:target="sendCredentials"
                                    class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Send access to owner portal
                            </button>
                            @else

                            {{-- <button type="button" wire:click="removeCredentials"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                                <svg wire:loading wire:target="removeCredentials"
                                    class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4">
                                    </circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Remove access to owner portal
                            </button> --}}
                        <p class="mt-5 text-lg text-center text-gray-700">
                            Uername/Email:
                            <span class="font-bold ">{{ App\Models\User::where('owner_uuid',
                                $owner_details->uuid)->pluck('username')
                                }}</span>

                        </p>

                        @endif
                        @endcan

                        </p>


                    </div>


                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="owner-tab"
                                data-tabs-target="#owner" type="button" role="tab" aria-controls="owner"
                                aria-selected="false">Owner</button>
                        </li>

                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="units-tab" data-tabs-target="#units" type="button" role="tab" aria-controls="units"
                                aria-selected="false">Units</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="representatives-tab" data-tabs-target="#representatives" type="button" role="tab"
                                aria-controls="representatives" aria-selected="false">Representatives</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="bills-tab" data-tabs-target="#bills" type="button" role="tab" aria-controls="bills"
                                aria-selected="false">Bills</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="collections-tab" data-tabs-target="#collections" type="button" role="tab"
                                aria-controls="collections" aria-selected="false">Collections</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
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
                                    @include('owners.tables.units')
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
                                    @include('owners.tables.representatives')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="bills" role="tabpanel"
                        aria-labelledby="bills-tab">
                        {{-- <x-button
                            onclick="window.location.href='/property/{{ $owner_details->property_uuid }}/owner/{{ $owner_details->uuid }}/bills'">
                            Pay Bills</x-button> --}}
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>
                                    @include('owners.tables.bills')
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
                                    @include('owners.tables.collections')
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
                                    @include('owners.tables.banks')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>