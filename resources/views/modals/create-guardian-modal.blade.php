<x-modal-component>
    <x-slot name="id">
        create-guardian-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Guardian Information
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="guardian">Name</label>
                <input type="text" id="guardian" wire:model="guardian"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
                <x-validation-error-component name='guardian' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="guardian_relationship_id">Relationship to the tenant</label>
                <x-form-select id="guardian_relationship_id" name="guardian_relationship_id"
                    wire:model="guardian_relationship_id" class="">
                    <option value="">Select one</option>
                    @foreach ($relationships as $relationship)
                    <option value="{{ $relationship->id }}">{{ $relationship->relationship }}</option>
                    @endforeach

                </x-form-select>
             <x-validation-error-component name='gurdian_relationship_id' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="guardian_mobile_number">Mobile </label>
                <input type="text" id="guardian_mobile_number" wire:model="guardian_mobile_number"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
              <x-validation-error-component name='guardian_mobile_number' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="guardian_email">Email </label>
                <input type="email" id="guardian_email" wire:model="guardian_email"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
               <x-validation-error-component name='guardian_email' />
            </div>




            <div class="mt-5 sm:mt-6">

                <x-button class="w-full" type="button" wire:click="store_guardian">
                    Confirm
                </x-button>

            </div>
        </div>
    </div>
</x-modal-component>
