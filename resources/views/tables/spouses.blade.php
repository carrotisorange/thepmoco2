<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th> NAME </x-th>
            <x-th> MOBILE  </x-th>
            <x-th> EMAIL </x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($spouse as $index => $item)
        <tr>
            <x-td> {{ $item->spouse }} </x-td>
            <x-td> {{ $item->mobile_number }} </x-td>
            <x-td> {{ $item->email }} </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
