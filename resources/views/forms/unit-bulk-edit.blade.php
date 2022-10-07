<form class="mt-5 sm:pb-6 xl:pb-8" id="edit-form" wire:submit.prevent="updateForm()">
    <table class="min-w-full table-fixed">
        <thead class="">
            <tr>
                <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                    #</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    {{-- <div class="flex items-center">
                        <x-input wire:model="selectedAllUnits" type="checkbox" />
                    </div> --}}
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Unit
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Building
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Floor
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Category
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Size (sqm)
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Rent/Mo
                </th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                    Occupancy
                </th>
            </tr>
        </thead>

        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
            @foreach ($units as $index => $item)
            <div wire:key="unit-field-{{ $item->uuid }}">
                <tr>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        {{ $index+1 }}
                    </td>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        <div class="flex items-center">
                            <x-input form="edit-form" type="checkbox" wire:model="selectedUnits.{{ $item->uuid }}" />
                        </div>
                    </td>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        <x-table-input form="edit-form" type="text" wire:model="units.{{ $index }}.unit" />
                        @error('units.{{ $index }}.unit')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </td>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
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
                    </td>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        <x-table-select form="edit-form" wire:model="units.{{ $index }}.floor_id">
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
                    </td>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
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
                    </td>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        <x-table-input form="edit-form" type="text" min="1" wire:model="units.{{ $index }}.size" />
                        @error('units.{{ $index }}.size')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </td>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        <x-table-input form="edit-form" min="0" type="number" wire:model="units.{{ $index }}.rent" />
                        @error('units.{{ $index }}.rent')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </td>
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        <x-table-input form="edit-form" type="number" min="1"
                            wire:model="units.{{ $index }}.occupancy" />
                        @error('units.{{ $index }}.occupancy')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </td>
                </tr>
            </div>

            @endforeach
        </tbody>
    </table>
</form>