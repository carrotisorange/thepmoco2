<div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
    Reference # : <b> {{ $tenant->bill_reference_no }}</b>,
    Total Unpaid Bills: <b> {{ number_format($bills->where('status',
        'unpaid')->sum('bill'),
        2)}}</b>,
    Total Paid Bills: <b> {{ number_format($bills->where('status',
        'paid')->sum('bill'),
        2)}}</b>

    <div class="mt-5">
        @if($selectedBills)
        <x-button onclick="confirmMessage()" wire:click="deleteBills()"><i class="fa-solid fa-trash"></i>&nbsp
            Remove ({{ count($selectedBills) }})
        </x-button>

        <x-button wire:click="$emit('create-collection-modal', 'edit-user')" ><i class="fa-solid fa-cash-register"></i>&nbsp
            Pay ({{ count($selectedBills) }})
        </x-button>


        @endif
    </div>
    {{ $bills->links() }}
    <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <?php $ctr =1; ?>
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>
                                            <x-input id="" wire:model="selectAll" type="checkbox" />
                                        </x-th>
                                        <x-th>Bill #</x-th>
                                        <x-th>Unit</x-th>
                                        <x-th>Particular</x-th>
                                        <x-th>Period</x-th>
                                        <x-th>Amount</x-th>
                                        <x-th>Status</x-th>
                                        {{-- <x-th></x-th> --}}
                                    </tr>
                                </thead>
                                @forelse ($bills as $item)
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <x-td>
                                            <x-input type="checkbox" wire:model="selectedBills"
                                                value="{{ $item->id }}" />
                                        </x-td>
                                        <x-td>{{ $item->bill_no }}</x-td>
                                        <x-td>{{$item->unit->unit }}</x-td>
                                        <x-td>{{$item->particular->particular }}</x-td>
                                        <x-td>{{Carbon\Carbon::parse($item->start)->format('M d,
                                            Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}</x-td>
                                        <x-td>{{number_format($item->bill,2) }}</x-td>
                                        <x-td>
                                            @if($item->status === 'paid')
                                            <span
                                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                <i class="fa-solid fa-circle-check"></i> {{
                                                $item->status }}
                                                @else
                                                <span
                                                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                                    <i class="fa-solid fa-clock"></i> {{
                                                    $item->status }}
                                                </span>
                                                @endif
                                        </x-td>
                                        {{-- <x-td>
                                            <form method="POST" action="/bill/{{ $item->id }}/delete">
                                                @csrf
                                                @method('delete')
                                                <x-button onclick="confirmMessage()"><i
                                                        class="fa-solid fa-trash-can"></i></x-button>
                                            </form>
                                        </x-td> --}}

                                        @empty
                                        <x-td>No data found!</x-td>
                                        @endforelse
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('utilities.create-collection-modal')