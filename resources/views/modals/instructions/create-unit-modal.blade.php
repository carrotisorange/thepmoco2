<x-modal-component>
    <x-slot name="id">
        instructions-create-unit-modal
    </x-slot>
    <h1 class="text-center font-medium">Create A Unit</h1>
   <div class="p-5">
    <form wire:submit.prevent="storeUnit">
    <div class="mt-2 sm:mt-6">
            <x-form-input type="number" wire:model="numberOfUnits" name="numberOfUnits" min="1" max="1000"/>
            <small>Your plan is limited to <b>{{ $unitLimits }}</b> units only.</small>
        </div>
        <div class="mt-5 sm:mt-6">
            <p class="text-center">
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>
            </p>
        </div>
    </form>
   </div>
</x-modal-component>
