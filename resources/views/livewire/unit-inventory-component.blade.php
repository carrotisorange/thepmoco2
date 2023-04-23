<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-500">{{ $unitDetails->unit }} / Inventory</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

            @if(!$ismovein)
            <button type="button" wire:click="redirectToTheUnitPage" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                Go back to Unit
            </button>
            @endif

            <button type="button" wire:click="addNewUnitInventory" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                New Item
            </button>

            <button type="button" wire:loading disabled
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                Loading...
            </button>
        </div>
    </div>
    <div class="sm:col-span-6">
        <div class="mb-5 mt-2 relative overflow-hidden ring-opacity-5 md:rounded-lg">

            <form class="mt-5 sm:pb-6 xl:pb-8">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-th>#</x-th>
                            <x-th>IMAGE</x-th>
                            <x-th>ITEM </x-th>
                            <x-th>QUANTITY</x-th>
                            <x-th>REMARKS</x-th>
                            {{-- <x-th>IMAGE</x-th> --}}
                            <x-th></x-th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($inventories as $index => $inventory)
                        <div wire:key="inventory-field-{{ $inventory->id }}">
                            <tr>
                                <x-td>{{ $index+1 }}</x-td>
                                <x-td>
                                  @if($inventory->image)
                                  <img class="mx-auto h-20 w-20 rounded-full" src="{{ asset('/storage/'.$inventory->image) }}" alt="" />
                                @else
                                <img class="mx-auto h-20 w-20 rounded-full" src="{{ asset('/brands/avatar.png') }}"" alt="" />
                                  @endif
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model.debounce.500ms="inventories.{{ $index }}.item"
                                        wire:keyup="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.item')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="number" step="0.001" min="1"
                                        wire:model.debounce.500ms="inventories.{{ $index }}.quantity"
                                        wire:keyup="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.quantity')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model.debounce.500ms="inventories.{{ $index }}.remarks"
                                        wire:keyup="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.remarks')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <button type="button" wire:click="uploadImage({{ $inventory->id }})"
                                        wire:loading.remove
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Upload image
                                    </button>
                                    <button type="button" wire:loading disabled wire:target="uploadImage"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Loading...
                                    </button>
                                </x-td>
                                <x-td>
                                    <button type="button" wire:click="removeUnitInventory({{ $inventory->id }})"
                                        wire:loading.remove
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Remove
                                    </button>
                                    <button type="button" wire:loading disabled wire:target="removeUnitInventory"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Loading...
                                    </button>
                                    @include('layouts.notifications')
                                </x-td>
                            </tr>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </form>

        </div>
    </div>

    @if(!$ismovein)
    <p class="text-right">
        @if($inventories->count())
        <button type="button" wire:click="redirectToTheUnitPage" wire:loading.remove
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
            Save
        </button>
        @endif
        <button type="button" wire:loading disabled wire:target="redirectToTheUnitPage"
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
            Loading...
        </button>
    </p>
    @else
    <div class="flex justify-end mt-5">

        <button type="button" wire:click="submitForm"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

            <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Next
        </button>
    </div>
    @endif


</div>