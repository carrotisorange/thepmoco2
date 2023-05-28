<x-modal-component>
    <x-slot name="id">
        create-booking-modal
    </x-slot>

    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Booking
                        Information
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="unit_uuid">Unit</label>
                <x-form-select id="unit_uuid" name="unit_uuid" wire:model="unit_uuid" class="">
                    <option value="">Select one</option>
                    @foreach ($units as $unit)
                    <option value="{{ $unit->uuid }}" {{ $unit->uuid === $unit_uuid?
                        'selected'
                        : 'Select one' }}>
                        {{ $unit->unit }} - ₱ {{ number_format($unit->transient_rent,
                        2) }}/night
                    </option>
                    @endforeach
                </x-form-select>

                @error('unit_uuid')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="birthdate">Check-in</label>
                <input type="date" id="movein_at" wire:model="movein_at"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
                @error('movein_at')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="birthdate">Check-out</label>
                <input type="date" id="moveout_at" wire:model="moveout_at"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
                @error('moveout_at')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">

                <button type="submit" wire:click="storeBooking" wire:loading.remove
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    <i class="fa-solid fa-arrow-right"></i>&nbsp Confirm
                </button>
                <button type="button" wire:loading wire:target="storeBooking" disabled
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Loading...
                </button>
            </div>
        </div>
    </div>
</x-modal-component>