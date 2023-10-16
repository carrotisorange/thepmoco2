<form class="space-y-6" wire:submit.prevent="submitForm()">
            <div class="mt-5 md:mt-0 md:col-span-3">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-2">
                        <label for="owner" class="block text-sm font-medium text-gray-700">
                            Full Name</label>
                        <x-form-input type="text" wire:model="owner" />
                        @error('owner')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <x-form-input type="email" wire:model="email"/>
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <label for="email-address" class="block text-sm font-medium text-gray-700">Mobile</label>
                        <x-form-input type="text" wire:model="mobile_number"
                            value="{{ old('mobile_number') }}" />
                        @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-3">
                        <label for="country_id" class="block text-sm font-medium text-gray-700">Country</label>
                        <x-form-select wire:model="country_id">
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

                    <div class="col-span-3">
                        <label for="province_id" class="block text-sm font-medium text-gray-700">Province</label>
                        <x-form-select wire:model="province_id" >
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

                    {{-- <div class="col-span-2">
                        <label for="city_id" class="block text-sm font-medium text-gray-700">City</label>
                        <select wire:model="city_id" autocomplete="city_id"
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
                    </div> --}}

                    <div class="col-span-6">
                        <label for="barangay" class="block text-sm font-medium text-gray-700">
                            Address</label>
                        <x-form-input type="text" wire:model="barangay"
                            value="{{ old('barangay') }}"/>
                    </div>

                    <div class="col-span-6">

                        <label class="block text-sm font-medium text-gray-700"> Attach a valid ID of the owner
                            (i.e., Driver's license, UMID/SSS, Passport)
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="photo_id"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="photo_id" name="photo_id" type="file" class="sr-only"
                                            wire:model="photo_id">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($photo_id)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removePhotoId()">Remove the attachment.</a></span>
                                @endif
                            </div>


                        </div>
                        @error('photo_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($photo_id)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror

                    </div>

                    <div class="col-span-2">
                        <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation</label>
                        <x-form-input type="text" wire:model="occupation"
                            value="{{ old('occupation') }}"/>
                        @error('occupation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="employer" class="block text-sm font-medium text-gray-700">Employer</label>
                        <x-form-input type="text" wire:model="employer"
                            value="{{ old('employer') }}"/>
                        @error('employer')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="employer_address" class="block text-sm font-medium text-gray-700">Employer
                            Address</label>
                        <x-form-input type="text" wire:model="employer_address"
                            value="{{ old('employer_address') }}"/>
                        @error('employer_address')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-2">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <x-form-select wire:model="gender">
                            <option value="">Select one</option>
                            <option value="female" {{ old('gender')=='female' ? 'selected' : 'Select one' }}>
                                {{
                                'female' }}</option>
                            <option value="male" {{ old('gender')=='male' ? 'selected' : 'Select one' }}>{{
                                'male' }}</option>
                            <option value="LGBTQ" {{ old('gender')=='LGBTQ' ? 'selected' : 'Select one' }}>{{
                                'LGBTQ' }}</option>
                        </x-form-select>
                        @error('gender')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                        <x-form-input type="date" wire:model="birthdate"
                            value="{{ old('birthdate') }}"/>
                        @error('birthdate')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-2">
                        <label for="civil_status" class="block text-sm font-medium text-gray-700">Civil
                            Status</label>
                        <x-form-select wire:model="civil_status">
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
                        </x-form-select>
                        @error('civil_status')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    @if($civil_status == 'married')
                    <div class="col-span-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Spouse Information</h3>

                    </div>
                    <div class="col-span-2">
                        <label for="spouse_name" class="block text-sm font-medium text-gray-700">Spouse's name</label>
                        <x-form-input type="text" wire:model="spouse_name" />
                        @error('spouse_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="spouse_email" class="block text-sm font-medium text-gray-700">Spouse's Email</label>
                        <x-form-input type="email" wire:model="spouse_email" />
                        @error('spouse_email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="spouse_mobile_number" class="block text-sm font-medium text-gray-700">Spouse's
                            Mobile Number</label>
                        <x-form-input type="text" wire:model="spouse_mobile_number" />
                        @error('spouse_mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    @endif


                    <div class="mt-3 col-span-4">

                        <div class="form-check">

                            <input wire:model="hasAuthorizedRepresentative"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox"
                                value="{{ old('hasAuthorizedRepresentative'), $hasAuthorizedRepresentative }}"
                                id="flexCheckChecked">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                                Does the owner has an authorized representative?
                            </label>

                        </div>

                    </div>

                    @if($hasAuthorizedRepresentative)

                    <div class="col-span-6">
                        <label for="last-name" class="block text-sm font-medium text-gray-700">How is the representative
                            related to the unit owner</label>
                        <x-form-select wire:model="representative_relationship_id" >
                            <option value="">Select one</option>
                            @foreach ($relationships as $relationship)
                            <option value="{{ $relationship->id }}" {{
                                old('representative_relationship_id')==$relationship->id?
                                'selected': 'Select one'
                                }}>{{ $relationship->relationship }}</option>
                            @endforeach
                        </x-form-select>
                        @error('representative_relationship_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    @if($representative_relationship_id)
                    <div class="col-span-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Authorized Representative Information
                        </h3>

                    </div>
                    <div class="col-span-2">
                        <label for="representative_name"
                            class="block text-sm font-medium text-gray-700">Representative's name</label>
                        <x-form-input type="text" wire:model="representative_name" />
                        @error('representative_name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="representative_email"
                            class="block text-sm font-medium text-gray-700">Representative's Email</label>
                        <x-form-input type="email" wire:model="representative_email"/>
                        @error('representative_email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <label for="representative_mobile_number"
                            class="block text-sm font-medium text-gray-700">Representative's Mobile Number</label>
                        <x-form-input type="text" wire:model="representative_mobile_number"
                            autocomplete="representative_mobile_number"/>
                        @error('representative_mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">

                        <label class="block text-sm font-medium text-gray-700"> Attach a valid ID of the representative
                            (i.e., Driver's license, UMID/SSS, Passport)
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="representative_valid_id"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="representative_valid_id" type="file" class="sr-only"
                                            wire:model="representative_valid_id">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                            </div>

                        </div>
                        @error('representative_valid_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($representative_valid_id)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror


                    </div>
                    @endif

                    @endif
                </div>
            </div>
            <div class="flex justify-end">
                <x-button class="bg-red-500" onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}'">
                    Cancel
                </x-button>

                <x-button type="submit">
                    Next
                </x-button>
            </div>
</form>
