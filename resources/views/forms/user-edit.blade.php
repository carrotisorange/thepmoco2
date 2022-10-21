<form class="space-y-6" method="POST" wire:submit.prevent="updateUser()" enctype="multipart/form-data">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
            <div class="col-span-6 sm:col-span-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model.lazy="name" autocomplete="name"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-span-6 sm:col-span-2">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" wire:model.lazy="username" autocomplete="username"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" wire:model.lazy="email" autocomplete="email"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-6 sm:col-span-2">
                <label for="username" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="col-span-6 sm:col-span-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" wire:model.lazy="password" autocomplete="password"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            {{-- <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="role_id" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Role
                </label>
                @if(auth()->user()->role_id === 5)
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                        <select name="role_id" id="role_id" autocomplete="role_id"
                            class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $role->id == $user->role_id
                                ?'selected': 'selected'}}>{{ $role->role }} - {{
                                $role->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                @error('role_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div> --}}
            
            <div class="col-span-2">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                @if(auth()->user()->role_id === 5)
                <select wire:model.lazy="status" autocomplete="status"
                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select one</option>
                    <option value="active" {{ 'active'==$status ? 'Select one' : 'selected'
                        }}>active</option>
                    <option value="inactive" {{ 'inactive'==$status ? 'Select one' :
                        'selected'
                        }}>inactive</option>
                    <option value="banned" {{ 'banned'==$status ? 'Select one' : 'selected'
                        }}>banned</option>
                    <option value="pending" {{ 'pending'==$status ? 'Select one' :
                        'selected'
                        }}>pending</option>
                </select>
                @endif
                @error('status')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>



            {{-- <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="avatar" class="block text-sm font-medium text-gray-700">
                    Avatar
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="flex items-center">
                        <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            @if(auth()->user()->avatar)
                            <img class="" src="/storage/{{ $user->avatar }}" alt="">
                            @else
                            <img class="" src="{{ auth()->user()->avatarUrl() }}" alt="">
                            @endif
                        </span>
                        <button type="button"
                            class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Change
                        </button>
                    </div>
                </div>
            </div> --}}


        </div>


        <div class="flex justify-end mt-10">
            <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                href="{{ url()->previous() }}">
                Cancel
            </a>

            <button type="submit" wire:click="updateUser()"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg wire:loading wire:target="updateUser" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Update
            </button>

</form>