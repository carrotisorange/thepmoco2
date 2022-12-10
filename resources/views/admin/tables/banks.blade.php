<table class="min-w-full table-fixed">

    <thead class="bg-white">
        <tr>
            <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

            </th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                Bank
            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                ACCOUNT NAME
            </th>

            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                ACCOUNT NUMBER
            </th>

        </tr>
    </thead>

    @forelse ($banks as $bank)


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
                {{ $bank->bank_name }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $bank->account_name }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $bank->account_number }}
            </td>
        </tr>
    </tbody>
    @empty
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <tr>
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                No banks found.
            </td>
        </tr>
    </tbody>

    @endforelse

</table>