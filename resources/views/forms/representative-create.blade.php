<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="bg-gray-100 mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-2 gap-6">

                    <div class="col-span-6">
                        <label for="last-name" class="block text-sm font-medium text-gray-700">Relationship to the
                            owner</label>
                        <select wire:model="relationship_id" autocomplete="relationship_id"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select one</option>
                            @foreach ($relationships as $relationship)
                            <option value="{{ $relationship->id }}" {{ old('relationship_id')==$relationship->id?
                                'selected': 'Select one'
                                }}>{{ $relationship->relationship }}</option>
                            @endforeach
                        </select>
                        <x-validation-error-component name='relationship_id' />
                    </div>

                    @if($relationship_id)
                    <div class="col-span-6">
                        <label for="representative" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" wire:model="representative"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='representative' />
                    </div>



                    <div class="col-span-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="text" wire:model="email"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='email' />
                    </div>

                    <div class="col-span-2">
                        <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile</label>
                        <input type="text" wire:model="mobile_number"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        <x-validation-error-component name='mobile_number' />
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach a valid id
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="valid_id"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Attach a file</span>
                                        <input id="valid_id" type="file" class="sr-only" wire:model="valid_id">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($valid_id)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment()">Remove the
                                        uploaded valid id
                                    </a></span>
                                @endif
                            </div>


                        </div>
                        @error('valid_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($valid_id)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror

                    </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="flex justify-end mt-10">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/owner/{{ $owner->uuid }}'">
                Cancel
            </x-button>
            <x-button type="submit">
                Save
            </x-button>
        </div>
    </div>
</form>