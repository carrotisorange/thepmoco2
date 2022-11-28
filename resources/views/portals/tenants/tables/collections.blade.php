<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>
                AR #
            </x-th>
            <x-th>
                REFERENCE #
            </x-th>

            <x-th>
                DATE APPLIED
            </x-th>
            <x-th>
                DATE DEPOSITED
            </x-th>
            <x-th>
                MODE OF PAYMENT
            </x-th>
            <x-th>
                CHEQUE NO
            </x-th>
            <x-th>
                BANK
            </x-th>
            <x-th>
                AMOUNT PAID
            </x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>



        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($collections as $item)
        <tr>

            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <x-td>{{ $item->ar_no }}</x-td>

            <x-td>
                {{-- <a class="text-indigo-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/collections">
                    {{ $item->bill_reference_no}}
                </a> --}}
                {{ $item->bill_reference_no}}
                {{-- <a class="text-indigo-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}/collections">
                    {{ $item->tenant->tenant}}
                </a> --}}
            </x-td>
            <x-td>
                {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
            </x-td>
            <x-td>
                @if($item->date_deposited)
                {{ Carbon\Carbon::parse($item->date_deposited)->format('M d, Y') }}
                @else
                NA
                @endif
            </x-td>
            <x-td>
                {{ $item->mode_of_payment }}
            </x-td>
            <x-td>
                @if($item->cheque_no)
                {{ $item->cheque_no }}
                @else
                NA
                @endif
            </x-td>
            <x-td>
                @if($item->bank)
                {{ $item->bank }}
                @else
                NA
                @endif
            </x-td>
            <?php
                $collections_count = App\Models\Collection::where('batch_no', $item->collection_batch_no)->count();
            ?>
            <x-td>
                {{ number_format($item->amount,2) }} ({{ $collections_count }})
            </x-td>
            <x-td>
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">View</a>
            </x-td>

            <x-td>
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export"
                    class="text-indigo-500 text-decoration-line: underline">Export</a>
            </x-td>

            <x-td>

                @if(!$item->attachment == null)
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/attachment"
                    target="_blank" class="text-indigo-500 text-decoration-line: underline">Attachment</a>
                @endif
            </x-td>
            <x-td>

                @if(!$item->proof_of_payment == null)
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/proof_of_payment"
                    target="_blank" class="text-indigo-500 text-decoration-line: underline">Proof of payment</a>
                @endif
            </x-td>
        </tr>
        @endforeach
        <tr>
            <x-td>Total</x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <?php
            $property_collections_count = App\Models\Collection::posted()->where('property_uuid', Session::get('property'))->count();
            ?>
            <x-td>
                {{ number_format($collections->sum('amount'), 2) }}
            </x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
        </tr>
    </tbody>
</table>