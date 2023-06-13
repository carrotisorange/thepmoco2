<x-modal-component>
    <x-slot name="id">
        delete-bill-modal-{{$bill->id}}
    </x-slot>
    <div class="p-6 text-center">

        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
            this bill ({{ $bill->unit->unit.'-'.$bill->bill_no}})?</h3>

        <div class="mt-5 mb-5 sm:mt-6">
            <p class="text-sm text-left" for="concern">Reason for deletion</p>
            <textarea id="description" rows="4" wire:model="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Write the reason why you want to delete this bill..."></textarea>
            @error('description')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        @can('accountownerandmanager')
        <button type="button" wire:click="deleteBill({{ $bill->id }})"
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
            Yes, I'm sure
        </button>
        @else
        <button type="button" disabled
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
         Yes, I'm sure
        </button>
        <p class="text-left text-red-500 text-xs mt-2">This feature is locked. Please contact your manager.</p>
        @endcan

      
    </div>

</x-modal-component>