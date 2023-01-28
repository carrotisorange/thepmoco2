<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-500">{{ $unitDetails->unit }}/ Inventory</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


            <button type="button" wire:click="redirectToTheUnitPage" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                <i class="fa-solid fa-circle-left"></i> &nbsp Go back to Unit
            </button>

            <button type="button" wire:click="redirectToTheUnitPage" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                <i class="fa-solid fa-circle-check"></i> &nbsp Save
            </button>

            <button type="button" wire:click="addNewUnitInventory" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                <i class="fa-solid fa-plus"></i> &nbsp New Inventory
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
                                    <input type="text" wire:model="inventories.{{ $index }}.item"
                                        wire:keyup="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.item')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="number" step="0.001" min="1"
                                        wire:model="inventories.{{ $index }}.quantity"
                                        wire:keyup="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.quantity')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model="inventories.{{ $index }}.remarks"
                                        wire:keyup="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.remarks')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                {{-- <x-td>
                                    <input type="file" wire:model="inventories.{{ $index }}.image"
                                        wire:keyup="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.remarks')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td> --}}
                                <x-td>
                                    <button type="button" wire:click="removeUnitInventory({{ $inventory->id }})"
                                        wire:loading.remove
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        <i class="fa-solid fa-trash"></i>&nbsp; Remove
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

</div>