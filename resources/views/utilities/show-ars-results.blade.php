<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <x-th>AR #</x-th>
            <x-th>Date of Payment</x-th>
            <x-th>Tenant</x-th>
            {{-- <x-th>Reference #</x-th> --}}
           
            <x-th>Mode of Payment</x-th>
            <x-th>Amount Paid</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($ars as $ar)
        <tr>
            <x-td>{{ $ar->ar_no }}</x-td>
            {{-- <x-td><a href="/tenant/{{ $ar->tenant->uuid }}/ars"><b class="text-blue-600">{{
                        $ar->tenant->bill_reference_no}}</b></a></x-td> --}}
            <?php
                $tenant = App\Models\Tenant::find($ar->tenant_uuid)->tenant;
                //$unit = App\Models\Unit::find($ar->unit_uuid)->unit
            ?>
            <x-td>{{ Carbon\Carbon::parse($ar->created_at)->format('M d, Y') }}
            <x-td><a href="/tenant/{{ $ar->tenant->uuid }}/ars"><b class="text-blue-600">{{ $tenant }}</b></a>
            </x-td>
           
            </x-td>
            <x-td>{{ $ar->mode_of_payment }}</x-td>
            <?php
                $collections_count = App\Models\Collection::where('batch_no', $ar->collection_batch_no)->count();
            ?>
            <x-td>{{ number_format($ar->amount,2) }} ({{ $collections_count }})</x-td>
            <x-td>
                <x-button onclick="window.location.href='/tenant/{{ $ar->tenant_uuid }}/ar/{{ $ar->id }}/export'">
                    <i class="fa-solid fa-download"></i>&nbspExport
                </x-button>
            </x-td>
            @empty
            <x-td>No data found!</x-td>
        </tr>
        @endforelse
        <tr>
            <x-td>Total</x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <?php
                $property_collections_count = App\Models\Collection::where('property_uuid', Session::get('property'))->count();
            ?>
            <x-td>{{ number_format($ars->sum('amount'), 2) }} ({{ $property_collections_count }})</x-td>
            <x-td></x-td>

        </tr>
    </tbody>
</table>