<div>

    <div class="mt-5 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end">
            <button type="button"
                class="mb-4 bg-white py-2 px-4 underline rounded-md text-sm font-medium text-gray-700 hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Export</button>
        </div>
        {{-- start-step-1-form --}}
        <form class="space-y-6" wire:submit.prevent="approveRequest()" method="POST">

            <div class="md:grid md:grid-cols-6 md:gap-6">

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation 1</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span><a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Attachment</a></span>


                                </label>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation 2</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span>

                                        @if($accountpayable->quotation2)
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation2) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Attachment</a>
                                        @else

                                        <a href="#" class="text-red-500 text-decoration-line: underline">No quotation
                                            was uploaded</a>
                                        @endif

                                    </span>

                                </label>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Quotation 3</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span>

                                        @if($accountpayable->quotation3)
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation3) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Attachment</a>
                                        @else

                                        <a href="#" class="text-red-500 text-decoration-line: underline">No quotation
                                            was uploaded</a>
                                        @endif

                                    </span>

                                </label>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700"> Selected quotation</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span><a href="{{ asset('/storage/'.$accountpayable->selected_quotation) }}"
                                            target="_blank" class="text-blue-500 text-decoration-line: underline">View
                                            Attachment</a></span>


                                </label>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Vendor Details</label>

                </div>

                {{-- material/service details --}}
                <div class="sm:col-span-3">
                    <label for="service_details" class="block text-sm font-medium text-gray-700">Particular</label>
                    <input type="text" value="{{ $accountpayable->particular }}" name="particular" readonly
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('particular')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- quantity --}}
                <div class="sm:col-span-3">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                    <input type="number" value="{{ $accountpayable->quantity }}" name="quantity" readonly
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('quantity')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                {{-- price --}}
                <div class="sm:col-span-3">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount:</label>
                    <input type="number" step="0.01" value="{{ $accountpayable->amount }}" name="amount" readonly
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('amount')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                {{-- vendor details --}}
                <div class="sm:col-span-3">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Vendor:</label>
                    <input type="text" value="{{ $accountpayable->vendor }}" name="vendor" readonly
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('selected_vendor')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Comment</label>

                </div>

                @can('manager')
                <div class="sm:col-span-6">
                    <textarea placeholder="Add your comment..." wire:model="comment2"
                        class="p-2 font-base border-[0.1px] resize-none h-[120px] border-[#9EA5B1] rounded-md w-full"></textarea>

                </div>
                @else
                <div class="sm:col-span-6">
                    <textarea placeholder="Add your comment..." wire:model="comment2" readonly
                        class="p-2 font-base border-[0.1px] resize-none h-[120px] border-[#9EA5B1] rounded-md w-full"></textarea>

                </div>
                @endcan


                @if($accountpayable->status === 'approved by manager')
                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-green-700"><i
                            class="fa-solid fa-circle-check"></i> Approved by: {{
                        App\Models\User::find($accountpayable->approver2_id)->name }} </label>

                </div>
                @elseif($accountpayable->status === 'rejected by manager')

                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-red-700"><i
                            class="fa-solid fa-triangle-exclamation"></i> Rejected by: {{
                        App\Models\User::find($accountpayable->approver2_id)->name }} </label>

                </div>
                @endif

                {{-- reject, approve button --}}
                <div class="col-start-6 flex items-center justify-end">
                    @can('manager')
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="#/" wire:click="rejectRequest()">
                        Reject
                    </a>
                    <button
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        <svg wire:loading wire:target="approveRequest"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Approve
                    </button>
                    @else
                    @if($accountpayable->status === 'approved by manager')
                    <button
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        <svg wire:loading wire:target="approveRequest"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Next
                    </button>
                    @endif
                    @endcan
                </div>

            </div>
        </form>
        {{-- end-step-1-form --}}
    </div>
</div>