<form class="space-y-6" method="POST" wire:submit.prevent="storeUser()" enctype="multipart/form-data">
    <div class="px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-6 md:gap-6">
            <div class="sm:col-span-6">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Select a role:</label>
                <select wire:model="role_id"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-10 w-full sm:text-sm border border-gray-700  rounded-md">
                    <option value="">Select an personnel role</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('role_id')==$role->id?
                        'selected': 'Select one'
                        }}>{{ $role->role }}</option>
                    @endforeach
                </select>
                @error('role_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="sm:col-span-6">
                <label for="concern" class="block text-sm font-medium text-gray-700">Email:</label>
                <div class="mt-1">
                    <input wire:model.debounce.1000ms="email"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-10 px-3 sm:text-sm border border-gray-700 rounded-md"></input>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>

        </div>

        <div class="mt-5 sm:col-span-6">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Set personnel restrictions to the System.</h1>
                    <p class="mt-2 text-sm text-gray-700">A list of all the features and the different actions a user
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
                                    {{-- @foreach ($features as $item)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                                        </td>

                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                                            {{ $item->feature }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <input type="checkbox" wire:model="is_{{ $item->alias }}_create_allowed"
                                                class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <input type="checkbox" wire:model="is_{{ $item->alias }}_read_allowed"
                                                class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <input type="checkbox" wire:model="is_{{ $item->alias }}_update_allowed"
                                                class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <input type="checkbox" wire:model="is_{{ $item->alias }}_delete_allowed"
                                                class="absolute -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </td>

                                    </tr>

                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 col-span-2">
                <div class="form-check">
                    <input wire:model="createAnotherPersonnel"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="checkbox" value="{{ old('createAnotherPersonnel'), $createAnotherPersonnel}}"
                        id="flexCheckChecked">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                        Create another personnel
                    </label>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-10">
            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/user'">
                Cancel
            </x-button>

            @if($email)
            <x-button type="submit" wire:click="storeUser()">
                Create
            </x-button>
            @endif
        </div>
</form>