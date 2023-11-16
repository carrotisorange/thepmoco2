<div>
    <x-modal-component>
        <x-slot name="id">
            warning-destroy-guest-modal
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
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Delete a guest
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">When you delete this guest, all data that are associated
                                with the guest will be deleted as well. <br> This includes bills, collections, and
                                additional guests.</p>
                        </div>
                        <div class="mt-2">
                            <p class="text-md text-gray-500">Are you sure you want to delete this guest?</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    @cannot('accountowner')
                    <x-button class="w-full bg-red-500" type="button" wire:click="deleteGuest"
                      >
                        Delete
                    </x-button>
                    @else
                    <x-button class="w-full bg-red-500" type="button" disabled
                       >
                        Delete
                    </x-button>
                    <p class="text-center text-red-500 text-xs mt-2">This feature is locked. <br>Please contact the property owner <span class="text-blue-500"><a target="_blank" href="/property/{{ Session::get('property_uuid') }}/personnel">here</a></span> .
                    </p>
                    @endcan


                </div>
            </div>
        </div>
    </x-modal-component>
</div>
