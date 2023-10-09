<?php
    $formDivClasses = '';
;?>

<form id="updateTenant" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">

    <div class="h-full grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">

        <div class="sm:col-span-4">
            <div class="{{ $formDivClasses }}">
                <x-label for="tenant" >Full Name</x-label>
                <x-form-input type="text" wire:model="tenant"
                  />
                @error('tenant')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>
        </div>

        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="status">Status</x-label>
                <x-form-select wire:model="status"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                   <option value="active" {{ "active"===$status? 'selected' : 'Select one' }}>
                        active
                    </option>
                    <option value="inactive" {{ "inactive"===$status? 'selected' : 'Select one' }}>
                        inactive
                    </option>
                    <option value="pendingmovein" {{ "pendingmovein"===$status? 'selected' : 'Select one' }}>
                        pendingmovein
                    </option>
                    <option value="pendingmoveout" {{ "pendingmoveout"===$status? 'selected' : 'Select one' }}>
                        pendingmoveout
                    </option>
                    <option value="reserved" {{ "reserved"===$status? 'selected' : 'Select one' }}>
                        reserved
                    </option>
                </x-form-select>
                @error('status')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div  class="{{ $formDivClasses }}">
            <x-label for="category" >Category</x-label>
                <x-form-select wire:model="category">
                    <option value="primary" {{ old('category', $category)=='primary' ? 'selected' : 'selected' }}>
                        primary
                    </option>
                    <option value="secondary" {{ old('category', $category)=='secondary' ? 'selected' : 'selected' }}>
                        secondary
                    </option>
                </x-form-select>
                @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-4">
            <div  class="{{ $formDivClasses }}">
                <x-label for="mobile_number" >Mobile #</x-label>
                <x-form-input type="text" wire:model="mobile_number"/>
                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-4">
            <div class="{{ $formDivClasses }}">
                <x-label for="email" >Email
                </x-label>
                <x-form-input type="email" wire:model="email"/>
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="country_id">Country
                </x-label>
                <x-form-select wire:model="country_id">
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id', $tenant_details->
                        country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->country }}
                    </option>
                    @endforeach
                </x-form-select>
                @error('country_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="province_id" >Province</x-label>
                <x-form-select wire:model="province_id">
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}" {{ old('province_id', $tenant_details->
                        province_id) == $province->id ? 'selected' : '' }}>
                        {{ $province->province }}
                    </option>
                    @endforeach
                </x-form-select>
                @error('province_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-4">
            <div class="{{ $formDivClasses }}">
                <x-label for="barangay">
                    Address</x-label>
                <x-form-input type="text" wire:model="barangay"/>
                @error('barangay')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-8">
            <div class="{{ $formDivClasses }}">
                <x-label for="type">
                    Type</x-label>
                <x-form-select wire:model="type">
                    <option value="studying" {{ old('type', $type)=='studying' ? 'selected' : 'selected' }}>
                        studying
                    </option>
                    <option value="working" {{ old('type', $type)=='working' ? 'selected' : 'selected' }}>
                        working
                    </option>
                </x-form-select>

                @error('type')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>


        @if($type=='studying')
        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="course" >Course</x-label>
                <x-form-input type="text" wire:model="course"/>
                @error('course')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="year_level" >Year Level</x-label>
                <input type="text" wire:model="year_level"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('year_level')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div class="{{$formDivClasses}}">
                <x-label for="school" >School</x-label>
                <x-form-input type="text" wire:model="school"/>
                @error('school')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div class="{{$formDivClasses}}">
                <x-label for="school_address" >Address</x-label>
                <x-form-input type="text" wire:model="school_address"/>
                @error('school_address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @else

        <div class="sm:col-span-4">
            <div class="{{ $formDivClasses }}">
                <x-label for="occupation" >Occupation</x-label>
                <x-form-input type="text" wire:model="occupation"/>
                @error('occupation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="employer" >Employer</x-label>
                <x-form-input type="text" wire:model="employer"/>
                @error('employer')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div class="{{ $formDivClasses }}">
                <x-label for="employer_address" >Address</x-label>
                <x-form-input type="text" wire:model="employer_address"/>
                @error('employer_address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @endif
    </div>

    <div class="mt-5 flex justify-end">

        <x-button wire:click="submitForm()" >
            Update
        </x-button>

    </div>
</form>
@include('modals.warnings.destroy-tenant-modal')
