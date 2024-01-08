<x-table-component>
    <x-table-body-component>
        <tr>
            <x-td><b>Total</b></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td> </x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td> </x-td>
            <x-td>
                <b>
                    {{ number_format($bills->sum('bill'), 2)}}/
                    {{ number_format($bills->where('status', 'paid')->sum('bill'), 2) }}/
                    {{ number_format($bills->where('status', 'unpaid')->sum('bill'), 2) }}
                </b>
            </x-td>
            <x-td></x-td>
            <x-td></x-td>
        </tr>
    </x-table-body-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>

            <x-th></x-th>
            <x-th>BILL #</x-th>
            <x-th>DATE POSTED</x-th>
            <x-th>BILL TO</x-th>
            <x-th>UNIT</x-th>
            <x-th>PERIOD COVERED</x-th>
            <x-th>PARTICULAR</x-th>
            <x-th>AMOUNT DUE/AMOUNT PAID/BALANCE</x-th>
            <x-th></x-th>
            <x-th></x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($bills as $index => $bill)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-th>
                @if(!App\Models\Collection::paidByBill($bill->id))
                    <x-input name="selectedBills" type="checkbox" wire:model="selectedBills" value="{{ $bill->id }}" />
                @endif
            </x-th>
            <x-td>{{ $bill->bill_no}}</x-td>
            <x-td>
                {{ Carbon\Carbon::parse($bill->created_at)->format('M d, Y') }}
            </x-td>
            <x-td>
                <x-link-component link="/property/{{ $bill->property_uuid }}/tenant/{{ $bill->tenant_uuid }}">
                    {{ $bill->tenant->tenant }}
                </x-link-component>
                <x-link-component link="/property/{{ $bill->property_uuid }}/owner/{{ $bill->owner_uuid }}">
                    {{ $bill->owner->owner }}
                </x-link-component>
                <x-link-component link="/property/{{ $bill->property_uuid }}/guest/{{ $bill->guest_uuid }}">
                    {{ $bill->guest->guest }}
                </x-link-component>
            </x-td>
            <x-td>
                <x-link-component link="/property/{{ $bill->property_uuid }}/unit/{{ $bill->unit_uuid }}">
                    {{ $bill->unit->unit }}
                </x-link-component>
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($bill->start)->format('M d, Y').'-'.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
            </x-td>
            <x-td>
                {{ Str::limit($bill->particular->particular,15) }} </a>
            </x-td>
            <x-td>
                <div class="flex">
                    {{ number_format($bill->bill, 2) }}/{{ number_format(App\Models\Collection::paidByBill($bill->id), 2) }}/
                    {{  number_format(($bill->bill-App\Models\Collection::paidByBill($bill->id)), 2) }}
                    @if(App\Models\Collection::paidByBill($bill->id))
                    <x-status-component title="paid" class="bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i>
                    </x-status-component>
                    @else
                    <x-status-component title="unpaid" class="bg-red-100 text-red-800">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </x-status-component>
                    @endif
                    @if($bill->description === 'movein charges' && $bill->status==='unpaid')
                    <x-status-component title="urgent" class="bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-bolt"></i>
                    </x-status-component>
                    @endif
                </div>
            </x-td>
            <x-td>
                <x-button data-modal-toggle="edit-bill-modal-{{$bill->id}}">
                    Edit
                </x-button>
            </x-td>
            <x-td>
                <x-button class="bg-red-500" data-modal-toggle="delete-bill-modal-{{$bill->id}}">
                    Delete
                </x-button>
            </x-td>
        </tr>

        {{-- @livewire('edit-bill-component', ['bill_details' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))
        @livewire('delete-bill-component', ['bill' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id)) --}}

         @livewire('edit-bill-component', ['bill_details' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))
        @livewire('delete-bill-component', ['bill' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))

        @endforeach
    </x-table-body-component>
</x-table-component>
