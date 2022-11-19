<table class="min-w-full table-fixed">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                #
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">UNIT
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">CATEGORY
            </th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">TENANT
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


    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        @foreach($units as $index => $unit )
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->
                {{--
                <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $index + 1
                }}
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