<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>HOUSE</x-th>
            <x-th>OWNER</x-th>
            {{-- <x-th>STATUS</x-th>
            <x-th>CATEGORY</x-th> --}}
            <x-th>FLOOR</x-th>
            {{-- <x-th>RENT/MONTH/TENANT</x-th> --}}
            <x-th>OCCUPANCY</x-th>
            {{-- <x-th>TENANT</x-th> --}}

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($units as $index => $unit)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                @if(Session::get('tenant_uuid'))
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/tenant/{{ Session::get('tenant_uuid') }}/contract/{{ Str::random(8) }}/create">{{
                    $unit->unit }}</a>
                @elseif(Session::get('owner_uuid'))
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/owner/{{ Session::get('owner_uuid') }}/deed_of_sale/{{ Str::random(8) }}/create">{{
                    $unit->unit }}<a />
                    @else
                    <a class="text-blue-500 text-decoration-line: underline"
                        href="/property/{{ $unit->property_uuid }}/unit/{{ $unit->uuid }}">{{ $unit->unit
                        }}</a>
                    @endif
            </x-td>
            <x-td>
                @if($unit->deed_of_sales->count())
                @foreach ($unit->deed_of_sales->where('status','!=','inactive')->take(1) as $owner)
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $unit->property_uuid }}/owner/{{ $owner->owner->uuid }}">{{
                    $owner->owner->owner }}</a>
                @endforeach
                @else
                NA
                @endif
            </x-td>
            {{-- <x-td>{{ $unit->status->status}}</x-td>
            <x-td>{{ $unit->category->category }}</x-td> --}}
            <x-td>{{ $unit->floor->floor }}</x-td>
            {{-- <x-td>{{ number_format($unit->rent, 2) }}</x-td> --}}
            <x-td>{{$unit->occupancy }} pax</x-td>
            {{-- <x-td>
                @if($unit->contracts->count())
                @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $tenant)
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $unit->property_uuid }}/tenant/{{ $tenant->tenant->uuid }}">{{
                    $tenant->tenant->tenant }}</a>
                @endforeach
                @else
                NA
                @endif
            </x-td>--}}

        </tr>
        @endforeach
    </tbody>
</table>
