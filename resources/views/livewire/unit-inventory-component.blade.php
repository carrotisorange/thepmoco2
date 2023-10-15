<div>
    {{-- @include('layouts.notifications') --}}
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-500">{{ $unitDetails->unit }} / Inventory</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

            @if(!$ismovein)
            <x-button wire:click="redirectToTheUnitPage"> Go back to Unit
            </x-button>
            @endif

            <x-button data-modal-target="create-unit-inventory-modal"
                data-modal-toggle="create-unit-inventory-modal"> New Item
            </x-button>

        </div>
    </div>
    <div class="sm:col-span-6">
        <div class="mb-5 mt-2 relative overflow-hidden ring-opacity-5 md:rounded-lg">

            <form class="mt-5 sm:pb-6 xl:pb-8">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-th>#</x-th>
                            {{-- <x-th>IMAGE</x-th> --}}
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
                                {{-- <x-td>
                                    @if($inventory->image)
                                    <img class="mx-auto h-20 w-20 rounded-full"
                                        src="{{ asset('/storage/'.$inventory->image) }}" alt="" />
                                    @else
                                    No image found
                                    @endif
                                </x-td> --}}
                                <x-td>
                                    <input type="text" wire:model="inventories.{{ $index }}.item"
                                        wire:change="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.item')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="number" step="0.001" min="1"
                                        wire:model="inventories.{{ $index }}.quantity"
                                        wire:change="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.quantity')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model="inventories.{{ $index }}.remarks"
                                        wire:change="updateUnitInventory({{ $inventory->id }})"
                                        class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                    @error('inventories.{{ $index }}.remarks')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>

                                <x-td>
                                    <x-button class="bg-red-500"
                                        data-modal-target="delete-unit-inventory-modal-{{ $inventory->id }}"
                                        data-modal-toggle="delete-unit-inventory-modal-{{ $inventory->id }}"> Remove
                                    </x-button>
                                </x-td>
                            </tr>
                        </div>
                        @livewire('delete-unit-inventory-component', ['inventory' => $inventory],
                        key(Carbon\Carbon::now()->timestamp.''.$inventory->id))
                        @endforeach
                    </tbody>
                </table>
            </form>

        </div>
    </div>

    @if(!$ismovein)
    <p class="text-right">
        @if($inventories->count())
        <x-button wire:click="redirectToTheUnitPage"> Save
        </x-button>
        @endif

    </p>
    @elseif($ismovein==='moveout')
    <div class="flex justify-end mt-5">
        <x-button wire:click="skipUnitInventoryProcess">
            Next
        </x-button>
    </div>
    @else
    <div class="flex justify-end mt-5">

        <x-button wire:click="submitForm">
            Next
        </x-button>
    </div>
    @endif
    @livewire('create-unit-inventory-component',['unit' => $unitDetails])
</div>
