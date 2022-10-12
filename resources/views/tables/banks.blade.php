<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>Account Number</x-th>
            <x-th>Bank</x-th>
            <x-th>Account Number</x-th>

        </tr>
    </thead>
    @forelse ($banks as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $item->account_name }}</x-td>
            <x-td>{{ $item->bank_name }}</x-td>
            <x-td>{{ $item->account_number }}</x-td>
            @empty
            <x-td>No data found.</x-td>
            @endforelse
        </tr>
    </tbody>
</table>