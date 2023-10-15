<?php
    $formDivClasses = '';
;?>

<form wire:submit.prevent="submitForm()" class="w-full">
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

        <div class="sm:col-span-4">
            <div class="{{ $formDivClasses }}">
                <x-label for="house">House</x-label>
                <x-form-input type="text" wire:model="house" value="{{ old('house', $house_details->house) }}" />

            </div>
            @error('house')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="status_id">Status</x-label>
                <x-form-select wire:model="status_id">
                    @foreach($statuses as $status)
                    <option value="{{ $status->status_id }}" {{ old('status_id', $house_details->
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

        <div class="sm:col-span-6">
            <div class="{{$formDivClasses}}">
                <x-label for="Address">
                    Address
                </x-label>
                <x-form-input type="text" wire:model="address" step="0.001" />
            </div>
            @error('address')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

    </div>
    <div class="mt-10 flex justify-end">
      
        <x-button type="submit">
            Update
        </x-button>

    </div>
</form>
@include('modals.warnings.destroy-unit-modal')
