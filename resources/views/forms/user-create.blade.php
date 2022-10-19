<form class="space-y-6" method="POST" wire:submit.prevent="addUser()" enctype="multipart/form-data">
    <div class="px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-6 md:gap-6">
            <div class="sm:col-span-6">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Select a position:</label>
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
                    <input wire:model="email" 
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md"></input>
                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>

             {{-- @if($createAnotherEmployee) --}}
            <div class="mt-3 col-span-2">
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
            {{-- @endif --}}


            {{-- @if($sendEmailToEmployee)
            <div class="mt-3 col-span-2">
                <div class="form-check">
                    <input wire:model="sendEmailToEmployee" disabled
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="checkbox" value="{{ old('sendEmailToEmployee'), $sendEmailToEmployee }}"
                        id="flexCheckChecked">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                        Send invite to the new employee.
                    </label>
                </div>
            </div>
            @endif --}}

            @endif

                <div class="bg-white px-4 py-5 shadow sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="mt-5 space-y-6 md:col-span-6 md:mt-0">
                            <fieldset>
                                
                                <div class="text-base font-medium text-gray-900" aria-hidden="true">Features</div>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start">
                                        <div class="flex h-5 items-center">
                                            <input id="comments" name="comments" type="checkbox"
                                                class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="comments" class="font-medium text-gray-700">Comments</label>
                                            <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </fieldset>
                      
                        </div>
                    </div>
                </div>
        
        </div>

        <div class="flex justify-end mt-10">
            <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                href="/property/{{ Session::get('property') }}/user">
                Back
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