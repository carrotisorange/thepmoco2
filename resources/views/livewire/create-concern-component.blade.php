<x-modal-component>

    <x-slot name="id">
        create-concern-modal
    </x-slot>

    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Concern Information
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="subject">Subject</label>
                <input type="text" id="subject" wire:model="subject"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
              <x-validation-error-component name='subject' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="category_id">Concern Category</label>
                <x-form-select id="category_id" name="category_id" wire:model="category_id" class="">
                    <option value="">Select one</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                    @endforeach

                </x-form-select>
               <x-validation-error-component name='category_id' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="category_id">Unit</label>
                <x-form-select id="unit_uuid" name="unit_uuid" wire:model="unit_uuid" class="">
                    <option value="">Select one</option>
                    @foreach ($units as $unit)
                    <option value="{{ $unit->unit->uuid }}">{{ $unit->unit->unit }}</option>
                    @endforeach

                </x-form-select>
              <x-validation-error-component name='unit_uuid' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="concern">Details of the concern</label>
                <textarea id="concern" rows="4" wire:model="concern"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder=""></textarea>
                <x-validation-error-component name='concern' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="image">Upload file</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" wire:model="image" id="image" type="file">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG</p>
                <x-validation-error-component name='image' />
            </div>

            <div class="mt-5 sm:mt-6">

                <x-button class="w-full" type="submit" wire:click="submitButton">
                    Confirm
                </x-button>

            </div>

        </div>
    </div>

</x-modal-component>
