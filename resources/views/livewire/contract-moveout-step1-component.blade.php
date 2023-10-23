<div>
   <form wire:submit.prevent="submitForm">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
         <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-2 gap-6">

               <div class="col-span-2">
                  <x-label for="tenant">
                     Tenant</x-label>
                  <x-form-input type="text" wire:model="tenant" readonly />
               </div>

               <div class="">
                  <z-label for="moveout_at">Date of Moveout</z-label>
                  <x-form-input type="date" wire:model="moveout_at" />
               </div>



               <div class="">
                  <x-label for="unit">Unit</x-label>
                  <x-form-input type="text" wire:model="unit" readonly />
               </div>


               <div class="col-span-2">
                  <x-label for="moveout_reason">Reason for
                     moveout:</x-label>
                  <div class="mt-1">
                     <x-form-select wire:model="moveout_reason" name="moveout_reason" id="moveout_reason" required>
                        <option value="">Select one</option>
                        <option value="Cancellation" {{ old('moveout_reason')=='Cancellation' ? 'selected'
                           : 'Select one' }}>
                           {{ 'Cancellation' }}
                        </option>
                        <option value="Incorrect Details" {{ old('moveout_reason')=='Incorrect Details' ? 'selected'
                           : 'Select one' }}>
                           {{ 'Incorrect Details' }}
                        </option>
                        <option value="End of Contract" {{ old('moveout_reason')=='End of Contract' ? 'selected'
                           : 'Select one' }}>
                           {{ 'End of Contract' }}
                        </option>
                        <option value="Force Majeure" {{ old('moveout_reason')=='Force Majeure' ? 'selected'
                           : 'Select one' }}>
                           {{ 'Force Majeure' }}
                        </option>
                        <option value="Just Graduated" {{ old('moveout_reason')=='Just Graduated' ? 'selected'
                           : 'Select one' }}>
                           {{ 'Just Graduated' }}
                        </option>
                        <option value="Run Away" {{ old('moveout_reason')=='Run Away' ? 'selected' : 'Select one' }}>
                           {{ 'Run Away' }}
                        </option>
                        <option value="Delinquent" {{ old('moveout_reason')=='Delinquent' ? 'selected' : 'Select one'
                           }}>
                           {{ 'Delinquent' }}
                        </option>
                        <option value="Unruly" {{ old('moveout_reason')=='Unruly' ? 'selected' : 'Select one' }}>
                           {{ 'Unruly' }}
                        </option>
                        <option value="Unsatisfied with the service" {{
                           old('moveout_reason')=='Unsatisfied with the service' ? 'selected' : 'Select one' }}>
                           {{ 'Unsatisfied with the service' }}
                        </option>
                     </x-form-select>

                     @error('moveout_reason')
                     <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                     @enderror
                  </div>

               </div>

               <div class="">
                  <x-label for="bank_name">Bank Name</x-label>
                  <x-form-input type="text" wire:model="bank_name" />
               </div>

               <div class="">
                  <x-label for="account_name">Account Name</x-label>
                  <x-form-input type="text" wire:model="account_name" />
               </div>

               <div class="">
                  <x-label for="account_number">Account Number</x-label>
                  <x-form-input type="text" wire:model="account_number" />
               </div>

               <div class="">
                  <x-label for="contact_number">Contact Number</x-label>
                  <x-form-input type="text" wire:model="contact_number" />
               </div>
            </div>
            <div class="px-4 py-3 text-right sm:px-6">
                <x-button class="bg-red-500"
                    onclick="window.location.href='{{ url()->previous() }}'">
                    Cancel
                </x-button>

               <x-button type="submit">
                  Next
               </x-button>
            </div>
         </div>
   </form>
</div>
