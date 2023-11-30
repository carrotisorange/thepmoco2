<x-modal-component>
    <x-slot name="id">
        instructions-create-contract-modal
    </x-slot>
    <h1 class="text-center font-medium">Create Contract</h1>
    <div class="p-5">
        <form wire:submit.prevent="redirectToUnitSelectionPage">
                <div class="mt-2">
                    <p class="text-sm text-gray-500">Before you can create a new contract, first you need to
                        select a unit.</p>
                </div>
                <div class="mt-5 sm:mt-6">

                    <x-form-select id="unit_uuid" name="unit_uuid" wire:model="unit_uuid">
                        <option value="">Select one</option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->uuid }}">{{ $unit->unit }}</option>
                        @endforeach

                    </x-form-select>
                    <x-validation-error-component name='unit_uuid' />

                </div>
            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit">
                    Select a unit
                </x-button>

            </div>
        </form>
    </div>
</x-modal-component>
