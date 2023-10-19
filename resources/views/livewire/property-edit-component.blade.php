<?php
    $formDivClasses = '';
;?>

<div>

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">{{ Session::get('property') }} / Edit</h1>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


            </div>
        </div>

        <div class="-my-2 mt-5 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <form id="updateTenant" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">

                <div class="h-full grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">

                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="name">
                                Property
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="property" id="property" autocomplete="property"
                                        wire:model="property" value="{{old('property', $property)}}" />
                                </div>
                                @error('property')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                    </div>

                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="registered_tin">
                                Registered TIN
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="registered_tin" id="registered_tin"
                                        autocomplete="registered_tin" wire:model="registered_tin"
                                        value="{{old('registered_tin', $registered_tin)}}" />
                                </div>
                                @error('registered_tin')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="ownership">
                                Ownership
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="ownership" id="ownership" autocomplete="ownership"
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
                                @error('ownership')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="ownership">
                                Type
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="type_id" id="type_id" disabled autocomplete="type_id"
                                        wire:model="type_id">
                                        @foreach($types as $type)
                                        <option value="{{ $type->id }}" {{ old('type_id', $property_details->type_id) ==
                                            $type->id ?
                                            'selected' : ''
                                            }}>{{ $type->type }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                @error('type_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="name">
                                Email
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="email" name="email" id="email" autocomplete="email"
                                        value="{{old('email', $email)}}" wire:model="email" />
                                </div>
                                @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="mobile">
                                Mobile
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="mobile" id="mobile" autocomplete="mobile"
                                        value="{{old('mobile', $mobile)}}" wire:model="mobile" />
                                </div>
                                @error('mobile')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>


                    <div class="sm:col-span-4">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="telephone">
                                Telephone
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="telephone" id="mobile" autocomplete="telephone"
                                        value="{{old('telephone', $telephone)}}" wire:model="telephone" />
                                </div>
                                @error('telephone')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="facebook_page">
                                Facebook Page
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="facebook_page" id="facebook_page"
                                        autocomplete="facebook_page" value="{{old('facebook_page', $facebook_page)}}"
                                        wire:model="facebook_page" />
                                </div>
                                @error('facebook_page')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>



                    <div class="sm:col-span-3">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="ownership">
                                Country
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="country_id" id="country_id" autocomplete="country_id"
                                        wire:model="country_id">

                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ old('country_id', $country_id)==$country->
                                            id?'selected':
                                            'Select one' }}>{{ $country->country }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                @error('country_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="{{$formDivClasses}}">
                            <x-label for="ownership">
                                Region
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="province_id" id="province_id" autocomplete="province_id"
                                        wire:model="province_id">
                                        <option value="">Select one</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" {{ old('province_id')===$province->
                                            id?
                                            'selected': 'Select one'
                                            }}>{{ $province->province }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                @error('province_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="{{$formDivClasses}}">
                            <x-label for="ownership">
                                City
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="city_id" id="city_id" autocomplete="city_id"
                                        wire:model="city_id">
                                        <option value="">Select one</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id'. $city_id)===$city->id?
                                            'selected': 'Select one'
                                            }}>{{ $city->city }}</option>
                                        @endforeach
                                    </x-form-select>
                                </div>
                                @error('city_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>



                    <div class="sm:col-span-3">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="name">
                                Barangay
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="barangay" id="barangay" autocomplete="barangay"
                                        value="{{old('barangay', $barangay)}}" wire:model="barangay" />
                                </div>
                                @error('barangay')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="note_to_transient">
                                Notes to the welcome email to guest
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="note_to_transient" id="note_to_transient"
                                        autocomplete="note_to_transient"
                                        value="{{old('note_to_transient', $note_to_transient)}}"
                                        wire:model="note_to_transient" />
                                </div>
                                @error('note_to_transient')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>



                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="note_to_bill">
                                Notes to the Statements of Account (SOA) (export, send through email)
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-input type="text" name="note_to_bill" id="note_to_bill"
                                        autocomplete="note_to_bill" value="{{old('note_to_bill', $note_to_bill)}}"
                                        wire:model="note_to_bill" />
                                </div>
                                @error('note_to_bill')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="status">
                                Status
                            </x-label>
                            <div class="mt-1 sm:mt-0 sm:col-span-12">
                                <div class=" flex rounded-md shadow-sm">
                                    <x-form-select name="status" id="status" autocomplete="status" wire:model="status">
                                        <option value="active" {{ old('active')=='active' ? 'selected' : 'Select one'
                                            }}>
                                            Active</option>
                                        <option value="Inactive" {{ old('inactive')=='inactive' ? 'selected'
                                            : 'Select one' }}>
                                            Inactive
                                        </option>
                                    </x-form-select>
                                </div>
                                @error('status')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="thumbnail">
                                Thumbnail
                            </x-label>
                            <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                                <div class="space-y-1 text-center">

                                    <div class="flex text-sm text-gray-600">

                                        <label for="thumbnail"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="thumbnail" name="thumbnail" type="file" wire:model="thumbnail"
                                                class="sr-only">
                                        </label>


                                        @if($property_details->thumbnail)
                                        &nbsp; or &nbsp;
                                        <a target="_blank"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500"
                                            href="{{ asset('/storage/'.$property_details->thumbnail) }}">View
                                            attachment</a>

                                        @endif

                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    <p class="text-center">
                                        @error('thumbnail')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @else
                                    @if($thumbnail)
                                    <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                                    @endif
                                    @enderror
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(Session::get('property_type_id' == 8))
                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="doc1">
                                DSUD Registration
                            </x-label>
                            <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                                <div class="space-y-1 text-center">

                                    <div class="flex text-sm text-gray-600">

                                        <label for="doc1"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="doc1" name="doc1" type="file" wire:model="doc1" class="sr-only">
                                        </label>


                                        @if($property_details->doc1)
                                        &nbsp; or &nbsp;
                                        <a target="_blank"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500"
                                            href="{{ asset('/storage/'.$property_details->doc1) }}">View attachment</a>

                                        @endif

                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    <p class="text-center">
                                        @error('doc1')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @else
                                    @if($doc1)
                                    <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                                    @endif
                                    @enderror
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="doc2">
                                GIS
                            </x-label>
                            <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                                <div class="space-y-1 text-center">

                                    <div class="flex text-sm text-gray-600">

                                        <label for="doc2"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="doc2" name="doc2" type="file" wire:model="doc2" class="sr-only">
                                        </label>


                                        @if($property_details->doc2)
                                        &nbsp; or &nbsp;
                                        <a target="_blank"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500"
                                            href="{{ asset('/storage/'.$property_details->doc2) }}">View attachment</a>

                                        @endif

                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    <p class="text-center">
                                        @error('doc2')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @else
                                    @if($doc2)
                                    <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                                    @endif
                                    @enderror
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-12">
                        <div class="{{ $formDivClasses }}">
                            <x-label for="doc3">
                                By Laws
                            </x-label>
                            <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                                <div class="space-y-1 text-center">

                                    <div class="flex text-sm text-gray-600">

                                        <label for="doc3"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="doc3" name="doc3" type="file" wire:model="doc3" class="sr-only">
                                        </label>


                                        @if($property_details->doc3)
                                        &nbsp; or &nbsp;
                                        <a target="_blank"
                                            class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500"
                                            href="{{ asset('/storage/'.$property_details->doc3) }}">View attachment</a>

                                        @endif

                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                    <p class="text-center">
                                        @error('doc3')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @else
                                    @if($doc3)
                                    <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                                    @endif
                                    @enderror
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                </div>

                <div class="mt-5 flex justify-end">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="/property/">
                        Cancel
                    </a>
                    {{--
                    <x-button
                        onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/edit-documents'">
                        Upload Documents
                    </x-button> --}}

                    <x-button type="submit">
                        Update
                    </x-button>



                </div>

            </form>
        </div>
    </div>
</div>