@if($deed_of_sales->count())

           <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Owner</x-th>
                    <x-th>Unit</x-th>
                    <x-th>Status</x-th>
                    <x-th>Date of Purchase</x-th>
                    <x-th>Purchasing Price</x-th>
                    <x-th>On loan?</x-th>
        
                    {{-- <x-th>Title</x-th>
                    <x-th>Tax Declaration</x-th>
                    <x-th>Deed of Sales</x-th>
                    <x-th>Contract to Sell</x-th>
                    <x-th>Certificate of Membership</x-th> --}}
                    <x-th></x-th>
                    <x-th></x-th>
                    <x-th></x-th>
                    {{-- <x-th></x-th> --}}
                </tr>
            </thead>
            @foreach ($deed_of_sales as $index => $item)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $index+1 }}</x-td>
                    <x-td>
                        <a class="text-blue-500 text-decoration-line: underline"
                            href="/property/{{ Session::get('property') }}/owner/{{ $item->owner->uuid }}">
                            {{ $item->owner->owner }}
                        </a>
                    </x-td>
                    <x-td>
                        <a class="text-blue-500 text-decoration-line: underline"
                            href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}">
                            {{ $item->unit->unit }}
                    </x-td>
                    <x-td>
                        {{ $item->status }}
                    </x-td>
                    <x-td>{{ Carbon\Carbon::parse($item->turnover_at)->format('M d, Y') }}
                    </x-td>
                    <x-td>{{ number_format($item->price, 2) }}</x-td>
                    <x-td>
                        @if($item->is_the_property_on_loan == '1')
                        yes
                        @else
                        no
                        @endif
                    </x-td>
        
                    {{-- <x-td>
                        @if($item->title)
                        <a href="{{ asset('/storage/'.$item->title) }}" target="_blank"
                            class="text-indigo-600 hover:text-indigo-900">View
                            Title</a>
                        @else
                        Title is not available
                        @endif
                    </x-td>
                    <x-td>
                        @if($item->tax_declaration)
                        <a href="{{ asset('/storage/'.$item->tax_declaration) }}" target="_blank"
                            class="text-indigo-600 hover:text-indigo-900">View
                            Tax Declaration</a>
                        @else
                        Tax declaration is not available
                        @endif
                    </x-td>
                    <x-td>
                        @if($item->deed_of_sales)
                        <a href="{{ asset('/storage/'.$item->deed_of_sales) }}" target="_blank"
                            class="text-indigo-600 hover:text-indigo-900">View
                            Deed of Sales</a>
                        @else
                        Deed of sales is not available
                        @endif
                    </x-td>
                    <x-td>
                        @if($item->contract_to_sell)
                        <a href="{{ asset('/storage/'.$item->contract_to_sell) }}" target="_blank"
                            class="text-indigo-600 hover:text-indigo-900">View
                            Contract to sell</a>
                        @else
                        Contract to sell is not available
                        @endif
                    </x-td>
                    <x-td>
                        @if($item->certificate_of_membership)
                        <a href="{{ asset('/storage/'.$item->certificate_of_membership) }}" target="_blank"
                            class="text-indigo-600 hover:text-indigo-900">View
                            Certificate of membership</a>
                        @else
                        Certificate of membership is not available
                        @endif
                    </x-td>
                    <x-td>
        
                        <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/owner/{{ $item->owner_uuid }}/deed_of_sale/{{ $item->uuid }}/edit"
                            class="text-indigo-600 hover:text-indigo-900">
                            Edit</a>
        
                    </x-td>
                    --}}
                    <x-td>
                        <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/owner/{{ $item->owner_uuid }}/deed_of_sale/{{ $item->uuid }}/edit"
                            class="text-blue-500 text-decoration-line: underline">
                            Edit</a>
                    </x-td>
                    <x-td>
                        @if($item->status == 'active')
                        <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/owner/{{ $item->owner_uuid }}/deed_of_sale/{{ $item->uuid }}/backout"
                            class="text-blue-500 text-decoration-line: underline">
                            Back out</a>
                        @endif
        
        
                    </x-td>
                    <x-td>
        
                        <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit_uuid }}/owner/{{ $item->owner_uuid }}/deed_of_sale/{{ $item->uuid }}/delete"
                            class="text-red-500 text-decoration-line: underline">
                            Remove</a>
        
                    </x-td>
        
                </tr>
                @endforeach
            </tbody>
        </table>
@else
<div class="mt-10 text-center mb-10">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No owners</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create'"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            <!-- Heroicon name: mini/plus -->
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path
                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
            Add your first owner
        </button>
    </div>
</div>
@endif