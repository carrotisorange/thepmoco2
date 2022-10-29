<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>Bill #</x-th>
            <x-th>Date posted</x-th>
            <x-th>Tenant</x-th>
            <x-th>Unit</x-th>
            <x-th>Period Covered</x-th>
            <x-th>Particular</x-th>
            <x-th>Amount Due</x-th>
            <x-th>Amount Paid</x-th>
            <x-th>Balance</x-th>
        </tr>
    </thead>
    @forelse ($bills as $index => $item)
  <tbody class="bg-white divide-y divide-gray-200">
        <tr>

            {{-- <x-td>{{ $index + $bills->firstItem() }}</x-td> --}}
            <x-td>{{ $item->bill_no}}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}</x-td>
            <x-td>
                @if(auth()->user()->role_id == '8')
                {{ $item->tenant->tenant }}
                @else
                <div class="text-sm text-gray-900">
                    <a class="text-blue-800 font-bold"
                        href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}">
                        {{ $item->tenant->tenant }}
                    </a>
                </div>
                @endif


                <div class="text-sm text-gray-500">{{
                    $item->tenant->type}}
                </div>
            </x-td>
            <x-td>
                @if(auth()->user()->role_id == '8')
                {{ $item->unit->unit }}
                @else
                <a class="text-blue-800 font-bold"
                    href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}">
                    {{ $item->unit->unit }}
                </a>
                @endif

            </x-td>
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

                @if($item->description === 'movein charges' && $item->status==='unpaid')
                <span title="urgent"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-bolt"></i>
                </span>
                @endif

            </x-td>
            <x-td>{{ number_format($item->initial_payment, 2) }}</x-td>
            <x-td>{{ number_format(($item->bill-$item->initial_payment), 2) }}</x-td>
        </tr>
        @empty
        <x-td>No data found..</x-td>
        @endforelse
    </tbody>
</table>