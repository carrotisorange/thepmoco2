<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <tbody>
        <tr>
            <x-td><b>Total</b></x-td>
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
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
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
      
            <x-td>{{ $collection->ar_no }}</x-td>
            <x-td>
                <?php $bill_nos = App\Models\Collection::where('property_uuid', $collection->property_uuid)->where('ar_no', $collection->ar_no)->limit(3)->get();?>
                @foreach ($bill_nos as $bill_no)
                    {{ $bill_no->bill->bill_no }},
                @endforeach
            </x-td>
            <x-td>
               @if($collection->tenant_uuid)
                <a title="tenant" class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ $collection->property_uuid }}/tenant/{{ $collection->tenant_uuid }}">
                    {{ Str::limit($collection->tenant->tenant,10) }} </a> (T)
                @elseif($collection->owner_uuid)
                <a title="owner" class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $collection->property_uuid }}/owner/{{ $collection->owner_uuid }}">
                    {{ Str::limit($collection->owner->owner,10) }} </a> (O)
                @elseif($collection->guest_uuid)
                <a title="guest" class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $collection->property_uuid }}/guest/{{ $collection->guest_uuid }}">
                    {{ Str::limit($collection->guest->guest,10) }} </a> (G)
                @else
                NA
                @endif
            </x-td>
            <x-td> {{ Carbon\Carbon::parse($collection->updated_at)->format('M d, Y') }} </x-td>
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
                {{ Str::limit($collection->cheque_no,10) }}
                @else
                NA
                @endif
            </x-td>
            <x-td>
                @if($collection->bank)
                {{ Str::limit($collection->bank,10) }}
                @else
                NA
                @endif
            </x-td>
            <?php
                $collections_count = App\Models\Collection::where('batch_no', $collection->collection_batch_no)->count();
            ?>
            <x-td>
                {{ number_format($collection->collection,2) }} ({{ $collection->count }})
            </x-td>
            <x-td>
                @if($collection->tenant_uuid)
                <a target="_blank"
                 href="/property/{{ $collection->property_uuid }}/tenant/{{ $collection->tenant_uuid }}/collection/{{ $collection->id }}/view"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    View
                </a>
              
                @elseif($collection->owner_uuid)
                <a target="_blank"
                    href="/property/{{ $collection->property_uuid }}/owner/{{ $collection->owner_uuid }}/collection/{{ $collection->id }}/view"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    View
                </a>
                @elseif($collection->guest_uuid)
                <a target="_blank"
                    href="/property/{{ $collection->property_uuid }}/guest/{{ $collection->guest_uuid }}/collection/{{ $collection->id }}/view"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    View
                </a>
                @endif

            </x-td>
            {{-- <x-td>

                @if(!$collection->attachment == null)
                @if($collection->tenant_uuid)
                <a href="/property/{{ $collection->property_uuid }}/tenant/{{ $collection->tenant_uuid }}/ar/{{ $collection->id }}/attachment"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">Attachment</a>
                @elseif($collection->owner_uuid)
                <a href="/property/{{ $collection->property_uuid }}/owner/{{ $collection->owner_uuid }}/ar/{{ $collection->id }}/attachment"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">Attachment</a>
                @elseif($collection->guest_uuid)
                <a href="/property/{{ $collection->property_uuid }}/guest/{{ $collection->guest_uuid }}/ar/{{ $collection->id }}/attachment"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">Attachment</a>
                @else
                <a href="/property/{{ $collection->property_uuid }}/owner/{{ $collection->owner_uuid }}/ar/{{ $collection->id }}/attachment"
                    class="text-indigo-500 text-decoration-line: underline" target="_blank">Attachment</a>
                @endif
                @endif
            </x-td> --}}
        </tr>
        @endforeach
       
    </tbody>
</table>