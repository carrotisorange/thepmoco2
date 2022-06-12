<div>
   <div class="py-3">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-12 bg-white border-b border-gray-200">
               <div class="">
                  <form method="POST" wire:submit.prevent="submitForm" class="w-full" id="create-form">
                     @csrf
                     <div class="mt-2 flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3">
                           <x-label for="guardian">
                              Full Name <span class="text-red-600">*</span>
                           </x-label>
                           <x-form-input wire:model="guardian" id="grid-first-name" type="text" name="guardian"
                              value="{{ old('guardian') }}" />

                           @error('guardian')
                           <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                           <x-label for="relationship_id">
                              Relationship <span class="text-red-600">*</span>
                           </x-label>
                           <x-form-select wire:model="relationship_id" id="grid-state" name="relationship_id">
                              <option value="">Select one</option>
                              @foreach ($relationships as $relationship)
                              <option value="{{ $relationship->id }}" {{ old('relationship_id')==$relationship->id?
                                 'selected': 'Select one'
                                 }}>{{ $relationship->relationship }}</option>
                              @endforeach
                           </x-form-select>
                           @error('relationship_id')
                           <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="mt-2 w-full md:w-1/2 px-3">
                           <x-label for="email">
                              Email
                           </x-label>
                           <x-form-input wire:model="email" id="grid-last-name" type="email" name="email"
                              value="{{ old('email') }}" />

                           @error('email')
                           <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>
                        <div class="mt-2 w-full md:w-1/2 px-3">
                           <x-label for="mobile_number">
                              Mobile <span class="text-red-600">*</span>
                           </x-label>
                           <x-form-input wire:model="mobile_number" id="grid-last-name" type="text" name="mobile_number"
                              value="{{ old('mobile_number') }}" />

                           @error('mobile_number')
                           <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>
                     <div class="mt-4">
                        <p class="text-right">
                           <x-form-button>Create</x-form-button>
                        </p>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="py-3">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-3 bg-white border-b border-gray-200">
               <div class="">
                  <table class="min-w-full divide-y divide-gray-200">
                     <thead class="bg-gray-50">
                        <tr>
                           <x-th>#</x-th>
                           <x-th>Full Name</x-th>
                           <x-th>Email</x-th>
                           <x-th>Mobile</x-th>
                           <x-th>Relationship</x-th>
                           <x-th></x-th>
                        </tr>
                     </thead>
                     <?php $ctr = 1; ?>
                     @forelse ($guardians as $item)
                     <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                           <x-td>{{ $ctr++}}</x-td>
                           <x-td>{{ $item->guardian }}</x-td>
                           <x-td>{{ $item->email }}</x-td>
                           <x-td>{{ $item->mobile_number }}</x-td>
                           <x-td>{{ $item->relationship->relationship }}</x-td>
                           <x-td>
                              <x-button wire:click="removeGuardian({{ $item->id }})" onclick="confirmMessage()"><i
                                    class="fa-solid fa-trash-can"></i>
                              </x-button>
                           </x-td>
                        </tr>
                        @empty
                        <tr>
                           <x-td>No data found.</x-td>
                        </tr>
                     </tbody>
                     @endforelse
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
   @include('layouts.notifications')
</div>