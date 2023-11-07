<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>Property</x-th>
            <x-th>User</x-th>
            <x-th>Type</x-th>
            <x-th>Status</x-th>
            <x-th>Assigned on</x-th>
        </tr>
    </thead>
    @foreach ($properties as $index => $property)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <x-link-component link="/property/{{ $property->property->uuid }}">
                    {{ $property->property->property }}
                </x-link-component>
            </x-td>
            <x-td>{{ $property->user->name }}</x-td>
            <x-td>{{ $property->property->type->type }}</x-td>
            <x-td>
                @if($property->is_approved == '0')
                pending
                @else
                approved
                @endif
            </x-td>
            <x-td>{{ Carbon\Carbon::parse($property->created_at)->format('M d, Y') }}</x-td>
        </tr>
        @endforeach
    </tbody>
</table>
