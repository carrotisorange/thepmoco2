<div>
    <div class="mx-10">
        @can('accountownerandmanager')
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Liquidation Details</h1>

                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Batch No
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayableliquidation->batch_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Date
                                        Requested
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        Carbon\Carbon::parse($accountpayableliquidation->created_at)->format('M d, Y')
                                        }}</td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Prepared
                                        by
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        App\Models\User::find($accountpayableliquidation->prepared_by)->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Name
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        $accountpayableliquidation->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Department/Section
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        $accountpayableliquidation->department }}</td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Unit
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($accountpayableliquidation->unit_uuid)
                                        {{ App\Models\Unit::find($accountpayableliquidation->unit_uuid)->unit }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Approved
                                        by
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($accountpayableliquidation->approved_by)
                                        {{ App\Models\User::find($accountpayableliquidation->approved_by)->name }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Particulars</h1>
                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">#
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Unit</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Vendor
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">OR
                                        Number
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Item</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Amount
                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($particulars as $index => $particular)
                                <tr>
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        {{ $index+1 }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($particular->vendor_id)
                                        {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($particular->unit_uuid)
                                        {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $particular->or_number }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $particular->item }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $particular->quantity }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ number_format($particular->price, 2) }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ number_format($particular->total, 2) }}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Total
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        {{
                                        number_format($particulars->sum('total'),2) }}
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mt-2 flex justify-end">
                <div>
                    <p class="mt-5 px-6 text-right">
                        @if($accountpayableliquidation->approved_by)
                        <x-button disabled>
                            Liquidation has been approved.
                        </x-button>
                        @else
                        <x-button wire:target="approveLiquidation"
                            onclick="window.location.href='/property/{{ $property->uuid }}/rfp'">
                            Cancel
                        </x-button>
                        <x-button wire:click="approveLiquidation">
                            Approve
                        </x-button>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        @else
        <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8">
            <div class="text-center">
                {{-- <p class="text-base font-semibold text-indigo-600"></p> --}}
                <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl"><i
                        class="fa-solid fa-hourglass-start"></i></h1>
                <p class="mt-6 text-base leading-7 text-gray-600">The request has been sent to the manager.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="/property/{{ $accountpayable->property_uuid }}/rfp"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Create another liquidation
                    </a>
                    <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/liquidation/step-1"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Edit Liquidation
                    </a>
                    <a href="/property/{{ $accountpayable->property_uuid }}/rfp/{{ $accountpayable->id }}/liquidation/{{ $accountpayable->batch_no }}/export"
                        target="_blank"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Export Liquidation
                    </a>
                </div>
            </div>
        </main>
        @endcannot
    </div>
</div>
