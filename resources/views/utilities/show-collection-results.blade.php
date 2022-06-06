<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <x-th>AR #</x-th>
            <x-th>Tenant</x-th>
            {{-- <x-th>Reference #</x-th> --}}
            <x-th>Date of Payment</x-th>
            <x-th>Mode of Payment</x-th>
            <x-th>Amount Paid</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @forelse ($collections as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $item->ar_no }}</x-td>
            {{-- <x-td><a href="/tenant/{{ $item->tenant->uuid }}/collections"><b class="text-blue-600">{{
                        $item->tenant->bill_reference_no}}</b></a></x-td> --}}
            <?php
                $tenant = App\Models\Tenant::find($item->tenant_uuid)->tenant;
                //$unit = App\Models\Unit::find($item->unit_uuid)->unit
            ?>
           <x-td><a href="/tenant/{{ $item->tenant->uuid }}/collections"><b class="text-blue-600">{{ $tenant }}</b></a></x-td>           
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
            </x-td>
            <x-td>{{ $item->mode_of_payment }}</x-td>
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