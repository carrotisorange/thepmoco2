<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>AR #</x-th>
            <x-th>Date applied</x-th>
            <x-th>Date deposited</x-th>
            <x-th>Mode of payment</x-th>
            <x-th>Amount</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @forelse ($collections as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $item->ar_no }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
            <x-td>
                @if($item->date_deposited)
                {{ Carbon\Carbon::parse($item->date_deposited)->format('M d, Y') }}
                @else
                NA
                @endif
            </x-td>
            <x-td>
                <div class="text-sm text-gray-900">
                    {{ $item->mode_of_payment }}
                </div>
                <div class="text-sm text-gray-500">
                    {{ $item->cheque_no }} {{ $item->bank }}
                </div>

            </x-td>
            <x-td>{{ number_format($item->amount,2) }}</x-td>
            <x-td>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view'">
                    View
                </x-button>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export'">
                    Export
                </x-button>
                @if(!$item->attachment == null)
                <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/attachment'"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    Attachment
                </button>
                @endif
            </x-td>
            @empty
            <x-td>No data found!</x-td>
        </tr>
        @endforelse
    </tbody>
</table>