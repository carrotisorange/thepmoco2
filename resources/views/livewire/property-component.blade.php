<div class=" overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-12 bg-white border-b border-gray-200">
        <div>
            <form method="POST" wire:submit.prevent="createForm" action="/property/{{ Str::random(8) }}/store"
                enctype="multipart/form-data">
                @csrf
                <div class="mx-5">
                    <x-label for="property">
                        Property <span class="text-red-600">*</span>
                    </x-label>

                    <x-form-input wire:model.lazy="property" id="property" type="text" name="property"
                        :value="old('property')" autofocus />

                    @error('property')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 mx-5">
                    <x-label for="ownership">
                        Ownership <span class="text-red-600">*</span>
                    </x-label>

                    <x-form-select wire:model.lazy="ownership" name="ownership" id="ownership">
                        <option value="">Select one</option>
                        <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected' : 'Select one' }}>
                            Single
                            owned</option>
                        <option value="Multiple owned" {{ old('ownership')=='Multiple owned' ? 'selected' : 'Select one'
                            }}>Multiple
                            owned</option>
                    </x-form-select>

                    @error('ownership')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 mx-5">
                    <x-label for="type_id">
                        Type <span class="text-red-600">*</span>
                    </x-label>

                    <x-form-select wire:model.lazy="type_id" name="type_id" id="type_id">
                        <option value="">Select one</option>
                        @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id')==$type->id?
                            'selected': 'Select one'
                            }}>{{ $type->type }}</option>
                        @endforeach
                    </x-form-select>

                    @error('type_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 mx-5">
                    <div class="mt-6 flex flex-wrap mb-2">
                        <div class="w-full md:w-1/2 mb-6 md:mb-0">
                            <x-label for="email">
                                Email
                            </x-label>
                            <div class="relative">
                                <x-form-input type="email" wire:model.lazy="email" value="{{old('email', $email)}}" required
                                    autofocus />

                                @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 mb-6 md:mb-0">
                            <x-label for="mobile">
                                Mobile
                            </x-label>
                            <div class="relative">
                                <x-form-input type="text" wire:model.lazy="mobile" value="{{old('mobile', $mobile)}}"
                                    required autofocus />
                                @error('mobile')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 mx-5">
                    <div class="mt-6 flex flex-wrap mb-2">
                        <div class="w-full md:w-1/4 mb-6 md:mb-0">
                            <x-label for="country_id">
                                Country <span class="text-red-600">*</span>
                            </x-label>
                            <div class="relative">
                                <x-form-select wire:model.lazy="country_id" id="country_id" name="country_id">
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
                        </div>
                        <div class="w-full md:w-1/4 mb-6 md:mb-0">
                            <x-label for="province_id">
                                Region <span class="text-red-600">*</span>
                            </x-label>
                            <div class="relative">
                                <x-form-select wire:model.lazy="province_id" id="province_id" id="province_id"
                                    name="province_id">
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
                        </div>
                        <div class="w-full md:w-1/4 mb-6 md:mb-0">
                            <x-label for="city_id">
                                City
                            </x-label>
                            <x-form-select wire:model.lazy="city_id" id="city_id" id="city_id" name="city_id">
                                <option value="">Select one</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id')==$city->id?
                                    'selected': 'Select one'
                                    }}>{{ $city->city }}</option>
                                @endforeach
                            </x-form-select>

                            @error('city_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="w-full md:w-1/4 mb-6 md:mb-0">
                            <x-label for="barangay">
                                Address <span class="text-red-600">*</span>
                                </x-lab>
                                <x-form-input wire:model.lazy="barangay" id="barangay" type="text" name="barangay"
                                    value="{{ old('barangay') }}" />

                                @error('barangay')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                        </div>

                    </div>
                </div>

                {{-- <div class="mt-5 mx-5">
                    <x-label for="thumbnail">
                        Thumbnail (Please upload an image of your property.) <span
                            class="text-blue-600">(optional)</span>
                    </x-label>



                    <x-form-input wire:model.lazy="thumbnail" id="thumbnail" type="file" name="thumbnail"
                        :value="old('thumbnail')" autofocus />

                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 mx-5">
                    <x-label for="tenant_contract">
                        Tenant Contract (Applicable if the property is accepting tenants. Please only
                        upload a PDF file.) <span class="text-blue-600">(optional)</span>
                    </x-label>

                    <x-form-input wire:model.lazy="tenant_contract" id="tenant_contract" type="file" name="tenant_contract"
                        :value="old('tenant_contract')" autofocus />

                    @error('tenant_contract')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 mx-5">
                    <x-label for="owner_contract">
                        Owner Contract (Applicable if the units on the property have different owners and they
                        want their units to be rented out. Please only
                        upload a PDF file.)
                    </x-label>


                    <x-form-input wire:model.lazy="owner_contract" id="owner_contract" type="file" name="owner_contract"
                        :value="old('owner_contract')" autofocus />

                    @error('owner_contract')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div> --}}

                <div class="mt-5 mx-5">
                    <p class="text-right">
                        <x-form-button>Create</x-form-button>
                    </p>
                </div>
        </div>
        </form>
    </div>
</div>