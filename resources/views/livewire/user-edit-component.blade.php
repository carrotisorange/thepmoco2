<div>

    @include('modals.popup-error')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-between">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                </div>
            </div>

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="grid grid-cols-1 lg:gap-6">
                    <img src="{{ asset('/brands/avatar.png') }}" alt="avatar"
                        class="lg:col-span-2 md:row-span-2 rounded-md">

                    <div class="flex items-center justify-center ml-5">
                        {{-- <a href="#"
                            class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:">Upload

                        </a> --}}
                    </div>
                </div>
            </div>

            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach($userSubfeaturesArray as $subfeature)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="{{ $subfeature }}-tab"
                                data-tabs-target="#{{ $subfeature }}" type="button" role="tab"
                                aria-controls="{{ $subfeature }}" aria-selected="false">{{ $subfeature }}</button>
                        </li>
                        @endforeach

                        {{-- <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="properties-tab" data-tabs-target="#properties" type="button" role="tab"
                                aria-controls="properties" aria-selected="false">Properties</button>
                        </li>

                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="sessions-tab" data-tabs-target="#sessions" type="button" role="tab"
                                aria-controls="sessions" aria-selected="false">Sessions</button>
                        </li>

                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="documents-tab" data-tabs-target="#documents" type="button" role="tab"
                                aria-controls="documents" aria-selected="false">Property Documents</button>
                        </li> --}}

                    </ul>
                </div>
                <div id="myTabContent" wire:ignore>
                    @foreach($userSubfeaturesArray as $subfeature)
                    @if($subfeature === 'user')
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div>
                            <form class="space-y-6" wire:submit.prevent="updateUser()">
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
                                        <label for="username"
                                            class="block text-sm font-medium text-gray-700">Username</label>
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
                                        <label for="username" class="block text-sm font-medium text-gray-700">Mobile
                                            Number</label>
                                        <input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                        @error('mobile_number')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-2">
                                        <label for="gender"
                                            class="block text-sm font-medium text-gray-700">Gender</label>

                                        <select wire:model.lazy="gender" autocomplete="gender"
                                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Select one</option>
                                            <option value="female" {{ 'female'==$gender ? 'Select one' : 'selected' }}>
                                                female</option>
                                            <option value="male" {{ 'male'==$gender ? 'Select one' : 'selected' }}>male
                                            </option>
                                        </select>

                                        @error('gender')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    @if($user_id == auth()->user()->id)
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="password"
                                            class="block text-sm font-medium text-gray-700">Password</label>
                                        <input type="password" wire:model.lazy="password" autocomplete="password"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                        @error('password')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @endif

                                    @can('accountownerandmanager')
                                    <div class="col-span-2">
                                        <label for="role_id"
                                            class="block text-sm font-medium text-gray-700">Role</label>
                                        {{-- @if(auth()->user()->role_id === 5) --}}
                                        <select wire:model.lazy="role_id" autocomplete="role_id"
                                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) ==
                                                $role->id ? 'selected' :
                                                'selected'}}>{{ $role->role }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @endif --}}
                                        @error('role_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @endcan

                                </div>
                            </form>
                        </div>
                        <div class="mt-5 flex justify-end">
                            <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                                href="/login">
                                Cancel
                            </a>

                            <x-button type="submit" wire:click="updateUser()">
                                Update
                            </x-button>

                        </div>
                    </div>
                    @else
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    @if($subfeature === 'property')
                                    @include('tables.properties')
                                    @elseif($subfeature === 'session')
                                    @include('tables.sessions')
                                    @elseif($subfeature === 'document')

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    @endforeach
                </div>

            </div>
        </div>

    </div>
</div>