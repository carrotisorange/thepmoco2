<div>
    <div class="p-8 bg-white border-b border-gray-200">
        <form wire:submit.prevent="submitForm()" class="w-full">
            @csrf
            <div class="mt-2 flex flex-wrap mt-5 mb-2">
                <div class="w-full md:w-full  mb-3">
                    <x-label for="tenant">
                        Full Name <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model.lazy="tenant" id="tenant" type="text" name="tenant"
                        value="{{ old('tenant') }}" />

                    @error('tenant')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-2 flex flex-wrap mb-2">
                <div class="w-full md:w-1/2  mb-3">
                    <x-label for="email">
                        Email <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model.lazy="email" id="email" type="email" name="email"
                        value="{{ old('email') }}" />

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2  mb-3">
                    <x-label for="mobile_number">
                        Mobile
                    </x-label>
                    <x-form-input wire:model.lazy="mobile_number" id="mobile_number" type="text" name="mobile_number"
                        value="{{ old('mobile_number') }}" />

                    @error('mobile_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-2 flex flex-wrap mb-2">
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="type">
                        Type <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-select wire:model.lazy="type" id="type" name="type">
                        <option value="">Select one</option>
                        <option value="studying" {{ old('type')=='studying' ? 'selected' : 'Select one' }}>
                            {{
                            'studying' }}</option>
                        <option value="working" {{ old('type')=='working' ? 'selected' : 'Select one' }}>{{
                            'working' }}</option>
                    </x-form-select>

                    @error('type')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="birthdate">
                        Birthdate
                    </x-label>
                    <x-form-input wire:model.lazy="birthdate" id="birthdate" type="date" name="birthdate"
                        value="{{ old('birthdate') }}" />

                    @error('birthdate')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="gender">
                        Gender <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-select wire:model.lazy="gender" id="gender" name="gender">
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

                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="civil_status">
                        Civil Status
                    </x-label>
                    <x-form-select wire:model.lazy="civil_status" id="civil_status" name="civil_status">
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

            <div class="mt-2 flex flex-wrap mb-2">
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="country_id">
                        Country
                    </x-label>
                    <div class="relative">
                        <x-form-select wire:model.lazy="country_id" id="country_id" name="country_id">
                            <option value="">Select one</option>
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
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="province_id">
                        Region
                    </x-label>
                    <div class="relative">
                        <x-form-select wire:model.lazy="province_id" id="province_id" id="province_id"
                            name="province_id">
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
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="city_id">
                        City
                    </x-label>
                    <x-form-select wire:model.lazy="city_id" id="city_id" id="city_id" name="city_id">
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

                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="barangay">
                        Address
                        </x-lab>
                        <x-form-input wire:model.lazy="barangay" id="barangay" type="text" name="barangay"
                            value="{{ old('barangay') }}" />

                        @error('barangay')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                </div>

            </div>
            @if($type === 'studying')
            <div class="mt-2 flex flex-wrap mb-2">
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="course">
                        Course
                    </x-label>
                    <x-form-input wire:model.lazy="course" id="course" type="text" name="course"
                        value="{{ old('course') }}" />

                    @error('course')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="year_level">
                        Year Level
                    </x-label>
                    <x-form-input wire:model.lazy="year_level" id="year_level" type="text" name="year_level"
                        value="{{ old('year_level') }}" />

                    @error('year_level')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="school">
                        School
                    </x-label>
                    <x-form-input wire:model.lazy="school" id="school" type="text" name="school"
                        value="{{ old('school') }}" />

                    @error('school')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/4  mb-3">
                    <x-label for="school_address">
                        Address
                    </x-label>
                    <x-form-input wire:model.lazy="school_address" id="school_address" type="text" name="school_address"
                        value="{{ old('school_address') }}" />

                    @error('school_address')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @endif

            @if($type === 'working')
            <div class="mt-2 flex flex-wrap mb-2">
                <div class="w-full md:w-1/3  mb-3">
                    <x-label for="occupation">
                        Occupation
                    </x-label>
                    <x-form-input wire:model.lazy="occupation" id="occupation" type="text" name="occupation"
                        value="{{ old('occupation') }}" />

                    @error('occupation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3  mb-3">
                    <x-label for="employer">
                        Employer
                    </x-label>
                    <x-form-input wire:model.lazy="employer" id="employer" type="text" name="employer"
                        value="{{ old('employer') }}" />

                    @error('employer')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/3  mb-3">
                    <x-label for="employer_address">
                        Employer Address
                    </x-label>
                    <x-form-input wire:model.lazy="employer_address" id="employer_address" type="text"
                        name="employer_address" value="{{ old('employer_address') }}" />

                    @error('employer_address')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @endif

            <div class="mt-2 flex flex-wrap mb-2">
                <div class="w-full md:w-full  mb-3">
                    <x-label for="photo_id">
                        Photo ID (i.e., Government issues ID, school ID, employee ID)
                    </x-label>

                    <x-form-input wire:model.lazy="photo_id" id="grid-last-name" type="file" name="photo_id"
                        value="{{ old('photo_id') }}" />

                    @error('photo_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Cancel
                    </button>
                    <x-form-button type="submit" wire:loading.remove wire:click="submitForm()">
                       Submit
                    </x-form-button>

                </div>
            </div>
        </form>
        @include('layouts.notifications')
    </div>
</div>