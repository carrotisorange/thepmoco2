<div>
   <form class="space-y-1" wire:submit.prevent="create">
      <div class="pt-10">
         <div>
            <h3 class="mb-10 mt-10 text-center text-2xl font-bold leading-6 text-gray-900">Create a new property</h3>
         </div>

         <div class=" space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
            <div class="lg:col-span-1 ml-5">
               <div class="mt-5">
                  <x-label>Select a property type</x-label>
                  <x-form-select name="type_id" wire:model="type_id">
                     {{-- <option value="">Select one</option> --}}
                     @foreach ($types as $type)
                     <option value="{{ $type->id }}" {{ old('type_id')==$type->id?
                        'selected': 'Select one'
                        }}>{{ $type->type }}</option>
                     @endforeach
                  </x-form-select>
               </div>
               @error('type_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="lg:col-span-1">
               <div class="mt-5">
                  <x-label>Select a property ownership</x-label>
                  <x-form-select name="ownership" wire:model="ownership">
                     {{-- <option value="">Select one</option> --}}
                     {{-- <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected' : 'selected' }}>
                        Single owned
                     </option> --}}
                     <option value="Multiple owned" {{ old('ownership')=='Multiple owned' ? 'selected' : 'selected' }}>
                        Multiple owned
                     </option>
                  </x-form-select>
               </div>
               @error('ownership')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="lg:col-span-2">
               <div class="mt-5">
                  <x-label>Name of the property </x-label>
                  <x-form-input type="text" wire:model="property" name="property"
                   />
               </div>
               @error('property')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
{{--
            <div class="lg:col-span-1">
               <div class="mt-5">
                  <x-label>Registered TIN of the Property</x-label>
                  <x-form-input type="text" wire:model="registered_tin" name="registered_tin" />
               </div>
               @error('registered_tin')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="lg:col-span-1">

               <div class="mt-5">
                  <x-label>Select a country</x-label>
                  <x-form-select name="country_id" wire:model="country_id">
                     <option value=""></option>
                     @foreach ($countries as $country)
                     <option value="{{ $country->id }}" {{ old('country_id', $country_id)==$country->id?
                        'selected': 'selected'
                        }}>{{ $country->country }}</option>
                     @endforeach
                  </x-form-select>

               </div>
                @error('country_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="lg:col-span-1">
               <div class="mt-5">
                  <x-label>Address</x-label>
                  <x-form-input type="text" wire:model="barangay" name="barangay" />
               </div>
               @error('barangay')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
         </div>

         <div class="flex justify-end mt-5">
           <x-button onclick="window.location.href='/property'" class="bg-red-500">
               Cancel
            </x-button>
            &nbsp;
            <x-button type="submit">
               Create
            </x-button>

         </div>
         <div>
   </form>
</div>
