<thead class="">
    <tr>
        <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">
            #
        </th>
        <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
            DATE</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            REQUEST FOR</th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            PARTICULAR
        </th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            REQUESTED BY
        </th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            BILLER</th>

        </th>
        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            AMOUNT</th>

        </th>

        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            APPROVED ON</th>

        </th>

        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
            STATUS</th>

        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
        </th>



    </tr>
</thead>

@foreach($accountpayables as $index => $accountpayable)
<tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
    <!-- Selected: "bg-gray-50" -->
    <tr>
        <td class="relative w-12 px-6 sm:w-16 sm:px-8">
            {{ $index+1 }}
        </td>
        <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            {{ Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}
        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            {{ $accountpayable->request_for }}
        </td>
        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            {{ $accountpayable->particular->particular }}
        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            {{ $accountpayable->requester->name }}
        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            {{ $accountpayable->biller->biller }}
        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            {{ number_format($accountpayable->amount, 2) }}
        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            @if($accountpayable->approved_at != '0000-00-00 00:00:00')
            {{ Carbon\Carbon::parse($accountpayable->approved_at)->format('M d, Y') }}
            @else
            NA
            @endif
        </td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
            {{$accountpayable->status}}
        </td>

        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
           {{-- <a href="/accountpayables/{{ $accountpayable->attachment }}"
                class="text-indigo-600 hover:text-indigo-900">View Attachment</a> --}}
        </td>

    </tr>

</tbody>
@endforeach

</table>