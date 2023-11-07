<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-3">
                <div class="grid grid-cols-1 lg:grid-cols-6 gap-6">

                    <div class="col-span-6 lg:col-span-2">
                        <x-label for="tenant" >Full Name</x-label>
                        <x-form-input type="text" wire:model.lazy="tenant" autocomplete="tenant"/>
                        <x-validation-error-component name='tenant' />
                    </div>

                    <div class="col-span-6 lg:col-span-2">
                        <x-label for="email" >Email</x-label>
                        <x-form-input type="email" wire:model.lazy="email" autocomplete="email"/>
                        <x-validation-error-component name='email' />
                    </div>

                    <div class="col-span-6 lg:col-span-2">
                        <x-label for="mobile_number" >Mobile</x-label>
                        <x-form-input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number" value="{{ old('mobile_number') }} "/>
                       <x-validation-error-component name='mobile_number' />
                    </div>

                    <div class="col-span-6 lg:col-span-2">
                        <x-label for="birthdate" >Birthdate</x-label>
                        <x-form-input type="date" wire:model.lazy="birthdate" autocomplete="birthdate" value="{{ old('birthdate') }}" />
                        <x-validation-error-component name='birthdate' />
                    </div>

                    <div class="col-span-6 lg:col-span-1">
                        <x-label for="category" >Category</x-label>
                        <x-form-select wire:model.lazy="category" autocomplete="category">
                            <option value="">Select one</option>
                            <option value="primary" {{ old('category')=='primary' ? 'selected' : 'Select one' }}>{{'primary' }}</option>
                            <option value="co-tenant" {{ old('category')=='co-tenant' ? 'selected' : 'Select one' }}>{{'co-tenant' }}</option>
                        </x-form-select>
                      <x-validation-error-component name='category' />
                    </div>

                    <div class="col-span-6 lg:col-span-1">
                        <x-label for="gender" >Gender</x-label>
                        <x-form-select wire:model.lazy="gender" autocomplete="gender" >
                            <option value="">Select one</option>
                            <option value="female" {{ old('gender')=='female' ? 'selected' : 'Select one' }}> {{ 'female' }}</option>
                            <option value="male" {{ old('gender')=='male' ? 'selected' : 'Select one' }}>{{ 'male' }}</option>
                            <option value="LGBTQ" {{ old('gender')=='LGBTQ' ? 'selected' : 'Select one' }}>{{'LGBTQ' }}</option>
                        </x-form-select>
                      <x-validation-error-component name='gender' />
                    </div>

                    <div class="col-span-6 lg:col-span-2">
                        <x-label for="civil_status" >Civil
                            Status</x-label>
                        <x-form-select wire:model.lazy="civil_status" autocomplete="civil_status">
                            <option value="">Select one</option>
                            <option value="single" {{ old('civil_status')=='single' ? 'selected' : 'Select one' }}>{{ 'single' }}</option>
                            <option value="married" {{ old('civil_status')=='married' ? 'selected' : 'Select one' }}>{{ 'married' }}</option>
                            <option value="widowed" {{ old('civil_status')=='widowed' ? 'selected' : 'Select one' }}>{{ 'widowed' }}</option>
                            <option value="divorced" {{ old('civil_status')=='divorced' ? 'selected' : 'Select one' }}>{{ 'divorced' }}</option>
                        </x-form-select>
                        <x-validation-error-component name='civil_status' />
                    </div>


                    <div class="col-span-6 lg:col-span-2">
                        <x-label for="country_id" >Country</x-label>
                        <x-form-select wire:model.lazy="country_id" autocomplete="country_id">
                            <option value="">Select one</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id')==$country->id?'selected': 'Select one' }}>{{ $country->country }}</option>
                            @endforeach
                        </x-form-select>
                       <x-validation-error-component name='country_id' />
                    </div>

                    <div class="col-span-6 lg:col-span-2">
                        <x-label for="province_id" >Province</x-label>
                        <x-form-select wire:model.lazy="province_id" autocomplete="province_id" >
                            <option value="">Select one</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" {{ old('province_id')==$province->id? 'selected': 'Select one' }}>{{ $province->province }}</option>
                            @endforeach
                        </x-form-select>
                        <x-validation-error-component name='province_id' />
                    </div>

                    <div class="col-span-6 lg:col-span-2">
                        <x-label for="barangay">Address</x-label>
                        <x-form-input type="text" wire:model.lazy="barangay" autocomplete="barangay" value="{{ old('barangay') }}"/>
                        <x-validation-error-component name='barangay' />
                    </div>

                    <div class="col-span-6">
                        <x-label for="type" >Type</x-label>
                        <x-form-select wire:model.lazy="type" autocomplete="type" >
                            <option value="">Select one</option>
                            <option value="studying" {{ old('type')=='studying' ? 'selected' : 'Select one' }}> {{ 'studying' }}</option>
                            <option value="working" {{ old('type')=='working' ? 'selected' : 'Select one' }}>{{ 'working' }}</option>
                        </x-form-select>
                       <x-validation-error-component name='type' />
                    </div>

                    @if($type === 'working')
                    <div class="col-span-2">
                        <x-label for="occupation" >Occupation</x-label>
                        <x-form-input type="text" wire:model.lazy="occupation" autocomplete="occupation" value="{{ old('occupation') }}" />
                      <x-validation-error-component name='occupation' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="employer" >Employer</x-label>
                        <x-form-input type="text" wire:model.lazy="employer" autocomplete="employer" value="{{ old('employer') }}" />
                        <x-validation-error-component name='employer' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="employer_address" >Employer Address</x-label>
                        <x-form-input type="text" wire:model.lazy="employer_address" autocomplete="employer_address" value="{{ old('employer_address') }}"/>
                        <x-validation-error-component name='employer_address' />
                    </div>

                    @elseif($type === 'studying')
                    <div class="col-span-1">
                        <x-label for="course">Course </x-label>
                        <x-form-input type="text" wire:model.lazy="course" autocomplete="course" value="{{ old('course') }}" />
                        <x-validation-error-component name='course' />
                    </div>
                    <div class="col-span-1">
                        <x-label for="year_level" >Year Level
                        </x-label>
                        <x-form-input type="text" wire:model.lazy="year_level" autocomplete="year_level"  value="{{ old('year_level') }}" />
                       <x-validation-error-component name='year_level' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="school" >School  </x-label>
                        <x-form-input type="text" wire:model.lazy="school" autocomplete="school" value="{{ old('school') }}" />
                        <x-validation-error-component name='school' />
                    </div>

                    <div class="col-span-2">
                        <label for="school_address" >School Address </label>
                        <input type="text" wire:model.lazy="school_address" autocomplete="school_address" value="{{ old('school_address') }}" />
                        <x-validation-error-component name='school_address' />
                    </div>
                    @endif

                    <div class="col-span-6">
                        <x-label > Upload Tenant ID (i.e., Government-issued ID, school ID, employee ID) </x-label>
                    </div>

                    <div class="col-span-6 lg:col-span-2">

                        <div
                            class="py-4 bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="photo_id"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="photo_id" name="image" type="file" class="sr-only"
                                            wire:model="photo_id">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                                @if($photo_id)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeId('photo_id')">Remove the attached ID</a>
                                </span>
                                @endif
                            </div>
                        </div>
                        @error('photo_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($photo_id)
                        <p class="text-green-500 text-xs mt-2">Image has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror
                    </div>

                    <div class="col-span-6 lg:col-span-2">
                        <div
                            class="py-4 bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="photo_id_2"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="photo_id_2" name="image" type="file" class="sr-only"
                                            wire:model="photo_id_2">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                                @if($photo_id_2)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeId('photo_id_2')">Remove the attached ID</a>
                                </span>
                                @endif
                            </div>
                        </div>
                        @error('photo_id_2')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($photo_id_2)
                        <p class="text-green-500 text-xs mt-2">Image has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror
                    </div>

                    <div class="col-span-6 lg:col-span-2">
                        <div
                            class="py-4 bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="photo_id_3"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="photo_id_3" name="image" type="file" class="sr-only"
                                            wire:model="photo_id_3">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG up to 10MB</p>
                                @if($photo_id_3)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeId('photo_id_3')">Remove the attached ID</a>
                                </span>
                                @endif
                            </div>
                        </div>
                        @error('photo_id_3')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($photo_id_3)
                        <p class="text-green-500 text-xs mt-2">Image has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror
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
                {{-- <x-button onclick="window.location.href='{{ asset('/brands/docs/Contract of Lease TEMPLATE.docx') }}'">
                        Export Sample Lease Contract
                </x-button> --}}

                <x-button class="bg-red-500"  onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit'">
                    Cancel
                </x-button>
                &nbsp;
                <x-button type="submit">
                    Next
                </x-button>

            </div>
        </div>
    </div>
</form>
