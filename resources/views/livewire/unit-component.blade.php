<div class="py-2">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-5">
            <div class="flex flex-row">
                <div class="basis-1/2">
                    @if($selectedUnits)
                    <x-button wire:click="submitForm()">Save Units ({{ count($selectedUnits) }})
                    </x-button>
                    @endif
                </div>
                <div class="basis-1/2 ml-12 text-right">
                    @if($selectedUnits)
                    <x-button class="bg-red-800" onclick="confirmMessage()" wire:click="removeUnits()">
                        Remove Units ({{ count($selectedUnits) }})
                    </x-button>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-5">
            {{-- {{ $units->links() }} --}}
        </div>
        <form class="sm:pb-6 xl:pb-8" id="edit-form" wire:submit.prevent="submitForm">
            <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <x-th>#</x-th>
                                            <x-th>
                                                <div class="flex items-center">
                                                    <x-input wire:model="selectedAllUnits" type="checkbox" />
                                                </div>
                                            </x-th>
                                            <x-th>Unit</x-th>
                                            <x-th>Building</x-th>
                                            <x-th>Floor</x-th>
                                            <x-th>Category</x-th>
                                            <x-th>Size (sqm)</x-th>
                                            <x-th>Rent/Mo</x-th>
                                            <x-th>Occupancy</x-th>
                                        </tr>
                                    </thead>
                                    <?php $ctr=1; ?>
                                    <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        @forelse ($units as $index => $item)
                                        <div wire:key="unit-field-{{ $item->uuid }}">
                                            <tr>
                                                <x-td>{{ $index }}</x-td>
                                                <x-td>
                                                    <div class="flex items-center">
                                                        <x-input form="edit-form" type="checkbox"
                                                            wire:model="selectedUnits.{{ $item->uuid }}" />
                                                    </div>
                                                </x-td>
                                                <x-td>
                                                    <x-table-input form="edit-form" type="text"
                                                        wire:model="units.{{ $index }}.unit" />
                                                    @error('units.{{ $index }}.unit')
                                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </x-td>
                                                <x-td>
                                                    <x-table-select form="edit-form"
                                                        wire:model="units.{{ $index }}.building_id">
                                                        <option value="">Select a building </option>
                                                        @foreach ($buildings as $building)
                                                        <option value="{{ $building->id }}" {{ $building->id ==
                                                            'units'.$index.'building_id'? 'selected' : '' }}>
                                                            {{ $building->building }}
                                                        </option>
                                                        @endforeach
                                                    </x-table-select>
                                                    @error('units.{{ $index }}.building_id')
                                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </x-td>
                                                <x-td>
                                                    <x-table-select form="edit-form"
                                                        wire:model="units.{{ $index }}.floor_id">
                                                        <option value="">Select a floor</option>
                                                        @foreach ($floors as $floor)
                                                        <option value="{{ $floor->id }}" {{ $floor->id ==
                                                            'units'.$index.'floor_id'? 'selected' : '' }}>
                                                            {{ $floor->floor }}
                                                        </option>
                                                        @endforeach
                                                    </x-table-select>
                                                    @error('units.{{ $index }}.floor_id')
                                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </x-td>
                                                <x-td>
                                                    <x-table-select form="edit-form"
                                                        wire:model="units.{{ $index }}.category_id">
                                                        <option value="">Select a category</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id ==
                                                            'units'.$index.'category_id'? 'selected' : '' }}>
                                                            {{ $category->category }}
                                                        </option>
                                                        @endforeach
                                                    </x-table-select>
                                                    @error('units.{{ $index }}.category_id')
                                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </x-td>
                                                <x-td>
                                                    <x-table-input form="edit-form" type="text" min="1"
                                                        wire:model="units.{{ $index }}.size" />
                                                    @error('units.{{ $index }}.size')
                                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </x-td>
                                                <x-td>
                                                    <x-table-input form="edit-form" min="0" type="number"
                                                        wire:model="units.{{ $index }}.rent" />
                                                    @error('units.{{ $index }}.rent')
                                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </x-td>
                                                <x-td>
                                                    <x-table-input form="edit-form" type="number" min="1"
                                                        wire:model="units.{{ $index }}.occupancy" />
                                                    @error('units.{{ $index }}.occupancy')
                                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                    @enderror
                                                </x-td>
                                            </tr>
                                        </div>
                                        @empty
                                        <tr>
                                            <x-td>No data found.</x-td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
    @include('layouts.notifications')
</div>