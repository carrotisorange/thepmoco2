<div>
    @include('layouts.notifications')
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-500">Account Payables</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button
                onclick="window.location.href='/property/{{ $accountpayable->property_uuid }}/accountpayable/{{ $accountpayable->id }}/download/'"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                type="button">Export
            </button>
            @can('is_account_payable_delete_allowed')
            <button wire:click="deleteAccountPayable({{ $accountpayable->id }})" wire:loading.remove
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto"
                type="button">Delete
            </button>

            <button disabled wire:loading 
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto"
                type="button">Loading...
            </button>
            @endcan
            <button onclick="window.location.href='/property/{{ $accountpayable->property_uuid }}/accountpayable'"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                type="button">Back
            </button>

        </div>
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Status</h3>
        <p class="mt-1 text-sm text-gray-500">{{ $accountpayable->status }}</p>
        {{-- <p class="mt-1 text-sm text-gray-500">
            <select wire:model="status" wire:change="changeAccountPayableStatus"
                class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @if(auth()->user()->role_id === 4)
                <option value="approved by ap" {{ old('status', $status)=='approved by ap' ? 'selected' : 'selected' }}>
                    approved by ap - upload payment
                </option>
                <option value="released" {{ old('status', $status)=='released' ? 'selected' : 'selected' }}>
                    released
                </option>
                <option value="not yet released" {{ old('status', $status)=='not yet released' ? 'selected' : 'selected'
                    }}>
                    not yet released
                </option>
                @else
                <option value="pending" {{ old('status', $status)=='pending' ? 'selected' : 'selected' }}>
                    pending - add/edit quotations
                </option>
                <option value="prepared" {{ old('status', $status)=='prepared' ? 'selected' : 'selected' }}>
                    prepared - approve quotations
                </option>
                <option value="approved by manager" {{ old('status', $status)=='approved by manager' ? 'selected'
                    : 'selected' }}>
                    approved by manager - create purchase order
                </option>
                @endif

            </select>
        </p> --}}
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Batch No</h3>
        <p class="mt-1 text-sm text-gray-500">{{ $accountpayable->batch_no }}</p>
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Request Date</h3>
        <p class="mt-1 text-sm text-gray-500">{{
            Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}</p>
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Due Date</h3>
        <p class="mt-1 text-sm text-gray-500">{{
            Carbon\Carbon::parse($accountpayable->due_date)->format('M d, Y') }}</p>
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Requested By</h3>
        <p class="mt-1 text-sm text-gray-500">{{ $accountpayable->requester->name }}</p>
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Request For</h3>
        <p class="mt-1 text-sm text-gray-500">{{ $accountpayable->request_for }}</p>
    </div>

    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Bank</h3>
        <p class="mt-1 text-sm text-gray-500">{{ $accountpayable->bank }}</p>
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Bank Name</h3>
        <p class="mt-1 text-sm text-gray-500">{{ $accountpayable->bank_name }}</p>
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Bank Account</h3>
        <p class="mt-1 text-sm text-gray-500">{{ $accountpayable->bank_account }}</p>
    </div>
    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">

        <h3 class="text-base font-semibold leading-6 text-gray-900">Particulars</h3>
        <p class="mt-1 text-sm text-gray-500">
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
        </p>
    </div>

    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Uploaded Quotations/Bills</h3>
        <p class="mt-1 text-sm text-gray-500">
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
                            class="font-medium text-indigo-600 hover:text-indigo-500">
                        </a>

                        @elseif($accountpayable->selected_quotation == 'quotation2')

                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                            class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>

                        @elseif($accountpayable->selected_quotation == 'quotation3')

                        <a href="{{ asset('/storage/'.$accountpayable->quotation3) }}" target="_blank"
                            class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>

                        @else
                        <a href="#" class="font-medium text-red-600 hover:text-red-500">No Selected
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
                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
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
                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
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
                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                    @else
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                        Quotation/Bill
                        was uploaded</a>
                    @endif
                </div>
            </li>

        </ul>
        </p>
    </div>



    <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
        <h3 class="text-base font-semibold leading-6 text-gray-900">Uploaded Deposit Slip</h3>
        <p class="mt-1 text-sm text-gray-500">
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
        </p>
    </div>

</div>