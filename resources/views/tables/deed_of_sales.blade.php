<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>Unit</x-th>
            <x-th>Date of Purchase</x-th>
            <x-th>Purchasing Price</x-th>
            <x-th>On loan?</x-th>
            <x-th>For rent to tenant?</x-th>
            <x-th>Title</x-th>
            <x-th>Tax Declaration</x-th>
            <x-th>Deed of Sales</x-th>
            <x-th>Contract to Sell</x-th>
            <x-th>Certificate of Membership</x-th>
        </tr>
    </thead>
    @forelse ($deed_of_sales as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>
                {{ $item->unit->building->building.' '.$item->unit->unit}}
            </x-td>

            <x-td>{{ Carbon\Carbon::parse($item->turnover_at)->format('M d, Y') }}
            </x-td>
            <x-td>{{ number_format($item->price, 2) }}</x-td>
            <x-td>{{ $item->is_the_property_on_loan }}</x-td>
            <x-td>{{ $item->is_the_unit_for_rent_to_tenant }}</x-td>
            <x-td>
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
            @empty
            <x-td>No data found.</x-td>
        </tr>
        @endforelse
    </tbody>
</table>