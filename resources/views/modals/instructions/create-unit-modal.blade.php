<x-modal-component>
    <x-slot name="id">
        instructions-create-unit-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                    <!-- Heroicon name: outline/check -->
                    <i class="fa-solid fa-house"></i>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Create a new unit
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Please enter the number of units you want to create.</p>
                    </div>
                </div>
            </div>

            <div class="mt-2 sm:mt-6">
                <input type="number" step="1" min="1" wire:model="numberOfUnits" required
                    class="bg-white block p-4 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            @if(session()->has('error'))
            <div class="mt-1 bg-red-500 text-white py-1 px-1 rounded-xl bottom-3 right-3 text-sm">
                <p><i class="fa-solid fa-circle-xmark"></i> {{ session('error') }}</p>
            </div>
            @endif
            <div class="mt-5 sm:mt-6">
                <button type="button" wire:click="storeUnits"
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Confirm
                </button>

            </div>
        </div>
    </div>
</x-modal-component>