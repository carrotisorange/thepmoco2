<x-modal-component>
    <x-slot name="id">
        instructions-update-utility-parameter-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
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
                <x-button class="w-full" type="button" wire:click="updateParameters">
                    Confirm
                </x-button>

            </div>
        </div>
    </div>
</x-modal-component>
