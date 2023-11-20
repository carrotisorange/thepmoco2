<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Tenant</x-th>
            <x-th>UNIT</x-th>
            <x-th>AMOUNT</x-th>

        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($delinquents as $index => $item)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <x-link-component link="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant_uuid }}/bills/">
                    {{ $item->tenant }}
                </x-link-component>
            </x-td>
            <x-td>
              {{-- @if($item->tenant->uuid)
                    @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $tenant)
                    <x-link-component link="/property/{{ $unit->property_uuid }}/tenant/{{ $tenant->tenant->uuid }}">
                       {{ $tenant->tenant->tenant }}
                    </x-link-component>
                    @endforeach
                @else
                    NA
                @endif --}}
            </x-td>
            <x-td>
                {{number_format($item->totalBill,2)}}
            </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
