<x-modal-component>
    @include('layouts.notifications')
    <x-slot name="id">
        delete-unit-inventory-modal-{{$inventory->id}}
    </x-slot>
    <div class="p-6 text-center">

        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
            this unit inventory ({{ $inventory->item }})?</h3>


        <x-button type="button" wire:click="deleteUnitInventory({{ $inventory->id }})"
          class="w-full">
            Yes, I'm sure
        </x-button>


    </div>

</x-modal-component>
