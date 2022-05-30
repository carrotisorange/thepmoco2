<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <x-th>AR #</x-th>
            <x-th>Ref #</x-th>
            <x-th>Date collected</x-th>
            <x-th>Mode of Payment</x-th>
            <x-th>Period Covered</x-th>
            <x-th>Amount</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @forelse ($collections as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $item->ar_no }}</x-td>
            <x-td><a href="/tenant/{{ $item->tenant->uuid }}/collections"><b class="text-blue-600">{{
                        $item->tenant->bill_reference_no}}</b></a></x-td>

            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
            </x-td>
            <x-td>{{ $item->mode_of_payment }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
            </x-td>
            <x-td>{{ number_format($item->amount,2) }}</x-td>
            <x-td>
                <x-button onclick="window.location.href='/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export'">
                    <i class="fa-solid fa-download"></i>&nbspExport
                </x-button>
            </x-td>
            @empty
            <x-td>No data found!</x-td>
        </tr>
    </tbody>
    @endforelse
</table>