<div>
    <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
        <div class="bg-gray-100 mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-1 md:gap-6">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="grid grid-cols-2 gap-6">

                        <div class="col-span-6">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Select a
                                particular</label>
                            <select wire:model.lazy="particular_id" autocomplete="particular_id"
                                class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Select one</option>
                                @foreach ($particulars as $particular)
                                <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                                    particular_id?
                                    'selected': 'Select one'
                                    }}>{{ $particular->particular }}</option>
                                @endforeach
                            </select>
                            @error('particular_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-1">
                            <label for="start" class="block text-sm font-medium text-gray-700">Start of the
                                contract</label>
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

                        <div class="col-span-6">
                            <label for="bill" class="block text-sm font-medium text-gray-700">Amount of the bill</label>
                            <input type="number" step="0.001" wire:model.lazy="bill" autocomplete="bill"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            @error('bill')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-10">
                <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/contracts">
                    Finish
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
                    Save
                </button>
            </div>
        </div>
    </form>
    <div class="mb-10">
        @if($bills->count())
            <table class="min-w-full table-fixed">
                <thead class="">
                    <tr>
                        <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">
            
                        </th>
                        <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">BILL #
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">DATE
                            POSTED</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TENANT
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">UNIT</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PERIOD
                            COVERED</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">PARTICULAR
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">AMOUNT DUE
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">AMOUNT
                            PAID</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">BALANCE
            
                    </tr>
                </thead>
                @forelse ($bills as $item)
                <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                    <!-- Selected: "bg-gray-50" -->
                    <tr>
                        <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                            <!-- Selected row marker, only show when row is selected. -->
                            {{--
                            <input type="checkbox"
                                class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                            --}}
                        </td>
                        <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                        <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                            {{ $item->bill_no}}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-purple-700">
                            <a class="text-blue-500 text-decoration-line: underline"
                                href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}/bills">
                                {{ $item->tenant->tenant}}
                            </a>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-purple-700">
                            <a class="text-blue-500 text-decoration-line: underline"
                                href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}/bills">
                                {{ $item->unit->unit}}
                            </a>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ Carbon\Carbon::parse($item->start)->format('M d,
                            y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $item->particular->particular}}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ number_format($item->bill, 2) }}
            
                            @if($item->status === 'paid')
                            <span title="paid"
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                <i class="fa-solid fa-circle-check"></i>
                            </span>
                            @elseif($item->status === 'partially_paid')
                            <span title="partially_paid"
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                <i class="fa-solid fa-clock"></i>
                            </span>
                            @else
                            <span title="unpaid" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </span>
                            @endif
            
                            @if($item->description === 'movein charges' && $item->status==='unpaid')
                            <span title="urgent"
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                <i class="fa-solid fa-bolt"></i>
                            </span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">
                            {{ number_format($item->initial_payment, 2) }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">
                            {{ number_format(($item->bill-$item->initial_payment), 2) }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">No bills found!</td>
                    </tr>
            
                    <!-- More people... -->
                </tbody>
                @endforelse
            
                <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                    <tr>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                            number_format($bills->sum('bill'), 2) }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                            number_format($bills->sum('initial_payment'), 2) }}</td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                            number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }}</td>
                    </tr>
                </tbody>
            </table>
            @endif
    </div>
</div>