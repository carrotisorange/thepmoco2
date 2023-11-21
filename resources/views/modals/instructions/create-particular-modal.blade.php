<x-modal-component>
    <x-slot name="id">
        instructions-create-particular-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Create a new particular
                    </h3>

                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <x-label class="text-sm" for="kwh">Name your particular</x-label>
                <x-form-input type="text" id="new_particular" wire:model="new_particular" />
                <x-validation-error-component name='new_particular' />
            </div>
            @if(session()->has('success'))
            <div class="mt-1 bg-green-500 text-white py-1 px-1 rounded-xl bottom-3 right-3 text-sm">
                <p><i class="fa-solid fa-circle-check"></i> {{ session('success') }}</p>
            </div>
            @endif
            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="button" wire:click="storeParticular">
                    Save
                </x-button>

            </div>
        </div>
    </div>
</x-modal-component>
