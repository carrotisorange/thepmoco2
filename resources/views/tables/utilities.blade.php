<form wire:submit.prevent="updateForm()">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <x-th>#</x-th>
            <x-th>UNIT # </x-th>
            <x-th>START DATE</x-th>
            <x-th>END DATE </x-th>
            <x-th>PREVIOUS READING</x-th>
            <x-th>CURRENT READING</x-th>
            <x-th>KW/H</x-th>
            <x-th>MIN CHARGE</x-th>
            <x-th>AMOUNT DUE</x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($units as $index => $item)
        <tr>
            <x-th>
                {{ $index+1 }}
            </x-th>
            <x-td>
               <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/unit/{{ $item->unit }}/bills">
                    {{ $item->unit }}
                </a>
            </x-td>
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
                {{ number_format($item->current_readding, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->kwh, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->min_charge, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->total_amount_due, 2) }}
            </x-td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>UNIT # </x-th>
            <x-th>START DATE</x-th>
            <x-th>END DATE </x-th>
            <x-th>PREVIOUS READING</x-th>
            <x-th>CURRENT READING</x-th>
            <x-th>KW/H</x-th>
            <x-th>MIN CHARGE</x-th>
            <x-th>AMOUNT DUE</x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($utilities as $item)
        <tr>
            <x-td>
                {{ $item->unit->unit }}
            </x-td>
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
                {{ number_format($item->current_readding, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->kwh, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->min_charge, 2) }}
            </x-td>
            <x-td>
                {{ number_format($item->total_amount_due, 2) }}
            </x-td>
        </tr>
        @endforeach
    </tbody>
</table> --}}