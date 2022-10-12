<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <x-th>Spouse</x-th>
            <x-th>Email</x-th>
            <x-th>Mobile</x-th>

        </tr>
    </thead>
    @forelse ($spouses as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $item->spouse }}</x-td>
            <x-td>{{ $item->email }}</x-td>
            <x-td>{{ $item->mobile_number }}</x-td>
            @empty
            <x-td>No data found!</x-td>
            @endforelse
        </tr>
    </tbody>
</table>