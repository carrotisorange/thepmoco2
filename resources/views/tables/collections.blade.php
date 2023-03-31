<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th> AR #</x-th>
            <x-th> NAME</x-th>
            <x-th> DATE APPLIED</x-th>
            <x-th> DATE DEPOSITED</x-th>
            <x-th> MODE OF PAYMENT</x-th>
            <x-th> CHEQUE NO </x-th>
            <x-th> BANK</x-th>
            <x-th> AMOUNT PAID</x-th>
            <x-th></x-th>
            <x-th></x-th>
            {{-- <x-th></x-th> --}}
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($collections as $item)
        <tr>
            <x-td>{{ $item->ar_no }}</x-td>
            <x-td>
                @if($item->tenant_uuid)
                <a class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}">{{
                    $item->tenant->tenant}} </a> (T)
                @elseif($item->owner_uuid)
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}">{{
                    $item->owner->owner}} </a> (O)
                @else
                NA
                @endif
            </x-td>
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
                $collections_count = App\Models\Collection::where('batch_no', $item->collection_batch_no)->count();
            ?>
            <x-td>
                {{ number_format($item->amount,2) }} ({{ $collections_count }})
            </x-td>
            <x-td>
                @if($item->tenant_uuid)
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">View</a>
                @elseif($item->owner_uuid)
                <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}/ar/{{ $item->id }}/view"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">View</a>
                @elseif($item->guest_uuid)
                <a href="/property/{{ $item->property_uuid }}/guest/{{ $item->guest_uuid }}/ar/{{ $item->id }}/view"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">View</a>
                @endif

            </x-td>
            <x-td>

                @if(!$item->attachment == null)
                @if($item->tenant_uuid)
                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/attachment"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">Attachment</a>
                @elseif($item->owner_uuid)
                <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}/ar/{{ $item->id }}/attachment"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">Attachment</a>
                @elseif($item->guest_uuid)
                <a href="/property/{{ $item->property_uuid }}/guest/{{ $item->guest_uuid }}/ar/{{ $item->id }}/attachment"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">Attachment</a>
                @else
                <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}/ar/{{ $item->id }}/attachment"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">Attachment</a>
                @endif
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
                {{ number_format($collections->sum('amount'), 2) }} ({{ $property_collections_count }})
            </x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
        </tr>
    </tbody>
</table>