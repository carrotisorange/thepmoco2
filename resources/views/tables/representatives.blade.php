<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Relationship</x-th>
            <x-th>Email</x-th>
            <x-th>Mobile</x-th>

        </tr>
    </thead>
    @forelse ($representatives as $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $item->representative }}</x-td>
            <x-td>{{ $item->relationship->relationship }}</x-td>
            <x-td>{{ $item->email }}</x-td>
            <x-td>{{ $item->mobile_number }}</x-td>
            @empty
            <x-td>No data found.</x-td>
        </tr>
        @endforelse
    </tbody>
</table>