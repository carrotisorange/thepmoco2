<div>
    <x-modal-component>
        <x-slot name="id">
            warning-destroy-bill-modal
        </x-slot>
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
                <div>
                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-red-100">
                        <!-- Heroicon name: outline/check -->
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Delete a bill
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">When you delete this unit, all data that are associated
                                with the bill
                                will be deleted as well. <br> This includes, inventories, owners, tenants, guests,
                                concerns,
                                utilities, bills, and financials.</p>
                        </div>
                        <div class="mt-2">
                            <p class="text-md text-gray-500">Are you sure you want to delete this unit?</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button type="button" wire:click="deleteUnit"
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:text-sm">
                        Confirm
                    </button>

                </div>
            </div>
        </div>
    </x-modal-component>
</div>