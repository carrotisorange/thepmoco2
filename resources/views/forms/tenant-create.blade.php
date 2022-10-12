<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="bg-gray-100 mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-3">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-2">
                        <label for="tenant" class="block text-sm font-medium text-gray-700">Full
                            Name</label>
                        <input type="text" wire:model.lazy="tenant" autocomplete="tenant" 
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('tenant')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model.lazy="email" autocomplete="email" 
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="email-address" class="block text-sm font-medium text-gray-700">Mobile</label>
                        <input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number"
                            value="{{ old('mobile_number') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-2">
                        <label for="country_id" class="block text-sm font-medium text-gray-700">Country</label>
                        <select wire:model.lazy="country_id" autocomplete="country_id"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select one</option>
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

                    <div class="col-span-2">
                        <label for="province_id" class="block text-sm font-medium text-gray-700">Province</label>
                        <select wire:model.lazy="province_id" autocomplete="province_id"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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

                    <div class="col-span-2">
                        <label for="city_id" class="block text-sm font-medium text-gray-700">City</label>
                        <select wire:model.lazy="city_id" autocomplete="city_id"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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

                    <div class="col-span-6">
                        <label for="barangay" class="block text-sm font-medium text-gray-700">
                            Address</label>
                        <input type="text" wire:model.lazy="barangay" autocomplete="barangay"
                            value="{{ old('barangay') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    </div>


                    <div class="col-span-2">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select wire:model.lazy="gender" autocomplete="gender"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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

                    <div class="col-span-2">
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                        <input type="date" wire:model.lazy="birthdate" autocomplete="birthdate"
                            value="{{ old('birthdate') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('birthdate')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-2">
                        <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil
                            Status</label>
                        <select wire:model.lazy="civil_status" autocomplete="civil_status"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select one</option>
                            <option value="single" {{ old('civil_status')=='single' ? 'selected' : 'Select one' }}>
                                {{
                                'single' }}</option>
                            <option value="married" {{ old('civil_status')=='married' ? 'selected' : 'Select one' }}>{{
                                'married' }}</option>
                            <option value="widowed" {{ old('civil_status')=='widowed' ? 'selected' : 'Select one' }}>
                                {{
                                'widowed' }}</option>
                            <option value="divorced" {{ old('civil_status')=='divorced' ? 'selected' : 'Select one' }}>
                                {{
                                'divorced' }}</option>
                        </select>
                        @error('civil_status')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select wire:model.lazy="type" autocomplete="type"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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

                    @if($type === 'working')
                    <div class="col-span-2">
                        <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation</label>
                        <input type="text" wire:model.lazy="occupation" autocomplete="occupation"
                            value="{{ old('occupation') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('occupation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="employer" class="block text-sm font-medium text-gray-700">Employer</label>
                        <input type="text" wire:model.lazy="employer" autocomplete="employer"
                            value="{{ old('employer') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('employer')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="employer_address" class="block text-sm font-medium text-gray-700">Employer
                            Address</label>
                        <input type="text" wire:model.lazy="employer_address" autocomplete="employer_address"
                            value="{{ old('employer_address') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('employer_address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    @elseif($type === 'studying')
                    <div class="col-span-1">
                        <label for="course" class="block text-sm font-medium text-gray-700">Course
                        </label>
                        <input type="text" wire:model.lazy="course" autocomplete="course" value="{{ old('course') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('course')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="year_level" class="block text-sm font-medium text-gray-700">Year Level
                        </label>
                        <input type="text" wire:model.lazy="year_level" autocomplete="year_level"
                            value="{{ old('year_level') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('year_level')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="school" class="block text-sm font-medium text-gray-700">School
                        </label>
                        <input type="text" wire:model.lazy="school" autocomplete="school" value="{{ old('school') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('school')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="school_address" class="block text-sm font-medium text-gray-700">School Address
                        </label>
                        <input type="text" wire:model.lazy="school_address" autocomplete="school_address"
                            value="{{ old('school_address') }}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('school_address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror


                    </div>
                    @endif
                    <div class="col-span-6">

                        <label class="block text-sm font-medium text-gray-700"> Upload an ID (i.e.,
                            Government issues ID, school ID, employee ID)
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="image" type="file" class="sr-only"
                                            wire:model="photo_id">
                                    </label>
                                   
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                            </div>
                            @error('photo_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($photo_id)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i></p>
                            @endif

                        </div>
                       
                    </div>

                    @if($email)
                    <div class="mt-3 col-span-4">
                        <div class="form-check">
                            <input wire:model="generateCredentials"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="{{ old('generateCredentials'), $generateCredentials }}"
                                id="flexCheckChecked">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                                Generate credentials and send it to tenant's email address.
                            </label>
                        </div>
                    </div>
                    @endif


                </div>
            </div>
            <div class="flex justify-end mt-2">
                <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                    target="_blank" href="create/export">
                    Download Tenant Information Sheet
                </a>

                <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                    class="ml-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
                <button type="submit" 
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                    <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    Next
                </button>
            </div>
        </div>
    </div>
</form>