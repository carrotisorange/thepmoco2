@if($collections->count())
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th> AR #</x-th>
            <x-th> REFERENCE # </x-th>
            <x-th> DATE APPLIED</x-th>
            <x-th> DATE DEPOSITED</x-th>
            <x-th> MODE OF PAYMENT</x-th>
            <x-th> CHEQUE NO </x-th>
            <x-th> BANK</x-th>
            <x-th> AMOUNT PAID</x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($collections as $item)
        <tr>
            <x-td>{{ $item->ar_no }}</x-td>
            <x-td> {{ $item->bill_reference_no}} </x-td>
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
            <x-td>
                {{ number_format($item->amount,2) }} ({{ $collections_count }})
            </x-td>
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
        </tr>
        @endforeach
        {{-- <tr>
            <x-td>Total</x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <?php
            $property_collections_count = App\Models\Collection::where('property_uuid', Session::get('property_uuid'))->posted()->count();
        ?>
            <x-td>
                {{ number_format($collections->sum('amount'), 2) }} ({{ $property_collections_count }})
            </x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td></x-td>
        </tr> --}}
    </tbody>
</table>
@else
<div class=" mt-10 text-center mb-10 ">
   <i class="fa-solid fa-circle-plus"></i>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No collections</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/bill/{{ 'owner' }}/{{ $owner_details->uuid }}'"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

            New collection
        </button>
    </div>
</div>
@endif