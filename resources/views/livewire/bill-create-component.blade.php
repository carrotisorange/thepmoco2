<div>
    @livewire('create-bill-component', ['property'=> $property, 'bill_to' => $tenant])

    <div class="mt-5 mb-10">

        <p class="text-right">
            <button type="button" data-modal-toggle="create-bill-modal"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                
                  New Bill
                </button>
           
        </p>
        <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
            @if($bills->count())
            <div class="mb-5 mt-2 relative overflow-x-auto ring-opacity-5 md:rounded-lg">
            @include('tables.bills')
            </div>
            @endif
        </div>
    </div>
    <div class="flex justify-end mt-5">
    
        <button type="button" wire:click="redirectToContractShowPage"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
    
            <svg wire:loading wire:target="redirectToContractShowPage" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Finish
        </button>
    </div>

</div>