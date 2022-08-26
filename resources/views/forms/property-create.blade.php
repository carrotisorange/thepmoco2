<div>
    <form class="space-y-3" method="POST" wire:submit.prevent="submitForm()">
        @csrf
        <div class="pt-10">
            <div>
                <h3 class="mb-10 mt-10 text-center text-4xl font-bold leading-6 text-gray-900">Create a Property</h3>

            </div>

            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="property" class="block text-sm font-medium text-gray-700"> Property Name: </label>
                    <div class="mt-5">
                        <input type="text" wire:model="property" autocomplete="property"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('property')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="ownership" class="block text-sm font-medium text-gray-700"> Property Ownership:
                    </label>
                    <div class="mt-5">
                        <select autocomplete="ownership" wire:model.lazy="ownership"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="">Select one</option>
                            <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected' : 'selected'
                                }}>Single owned</option>
                            <option value="Multiple owned" {{ old('ownership')=='Multiple owned' ? 'selected'
                                : 'selected' }}>Multiple owned
                            </option>
                        </select>
                    </div>
                    @error('ownership')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="type_id" class="block text-sm font-medium text-gray-700"> Property Type: </label>
                    <div class="mt-5">
                        <select autocomplete="type_id" wire:model.lazy="type_id" 
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="">Select one</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ old('type_id')==$type->id?
                                'selected': 'Select one'
                                }}>{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('type_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="country_id" class="block text-sm font-medium text-gray-700"> Country </label>
                    <div class="mt-5">
                        <select autocomplete="country_id" wire:model.lazy="country_id" autocomplete="country_id"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="">Select one</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country_id')==$country->id?
                                'selected': 'Select one'
                                }}>{{ $country->country }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('country_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="province_id" class="block text-sm font-medium text-gray-700"> State / Province </label>
                    <div class="mt-5">
                        <select autocomplete="province_id" autocomplete="province_id"
                            wire:model.lazy="province_id"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="">Select one</option>
                            @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" {{ old('province_id')==$province->id?
                                'selected': 'Select one'
                                }}>{{ $province->province }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('province_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="city_id" class="block text-sm font-medium text-gray-700"> City </label>
                    <div class="mt-5">
                        <select autocomplete="city_id" wire:model.lazy="city_id"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                            <option value="">Select one</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id')==$city->id?
                                'selected': 'Select one'
                                }}>{{ $city->city }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('city_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-6">
                    <label for="barangay" class="block text-sm font-medium text-gray-700"> Barangay/County: </label>
                    <div class="mt-5">
                        <input type="text" wire:model="barangay" autocomplete="barangay"
                            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                    </div>
                    @error('barangay')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Property Email</label>
                    <div class="mt-5">
                        <input type="email" wire:model="email" autocomplete="email"
                            class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700bg-white bg-clip-padding border border-solid border-gray-300 rounded-md transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="email" placeholder="" />
                    </div>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Property Mobile Number</label>
                    <div class="mt-5">
                        <input type="number" wire:model="mobile" autocomplete="mobile"
                            class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700bg-white bg-clip-padding border border-solid border-gray-300 rounded-md transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            id="mobile" placeholder="" />
                    </div>
                    @error('mobile')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button" onclick="window.location.href='/property/'"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                <x-form-button type="submit" wire:loading.remove wire:click="submitForm()" id="create-form">
                    Create
                </x-form-button>
            </div>
        </div>
    </form>

    {{-- <form class="space-y-8 divide-y divide-gray-200" method="POST" wire:submit.prevent="submitForm()">
        @csrf
        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div>
                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Name
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg flex rounded-md shadow-sm">
                                <input type="text" name="property" id="property" autocomplete="property"
                                    wire:model.lazy="property" value="{{old('property')}}"
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
                                <select name="ownership" id="ownership" autocomplete="ownership"
                                    wire:model.lazy="ownership"
                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    <option value="">Select one</option>
                                    <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected'
                                        : 'selected' }}>Single owned</option>
                                    <option value="Multiple owned" {{ old('ownership')=='Multiple owned' ? 'selected'
                                        : 'selected' }}>Multiple owned</option>
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
                                    <option value="">Select one</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}" {{ old('type_id')==$type->id?
                                        'selected': 'Select one'
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
                                    value="{{old('email')}}" wire:model.lazy="email"
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
                                    value="{{old('mobile')}}" wire:model.lazy="mobile"
                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            @error('mobile')
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
                                    <option value="">Select one</option>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country_id')==$country->id?
                                        'selected': 'Select one'
                                        }}>{{ $country->country }}</option>
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
                                    <option value="{{ $province->id }}" {{ old('province_id')==$province->id?
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
                                    <option value="{{ $city->id }}" {{ old('city_id')==$city->id?
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
                                    value="{{old('barangay')}}" wire:model.lazy="barangay"
                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            </div>
                            @error('barangay')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>


                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="button" onclick="window.location.href='/property'"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Cancel
                        </button>
                        <x-form-button type="submit" wire:loading.remove wire:click="submitForm()" id="create-form">
                            Submit
                        </x-form-button>
                    </div>
                </div>
    </form> --}}
</div>