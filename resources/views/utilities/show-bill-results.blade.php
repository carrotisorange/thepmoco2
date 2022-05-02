<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-5">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="table-auto">

                    <thead class="bg-gray-50">
                        <tr>
                            <x-th>
                                <x-input id="" wire:model="selectAll" type="checkbox" />
                            </x-th>
                            {{-- <x-th>Bill #</x-th> --}}
                            <x-th>Ref #</x-th>
                            <x-th>Posted on</x-th>
                            <x-th>Period Covered</x-th>
                            {{-- <x-th>Payee</x-th> --}}
                            <x-th>Particular</x-th>
                            <x-th>Amount</x-th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($bills as $item)

                        <tr>
                            <x-td>
                                <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                            </x-td>
                            {{-- <x-td>{{ $item->bill_no}}</x-td> --}}
                            <x-td>{{ $item->reference_no}}</x-td>
                            <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</x-td>
                            {{-- <x-td>{{ $item->unit }}</x-td> --}}
                            <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d,
                                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}</x-td>
                            <x-td>{{ $item->particular->particular}}</x-td>
                            <x-td>{{ number_format($item->bill, 2) }}</x-td>
                          
                        </tr>
                        @empty
                        <tr>
                         
                            <x-td>No data found!</x-td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>