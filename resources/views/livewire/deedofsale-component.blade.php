<div>
    {{-- @include('layouts.notifications') --}}
    <div class="p-8 px-12 bg-white border-b border-gray-200">
        <form class="space-y-6" wire:submit.prevent="submitForm()">
            <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-1 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-gray-700"> Please attach the  leasing
                                    contract
                                </label>
                                <div
                                    class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <div class="flex text-sm text-gray-600">
                                            <label for="contract"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <span wire:loading>Loading...</span>
                                                <input id="contract" type="file" class="sr-only" wire:model="contract">
                                            </label>

                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                        @if($contract)
                                        <span class="text-red-500 text-xs mt-2">
                                            <a href="#/" wire:click="removeAttachment('contract')">Remove the uploaded
                                                leasing contract.</a></span>
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

                            <div class="col-span-6">
                                <label class="block text-sm font-medium text-gray-700"> Please attach the title
                                </label>
                                <div
                                    class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <div class="flex text-sm text-gray-600">
                                            <label for="title"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
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
                                <label class="block text-sm font-medium text-gray-700"> Please attach the tax
                                    declaration
                                </label>
                                <div
                                    class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <div class="flex text-sm text-gray-600">
                                            <label for="tax_declaration"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <span wire:loading>Loading...</span>
                                                <input id="tax_declaration" type="file" class="sr-only"
                                                    wire:model="tax_declaration">
                                            </label>

                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                        @if($tax_declaration)
                                        <span class="text-red-500 text-xs mt-2">
                                            <a href="#/" wire:click="removeAttachment('tax_declaration')">Remove the
                                                uploaded
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
                                <div
                                    class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-deed_of_sales"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <span wire:loading>Loading...</span>
                                                <input id="file-deed_of_sales" type="file" class="sr-only"
                                                    wire:model="deed_of_sales">
                                            </label>

                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                        @if($deed_of_sales)
                                        <span class="text-red-500 text-xs mt-2">
                                            <a href="#/" wire:click="removeAttachment('deed_of_sales')">Remove the
                                                uploaded deed
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
                                <label class="block text-sm font-medium text-gray-700"> Please attach the contract to
                                    sell
                                </label>
                                <div
                                    class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <div class="flex text-sm text-gray-600">
                                            <label for="contract_to_sell"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <span wire:loading>Loading...</span>
                                                <input id="contract_to_sell" type="file" class="sr-only"
                                                    wire:model="contract_to_sell">
                                            </label>

                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                        @if($contract_to_sell)
                                        <span class="text-red-500 text-xs mt-2">
                                            <a href="#/" wire:click="removeAttachment('contract_to_sell')">Remove the
                                                uploaded
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
                                <div
                                    class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">

                                        <div class="flex text-sm text-gray-600">
                                            <label for="certificate_of_membership"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span>Upload a file</span>
                                                <span wire:loading>Loading...</span>
                                                <input id="certificate_of_membership" type="file" class="sr-only"
                                                    wire:model="certificate_of_membership">
                                            </label>

                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                        @if($certificate_of_membership)
                                        <span class="text-red-500 text-xs mt-2">
                                            <a href="#/"
                                                wire:click="removeAttachment('certificate_of_membership')">Remove the
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
                    <x-button type="submit">
                        Next
                    </x-button>
                </div>
            </div>
        </form>
    </div>
</div>
