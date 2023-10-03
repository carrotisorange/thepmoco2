<x-modal-component>
    <x-slot name="id">
        instructions-create-utility-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <form wire:submit.prevent="storeUtilities">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Record Utility Readings
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">You're about to record utility readings for {{
                            $totalUnitsCount }} unit/s. This may take a while.</p>
                    </div>
                </div>
            </div>

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
                    placeholder="Search for unit" >
                @error('start_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">End date</label>
                <input type="date" id="end_date" wire:model="end_date"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" >
                @error('end_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="kwh">Rate (Cu/M)</label>
                <input type="text" id="kwh" wire:model="kwh"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" >
                @error('kwh')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">Minimum Charge</label>
                <input type="text" id="min_charge" wire:model="min_charge"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" >
                @error('min_charge')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-5 sm:mt-6">

                <x-button type="submit" wire:loading.remove>
                    Confirm
                </button>

                <x-button type="button" wire:loading>
                    Loading...
                </x-button>


              

            </div>
        </div>
        </form>
    </div>
</x-modal-component>