<div>
    <div class=" mt-5 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end">
            <button type="button" wire:loading.remove wire:click="downloadInternalDocument"
                wire:target="downloadInternalDocument"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Download Internal Document
            </button>
            <button type="button" wire:loading wire:target="downloadInternalDocument" disabled
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                Loading...
            </button>
        </div>
        {{-- start-step-2-form --}}
        <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">

            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="sm:col-span-7">
                    <label for="" class="block text-sm font-medium text-gray-700">Please upload the
                        quotations/bills</label>

                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation/Bill 1</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="quotation1"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span wire:loading.remove>Upload a file</span>
                                    <span wire:loading>Loading...</span>
                                    <input id="quotation1" wire:model="quotation1" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($quotation1)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeQuotation('quotation1')">Remove the attachment
                                            .</a></span>
                                    @endif

                                </label>

                            </div>

                            @error('quotation1')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($quotation1)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i></p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation/Bill 2 </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="quotation2"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span wire:loading.remove>Upload a file</span>
                                    <span wire:loading>Loading...</span>
                                    <input id="quotation2" wire:model="quotation2" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($quotation2)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeQuotation('quotation2')">Remove the attachment
                                            .</a></span>
                                    @endif

                                </label>

                            </div>

                            @error('quotation2')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($quotation2)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i></p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation/Bill 3</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="quotation3"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span wire:loading.remove>Upload a file</span>
                                    <span wire:loading>Loading...</span>
                                    <input id="quotation3" wire:model="quotation3" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($quotation3)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeQuotation('quotation3')">Remove the attachment
                                            .</a></span>
                                    @endif

                                </label>

                            </div>

                            @error('quotation3')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($quotation3)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i></p>
                            @endif
                        </div>
                    </div>
                </div>


                @if($accountpayable->request_for === 'purchase')
                <div class="sm:col-span-7">
                    <label for="" class="block text-sm font-medium text-gray-700">Selected Vendor Details:</label>

                </div>

                <div class="sm:col-span-2">
                    <label for="vendor" class="block text-sm font-medium text-gray-700">Select a quotation:</label>
                    <select id="selected_quotation" wire:model="selected_quotation"
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                        @if($quotation1 && !$quotation2 && !$quotation3)
                        <option value="quotation1">Quotation 1</option>
                        @elseif($quotation1 && $quotation2 && !$quotation3)
                        <option value="quotation1">Quotation 1</option>
                        <option value="quotation2">Quotation 2</option>
                        @elseif($quotation1 && $quotation2 && $quotation3)
                        <option value="quotation1">Quotation 1</option>
                        <option value="quotation2">Quotation 2</option>
                        <option value="quotation3">Quotation 3</option>
                        @else
                        <option value="">Please select one</option>
                        @endif

                    </select>
                    @error('selected_quotation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="vendor" class="block text-sm font-medium text-gray-700">Name of the vendor:</label>
                    <input type="text" wire:model="vendor" rows="3"
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('vendor')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount of the quotation</label>
                    <input type="number" step="0.01" wire:model="amount" rows="3"
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('amount')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                @endif




                {{-- cancel, next button --}}
                <div class="col-start-6 flex items-center justify-end">
                    {{-- <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="/property/{{ Session::get('property') }}/accountpayable/{{ $request_for }}/step-1">
                        Cancel
                    </a> --}}

                    <button type="submit" wire:loading wire:target="submitForm" disabled
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        Loading...
                    </button>
                    <button type="submit" wire:loading.remove wire:target="submitForm"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Next
                    </button>
                </div>

            </div>
        </form>
        {{-- end-step-2-form --}}
    </div>
</div>