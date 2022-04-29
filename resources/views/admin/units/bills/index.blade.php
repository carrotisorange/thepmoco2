<div class="mb-3 mt-5">
    <span>{{ Str::plural('Bill', $bills->count())}} ({{ $bills->count()
        }})</span>
</div>
<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Reference No</x-th>
                <x-th>Payee</x-th>
                <x-th>Bill No</x-th>
                <x-th>Particular</x-th>
                <x-th>Amount</x-th>
                <x-th>Status</x-th>
            </tr>
        </thead>
        @forelse ($bills as $bill)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>{{ $bill->reference_no}}</x-td>
                <x-td>@if($bill->tenant_uuid)
                    {{ $bill->tenant->tenant}} (<span>T</span>)
                    @else
                    {{ $bill->owner->owner}}
                    @endif</x-td>
                <x-td>{{ $bill->bill_no}}</x-td>
                <x-td>{{ $bill->particular->particular}}</x-td>
                <x-td>{{ number_format($bill->bill, 2) }}</x-td>
                <x-td>@if($bill->status === 'paid')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $bill->status }}
                        @else
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i> {{
                            $bill->status }}
                        </span>
                        @endif
                </x-td>
            </tr>

            @empty
            <tr>
                <span>No bills found!</span>
            </tr>

            @endforelse
        </tbody>
    </table>

</div>