<form class="space-y-6" wire:submit.prevent="submitForm" enctype="multipart/form-data">
    <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label for="unit_uuid" class="block text-sm font-medium text-gray-700">Unit</label>
                        <select
                            class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md"
                            wire:model="unit_uuid" id="unit_uuid" name="unit_uuid">
                            <option value="">Select one</option>
                            @foreach ($units as $unit)
                            <option value="{{ $unit->uuid }}" {{ old('unit_uuid')==$unit->id?
                                'selected': 'Select one'
                                }}>{{ $unit->unit.' ('.$unit->status->status.')' }}</option>
                            @endforeach
                        </select>

                     <x-validation-error-component name='unit_uuid' />
                    </div>
                    <div class="col-span-1">
                        <label for="start" class="block text-sm font-medium text-gray-700">Start of the contract</label>
                        <input type="date" wire:model.lazy="start" autocomplete="start"
                            class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                     <x-validation-error-component name='start' />
                    </div>

                    <div class="col-span-1">
                        <label for="end" class="block text-sm font-medium text-gray-700">End of the contract</label>
                        <input type="date" wire:model.lazy="end" autocomplete="end"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                       <x-validation-error-component name='end' />

                    </div>

                    <div class="col-span-1">
                        <label for="rent" class="block text-sm font-medium text-gray-700">Rent/month/tenant</label>
                        <input type="number" wire:model.lazy="rent" autocomplete="rent" step="0.001"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                       <x-validation-error-component name='rent' />
                    </div>

                    <div class="col-span-1">
                        <label for="discount" class="block text-sm font-medium text-gray-700">Discount </label>
                        <input type="number" wire:model.lazy="discount" autocomplete="discount" step="0.001"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                      <x-validation-error-component name='discount' />
                    </div>

                    <div class="col-span-2">

                        <label class="block text-sm font-medium text-gray-700"> You may attached the signed contract
                            here.
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="image"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Attach a contract</span>
                                        <input id="image" name="image" type="file" class="sr-only"
                                            wire:model="contract">
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($contract)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeContract()">Remove the attached contract.</a></span>
                                @endif
                            </div>


                        </div>
                        @error('contract')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($contract)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>

                        @endif
                        @enderror
                    </div>

                </div>
            </div>
        </div>

        <div class="flex justify-end mt-5">
            <x-button onclick="window.location.href='{{ url()->previous() }}'">
                Cancel
            </x-button>
            <x-button type="submit">
                Next
            </x-button>
        </div>
    </div>
</form>
