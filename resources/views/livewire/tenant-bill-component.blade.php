<div>
    Reference # : <b> {{ $tenant->bill_reference_no }}</b>, Security Deposit: <b> {{
        number_format(App\Models\Tenant::find($tenant->uuid)->wallets()->sum('amount'), 2) }}</b>

    <div class="mt-5">
        @if($bills)
        <x-form-select class="w-24" wire:model="status">
            <option value="" {{ $status=="" ? 'selected' : 'Select one' }}>show all bills</option>
            @foreach ($statuses as $item)
            <option value="{{ $item->status }}" {{ $status==$item->status ? 'selected' : 'selected' }}> show {{
                $item->status }} bills
            </option>
            @endforeach


        </x-form-select>
        @endif
    </div>

    <div class="mt-5">
        <div class="flex flex-row">
            <div class="basis-3/4">


                @can('treasury')
                    @if($total_unpaid_bills->sum('bill') && $selectedBills)
                    <x-button wire:click="payBills">Pay Bills</x-button>
                    <div class="mt-5">
                        <span>You've selected <b>{{ count($selectedBills) }}</b> {{ Str::plural('bill', count($selectedBills))}}
                            amounting to <b>{{ number_format($total) }}</b></span>
                    </div>
                    @else
                    <div class="mt-1">
                        <b>Please check the bill you want to pay</b>
                    </div>
                    @endif
                @endcan

            </div>
            <div class="basis-1/4 ml-12 text-right">
                @can('accountowner')
                @if($selectedBills)
                <x-button
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    title="remove selected bills" onclick="confirmMessage()" wire:click="removeBills()">
                    Remove
                    bills ({{ count($selectedBills) }})
                </x-button>
                @endif
                @endcan
            </div>
        </div>
    </div>
    {{ $bills->links() }}
    <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                           <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <?php $ctr =1; ?>
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>
                                            {{--
                                            <x-input id="" wire:model="selectAll" type="checkbox" /> --}}
                                        </x-th>
                                        <x-th>Bill #</x-th>
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
                                            @if($item->status != 'paid')
                                            <x-input type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                                            @endif
                                        </x-td>
                                        <x-td>{{ $item->bill_no }}</x-td>
                                        <x-td> <a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}"><b
                                                    class="text-blue-600">{{ $item->unit->unit}} </b></a></x-td>
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
                                            <span title="unpaid" class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                <i class="fa-solid fa-circle-xmark"></i>
                                            </span>
                                            @endif
                            
                                            @if($item->description === 'movein charges' && $item->status==='unpaid')
                                            <span title="urgent"
                                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
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
                                                <x-button onclick="confirmMessage()"><i class="fa-solid fa-trash-can"></i></x-button>
                                            </form>
                                        </x-td> --}}
                            
                                        @empty
                                        <x-td>
                                            No data found.
                                        </x-td>
                                    </tr>
                                    @endforelse
                                    <tr>
                                        <x-td>Total</x-td>
                                        <x-td></x-td>
                                        <x-td></x-td>
                                        <x-td></x-td>
                                        <x-td></x-td>
                                        <x-td>{{number_format($bills->sum('bill'),2) }}</x-td>
                                        <x-td>{{number_format($bills->sum('initial_payment'),2) }}</x-td>
                                        <x-td>{{number_format($bills->sum('bill') - $bills->sum('initial_payment') ,2)
                                            }}</x-td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.notifications')
</div>