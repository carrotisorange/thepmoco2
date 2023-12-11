<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Reference No</x-th>
            <x-th>UNIT</x-th>
            <x-th>TENANT</x-th>
            <x-th>OWNER</x-th>
            <x-th>TYPE</x-th>
            <x-th>VIOLATION</x-th>

        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($violations as $index => $item)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <x-link-component link="/property/{{ Session::get('property_uuid') }}/violation/{{ $item->reference_no }}">
                    {{ $item->reference_no }}
                </x-link-component>
            </x-td>
            <x-td>
                <x-link-component
                    link="/property/{{ Session::get('property_uuid') }}/unit/{{ $item->unit->uuid }}">
                    {{ $item->unit->unit }}
                </x-link-component>
            </x-td>
            <x-td>
                <x-link-component
                    link="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant->uuid }}">
                    {{ $item->tenant->tenant }}
                </x-link-component>
            </x-td>
            <x-td>
                <x-link-component
                    link="/property/{{ Session::get('property_uuid') }}/owner/{{ $item->owner->uuid }}">
                    {{ $item->owner->owner }}
                </x-link-component>
            </x-td>
           <x-td>

                {{ $item->type->type }}

           </x-td>
           <x-td>{{ $item->violation }}</x-td>

        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
