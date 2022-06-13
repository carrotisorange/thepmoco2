<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <?php $ctr =1; ?>
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Relationship</x-th>
            <x-th>Contact</x-th>

            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($references as $item)

        <tr>
            <x-td>{{ $ctr++ }}</x-td>
            <x-td>{{ $item->reference }}</x-td>
            <x-td>{{ $item->relationship->relationship }}</x-td>
            <x-td>
                <div class="text-sm text-gray-900">{{ $item->email }}
                </div>
                <div class="text-sm text-gray-500">{{
                    $item->mobile_number }}
                </div>
            </x-td>
            <x-td>
                <x-button onclick="window.location.href='/reference/{{ $item->id }}/delete'">Remove</x-button>
            </x-td>
            @empty
            <x-td>No data found!</x-td>
        </tr>
        @endforelse
    </tbody>
</table>