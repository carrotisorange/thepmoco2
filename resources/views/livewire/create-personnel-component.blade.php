<x-modal-component>
    @include('layouts.notifications')
    <x-slot name="id">
        create-personnel-modal
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Personnel Information
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>

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
                <button type="button" wire:click="storePersonnel"
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    Confirm
                </button>
                @else
                <button type="button" disabled disabled
                    class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                    <i class="fa-solid fa-lock"></i>&nbsp Confirm
                </button>
                <p class="text-red-500 text-xs mt-2">This feature is locked. Please contact your manager.</p>

                @endcan

            </div>
        </div>
    </div>
</x-modal-component>