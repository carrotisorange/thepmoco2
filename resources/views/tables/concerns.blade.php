<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>REFERENCE #</x-th>
            <x-th>DATE REPORTED</x-th>
            <x-th>UNIT</x-th>
            <x-th>TENANT</x-th>
            <x-th>CATEGORY</x-th>
            <x-th>SUBJECT</x-th>
            <x-th>STATUS</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($concerns as $index => $concern)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $concern->reference_no }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($concern->created_at)->format('M d, Y') }}</x-td>
            <x-td>
                <a href="/property/{{ $concern->property_uuid }}/unit/{{ $concern->unit_uuid }}/concerns"
                    class="text-blue-500 text-decoration-line: underline" target="_blank"">{{ $concern->unit->unit }}</a>
          </x-td>
            <x-td>
                <a href=" /property/{{ $concern->property_uuid }}/tenant/{{ $concern->tenant_uuid }}/concerns"
                    class="text-blue-500 text-decoration-line: underline" target="_blank"">{{ $concern->tenant->tenant
                    }}</a>
            </x-td>
            <x-td>{{ $concern->category->category }}</x-td>
            <x-td>{{ $concern->subject }}</x-td>
            <x-td>{{ $concern->status }}</x-td>
            <x-td>
                <a href="/property/{{ $concern->property_uuid }}/tenant/{{ $concern->tenant_uuid }}/concern/{{ $concern->id }}/edit"
                    class="text-blue-500 text-decoration-line: underline" target="_blank"">Review</a>
            </x-td>
        </tr>
        @endforeach
    </tbody>
</table>