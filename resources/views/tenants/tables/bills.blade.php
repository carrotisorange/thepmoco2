@if($bills->count())

<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            {{-- <x-th>

            </x-th> --}}
            <x-th>Bill #</x-th>
            <x-th>Tenant</x-th>
            <x-th>Particular</x-th>
            <x-th>Period</x-th>
            <x-th>Amount Due</x-th>

            <x-th>Amount Paid</x-th>
            <x-th>Balance</x-th>
            {{-- <x-th></x-th> --}}
        </tr>
    </thead>
    @foreach ($bills as $index => $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            {{-- <x-td>
                @if($item->status != 'paid')
                <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                @endif
            </x-td> --}}
            <x-td>{{ $item->bill_no }}</x-td>
            <x-td>
                @if($item->tenant_uuid)
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}"
                    class="text-purple-500 text-decoration-line: underline">{{ $item->tenant->tenant }}</a>
                @elseif($item->owner_uuid)
                <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}"
                    class="text-purple-500 text-decoration-line: underline">{{ $item->owner->owner }}</a>
                @endif
            </x-td>
            <x-td>{{$item->particular->particular }}</x-td>
            <x-td>{{Carbon\Carbon::parse($item->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}</x-td>
            <x-td>{{number_format($item->bill,2) }}
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
        @endforeach
        <tr>
            <x-td>Total</x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td>{{number_format($bills->sum('bill'),2) }}</x-td>
            <x-td>{{number_format($bills->sum('initial_payment'),2) }}</x-td>
            <x-td>{{number_format($bills->sum('bill') - $bills->sum('initial_payment') ,2) }}</x-td>
        </tr>
    </tbody>
</table>


@else
<div class=" mt-10 text-center mb-10 ">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No bills</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/bills'"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            <!-- Heroicon name: mini/plus -->
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path
                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
            Add your first bill
        </button>
    </div>
</div>
@endif