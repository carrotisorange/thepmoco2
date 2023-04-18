<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>Property</x-th>
            <x-th>Type</x-th>
            <x-th>Status</x-th>
            <x-th>Assigned on</x-th>
            <x-th>Modify Access</x-th>
        </tr>
    </thead>
    @foreach ($properties as $index => $item)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>

            <x-td><a class="text-blue-500 text-decoration-line: underline" target="_blank"
                    href="/property/{{ $item->property->uuid }}">{{
                    $item->property->property }}</a></x-td>
            <x-td>{{ $item->property->type->type }}</x-td>
            <x-td>
                @if($item->is_approved == '0')
                pending
                @else
                approved
                @endif

            </x-td>
            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
            <x-td>
                @can('accountownerandmanager')
                @if($item->is_approved == '1')
                <a class="text-red-500 text-decoration-line: underline"
                    href="/property/{{ $item->property_uuid }}/user_property/{{ $item->id }}/remove-access">
                    Remove Access
                </a>
                @else
                <a class="text-green-500 text-decoration-line: underline"
                    href="/property/{{ $item->property_uuid }}/user_property/{{ $item->id }}/restore-access">
                    Restore Access
                </a>
                @endif
                @endcan
            </x-td>
        </tr>

        @endforeach
    </tbody>
</table>