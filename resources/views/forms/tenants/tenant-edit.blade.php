<form id="updateTenant" method="POST" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="h-full grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">

        <div class="sm:col-span-8">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="name" class="block text-xs font-medium text-gray-900">Full Name</label>
                <input type="text" wire:model.lazy="tenant"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">

            </div>
        </div>

        {{-- <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="name" class="block text-xs font-medium text-gray-900">Tenant
                    Reference No</label>
                <input type="text" wire:model.lazy="bill_reference_no" readonly
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">

            </div>
        </div> --}}

        <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="mobile_number" class="block text-xs font-medium text-gray-900">Mobile #</label>
                <input type="text" wire:model.lazy="mobile_number"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">
                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="email" class="block text-xs font-medium text-gray-900">Email
                </label>
                <input type="email" wire:model.lazy="email"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="country_id" class="block text-xs font-medium text-gray-900">Country
                </label>
                <select wire:model="country_id"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id', $tenant_details->
                        country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->country }}
                    </option>
                    @endforeach
                </select>
                @error('country_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="province_id" class="block text-xs font-medium text-gray-900">Province</label>
                <select wire:model="province_id"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}" {{ old('province_id', $tenant_details->
                        province_id) == $province->id ? 'selected' : '' }}>
                        {{ $province->province }}
                    </option>
                    @endforeach
                </select>
                @error('province_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="city_id" class="block text-xs font-medium text-gray-900">City</label>
                <select wire:model="city_id"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id', $tenant_details->
                        city_id) == $city->id ? 'selected' : '' }}>
                        {{ $city->city }}
                    </option>
                    @endforeach
                </select>
                @error('city_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="barangay" class="block text-xs font-medium text-gray-900">
                    Address</label>
                <input type="text" wire:model.lazy="barangay"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">
                @error('barangay')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-8">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="type" class="block text-xs font-medium text-gray-900">
                    Type</label>
                <select wire:model="type"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    <option value="studying" {{ $type=='studying' ? 'selected' : 'Select one' }}>{{'studying' }}</option>
                    <option value="working" {{ $type=='working' ? 'selected' : 'Select one' }}>{{'working' }}</option>

                </select>

                @error('type')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>


        @if($type==='studying')
        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="course" class="block text-xs font-medium text-gray-900">Course</label>
                <input type="text" wire:model.lazy="course"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('course')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="year_level" class="block text-xs font-medium text-gray-900">Year Level</label>
                <input type="text" wire:model.lazy="year_level"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('year_level')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="school" class="block text-xs font-medium text-gray-900">School</label>
                <input type="text" wire:model.lazy="school"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('school')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="school_address" class="block text-xs font-medium text-gray-900">Address</label>
                <input type="text" wire:model.lazy="school_address"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('school_address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @elseif($type==='working')

        <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="occupation" class="block text-xs font-medium text-gray-900">Occupation</label>
                <input type="text" wire:model.lazy="occupation"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('occupation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="employer" class="block text-xs font-medium text-gray-900">Employer</label>
                <input type="text" wire:model.lazy="employer"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('employer')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="employer_address" class="block text-xs font-medium text-gray-900">Address</label>
                <input type="text" wire:model.lazy="employer_address"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('employer_address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @endif
    </div>

    <div class="mt-5 flex justify-end">
        <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
            href="/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/delete">
            Delete
        </a>

        <button type="submit" form="updateTenant"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

            <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Update
        </button>
    </div>
</form>