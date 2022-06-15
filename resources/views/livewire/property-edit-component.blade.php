<div class=" overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-12 bg-white border-b border-gray-200">
        <form wire:submit.prevent="updateForm" method="POST" id="edit-form" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mx-5">
                <x-label for="property" :value="__('Property')" />

                <x-form-input form="edit-form" type="text" wire:model="property" value="{{old('property', $property)}}"
                    required autofocus />

                @error('property')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 mx-5">
                <x-label for="type_id" :value="__('Type')" />

                <x-form-select wire:model="type_id" form="edit-form">
                    @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id', $property_details->type_id) == $type->id ?
                        'selected' : ''
                        }}>{{ $type->type }}</option>
                    @endforeach
                </x-form-select>

                @error('type_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 mx-5">
                <x-label for="ownership">
                    Ownership <span class="text-red-600">*</span>
                </x-label>

                <x-form-select wire:model="ownership" name="ownership" id="ownership">
                    <option value="">Select one</option>
                    <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected' : 'Select one' }}>
                        Single
                        owned</option>
                    <option value="Multiple owned" {{ old('ownership')=='Multiple owned' ? 'selected' : 'Select one' }}>
                        Multiple
                        owned</option>
                </x-form-select>

                @error('ownership')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5 mx-5">
                <div class="mt-6 flex flex-wrap mb-2">
                    <div class="w-full md:w-1/2 mb-6 md:mb-0">
                        <x-label for="country_id">
                            Email
                        </x-label>
                        <div class="relative">
                            <x-form-input form="edit-form" type="email" wire:model="email"
                                value="{{old('email', $email)}}" autofocus />

                            @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 mb-6 md:mb-0">
                        <x-label for="province_id">
                            Mobile
                        </x-label>
                        <div class="relative">
                            <x-form-input form="edit-form" type="text" wire:model="mobile"
                                value="{{old('mobile', $mobile)}}" autofocus />
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
                            Country
                        </x-label>
                        <div class="relative">
                            <x-form-select wire:model="country_id" form="edit-form">
                                <option value="">Select one</option>
                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id', $country_id)==$country->
                                    id?'selected':
                                    'Select one' }}>{{ $country->country }}</option>
                                @endforeach
                            </x-form-select>

                            @error('country_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 mb-6 md:mb-0">
                        <x-label for="province_id">
                            Region
                        </x-label>
                        <div class="relative">
                            <x-form-select wire:model="province_id" form="edit-form">
                                <option value="">Select one</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ old('province_id')===$province->
                                    id?
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
                        <x-form-select wire:model="city_id" form="edit-form">
                            <option value="">Select one</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id'. $city_id)===$city->id?
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
                            Address
                            </x-lab>
                            <x-form-input wire:model="barangay" type="text" value="{{ old('barangay') }}"
                                form="edit-form" />

                            @error('barangay')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                    </div>

                </div>
            </div>

            @can('manager')
            <div class="mt-5 mx-5">
                <x-label for="status" :value="__('Status')" />

                <x-form-select form="edit-form" wire:model="status">
                    <option value="active" {{ old('status', $property_details->status) == 'active' ? 'selected' : '' }}>
                        active
                    </option>
                    <option value="inactive" {{ old('status', $property_details->status) == 'inactive' ? 'selected' : ''
                        }}>
                        inactive</option>
                    <option value="pending" {{ old('status', $property_details->status) == 'pending' ? 'selected' : ''
                        }}>
                        pending</option>
                </x-form-select>

                @error('status')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            @endcan
            {{-- <div class="mt-5 flex mx-5">
                <div class="flex-3">
                    <x-label for="thumbnail" :value="__('Thumbnail')" />

                    <x-form-input form="edit-form" type="file" wire:model="thumbnail"
                        value="{{old('thumbnail', $thumbnail)}}" autofocus />

                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $thumbnail }}" alt="">
                </div>
            </div> --}}
            {{-- <div class="mt-5 flex mx-5">
                <div class="flex-3">
                    <x-label for="tenant_contract">
                        Tenant Contract (Applicable if you're accepting tenants to your property. Please only
                        upload a PDF file.)
                    </x-label>

                    <x-form-input form="edit-form" type="file" wire:model="tenant_contract"
                        value="{{old('tenant_contract', $tenant_contract)}}" autofocus />

                    @error('tenant_contract')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-5 mx-5">
                    @if($tenant_contract)
                    <a target="_blank" class="text-blue"
                        href="/property/{{ Session::get('property') }}/tenant_contract">Click
                        here to
                        view the contract</a>
                    @else
                    <span>No contract is uploaded.</span>
                    @endif
                </div>
            </div>
            <div class="mt-5 flex mx-5">
                <div class="flex-3">
                    <x-label for="owner_contract">
                        Owner Contract (Applicable if the units on your property have different owners and they want
                        their units
                        to be rented
                        out. Please only
                        upload a PDF file.)
                    </x-label>


                    <x-form-input form="edit-form" type="file" wire:model="owner_contract"
                        value="{{old('owner_contract', $owner_contract)}}" autofocus />

                    @error('owner_contract')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    @if($owner_contract)
                    <a target="_blank" class="text-blue"
                        href="/property/{{ Session::get('property') }}/owner_contract">Click
                        here to
                        view the contract</a>
                    @else
                    <span>No contract is uploaded.</span>
                    @endif
                </div>
            </div> --}}
            <div class="mt-5">
                <p class="text-right">
                    <x-form-button>Update Property Info</x-form-button>
                </p>
            </div>
        </form>
    </div>
    @include('layouts.notifications')
</div>