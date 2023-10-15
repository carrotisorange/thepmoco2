<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="">
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
    </thead>
    @foreach ($guests as $index => $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>

            <x-td><a href="/property/{{ Session::get('property_uuid') }}/guest/{{ $item->uuid }}"
                    class="text-indigo-500 text-decoration-line: underline">{{ $item->guest }}</a></x-td>
            <x-td><a href="/property/{{ Session::get('property_uuid') }}/unit/{{ $item->unit_uuid }}"
                    class="text-indigo-500 text-decoration-line: underline">{{ $item->unit->unit }}</a></x-td>
            <x-td>{{ $item->mobile_number }}</x-td>
            <x-td>{{ $item->email }}</x-td>
            <?php
                $start = strtotime($item->movein_at); // convert to timestamps
                $end = strtotime($item->moveout_at); // convert to timestamps
                $days = (int)(($end - $start)/86400)
            ?>
            {{-- <x-td>{{ number_format($item->price, 2) }} ({{ $days }} night/s)</x-td> --}}
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
    </tbody>
    @endforeach
</table>
