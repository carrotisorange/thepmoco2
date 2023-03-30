<div>
    @include('layouts.notifications')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $guest_details->guest }}</h1>
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
                                <a href="/property/{{ $guest_details->property->uuid }}/guest/{{ $guest_details->uuid }}/bills"
                                    class=" block py-2 px-4 text-sm
                                                                                                    text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600
                                                                                                    dark:text-gray-200 dark:hover:text-white">
                                    New bills
                                </a>
                            </li>
                         {{--   <li>
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
                            </li> --}}


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
                                id="bills-tab" data-tabs-target="#bills" type="button" role="tab" aria-controls="bills"
                                aria-selected="false">Bills</button>
                        </li>

                          <li class="mr-2" role="presentation">
                            <button
                                class="font-bold inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="collections-tab" data-tabs-target="#collections" type="button" role="tab" aria-controls="collections"
                                aria-selected="false">Collections</button>
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
                                            <label for="guest"
                                                class="block text-xs font-medium text-gray-900">Confirmation No
                                            </label>
                                            <input type="text" wire:model.debounce.500ms="uuid" readonly
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">

                                        </div>
                                    </div>
                                    <div class="sm:col-span-8">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="guest" class="block text-xs font-medium text-gray-900">Name of
                                                the guest
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

                                    <div class="sm:col-span-2">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="status"
                                                class="block text-xs font-medium text-gray-900">Status</label>
                                            <select wire:model.debounce.500ms="status"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                                <option value="pending" {{ old('status', $status)=='pending' ? ''
                                                    : 'selected' }}>
                                                    pending
                                                </option>
                                                <option value="active" {{ old('status', $status)=='active' ? 'selected'
                                                    : '' }}>
                                                    active
                                                </option>
                                                <option value="iactive" {{ old('status', $status)=='inactive'
                                                    ? 'selected' : '' }}>
                                                    inactive
                                                </option>
                                            </select>
                                            @error('status')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="unit_uuid" class="block text-xs font-medium text-gray-900">Unit
                                            </label>
                                            <select wire:model.debounce.500ms="unit_uuid"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                                                @foreach($units as $unit)
                                                <option value="{{ $unit->uuid }}" {{ old('unit_uuid', $guest_details->
                                                    unit_uuid) == $unit->uuid ? 'selected' : '' }}>
                                                    {{ $unit->unit }} - {{
                                                    $unit->status->status }} - {{ number_format($unit->transient_rent,
                                                    2) }}/night
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('unit_uuid')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="movein_at"
                                                class="block text-xs font-medium text-gray-900">Checkin Date</label>
                                            <input type="date" wire:model.debounce.500ms="movein_at"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">
                                            @error('movein_at')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="moveout_at"
                                                class="block text-xs font-medium text-gray-900">Checkout Date</label>
                                            <input type="date" wire:model.debounce.500ms="moveout_at"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">
                                            @error('moveout_at')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-2">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="no_of_guests" class="block text-xs font-medium text-gray-900">No
                                                of Guests</label>
                                            <input type="number" wire:model.debounce.500ms="no_of_guests"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">
                                            @error('no_of_guests')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="vehicle_details"
                                                class="block text-xs font-medium text-gray-900">Vehicle Details</label>
                                            <input type="text" wire:model.debounce.500ms="vehicle_details"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">
                                            @error('vehicle_details')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="sm:col-span-3">
                                        <div
                                            class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="plate_number"
                                                class="block text-xs font-medium text-gray-900">Plate Number</label>
                                            <input type="text" wire:model.debounce.500ms="plate_number"
                                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                                placeholder="">
                                            @error('plate_number')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 flex justify-end">

                                    <button type="submit" wire:loading.remove wire:target="updateGuest"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Update
                                    </button>
                                    <button type="submit" disabled wire:loading wire:target="updateGuest"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Loading...
                                    </button>
                                </div>
                            </form>
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

                                    @include('tables.bills')
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
</div>