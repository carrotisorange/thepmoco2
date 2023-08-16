<div>
   <form action="#" method="POST" wire:submit.prevent="submitForm">
      <div class="shadow sm:rounded-md sm:overflow-hidden">
         <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-2 gap-6">
   
               <div class="col-span-2">
                  <label for="tenant" class="block text-sm font-medium text-gray-700">
                     Tenant</label>
                  <input type="text" wire:model="tenant" readonly
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
               </div>
   
               <div class="">
                  <label for="moveout_at" class="block text-sm font-medium text-gray-700">Date of Moveout</label>
                  <input type="date" wire:model="moveout_at"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
               </div>
   
   
   
               <div class="">
                  <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
                  <input type="text" wire:model="unit" readonly
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
               </div>
   
   
               <div class="col-span-2">
                  <label for="moveout_reason" class="block text-sm font-medium text-gray-700">Reason for
                     moveout:</label>
                  <div class="mt-1">
                     <select
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md"
                        wire:model="moveout_reason" name="moveout_reason" id="moveout_reason" required>
                        <option value="">Select one</option>
                        <option value="Cancellation" {{ old('moveout_reason')=='Cancellation' ? 'selected' : 'Select one'
                           }}>
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
                        <option value="Force Majeure" {{ old('moveout_reason')=='Force Majeure' ? 'selected' : 'Select one'
                           }}>
                           {{ 'Force Majeure' }}
                        </option>
                        <option value="Just Graduated" {{ old('moveout_reason')=='Just Graduated' ? 'selected'
                           : 'Select one' }}>
                           {{ 'Just Graduated' }}
                        </option>
                        <option value="Run Away" {{ old('moveout_reason')=='Run Away' ? 'selected' : 'Select one' }}>
                           {{ 'Run Away' }}
                        </option>
                        <option value="Delinquent" {{ old('moveout_reason')=='Delinquent' ? 'selected' : 'Select one' }}>
                           {{ 'Delinquent' }}
                        </option>
                        <option value="Unruly" {{ old('moveout_reason')=='Unruly' ? 'selected' : 'Select one' }}>
                           {{ 'Unruly' }}
                        </option>
                        <option value="Unsatisfied with the service" {{
                           old('moveout_reason')=='Unsatisfied with the service' ? 'selected' : 'Select one' }}>
                           {{ 'Unsatisfied with the service' }}
                        </option>
                     </select>
   
                     @error('moveout_reason')
                     <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                     @enderror
                  </div>
   
               </div>

               <div class="">
                  <label for="bank_name" class="block text-sm font-medium text-gray-700">Bank Name</label>
                  <input type="text" wire:model="bank_name"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
               </div>

               <div class="">
                  <label for="account_name" class="block text-sm font-medium text-gray-700">Account Name</label>
                  <input type="text" wire:model="account_name"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
               </div>

               <div class="">
                  <label for="account_number" class="block text-sm font-medium text-gray-700">Account Number</label>
                  <input type="text" wire:model="account_number"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
               </div>

               <div class="">
                  <label for="contact_number" class="block text-sm font-medium text-gray-700">Contact Number</label>
                  <input type="text" wire:model="contact_number"
                     class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
               </div>
            </div>
            <div class="px-4 py-3 text-right sm:px-6">
               <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                  href="{{ url()->previous() }}">
                  Cancel
               </a>
               <button type="submit"
                  class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
   
                  <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                     <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                     </circle>
                     <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                     </path>
                  </svg>
                  Next
               </button>
            </div>
         </div>
   </form>
</div>