<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-500">{{ucfirst(Route::current()->getName())}}</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/step1/export"
                target="_blank"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                type="button">Export
            </a>
            <x-button class="bg-red-500" wire:click="deleteAccountPayable({{ $accountpayable->id }})">Delete</x-button>
            <x-button onclick="window.location.href='/property/{{ $accountpayable->property_uuid }}/rfp'">Back </x-button>
        </div>
    </div>
    <div class="mx-10">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Accounts Payable Details</h1>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <x-table-component>
                            <x-table-head-component>
                                <tr>
                                    <x-th>
                                        Batch No
                                   </x-th>
                                    <x-td>
                                        {{ $accountpayable->batch_no }}
                                   </x-td>
                                </tr>
                                <tr>
                                   <x-th>
                                        Request For
                                   </x-th>
                                  <x-td>
                                        {{ $accountpayable->request_for }}
                                  </x-td>
                                </tr>
                                <tr>
                                  <x-th>
                                        Requested Amount
                                  </x-th>
                                  <x-td>
                                    {{ number_format($accountpayable->amount, 2) }}
                                  </x-td>
                                </tr>
                                <tr>
                                   <x-th>
                                    Requested on
                                   </x-th>
                                  <x-td>
                                    {{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}
                                  </x-td>
                                </tr>
                                <tr>
                                   <x-th>
                                    Due Date on
                                   </x-th>
                                  <x-td>
                                    {{ Carbon\Carbon::parse($accountpayable->due_date)->format('M d, Y') }}
                                  </x-td>
                                </tr>

                                <tr>
                                    <x-th>Requested by</x-th>
                                   <x-td>{{ $accountpayable->requester->name }}</x-td>
                                </tr>
                            </x-table-head-component>
                        </x-table-component>
                    </div>
                </div>
            </div>
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Vendor Details</h1>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <x-table-component>
                            <x-table-head-component>
                                <tr>
                                    <x-th>Vendor</x-th>
                                    <x-td>{{ $accountpayable->vendor }}</x-td>
                                </tr>
                                <tr>
                                    <x-th>Delivery Date on</x-th>
                                    <x-td>{{ Carbon\Carbon::parse($accountpayable->delivery_at)->format('M d, Y') }}</x-td>
                                </tr>
                            </x-table-head-component>
                        </x-table-component>
                    </div>
                </div>
            </div>

            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Bank Details</h1>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <x-table-component>
                            <x-table-head-component>
                                <tr>
                                    <x-th>  Bank</x-th>
                                    <x-td>Bank</x-td>
                                </tr>
                                <tr>
                                   <x-th>Bank Name</x-th>
                                   <x-td>{{ $accountpayable->bank_name }}</x-td>
                                </tr>
                                <tr>
                                  <x-th>Bank Account Number</x-th>
                                  <x-td>{{ $accountpayable->bank_account }}</x-td>
                                </tr>
                            </x-table-head-component>
                        </x-table-component>
                    </div>
                </div>
            </div>

            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Particulars</h1>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <x-table-component>
                            <x-table-head-component>
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>UNIT</x-th>
                                    <x-th>VENDOR</x-th>
                                    <x-th>ITEM </x-th>
                                    <x-th>QUANTITY</x-th>
                                    <x-th>Price</x-th>
                                    <x-th>Total</x-th>

                                </tr>
                            </x-table-head-component>
                            <x-table-body-component>
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
                                            {{ number_format($particular->price, 2) }}
                                        </x-td>
                                        <x-td>
                                            {{ number_format($particular->price * $particular->quantity, 2) }}
                                        </x-td>
                                        {{-- @endif --}}

                                    </tr>
                                </div>
                                @endforeach
                                <tr>
                                    <x-td><b>Total</b></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td><b>{{ number_format($particulars->sum('total'),2) }}</b></x-td>
                                </tr>
                            </x-table-body-component>
                        </x-table-component>
                    </div>
                </div>
            </div>

            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Uploaded Quotations/Bills</h1>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                            @if($accountpayable->request_for === 'purchase')
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">Selected Quotation</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
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
                                </div>
                            </li>
                            @endif
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">Quotation/Bill 1</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    @if($accountpayable->quotation1)
                                    <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Export</a>
                                    @else
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                                        Quotation/Bill
                                        was uploaded</a>
                                    @endif
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">Quotation/Bill 2</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    @if($accountpayable->quotation2)
                                    <a href="{{ asset('/storage/'.$accountpayable->quotation2) }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Export</a>
                                    @else
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                                        Quotation/Bill
                                        was uploaded</a>
                                    @endif
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">Quotation/Bill 3</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    @if($accountpayable->quotation3)
                                    <a href="{{ asset('/storage/'.$accountpayable->quotation3) }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Export</a>
                                    @else
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                                        Quotation/Bill
                                        was uploaded</a>
                                    @endif
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Uploaded Deposit Slip</h1>

                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">


                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">Deposit Slip</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    @if($accountpayable->attachment)
                                    <a href="{{ asset('/storage/'.$accountpayable->attachment) }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    @else
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                                        deposit slip
                                        was uploaded</a>
                                    @endif
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
