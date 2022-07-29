<x-index-layout>
    @section('title', '| '.$unit->unit)
    <x-slot name="labels">
        <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Bills</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Go back
        </x-button>
    </x-slot>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            {{-- <tr>
                <x-th>#</x-th>
                <x-th>Reference No</x-th>
                <x-th>Payee</x-th>
                <x-th>Bill No</x-th>
                <x-th>Particular</x-th>
                <x-th>Amount</x-th>
                <x-th>Status</x-th>
            </tr> --}}
            <tr>
               {{-- <x-th>
                    
                    <x-input id="" wire:model="selectAll" type="checkbox" /> 
                </x-th>
                --}}
                <x-th>#</x-th>
                <x-th>Tenant</x-th>
                <x-th>Particular</x-th>
                <x-th>Period</x-th>
                <x-th>Amount Due</x-th>

                <x-th>Amount Paid</x-th>
                <x-th>Balance</x-th>
       
            </tr>
        </thead>
        @forelse ($bills as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            {{-- <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>{{ $item->reference_no}}</x-td>
                <x-td>@if($item->tenant_uuid)
                    {{ $item->tenant->tenant}} (<span>T</span>)
                    @else
                    {{ $item->owner->owner}}
                    @endif</x-td>
                <x-td>{{ $item->bill_no}}</x-td>
                <x-td>{{ $item->particular->particular}}</x-td>
                <x-td>{{ number_format($item->bill, 2) }}</x-td>
                <x-td>@if($item->status === 'paid')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $item->status }}
                        @else
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i> {{
                            $item->status }}
                        </span>
                        @endif
                </x-td>
                @empty
                <x-td>No data found!</x-td>
                @endforelse
            </tr> --}}
            <tr>
                {{-- <x-td>
                    @if($item->status != 'paid')
                    <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                    @endif
                </x-td> --}}
                <x-td>{{ $item->bill_no }}</x-td>
                <x-td><a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}/bills"><b class="text-blue-600">{{$item->tenant->tenant }}</b></a></x-td>
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
                    <span title="unpaid"
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </span>
                    @endif

                    @if($item->description === 'movein charges')
                    <span title="urgent"
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-bolt"></i>
                    </span>
                    @endif
                </x-td>
                <x-td>{{ number_format($item->initial_payment, 2) }}</x-td>
                <x-td>{{ number_format(($item->bill-$item->initial_payment), 2) }}</x-td>
                {{-- <x-td>
                    <form method="POST" action="/bill/{{ $item->id }}/delete">
                        @csrf
                        @method('delete')
                        <x-button onclick="confirmMessage()"><i class="fa-solid fa-trash-can"></i></x-button>
                    </form>
                </x-td> --}}

                @empty
                <x-td>
                    No data found!
                </x-td>
            </tr>
            @endforelse
            <tr>
                <x-td>Total</x-td>
                <x-td></x-td>
 
                <x-td></x-td>
                <x-td></x-td>
                <x-td>{{number_format($bills->sum('bill'),2) }}</x-td>
                <x-td>{{number_format($bills->sum('initial_payment'),2) }}</x-td>
                <x-td>{{number_format($bills->sum('bill') - $bills->sum('initial_payment') ,2)
                    }}</x-td>
            </tr>
        </tbody>
    </table>
</x-index-layout>