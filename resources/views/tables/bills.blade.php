<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td><b>Total</b></x-td>
            @if($isPaymentAllowed)
            <x-td></x-td>
            @endif
          
            <x-td></x-td>
            <x-td> </x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td> </x-td>
            <x-td>
                <b>{{ number_format($bills->sum('bill'), 2) }}/{{ number_format($bills->sum('initial_payment'), 2) }}/{{ number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }}</b> </x-td>
            <x-td></x-td>
            <x-td></x-td>
        </tr>
    </tbody>
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            @if($isPaymentAllowed)
            <x-th></x-th>
            @endif
            {{-- <x-th>ID</x-th> --}}
            <x-th>BILL #</x-th>
            <x-th>DATE POSTED</x-th>
            <x-th>BILL TO</x-th>
            <x-th>UNIT</x-th>
            <x-th>PERIOD COVERED</x-th>
            <x-th>PARTICULAR</x-th>
            <x-th>AMOUNT DUE/AMOUNT PAID/BALANCE</x-th>
            {{-- <x-th>INITIAL PAYMENT</x-th>
            <x-th>BALANCE </x-th> --}}
            <x-th></x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @if($view === 'listView')
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($bills as $index => $bill)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            @if($isPaymentAllowed)
            <x-th>
                @if($bill->status != 'paid')
                <x-input type="checkbox" wire:model="selectedBills" value="{{ $bill->id }}" />
                @endif
            </x-th>
            @endif
            {{-- <x-td>{{ $bill->id }}</x-td> --}}
            <x-td>{{ $bill->bill_no}}</x-td>

            <x-td>
                {{ Carbon\Carbon::parse($bill->created_at)->format('M d, Y') }}
            </x-td>
            <x-td>
                @if($bill->tenant_uuid)
                <a title="tenant" class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ $bill->property_uuid }}/tenant/{{ $bill->tenant_uuid }}">
                    {{  Str::limit($bill->tenant->tenant,20) }} </a> (T)
                @elseif($bill->owner_uuid)
                <a title="owner" class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $bill->property_uuid }}/owner/{{ $bill->owner_uuid }}">
                    {{  Str::limit($bill->owner->owner,20) }} </a> (O)
                @elseif($bill->guest_uuid)
                <a title="guest" class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $bill->property_uuid }}/guest/{{ $bill->guest_uuid }}">
                      {{  Str::limit($bill->guest->guest,20) }} </a> (G)
                @else
                NA
                @endif
            </x-td>
            <x-td>
                <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ Session::get('property') }}/unit/{{ $bill->unit->uuid }}">
                    {{ Str::limit($bill->unit->unit,20) }} </a>
                </a>
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($bill->start)->format('M d, Y').'-'.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
            </x-td>
            <x-td>
                {{ Str::limit($bill->particular->particular,15) }} </a> 
            </x-td>
            <x-td>
                {{ number_format($bill->bill, 2) }}
                /{{ number_format(App\Models\Collection::where('bill_id', $bill->id)->sum('collection'), 2) }}
                /{{ number_format(($bill->bill-App\Models\Collection::where('bill_id', $bill->id)->sum('collection')), 2) }}

                @if($bill->status === 'paid')
                <span title="paid"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i>
                </span>
                @elseif($bill->status === 'partially_paid')
                <span title="partially_paid"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-clock"></i>
                </span>
                @else
                <span title="unpaid" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    <i class="fa-solid fa-circle-xmark"></i>
                </span>
                @endif

                @if($bill->description === 'movein charges' && $bill->status==='unpaid')
                <span title="urgent"
                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-bolt"></i>
                </span>
                @endif
            </x-td>

            <x-td>
             
                <button data-modal-target="edit-bill-modal-{{$bill->id}}" data-modal-toggle="edit-bill-modal-{{$bill->id}}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Edit
                </button>
            
            </x-td>
            <x-td>
              @if($bill->status === 'unpaid')
                <button data-modal-target="delete-bill-modal-{{$bill->id}}" data-modal-toggle="delete-bill-modal-{{$bill->id}}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Delete
                </button>
               @endif
            </x-td>
        </tr>
        @livewire('edit-bill-component', ['bill_details' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))
        @livewire('delete-bill-component', ['bill' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))
        @endforeach
    </tbody>

    @endif
    
</table>