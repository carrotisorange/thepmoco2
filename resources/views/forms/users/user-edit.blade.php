<form class="space-y-6" method="POST" wire:submit.prevent="updateUser()" enctype="multipart/form-data">
    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div class="mt-5 sm:flex sm:items-center">
            <div class="sm:flex-auto mt-5">
                <h1 class="text-xl font-semibold text-gray-900">Personnel Access to the System</h1>
                <p class="mt-2 text-sm text-gray-700">This section shows all the information that the personnel needs to
                    access the system.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

            </div>
        </div>
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

            <div class="col-span-2">
                <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>

                <select wire:model.lazy="gender" autocomplete="gender"
                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select one</option>
                    <option value="female" {{ 'female'==$gender ? 'Select one' : 'selected' }}>female</option>
                    <option value="male" {{ 'male'==$gender ? 'Select one' : 'selected' }}>male</option>
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
                <label for="username" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            @if($user_id == auth()->user()->id)
            <div class="col-span-6 sm:col-span-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" wire:model.lazy="password" autocomplete="password"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            @endif

            @if(auth()->user()->role_id == 5)
            <div class="col-span-2">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>

                <select wire:model.lazy="status" autocomplete="status"
                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Select one</option>
                    <option value="active" {{ 'active'==$status ? 'Select one' : 'selected' }}>active</option>
                    <option value="inactive" {{ 'inactive'==$status ? 'Select one' : 'selected' }}>inactive</option>
                    <option value="banned" {{ 'banned'==$status ? 'Select one' : 'selected' }}>banned</option>
                    <option value="pending" {{ 'pending'==$status ? 'Select one' : 'selected' }}>pending</option>
                </select>

                @error('status')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            {{-- <div class="col-span-2">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                @if(auth()->user()->role_id === 5)
                <select wire:model.lazy="role_id" autocomplete="role_id"
                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' :
                        'selected'}}>{{ $role->role }}</option>
                    @endforeach
                </select>
                @endif
                @error('role_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div> --}}
            @endif



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

        @if(auth()->user()->role_id != 7 && auth()->user()->role_id != 8)
        <div class="mt-5 sm:col-span-6">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto mt-5">
                    <h1 class="text-xl font-semibold text-gray-900">Personnel Access To Properties</p>
                        <p class="mt-2 text-sm text-gray-700">This section shows a list of all the properties the
                            personnel has access to.</p>
                </div>

                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                    @include('modals.popup-error')
                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>Property</x-th>
                                        <x-th>Type</x-th>
                                        <x-th>Personnel Access</x-th>
                                        <x-th>Assigned on</x-th>
                                        <x-th>Modify Access</x-th>
                                    </tr>
                                </thead>
                                @foreach ($properties as $index => $item)
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <x-td>{{ $index+1 }}</x-td>

                                        <x-td>{{ $item->property->property }}</x-td>
                                        <x-td>{{ $item->property->type->type }}</x-td>
                                        <x-td>
                                            @if($item->is_approve == '0')
                                            pending
                                            @else
                                            approved
                                            @endif

                                        </x-td>
                                        <x-td>{{ $item->created_at }}</x-td>
                                        <x-td>
                                            @if(auth()->user()->role_id == '5')
                                            @if($item->is_approve == '1')
                                            <a class="text-red-500 text-decoration-line: underline"
                                                href="/property/{{ $item->property_uuid }}/user_property/{{ $item->id }}/remove-access">
                                                Remove Access
                                            </a>
                                            @else
                                            <a class="text-green-500 text-decoration-line: underline"
                                                href="/property/{{ $item->property_uuid }}/user_property/{{ $item->id }}/restore-access">
                                                Restore Access
                                            </a>
                                            @endif
                                            @endif
                                        </x-td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>Property</x-th>
                                        <x-th>Type</x-th>
                                        <x-th>Personnel Access</x-th>
                                        <x-th>Assigned on</x-th>
                                        <x-th>Modify Access</x-th>
                                    </tr>
                                </thead>
                                @foreach ($all_properties->where('user_id','!=',$user->id) as $index => $item)
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <x-td>{{ $index+1 }}</x-td>

                                        <x-td>{{ $item->property->property }}</x-td>
                                        <x-td>{{ $item->property->type->type }}</x-td>
                                        <x-td>
                                            @if($item->is_approve == '0')
                                            pending
                                            @else
                                            approved
                                            @endif

                                        </x-td>
                                        <x-td>{{ $item->created_at }}</x-td>
                                        <x-td>
                                            @if(auth()->user()->role_id == '5')
                                            <a class="text-green-500 text-decoration-line: underline"
                                                href="/property/{{ Session::get('property') }}/user_property/{{ $item->id }}/provide-access">
                                                Provide Access
                                            </a>
                                            @endif
                                        </x-td>
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>


                        </div>
                    </div>
                </div>
            </div> --}}

        </div>

        <div class="mt-5 sm:col-span-6">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto mt-5">
                    <h1 class="text-xl font-semibold text-gray-900">Personnel Restrictions to the System</h1>
                    <p class="mt-2 text-sm text-gray-700">This section shows a list of all the features and the
                        different
                        actions an personnel
                        can perform.</p>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full table-fixed divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

                                        </th>
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            Features
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Create
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Read
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Update
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Delete
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($features as $item)
                                    <tr>
                                        <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                            <!-- Selected row marker, only show when row is selected. -->
                                            <div class="absolute inset-y-0 left-0 w-0.5 bg-indigo-600"></div>

                                            {{-- <input type="checkbox"
                                                class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                            --}}
                                        </td>
                                        <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                                            {{ $item->feature }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <input type="checkbox" wire:model="is_{{ $item->alias }}_create_allowed"
                                                class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">

                                        </td>
                                        @error('is_{{ $item->alias }}_create_allowed')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <input type="checkbox" wire:model="is_{{ $item->alias }}_read_allowed"
                                                class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </td>
                                        @error('is_{{ $item->alias }}_read_allowed')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <input type="checkbox" wire:model="is_{{ $item->alias }}_update_allowed"
                                                class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </td>
                                        @error('is_{{ $item->alias }}_update_allowed')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <input type="checkbox" wire:model="is_{{ $item->alias }}_delete_allowed"
                                                class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </td>

                                        @error('is_{{ $item->alias }}_delete_allowed')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror

                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endif


        <div class="flex justify-end">
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
        </div>

</form>