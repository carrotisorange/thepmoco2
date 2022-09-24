<table class="min-w-full table-fixed divide-y-8 divide-gray-50 border">

    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">

            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                BILL #</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                DATE POSTED</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                UNIT</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                PERIOD COVERED</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                PARTICULAR</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                AMOUNT DUE</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                AMOUNT PAID</th>
            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                BALANCE</th>


        </tr>
    </thead>

    @forelse ($units as $unit)
    <?php 
        $bills = App\Models\Unit::find($unit->unit->uuid)->bills()->orderBy('bill_no', 'desc')->get();    
    ;?>
    @if($bills->count())
    @foreach ($bills as $bill)
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
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium">
                {{ $bill->bill_no }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{Carbon\Carbon::parse($bill->created_at)->format('M d,
                Y')}}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $bill->unit->unit }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{Carbon\Carbon::parse($bill->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
            </td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $bill->particular->particular }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ number_format($bill->bill, 2) }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{ number_format($bill->initial_payment, 2)
                }}</td>
            <td class="whitespace-nowrap px-3 py-4 text-sm  text-gray-500">{{
                number_format(($bill->bill-$bill->initial_payment), 2) }}</td>

        </tr>

    </tbody>

    @endforeach
    @else
    NA
    @endif

    @empty

    @endforelse
    <tr>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{number_format($bills->sum('bill'),2) }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{number_format($bills->sum('initial_payment'),2) }}</td>
        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{number_format($bills->sum('bill') - $bills->sum('initial_payment') ,2)}}</td>

    </tr>

</table>