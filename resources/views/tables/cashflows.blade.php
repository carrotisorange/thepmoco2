<table class="min-w-full table-fixed">

    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-5 sm:w-8 sm:px-8">
                #
            </th>

            <th scope="col" class="PX-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                DATE</th>


            <th scope="col" class="PX-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                DESCRIPTION</th>
            {{-- <th scope="col" class="PX-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                PAYOR/PAYEE</th> --}}
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                CASHIN</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                CASHOUT</th>
            {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                BALANCE</th> --}}

            </th>
        </tr>
    </thead>


    @foreach ($accountpayables->union($collections) as $index => $cashflow)

    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                {{ $index+1 }}
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $cashflow->date }}
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $cashflow->label }}
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($cashflow->label == 'INCOME')
                {{ number_format($cashflow->amount, 2) }}
                @endif
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                @if($cashflow->label == 'EXPENSE')
                {{ number_format($cashflow->amount, 2) }}
                @endif
            </td>


        </tr>
    </tbody>
    @endforeach
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->

                Total
            </td>
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

                {{ number_format($cashflows->where('label', 'INCOME')->sum('amount'), 2) }}

            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

                {{ number_format($cashflows->where('label', 'EXPENSE')->sum('amount'), 2) }}

            </td>


        </tr>
    </tbody>
</table>