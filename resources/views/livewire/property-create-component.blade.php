<div>
   <form class="space-y-1" method="POST" wire:submit.prevent="create()">
      <div class="pt-10">
         <div>
            <h3 class="mb-10 mt-10 text-center text-2xl font-bold leading-6 text-gray-900">Create a new property</h3>
         </div>

         <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
            <div class="lg:col-span-1 ml-5">
               <label for="type_id" class="block text-md font-medium text-gray-700"> What's your property type? </label>
               <div class="mt-2">
                  <select autocomplete="type_id" wire:model.lazy="type_id"
                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-10 w-full sm:text-md border-gray-300 rounded-md">
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

            <div class="lg:col-span-1">
               <label for="ownership" class="block text-md font-medium text-gray-700"> What's your property ownership?
               </label>
               <div class="mt-2">
                  <select autocomplete="ownership" wire:model.lazy="ownership"
                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-10 w-full sm:text-md border-gray-300 rounded-md">
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

        
            <div class="lg:col-span-1">
               <label for="property" class="block text-md font-medium text-gray-700"> What's your property name?
               </label>
               <div class="mt-2">
                  <input type="text" wire:model="property" autocomplete="property" placeholder="The New Property Condominium"
                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-10 w-full sm:text-md border-gray-300 rounded-md">
               </div>
               @error('property')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
               @enderror
            </div>

            <div class="lg:col-span-1">
               <label for="country_id" class="block text-md font-medium text-gray-700"> Which country property your is
                  located? </label>
               <div class="mt-2">
                  <select autocomplete="country_id" wire:model.lazy="country_id"
                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-10 w-full sm:text-md border-gray-300 rounded-md">
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


            <div class="lg:col-span-2">
               <label for="barangay" class="block text-md font-medium text-gray-700"> What is the address of your
                  property? </label>
               <div class="mt-2">
                  <input type="text" wire:model="barangay" autocomplete="barangay"
                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-10 w-full sm:text-md border-gray-300 rounded-md">
               </div>
               @error('barangay')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
               @enderror
            </div>

            {{-- <div class="lg:col-span-1">
               <label for="province_id" class="block text-md font-medium text-gray-700"> State / Province </label>
               <div class="mt-2">
                  <select autocomplete="province_id" autocomplete="province_id" wire:model.lazy="province_id"
                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-10 w-full sm:text-md border-gray-300 rounded-md">
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

            {{-- <div class="lg:col-span-1">
               <label for="city_id" class="block text-md font-medium text-gray-700"> City </label>
               <div class="mt-2">
                  <select autocomplete="city_id" wire:model.lazy="city_id"
                     class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-10 w-full sm:text-md border-gray-300 rounded-md">
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



            {{-- <div class="lg:col-span-1">
               <label for="email" class="block text-md font-medium text-gray-700">Property Email</label>
               <div class="mt-2">
                  <input type="email" wire:model="email" autocomplete="email"
                     class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700bg-white bg-clip-padding border border-solid border-gray-300 rounded-md transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                     id="email" placeholder="" />
               </div>
               @error('email')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
               @enderror
            </div>

            <div class="lg:col-span-1">
               <label for="mobile" class="block text-md font-medium text-gray-700">Property Mobile Number</label>
               <div class="mt-2">
                  <input type="number" wire:model="mobile" autocomplete="mobile"
                     class=" form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700bg-white bg-clip-padding border border-solid border-gray-300 rounded-md transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                     id="mobile" placeholder="" />
               </div>
               @error('mobile')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
               @enderror
            </div> --}}
         </div>
      

         <div class="flex justify-end mt-5">
            <button type="button" wire:click="cancel" wire:loading.remove
               class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
               Cancel
            </button>

            <button type="button" wire:loading disabled 
               class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
               Loading...
            </button>

            @if($barangay)
            <button type="button" wire:click="create" wire:loading.remove
               class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
               Create
            </button>
            @endif
         </div>
      <div>
   </form>
</div>