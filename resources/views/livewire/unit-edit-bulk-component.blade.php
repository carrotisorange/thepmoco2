<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:units-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit'">Back
                </x-button>

                @if(App\Models\Property::find(Session::get('property_uuid'))->units->count())
                <x-button wire:click="updateUnit()">
                    Update
                </x-button>
                @endif
            </div>
        </div>

        <div class="mt-3 -my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            {{-- <form wire:submit.prevent="updateForm()"> --}}
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50">
                        <tr>
                            {{-- <x-th>

                            </x-th> --}}
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
                                Rent Duration
                            </x-th>
                            <x-th>
                                Rent
                            </x-th>
                            <x-th>
                                Discount
                            </x-th>
                            {{-- <x-th>
                                Rent/Day
                            </x-th>
                            <x-th>Discount/Day</x-th> --}}
                            <x-th>
                                Occupancy
                            </x-th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($units as $index => $unit)
                        <div wire:key="unit-field-{{ $unit->uuid }}">
                            <tr>

                                {{-- <x-td>
                                    <div class="flex units-center">
                                        <x-input type="checkbox" wire:model="selectedUnits.{{ $unit->uuid }}" />
                                    </div>
                                </x-td> --}}
                                <x-td>
                                    <x-table-input type="text" wire:model="units.{{ $index }}.unit" />
                                    @error('units.{{ $index }}.unit')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>

                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.floor_id">
                                        <option value="">Select one</option>
                                        @foreach ($floors as $floor)
                                        <option value="{{ $floor->floor_id }}" {{ $floor->floor_id ===
                                            'units'.$index.'floor_id'?'selected' : 'Select one' }}>
                                            {{ $floor->floor }}
                                        </option>
                                        @endforeach
                                    </x-table-select>
                                    @error('units.{{ $index }}.floor_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>

                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.status_id">
                                        <option value="">Select one</option>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->status_id }}" {{ 'units'
                                            .$index.'status_id'===$status->
                                            status_id? 'selected' : 'Select one' }}>{{ $status->status }}
                                        </option>
                                        @endforeach
                                    </x-table-select>
                                    @error('units.{{ $index }}.status_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.category_id">
                                        <option value="">Select one</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ 'units'
                                            .$index.'category_id'===$category->
                                            id? 'selected' : 'Select one' }}>
                                            {{ $category->category }}
                                        </option>
                                        @endforeach
                                    </x-table-select>
                                    @error('units.{{ $index }}.category_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <x-table-input type="text" min="1" wire:model="units.{{ $index }}.size" />
                                    @error('units.{{ $index }}.size')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.rent_type">
                                        <option value="">Select one</option>
                                        <option value="rent_per_tenant" {{ 'units'
                                            .$index.'rent_type'==='rent_per_tenant' ? 'selected' : 'Select one' }}>
                                            rent_per_tenant
                                        </option>
                                        <option value="rent_per_unit" {{ 'units' .$index.'rent_type'==='rent_per_unit'
                                            ? 'selected' : 'Select one' }}>
                                            rent_per_unit
                                        </option>


                                    </x-table-select>
                                    @error('units.{{ $index }}.rent_duration')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.rent_duration">
                                        <option value="">Select one</option>
                                        <option value="daily" {{ 'units' .$index.'rent_duration'==='daily' ? 'selected'
                                            : 'Select one' }}>
                                            daily
                                        </option>
                                        <option value="long_term" {{ 'units' .$index.'rent_duration'==='long_term'
                                            ? 'selected' : 'Select one' }}>
                                            long_term
                                        </option>
                                        <option value="short_term" {{ 'units' .$index.'rent_duration'==='short_term'
                                            ? 'selected' : 'Select one' }}>
                                            short_term
                                        </option>


                                    </x-table-select>
                                    @error('units.{{ $index }}.rent_duration')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                @if('units'.$index .'rent_duration' == 'long_term')
                                <x-td>
                                    <x-table-input min="0" type="number" wire:model="units.{{ $index }}.rent" />
                                    @error('units.{{ $index }}.rent')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <x-table-input min="0" type="number" wire:model="units.{{ $index }}.discount" />
                                    @error('units.{{ $index }}.discount')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                @else
                                <x-td>
                                    <x-table-input min="0" type="number"
                                        wire:model="units.{{ $index }}.transient_rent" />
                                    @error('units.{{ $index }}.transient_rent')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <x-table-input min="0" type="number"
                                        wire:model="units.{{ $index }}.transient_discount" />
                                    @error('units.{{ $index }}.transient_discount')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                @endif
                                <x-td>
                                    <x-table-input type="number" min="1" wire:model="units.{{ $index }}.occupancy" />

                                    @error('units.{{ $index }}.occupancy')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                            </tr>
                        </div>

                        @endforeach
                    </tbody>
                </table>
                {{--
            </form> --}}
        </div>
    </div>
</div>
