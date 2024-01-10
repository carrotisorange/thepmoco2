<x-table-component>
    <x-table-body-component>
        <tr>
            <x-td><b>Total</b></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td>
                <b>{{ number_format($collections->sum('collection'), 2) }} ({{ $collections->count() }})</b>
            </x-td>
            {{-- <x-td></x-td> --}}
        </tr>
    </x-table-body-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>AR #</x-th>
            <x-th>OR #</x-th>
            <x-th>BILL #</x-th>
            <x-th> BILL TO</x-th>
            <x-th> DATE APPLIED</x-th>
            <x-th> MODE OF PAYMENT</x-th>
            <x-th> CHEQUE NO </x-th>
            <x-th> BANK</x-th>
            <x-th> AMOUNT PAID</x-th>
            {{-- <x-th></x-th> --}}
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach($collections as $index => $item)
        <tr>
            <x-td><b>{{ $index+1 }}</b></x-td>
            <x-td>{{ $item->ar_no }}</x-td>
            <x-td>{{ $item->or_no }}</x-td>
            <x-td>
                <?php $bill_nos = App\Models\Collection::where('property_uuid', $item->property_uuid)->posted()->where('ar_no', $item->ar_no)->get();?>
                @foreach ($bill_nos as $bill_no)
                {{ $bill_no->bill->bill_no }},
                @endforeach
            </x-td>
            <x-td>
                    <x-link-component link="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}">
                    {{ $item->tenant->tenant }}
                    </x-link-component>

                    <x-link-component link="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}">
                       {{ $item->owner->owner }}
                    </x-link-component>

                    <x-link-component link="/property/{{ $item->property_uuid }}/guest/{{ $item->guest_uuid }}">
                        {{ $item->guest->guest }}
                    </x-link-component>
            </x-td>
            <x-td> {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }} </x-td>
            <x-td> {{ $item->form }} </x-td>
            <x-td>
                @if($item->cheque_no)
                {{ Str::limit($item->cheque_no,15) }}
                @else
                NA
                @endif
            </x-td>
            <x-td>
                @if($item->bank)
                {{ Str::limit($item->bank,15) }}
                @else
                NA
                @endif
            </x-td>
            <?php
                $items_count = App\Models\Collection::where('batch_no', $item->collection_batch_no)->posted()->count();
            ?>
            <x-td>
                @if($item->tenant_uuid)
                <x-link-component link="/property/{{ $item->property_uuid }}/collection/{{ $item->ar_no }}/{{ 'tenant' }}/{{ $item->tenant_uuid }}/edit">
                    {{ number_format(App\Models\Collection::where('property_uuid', $item->property_uuid)->posted()->where('ar_no',
                    $item->ar_no)->sum('collection'),2) }} ({{ $item->count }})
                </x-link-component>
                @elseif($item->owner_uuid)
                <x-link-component link="/property/{{ $item->property_uuid }}/collection/{{ $item->ar_no }}/{{ 'owner' }}/{{ $item->owner_uuid }}/edit">
                   {{ number_format(App\Models\Collection::where('property_uuid', $item->property_uuid)->posted()->where('ar_no',
                $item->ar_no)->sum('collection'),2) }} ({{ $item->count }})
                </x-link-component>
                @else
                <x-link-component link="/property/{{ $item->property_uuid }}/collection/{{ $item->ar_no }}/{{ 'guest' }}/{{ $item->guest_uuid }}/edit">
                  {{ number_format(App\Models\Collection::where('property_uuid', $item->property_uuid)->posted()->where('ar_no',
                $item->ar_no)->sum('collection'),2) }} ({{ $item->count }})
                </x-link-component>
                @endif

            </x-td>

            <?php $proof_of_payment = App\Models\AcknowledgementReceipt::where('property_uuid', $item->property_uuid)
                            ->where('ar_no', $item->ar_no); ?>

        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
