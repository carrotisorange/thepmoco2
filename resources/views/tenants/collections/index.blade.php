<x-index-layout>
    @section('title', '| Payments')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $tenant->tenant }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Payments</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}'">
            Go back to tenant
        </x-button>

    </x-slot>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <x-th>AR #</x-th>
                {{-- <x-th>Unit</x-th> --}}

                <x-th>Date of payment</x-th>

                {{-- <x-th>Bill ID</x-th> --}}

                <x-th>Mode of payment</x-th>
                {{-- <x-th>Period Covered</x-th> --}}
                <x-th>Amount</x-th>
                <x-th></x-th>
            </tr>
        </thead>
        @forelse ($collections as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $item->ar_no }}</x-td>
                {{-- <x-td>

                    <div class="text-sm text-gray-900">{{
                        $item->unit->unit}}
                    </div>
                    <div class="text-sm text-gray-500">{{
                        $item->unit->building->building}}
                    </div>
                </x-td> --}}

                <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y')
                    }}</x-td>
                {{-- <x-td>{{ $item->bill_id }}</x-td> --}}

                <x-td>{{ $item->mode_of_payment }}</x-td>
                {{-- <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                    Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                </x-td> --}}
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
                </x-td>
                @empty
                <x-td>No data found!</x-td>
            </tr>
        </tbody>
        @endforelse
    </table>
</x-index-layout>