<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            @if($isPaymentAllowed)
            <x-th></x-th>
            @endif
            <x-th>REFERENCE #</x-th>
            <x-th>DATE POSTED</x-th>
            <x-th>NAME</x-th>
            <x-th>UNIT</x-th>
            <x-th>PERIOD COVERED</x-th>
            <x-th>PARTICULAR</x-th>
            <x-th>AMOUNT DUE</x-th>
            <x-th>AMOUNT PAID</x-th>
            <x-th>BALANCE </x-th>
        </tr>
    </thead>
    @if($view === 'listView')
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($bills as $index => $item)
        <tr>
            @if($isPaymentAllowed)
            <x-th>
                @if($item->status != 'paid')
                <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                @endif
            </x-th>
            @endif
            <x-td>{{ $item->unit->unit.'-'.$item->bill_no}}</x-td>

            <x-td>
                {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
            </x-td>
            <x-td>
                @if($item->tenant_uuid)
                <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/bills">{{
                    $item->tenant->tenant}}</a> (T)
                @elseif($item->owner_uuid)
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}/bills">{{
                    $item->owner->owner}}</a> (O)
                @endif
            </x-td>
            <x-td>
                <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}/bills">
                    {{ $item->unit->unit}}
                </a>
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($item->start)->format('M d,
                y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}
            </x-td>
            <x-td>
                {{ $item->particular->particular}}
            </x-td>
            <x-td>
                {{ number_format($item->bill, 2) }}

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
            <x-td>
                {{ number_format($item->initial_payment, 2) }}
            </x-td>
            <x-td>
                {{ number_format(($item->bill-$item->initial_payment), 2) }}
            </x-td>
        </tr>
        @endforeach
    </tbody>

    @endif
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-th>Total</x-th>
            @if($isPaymentAllowed)
            <x-th></x-th>
            @endif
            <x-td></x-td>
            <x-td> </x-td>


            <x-td></x-td>
            <x-td></x-td>
            <x-td> </x-td>
            <x-th>{{
                number_format($bills->sum('bill'), 2) }} </x-th>
            <x-th>{{
                number_format($bills->sum('initial_payment'), 2) }} </x-th>
            <x-th>{{
                number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }} </x-th>
        </tr>
    </tbody>
</table>