@if($utilities->count())
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
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($utilities as $index => $item)
        <tr>
            <x-th>
                {{ $index+1 }}
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
        </tr>
        @endforeach
    </tbody>
</table>

@else
<div class="mt-10 text-center mb-10">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No utilities</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property') }}/utilities'"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            <!-- Heroicon name: mini/plus -->
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path
                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
            Add your first utilities
        </button>
    </div>
</div>
@endif
