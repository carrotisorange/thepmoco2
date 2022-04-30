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
        @forelse ($bills as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>{{ $item->reference_no}}</x-td>
                <x-td>@if($item->tenant_uuid)
                    {{ $item->tenant->tenant}} (<span>T</span>)
                    @else
                    {{ $item->owner->owner}}
                    @endif</x-td>
                <x-td>{{ $item->bill_no}}</x-td>
                <x-td>{{ $item->particular->particular}}</x-td>
                <x-td>{{ number_format($item->bill, 2) }}</x-td>
                <x-td>@if($item->status === 'paid')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $item->status }}
                        @else
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i> {{
                            $item->status }}
                        </span>
                        @endif
                </x-td>
                @empty
                <x-td>No data found!</x-td>
                @endforelse
            </tr>
        </tbody>
    </table>

</div>