<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">#
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">UNIT
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">CATEGORY
            </th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TENANT
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">OWNER
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                CONTRACT</th>
            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                BUILDING
            </th> --}}
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">FLOOR
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                STATUS</th>


            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                RENT/MONTH/TENANT
            </th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                OCCUPANCY</th>


        </tr>
    </thead>


    <tbody class="bg-white divide-y divide-gray-200">
        <!-- Selected: "bg-gray-50" -->
        @foreach($units as $index => $unit )
        <tr>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{-- {{ $index+1 }} --}}
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">
                @if(Session::get('tenant_uuid'))
                <a
                    href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/tenant/{{ Session::get('tenant_uuid') }}/contract/{{ Str::random(8) }}/create">{{
                    $unit->unit }}</a>
                @elseif(Session::get('owner_uuid'))
                <a
                    href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ Session::get('owner_uuid') }}/deed_of_sale/{{ Str::random(8) }}/create">{{
                    $unit->unit }}</a>
                @else
                <a href="/property/{{ $unit->property_uuid }}/unit/{{ $unit->uuid }}">{{ $unit->unit
                    }}</a>
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $unit->category->category }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($unit->contracts->count())
                @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $tenant)
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $unit->property_uuid }}/tenant/{{ $tenant->tenant->uuid }}">{{
                    $tenant->tenant->tenant }}</a>
                @endforeach
                @else
                NA
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($unit->deed_of_sales->count())
                @foreach ($unit->deed_of_sales->where('status','!=','inactive')->take(1) as $owner)
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ $unit->property_uuid }}/owner/{{ $owner->owner->uuid }}">{{
                    $owner->owner->owner }}</a>
                @endforeach
                @else
                NA
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($unit->contracts->count())
                @foreach ($unit->contracts->where('status','!=','inactive')->take(1) as $contract)
                {{ Carbon\Carbon::parse($contract->start)->format('M d, Y').' - '.
                Carbon\Carbon::parse($contract->end)->format('M d, Y')}}
                @endforeach
                @else
                NA
                @endif
            </td>
            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{$unit->building->building }}</td> --}}
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $unit->floor->floor }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $unit->status->status}}
            </td>


            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ number_format($unit->rent,
                2) }}</td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-center text-gray-500">
                {{$unit->occupancy }} pax
            </td>

        </tr>
        @endforeach

    </tbody>

</table>