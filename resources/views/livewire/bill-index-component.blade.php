<div class="">
    <x-search placeholder="Search for reference no..."></x-search>
    <div class="mt-2 mb-2">
        {{ $bills->links() }}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>
                        <x-input id="" wire:model="selectAllBills" type="checkbox" />
                    </x-th>
                    {{-- <x-th>#</x-th> --}}
                    <x-th>Bill #</x-th>
                    <x-th>Date posted</x-th>
                    <x-th>Tenant</x-th>
                    <x-th>Unit</x-th>
                    <x-th>Period Covered</x-th>
                    <x-th>Particular</x-th>
                    <x-th>Amount Due</x-th>
                    <x-th>Amount Paid</x-th>
                    <x-th>Balance</x-th>
                </tr>
            </thead>
            @forelse ($bills as $index => $item)
            <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <tr>
                    <x-td>
                        <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                    </x-td>
                    {{-- <x-td>{{ $index + $bills->firstItem() }}</x-td> --}}
                    <x-td>{{ $item->bill_no}}</x-td>
                    <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, y') }}</x-td>
                    <?php
                                $tenant = App\Models\Tenant::find($item->tenant_uuid)->tenant;
                                $unit = App\Models\Unit::find($item->unit_uuid)->unit
                            ?>
                    <x-td><a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}/bills"><b class="text-blue-600">{{ $tenant
                                }}</b></a>
                    </x-td>
                    <x-td>{{ $unit }}</x-td>
                    <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                        y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}</x-td>
                    <x-td>{{ $item->particular->particular}}</x-td>
                    <x-td>{{ number_format($item->bill, 2) }}

                        @if($item->status === 'paid')
                        <span title="paid"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i>
                        </span>
                        @elseif($item->status === 'partially_paid')
                        <span title="partially_paid"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i>
                        </span>
                        @else
                        <span title="unpaid"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </span>
                        @endif

                        @if($item->description === 'movein charges')
                        <span title="urgent"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-bolt"></i>
                        </span>
                        @endif

                    </x-td>
                    <x-td>{{ number_format($item->initial_payment, 2) }}</x-td>
                    <x-td>{{ number_format(($item->bill-$item->initial_payment), 2) }}</x-td>
                </tr>
                @empty
                <tr>
                    <x-td>No data found.</x-td>
                </tr>
                @endforelse
                <tr>
                    <x-td></x-td>
                    <x-td>Total</x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td>{{ number_format($bills->sum('bill'), 2) }}</x-td>
                    <x-td>{{ number_format($bills->sum('initial_payment'), 2) }}</x-td>
                    <x-td>{{ number_format(($bills->sum('bill')-$bills->sum('initial_payment')), 2) }}</x-td>
                </tr>
            </tbody>

        </table>
    </div>
</div>