<x-modal-component>
    <x-slot name="id">
        create-unit-inventory-modal
    </x-slot>
    <h1 class="text-center font-medium">Add Unit Inventory</h1>
    <div class="p-5">
        <div class="mt-2 sm:mt-6">
            <label class="text-sm" for="">Item</label>
            <x-form-input type="text" id="item" wire:model="item" />
          <x-validation-error-component name='item' />
        </div>

        <div class="mt-5 sm:mt-6">
            <label class="text-sm" for="">Quantity</label>
            <x-form-input type="number" id="quantity" wire:model="quantity" />
          <x-validation-error-component name='quantity' />
        </div>

        <div class="mt-5 sm:mt-6">
            <label class="text-sm" for="kwh">Remarks</label>
            <x-form-input type="text" id="remarks" wire:model="remarks" />
           <x-validation-error-component name='remarks' />
        </div>

        <div class="mt-5 sm:mt-6">
            <x-button class="w-full" wire:click="submitButton">
                Confirm
            </x-button>

        </div>
    </div>
</x-modal-component>
