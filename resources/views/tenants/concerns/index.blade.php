<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>REFERENCE #</x-th>
            <x-th>REPORTED ON</x-th>
            <x-th>SUBJECT</x-th>
            <x-th>UNIT</x-th>
            <x-th>CATEGORY</x-th>
            <x-th>CONCERN</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($concerns as $index => $item)
        <tr>
            <x-td>{{ $item->reference_no }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}</x-td>
            <x-td>{{ $item->subject }}</x-td>
            <x-td>{{ $item->unit->unit }}</x-td>
            <x-td>{{ $item->category->category }}</x-td>
            <x-td>{{ $item->concern }}</x-td>
            <x-td>{{ $item->status }}</x-td>
            <x-td>
                <a class="font-medium text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ $item->property_uuid }}/concern/{{ $item->id }}"
                    class="text-indigo-600 hover:text-indigo-900">Review</a>
            </x-td>
        </tr>
        @endforeach
    </tbody>

</table>