<div>
    @include('layouts.notifications')
    @livewire('create-bill-component', ['property'=> $property, 'bill_to' => $guest_details])

    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $guest_details->guest }}</h1>
            </div>
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-end">
                    <a href="/property/{{ $property->uuid }}/guest/{{ $guest_details->uuid }}/booking" target="_blank"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                        Export
                    </a>

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
                                <a href="#/" data-modal-toggle="create-bill-modal"
                                    class="block py-2 px-4 text-sm
                                                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                dark:text-gray-200 dark:hover:text-white">
                                    New bill
                                </a>
                            </li>

                            <li>
                                <a href="#/" data-modal-toggle="create-booking-modal"
                                    class="block py-2 px-4 text-sm
                                                                                text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                dark:text-gray-200 dark:hover:text-white">
                                    New booking
                                </a>
                            </li>
                            <li>
                                <a href="/property/{{ $this->guest_details->property_uuid }}/guest/{{ $guest_details->uuid }}/bills"
                                    class="block py-2 px-4 text-sm
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

                    <div class="mt-5 flex items-center justify-center">

                    </div>
                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="font-bold inline-block p-4 rounded-t-lg border-b-2" id="guest-tab"
                                data-tabs-target="#guest" type="button" role="tab" aria-controls="guest"
                                aria-selected="false">Guest</button>
                        </li>

                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="bookings-tab" data-tabs-target="#bookings" type="button" role="tab"
                                aria-controls="bookings" aria-selected="false">Bookings
                            </button>
                        </li>

                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="bills-tab" data-tabs-target="#bills" type="button" role="tab" aria-controls="bills"
                                aria-selected="false">Bills</button>
                        </li>

                        <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="collections-tab" data-tabs-target="#collections" type="button" role="tab"
                                aria-controls="collections" aria-selected="false">Collections</button>
                        </li>

                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="p-4  rounded-lg dark:bg-gray-800" id="guest" role="tabpanel"
                        aria-labelledby="guest-tab">
                        <div>
                            <form method="POST" wire:submit.prevent="updateGuest()" class="w-full"
                                enctype="multipart/form-data">
                                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">

                                    <div class="sm:col-span-8">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="guest" class="block text-xs font-medium text-gray-900">
                                                Guest
                                            </label>
                                            <input type="text" wire:model.debounce.500ms="guest"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">

                                        </div>
                                    </div>



                                    <div class="sm:col-span-4">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="job-title" class="block text-xs font-medium text-gray-900">Email
                                            </label>
                                            <input type="email" wire:model.debounce.500ms="email"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">
                                            @error('email')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="sm:col-span-4">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="mobile_number"
                                                class="block text-xs font-medium text-gray-900">Mobile No</label>
                                            <input type="text" wire:model.debounce.500ms="mobile_number"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">
                                            @error('mobile_number')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-5 flex justify-end">
                                    <button type="button" data-modal-toggle="warning-destroy-guest-modal"
                                        class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                        Delete
                                    </button>

                                    <button type="submit" wire:target="updateGuest"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="bookings" role="tabpanel"
                        aria-labelledby="bookings-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                    </div>
                                    @if($bookings->count())
                                    @include('tables.bookings')
                                    @else
                                    <div class="mt-10 text-center mb-10">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" aria-hidden="true">
                                            <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">No bookings</h3>
                                        <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
                                        <div class="mt-6">
                                            <button type="button" data-modal-toggle="create-additional-guest-modal"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                                           

                                                New booking
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
                        <x-button
                            onclick="window.location.href='/property/{{ $guest_details->property_uuid }}/guest/{{ $guest_details->uuid }}/bills'">
                            Pay Bills</x-button>

                        <x-button data-modal-toggle="create-bill-modal">
                            New Bill</x-button>

                        <x-button data-modal-toggle="create-particular-modal">
                            Add Particular</x-button>
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg bg-gray-50">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 sm:left-16">

                                    </div>
                                    @if($bills->count())
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
                                            <button type="button" data-modal-toggle="create-bill-modal"
                                                class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                        

                                                Create first bill
                                            </button>

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

                                    @include('tables.collections')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('modals.create-additional-guest-modal')
    @include('modals.create-booking-modal')
    @include('modals.warnings.destroy-guest-modal')
    @livewire('create-particular-component', ['property' => $property, 'guest' => $guest_details])

</div>