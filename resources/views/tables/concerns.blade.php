<table class="min-w-full table-fixed">

    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                REFERENCE #</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                UNIT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                TENANT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                CATEGORY</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                DATE REPORTED</th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                SUBJECT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                STATUS</th>
            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">

            </th>

        </tr>
    </thead>


    @foreach ($concerns as $concern)
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
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $concern->reference_no }}
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $concern->unit->unit }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $concern->tenant->tenant }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $concern->category->category }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ Carbon\Carbon::parse($concern->created_at)->format('M d, Y') }}
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $concern->subject }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $concern->status }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">

                <a href="/property/{{ Session::get("property") }}/concern/{{ $concern->id }}"
                    class="text-indigo-600 hover:text-indigo-900">Review</a>

            </td>
        </tr>

        <!-- More people... -->
    </tbody>

    @endforeach



</table>