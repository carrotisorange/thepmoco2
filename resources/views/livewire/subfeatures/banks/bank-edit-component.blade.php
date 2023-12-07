<x-modal-component>
    <x-slot name="id">
        bank-edit-modal-{{$bank->id}}
    </x-slot>
    <h1 class="text-center font-medium">Edit A Bank</h1>
    <div class="p-4">
        <form wire:submit.prevent="updateBank">
            <div class="mt-5 sm:mt-6">
                <x-label for="bank_name">Name of the bank</x-label>
                <x-form-input type="text" wire:model="bank_name" />
                <x-validation-error-component name='bank_name' />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label for="account_name">Account Name </x-label>
                <x-form-input type="text" wire:model="account_name" />
                <x-validation-error-component name='account_name' />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label for="account_number">Account Number </x-label>
                <x-form-input type="text" wire:model="account_number" />
                <x-validation-error-component name='account_number' />
            </div>
            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>
            </div>
        </form>
    </div>
</x-modal-component>
