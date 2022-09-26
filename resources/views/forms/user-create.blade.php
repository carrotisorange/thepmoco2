<form class="space-y-6" method="POST" wire:submit.prevent="addUser()" enctype="multipart/form-data">
    <div class=" px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-6 md:gap-6">
            <div class="sm:col-span-6">
                <label for="role_id" class="block text-sm font-medium text-gray-700">User role:</label>
                <select wire:model="role_id"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    <option value="">Select one</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id')==$role->id?
                        'selected': 'Select one'
                        }}>{{ $role->role }} - {{ $role->description }}</option>
                    @endforeach
                </select>
                @error('role_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>
            @if($role_id)

            <div class="sm:col-span-6">
                <label for="concern" class="block text-sm font-medium text-gray-700">Email:</label>
                <div class="mt-1">
                    <textarea wire:model="email" rows="3"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></textarea>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            @endif
            </fieldset>
        </div>

        <div class="flex justify-end mt-10">
            <button type="button" onclick="window.location.href='{{ url()->previous() }}'"
                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
            <button type="submit" wire:click="addUser()"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg wire:loading wire:target="addUser" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Create
            </button>
        </div>
</form>
