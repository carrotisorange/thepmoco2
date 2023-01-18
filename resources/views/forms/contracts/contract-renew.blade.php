<form class="space-y-6" wire:submit.prevent="submitForm()" enctype="multipart/form-data" method="POST">
    <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-2">
                        <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
                        <input type="text" wire:model.lazy="unit" autocomplete="unit" readonly
                            class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('unit')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="start" class="block text-sm font-medium text-gray-700">Start of the contract</label>
                        <input type="date" wire:model.lazy="start" autocomplete="start"
                            class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('start')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="end" class="block text-sm font-medium text-gray-700">End of the contract</label>
                        <input type="date" wire:model.lazy="end" autocomplete="end"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('end')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="col-span-1">
                        <label for="rent" class="block text-sm font-medium text-gray-700">Rent/month/tenant</label>
                        <input type="number" wire:model.lazy="rent" autocomplete="rent" step="0.001"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('rent')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-1">
                        <label for="discount" class="block text-sm font-medium text-gray-700">Discount </label>
                        <input type="number" wire:model.lazy="discount" autocomplete="discount" step="0.001"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('discount')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
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

                    @if($contract_details->tenant->email)
                    <div class="mt-3 col-span-2">
                        <div class="form-check">
                            <input wire:model="sendContractToTenant"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="{{ old('sendContractToTenant'), $sendContractToTenant }}"
                                id="flexCheckChecked">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                                Send contract details to tenant.
                            </label>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        <div class="flex justify-end mt-5">
            <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                href="{{ url()->previous() }}">
                Cancel
            </a>
            <button type="submit"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Next
            </button>
        </div>
    </div>
</form>