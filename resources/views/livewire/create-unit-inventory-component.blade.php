<x-modal-component>

    <x-slot name="id">
        create-unit-inventory-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Unit Inventory
                    </h3>
                    {{-- <div class="mt-2">
                        <p class="text-sm text-gray-500">Before you can create a new tenant, first you need to
                            select a unit.</p>
                    </div> --}}
                </div>
            </div>


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
    </div>
</x-modal-component>