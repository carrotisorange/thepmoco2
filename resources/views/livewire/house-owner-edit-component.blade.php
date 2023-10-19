<div>

    <form class="space-y-6" wire:submit.prevent="submitForm()">
        <div class="mt-5 md:mt-0 md:col-span-3">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <x-label for="house_owner">
                        Personal Information</x-label>

                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-label for="house_owner">
                        Full Name</x-label>
                    <x-form-input name="house_owner" type="text" wire:model="house_owner" autocomplete="house_owner" />
                    @error('house_owner')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <x-label for="email">Email Address</x-label>
                    <x-form-input type="email" wire:model="email" autocomplete="email" />
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-2">
                    <x-label for="mobile_number">Mobile Number</x-label>
                    <x-form-input type="text" wire:model="mobile_number" autocomplete="mobile_number"
                        value="{{ old('mobile_number') }}" />
                    @error('mobile_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-2">
                    <x-label for="gender">Gender</x-label>
                    <x-form-select wire:model="gender" autocomplete="gender">
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
                    <x-label for="birthdate">Birthdate</x-label>
                    <x-form-input type="date" wire:model="birthdate" autocomplete="birthdate"
                        value="{{ old('birthdate') }}" />
                    @error('birthdate')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="col-span-2">
                    <x-label for="civil_status">Civil
                        Status</x-label>
                    <x-form-select wire:model="civil_status" autocomplete="civil_status">
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


                <div class="col-span-3">
                    <x-label for="country_id">Country</x-label>
                    <x-form-select wire:model="country_id" autocomplete="country_id">
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
                    <x-label for="province_id">Province</x-label>
                    <x-form-select wire:model="province_id" autocomplete="province_id">
                        <option value="">Select one</option>
                        @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" {{ old('province_id')==$province->id? 'selected':
                            'Select one'}}>
                            {{ $province->province }}
                        </option>
                        @endforeach
                    </x-form-select>
                    @error('province_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-6">
                    <x-label for="address">Address</x-label>
                    <x-form-input type="text" wire:model="address" autocomplete="address"
                        value="{{ old('address') }}" />
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
                            class="fa-solid fa-circle-check"></i>
                    </p>
                    @endif
                    @enderror

                </div>

                <div class="col-span-6 sm:col-span-6">
                    <x-label for="house_owner">
                        Employment Information</x-label>

                </div>

                <div class="col-span-2">
                    <x-label for="occupation">Occupation</x-label>
                    <x-form-input type="text" wire:model="occupation" autocomplete="occupation"
                        value="{{ old('occupation') }}" />
                    @error('occupation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <x-label for="employer">Employer</x-label>
                    <x-form-input type="text" wire:model="employer" autocomplete="employer"
                        value="{{ old('employer') }}" />
                    @error('employer')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-span-2">
                    <x-label for="employer_address">Address</x-label>
                    <x-form-input type="text" wire:model="employer_address" autocomplete="employer_address"
                        value="{{ old('employer_address') }}" />
                    @error('employer_address')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>



            </div>
        </div>
        <div class="flex justify-end">


            <x-button type="submit">
                Update
            </x-button>
        </div>
    </form>
</div>