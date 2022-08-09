<div>
   <div class="p-8 bg-white border-b border-gray-200">
      <form method="POST" wire:submit.prevent="submitForm()" class="w-full" id="create-form">
         @csrf
         <div class="mt-2 flex flex-wrap mb-6">
            <div class="w-full md:w-1/2 ">
               <x-label for="guardian">
                  Full Name <span class="text-red-600">*</span>
               </x-label>
               <x-form-input wire:model.lazy="guardian" id="grid-first-name" type="text" name="guardian"
                  value="{{ old('guardian') }}" />

               @error('guardian')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
               @enderror
            </div>
            <div class="w-full md:w-1/2 ">
               <x-label for="relationship_id">
                  Relationship <span class="text-red-600">*</span>
               </x-label>
               <x-form-select wire:model.lazy="relationship_id" id="grid-state" name="relationship_id">
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
            <div class="mt-2 w-full md:w-1/2 ">
               <x-label for="email">
                  Email
               </x-label>
               <x-form-input wire:model.lazy="email" id="grid-last-name" type="email" name="email"
                  value="{{ old('email') }}" />

               @error('email')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
               @enderror
            </div>
            <div class="mt-2 w-full md:w-1/2 ">
               <x-label for="mobile_number">
                  Mobile <span class="text-red-600">*</span>
               </x-label>
               <x-form-input wire:model.lazy="mobile_number" id="grid-last-name" type="text" name="mobile_number"
                  value="{{ old('mobile_number') }}" />

               @error('mobile_number')
               <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
               @enderror
            </div>
         </div>
         <div class="pt-5">
            <div class="flex justify-end">
               <button type="button"
                  onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/reference/{{ $unit->uuid }}/create'"
                  class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                  Skip
               </button>
               <x-form-button type="submit" wire:loading.remove wire:click="submitForm()" id="create-form">
                  Submit
               </x-form-button>
            </div>
         </div>
      </form>

   </div>

   @if($guardians->count())
   <div class="mt-5 p-8 bg-white border-b border-gray-200">

      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
         <thead class="bg-gray-50">
            <tr>
               <x-th>#</x-th>
               <x-th>Full Name</x-th>
               <x-th>Email</x-th>
               <x-th>Mobile</x-th>
               <x-th>Relationship</x-th>
               {{-- <x-th></x-th> --}}
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
                  {{-- <x-button wire:click="removeGuardian({{ $item->id }})" onclick="confirmMessage()">Remove
                  </x-button> --}}
               </x-td>
            </tr>
            @empty
            <tr>
               <x-td>No data found.</x-td>
            </tr>
         </tbody>
         @endforelse
      </table>
      {{ $guardians->links() }}
   </div>
   @endif
   @include('layouts.notifications')
</div>