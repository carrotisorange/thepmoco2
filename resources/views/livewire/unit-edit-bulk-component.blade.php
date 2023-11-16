<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:units-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit'">Back</x-button>
                @if(App\Models\Property::find(Session::get('property_uuid'))->units->count())
                <x-button wire:click="updateUnit">
                    Update
                </x-button>
                @endif
            </div>
        </div>
        <div class="mt-3 -my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                <x-table-component>
                    <x-table-head-component>
                        <tr>
                            <x-th> Unit  </x-th>
                            <x-th> Floor </x-th>
                            <x-th> Status  </x-th>
                            <x-th> Category  </x-th>
                            <x-th> Size (sqm) </x-th>
                            <x-th> Rent Type </x-th>
                            <x-th> Rent Duration </x-th>
                            <x-th> Rent </x-th>
                            <x-th> Discount </x-th>
                            <x-th> Occupancy  </x-th>
                        </tr>
                    </x-table-head-component>
                    <x-table-body-component>
                        @foreach ($units as $index => $unit)
                        <div wire:key="unit-field-{{ $unit->uuid }}">
                            <tr>
                                <x-td>
                                    <x-table-input type="text" wire:model="units.{{ $index }}.unit" />
                                    <x-validation-error-component name='units.{{ $index }}.unit' />
                                </x-td>
                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.floor_id">
                                        <option value="">Select one</option>
                                        @foreach ($floors as $floor)
                                        <option value="{{ $floor->floor_id }}" {{ $floor->floor_id === 'units'.$index.'floor_id'?'selected' : 'Select one' }}>
                                            {{ $floor->floor }}
                                        </option>
                                        @endforeach
                                    </x-table-select>
                                    <x-validation-error-component name='units.{{ $index }}.floor_id' />
                                </x-td>
                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.status_id">
                                        <option value="">Select one</option>
                                        @foreach ($statuses as $status)
                                        <option value="{{ $status->status_id }}" {{ 'units'.$index.'status_id'===$status-> status_id? 'selected' : 'Select one' }}>
                                            {{ $status->status }}
                                        </option>
                                        @endforeach
                                    </x-table-select>
                                    <x-validation-error-component name='units.{{ $index }}.status_id' />
                                </x-td>
                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.category_id">
                                        <option value="">Select one</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ 'units'.$index.'category_id'===$category->id? 'selected' : 'Select one' }}>
                                            {{ $category->category }}
                                        </option>
                                        @endforeach
                                    </x-table-select>
                                    <x-validation-error-component name='units.{{ $index }}.category_id' />
                                </x-td>
                                <x-td>
                                    <x-table-input type="text" min="1" wire:model="units.{{ $index }}.size" />
                                    <x-validation-error-component name='units.{{ $index }}.size' />
                                </x-td>
                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.rent_type">
                                        <option value="">Select one</option>
                                        <option value="rent_per_tenant" {{ 'units'.$index.'rent_type'==='rent_per_tenant' ? 'selected' : 'Select one' }}>
                                            rent_per_tenant
                                        </option>
                                        <option value="rent_per_unit" {{ 'units' .$index.'rent_type'==='rent_per_unit' ? 'selected' : 'Select one' }}>
                                            rent_per_unit
                                        </option>
                                    </x-table-select>
                                   <x-validation-error-component name='units.{{ $index }}.rent_type' />
                                </x-td>
                                <x-td>
                                    <x-table-select wire:model="units.{{ $index }}.rent_duration">
                                        <option value="">Select one</option>
                                        <option value="daily" {{ 'units' .$index.'rent_duration'==='daily' ? 'selected': 'Select one' }}>
                                            daily
                                        </option>
                                        <option value="long_term" {{ 'units' .$index.'rent_duration'==='long_term'? 'selected' : 'Select one' }}>
                                            long_term
                                        </option>
                                        <option value="short_term" {{ 'units' .$index.'rent_duration'==='short_term'? 'selected' : 'Select one' }}>
                                            short_term
                                        </option>
                                    </x-table-select>
                                    <x-validation-error-component name='units.{{ $index }}.rent_duration' />
                                </x-td>
                                @if('units'.$index .'rent_duration' == 'long_term')
                                <x-td>
                                    <x-table-input min="0" type="number" wire:model="units.{{ $index }}.rent" />
                                    <x-validation-error-component name='units.{{ $index }}.rent' />
                                </x-td>
                                <x-td>
                                    <x-table-input min="0" type="number" wire:model="units.{{ $index }}.discount" />
                                    <x-validation-error-component name='units.{{ $index }}.discount' />
                                </x-td>
                                @else
                                <x-td>
                                    <x-table-input min="0" type="number" wire:model="units.{{ $index }}.transient_rent" />
                                    <x-validation-error-component name='units.{{ $index }}.transient_rent' />
                                </x-td>
                                <x-td>
                                    <x-table-input min="0" type="number" wire:model="units.{{ $index }}.transient_discount" />
                                    <x-validation-error-component name='units.{{ $index }}.transient_discount' />
                                </x-td>
                                @endif
                                <x-td>
                                    <x-table-input type="number" min="1" wire:model="units.{{ $index }}.occupancy" />
                                    <x-validation-error-component name='units.{{ $index }}.occupancy' />
                                </x-td>
                            </tr>
                        </div>
                        @endforeach
                    </x-table-body-component>
                </x-table-component>
        </div>
    </div>
</div>
