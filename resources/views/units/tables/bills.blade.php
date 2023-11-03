@if($bills->count())
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>

            <x-th>Bill #</x-th>
            <x-th>Name</x-th>
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
            <x-td>{{ $index+1 }}</x-td>

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
            <x-td>{{ number_format(App\Models\Collection::where('bill_id', $item->id)->posted()->sum('collection'), 2)
                }}</x-td>
            <x-td>{{ number_format(($item->bill-App\Models\Collection::where('bill_id',
                $item->id)->posted()->sum('collection')),
                2) }}</x-td>
        </tr>
        @endforeach
        <tr>
            <x-td>Total</x-td>

            <x-td></x-td>
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
<div class="mt-10 text-center mb-10">
  <i class="fa-solid fa-circle-plus"></i>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No bills</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/bill/{{ 'property' }}'/{{ Session::get('property_uuid') }}">
            New bill
        </x-button>
    </div>
</div>
@endif
