<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <x-th>
                <x-input id="" wire:model="selectAll" type="checkbox" />
            </x-th>
            <x-th>#</x-th>
            <x-th>Reference #</x-th>
            <x-th>Date posted</x-th>
            <x-th>Period Covered</x-th>
            <x-th>Particular</x-th>
            <x-th>Amount Due</x-th>
            {{-- <x-th>Status</x-th> --}}
            <x-th>Amount Paid</x-th>
            <x-th>Balance</x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($bills as $item)
        <tr>
            <x-td>
                <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
            </x-td>
            <x-td>{{ $item->bill_no}}</x-td>
            <x-td><a href="/tenant/{{ $item->tenant->uuid }}/bills"><b class="text-blue-600">{{
                        $item->reference_no}}</b></a>

                {{-- <div x-data="{ hover: false }">
                    <span x-on:mouseover="hover = true" x-on:mouseout="hover = false" class="text-blue-600">More
                        info</span>
                    <span x-show="hover">{{ $item->tenant->tenant }} - {{ $item->unit->unit? $item->unit->unit: 'NA'
                        }}</span>
                </div> --}}
            </x-td>
            {{-- <x-td>{{ $item->tenant->tenant}}</x-td> --}}

            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}</x-td>
            {{-- <x-td>{{ $item->unit }}</x-td> --}}
            <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}</x-td>
            <x-td>{{ $item->particular->particular}}</x-td>
            <x-td>{{ number_format($item->bill, 2) }}
                @if($item->status === 'paid')
                <span title="paid"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                @elseif($item->status === 'partially_paid')
                <span title="partially_paid"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-clock"></i>
                </span>
                @else
                <span title="unpaid" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                @endif
            </x-td>
            {{-- <x-td>

            </x-td> --}}
            <x-td>{{ number_format($item->initial_payment, 2) }}</x-td>
            <x-td>{{ number_format(($item->bill-$item->initial_payment), 2) }}</x-td>
        </tr>
        @empty
        <tr>
            <x-td>No data found!</x-td>
        </tr>
        @endforelse
    </tbody>
</table>