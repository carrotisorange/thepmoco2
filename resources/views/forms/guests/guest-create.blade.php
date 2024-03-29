<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-3">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-6">
                        <label for="guest" class="block text-sm font-medium text-gray-700">Full
                            Name</label>
                        <input type="text" wire:model="guest" autocomplete="guest"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='guest' />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model="email" autocomplete="email"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='email' />
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <input type="text" wire:model="mobile_number" autocomplete="mobile_number"
                            value="{{ old('mobile_number') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='mobile_number' />
                    </div>

                    <div class="col-span-3">
                        <label for="movein_at" class="block text-sm font-medium text-gray-700">Checkin Date </label>
                        <input type="date" wire:model="movein_at" autocomplete="movein_at"
                            class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='movein_at' />
                    </div>

                    <div class="col-span-3">
                        <label for="moveout_at" class="block text-sm font-medium text-gray-700">Checkout Date</label>
                        <input type="date" wire:model="moveout_at" autocomplete="moveout_at"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='moveout_at' />

                    </div>

                    <div class="col-span-6">
                        <label for="movein_at" class="block text-sm font-medium text-gray-700">Vehicle Details</label>

                    </div>

                    <div class="col-span-3">
                        <label for="vehicle_details"
                            class="block text-sm font-medium text-gray-700">Brand/Model/Year</label>
                        <input type="text" wire:model="vehicle_details" autocomplete="vehicle_details"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='vehicle_details' />

                    </div>
                    <div class="col-span-3">
                        <label for="plate_number" class="block text-sm font-medium text-gray-700">Plate Number</label>
                        <input type="text" wire:model="plate_number" autocomplete="plate_number"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='plate_number' />

                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-2">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_uuid }}'">
                    Cancel
                </x-button>

                <x-button type="submit">
                    Finish
                </x-button>


            </div>
        </div>
    </div>
</form>