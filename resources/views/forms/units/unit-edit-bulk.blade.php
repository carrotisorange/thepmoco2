<form class="mt-5 sm:pb-6 xl:pb-8" id="edit-form" wire:submit.prevent="updateForm()">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            <tr>
                {{-- <x-th>
                    #</x-th> --}}
                <x-th>
                    {{-- <div class="flex items-center">
                        <x-input wire:model="selectedAllUnits" type="checkbox" />
                    </div> --}}
                </x-th>
                <x-th>
                    Unit
                </x-th>
                {{--<x-th>
                    Building
                </x-th> --}}
                {{-- <x-th>
                    Floor
                </x-th>
                <x-th>
                    Category
                </x-th> --}}
                <x-th>
                    Size (sqm)
                </x-th>
                <x-th>
                    Rent/Month/Tenant
                </x-th>
                <x-th>
                    Occupancy
                </x-th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($units as $index => $item)
            <div wire:key="unit-field-{{ $item->uuid }}">
                <tr>
                    {{-- <x-th>
                        {{ $index+1 }}
                    </x-th> --}}
                    <x-td>
                        <div class="flex items-center">
                            <x-input form="edit-form" type="checkbox" wire:model="selectedUnits.{{ $item->uuid }}" />
                        </div>
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="text" wire:model="units.{{ $index }}.unit" />
                        @error('units.{{ $index }}.unit')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    {{-- <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        <x-table-select form="edit-form" wire:model="units.{{ $index }}.building_id">
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
                        </x-td> --}}
                        {{-- <x-td>
                            <x-table-select form="edit-form" wire:model="units.{{ $index }}.floor_id">
                                <option value="">Select a floor</option>
                                @foreach ($floors as $floor)
                                <option value="{{ $floor->id }}" {{ $floor->id === 'units'.$index.'floor_id'? 'selected' : 'selected' }}>
                                    {{ $floor->floor }}
                                </option>
                               
                                @endforeach
                            </x-table-select>
                            @error('units.{{ $index }}.floor_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </x-td>
                        <x-td>
                            <x-table-select form="edit-form" wire:model="units.{{ $index }}.category_id">
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
                        </x-td> --}}
                        <x-td>
                            <x-table-input form="edit-form" type="text" min="1" wire:model="units.{{ $index }}.size" />
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

            @endforeach
        </tbody>
    </table>
</form>