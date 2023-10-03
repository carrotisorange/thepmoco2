<form action="" enctype="multipart/form-data" wire:submit.prevent="submitForm()" method="POST">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-4 gap-6">
                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700"> Upload a title
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="title"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    @if($deedOfSale_info->title)
                                    <span>Upload a new title</span>
                                    @else
                                    <span>Upload a title</span>
                                    @endif

                                    <input id="title" type="file" wire:model="title" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($title)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeAttachment('title')">Remove the uploaded
                                            title.</a></span>
                                    @else
                                    {{-- <span class="text-red-600">No contract found.</span> --}}
                                    @endif

                                    @if($deedOfSale_info->title)
                                    <br>
                                    <span class="text-blue-500 text-xs mt-2">
                                        <a href="{{ asset('/storage/'.$deedOfSale_info->title) }}" target="_blank">View
                                            the uploaded title.</a></span>


                                    @endif
                                </label>

                            </div>

                        </div>

                    </div>

                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    @if($title)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i
                            class="fa-solid fa-circle-check"></i></p>
                    @endif
                </div>

                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700"> Upload a tax declaration
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="tax_declaration"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    @if($deedOfSale_info->tax_declaration)
                                    <span>Upload a new tax declaration</span>
                                    @else
                                    <span>Upload a tax declaration</span>
                                    @endif

                                    <input id="tax_declaration" type="file" wire:model="tax_declaration"
                                        class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($tax_declaration)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeAttachment('tax_declaration')">Remove the
                                            uploaded
                                            tax declaration.</a></span>
                                    @else
                                    {{-- <span class="text-red-600">No contract found.</span> --}}
                                    @endif

                                    @if($deedOfSale_info->tax_declaration)
                                    <br>
                                    <span class="text-blue-500 text-xs mt-2">
                                        <a href="{{ asset('/storage/'.$deedOfSale_info->tax_declaration) }}"
                                            target="_blank">View
                                            the uploaded tax declaration.</a></span>


                                    @endif
                                </label>

                            </div>

                        </div>

                    </div>

                    @error('tax_declaration')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    @if($tax_declaration)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i
                            class="fa-solid fa-circle-check"></i></p>
                    @endif
                </div>
                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700"> Upload a deed of sale
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="deed_of_sales"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    @if($deedOfSale_info->deed_of_sales)
                                    <span>Upload a new deed of sale</span>
                                    @else
                                    <span>Upload a tax declaration</span>
                                    @endif

                                    <input id="deed_of_sales" type="file" wire:model="deed_of_sales" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($deed_of_sales)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeAttachment('deed_of_sales')">Remove the uploaded
                                            deed of sale.</a></span>
                                    @else
                                    {{-- <span class="text-red-600">No contract found.</span> --}}
                                    @endif

                                    @if($deedOfSale_info->deed_of_sales)
                                    <br>
                                    <span class="text-blue-500 text-xs mt-2">
                                        <a href="{{ asset('/storage/'.$deedOfSale_info->deed_of_sales) }}"
                                            target="_blank">View
                                            the uploaded deed of sale.</a></span>


                                    @endif
                                </label>

                            </div>

                        </div>

                    </div>

                    @error('deed_of_sales')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    @if($deed_of_sales)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i
                            class="fa-solid fa-circle-check"></i></p>
                    @endif
                </div>

                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700"> Upload a contract to sell
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="contract_to_sell"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    @if($deedOfSale_info->contract_to_sell)
                                    <span>Upload a new contract to sell</span>
                                    @else
                                    <span>Upload a contract to sell</span>
                                    @endif

                                    <input id="contract_to_sell" type="file" wire:model="contract_to_sell"
                                        class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($contract_to_sell)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeAttachment('contract_to_sell')">Remove the
                                            uploaded
                                            contract to sell.</a></span>
                                    @else
                                    {{-- <span class="text-red-600">No contract found.</span> --}}
                                    @endif

                                    @if($deedOfSale_info->contract_to_sell)
                                    <br>
                                    <span class="text-blue-500 text-xs mt-2">
                                        <a href="{{ asset('/storage/'.$deedOfSale_info->contract_to_sell) }}"
                                            target="_blank">View
                                            the uploaded contract to sell.</a></span>


                                    @endif
                                </label>

                            </div>

                        </div>

                    </div>

                    @error('contract_to_sell')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    @if($contract_to_sell)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i
                            class="fa-solid fa-circle-check"></i></p>
                    @endif
                </div>

                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700"> Upload a certificate of membership
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="certificate_of_membership"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    @if($deedOfSale_info->certificate_of_membership)
                                    <span>Upload a new certificate of membership</span>
                                    @else
                                    <span>Upload a certificate of membership</span>
                                    @endif

                                    <input id="certificate_of_membership" type="file"
                                        wire:model="certificate_of_membership" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($certificate_of_membership)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeAttachment('certificate_of_membership')">Remove
                                            the uploaded
                                            certificate of membership.</a></span>
                                    @else
                                    {{-- <span class="text-red-600">No contract found.</span> --}}
                                    @endif

                                    @if($deedOfSale_info->certificate_of_membership)
                                    <br>
                                    <span class="text-blue-500 text-xs mt-2">
                                        <a href="{{ asset('/storage/'.$deedOfSale_info->certificate_of_membership) }}"
                                            target="_blank">View
                                            the uploaded certificate of membership.</a></span>


                                    @endif
                                </label>

                            </div>

                        </div>

                    </div>

                    @error('certificate_of_membership')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    @if($certificate_of_membership)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i
                            class="fa-solid fa-circle-check"></i></p>
                    @endif
                </div>
            </div>
            <div class="px-4 py-3 text-right sm:px-6">
               
                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/owner/{{ $deedOfSale_info->owner_uuid }}'">
                            Cancel
                        </x-button>

                <x-button type="submit">
                    Update
                </x-button>
            </div>
        </div>
    </div>
</form>