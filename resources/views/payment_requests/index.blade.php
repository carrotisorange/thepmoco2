<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div>
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-700">Verify Payments</h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                        <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/collection/{{ 'pending' }}'">
                            Show Pending</x-button>

                            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/collection/{{ 'approved' }}'">
                                Show Approved</x-button>

                                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/collection/{{ 'declined' }}'">
                                    Show Declined</x-button>

                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


                </div>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                            </div>
                            <table class="min-w-full table-fixed">
                                <thead class="">
                                    <tr>
                                        <x-th>
                                                        #</x-th>

                                        <x-th>
                                            TENANT</x-th>
                                        <x-th>
                                            BILL #</x-th>

                                        <x-th>
                                            DATE UPLOADED</x-th>
                                        <x-th>
                                            DATE APPROVED</x-th>
                                        <x-th>
                                            AMOUNT</x-th>
                                        <x-th>
                                            MODE OF PAYMENT</x-th>

                                        <x-th>
                                            STATUS</x-th>
                                            <x-th>
                                                REMARKS</x-th>
                                        <x-th>
                                            </x-th>


                                    </tr>
                                </thead>


                                <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                    <!-- Selected: "bg-gray-50" -->
                                    @forelse($requests as $index => $item )
                                    <tr>
                                        <x-td>
                                           {{ $index+1 }}
                                       </x-td>
                                       <x-td>
                                            <a title="tenant" target="_blank" class="text-blue-500 text-decoration-line: underline"
                                                href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}">
                                                {{ Str::limit($item->tenant,20) }} </a>
                                       </x-td>

                                       <x-td>
                                            {{ $item->bill_nos }}
                                       </x-td>
                                        <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->

                                       <x-td>
                                            {{ Carbon\Carbon::parse($item->date_uploaded)->format('M d, Y') }}
                                       <x-td>
                                            @if($item->date_approved)
                                            {{ Carbon\Carbon::parse($item->date_approved)->format('M d, Y') }}
                                                @else
                                            NA
                                            @endif
                                       </x-td>
                                       <x-td>
                                            {{ number_format($item->amount, 2) }}
                                       </x-td>

                                       <x-td>
                                            {{ $item->mode_of_payment }}
                                       </x-td>

                                       <x-td>
                                            {{ $item->payment_status }}
                                       </x-td>

                                       <x-td>
                                            @if($item->reason_for_rejection)
                                                {{ $item->reason_for_rejection }}
                                            @else
                                                NA
                                            @endif

                                       </x-td>

                                        <td
                                            class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">
                                           @if($item->payment_status != 'approved')
                                            <a target="_blank"
                                                href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant_uuid }}/payment_requests/{{ $item->id }}">
                                                Review
                                            </a>
                                           @endif
                                       </x-td>



                                    </tr>
                                    @empty
                                    <tr>
                                        <x-td >
                                            No
                                            data
                                            found.</x-td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</x-new-layout>
