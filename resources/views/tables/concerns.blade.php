<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>REFERENCE #</x-th>
            <x-th>TENANT</x-th>
            <x-th>UNIT</x-th>
            <x-th>SUBJECT</x-th>
            <x-th>DATE REPORTED</x-th>
            <x-th>CATEGORY</x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($concerns as $index => $concern)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $concern->reference_no }}</x-td>

             <x-td>
                @if($concern->tenant_uuid)
                            <a href=" /property/{{ $concern->property_uuid }}/tenant/{{ $concern->tenant_uuid }}" class="text-blue-500 text-decoration-line: underline" target="_blank"">{{ $concern->tenant->tenant}}</a>
                @else
                NA
                @endif
            </x-td>
            <x-td>
                @if($concern->unit_uuid)
                    <x-buton href=" /property/{{ $concern->property_uuid }}/unit/{{ $concern->unit_uuid }}" class="text-blue-500 text-decoration-line: underline" target="_blank"">{{ $concern->unit->unit}}</a>
                @else
                NA
                @endif
            </x-td>
            <x-td>{{ $concern->subject }}
            @if($concern->status === 'closed')
            <span title="{{ $concern->status }}" class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                <i class="fa-solid fa-circle-check"></i>
            </span>
            @else
            <span title="{{ $concern->status }}" class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                            bg-orange-100 text-orange-800">
                <i class="fa-solid fa-clock"></i>
            </span>
            @endif
            </x-td>
            <x-td>{{ Carbon\Carbon::parse($concern->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $concern->category->category }}</x-td>
            <x-td>
                @can('tenant')
                <x-button onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns/{{ $concern->id }}'">Review</x-buton>

                @else

                <x-button onclick="window.location.href='/property/{{ $concern->property_uuid }}/concern/{{ $concern->id }}/edit'">Review</x-button>
                    @endcannot

            </x-td>
        </tr>
        @endforeach
    </tbody>
</table>
