<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">
                    {{ Session::get('property') }}
                </h1>
            </div>
        </div>

        <div class="-my-2 mt-5 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <form wire:submit.prevent="submitForm" class="w-full">
                <div class="h-full grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">
                    <div class="sm:col-span-12">
                            <x-label for="name">
                                Property
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="property"
                                        wire:model="property" value="{{old('property', $property)}}" />
                                </div>
                                 <x-validation-error-component name='property' />
                            </div>
                    </div>

                    <div class="sm:col-span-12">
                            <x-label for="registered_tin">
                                Registered TIN
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="registered_tin" wire:model="registered_tin"
                                        value="{{old('registered_tin', $registered_tin)}}" />
                                </div>
                           <x-validation-error-component name='registered_tin' />

                            </div>
                    </div>

                    <div class="sm:col-span-6">
                            <x-label for="ownership">
                                Ownership
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="ownership"
                                        wire:model="ownership">
                                        <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected'
                                            : 'Select one' }}>
                                            Single
                                            owned</option>
                                        <option value="Multiple owned" {{ old('ownership')=='Multiple owned'
                                            ? 'selected' : 'Select one' }}>
                                            Multiple
                                            owned</option>
                                    </x-form-select>
                                </div>
                              <x-validation-error-component name='ownership' />

                            </div>
                    </div>

                    <div class="sm:col-span-6">
                            <x-label for="ownership">
                                Type
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="type_id" disabled
                                        wire:model="type_id">
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id', $property_details->type_id) ==
                                            $type->id ?
                                            'selected' : ''
                                            }}>{{ $type->type }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                              <x-validation-error-component name='type_id' />

                            </div>
                    </div>

                    <div class="sm:col-span-4">
                            <x-label for="name">
                                Email
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="email" name="email"
                                        value="{{old('email', $email)}}" wire:model="email" />
                                </div>
                               <x-validation-error-component name='email' />
                            </div>
                    </div>

                    <div class="sm:col-span-4">
                            <x-label for="mobile">
                                Mobile
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="mobile"
                                        value="{{old('mobile', $mobile)}}" wire:model="mobile" />
                                </div>
                               <x-validation-error-component name='mobile_number' />

                            </div>
                    </div>


                    <div class="sm:col-span-4">
                            <x-label for="telephone">
                                Telephone
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="telephone"
                                        value="{{old('telephone', $telephone)}}" wire:model="telephone" />
                                </div>
                            <x-validation-error-component name='telephone' />
                            </div>
                    </div>

                    <div class="sm:col-span-12">
                            <x-label for="facebook_page">
                                Facebook Page
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="facebook_page" value="{{old('facebook_page', $facebook_page)}}"
                                        wire:model="facebook_page" />
                                </div>
                            <x-validation-error-component name='facebook_page' />

                            </div>
                    </div>

                    <div class="sm:col-span-3">
                            <x-label for="ownership">
                                Country
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="country_id" wire:model="country_id">
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ old('country_id', $country_id)==$country->
                                            id?'selected':
                                            'Select one' }}>{{ $country->country }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                             <x-validation-error-component name='country_id' />

                            </div>
                    </div>

                    <div class="sm:col-span-3">
                            <x-label for="ownership">
                                Region
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="province_id" wire:model="province_id">
                                        <option value="">Select one</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" {{ old('province_id')===$province->
                                            id?
                                            'selected': 'Select one'
                                            }}>{{ $province->province }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                             <x-validation-error-component name='province_id' />

                            </div>
                    </div>

                    <div class="sm:col-span-3">
                            <x-label for="ownership">
                                City
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="city_id"  wire:model="city_id">
                                        <option value="">Select one</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id'. $city_id)===$city->id?
                                            'selected': 'Select one'
                                            }}>{{ $city->city }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                              <x-validation-error-component name='ownership' />
                            </div>
                    </div>
                    <div class="sm:col-span-3">
                            <x-label for="name">
                                Barangay
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="barangay"
                                        value="{{old('barangay', $barangay)}}" wire:model="barangay" />
                                </div>
                              <x-validation-error-component name='barangay' />
                            </div>
                    </div>

                    <div class="sm:col-span-12">
                            <x-label for="note_to_transient">
                                Notes to the welcome email to guest
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="note_to_transient"
                                        value="{{old('note_to_transient', $note_to_transient)}}"
                                        wire:model="note_to_transient" />
                                </div>
                              <x-validation-error-component name='note_to_transient' />
                            </div>
                    </div>

                    <div class="sm:col-span-12">
                            <x-label for="note_to_bill">
                                Notes to the Statements of Account (SOA) (export, send through email)
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="note_to_bill" value="{{old('note_to_bill', $note_to_bill)}}"
                                        wire:model="note_to_bill" />
                                </div>
                                  <x-validation-error-component name='note_to_bill' />
                            </div>
                    </div>

                    <div class="sm:col-span-12">
                            <x-label for="status">
                                Status
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="status" wire:model="status">
                                        <option value="active" {{ old('active')=='active' ? 'selected' : 'Select one'}}> Active </option>
                                        <option value="inactive" {{ old('inactive')=='inactive' ? 'selected' : 'Select one' }}> Inactive </option>
                                    </x-form-select>
                                </div>
                              <x-validation-error-component name='status' />

                            </div>
                    </div>
                </div>

                <div class="mt-5 flex justify-end">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="/property/">
                        Cancel
                    </a>

                    <x-button type="submit">
                        Update
                    </x-button>

                </div>

            </form>
        </div>
    </div>
</div>
