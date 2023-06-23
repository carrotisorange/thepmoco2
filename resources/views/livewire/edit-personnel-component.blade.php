<x-modal-component>
    <x-slot name="id">
       edit-personnel-modal-{{$personnel->id}}
    </x-slot>
   <h1 class="text-center font-medium">Edit Personnel</h1>
    <div class="p-5">
   {{-- <form wire:submmit.prevent="updateButton()"> --}}

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="name">Name</label>
                    <input type="text" wire:model="name" name="name" id="name"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="email">Email</label>
                    <input type="email" wire:model="email" name="email" id="email"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="role_id">Role</label>
                    <x-form-select wire:model="role_id" name="role_id" id="role_id">
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
                    <label class="text-sm" for="is_approved">Has authorization to access {{ $property->property
                        }}?</label>
                    <x-form-select name="is_approved" id="is_approved" wire:model="is_approved" class="">
                        <option value="">Select one</option>
                        <option value="1" {{ '1'==$is_approved ? 'Select one' : 'selected' }}>
                            Yes</option>
                        <option value="0" {{ '0'==$is_approved ? 'Select one' : 'selected' }}>No</option>

                    </x-form-select>

                    @error('is_approved')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="is_approved">Has authorization to access {{ $property->property
                        }}?</label>
                    <x-form-select name="is_approved" id="is_approved" wire:model="is_approved" class="">
                        <option value="">Select one</option>
                        <option value="1" {{ '1'==$is_approved ? 'Select one' : 'selected' }}>
                            Yes</option>
                        <option value="0" {{ '0'==$is_approved ? 'Select one' : 'selected' }}>No</option>
                
                    </x-form-select>
                
                    @error('is_approved')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    @can('accountownerandmanager')
                    <button type="button" wire:target="updateButton" wire:click="updateButton"
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        Update
                    </button>
                    @else
                    <button type="button" disabled wire:target="updateButton"
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                       Update
                    </button>
                    <p class="text-left text-red-500 text-xs mt-2">This feature is locked. Please contact your manager.
                    </p>
                    @endcan

                </div>
                {{--
            </form> --}}
</div>
</x-modal-component>