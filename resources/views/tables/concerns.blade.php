<x-table-component>
<x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>REFERENCE #</x-th>
            <x-th>DATE REPORTED</x-th>
            <x-th>TENANT</x-th>
            <x-th>UNIT</x-th>
            <x-th>SUBJECT</x-th>
            <x-th>CATEGORY</x-th>
            <x-th></x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($concerns as $index => $concern)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $concern->reference_no }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($concern->created_at)->format('M d, Y') }}</x-td>
             <x-td>
                <x-link-component link="/property/{{ $concern->property_uuid }}/tenant/{{ $concern->tenant_uuid }}">
                    {{ $concern->tenant->tenant}}
                </x-link-component>
            </x-td>
            <x-td>
                <x-link-component link="/property/{{ $concern->property_uuid }}/unit/{{ $concern->unit_uuid }}">
                    {{ $concern->unit->unit}}
                </x-link-component>
            </x-td>
            <x-td>
                 {{ $concern->subject }}
            </x-td>

            <x-td>{{ $concern->category->category }}</x-td>
            <x-td>
                @can('tenant')
              <x-button
                onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns/{{ $concern->id }}'">
                View

            </x-button>
                @else
                <x-button
                    onclick="window.location.href='/property/{{ $concern->property_uuid }}/concern/{{ $concern->id }}/edit'">
                    View

                </x-button>

                @endcannot

            </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
