<x-tenant-portal-layout>
    @section('title', 'Payments')

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Payments</h1>
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
                                    <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

                                    </th>
                                    <th scope="col"
                                        class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                        AR #</th>

                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        DATE APPLIED</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        DATE DEPOSITED</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        MDDE OF PAYMENT</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        CHEQUE NO</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        BANK</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        AMOUNT PAID</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">VIew</span>
                                        <span class="sr-only">Download</span>
                                        <span class="sr-only">Attachment</span>
                                    </th>


                                </tr>
                            </thead>
                            @forelse($collections as $index => $item)
                            <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                <!-- Selected: "bg-gray-50" -->
                                <tr>
                                    <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                        <!-- Selected row marker, only show when row is selected. -->

                                        <input type="checkbox"
                                            class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                    </td>
                                    <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $item->ar_no }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($item->date_deposited)
                                        {{ Carbon\Carbon::parse($item->date_deposited)->format('M d, Y') }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $item->mode_of_payment }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($item->cheque_no)
                                        {{ $item->cheque_no }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($item->bank)
                                        {{ $item->bank }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                    <?php
                                        $collections_count = App\Models\Collection::where('batch_no', $item->collection_batch_no)->count();
                                    ?>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ number_format($item->amount,2) }} ({{ $collections_count }})
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view"
                                            class="text-indigo-600 hover:text-indigo-900">View</a>
                                    </td>

                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export"
                                            class="text-indigo-600 hover:text-indigo-900">Export</a>
                                    </td>

                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        
                                        @if(!$item->attachment == null)\
                                        <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/attachment"
                                            class="text-indigo-600 hover:text-indigo-900">Export</a>
                                            @endif
                                    </td>


                                </tr>
                                @empty
                                <tr>
                                    <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">No
                                        bills
                                        found.</td>
                                </tr>

                            </tbody>
                            @endforelse
                            <tr>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                <?php
                                    $property_collections_count = App\Models\Collection::where('tenant_uuid', $item->tenant_uuid)->count();
                                ?>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                               {{ number_format($collections->sum('amount'), 2) }} ({{ $property_collections_count }})
                                </td>
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