<div>
    @include('layouts.notifications')
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
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="user-tab"
                                data-tabs-target="#user" type="button" role="tab" aria-controls="user"
                                aria-selected="false">User</button>
                        </li>

                        <li class="mr-2" role="presentation">
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

                    </ul>
                </div>
                <div id="myTabContent">
                    <div class="p-4 rounded-lg" id="user" role="tabpanel" aria-labelledby="user-tab">
                        <div>
                            <form class="space-y-6" method="POST" wire:submit.prevent="updateUser()"
                                enctype="multipart/form-data">
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

                                    @can('manager')
                                    <div class="col-span-2">
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700">Status</label>

                                        <select wire:model.lazy="status" autocomplete="status"
                                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <option value="">Select one</option>
                                            <option value="active" {{ 'active'==$status ? 'Select one' : 'selected' }}>
                                                active</option>
                                            <option value="inactive" {{ 'inactive'==$status ? 'Select one' : 'selected'
                                                }}>inactive</option>
                                            <option value="banned" {{ 'banned'==$status ? 'Select one' : 'selected' }}>
                                                banned</option>
                                            <option value="pending" {{ 'pending'==$status ? 'Select one' : 'selected'
                                                }}>pending</option>
                                        </select>

                                        @error('status')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

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

                                @can('manager')
                                <h1 class="text-xl font-semibold text-gray-900">Restrictions</h1>
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                        <div
                                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                            <!-- Selected row actions, only show when rows are selected. -->
                                            <div
                                                class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                            </div>
                                            @include('tables.restrictions')
                                        </div>
                                    </div>
                                </div>


                            </form>
                            @endcan

                        </div>

                        <div class="mt-5 flex justify-end">
                            <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                                href="/login">
                                Cancel
                            </a>

                            <button type="submit" wire:click="updateUser()" wire:loading.remove wire:target="updateUser"
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Update
                            </button>

                            <button type="button" disabled wire:loading
                                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Loading...
                            </button>
                        </div>
                    </div>

                    <div class="hidden p-4 rounded-lg dark:bg-gray-800" id="properties" role="tabpanel"
                        aria-labelledby="properties-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>

                                    @include('tables.properties')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden p-4  rounded-lg dark:bg-gray-800" id="sessions" role="tabpanel"
                        aria-labelledby="sessions-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3  sm:left-16">

                                    </div>

                                    @include('tables.sessions')
                                </div>
                                {{-- {{ $sessions->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>