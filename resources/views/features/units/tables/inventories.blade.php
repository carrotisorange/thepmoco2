<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            {{-- <x-th>Image</x-th> --}}
            <x-th>Item</x-th>
            <x-th>Quantity</x-th>
            <x-th>Remarks</x-th>
            <x-th>Added on</x-th>
            <x-th>Last Updated on</x-th>
        </tr>
    </thead>
    @foreach ($inventories as $index => $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            {{-- <x-td><img class="mx-auto h-18 w-18 rounded-full" src="{{ asset('/storage/'.$item->image) }}" alt="" /></x-td> --}}
            <x-td>{{ $item->item }}</x-td>
            <x-td>{{ $item->quantity }}</x-td>
            <x-td>{{ $item->remarks }}</x-td>
            <x-td>{{Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</x-td>
            <x-td>{{Carbon\Carbon::parse($item->updated_at)->format('M d, Y')}}</x-td>
        </tr>
    </tbody>
    @endforeach
</table>