<form class="space-y-3" method="POST" wire:submit.prevent="submitForm()">
    <div class="pt-10">
        <div>
            <h3 class="mb-10 mt-10 text-center text-4xl font-bold leading-6 text-gray-900">Create a property</h3>

        </div>

        <div class="sm:col-span-3">
            <label for="type_id" class="block text-sm font-medium text-gray-700"> What's your property type? </label>
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

        @if($type_id)
        <div class="mt-6 sm:col-span-3">
            <label for="ownership" class="block text-sm font-medium text-gray-700"> What's your property ownership?
            </label>
            <div class="mt-5">
                <select autocomplete="ownership" wire:model.lazy="ownership"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                    <option value="">Select one</option>
                    <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected' : 'selected' }}>
                        Single owned
                    </option>
                    <option value="Multiple owned" {{ old('ownership')=='Multiple owned' ? 'selected' : 'selected' }}>
                        Multiple
                        owned
                    </option>
                </select>
            </div>
            @error('ownership')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        @endif

        @if($ownership)
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-6">
                <label for="property" class="block text-sm font-medium text-gray-700"> What's your property name?
                </label>
                <div class="mt-5">
                    <input type="text" wire:model="property" autocomplete="property" placeholder="The Beacon"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                </div>
                @error('property')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            @endif

            @if($property)
            <div class="sm:col-span-3">
                <label for="country_id" class="block text-sm font-medium text-gray-700"> Which country property your is
                    located? </label>
                <div class="mt-5">
                    <select autocomplete="country_id" wire:model.lazy="country_id"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                        <option value=""></option>
                        @foreach ($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id', $country_id)==$country->id?
                            'selected': 'selected'
                            }}>{{ $country->country }}</option>
                        @endforeach
                    </select>
                </div>
                @error('country_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="sm:col-span-3">
                <label for="barangay" class="block text-sm font-medium text-gray-700"> What is the address of your
                    property? </label>
                <div class="mt-5">
                    <input type="text" wire:model="barangay" autocomplete="barangay"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border-gray-300 rounded-md">
                </div>
                @error('barangay')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            @endif
            {{-- <div class="sm:col-span-2">
                <label for="province_id" class="block text-sm font-medium text-gray-700"> State / Province </label>
                <div class="mt-5">
                    <select autocomplete="province_id" autocomplete="province_id" wire:model.lazy="province_id"
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
            </div> --}}

            {{-- <div class="sm:col-span-2">
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
            </div> --}}



            {{-- <div class="sm:col-span-3">
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
            </div> --}}
        </div>
    </div>

    <div class="flex justify-end mt-2">

        <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline" href="/property">
            Cancel
        </a>
        
        @if($type_id)
        <button type="button" wire:loading disabled
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Loading...
        </button>

        <button type="submit" wire:click="submitForm()" wire:loading.remove
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

            <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Create
        </button>
        @endif
    </div>
</form>