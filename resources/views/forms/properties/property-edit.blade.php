<form class="space-y-6" method="POST" wire:submit.prevent="submitForm()" enctype="multipart/form-data">

    <div class=" space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>
            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Property
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="text" name="property" id="property" autocomplete="property"
                                wire:model.lazy="property" value="{{old('property', $property)}}"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('property')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Ownership
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <select name="ownership" id="ownership" autocomplete="ownership" wire:model.lazy="ownership"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected'
                                    : 'Select one' }}>
                                    Single
                                    owned</option>
                                <option value="Multiple owned" {{ old('ownership')=='Multiple owned' ? 'selected'
                                    : 'Select one' }}>
                                    Multiple
                                    owned</option>
                            </select>
                        </div>
                        @error('ownership')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Type
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <select name="type_id" id="type_id" autocomplete="type_id" wire:model.lazy="type_id"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $property_details->type_id) ==
                                    $type->id ?
                                    'selected' : ''
                                    }}>{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('type_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Email
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="email" name="email" id="email" autocomplete="email"
                                value="{{old('email', $email)}}" wire:model.lazy="email"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Mobile
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="text" name="mobile" id="mobile" autocomplete="mobile"
                                value="{{old('mobile', $mobile)}}" wire:model.lazy="mobile"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('mobile')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="telephone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Telephone
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="text" name="telephone" id="mobile" autocomplete="telephone"
                                value="{{old('telephone', $telephone)}}" wire:model.lazy="telephone"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('telephone')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="facebook_page" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Facebook Page
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="text" name="facebook_page" id="facebook_page" autocomplete="facebook_page"
                                value="{{old('facebook_page', $facebook_page)}}" wire:model.lazy="facebook_page"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('facebook_page')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="note_to_transient" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Notes to transient
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="text" name="note_to_transient" id="note_to_transient" autocomplete="note_to_transient"
                                value="{{old('note_to_transient', $note_to_transient)}}" wire:model.lazy="note_to_transient"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('note_to_transient')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="note_to_bill" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Notes to exported SOA
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="text" name="note_to_bill" id="note_to_bill" autocomplete="note_to_bill"
                                value="{{old('note_to_bill', $note_to_bill)}}" wire:model.lazy="note_to_bill"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('note_to_bill')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Country
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <select name="country_id" id="country_id" autocomplete="country_id"
                                wire:model.lazy="country_id"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">

                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id', $country_id)==$country->
                                    id?'selected':
                                    'Select one' }}>{{ $country->country }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('country_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Region
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <select name="province_id" id="province_id" autocomplete="province_id"
                                wire:model.lazy="province_id"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                <option value="">Select one</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ old('province_id')===$province->
                                    id?
                                    'selected': 'Select one'
                                    }}>{{ $province->province }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('province_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        City
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <select name="city_id" id="city_id" autocomplete="city_id" wire:model.lazy="city_id"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                <option value="">Select one</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id'. $city_id)===$city->id?
                                    'selected': 'Select one'
                                    }}>{{ $city->city }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('city_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Barangay
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <input type="text" name="barangay" id="barangay" autocomplete="barangay"
                                value="{{old('barangay', $barangay)}}" wire:model.lazy="barangay"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                        </div>
                        @error('barangay')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="status" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Status
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <select name="status" id="ownership" autocomplete="status" wire:model.lazy="status"
                                class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                <option value="active" {{ old('active')=='active' ? 'selected' : 'Select one' }}>
                                    Active</option>
                                <option value="Inactive" {{ old('inactive')=='inactive' ? 'selected' : 'Select one' }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                        @error('status')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="/property/">
                        Cancel
                    </a>
                    <x-form-button type="submit" wire:loading.remove wire:click="submitForm()" id="create-form">
                        Update
                    </x-form-button>
                </div>
            </div>
</form>