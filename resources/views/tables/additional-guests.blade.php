<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($additional_guests as $index => $additional_guest)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $additional_guest->additional_guest }}</x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
