<?php
    $formDivClasses = 'bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600';
;?>

<form wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

        <div class="sm:col-span-4">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="name" >Unit</x-label>
                <x-form-input type="text" wire:model="unit" value="{{ old('unit', $unit_details->unit) }}"
                  />

            </div>
            @error('unit')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
        </div>
        <div class="sm:col-span-2">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="price">Purchase
                    amount</x-label>
                <x-form-input type="number" wire:model="price" value="{{ old('price', $unit_details->price) }}" step="0.001"/>

            </div>
            @error('price')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <div class="{{ $formDivClasses }}">
                <x-label for="building_id" >Building</x-label>
                <x-form-select wire:model="building_id">
                    @foreach($buildings as $building)
                    <option value="{{ $building->id }}" {{ old('building_id', $unit_details->building_id) == $building->id ? 'selected' : 'selected' }}>
                        {{ $building->building }}
                    </option>
                    @endforeach
                </x-form-select>
            </div>
            @error('building_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="floor_id" >Floor</x-label>
                <x-form-select wire:model="floor_id">
                    @foreach($floors as $floor)
                    <option value="{{ $floor->floor_id }}" {{ old('floor_id', $unit_details->
                        floor_id) == $floor->floor_id ? 'selected' : 'selected' }}>
                        {{ $floor->floor }}
                    </option>
                    @endforeach
                </x-form-select>
            </div>
            @error('floor_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="category_id" >Category</x-label>
                <x-form-select wire:model="category_id">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $unit_details->
                        category_id) == $category->id ? 'selected' : 'selected' }}>
                        {{ $category->category }}
                    </option>
                    @endforeach
                </x-form-select>
            </div>
            @error('category_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="status_id">Status</x-label>
                <x-form-select wire:model="status_id">
                    @foreach($statuses as $status)
                    <option value="{{ $status->status_id }}" {{ old('status_id', $unit_details->
                        status_id) == $status->status_id ? 'selected' : 'selected' }}>
                        {{ $status->status }}
                    </option>
                    @endforeach
                </x-form-select>
            </div>
            @error('status_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="job-title">Area
                    (sqm)</x-label>
                <x-form-input type="text" wire:model="size" value="{{old('size', $unit_details->size)}}"/>
            </div>
            @error('size')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-1">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="job-title" >Occupancy</x-label>
                <x-form-input type="number" min="1" wire:model="occupancy"
                    value="{{old('occupancy', $unit_details->occupancy)}}" />
            </div>
            @error('occupancy')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="is_the_unit_for_rent_to_tenant" >Is the
                    unit for rent? </x-label>
                <x-form-select wire:model="is_the_unit_for_rent_to_tenant">
                    <option value="1" {{ old('is_the_unit_for_rent_to_tenant', $is_the_unit_for_rent_to_tenant)==1
                        ? 'selected' : 'selected' }}>
                        yes
                    </option>
                    <option value="0" {{ old('is_the_unit_for_rent_to_tenant', $is_the_unit_for_rent_to_tenant)==0
                        ? 'selected' : 'selected' }}>
                        no
                    </option>
                </x-form-select>
            </div>
            @error('is_the_unit_for_rent_to_tenant')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        @if ($is_the_unit_for_rent_to_tenant == 1)
        <div class="sm:col-span-2">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="rent_type">Rent type
                </x-label>
                <x-form-select wire:model="rent_type">
                    <option value="rent_per_tenant" {{ old('rent_per_tenant', $rent_type)=='rent_per_tenant'
                        ? 'selected' : 'selected' }}>
                        rent_per_tenant
                    </option>
                    <option value="rent_per_unit" {{ old('rent_per_unit', $rent_type)=='rent_per_unit' ? 'selected'
                        : 'selected' }}>
                        rent_per_unit
                    </option>
                </x-form-select>
            </div>
            @error('rent_type')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="sm:col-span-2">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="rent_duration" >Rent Duration
                </x-label>
                <x-form-select wire:model="rent_duration"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    <option value="">Select one</option>
                    <option value="daily" {{ old('rent_duration', $rent_duration)=='daily' ? 'selected'
                        : 'Select one' }}>
                        daily
                    </option>
                    <option value="long_term" {{ old('rent_duration', $rent_duration)=='long_term' ? 'selected'
                        : 'Select one' }}>
                        long_term
                    </option>
                    <option value="short_term" {{ old('rent_duration', $rent_duration)=='short_term' ? 'selected' : 'Select one' }}>
                        short_term
                    </option>
                </x-form-select>
            </div>
            @error('rent_duration')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        @if($rent_duration === 'long_term')
        <div class="sm:col-span-3">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="rent" >
                    @if($rent_type === 'rent_per_tenant')
                    Rent/Tenant/Month
                    @else
                    Rent/Unit/Month
                    @endif
                </x-label>
                <x-form-input type="number" wire:model="rent" step="0.001" value="{{old('rent', $unit_details->rent)}}"
                    />
            </div>
            @error('rent')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="discount" >Discount/Month</x-label>
                <x-form-input type="number" wire:model="discount" step="0.001"
                    value="{{old('discount', $unit_details->discount)}}"
                    />
            </div>
            @error('discount')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        @else

        <div class="sm:col-span-3">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="transient_rent" >
                    Rent/Unit/Day
                </x-label>
                <x-form-input type="number" wire:model="transient_rent" step="0.001"
                    value="{{old('transient_rent', $unit_details->transient_rent)}}"
                    />
            </div>
            @error('transient_rent')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="transient_discount">
                    Discount/Day
                </x-label>
                <x-form-input type="number" wire:model="transient_discount" step="0.001"
                    value="{{old('transient_discount', $unit_details->transient_discount)}}"
                  />
            </div>
            @error('transient_discount')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        @endif

        @endif

        <div class="sm:col-span-3">
            <div
                class="{{ $formDivClasses }}">
                <x-label for="management_fee">
                    Management Fee
                </x-label>
                <x-form-input type="number" wire:model="management_fee" step="0.001"/>
            </div>
        </div>

        <div class="sm:col-span-3">
            <div
                class="{{$formDivClasses}}">
                <x-label for="marketing_fee">
                    Marketing Fee
                </x-label>
                <x-form-input type="number" wire:model="marketing_fee" step="0.001"/>
            </div>
        </div>

    </div>
    <div class="mt-10 flex justify-end">
        <x-button type="button" data-modal-toggle="warning-destroy-unit-modal"
            class=" bg-red-600 hover:bg-red-700">
            Delete
        </x-button>
        &nbsp
        <x-button type="button" wire:click="submitForm()">
            Update
        </x-button>

    </div>
</form>
@include('modals.warnings.destroy-unit-modal')
