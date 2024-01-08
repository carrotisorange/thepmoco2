<x-modal-component>
    <x-slot name="id">
        particular-create-livewire-component
    </x-slot>
    <h1 class="text-center font-medium">Create A Particular</h1>
    <div class="p-5">
        <form wire:submit.prevent="submitButton">
            <div class="mt-5 sm:mt-6">
                <x-label for="particular">Particular</x-label>
                <x-form-input type="text" wire:model="particular" />
                <x-validation-error-component name='particular' />
            </div>

            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>
            </div>
        </form>
    </div>
</x-modal-component>
