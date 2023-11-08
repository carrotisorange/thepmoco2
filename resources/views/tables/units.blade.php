<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>UNIT</x-th>
            <x-th>STATUS</x-th>
            <x-th>CATEGORY</x-th>
            <x-th>FLOOR</x-th>
            <x-th>RENT/MONTH/TENANT</x-th>
            <x-th>OCCUPANCY</x-th>
            <x-th>TENANT</x-th>
            <x-th>OWNER</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($units as $index => $unit)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                @if(Session::get('tenant_uuid'))
                <x-link-component link="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/tenant/{{ Session::get('tenant_uuid') }}/contract/{{ Str::random(8) }}/create">
                   {{ $unit->unit }}
                </x-link-component>
                @elseif(Session::get('owner_uuid'))
                <x-link-component
                    link="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/owner/{{ Session::get('owner_uuid') }}/deed_of_sale/{{ Str::random(8) }}/create">
                    {{ $unit->unit }}
                </x-link-component>
                @else
                <x-link-component link="/property/{{ $unit->property_uuid }}/unit/{{ $unit->uuid }}">
                    {{ $unit->unit }}
                </x-link-component>
                @endif
            </x-td>
            <x-td>{{ $unit->status->status}}</x-td>
            <x-td>{{ $unit->category->category }}</x-td>
            <x-td>{{ $unit->floor->floor }}</x-td>
            <x-td>{{ number_format($unit->rent, 2) }}</x-td>
            <x-td>{{$unit->occupancy }} pax</x-td>
            <x-td>
                @if($unit->contracts->count())
                    @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $tenant)
                    <x-link-component link="/property/{{ $unit->property_uuid }}/tenant/{{ $tenant->tenant->uuid }}">
                       {{ $tenant->tenant->tenant }}
                    </x-link-component>
                    @endforeach
                @else
                    NA
                @endif
            </x-td>
            <x-td>
                @if($unit->deed_of_sales->count())
                    @foreach ($unit->deed_of_sales->where('status','!=','inactive')->take(1) as $owner)
                    <x-link-component link="/property/{{ $unit->property_uuid }}/owner/{{ $owner->owner->uuid }}">
                        {{ $owner->owner->owner }}
                    </x-link-component>
                    @endforeach
                @else
                    NA
                @endif
            </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
