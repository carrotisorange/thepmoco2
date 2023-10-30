<x-modal-component>
    <x-slot name="id">
        bank-create-modal
    </x-slot>
    <h1 class="text-center font-medium">Add A Bank</h1>
   <div class="p-4">
    <form wire:submit.prevent="storeBank">

        <div class="mt-5 sm:mt-6">
            <label class="text-sm" for="bank_name">Name of the bank</label>
            <x-form-input type="text" wire:model="bank_name" />
            @error('bank_name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 sm:mt-6">
            <label class="text-sm" for="account_name">Account Name </label>
            <x-form-input type="text" wire:model="account_name" readonly/>
            @error('account_name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 sm:mt-6">
            <label class="text-sm" for="account_number">Account Number </label>
            <x-form-input type="text" wire:model="account_number" />
            @error('account_number')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 sm:mt-6">
            <x-button class="w-full" type="submit">
                Confirm
            </x-button>

        </div>
    </form>
   </div>
</x-modal-component>
