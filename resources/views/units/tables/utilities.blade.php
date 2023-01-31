<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>UTILITY</x-th>
            <x-th>START</x-th>
            <x-th>END </x-th>
            <x-th>PREVIOUS READING</x-th>
            <x-th>CURRENT READING</x-th>
            <x-th>CONSUMPTION</x-th>
            <x-th>RATE</x-th>
            <x-th>MIN CHARGE</x-th>
            <x-th>AMOUNT DUE</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($utilities as $index => $item)
        <tr>
            <x-th>
                {{ $item->unit->unit.'-'.$item->id }}
            </x-th>
            <x-td>{{ $item->type }}</x-td>

            <x-td>
                {{ Carbon\Carbon::parse($item->start_date)->format('M d, y') }}
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($item->end_date)->format('M d, y') }}
            </x-td>
            <x-td>
                {{ number_format($item->previous_reading, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->current_reading, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->current_reading - $item->previous_reading, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->kwh, 2) }}
                @if($item->type === 'electric')
                kwH
                @else
                cum
                @endif

            </x-td>
            <x-td>
                {{ number_format($item->min_charge, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->total_amount_due,2) }}
            </x-td>
            <x-td>
                {{ $item->status }}
            </x-td>
            <x-td>
                @if($item->status === 'unbilled')


                <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/tenant/utility/{{ $item->id }}"
                    class="text-indigo-500 text-decoration-line: underline">Bill to tenant</a>
|
                <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/owner/utility/{{ $item->id }}"
                    class="text-indigo-500 text-decoration-line: underline">Bill to owner</a>

                @endif
            </x-td>
        </tr>
        @endforeach
    </tbody>
</table>