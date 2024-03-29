<x-table-component>
<x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Guest</x-th>
            <x-th>Unit</x-th>
            <x-th>Mobile</x-th>
            <x-th>Email</x-th>
            <x-th>Status</x-th>
            <x-th>Checkin</x-th>
            <x-th>Checkout</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($guests as $index => $item)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <x-link-component link="/property/{{ Session::get('property_uuid') }}/guest/{{ $item->uuid }}">
                    {{ $item->guest }}
                </x-link-component>
            </x-td>
            <x-td>
                <x-link-component link="/property/{{ Session::get('property_uuid') }}/unit/{{ $item->unit_uuid }}">
                    {{ $item->unit->unit }}
                </x-link-component>
            </x-td>
            <x-td>{{ $item->mobile_number }}</x-td>
            <x-td>{{ $item->email }}</x-td>
            <?php
                $start = strtotime($item->movein_at); // convert to timestamps
                $end = strtotime($item->moveout_at); // convert to timestamps
                $days = (int)(($end - $start)/86400)
            ?>
            <x-td>{{ $item->status }}</x-td>
            <x-td>
                {{Carbon\Carbon::parse($item->movein_at)->format('M d, Y')}} @ {{
                Carbon\Carbon::parse($item->arrival_time)->format('H:i:s') }}
            </x-td>
            <x-td>
                {{Carbon\Carbon::parse($item->moveout_at)->format('M d, Y')}} @ {{
                Carbon\Carbon::parse($item->departure_time)->format('H:i:s') }}
            </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
