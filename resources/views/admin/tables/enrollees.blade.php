<table class="min-w-full table-fixed">

    <thead class="bg-white">
        <tr>
            <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                UNIT</th>
         
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                DURATION</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                RENT/MO/TENANT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                STATUS</th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            </th>
        </tr>
    </thead>

    @foreach ($enrollees as $item)
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                {{-- <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                --}}
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->

            <td class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">
                <a href="/property/{{ $item->unit->property_uuid }}/unit/{{ $item->unit->uuid }}">{{
                    $item->unit->unit
                    }}</a>
            </td>
            
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{number_format($item->rent, 2)}}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($item->status === 'active')
                <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    <i class="fa-solid fa-circle-check"></i> {{ $item->status }}
                </span>
                @else

                <span
                    class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                                                bg-orange-100 text-orange-800">
                    <i class="fa-solid fa-clock"></i> {{
                    $item->status }}
                </span>
                @endif
                @if($item->end <= Carbon\Carbon::now()->addMonth() && $item->status
                    == 'active')
                    <span
                        class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                                                                                                        bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-clock"></i> expiring
                    </span>
                    @endif
            </td>

            <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                @if($item->contract)
                <a href="{{ asset('/storage/'.$item->contract) }}" target="_blank"
                    class="text-indigo-600 hover:text-indigo-900">View Attachment</a>
                @endif
            </td>
            <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                    class="text-indigo-600 hover:text-indigo-900">Renew</a>
            </td>
            <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                @if($item->status == 'active')
                <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                    class="text-indigo-600 hover:text-indigo-900">Moveout</a>
                @endif
            </td>

        </tr>
        <!-- More people... -->
    </tbody>

    @endforeach


</table>