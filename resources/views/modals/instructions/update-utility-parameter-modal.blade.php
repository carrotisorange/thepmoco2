<x-modal-component>
    <x-slot name="id">
        instructions-update-utility-parameter-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
            <div>
                <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                    <!-- Heroicon name: outline/check -->
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Update Utility Parameters
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Please review the details below and click the confirm button to
                            save the new parameters.</p>
                    </div>
                </div>
            </div>

            <div class="mt-5 sm:mt-6">
                <button type="button" wire:click="updateParameters" wire:loading.remove
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    <i class="fa-solid fa-arrow-right"></i>&nbsp Confirm
                </button>
                <button type="button" wire:loading wire:target="redirectToUnitSelectionPage" disabled
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Loading...
                </button>
            </div>
        </div>
    </div>
</x-modal-component>