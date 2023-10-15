<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
  <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>HOUSE</x-th>
            <x-th>STATUS</x-th>
            <x-th>CATEGORY</x-th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($houses as $index => $house)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
               <a class="text-blue-500 text-decoration-line: underline" href="/property/{{ $unit->property_uuid }}/house/{{ $house->uuid }}">{{ $house->house}}</a>
            </x-td>
            <x-td>{{ $house->status_id }}</x-td>
            <x-td>{{ $house->address }}</x-td>
        </tr>
        @endforeach
    </tbody>
</table>
