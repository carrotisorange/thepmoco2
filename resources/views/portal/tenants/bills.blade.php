<x-tenant-portal-layout>
    @section('title', 'Bills')

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Bills</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                {{-- <button type="button"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export
                    Contract</button> --}}

            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
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

                            @forelse ($bills as $index => $item)
                            <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                <!-- Selected: "bg-gray-50" -->
                                <tr>
                                    <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                        <!-- Selected row marker, only show when row is selected. -->

                                        <input type="checkbox"
                                            class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
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
                                                href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}">
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
                                        {{ number_format($item->initial_payment, 2) }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">
                                        {{ number_format(($item->bill-$item->initial_payment), 2) }}
                                    </td>


                                </tr>
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
                                    number_format($bills->sum('bill'), 2) }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    number_format($bills->sum('initial_payment'), 2) }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }}</td>
                            </tr>

                        </table>
                    </div>

                    {{-- <button type="button"
                        class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                        All</button> --}}
                </div>
            </div>
        </div>

        {{-- <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            {{ $collections->links() }}
        </div> --}}
    </div>
</x-tenant-portal-layout>