<form class="space-y-6" wire:submit.prevent="submitForm()" wire:ignore.self>
            <div class="mt-5 md:mt-0 md:col-span-3">
                <div class="grid grid-cols-6 gap-6">

                    <div class="col-span-6 sm:col-span-2">
                        <x-label for="owner" >Full Name</x-label>
                        <x-form-input type="text" wire:model="owner" />
                        <x-validation-error-component name='owner' />
                    </div>

                    <div class="col-span-6 sm:col-span-2">
                        <x-label for="email" >Email</x-label>
                        <x-form-input type="email" wire:model="email"/>
                        <x-validation-error-component name='email' />
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-label for="email-address" >Mobile</x-label>
                        <x-form-input type="text" wire:model="mobile_number" value="{{ old('mobile_number') }}" />
                        <x-validation-error-component name='mobile_number' />
                    </div>
                    <div class="col-span-3">
                        <x-label for="country_id" >Country</x-label>
                        <x-form-select wire:model="country_id">
                            <option value="">Select one</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id')==$country->id?'selected': 'Select one' }}>
                                {{ $country->country }}
                            </option>
                            @endforeach
                        </x-form-select>
                        <x-validation-error-component name='country_id' />
                    </div>

                    <div class="col-span-3">
                        <x-label for="province_id" >Province</x-label>
                        <x-form-select wire:model="province_id" >
                            <option value="">Select one</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" {{ old('province_id')==$province->id? 'selected': 'Select one' }}>
                                {{ $province->province }}
                            </option>
                            @endforeach
                        </x-form-select>
                        <x-validation-error-component name='province_id' />
                    </div>

                    <div class="col-span-6">
                        <x-label for="barangay" >Address</x-label>
                        <x-form-input type="text" wire:model="barangay" value="{{ old('barangay') }}"/>
                    </div>

                <div class="col-span-6">
                    <x-label>Upload ID</x-label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="photo_id"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span wire:loading.remove>Upload a file</span>

                                    <span wire:loading>Loading...</span>
                                    <input id="photo_id" wire:model="photo_id" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($photo_id)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeAttachment()">Remove the attachment
                                        </a></span>
                                    @endif
                                </label>
                            </div>
                            @error('photo_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($photo_id)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                            </p>
                            @endif
                        </div>
                    </div>
                </div>

                    <div class="col-span-2">
                        <x-label for="occupation" >Occupation</x-label>
                        <x-form-input type="text" wire:model="occupation" value="{{ old('occupation') }}"/>
                        <x-validation-error-component name='occupation' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="employer" >Employer</x-label>
                        <x-form-input type="text" wire:model="employer" value="{{ old('employer') }}"/>
                        <x-validation-error-component name='employer' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="employer_address" >Employer Address</x-label>
                        <x-form-input type="text" wire:model="employer_address" value="{{ old('employer_address') }}"/>
                        <x-validation-error-component name='employer_address' />
                    </div>


                    <div class="col-span-2">
                        <x-label for="gender" >Gender</x-label>
                        <x-form-select wire:model="gender">
                            <option value="">Select one</option>
                            <option value="female" {{ old('gender')=='female' ? 'selected' : 'Select one' }}>{{'female' }}</option>
                            <option value="male" {{ old('gender')=='male' ? 'selected' : 'Select one' }}>{{ 'male' }}</option>
                            <option value="LGBTQ" {{ old('gender')=='LGBTQ' ? 'selected' : 'Select one' }}>{{'LGBTQ' }}</option>
                        </x-form-select>
                        <x-validation-error-component name='gender' />
                    </div>

                    <div class="col-span-2">
                        <x-label for="birthdate" >Birthdate</x-label>
                        <x-form-input type="date" wire:model="birthdate" value="{{ old('birthdate') }}"/>
                        <x-validation-error-component name='birthdate' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="civil_status" >Civil Status</x-label>
                        <x-form-select wire:model="civil_status">
                            <option value="">Select one</option>
                            <option value="single" {{ old('civil_status')=='single' ? 'selected' : 'Select one' }}>{{'single' }}</option>
                            <option value="married" {{ old('civil_status')=='married' ? 'selected' : 'Select one' }}>{{'married' }}</option>
                            <option value="widowed" {{ old('civil_status')=='widowed' ? 'selected' : 'Select one' }}> {{ 'widowed' }}</option>
                            <option value="divorced" {{ old('civil_status')=='divorced' ? 'selected' : 'Select one' }}> {{'divorced' }}</option>
                        </x-form-select>
                        <x-validation-error-component name='civil_status' />
                    </div>

                    @if($civil_status == 'married')
                    <div class="col-span-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Spouse Information</h3>

                    </div>
                    <div class="col-span-2">
                        <x-label for="spouse_name" >Spouse's name</x-label>
                        <x-form-input type="text" wire:model="spouse_name" />
                        <x-validation-error-component name='spouse_name' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="spouse_email" >Spouse's Email</x-label>
                        <x-form-input type="email" wire:model="spouse_email" />
                        <x-validation-error-component name='spouse_email' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="spouse_mobile_number" >Spouse's Mobile Number</x-label>
                        <x-form-input type="text" wire:model="spouse_mobile_number" />
                        <x-validation-error-component name='spouse_mobile_number' />
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
                        <x-label for="last-name" >How is the representative related to the unit owner</x-label>
                        <x-form-select wire:model="representative_relationship_id" >
                            <option value="">Select one</option>
                            @foreach ($relationships as $relationship)
                            <option value="{{ $relationship->id }}" {{ old('representative_relationship_id')==$relationship->id? 'selected': 'Select one' }}>
                                {{ $relationship->relationship }}
                            </option>
                            @endforeach
                        </x-form-select>
                        <x-validation-error-component name='representative_relationship_id' />
                    </div>

                    @if($representative_relationship_id)
                    <div class="col-span-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Authorized Representative Information
                        </h3>

                    </div>
                    <div class="col-span-2">
                        <x-label for="representative_name">Representative's name</x-label>
                        <x-form-input type="text" wire:model="representative_name" />
                        <x-validation-error-component name='representative_name' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="representative_email">Representative's Email</x-label>
                        <x-form-input type="email" wire:model="representative_email"/>
                        <x-validation-error-component name='representative_email' />
                    </div>
                    <div class="col-span-2">
                        <x-label for="representative_mobile_number">Representative's Mobile Number</x-label>
                        <x-form-input type="text" wire:model="representative_mobile_number" autocomplete="representative_mobile_number"/>
                        <x-validation-error-component name='representative_mobile_number' />
                    </div>
                    <div class="col-span-6">
                        <x-label > Attach a valid ID of the representative (i.e., Driver's license, UMID/SSS, Passport) </x-label>
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
