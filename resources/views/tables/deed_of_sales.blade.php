<table class="text-sm min-w-full divide-y divide-gray-200">
    <?php $ctr =1; ?>
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Unit</x-th>
            <x-th>Date of turnover</x-th>
            <x-th>Price</x-th>
            <x-th>Classification</x-th>
            <x-th>Status</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @forelse ($deed_of_sales as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $ctr++ }}</x-td>
            <x-td>
                <div class="text-sm text-gray-900">{{
                    $item->unit->unit}}
                </div>
                <div class="text-sm text-gray-500">{{
                    $item->unit->building->building}}
                </div>
            </x-td>

            <x-td>{{ Carbon\Carbon::parse($item->turnover_at)->format('M d, Y') }}
            </x-td>
            <x-td>{{ number_format($item->price, 2) }}</x-td>
            <x-td>{{ $item->classification }}</x-td>
            <x-td>
                @if($item->status === 'active')
                <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i> {{
                    $item->status }}
                    @else
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-clock"></i> {{
                        $item->status }}
                    </span>
                    @endif
            </x-td>
            <x-td>
                
            </x-td>
            @empty
            <x-td>No data found</x-td>
            @endforelse
        </tr>
    </tbody>
</table>