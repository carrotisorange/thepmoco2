<div>
    <x-modal-component>
        <x-slot name="id">
            create-particular-modal
        </x-slot>
        <form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" wire:submit.prevent="forcedMoveout">

            <h3 class="text-xl font-medium text-gray-900 dark:text-white">Force Moveout</h3>

            <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-full px-3">
                    <x-label>Remarks</x-label>

                    <x-form-textarea wire:model="remarks" />

                    @error('remarks')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>
            </div>

            <div class="flex justify-end mt-5">
                {{-- <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline" href="#/"
                    wire:click="exitModal()">
                   Cancel
                </a> --}}
                <x-button class="w-full" type="submit">
                    Confirm
                </x-button>
            </div>
        </form>
    </x-modal-component>
</div>
