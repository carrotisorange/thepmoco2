<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>Unit #</x-th>
            <x-th>Date Paid</x-th>
            <x-th>CV No</x-th>
            <x-th>Cheque No</x-th>
            <x-th>Particular</x-th>
            <x-th>Period Covered</x-th>
            <x-th>Amount Collected</x-th>
            <x-th>Deductions</x-th>
            <x-th>Remittance</x-th>
        </tr>
    </thead>
    @foreach ($remittances as $remittance)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $remittance->unit->unit }}</x-td>
            <x-td>{{ Carbon\Carbon::parse($remittance->created_at)->format('M d, Y') }}</x-td>
            <x-td>{{ $remittance->cv_no }}</x-td>
            <x-td>{{ $remittance->check_no }}</x-td>
            <x-td>{{ $remittance->particular->particular }}</x-td>
               <?php
                    $billId = App\Models\Collection::where('property_uuid', $remittance->property_uuid)->where('ar_no', $remittance->ar_no)->value('bill_id');
                    $bill = App\Models\Bill::where('id', $billId);
                ;?>
            <x-td>{{ Carbon\Carbon::parse($bill->value('start'))->format('M d, Y') }}- {{ Carbon\Carbon::parse($bill->value('end'))->format('M d, Y') }}</x-td>
            <x-td>{{ number_format($remittance->monthly_rent, 2) }}</x-td>
            <x-td>{{ number_format($remittance->total_deductions, 2) }}</x-td>
            <x-td>{{ number_format($remittance->remittance, 2)}} </x-td>
        </tr>
    </tbody>
    @endforeach
    <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td><b>TOTAL</b></x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td></x-td>
                <x-td></x-td>

                <x-td></x-td>
                <x-td>{{ number_format($remittances->sum('monthly_rent'), 2) }}</x-td>
                <x-td>{{ number_format($remittances->sum('total_deductions'), 2) }}</x-td>
                <x-td>{{ number_format($remittances->sum('remittance'), 2)}} </x-td>
            </tr>
        </tbody>


</table>
