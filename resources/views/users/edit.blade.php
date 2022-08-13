<x-main-layout>
    @section('title', 'The Property Manager | Profile')

    <div class="mx-auto px-12 md:w-1/2 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
        <form class="space-y-8 divide-y divide-gray-200" method="POST" action="/user/{{ $user->username }}/update">
            @csrf
            @method('PATCH')
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>


                    <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Full Name
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex rounded-md shadow-sm">
                                    <input type="text" name="name" id="name" autocomplete="name"
                                        value="{{old('name', $user->name)}}"
                                        class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                            @error('name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="username" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Username
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex rounded-md shadow-sm">
                                    <input type="text" name="username" id="username" autocomplete="username"
                                        value="{{old('username', $user->username)}}"
                                        class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                            @error('username')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Email
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex rounded-md shadow-sm">
                                    <input type="email" name="email" id="email" autocomplete="email"
                                        value="{{old('email', $user->email)}}"
                                        class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                        </div>

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="mobile_number" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Mobile
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex rounded-md shadow-sm">
                                    <input type="text" name="mobile_number" id="mobile_number"
                                        value="{{old('mobile_number', $user->mobile_number)}}"
                                        autocomplete="mobile_number"
                                        class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                            @error('mobile_number')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="password" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Password
                            </label>
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex rounded-md shadow-sm">
                                    <input type="password" name="password" id="password" autocomplete="password" value="{{old('password', $user->password)}}"
                                        class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                </div>
                            </div>
                            @error('password')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
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

                        <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <label for="status" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                Status
                            </label>
                            @if(auth()->user()->role_id === 5)
                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                <div class="max-w-lg flex rounded-md shadow-sm">
                                    <select name="status" id="status" autocomplete="status"
                                        class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                        <option value="active" {{ 'active'==$user->status ? 'selected' : ''
                                            }}>active</option>
                                        <option value="inactive" {{ 'inactive'==$user->status ? 'selected' :
                                            ''
                                            }}>inactive</option>
                                        <option value="banned" {{ 'banned'==$user->status ? 'selected' : ''
                                            }}>banned</option>
                                        <option value="pending" {{ 'pending'==$user->status ? 'selected' :
                                            ''
                                            }}>pending</option>
                                    </select>
                                </div>
                            </div>
                            @endif
                            @error('status')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div
                            class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
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
                </div>

                <div class="pt-5">
                    <div class="flex justify-end">
                        <button type="button" onclick="window.location.href='/property'"
                            class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Cancel
                        </button>
                        <button type="submit"
                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                            Save
                        </button>
                    </div>
                </div>
        </form>
    </div>
    </div>
</x-main-layout>