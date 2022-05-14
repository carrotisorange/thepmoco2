<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <x-th>
                <x-input id="" wire:model="selectAll" type="checkbox" />
            </x-th>
            <x-th>Ref #</x-th>
            <x-th>Bill #</x-th>
          
            {{-- <x-th>Tenant</x-th> --}}
            <x-th>Date posted</x-th>
            <x-th>Period Covered</x-th>
           
            <x-th>Particular</x-th>
            <x-th>Amount</x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($bills as $item)
        <tr>
            <x-td><x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" /></x-td>
          
 
            <x-td><a href="/tenant/{{ $item->tenant->uuid }}/bills"><b class="text-blue-600">{{ $item->reference_no}}</b></a>
                <x-td>{{ $item->bill_no}}</x-td>
                {{-- <div x-data="{ hover: false }">
                    <span x-on:mouseover="hover = true" x-on:mouseout="hover = false" class="text-blue-600">More info</span>
                    <span x-show="hover">{{ $item->tenant->tenant }} - {{ $item->unit->unit? $item->unit->unit: 'NA' }}</span>
                </div> --}}
            </x-td>
            {{-- <x-td>{{ $item->tenant->tenant}}</x-td> --}}

            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
            {{-- <x-td>{{ $item->unit }}</x-td> --}}
            <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}</x-td>
            <x-td>{{ $item->particular->particular}}</x-td>
            <x-td>{{ number_format($item->bill, 2) }}</x-td>
        </tr>
        @empty
        <tr>
            <x-td>No data found!</x-td>
        </tr>
        @endforelse
    </tbody>
</table>