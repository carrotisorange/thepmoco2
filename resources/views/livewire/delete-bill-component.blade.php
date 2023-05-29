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
        <button type="button" wire:click="deleteBill({{ $bill->id }})" wire:loading.remove
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
            Yes, I'm sure
        </button>
        @else
        <button type="button" disabled wire:loading.remove
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
           <i class="fa-solid fa-lock"></i>&nbsp; Yes, I'm sure
        </button>   
        <p class="text-left text-red-500 text-xs mt-2">This feature is locked. Please contact your manager.</p>
        @endcan
       
        <button type="button" disabled wire:loading disabled 
            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
            Loading...</button>
        {{-- <button data-modal-toggle="delete-bill-modal-{{$bill->id}}" type="button"
            wire:loading.remove
            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
            cancel</button> --}}
    </div>

</x-modal-component>