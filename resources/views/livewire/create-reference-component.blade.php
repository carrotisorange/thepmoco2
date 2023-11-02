<x-modal-component>

    <x-slot name="id">
        create-reference-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Reference Information
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="reference">Name</label>
                <input type="text" id="reference" wire:model="reference"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
                    <x-validation-error-component name='reference' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="relationship_id">Relationship to the tenant</label>
                <x-form-select id="relationship_id" name="relationship_id" wire:model="relationship_id" class="">
                    <option value="">Select one</option>
                    @foreach ($relationships as $relationship)
                    <option value="{{ $relationship->id }}">{{ $relationship->relationship }}</option>
                    @endforeach

                </x-form-select>
              <x-validation-error-component name='relationship_id' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="mobile_number">Mobile </label>
                <input type="text" id="mobile_number" wire:model="mobile_number"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
               <x-validation-error-component name='mobile_number' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="email">Email </label>
                <input type="email" id="email" wire:model="email"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
              <x-validation-error-component name='email' />
            </div>

            <div class="mt-5 sm:mt-6">

                <x-button class="w-full" wire:click="submitButton">
                    Confirm
                </x-button>

            </div>
        </div>
    </div>
</x-modal-component>
