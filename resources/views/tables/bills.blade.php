<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    @if($bills->count())
    @if($isIndividualView)
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
                <b>
                    @if($user_type === 'tenant')
                   {{ number_format(App\Models\Bill::postedBills('tenant_uuid',$tenant_uuid), 2)}}/{{
                        number_format(App\Models\Collection::postedCollections('tenant_uuid',$tenant_uuid), 2) }}/{{
                        number_format(App\Models\Bill::postedBills('tenant_uuid',$tenant_uuid)-App\Models\Collection::postedCollections('tenant_uuid',$tenant_uuid),
                        2) }}
                    @elseif($user_type === 'owner')
                    {{ number_format(App\Models\Bill::where('owner_uuid',
                    $owner_uuid)->posted()->sum('bill'), 2) }}/
                    {{ number_format(App\Models\Collection::where('owner_uuid',
                    $owner_uuid)->posted()->sum('collection'), 2) }}/
                    {{ number_format((App\Models\Bill::where('owner_uuid',
                    $owner_uuid)->posted()->sum('bill')-App\Models\Collection::where('owner_uuid',
                    $owner_uuid)->posted()->sum('collection')), 2) }}
                    @elseif($user_type === 'guest')
                    {{ number_format(App\Models\Bill::where('guest_uuid',
                    $guest_uuid)->posted()->sum('bill'), 2) }}/
                    {{ number_format(App\Models\Collection::where('guest_uuid',
                    $guest_uuid)->posted()->sum('collection'), 2) }}/
                    {{ number_format((App\Models\Bill::where('guest_uuid',
                    $guest_uuid)->posted()->sum('bill')-App\Models\Collection::where('guest_uuid',
                    $guest_uuid)->posted()->sum('collection')), 2) }}
                    @else
                    {{ number_format(App\Models\Bill::where('unit_uuid', $unit_uuid)->posted()->sum('bill'),
                    2) }}/
                    {{ number_format(App\Models\Collection::where('unit_uuid',
                    $unit_uuid)->posted()->sum('collection'), 2) }}/
                    {{ number_format((App\Models\Bill::where('unit_uuid',
                    $unit_uuid)->posted()->sum('bill')-App\Models\Collection::where('unit_uuid',
                    $unit_uuid)->posted()->sum('collection')), 2) }}
                    @endif
                </b>
            </x-td>
            <x-td></x-td>
            <x-td></x-td>
        </tr>
    </tbody>
    @else
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
                <b>
                    {{ number_format(App\Models\Bill::where('property_uuid',
                    Session::get('property_uuid'))->posted()->sum('bill'), 2) }}/
                    {{ number_format(App\Models\Collection::where('property_uuid',
                    Session::get('property_uuid'))->posted()->sum('collection'), 2) }}/
                    {{ number_format((App\Models\Bill::where('property_uuid',
                    Session::get('property_uuid'))->posted()->sum('bill')-App\Models\Collection::where('property_uuid',
                    Session::get('property_uuid'))->posted()->sum('collection')), 2) }}

                </b>
            </x-td>

            <x-td></x-td>
        </tr>
    </tbody>
    @endif
    @endif
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            @if($isPaymentAllowed)
            <x-th></x-th>
            @endif
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
    </thead>
    @if($view === 'listView')
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($bills as $index => $bill)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            @if($isPaymentAllowed)
            <x-th>
                @if(!App\Models\Collection::paidByBill($bill->id))
                <x-input name="selectedBills" type="checkbox" wire:model="selectedBills" value="{{ $bill->id }}" />
                @endif
            </x-th>
            @endif
            <x-td>{{ $bill->bill_no}}</x-td>

            <x-td>
                {{ Carbon\Carbon::parse($bill->created_at)->format('M d, Y') }}
            </x-td>
            <x-td>
                @if($bill->tenant_uuid)
                <x-link-component link="/property/{{ $bill->property_uuid }}/tenant/{{ $bill->tenant_uuid }}">
                    {{ Str::limit($bill->tenant->tenant,20) }} (T)
                </x-link-component>
                @elseif($bill->owner_uuid)
              <x-link-component link="/property/{{ $bill->property_uuid }}/owner/{{ $bill->owner_uuid }}">
                    {{ Str::limit($bill->owner->owner,20) }} (O)
                </x-link-component>
                @elseif($bill->guest_uuid)
              <x-link-component link="/property/{{ $bill->property_uuid }}/guest/{{ $bill->guest_uuid }}">
                    {{ Str::limit($bill->guest->guest,20) }} (G)
                </x-link-component>
                @else
                NA
                @endif
            </x-td>
            <x-td>
               <x-link-component link="/property/{{ $bill->property_uuid }}/unit/{{ $bill->unit_uuid }}">
                    {{ Str::limit($bill->unit->unit,20) }}
                </x-link-component>
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($bill->start)->format('M d, Y').'-'.Carbon\Carbon::parse($bill->end)->format('M
                d, Y') }}
            </x-td>
            <x-td>
                {{ Str::limit($bill->particular->particular,15) }} </a>
            </x-td>
            <x-td>
            <div class="flex">
                {{ number_format($bill->bill, 2) }}/{{ number_format(App\Models\Collection::paidByBill($bill->id), 2) }}/{{
                number_format(($bill->bill-App\Models\Collection::paidByBill($bill->id)), 2) }}
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
                <x-button class="bg-red-500"
                    data-modal-toggle="delete-bill-modal-{{$bill->id}}">
                    Delete
                </x-button>
            </x-td>
        </tr>

        @livewire('edit-bill-component', ['bill_details' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))
        @livewire('delete-bill-component', ['bill' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))

        @endforeach
    </tbody>
    @endif
</table>
