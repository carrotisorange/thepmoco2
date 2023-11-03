<div>

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Bills</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button
                    onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/payments/pending'">
                    View Pending Payments
                </x-button>

                @if($selectedBills)
                <x-button wire:click="payBills">
                    Pay Bills
                </x-button>
                @endif

            </div>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-4">

                @if( $selectedBills)

                <p class="mt-2 text-sm text-gray-500">
                    You've selected {{ count($selectedBills) }} {{ Str::plural('bill', count($selectedBills))}}
                    amounting to {{ number_format($total) }}...
                </p>
                @else
                <p class="mt-2 text-sm text-gray-500">
                    Please select the bills you want to pay.
                </p>
                @endif
            </div>


            <div class="sm:col-span-2">
                <x-form-select id="small" wire:model="status">
                    <option value="">Select a status</option>
                    @foreach ($statuses as $item)
                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                    @endforeach
                </x-form-select>

            </div>


        </div>
        <div class="mt-3 flex flex-col">
            <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div class="mb-10 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <table class="min-w-full table-fixed">

                            <thead class="">
                                <tr>
                                    <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">

                                    </th>
                                    <th scope="col"
                                        class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                        BILL #</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        DATE POSTED</th>


                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        UNIT</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        PERIOD COVERED</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        PARTICULAR</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        AMOUNT DUE</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        AMOUNT PAID</th>

                                    </th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        BALANCE</th>

                                    </th>
                                </tr>
                            </thead>

                            @forelse ($bills as $item)
                            <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                <!-- Selected: "bg-gray-50" -->
                                @if($item->particular_id != '71' && $item->particular_id != '72')
                                <tr>
                                    <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                        @if(!App\Models\Collection::where('bill_id',
                                        $item->id)->posted()->sum('collection'))
                                        <x-input name="" type="checkbox" wire:model="selectedBills"
                                            value="{{ $item->id }}" />
                                        @endif
                                    </td>
                                    <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium"> <a
                                            href="tenantbills_detail" class="text-purple-900">{{ $item->bill_no}}</a>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        Carbon\Carbon::parse($item->created_at)->format('M d, y') }}</td>


                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if(auth()->user()->role_id == '8')
                                        {{ $item->unit->unit }}
                                        @else
                                        <div class="text-sm text-gray-900">
                                            <a class="text-blue-800 font-bold"
                                                href="/property/{{ Session::get('property_uuid') }}/unit/{{ $item->unit->uuid }}">
                                                {{ $item->unit->unit }}
                                            </a>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ Carbon\Carbon::parse($item->start)->format('M d,
                                        y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{-- @if($item->particular_id === 1)
                                        Due to unit owner
                                        @else --}}
                                        {{ $item->particular->particular}}
                                        {{-- @endif --}}

                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

                                        {{-- $marketing_fee = App\Models\Bill::where('particular_id',
                                        '71')->where('bill_id',$item->id)->posted()->pluck('bill')->last();
                                        $management_fee = App\Models\Bill::where('particular_id',
                                        '72')->where('bill_id',$item->id)->posted()->pluck('bill')->last();

                                        $other_fees = $marketing_fee + $management_fee --}}


                                        {{ number_format($item->bill, 2) }}



                                        @if(App\Models\Collection::where('bill_id',
                                        $item->id)->posted()->sum('collection'))
                                        <span title="paid"
                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </span>
                                        @else
                                        <span title="unpaid"
                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
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
                                        {{ number_format(App\Models\Collection::where('tenant_uuid',
                                        $item->tenant_uuid)->where('bill_id',
                                        $item->id)->posted()->sum('collection'), 2) }}
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">

                                        {{ number_format((($item->bill)-App\Models\Collection::where('tenant_uuid',
                                        $item->tenant_uuid)->where('bill_id',$item->id)->posted()->sum('collection')),
                                        2) }}
                                    </td>


                                </tr>
                                @endif
                            </tbody>
                            @empty
                            <tr>
                                <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">No bills
                                    found.</td>
                            </tr>
                            @endforelse
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>

                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>

                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    number_format(App\Models\Bill::where('tenant_uuid',
                                    $item->tenant_uuid)->posted()->sum('bill'), 2) }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    number_format(App\Models\Collection::where('tenant_uuid',
                                    $item->tenant_uuid)->posted()->sum('collection'), 2) }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    number_format((App\Models\Bill::where('tenant_uuid',
                                    $item->tenant_uuid)->posted()->sum('bill')-App\Models\Collection::where('tenant_uuid',
                                    $item->tenant_uuid)->posted()->sum('collection')), 2) }}</td>
                            </tr>

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
