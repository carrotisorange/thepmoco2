<div>
    @include('layouts.notifications')
    <div class="min-h-screen mt-8 max-w-2xl mx-auto pb-56 sm:px-20 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-black-900">{{ $tenant_details->tenant }}</h1>
            </div>
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">



                    <button
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                        id="dropdownButton" data-dropdown-toggle="tenantCreateDropdown" type="button"><svg
                            class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path
                                d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>Add
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
                                <a href="/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/bills"
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
                    <div class="flex items-center justify-center">
                        @if($tenant_details->photo_id)
                        <img src="{{ asset('/storage/'.$tenant_details->photo_id) }}" alt="door"
                            class="lg:col-span-2 md:row-span-2 rounded-md w-56 lg:w-full">
                        @else
                        <img src="{{ asset('/brands/avatar.png') }}" alt="door"
                            class="lg:col-span-2 md:row-span-2 rounded-md w-56 lg:w-full">
                        @endif

                    </div>

                    <div class="mt-5 flex items-center justify-center">
                        <p class="mt-5 text-lg text-center text-gray-700">
                            {{-- @if(!App\Models\User::where('email', $tenant_details->email)->count()) --}}
                            <button type="button" wire:click="sendCredentials" wire:loading.remove
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Send access to tenant
                            </button>
                            <button type="button" disabled wire:target="sendCredentials" wire:loading 
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                Loading...
                            </button>
                            {{-- @else
                        <p class="mt-5 text-lg text-center text-gray-700">
                            Username: <br><span class="font-bold ">{{ $username }}</span>
                        </p>
                        @endif --}}
                        </p>
                    </div>


                </div>
            </div>

            <div class="mt-8 lg:col-span-10">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="font-bold inline-block p-4 rounded-t-lg border-b-2" id="tenant-tab"
                                data-tabs-target="#tenant" type="button" role="tab" aria-controls="tenant"
                                aria-selected="false">Tenant</button>
                        </li>

                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="contracts-tab" data-tabs-target="#contracts" type="button" role="tab"
                                aria-controls="contracts" aria-selected="false">Contracts</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="guardians-tab" data-tabs-target="#guardians" type="button" role="tab"
                                aria-controls="guardians" aria-selected="false">Guardians</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="references-tab" data-tabs-target="#references" type="button" role="tab"
                                aria-controls="references" aria-selected="false">References</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="concerns-tab" data-tabs-target="#concerns" type="button" role="tab"
                                aria-controls="concerns" aria-selected="false">Concerns</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="bills-tab" data-tabs-target="#bills" type="button" role="tab" aria-controls="bills"
                                aria-selected="false">Bills</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="deposits-tab" data-tabs-target="#deposits" type="button" role="tab"
                                aria-controls="deposits" aria-selected="false">Deposits</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="collections-tab" data-tabs-target="#collections" type="button" role="tab"
                                aria-controls="collections" aria-selected="false">Collections</button>
                        </li>

                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="h-full p-4 rounded-lg dark:bg-gray-800" id="tenant" role="tabpanel"
                        aria-labelledby="tenant-tab">
                        <div>
                            @include('forms.tenants.tenant-edit')
                        </div>

                        <div class="hidden p-4 rounded-lg dark:bg-gray-800">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                    <div
                                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <!-- Selected row actions, only show when rows are selected. -->
                                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                        </div>
                                        {{-- @if($tenant_details->type == 'studying') --}}
                                        <div class="sm:col-span-4">
                                            <div
                                                class="h-44 bg-purple-100 relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-purple-600 focus-within:border-purple-600">
                                                <label for="course"
                                                    class="block text-xs font-medium text-gray-900">Course</label>
                                                <input type="text" wire:model.lazy="course"
                                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                                @error('course')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror

                                                <label for="year_level"
                                                    class="block text-xs font-medium text-gray-900">Year
                                                    Level</label>
                                                <input type="text" wire:model.lazy="year_level"
                                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                    placeholder="">
                                                @error('year_level')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror

                                                <label for="school"
                                                    class="block text-xs font-medium text-gray-900">School</label>
                                                <input type="text" wire:model.lazy="school"
                                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                    placeholder="">
                                                @error('school')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                                <label for="school_address"
                                                    class="block text-xs font-medium text-gray-900">Address</label>
                                                <input type="text" wire:model.lazy="school_address"
                                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                    placeholder="">
                                                @error('school_address')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- @else --}}
                                        <div class="mt-5">

                                        </div>
                                        <div class="sm:col-span-4">
                                            <div
                                                class="h-32 bg-purple-100 relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-purple-600 focus-within:border-purple-600">
                                                <label for="job-title"
                                                    class="block text-xs font-medium text-gray-900">Occupation</label>
                                                <input type="text" wire:model.lazy="occupation"
                                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                    placeholder="">
                                                @error('occupation')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror

                                                <label for="job-title"
                                                    class="block text-xs font-medium text-gray-900">Employer</label>
                                                <input type="text" wire:model.lazy="employer"
                                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                    placeholder="">
                                                @error('employer')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror

                                                <label for="barangay"
                                                    class="block text-xs font-medium text-gray-900">Address</label>
                                                <input type="text" wire:model.lazy="barangay"
                                                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                    placeholder="">
                                                @error('barangay')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror

                                            </div>
                                        </div>
                                        {{-- @endif --}}
                                    </div>
                                    <p class="text-right">
                                        <button type="submit" form="updateTenant"
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                                            <svg wire:loading wire:target="submitForm"
                                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4">
                                                </circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
                                            Update
                                        </button>
                                    </p>

                                </div>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="contracts" role="tabpanel"
                    aria-labelledby="contracts-tab">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                            <div
                                class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                </div>
                                @if($contracts->count())
                                @include('tables.contracts')
                                @else
                                <div class="mt-10 text-center mb-10">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No contracts</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <button type="button" wire:click="redirectToTheCreateContractPage"
                                            wire:loading.remove
                                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                            <!-- Heroicon name: mini/plus -->
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            Add your first contract
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
                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="guardians" role="tabpanel"
                    aria-labelledby="guardians-tab">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                            <div
                                class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                </div>
                                @if($guardians->count())
                                @include('tenants.tables.guardians')
                                @else
                                <div class="mt-10 text-center mb-10">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No guardians</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <button type="button" wire:click="redirectToTheCreateGuardianPage"
                                            wire:loading.remove
                                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                            <!-- Heroicon name: mini/plus -->
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            Add your first guardian
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

                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="references" role="tabpanel"
                    aria-labelledby="references-tab">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div
                                class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                </div>
                                @if($references->count())
                                @include('tenants.tables.references')
                                @else
                                <div class="mt-10 text-center mb-10">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No references</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <button type="button" wire:click="redirectToTheCreateReferencePage"
                                            wire:loading.remove
                                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                            <!-- Heroicon name: mini/plus -->
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            Add your first reference
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
                <div class="hidden p-4 rounded-lg dark:bg-gray-800 " id="concerns" role="tabpanel"
                    aria-labelledby="concerns-tab">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                            <div
                                class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                </div>
                                @if($concerns->count())
                                @include('tenants.tables.concerns')
                                @else
                                <div class=" mt-10 text-center mb-10">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No concerns</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <button type="button" wire:click="redirectToTheCreateConcernPage"
                                            wire:loading.remove
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
                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="bills" role="tabpanel"
                    aria-labelledby="bills-tab">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                            <div
                                class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                </div>
                                @if($bills->count())
                                <button type="button" wire:click="redirectToTheCreateBillPage" wire:loading.remove
                                    class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                    <!-- Heroicon name: mini/plus -->
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                    </svg>
                                    Pay Bills
                                </button>
                                <button type="button" wire:loading disabled
                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Loading...
                                </button>
                                @include('tables.bills')
                                @else
                                <div class=" mt-10 text-center mb-10">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No bills</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <button type="button" wire:click="redirectToTheCreateBillPage"
                                            wire:loading.remove
                                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                            <!-- Heroicon name: mini/plus -->
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            Add your first bill
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
                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="deposits" role="tabpanel"
                    aria-labelledby="deposits-tab">

                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                            <div
                                class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                </div>
                                @if($wallets->count())
                                @include('tenants.tables.deposits')
                                @else
                                <div class=" mt-10 text-center mb-10">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No deposits</h3>
                                    <p class="mt-1 text-sm text-gray-500">Deposits are being added during move-in. </p>
                                    <div class="mt-6">

                                    </div>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="collections" role="tabpanel"
                    aria-labelledby="collections-tab">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                            <div
                                class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                <!-- Selected row actions, only show when rows are selected. -->
                                <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                </div>
                                @if($collections->count())
                                @include('tenants.tables.collections')
                                @else
                                <div class=" mt-10 text-center mb-10">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" aria-hidden="true">
                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                    </svg>
                                    <h3 class="mt-2 text-sm font-medium text-gray-900">No collections</h3>
                                    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                    <div class="mt-6">
                                        <button type="button" wire:click="redirectToTheCreateBillPage"
                                            wire:loading.remove
                                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                            <!-- Heroicon name: mini/plus -->
                                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                                            </svg>
                                            Add your first collection
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

            </div>
        </div>

    </div>
</div>