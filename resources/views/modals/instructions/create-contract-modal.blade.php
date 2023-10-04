<x-modal-component>
    <x-slot name="id">
        instructions-create-contract-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Create a new contract
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Before you can create a new contract, first you need to
                            select an existing tenant.</p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <button class="w-full" type="button" wire:click="redirectToUnitSelectionPage"
                  >
                    Select a tenant
                </button>

            </div>
        </div>
    </div>
</x-modal-component>
