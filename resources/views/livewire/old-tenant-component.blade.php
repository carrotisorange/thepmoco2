<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div>

                    <form method="POST" wire:submit.prevent="submitForm" class="w-full"
                        id="create-form">
                        @csrf
                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                                <x-label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="tenant">
                                    Full Name
                                </x-label>

                                <x-input wire:model="tenant"
                                    class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="tenant" type="text" name="tenant" value="{{ old('tenant') }}" />

                                @error('tenant')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap mx-3 mb-2">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="email">
                                    Email
                                </label>
                                <input wire:model="email"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="email" type="email" name="email" value="{{ old('email') }}">

                                @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="mobile_number">
                                    Mobile
                                </label>
                                <input wire:model="mobile_number"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="mobile_number" type="text" name="mobile_number"
                                    value="{{ old('mobile_number') }}">

                                @error('mobile_number')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>




                        </div>

                        <div class="mt-6 flex flex-wrap mx-3 mb-2">
                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="type">
                                    Type
                                </label>
                                <select wire:model="type"
                                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="type" name="type">
                                    <option value="">Select one</option>
                                    <option value="studying" {{ old('type')=='studying' ? 'selected' : 'Select one' }}>
                                        {{
                                        'studying' }}</option>
                                    <option value="working" {{ old('type')=='working' ? 'selected' : 'Select one' }}>{{
                                        'working' }}</option>

                                </select>

                                @error('type')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="birthdate">
                                    Birthdate
                                </label>
                                <input wire:model="birthdate"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="birthdate" type="date" name="birthdate" value="{{ old('birthdate') }}">

                                @error('birthdate')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="gender">
                                    Gender
                                </label>
                                <select wire:model="gender"
                                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="gender" name="gender">
                                    <option value="">Select one</option>
                                    <option value="female" {{ old('gender')=='female' ? 'selected' : 'Select one' }}>
                                        {{
                                        'female' }}</option>
                                    <option value="male" {{ old('gender')=='male' ? 'selected' : 'Select one' }}>{{
                                        'male' }}</option>
                                </select>

                                @error('gender')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="civil_status">
                                    Civil Status
                                </label>
                                <select wire:model="civil_status"
                                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="civil_status" name="civil_status">
                                    <option value="">Select one</option>
                                    <option value="single" {{ old('civil_status')=='single' ? 'selected' : 'Select one'
                                        }}>
                                        {{
                                        'single' }}</option>
                                    <option value="married" {{ old('civil_status')=='married' ? 'selected'
                                        : 'Select one' }}>{{
                                        'married' }}</option>
                                    <option value="widowed" {{ old('civil_status')=='widowed' ? 'selected'
                                        : 'Select one' }}>
                                        {{
                                        'widowed' }}</option>
                                    <option value="divorced" {{ old('civil_status')=='divorced' ? 'selected'
                                        : 'Select one' }}>{{
                                        'divorced' }}</option>
                                </select>

                                @error('civil_status')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="country_id">
                                    Country
                                </label>
                                <div class="relative">
                                    <select wire:model="country_id"
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="country_id" name="country_id">

                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ old('country_id')==$country->id?
                                            'selected': 'Select one'
                                            }}>{{ $country->country }}</option>
                                        @endforeach
                                    </select>

                                    @error('country_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="province_id">
                                    Province
                                </label>
                                <div class="relative">
                                    <select wire:model="province_id"
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="province_id" name="province_id">
                                        <option value="">Select one</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" {{ old('province_id')==$province->id?
                                            'selected': 'Select one'
                                            }}>{{ $province->province }}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="city_id">
                                    City
                                </label>
                                <select wire:model="city_id"
                                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="city_id" id="city_id" name="city_id">
                                    <option value="">Select one</option>
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ old('city_id')==$city->id?
                                        'selected': 'Select one'
                                        }}>{{ $city->city }}</option>
                                    @endforeach
                                </select>

                                @error('city_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="barangay">
                                    Barangay
                                </label>
                                <input wire:model="barangay"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="barangay" type="text" name="barangay" value="{{ old('barangay') }}">

                                @error('barangay')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="flex flex-wrap mx-3 mb-2 mt-5">
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    School
                                </label>
                                <input wire:model="school"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="school" type="text" name="school" value="{{ old('school') }}">

                                @error('school')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="school_address">
                                    School Address
                                </label>
                                <input wire:model="school_address"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="school_address" type="text" name="school_address"
                                    value="{{ old('school_address') }}">

                                @error('school_address')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex-wrap mx-3 mb-2 mt-5">
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="occupation">
                                    Occupation
                                </label>
                                <input wire:model="occupation"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="occupation" type="text" name="occupation" value="{{ old('occupation') }}">

                                @error('occupation')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="employer">
                                    Employer
                                </label>
                                <input wire:model="employer"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="employer" type="text" name="employer" value="{{ old('employer') }}">

                                @error('employer')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Work Address
                                </label>
                                <input wire:model="employer_address"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="employer_address" type="text" name="employer_address"
                                    value="{{ old('employer_address') }}">

                                @error('employer_address')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-state">
                                    Photo ID (i.e., Government issues ID, school ID, employee ID)
                                </label>


                                <input wire:model="photo_id"
                                    class="appearance-none block w-full text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="file" name="photo_id" value="{{ old('photo_id') }}">

                                @error('photo_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>


                </div>
                <div class="mt-5">
                    <p class="text-right">
                        <x-button form="create-form">
                            <svg wire:loading wire:target="submitForm"
                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Submit
                        </x-button>
                    </p>
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>