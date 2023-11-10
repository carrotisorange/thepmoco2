<form wire:submit.prevent="submitForm" class="w-full">
    <div class="h-full grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">
        <div class="sm:col-span-4">
            <x-label for="tenant" >Full Name</x-label>
            <x-form-input type="text" wire:model="tenant"/>
            <x-validation-error-component name='tenant' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="status">Status</x-label>
            <x-form-select wire:model="status" >
                <option value="active" {{ "active"===$status? 'selected' : 'Select one' }}>active</option>
                <option value="inactive" {{ "inactive"===$status? 'selected' : 'Select one' }}>inactive</option>
                <option value="pendingmovein" {{ "pendingmovein"===$status? 'selected' : 'Select one' }}>pendingmovein</option>
                <option value="pendingmoveout" {{ "pendingmoveout"===$status? 'selected' : 'Select one' }}>pendingmoveout</option>
                <option value="reserved" {{ "reserved"===$status? 'selected' : 'Select one' }}>reserved</option>
            </x-form-select>
            <x-validation-error-component name='status' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="category" >Category</x-label>
            <x-form-select wire:model="category">
                <option value="primary" {{ old('category', $category)=='primary' ? 'selected' : 'selected' }}>primary</option>
                <option value="secondary" {{ old('category', $category)=='secondary' ? 'selected' : 'selected' }}>secondary</option>
            </x-form-select>
            <x-validation-error-component name='category' />
        </div>
        <div class="sm:col-span-4">
            <x-label for="mobile_number" >Mobile #</x-label>
            <x-form-input type="text" wire:model="mobile_number"/>
            <x-validation-error-component name='mobile_number' />
        </div>
        <div class="sm:col-span-4">
            <x-label for="email" >Email</x-label>
            <x-form-input type="email" wire:model="email"/>
            <x-validation-error-component name='email' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="country_id">Country</x-label>
            <x-form-select wire:model="country_id">
            @foreach($countries as $country)
                <option value="{{ $country->id }}" {{ old('country_id', $tenant_details->country_id) == $country->id ? 'selected' : '' }}>
                    {{ $country->country }}
                </option>
            @endforeach
            </x-form-select>
            <x-validation-error-component name='country_id' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="province_id" >Province</x-label>
            <x-form-select wire:model="province_id">
            @foreach($provinces as $province)
                <option value="{{ $province->id }}" {{ old('province_id', $tenant_details->province_id) == $province->id ? 'selected' : '' }}>
                    {{ $province->province }}
                </option>
            @endforeach
            </x-form-select>
            <x-validation-error-component name='province_id' />
        </div>
        <div class="sm:col-span-4">
            <x-label for="barangay">Address</x-label>
            <x-form-input type="text" wire:model="barangay"/>
            <x-validation-error-component name='barangay' />
        </div>
        <div class="sm:col-span-8">
            <x-label for="type">Type</x-label>
                <x-form-select wire:model="type">
                <option value="studying" {{ old('type', $type)=='studying' ? 'selected' : 'selected' }}>studying</option>
                <option value="working" {{ old('type', $type)=='working' ? 'selected' : 'selected' }}>working</option>
            </x-form-select>
            <x-validation-error-component name='type' />
        </div>
        @if($type==='studying')
        <div class="sm:col-span-2">
            <x-label for="course" >Course</x-label>
            <x-form-input type="text" wire:model="course"/>
            <x-validation-error-component name='course' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="year_level" >Year Level</x-label>
            <x-form-input type="text" wire:model="year_level" />
            <x-validation-error-component name='year_level' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="school" >School</x-label>
            <x-form-input type="text" wire:model="school"/>
            <x-validation-error-component name='school' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="school_address">Address</x-label>
            <x-form-input type="text" wire:model="school_address"/>
            <x-validation-error-component name='school_address' />
        </div>
        @else
        <div class="sm:col-span-4">
            <x-label for="occupation">Occupation</x-label>
            <x-form-input type="text" wire:model="occupation"/>
            <x-validation-error-component name='occupation' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="employer" >Employer</x-label>
            <x-form-input type="text" wire:model="employer"/>
            <x-validation-error-component name='employer' />
        </div>
        <div class="sm:col-span-2">
            <x-label for="employer_address" >Address</x-label>
            <x-form-input type="text" wire:model="employer_address"/>
            <x-validation-error-component name='employer_address' />
        </div>
        @endif
    </div>
    <div class="mt-5 flex justify-end">
        <x-button type="submit">
            Update
        </x-button>
    </div>
</form>
@include('modals.warnings.destroy-tenant-modal')
