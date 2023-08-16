@include('layouts.notifications')
<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-3">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-6">
                        <label for="guest" class="block text-sm font-medium text-gray-700">Full
                            Name</label>
                        <input type="text" wire:model.lazy="guest" autocomplete="guest"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('guest')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model.lazy="email" autocomplete="email"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                        <input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number"
                            value="{{ old('mobile_number') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-3">
                        <label for="movein_at" class="block text-sm font-medium text-gray-700">Checkin Date </label>
                        <input type="date" wire:model.lazy="movein_at" autocomplete="movein_at"
                            class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('movein_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-3">
                        <label for="moveout_at" class="block text-sm font-medium text-gray-700">Checkout Date</label>
                        <input type="date" wire:model.lazy="moveout_at" autocomplete="moveout_at"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('moveout_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="col-span-6">
                        <label for="movein_at" class="block text-sm font-medium text-gray-700">Vehicle Details</label>

                    </div>

                    <div class="col-span-3">
                        <label for="vehicle_details"
                            class="block text-sm font-medium text-gray-700">Brand/Model/Year</label>
                        <input type="text" wire:model.lazy="vehicle_details" autocomplete="vehicle_details"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('vehicle_details')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="col-span-3">
                        <label for="plate_number" class="block text-sm font-medium text-gray-700">Plate Number</label>
                        <input type="text" wire:model.lazy="plate_number" autocomplete="plate_number"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('plate_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-2">

                {{-- <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                    target="_blank" href="{{ asset('/brands/docs/Contract of Lease TEMPLATE.docx') }}" target="_blank"
                    class="text-indigo-600 hover:text-indigo-900">Download Sample Lease Contract</a> --}}

                <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit_uuid }}">
                    Cancel
                </a>


                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Finish
                </button>


            </div>
        </div>
    </div>
</form>