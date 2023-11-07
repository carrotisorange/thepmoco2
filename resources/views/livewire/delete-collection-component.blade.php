<x-modal-component>

    <x-slot name="id">
        delete-collection-modal-{{$collection->id}}
    </x-slot>
    <div class="p-6 text-center">

        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
            this ar_no ({{$collection->ar_no}})?</h3>

        <div class="mt-5 mb-5 sm:mt-6">

            <textarea id="description" rows="4" wire:model="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write the reason why you want to delete this bill..."></textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-2 text-left">{{ $message }}</p>
            @enderror
        </div>

        <x-button wire:click="deleteCollection({{ $collection->id }})" class="w-full bg-red-500">
            Yes, I'm sure
        </x-button>
    </div>

</x-modal-component>
