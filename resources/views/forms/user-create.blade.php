<form class="space-y-6" method="POST" wire:submit.prevent="addUser()" enctype="multipart/form-data">
    <div class="px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-6 md:gap-6">
            <div class="sm:col-span-6">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Select a position:</label>
                <select wire:model="role_id"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    <option value="">Select an employee role</option>
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
                    <input wire:model="email"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></input>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>
            @endif
        </div>

        @if($email)
        <div class="mt-5 sm:col-span-6">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Set employee restrictions to the System.</h1>
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
                                    @foreach ($features as $item)
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                                            <!-- Selected row marker, only show when row is selected. -->


                                            {{-- <input type="checkbox"
                                                class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6"> --}}

                                        </td>
                                        <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
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

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 col-span-2">
                <div class="form-check">
                    <input wire:model="createAnotherEmployee"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="checkbox" value="{{ old('createAnotherEmployee'), $createAnotherEmployee }}"
                        id="flexCheckChecked">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                        Create another employee
                    </label>
                </div>
            </div>
        </div>
        @endif

        <div class="flex justify-end mt-10">
            <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                href="/property/{{ Session::get('property') }}/user">
                Cancel
            </a>
            @if($role_id)
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
            @endif
        </div>
</form>