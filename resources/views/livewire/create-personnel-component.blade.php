<x-modal-component>
    {{-- @include('layouts.notifications') --}}
    <x-slot name="id">
        create-personnel-modal
    </x-slot>
<h1 class="text-center font-medium">Add Personnel </h1>
   <div class="p-5">
    <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="role_id">Select a role</label>
                    <x-form-select id="role_id" name="role_id" wire:model="role_id" class="">
                        <option value="">Select one</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                        @endforeach

                    </x-form-select>
                    @error('role_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="email">Email </label>
                    <input type="email" id="email" wire:model="email"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    <small class="text-indigo-600">
                       * The personnel will receive an email containing the credentials for accessing your property.
                    </small>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="mobile_number">Mobile </label>
                    <input type="text" id="mobile_number" wire:model="mobile_number"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('mobile_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 sm:mt-6">
                    @can('accountownerandmanager')
                    <x-button class="w-full" type="button" wire:click="submitButton">
                        Confirm
                    </x-button>
                    @else
                    <x-button class="w-full" type="button" disabled disabled>
                       Confirm
                    </x-button>
                    <p class="text-red-500 text-xs mt-2">This feature is locked. Please contact your manager.</p>

                    @endcan

                </div>
   </div>
</x-modal-component>
