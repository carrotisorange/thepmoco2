<x-modal-component>
    <x-slot name="id">
        create-unit-inventory-modal
    </x-slot>
    <h1 class="text-center font-medium">Add Unit Inventory</h1>
    <div class="p-5">
        <div class="mt-2 sm:mt-6">
            <label class="text-sm" for="">Item</label>
            <x-form-input type="text" id="item" wire:model="item" />
            @error('item')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 sm:mt-6">
            <label class="text-sm" for="">Quantity</label>
            <x-form-input type="number" id="quantity" wire:model="quantity" />
            @error('quantity')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 sm:mt-6">
            <label class="text-sm" for="kwh">Remarks</label>
            <x-form-input type="text" id="remarks" wire:model="remarks" />
            @error('remarks')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5 sm:mt-6">
            <x-button class="w-full" type="button" wire:click="submitButton">
                Confirm
            </x-button>

        </div>
    </div>
</x-modal-component>
