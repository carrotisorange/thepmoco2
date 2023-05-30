<x-modal-component>
    <x-slot name="id">
        create-unit-inventory-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Unit Inventory Information
                    </h3>
                    {{-- <div class="mt-2">
                        <p class="text-sm text-gray-500">Before you can create a new tenant, first you need to
                            select a unit.</p>
                    </div> --}}
                </div>
            </div>


            <div class="mt-2 sm:mt-6">
                <label class="text-sm" for="">Item</label>
                <input type="text" id="item" wire:model="item"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>
                @error('item')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">Quantity</label>
                <input type="number" id="quantity" wire:model="quantity"
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  required>
                @error('quantity')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="kwh">Remarks</label>
                <input type="text"  id="remarks" wire:model="remarks"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
                @error('remarks')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

         <div class="mt-5 sm:mt-6">
            <label class="text-sm" for="image">Image</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="image" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG</p>
            @error('image')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

            <div class="mt-5 sm:mt-6">
                <button type="button" wire:click="storeUnitInventory" wire:loading.remove
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    <i class="fa-solid fa-arrow-right"></i>&nbsp Confirm
                </button>
                <button type="button" wire:loading wire:target="storeUnitInventory" disabled
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Loading...
                </button>
            </div>
        </div>
    </div>
</x-modal-component>