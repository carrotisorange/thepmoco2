<x-modal-component>
    <x-slot name="id">
        edit-personnel-modal-{{$personnel->id}}
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Edit Personnel
                        Information
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>
            <form wire:submmit.prevent="updatePersonnel">
        
                {{-- <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="unit_uuid">Unit</label>
                    <x-form-select wire:model="unit_uuid" class="">
                        <option value="">Select one</option>
                        @foreach ($units as $unit)
                        <option value="{{ $unit->uuid }}" {{ $unit->uuid === $unit_uuid?
                            'selected'
                            : 'Select one' }}>
                            {{ $unit->unit }} - ₱ {{ number_format($unit->transient_rent,
                            2) }}/night
                        </option>
                        @endforeach
                    </x-form-select>

                    @error('unit_uuid')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div> --}}

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="birthdate">Name</label>
                    <input type="name" wire:model="name"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

               <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="birthdate">Email</label>
                    <input type="email" wire:model="email"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="role_id">Role</label>
                    <x-form-select wire:model="role_id" class="">
                        <option value="">Select one</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id===$role_id? 'selected' : 'Select one' }}>
                            {{ $role->role }}
                        </option>
                        @endforeach
                    </x-form-select>

                    @error('role_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="status">Status</label>
                    <x-form-select wire:model="status" class="">
                       <option value="">Select one</option>
                        <option value="active" {{ 'active'==$status ? 'Select one' : 'selected' }}>
                            active</option>
                        <option value="inactive" {{ 'inactive'==$status ? 'Select one' : 'selected' }}>inactive</option>
                        <option value="banned" {{ 'banned'==$status ? 'Select one' : 'selected' }}>
                            banned</option>
                        <option value="pending" {{ 'pending'==$status ? 'Select one' : 'selected' }}>pending</option>
                    </x-form-select>
                
                    @error('status')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    @can('manager')
                    <button type="button" wire:click="updatePersonnel" wire:loading.remove
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        <i class="fa-solid fa-arrow-right"></i>&nbsp; Update
                    </button>
                    @else
                    <button type="button" disabled wire:loading.remove
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        <i class="fa-solid fa-lock"></i>&nbsp; Update
                    </button>
                    <p class="text-left text-red-500 text-xs mt-2">This feature is locked. Please contact your manager.</p>
                    @endcan
                    <button type="button" wire:loading disabled
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        Loading...
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-modal-component>