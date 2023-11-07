<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>Owner</x-th>
            <x-th>Unit</x-th>
            <x-th>Turnover On</x-th>
            <x-th>Purchasing Price</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    @foreach ($deed_of_sales as $index => $deedofsale)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <x-link-component link="/property/{{ Session::get('property_uuid') }}/owner/{{ $deedofsale->owner->uuid }}">
                   {{ $deedofsale->owner->owner }}
                </x-link-component>
            </x-td>
            <x-td>
                <x-link-component link="/property/{{ Session::get('property_uuid') }}/unit/{{ $deedofsale->unit->uuid }}">
                   {{ $deedofsale->unit->unit }}
                </x-link-component>
            </x-td>
            <x-td>{{ Carbon\Carbon::parse($deedofsale->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ number_format($deedofsale->price, 2) }}</x-td>
            <x-td>
                <x-button
                    data-modal-toggle="edit-deedofsale-modal-{{$deedofsale->uuid}}">
                    Edit
                </x-button>
            </x-td>
        </tr>
        @livewire('edit-deedofsale-component',['property' => $deedofsale->property, 'deedofsale'
        => $deedofsale], key(Carbon\Carbon::now()->timestamp.''.$deedofsale->uuid))

        @endforeach
    </tbody>
</table>
