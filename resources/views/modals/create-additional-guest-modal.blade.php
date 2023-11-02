<x-modal-component>
    <x-slot name="id">
        create-additional-guest-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Additional Guest
                        Information
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="kwh">Name</label>
                <input type="text" id="additional_guest" wire:model="additional_guest"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
              <x-validation-error-component name='additional_guest' />
            </div>

            <div class="mt-5 sm:mt-6">

                <x-button class="w-full" type="button" wire:click="store_additional_guest">
                    Confirm
                </x-button>

            </div>
        </div>
    </div>
</x-modal-component>
