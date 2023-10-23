<x-modal-component>
    <x-slot name="id">
        instructions-create-utility-modal
    </x-slot>
    <h1 class="text-center font-medium">Record Utility Readings</h1>
    <p class="text-sm text-center text-gray-500">You're about to record utility readings for {{
        $totalUnitsCount }} unit/s. This may take a while.</p>

    <div class="p-5">
        <form wire:submit.prevent="storeUtilities">
                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="utility_type">Select a utility</label>
                    <x-form-select id="utility_type" name="utility_type" wire:model="utility_type" class="">
                        <option value="">Select one</option>

                        <option value="electric" {{ "electric"===$utility_type? 'selected' : 'Select one' }}>
                            electric
                        </option>

                        <option value="water" {{ "water"===$utility_type? 'selected' : 'Select one' }}>
                            water
                        </option>

                    </x-form-select>

                    @error('utility_type')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="">Start date</label>
                    <input type="date" id="start_date" wire:model="start_date"
                        class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for unit">
                    @error('start_date')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="">End date</label>
                    <input type="date" id="end_date" wire:model="end_date"
                        class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for unit">
                    @error('end_date')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="kwh">Rate (Cu/M)</label>
                    <input type="text" id="kwh" wire:model="kwh"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="">
                    @error('kwh')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="">Minimum Charge</label>
                    <input type="text" id="min_charge" wire:model="min_charge"
                        class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="">
                    @error('min_charge')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-5 sm:mt-6">

                    <x-button class="w-full" type="submit">
                        Confirm
                    </x-button>

                </div>

        </form>
    </div>
</x-modal-component>
