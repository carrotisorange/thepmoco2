<div>
    @include('layouts.notifications')
    <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
                <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">
                    <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-label for="tenant">
                            Full Name <span class="text-red-600">*</span>
                        </x-label>
                        <x-form-input wire:model.lazy="tenant" id="tenant" type="text" name="tenant"
                            value="{{ old('tenant', $tenant_details->tenant) }}" />

                        @error('tenant')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/2 px-3">
                        <x-label for="email">
                            Email
                        </x-label>
                        <x-form-input wire:model.lazy="email" id="email" type="email" name="email"
                            value="{{ old('email', $tenant_details->email) }}" />

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-label for="mobile_number">
                            Mobile
                        </x-label>
                        <x-form-input wire:model.lazy="mobile_number" id="mobile_number" type="text"
                            name="mobile_number" value="{{ old('mobile_number', $tenant_details->mobile_number) }}" />

                        @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="type">
                            Type
                        </x-label>
                        <x-form-select wire:model.lazy="type" id="type" name="type">
                            <option value="">Select one</option>

                            <option value="studying" {{ old('type', $tenant_details->
                                type) == 'studying' ? 'selected' : '' }}>
                                studying
                            </option>

                            <option value="working" {{ old('type', $tenant_details->
                                type) == 'working' ? 'selected' : '' }}>
                                working
                            </option>
                        </x-form-select>

                        @error('type')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="birthdate">
                            Birthdate
                        </x-label>
                        <x-form-input wire:model.lazy="birthdate" id="birthdate" type="date" name="birthdate"
                            value="{{ old('birthdate', $tenant_details->birthdate) }}" />

                        @error('birthdate')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="gender">
                            Gender <span class="text-red-600">*</span>
                        </x-label>
                        <x-form-select wire:model.lazy="gender" id="gender" name="gender">
                            <option value="">Select one</option>

                            <option value="female" {{ old('gender', $tenant_details->
                                gender) == 'female' ? 'selected' : '' }}>
                                female
                            </option>

                            <option value="male" {{ old('gender', $tenant_details->
                                gender) == 'male' ? 'selected' : '' }}>
                                male
                            </option>
                        </x-form-select>

                        @error('gender')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="civil_status">
                            Civil Status
                        </x-label>
                        <x-form-select wire:model.lazy="civil_status" id="civil_status" name="civil_status">
                            <option value="">Select one</option>

                            <option value="single" {{ old('civil_status', $tenant_details->
                                civil_status) == 'single' ? 'selected' : '' }}>
                                single
                            </option>

                            <option value="married" {{ old('civil_status', $tenant_details->
                                civil_status) == 'married' ? 'selected' : '' }}>
                                married
                            </option>

                            <option value="widowed" {{ old('civil_status', $tenant_details->
                                civil_status) == 'widowed' ? 'selected' : '' }}>
                                widowed
                            </option>

                            <option value="divorced" {{ old('civil_status', $tenant_details->
                                civil_status) == 'divorced' ? 'selected' : '' }}>
                                divorced
                            </option>
                        </x-form-select>

                        @error('civil_status')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <x-label for="country_id">
                            Country
                        </x-label>
                        <div class="relative">
                            <x-form-select wire:model.lazy="country_id" id="country_id" name="country_id">

                                <option value="">Select one</option>
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
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <x-label for="province_id">
                            Province
                        </x-label>
                        <div class="relative">
                            <x-form-select wire:model.lazy="province_id" id="province_id" id="province_id"
                                name="province_id">
                                <option value="">Select one</option>
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
                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <x-label for="city_id">
                            City
                        </x-label>
                        <x-form-select wire:model.lazy="city_id" id="city_id" id="city_id" name="city_id">
                            <option value="">Select one</option>
                            @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id', $tenant_details->
                                city_id) == $city->id ? 'selected' : '' }}>
                                {{ $city->city }}
                            </option>
                            @endforeach

                        </x-form-select>

                        @error('city_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                        <x-label for="barangay">
                            Barangay
                            </x-lab>
                            <x-form-input wire:model.lazy="barangay" id="barangay" type="text" name="barangay"
                                value="{{ old('barangay', $tenant_details->barangay) }}" />
                            @error('barangay')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                    </div>
                </div>
                @if($type === 'studying')
                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="course">
                            Course
                        </x-label>
                        <x-form-input wire:model.lazy="course" id="course" type="text" name="course"
                            value="{{ old('course', $tenant_details->course) }}" />

                        @error('course')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="year_level">
                            Year Level
                        </x-label>
                        <x-form-input wire:model.lazy="year_level" id="year_level" type="text" name="year_level"
                            value="{{ old('year_level', $tenant_details->year_level) }}" />

                        @error('school')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="school">
                            School
                        </x-label>
                        <x-form-input wire:model.lazy="school" id="school" type="text" name="school"
                            value="{{ old('school', $tenant_details->school) }}" />

                        @error('school')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <x-label for="school_address">
                            School Address
                        </x-label>
                        <x-form-input wire:model.lazy="school_address" id="school_address" type="text"
                            name="school_address"
                            value="{{ old('school_address', $tenant_details->school_address) }}" />

                        @error('school_address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif

                @if($type==='working')
                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full md:w-1/3 px-3">
                        <x-label for="occupation">
                            Occupation
                        </x-label>
                        <x-form-input wire:model.lazy="occupation" id="occupation" type="text" name="occupation"
                            value="{{ old('occupation', $tenant_details->occupation) }}" />

                        @error('occupation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <x-label for="employer">
                            Employer
                        </x-label>
                        <x-form-input wire:model.lazy="employer" id="employer" type="text" name="employer"
                            value="{{ old('employer', $tenant_details->employer) }}" />

                        @error('employer')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/3 px-3">
                        <x-label for="employer_address">
                            Employer Address
                        </x-label>
                        <x-form-input wire:model.lazy="employer_address" id="employer_address" type="text"
                            name="employer_address"
                            value="{{ old('employer_address', $tenant_details->employer_address) }}" />

                        @error('employer_address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif

                <div class="mt-6 flex flex-wrap mx-3 mb-2">
                    <div class="w-full px-3 mb-6 md:mb-0 mt-5 flex">
                        <div class="flex-3">
                            <x-label for="photo_id">
                                Photo ID (i.e., Government issues ID, school ID, employee ID)
                            </x-label>
                            <x-form-input wire:model.lazy="photo_id" id="photo_id" type="file" name="photo_id"
                                value="{{old('photo_id', $tenant_details->photo_id)}}" autofocus />

                            @error('photo_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-6">
                            <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $tenant_details->photo_id }}"
                                alt="">
                        </div>
                    </div>
                </div>

                <div class="mt-6 p-4">
                    <p class="text-right">
                        <x-form-button wire:loading.remove wire:click="submitForm()">Update</x-form-button>
                    </p>
                </div>
        </form>

    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Guardians</h1>
    <div>
        @include('tables.guardians')
        <div class="mt-5">
            {{ $guardians->links() }}
        </div>
    </div>
</div>
<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">References</h1>
    <div>
        @include('tables.references')
        <div class="mt-5">
            {{ $references->links() }}
        </div>
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Contracts</h1>
    @include('tables.contracts')
    <div class="mt-5">
        {{ $contracts->links() }}
    </div>

    <div class="mt-5">

        <p class="text-right">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/units/'">
                Add
            </x-button>
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/contracts'">
                See more

            </x-button>
        </p>
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Bills</h1>
    <div>
        @include('tables.bills')
    </div>
    <div class="mt-5">
        {{ $bills->links() }}
    </div>
    <div class="mt-5">

        <p class="text-right">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/bills'">
                See more
            </x-button>
        </p>
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Payments</h1>
    <div>
        @include('tables.collections')
    </div>
    <div class="mt-5">
        {{ $collections->links() }}
    </div>
    <div class="mt-5">

        <p class="text-right">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/collections'">
                See more

            </x-button>
        </p>
    </div>
</div>

</div>