<form wire:submit.prevent="updateForm()">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            <tr>
                <x-th>

                </x-th>
                <x-th>
                    Unit
                </x-th>

                <x-th>
                    Floor
                </x-th>

                <x-th>
                    Status
                </x-th>
                <x-th>
                    Category
                </x-th>
                <x-th>
                    Size (sqm)
                </x-th>
                <x-th>
                    Rent Type
                </x-th>
                <x-th>
                    Rent/Mon
                </x-th>
                <x-th>
                    Discount/Mon
                </x-th>
                <x-th>
                    Rent/Day
                </x-th>
                <x-th>Discount/Day</x-th>
                <x-th>
                    Occupancy
                </x-th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($units as $index => $item)
            <div wire:key="unit-field-{{ $item->uuid }}">
                <tr>

                    <x-td>
                        <div class="flex items-center">
                            <x-input form="edit-form" type="checkbox" wire:model="selectedUnits.{{ $item->uuid }}" />
                        </div>
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="text" wire:model.debounce.500ms="units.{{ $index }}.unit"
                            wire:keyup="updateUnit({{ $item->uuid }})" />
                        @error('units.{{ $index }}.unit')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>

                    <x-td>
                        <x-table-select form="edit-form" wire:model="units.{{ $index }}.floor_id">
                            <option value="">Select a floor</option>
                            @foreach ($floors as $floor)
                            <option value="{{ $floor->floor_id }}" {{ $floor->floor_id === 'units'.$index.'floor_id'?
                                'selected'
                                : 'selected' }}>
                                {{ $floor->floor }}
                            </option>

                            @endforeach
                        </x-table-select>
                        @error('units.{{ $index }}.floor_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>

                    <x-td>
                        <x-table-select form="edit-form" wire:model="units.{{ $index }}.status_id">
                            <option value="">Select a status</option>
                            @foreach ($statuses as $status)
                            <option value="{{ $status->status_id }}" {{ 'units' .$index.'status_id'===$status->
                                status_id? 'selected' : 'selected' }}>{{ $status->status }}
                            </option>
                            @endforeach
                        </x-table-select>
                        @error('units.{{ $index }}.status_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-select form="edit-form" wire:model="units.{{ $index }}.category_id">
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ 'units' .$index.'category_id'===$category->
                                id? 'selected' : 'selected' }}>
                                {{ $category->category }}
                            </option>
                            @endforeach
                        </x-table-select>
                        @error('units.{{ $index }}.category_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" type="text" min="1" wire:model="units.{{ $index }}.size" />
                        @error('units.{{ $index }}.size')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-select form="edit-form" wire:model="units.{{ $index }}.rent_type">
                            <option value="">Select a rent type</option>
                            <option value="rent_per_tenant" {{ 'units' .$index.'rent_type'==='rent_per_tenant'
                                ? 'selected' : '' }}>
                                rent_per_tenant
                            </option>
                            <option value="rent_per_unit" {{ 'units' .$index.'rent_type'==='rent_per_unit' ? 'selected'
                                : '' }}>
                                rent_per_unit
                            </option>


                        </x-table-select>
                        @error('units.{{ $index }}.rent_type')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" min="0" type="number" wire:model="units.{{ $index }}.rent" />
                        @error('units.{{ $index }}.rent')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" min="0" type="number"
                            wire:model="units.{{ $index }}.discount" />
                        @error('units.{{ $index }}.discount')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" min="0" type="number"
                            wire:model="units.{{ $index }}.transient_rent" />
                        @error('units.{{ $index }}.transient_rent')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </x-td>
                    <x-td>
                        <x-table-input form="edit-form" min="0" type="number"
                            wire:model="units.{{ $index }}.transient_discount" />
                        @error('units.{{ $index }}.transient_discount')
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