<x-modal-component>
    <x-slot name="id">
        instructions-create-remittance-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-2 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Create remittances
                    </h3>
                    <div class="mt-2">
                        @if($collectionsCount)
                        <p class="text-sm text-gray-500">You're about to create <b
                                class="font-bold text-lg text-red-500">{{
                                $collectionsCount }}</b> remittances 
                            </b> You may still modify
                            these bills when you click
                            <b>CONFIRM
                        </p>
                        @else
                        <p class="text-sm text-gray-500">
                            There are no collections found. To continue creating remittances, please add an owner using the
                            button below.
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <form wire:submit.prevent="storeRemittance">
            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="">Specify the date</label>
              
              <input type="date" wire:model="date"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="">
                @error('date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 sm:mt-6">
                @if($collectionsCount)
                <button type="submit" wire:loading.remove
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Confirm
                </button>

                <button type="button" disabled wire:loading 
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Loading...
                </button>
                @else
                <button type="button" wire:click="redirectToOwnerPage"
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Add a collection
                </button>
                @endif

            </div>

        </form>
        </div>
        
    </div>
</x-modal-component>