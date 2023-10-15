<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
 <thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>House Owner</x-th>
            <x-th>House</x-th>
            <x-th>Added On</x-th>

        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($houseOwners as $index => $houseOwner)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}/house-owner/{{ $houseOwner->houseowner->id }}">
                    {{ $houseOwner->houseowner->house_owner }}
                </a>
            </x-td>
            <x-td>
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}/house/{{ $houseOwner->house->id }}">
                    {{ $houseOwner->house->house }}
            </x-td>
            <x-td>{{ Carbon\Carbon::parse($houseOwner->created_at)->format('M d, Y') }}</x-td>

        </tr>
        {{-- @livewire('edit-deedofsale-component',['property' => $deedofsale->property, 'deedofsale'
        => $deedofsale], key(Carbon\Carbon::now()->timestamp.''.$deedofsale->uuid))

        @endforeach --}}
        @endforeach
    </tbody>

</table>
