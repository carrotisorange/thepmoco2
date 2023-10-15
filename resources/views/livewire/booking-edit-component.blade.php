<div>
    {{-- @include('layouts.notifications') --}}
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-4 lg:col-span-9">
                <h1 class="text-3xl font-bold text-gray-900">{{ $guest_details->guest }}</h1>
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
                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">
                    <div class="sm:col-span-8">
                        <div
                            class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                            <label for="guest" class="block text-xs font-medium text-gray-900">Confirmation No
                            </label>
                            <input type="text" wire:model.debounce.500ms="uuid" readonly
                                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                                placeholder="">

                        </div>
                    </div>
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
                            <label for="mobile_number" class="block text-xs font-medium text-gray-900">Mobile No</label>
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
                    <x-button class="bg-red-500" type="button" data-modal-toggle="warning-destroy-guest-modal">    Delete
                    </x-button>

                    <x-button type="submit" wire:target="updateBooking">   Update
                    </x-button>

                </div>

            </div>

        </div>

    </div>
</div>
@include('modals.create-additional-guest-modal')
@include('modals.create-booking-modal')
@include('modals.warnings.destroy-guest-modal')
</div>
