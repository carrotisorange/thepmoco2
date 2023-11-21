<x-table-component>
    <x-table-head-component>
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
    </x-table-head-component>
    <x-table-body-component>
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

                <td class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">
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
            <x-td>
                No
                data
                found.</x-td>
        </tr>
        @endforelse

    </x-table-body-component>
</x-table-component>
