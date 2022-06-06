<div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
    Reference # : <b> {{ $tenant->bill_reference_no }}</b>,
    Total Bills: <b> {{ number_format(($total_bills->sum('bill')),2)}}</b>,
    Total Unpaid Bills: <b> {{ number_format(($total_unpaid_bills->sum('bill') -
        $total_unpaid_bills->sum('initial_payment')),2)}}</b>,
    Total Paid Bills: <b> {{ number_format($total_paid_bills->sum('initial_payment'),2)}}</b>
    <div class="mt-5">
        @if($bills)
        <x-form-select class="w-24" wire:model="status">
            <option value="" {{ $status=="" ? 'selected' : 'Select one' }}>show all bills</option>
            @foreach ($statuses as $item)
               <option value="{{ $item->status }}" {{ $status == $item->status ? 'selected' : 'selected' }}> show {{ $item->status }} bills
                </option>
            @endforeach
          
        
        </x-form-select>
        @endif
    </div>

    <div class="mt-5">
        <div class="flex flex-row">
            <div class="basis-3/4">
                
                @if($total_unpaid_bills->count())
                @can('billing')
                <x-button title="export unpaid bills" data-modal-toggle="export-bill-modal">
                    <i class="fa-solid fa-download"></i>&nbsp
                    Bills ({{ $total_unpaid_bills->count() }})
                </x-button>
                @endcan
                {{-- <x-button title="send unpaid bills" data-modal-toggle="send-bill-modal">
                 <i class="fa-solid fa-paper-plane"></i>&nbsp
                    Bills ({{ $total_unpaid_bills->count() }})
                </x-button> --}}
                @endif

                @if($total_count)
                @can('manager')
                <x-button onclick="confirmMessage()" wire:click="unpayBills()"><i
                        class="fa-solid fa-rotate-right"></i>&nbsp
                    Mark as Unpaid ({{ $total_count }})
                </x-button>
                @endcan
                @endif

                @can('treasury')
                @if($total_unpaid_bills->sum('bill') && $selectedBills)
                <x-button
                    wire:click="$emit('openModal', 'collection-modal-component', {{ json_encode(['tenant' => $tenant->uuid, 'selectedBills' => $selectedBills, 'total' => $total]) }})">
                    <i class="fa-solid fa-circle-plus"></i>&nbsp Payment ({{ number_format($total, 2) }})
                </x-button>
                @endif
                @endcan
            </div>
            <div class="basis-1/4 ml-12 text-right">
                @can('manager')
                @if($selectedBills)
                <x-button title="remove selected bills" onclick="confirmMessage()" wire:click="removeBills()"><i class="fa-solid fa-trash"></i>&nbsp
                    Remove ({{ count($selectedBills) }})
                </x-button>
              
                @endif
                @endcan
            </div>
        </div>
    </div>

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
                                        <x-th> #</x-th>
                                        <x-th>Unit</x-th>
                                        <x-th>Particular</x-th>
                                        <x-th>Period</x-th>
                                        <x-th>Amount Due</x-th>

                                        <x-th>Amount Paid</x-th>
                                        <x-th>Balance</x-th>
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
                                        <x-td>{{number_format($item->bill,2) }}
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
                                            <span title="urgent" class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                               <i class="fa-solid fa-bolt"></i>
                                            </span>
                                            @endif
                                        </x-td>
                                        <x-td>{{ number_format($item->initial_payment, 2) }}</x-td>
                                        <x-td>{{ number_format(($item->bill-$item->initial_payment), 2) }}</x-td>
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