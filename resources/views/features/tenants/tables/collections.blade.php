<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>AR #</x-th>
            <x-th> DATE APPLIED</x-th>
            <x-th> DATE DEPOSITED</x-th>
            <x-th> MODE OF PAYMENT </x-th>
            <x-th> CHEQUE NO </x-th>
            <x-th> BANK</x-th>
            <x-th> AMOUNT PAID</x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>

        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($collections as $index => $item)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $item->ar_no }}</x-td>
            <x-td> {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }} </x-td>
            <x-td>
                @if($item->date_deposited)
                {{ Carbon\Carbon::parse($item->date_deposited)->format('M d, Y') }}
                @else
                NA
                @endif
            </x-td>
            <x-td> {{ $item->mode_of_payment }} </x-td>
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
                            $collections_count = App\Models\Collection::where('batch_no', $item->collection_batch_no)->posted()->count();
                        ?>
            <x-td>{{ number_format($item->amount,2) }} ({{ $collections_count }}) </x-td>
            <x-td>
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view"
                    class="text-purple-500 text-decoration-line: underline" target="_blank">View</a>
            </x-td>
            <x-td>
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export"
                    class="text-purple-500 text-decoration-line: underline">Export</a>
            </x-td>
            <x-td>
                @if(!$item->attachment == null)
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/attachment"
                    target="_blank" class="text-purple-500 text-decoration-line: underline">Attachment</a>
                @endif
            </x-td>
            <x-td>
                @if(!$item->proof_of_payment == null)
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/proof_of_payment"
                    target="_blank" class="text-purple-500 text-decoration-line: underline">Proof of
                    payment</a>
                @endif
            </x-td>
        </tr>
        @endforeach

    </tbody>
</table>