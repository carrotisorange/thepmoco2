<div>
    Reference # : <b> {{ $tenant->bill_reference_no }}</b>, Deposits: <b> {{
        number_format(App\Models\Tenant::find($tenant->uuid)->collections()->where('is_deposit',
        '1')->sum('collection'), 2) }}</b>

    {{-- <div class="mt-1">
        Total Bills: <b> {{ number_format(($total_bills->sum('bill')),2)}}</b>,
        Total Unpaid Bills: <b> {{ number_format(($total_unpaid_bills->sum('bill') -
            $total_unpaid_bills->sum('initial_payment')),2)}}</b>,
        Total Paid Bills: <b> {{ number_format($total_paid_bills->sum('initial_payment'),2)}}</b>
    </div> --}}
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
                <x-button id="dropdownButton" data-dropdown-toggle="billsOptionsDropdown" type="button">Bills <svg
                        class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg></x-button>

                <div id="billsOptionsDropdown"
                    class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1" aria-labelledby="billsOptionsDropdown">
                        @can('billing')
                        @if($total_unpaid_bills->count())
                        <li>
                            <a href="#/" data-modal-toggle="export-bill-modal"
                                class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Export Unpaid Bills ({{
                                App\Models\Tenant::find($tenant->uuid)->bills()->where('status', '!=','paid')->count()
                                }})
                            </a>
                        </li>
                        <li>
                            <a href="#/" data-modal-toggle="send-bill-modal"
                                class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Send Unpaid Bills ({{ App\Models\Tenant::find($tenant->uuid)->bills()->where('status',
                                '!=', 'paid')->count() }})
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="#/" data-modal-toggle="create-bill-modal"
                                class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Create a Bill
                            </a>
                        </li>
                        <li>
                            <a href="#/" data-modal-toggle="create-particular-modal"
                                class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Create a Particular
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>

                @can('treasury')
                @if($total_unpaid_bills->sum('bill') && $selectedBills)
                {{-- <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/bill'">POa
                </x-button> --}}
                {{-- <x-button
                    wire:click="$emit('openModal', 'collection-modal-component', {{ json_encode(['tenant' => $tenant->uuid, 'selectedBills' => $selectedBills, 'total' => $total]) }})">
                    Create a payment
                </x-button> --}}

                <x-button wire:click="payBills">Pay Bills</x-button>
                <div class="mt-5">
                    <span>You've selected {{ count($selectedBills) }} {{ Str::plural('bill', count($selectedBills))}}
                        amounting to {{ number_format($total) }}</span>...
                </div>

                @endif
                @endcan

            </div>
            <div class="basis-1/4 ml-12 text-right">
                @can('accountowner')
                @if($selectedBills)
                <x-button title="remove selected bills" onclick="confirmMessage()" wire:click="removeBills()">
                    Remove
                    bills ({{ count($selectedBills) }})
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
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <?php $ctr =1; ?>
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>
                                            {{--
                                            <x-input id="" wire:model="selectAll" type="checkbox" /> --}}
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
                                            @if($item->status != 'paid')
                                            <x-input type="checkbox" wire:model="selectedBills"
                                                value="{{ $item->id }}" />
                                            @endif
                                        </x-td>
                                        <x-td>{{ $item->bill_no }}</x-td>
                                        <x-td> <a
                                                href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}"><b
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
                                            <span title="unpaid"
                                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
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
                                                <x-button onclick="confirmMessage()"><i
                                                        class="fa-solid fa-trash-can"></i></x-button>
                                            </form>
                                        </x-td> --}}

                                        @empty
                                        <x-td>
                                            No data found!
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