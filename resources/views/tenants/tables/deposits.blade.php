<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>DESCRIPTION</x-th>
            <x-th>AMOUNT</x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($wallets as $index => $item)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $item->description }}</x-td>
            <x-td>{{ number_format($item->amount, 2) }}</x-td>
        </tr>
        @endforeach
    </tbody>
</table>
