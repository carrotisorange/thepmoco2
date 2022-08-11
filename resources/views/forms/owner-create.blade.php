<form method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data"
    action="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ Str::random(10) }}/store"
    class="w-full" id="create-form">
    @csrf
    <div class="flex flex-wrap mx-3">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
            <x-label for="owner">
                Full Name <span class="text-red-600">*</span>
            </x-label>
            <x-form-input wire:model="owner" id="owner" type="text" name="owner" value="{{ old('owner') }}" />
            @error('owner')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap mx-3 mb-2 mt-5">
        <div class="w-full md:w-1/2 px-3">
            <x-label for="grid-last-name">
                Email
            </x-label>
            <x-form-input wire:model="email" id="email" type="email" name="email" value="{{ old('email') }}" />

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <x-label for="mobile_number">
                Mobile
            </x-label>
            <x-form-input wire:model="mobile_number" id="mobile_number" type="integer" name="mobile_number"
                value="{{ old('mobile_number') }}" />

            @error('mobile_number')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap mx-3 mb-2 mt-5">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="birthdate">
                Birthdate
            </x-label>
            <x-form-input wire:model="birthdate" id="grid-last-name" type="date" name="birthdate"
                value="{{ old('birthdate') }}" />

            @error('birthdate')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="gender">
                Gender <span class="text-red-600">*</span>
            </x-label>
            <x-form-select wire:model="gender" id="gender" name="gender">
                <option value="">Select one</option>
                <option value="female" {{ old('gender')=='female' ? 'selected' : 'Select one' }}>
                    {{
                    'female' }}</option>
                <option value="male" {{ old('gender')=='male' ? 'selected' : 'Select one' }}>{{
                    'male' }}</option>
            </x-form-select>

            @error('gender')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <x-label for="civil_status">
                Civil Status
            </x-label>
            <x-form-select wire:model="civil_status" id="civil_status" name="civil_status">
                <option value="">Select one</option>
                <option value="single" {{ old('civil_status')=='single' ? 'selected' : 'Select one' }}>
                    {{
                    'single' }}</option>
                <option value="married" {{ old('civil_status')=='married' ? 'selected' : 'Select one' }}>{{
                    'married' }}</option>
                <option value="widowed" {{ old('civil_status')=='widowed' ? 'selected' : 'Select one' }}>
                    {{
                    'widowed' }}</option>
                <option value="divorced" {{ old('civil_status')=='divorced' ? 'selected' : 'Select one' }}>{{
                    'divorced' }}</option>
            </x-form-select>

            @error('civil_status')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
            <x-label for="country_id">
                Country
            </x-label>
            <div class="relative">
                <x-form-select wire:model="country_id" id="country_id" name="country_id">

                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id')==$country->id?
                        'selected': 'Select one'
                        }}>{{ $country->country }}</option>
                    @endforeach
                </x-form-select>

                @error('country_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
            <x-label for="province_id">
                Region
            </x-label>
            <div class="relative">
                <x-form-select wire:model="province_id" id="province_id" name="province_id">
                    <option value="">Select one</option>
                    @foreach ($provinces as $province)
                    <option value="{{ $province->id }}" {{ old('province_id')==$province->id?
                        'selected': 'Select one'
                        }}>{{ $province->province }}</option>
                    @endforeach
                </x-form-select>

                @error('province_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
            <x-label for="city_id">
                City
            </x-label>
            <x-form-select wire:model="city_id" id="city_id" id="city_id" name="city_id">
                <option value="">Select one</option>
                @foreach ($cities as $city)
                <option value="{{ $city->id }}" {{ old('city_id')==$city->id?
                    'selected': 'Select one'
                    }}>{{ $city->city }}</option>
                @endforeach
            </x-form-select>

            @error('city_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
            <x-label for="barangay_id">
                Address
            </x-label>
            <x-form-input wire:model="barangay" id="barangay" type="text" name="barangay"
                value="{{ old('barangay') }}" />
            @error('barangay')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

    </div>

    <div class="flex flex-wrap mx-3 mb-2">
        <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
            <x-label for="photo_id" :value="__('Photo ID (i.e., Government issues ID, school ID, employee ID)')" />

            <x-form-input wire:model="photo_id" id="photo_id" type="file" name="photo_id"
                value="{{ old('photo_id') }}" />

            @error('photo_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="mt-5">
        <p class="text-right">
            <x-button form="create-form">
                <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Create
            </x-button>
        </p>
    </div>
</form>