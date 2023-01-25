<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the title
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="title"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span wire:loading.remove>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="title" type="file" class="sr-only" wire:model="title">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($title)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('title')">Remove the uploaded
                                        title.</a></span>
                                @endif

                            </div>
                        </div>
                        @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($title)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the tax declaration
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="tax_declaration"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span wire:loading.remove>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="tax_declaration" type="file" class="sr-only"
                                            wire:model="tax_declaration">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($tax_declaration)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('tax_declaration')">Remove the uploaded
                                        tax declaration.</a></span>
                                @endif
                            </div>



                        </div>
                        @error('tax_declaration')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($tax_declaration)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the deed of sale
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="file-deed_of_sales"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span wire:loading.remove>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="file-deed_of_sales" type="file" class="sr-only"
                                            wire:model="deed_of_sales">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($deed_of_sales)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('deed_of_sales')">Remove the uploaded deed
                                        of sale.</a></span>
                                @endif
                            </div>

                        </div>
                        @error('deed_of_sales')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($deed_of_sales)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror

                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the contract to sell
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="contract_to_sell"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span wire:loading.remove>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="contract_to_sell" type="file" class="sr-only"
                                            wire:model="contract_to_sell">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($contract_to_sell)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('contract_to_sell')">Remove the uploaded
                                        contract to sell.</a></span>
                                @endif
                            </div>

                        </div>
                        @error('contract_to_sell')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($contract_to_sell)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror

                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the certificate of
                            membership
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="certificate_of_membership"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span wire:loading.remove>Upload a file</span>
                                        <span wire:loading>Loading...</span>
                                        <input id="certificate_of_membership" type="file" class="sr-only"
                                            wire:model="certificate_of_membership">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($certificate_of_membership)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('certificate_of_membership')">Remove the
                                        uploaded certificate of membership.</a></span>
                                @endif
                            </div>


                        </div>
                        @error('certificate_of_membership')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if ($certificate_of_membership)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                        @enderror

                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-10">
            {{-- <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/bank/create">
                Skip
            </a> --}}
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