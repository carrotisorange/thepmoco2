<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <tbody>
        <tr>
            <x-td><b>Total</b></x-td>
            {{-- <x-td></x-td> --}}
            {{-- <x-td></x-td> --}}
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            {{-- <x-td></x-td>
            <x-td></x-td> --}}
            <x-td></x-td>
            <x-td>
                <b>{{ number_format($collections->sum('collection'), 2) }} ({{ $collections->count() }})</b>
            </x-td>
            <x-td></x-td>
            {{-- <x-td></x-td> --}}

        </tr>
    </tbody>
<thead class="">
        <tr>
            <x-th>#</x-th>
            {{-- <x-th>OR #  </x-th> --}}
            <x-th>AR #</x-th>
            <x-th>BILL #</x-th>
            <x-th> BILL TO</x-th>
            <x-th> DATE APPLIED</x-th>
            {{-- <x-th> DATE DEPOSITED</x-th> --}}
            <x-th> MODE OF PAYMENT</x-th>
            <x-th> CHEQUE NO </x-th>
            <x-th> BANK</x-th>
            <x-th> AMOUNT PAID</x-th>
            <x-th></x-th>
            {{-- <x-th></x-th> --}}
            {{-- <x-th></x-th> --}}
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($collections as $index => $collection)
        <tr>
            <x-td><b>{{ $index+1 }}</b></x-td>
            {{-- <x-td><x-table-input wire:model="collections.{{ $index }}.or_no" wire:change="updateOrNo({{ $collection->id }})" type="number" min="0000"/></x-td> --}}
            <x-td>{{ $collection->ar_no }}</x-td>
            <x-td>
                <?php $bill_nos = App\Models\Collection::where('property_uuid', $collection->property_uuid)->posted()->where('ar_no', $collection->ar_no)->get();?>
                @foreach ($bill_nos as $bill_no)
                {{ $bill_no->bill->bill_no }},
                @endforeach
            </x-td>
            <x-td>
                @if($collection->tenant_uuid)
                <a title="tenant" class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ $collection->property_uuid }}/tenant/{{ $collection->tenant_uuid }}">
                    {{ Str::limit($collection->tenant->tenant,20) }} </a> (T)
                @elseif($collection->owner_uuid)
                <a title="owner" class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $collection->property_uuid }}/owner/{{ $collection->owner_uuid }}">
                    {{ Str::limit($collection->owner->owner,20) }} </a> (O)
                @elseif($collection->guest_uuid)
                <a title="guest" class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $collection->property_uuid }}/guest/{{ $collection->guest_uuid }}">
                    {{ Str::limit($collection->guest->guest,20) }} </a> (G)
                @else
                NA
                @endif
            </x-td>
            <x-td> {{ Carbon\Carbon::parse($collection->created_at)->format('M d, Y') }} </x-td>
            {{-- <x-td>
                @if($collection->date_deposited)
                {{ Carbon\Carbon::parse($collection->date_deposited)->format('M d, Y') }}
                @else
                NA
                @endif
            </x-td> --}}
            <x-td> {{ $collection->form }} </x-td>
            <x-td>
                @if($collection->cheque_no)
                {{ Str::limit($collection->cheque_no,15) }}
                @else
                NA
                @endif
            </x-td>
            <x-td>
                @if($collection->bank)
                {{ Str::limit($collection->bank,15) }}
                @else
                NA
                @endif
            </x-td>
            <?php
                $collections_count = App\Models\Collection::where('batch_no', $collection->collection_batch_no)->posted()->count();
            ?>
            <x-td>
                {{ number_format(App\Models\Collection::where('property_uuid', $collection->property_uuid)->posted()->where('ar_no', $collection->ar_no)->sum('collection'),2) }} ({{ $collection->count }})
            </x-td>
            <x-td>
                <x-button id="dropdownDefaultButton({{ $collection->id }})" data-dropdown-placement="left-end"
                    data-dropdown-toggle="dropdown({{ $collection->id }})">View
                  &nbsp; <i class="fa-solid fa-caret-down"></i>
                </x-button>

                <div id="dropdown({{ $collection->id }})"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            @if($collection->tenant_uuid)
                            <a href="/property/{{ $collection->property_uuid }}/tenant/{{ $collection->tenant_uuid }}/collection/{{ $collection->id }}/view"
                                target="_blank"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Acknowledgment
                                Receipt</a>

                            @elseif($collection->owner_uuid)
                            <a href="/property/{{ $collection->property_uuid }}/owner/{{ $collection->owner_uuid }}/collection/{{ $collection->id }}/view"
                                target="_blank"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Acknowledgment
                                Receipt</a>
                            @elseif($collection->guest_uuid)
                            <a href="/property/{{ $collection->property_uuid }}/guest/{{ $collection->guest_uuid }}/collection/{{ $collection->id }}/view"
                                target="_blank"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Acknowledgment
                                Receipt</a>
                            @endif

                        </li>
                        <?php $proof_of_payment = App\Models\AcknowledgementReceipt::where('property_uuid', $collection->property_uuid)
                            ->where('ar_no', $collection->ar_no); ?>
                        <li>
                            @if($proof_of_payment->pluck('attachment')->first())
                            <a href="{{ asset('/storage/'.$proof_of_payment->pluck('attachment')->first()) }}"
                                target="_blank"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Proof
                                of payment</a>
                            @else

                            @endif
                        </li>
                        @if($proof_of_payment->pluck('proof_of_payment')->first())
                        <a href="{{ asset('/storage/'.$proof_of_payment->pluck('proof_of_payment')->first()) }}"
                            target="_blank"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Proof
                            of deposit</a>
                        @else

                        @endif
                    </ul>
                </div>
                @cannot('tenant')
                <x-button class="bg-red-500" data-modal-target="delete-collection-modal-{{$collection->id}}" data-modal-toggle="delete-collection-modal-{{$collection->id}}"
                    type="button">
                    Delete
                </x-button>

                 @endcannot

            </x-td>

        </tr>
        @livewire('delete-collection-component', ['collection' => $collection], key(Carbon\Carbon::now()->timestamp.''.$collection->id))
        @endforeach

    </tbody>
</table>
