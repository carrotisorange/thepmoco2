<?php
    $formDivClasses = '';
;?>
<form wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">
        <div class="sm:col-span-8">
            <div class="{{ $formDivClasses }}">
                <x-label for="owner" >Full Name </x-label>
                <x-form-input type="text" wire:model="owner"/>
                <x-validation-error-component name='owner' />
            </div>
        </div>
        <div class="sm:col-span-4">
            <div class="{{ $formDivClasses }}">
                <x-label for="job-title" >Email</x-label>
                <x-form-input type="email" wire:model="email"/>
                <x-validation-error-component name='email' />
            </div>
        </div>
        <div class="sm:col-span-4">
            <div class="{{$formDivClasses}}">
                <x-label for="mobile_number">Mobile No</x-label>
                <x-form-input type="text" wire:model="mobile_number"/>
                <x-validation-error-component name='mobile_number' />
            </div>
        </div>
        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="country_id">Country</x-label>
                <x-form-select wire:model="country_id">
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id', $owner_details->
                        country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->country }}
                    </option>
                    @endforeach
                </x-form-select>
                <x-validation-error-component name='country_id' />
            </div>
        </div>
        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="job-title" >Province</x-label>
                <x-form-select wire:model="province_id">
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}" {{ old('province_id', $owner_details->
                        province_id) == $province->id ? 'selected' : '' }}>
                        {{ $province->province }}
                    </option>
                    @endforeach
                </x-form-select>
                <x-validation-error-component name='province_id' />
            </div>
        </div>
        <div class="sm:col-span-4">
            <div class="{{ $formDivClasses }}">
                <x-label for="job-title">
                    Address</x-label>
                <x-form-input type="text" wire:model="barangay"/>
                <x-validation-error-component name='barangay' />
            </div>
        </div>
        <div class="sm:col-span-3">
            <div class="{{ $formDivClasses }}">
                <x-label for="occupation">Occupation</x-label>
                <x-form-input type="text" wire:model="occupation"/>
                <x-validation-error-component name='occupation' />
            </div>
        </div>
        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="employer" >Employer</x-label>
                <x-form-input type="text" wire:model="employer"/>
                <x-validation-error-component name='employer' />
            </div>
        </div>
        <div class="sm:col-span-3">
            <div class="{{ $formDivClasses }}">
                <x-label for="employer_address">Address</x-label>
                <x-form-input type="text" wire:model="employer_address"/>
                <x-validation-error-component name='employer_address' />
            </div>
        </div>
    </div>
    <div class="mt-5 flex justify-end">
        <x-button type="submit">
            Update
        </x-button>
    </div>
</form>
@include('modals.warnings.destroy-owner-modal')
