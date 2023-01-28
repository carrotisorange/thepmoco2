<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Owner</x-th>
            <x-th>Unit</x-th>
            <x-th>Status</x-th>
            <x-th>Date of Purchase</x-th>
            <x-th>Purchasing Price</x-th>
            <x-th></x-th>
            <x-th></x-th>
            <x-th></x-th>
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
            <x-td>
                <a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit_uuid }}/owner/{{ $item->owner_uuid }}/deed_of_sale/{{ $item->uuid }}/edit"
                    class="text-blue-500 text-decoration-line: underline">
                    Edit</a>
            </x-td>
            <x-td>
                @if($item->status == 'active')
                <a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit_uuid }}/owner/{{ $item->owner_uuid }}/deed_of_sale/{{ $item->uuid }}/backout"
                    class="text-blue-500 text-decoration-line: underline">
                    Back out</a>
                @endif


            </x-td>
            <x-td>

                <a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit_uuid }}/owner/{{ $item->owner_uuid }}/deed_of_sale/{{ $item->uuid }}/delete"
                    class="text-red-500 text-decoration-line: underline">
                    Remove</a>

            </x-td>

        </tr>
        @endforeach
    </tbody>
</table>