<x-modal-component>
    <x-slot name="id">
        collection-edit-component-{{$collection->id}}
    </x-slot>
    <div class="p-6 text-center">
        <form wire:submit.prevent="update">
        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to update
            collection AR # ({{$collection->ar_no}})?</h3>

        <div class="mt-5 mb-5 sm:mt-6">
            <x-form-input id="or_no" rows="4" wire:model="or_no"  />
            @error('or_no')
            <p class="text-red-500 text-xs mt-2 text-left">{{ $message }}</p>
            @enderror
        </div>

        <x-button type="submit" class="w-full">
           Confirm
        </x-button>
        </form>
    </div>

</x-modal-component>
