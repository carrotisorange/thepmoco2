<x-modal-component>
    @include('layouts.notifications')
    <x-slot name="id">
        delete-unit-inventory-modal-{{$inventory->id}}
    </x-slot>
    <div class="p-6 text-center">

        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
            this unit inventory ({{ $inventory->item }})?</h3>


        <button type="button" wire:click="deleteUnitInventory({{ $inventory->id }})"
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
            Yes, I'm sure
        </button>

      
    </div>

</x-modal-component>