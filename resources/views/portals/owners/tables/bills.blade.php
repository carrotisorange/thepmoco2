<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>BILL #</x-th>
            <x-th>
                DATE POSTED</x-th>
            <x-th>
                UNIT</x-th>
            <x-th>
                PERIOD COVERED</x-th>
            <x-th>
                PARTICULAR</x-th>
            <x-th>
                AMOUNT DUE</x-th>
            <x-th>
                AMOUNT PAID</x-th>
            <x-th>
                BALANCE</x-th>
        </tr>
    </thead>
    @foreach ($bills as $bill)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $bill->bill_no }}</x-td>
            <x-td>
                {{Carbon\Carbon::parse($bill->created_at)->format('M d,
                Y')}}
            </x-td>
            <x-td>
                {{ $bill->unit->unit }}
            </x-td>
            <x-td>
                {{Carbon\Carbon::parse($bill->start)->format('M d,
                Y').'-'.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
            </x-td>
            <x-td>{{ $bill->particular->particular }}</x-td>
            <x-td>{{ number_format($bill->bill, 2) }}</x-td>
            <x-td>{{
                number_format($bill->initial_payment, 2)
                }}</x-td>
            <x-td>{{
                number_format(($bill->bill-$bill->initial_payment), 2) }}</x-td>

        </tr>
        @endforeach
        <tr>
            <x-td>
                Total
            </x-td>
            <x-td>
            </x-td>
            <x-td>
            </x-td>
            <x-td>
            </x-td>
            <x-td>
            </x-td>

            <x-td>{{number_format($bills->sum('bill'),2) }}</x-td>
            <x-td>{{number_format($bills->sum('initial_payment'),2)
                }}</x-td>
            <x-td>{{number_format($bills->sum('bill') -
                $bills->sum('initial_payment') ,2)}}</x-td>

        </tr>
    </tbody>

</table>