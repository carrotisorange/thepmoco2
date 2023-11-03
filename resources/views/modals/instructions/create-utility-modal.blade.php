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
                    <x-label  for="utility_type">Select a utility</x-label>
                    <x-form-select id="utility_type" name="utility_type" wire:model="utility_type" class="">
                        <option value="">Select one</option>

                        <option value="electric" {{ "electric"===$utility_type? 'selected' : 'Select one' }}>
                            electric
                        </option>

                        <option value="water" {{ "water"===$utility_type? 'selected' : 'Select one' }}>
                            water
                        </option>

                    </x-form-select>

                 <x-validation-error-component name='utility_type' />
                </div>

                <div class="mt-5 sm:mt-6">
                    <x-label  for="">Start date</x-label>
                    <x-form-input type="date" id="start_date" wire:model="start_date" />
                  <x-validation-error-component name='start_date' />
                </div>

                <div class="mt-5 sm:mt-6">
                    <x-label  for="">End date</x-label>
                    <x-form-input type="date" id="end_date" wire:model="end_date"/>
                   <x-validation-error-component name='end_date' />
                </div>

                <div class="mt-5 sm:mt-6">
                    <x-label  for="kwh">Rate (Cu/M)</x-label>
                    <x-form-input type="text" id="kwh" wire:model="kwh"/>
                  <x-validation-error-component name='kwh' />
                </div>

                <div class="mt-5 sm:mt-6">
                    <x-label  for="">Minimum Charge</x-label>
                    <x-form-input type="text" id="min_charge" wire:model="min_charge"/>
                  <x-validation-error-component name='min_charge' />
                </div>

                <div class="mt-5 sm:mt-6">

                    <x-button class="w-full" type="submit">
                        Confirm
                    </x-button>

                </div>
        </form>
    </div>
</x-modal-component>
