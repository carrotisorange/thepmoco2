<!DOCTYPE html>

<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="">
                    <div>
                        <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">
                            <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                                <x-label for="tenant">
                                    Full Name <span class="text-red-600">*</span>
                                </x-label>
                                <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant"
                                    value="{{ old('tenant') }}" />
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap mx-3 mb-2">
                            <div class="w-full md:w-1/2 px-3">
                                <x-label for="email">
                                    Email
                                </x-label>
                                <x-form-input wire:model="email" id="email" type="email" name="email"
                                    value="{{ old('email') }}" />
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <x-label for="mobile_number">
                                    Mobile
                                </x-label>
                                <x-form-input wire:model="mobile_number" id="mobile_number" type="text"
                                    name="mobile_number" value="{{ old('mobile_number') }}" />

                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap mx-3 mb-2">
                            <div class="w-full md:w-1/4 px-3">
                                <x-label for="type">
                                    Type
                                </x-label>
                                <x-form-input wire:model="mobile_number" id="mobile_number" type="text"
                                    name="mobile_number" value="{{ old('mobile_number') }}" />
                            </div>
                            <div class="w-full md:w-1/4 px-3">
                                <x-label for="birthdate">
                                    Birthdate
                                </x-label>
                                <x-form-input wire:model="birthdate" id="birthdate" type="text" name="birthdate"
                                    value="{{ old('birthdate') }}" />

                                @error('birthdate')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-3">
                                <x-label for="gender">
                                    Gender <span class="text-red-600">*</span>
                                </x-label>
                                <x-form-input wire:model="mobile_number" id="mobile_number" type="text"
                                    name="mobile_number" value="{{ old('mobile_number') }}" />
                            </div>

                            <div class="w-full md:w-1/4 px-3">
                                <x-label for="civil_status">
                                    Civil Status
                                </x-label>
                                <x-form-input wire:model="mobile_number" id="mobile_number" type="text"
                                    name="mobile_number" value="{{ old('mobile_number') }}" />


                            </div>
                        </div>

                        <div class="mt-5 flex flex-wrap mx-3 mb-2">
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <x-label for="country_id">
                                    Country
                                </x-label>
                                <x-form-input wire:model="mobile_number" id="mobile_number" type="text"
                                    name="mobile_number" value="{{ old('mobile_number') }}" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <x-label for="province_id">
                                    Region
                                </x-label>
                                <x-form-input wire:model="mobile_number" id="mobile_number" type="text"
                                    name="mobile_number" value="{{ old('mobile_number') }}" />
                            </div>
                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <x-label for="city_id">
                                    City
                                </x-label>
                                <x-form-input wire:model="mobile_number" id="mobile_number" type="text"
                                    name="mobile_number" value="{{ old('mobile_number') }}" />
                            </div>

                            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                <x-label for="barangay">
                                    Address
                                    </x-lab>
                                    <x-form-input wire:model="barangay" id="barangay" type="text" name="barangay"
                                        value="{{ old('barangay') }}" />
                            </div>

                        </div>
                        <div class="mt-5 flex flex-wrap mx-3 mb-2">
                            <div class="w-full md:w-1/2 px-3">
                                <x-label for="school">
                                    School
                                </x-label>
                                <x-form-input wire:model="school" id="school" type="text" name="school"
                                    value="{{ old('school') }}" />

                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <x-label for="school_address">
                                    School Address
                                </x-label>
                                <x-form-input wire:model="school_address" id="school_address" type="text"
                                    name="school_address" value="{{ old('school_address') }}" />

                            </div>
                        </div>

                        <div class="mt-5 flex flex-wrap mx-3 mb-2">
                            <div class="w-full md:w-1/3 px-3">
                                <x-label for="occupation">
                                    Occupation
                                </x-label>
                                <x-form-input wire:model="occupation" id="occupation" type="text" name="occupation"
                                    value="{{ old('occupation') }}" />


                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <x-label for="employer">
                                    Employer
                                </x-label>
                                <x-form-input wire:model="employer" id="employer" type="text" name="employer"
                                    value="{{ old('employer') }}" />


                            </div>
                            <div class="w-full md:w-1/3 px-3">
                                <x-label for="employer_address">
                                    Employer Address
                                </x-label>
                                <x-form-input wire:model="employer_address" id="employer_address" type="text"
                                    name="employer_address" value="{{ old('employer_address') }}" />


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>