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
                        <x-label>Number of units you want to create.</x-label>
                    </div>
                </div>
            </div>

            <div class="mt-2 sm:mt-6">
                <x-input type="text" wire:model="numberOfUnits" name="numberOfUnits" />
            </div>

            <div class="mt-5 sm:mt-6">
                <p class="text-center">
                    <x-button type="button" class="bg-red-500 hover:bg-red-300" data-modal-toggle="instructions-create-unit-modal">
                        Cancel
                    </x-button>
                    <x-button type="button" wire:click="storeUnits">
                        Confirm
                    </x-button>
                </p>

            </div>
        </div>
    </div>
</x-modal-component>
