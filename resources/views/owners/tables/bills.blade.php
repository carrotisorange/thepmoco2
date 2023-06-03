@if($bills->count())

<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th></x-th>
            {{-- <x-th></x-th> --}}
            <x-th>BILL # </x-th>
            <x-th>DATE POSTED</x-th>

            <x-th>UNIT</x-th>
            <x-th>PERIOD COVERED</x-th>
            <x-th>PARTICULAR</x-th>
            <x-th>AMOUNT DUE</x-th>
            <x-th>AMOUNT PAID</x-th>
            <x-th>BALANCE </x-th>
        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($bills as $index => $item)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            {{-- <x-td>
                @if($item->status != 'paid')
                <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                @endif
            </x-td> --}}
            <x-td>
                {{ $item->bill_no}}
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}
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
                {{ number_format(App\Models\Collection::where('bill_id', $item->id)->sum('collection'), 2) }}
            </x-td>
            <x-td>
                {{ number_format(($item->bill-App\Models\Collection::where('bill_id', $item->id)->sum('collection')), 2)
                }}
            </x-td>
        </tr>
        @endforeach
    </tbody>


    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td> </x-td>
            <x-td> </x-td>
            <x-td> </x-td>
            <x-td> </x-td>
            <x-td> </x-td>
            <x-td> </x-td>
            <x-td>{{
                number_format($bills->sum('bill'), 2) }} </x-td>
            <x-td>{{
                number_format($bills->sum('initial_payment'), 2) }} </x-td>
            <x-td>{{
                number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }} </x-td>
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
    <h3 class="mt-2 text-sm font-medium text-gray-900">No bils</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/bills'"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
        
           New bill
        </button>
    </div>
</div>
@endif