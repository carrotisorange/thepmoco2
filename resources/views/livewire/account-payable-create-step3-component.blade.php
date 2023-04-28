<div>
    @cannot('accountownerandmanager')
    <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="text-center">
            {{-- <p class="text-base font-semibold text-indigo-600"></p> --}}
            <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl"><i
                    class="fa-solid fa-hourglass-start"></i></h1>
            <p class="mt-6 text-base leading-7 text-gray-600">The request has been sent to the manager.</p>
            <div class="mt-10 flex items-center justify-center gap-x-6">
                <button type="button" wire:loading.remove wire:click="downloadInternalDocument"
                    wire:target="downloadInternalDocument"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    View Request
                </button>

                <button type="button" disabled wire:target="downloadInternalDocument" wire:loading
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    Loading...
                </button>
            </div>
        </div>
    </main>
    @else

    <div class="mt-5 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end">

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
                                    <span>

                                        @if($accountpayable->quotation1)
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Quotation/Bill</a>
                                        @else

                                        <a href="#" class="text-red-500 text-decoration-line: underline">No
                                            quotation/bill
                                            was uploaded</a>
                                        @endif

                                    </span>


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
                                            Quotation/Bill</a>
                                        @else

                                        <a href="#" class="text-red-500 text-decoration-line: underline">No
                                            Quotation/Bill
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
                                            Quotation/Bill</a>
                                        @else

                                        <a href="#" class="text-red-500 text-decoration-line: underline">No
                                            Quotation/Bill
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
                                    <span>

                                        @if($accountpayable->selected_quotation == 'quotation1')

                                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Selected Quotation</a>

                                        @elseif($accountpayable->selected_quotation == 'quotation2')

                                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Selected Quotation</a>

                                        @elseif($accountpayable->selected_quotation == 'quotation3')

                                        <a href="{{ asset('/storage/'.$accountpayable->quotation3) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Selected Quotation</a>

                                        @else
                                        <a href="#" class="text-red-500 text-decoration-line: underline">No Selected
                                            Quotation
                                            was uploaded</a>
                                        @endif

                                    </span>


                                </label>

                            </div>

                        </div>
                    </div>
                </div>


                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Particulars</label>

                </div>

                <div class="sm:col-span-6">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50">
                            <tr>
                                <x-th>#</x-th>
                                <x-th>UNIT</x-th>
                                <x-th>VENDOR</x-th>
                                <x-th>ITEM </x-th>
                                <x-th>QUANTITY</x-th>
                                {{-- @if($accountpayable->request_for === 'payment') --}}
                                <x-th>Price</x-th>
                                <x-th>Total</x-th>
                                {{-- @endif --}}

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($particulars as $index => $particular)
                            <div wire:key="particular-field-{{ $particular->id }}">
                                <tr>
                                    <x-td>{{ $index+1 }}</x-td>
                                    <x-td>
                                        @if($particular->unit_uuid)
                                        {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                                        @else
                                        NA
                                        @endif
                                    </x-td>
                                    <x-td>
                                        @if($particular->vendor_id)
                                        {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                                        @else
                                        NA
                                        @endif
                                    </x-td>
                                    <x-td>
                                        {{ $particular->item }}
                                    </x-td>
                                    <x-td>
                                        {{ $particular->quantity }}
                                    </x-td>
                                    {{-- @if($accountpayable->request_for === 'payment') --}}
                                    <x-td>
                                        {{ $particular->price }}
                                    </x-td>
                                    <x-td>
                                        {{ number_format($particular->price * $particular->quantity, 2) }}
                                    </x-td>
                                    {{-- @endif --}}

                                </tr>
                            </div>
                            @endforeach
                            <tr>
                                <x-td>Total</x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td>{{ number_format($particulars->sum('total'),2) }}</x-td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Vendor Details</label>

                </div>

                {{-- vendor details --}}
                <div class="sm:col-span-3">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Vendor Name:</label>
                    <input type="text" wire:model="vendor" readonly
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-10 sm:text-sm border border-gray-700 rounded-md">
                    @error('selected_vendor')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="sm:col-span-3">
                    <label for="delivery-date" class="block text-sm font-medium text-gray-700">Delivery Date:</label>
                    <input type="date" wire:model="delivery_at" readonly
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-10 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('delivery_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>



                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Comment</label>

                </div>

                @can('accountownerandmanager')
                <div class="sm:col-span-6">
                    <textarea placeholder="Add your comment..." wire:model="comment"
                        class="p-2 font-base border-[0.1px] resize-none h-[120px] border-[#9EA5B1] rounded-md w-full"></textarea>

                </div>
                @else
                <div class="sm:col-span-6">
                    <textarea placeholder="Add your comment..." wire:model="comment" readonly
                        class="p-2 font-base border-[0.1px] resize-none h-[120px] border-[#9EA5B1] rounded-md w-full"></textarea>

                </div>
                @endcan

                @if($accountpayable->status === 'approved by manager')
                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-green-700"><i
                            class="fa-solid fa-circle-check"></i> Approved by: {{
                        $accountpayable->requester->name }} </label>

                </div>
                @elseif($accountpayable->status === 'rejected by manager')

                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-red-700"><i
                            class="fa-solid fa-triangle-exclamation"></i> Rejected by: {{
                        $accountpayable->requester->name }} </label>

                </div>
                @endif

                {{-- reject, approve button --}}
                <div class="col-start-6 flex items-center justify-end">

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
                </div>

            </div>
        </form>
        {{-- end-step-1-form --}}
    </div>
    @endcannot
</div>