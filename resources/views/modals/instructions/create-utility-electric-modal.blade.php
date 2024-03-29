<x-modal-component>
    <x-slot name="id">
        instructions-create-utility-electric-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Record electric
                        readings
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">You're about to record electric readings for {{
                            $totalUnitsCount }} unit/s. This may take a while.</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">Start date</label>
                <input type="date" id="start_date" wire:model="start_date"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>
              <x-validation-error-component name='start_date' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">End date</label>
                <input type="date" id="end_date" wire:model="end_date"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for unit" required>
              <x-validation-error-component name='end_date' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="kwh">Rate (kw/H)</label>
                <input type="text" id="kwh" wire:model="kwh"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
             <x-validation-error-component name='kwh' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">Minimum Charge</label>
                <input type="text" id="min_charge" wire:model="min_charge"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
               <x-validation-error-component name='min_charge' />
            </div>


            <div class="mt-5 sm:mt-6">

                <x-button class="w-full" type="button" wire:click="storeUtilities('electric')">
                    Confirm
                </x-button>

            </div>
        </div>
    </div>
</x-modal-component>
