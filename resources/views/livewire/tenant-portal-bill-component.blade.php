<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Bills</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/payments/pending'">
                    View Pending Payments
                </x-button>

                @if($selectedBills)
                <x-button wire:click="payBills">
                    Pay Bills
                </x-button>
                @endif
            </div>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-4">
                @if( $selectedBills)
                <p class="mt-2 text-sm text-gray-500">
                    You've selected {{ count($selectedBills) }} {{ Str::plural('bill', count($selectedBills))}}
                    amounting to {{ number_format($total) }}...
                </p>
                @else
                <p class="mt-2 text-sm text-gray-500">
                    Please select the bills you want to pay.
                </p>
                @endif
            </div>

            <div class="sm:col-span-2">
                <x-form-select id="small" wire:model="status">
                    <option value="">Select a status</option>
                    @foreach ($statuses as $item)
                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                    @endforeach
                </x-form-select>

            </div>

        </div>
        <div class="mt-3 flex flex-col">
            <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="mb-10 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <x-table-component>
                            <x-table-head-component>
                                <tr>
                                    <x-th></x-th>
                                    <x-th>BILL #</x-th>
                                    <x-th>DATE POSTED</x-th>
                                    <x-th>UNIT</x-th>
                                    <x-th>PERIOD COVERED</x-th>
                                    <x-th>PARTICULAR</x-th>
                                    <x-th>AMOUNT DUE</x-th>
                                    <x-th>AMOUNT PAID</x-th>
                                    <x-th>BALANCE</x-th>
                                </tr>
                            </x-table-head-component>
                            <x-table-body-component>
                            @foreach ($bills as $item)
                               @if($item->particular_id != '71' && $item->particular_id != '72')
                                <tr>
                                    <x-td>
                                        @if(!App\Models\Collection::where('bill_id',$item->id)->posted()->sum('collection'))
                                            <x-input name="" type="checkbox" wire:model="selectedBills" value="{{ $item->id }}" />
                                        @endif
                                    </x-td>
                                    <x-td>{{ $item->bill_no}}</x-td>
                                    <x-td>{{  Carbon\Carbon::parse($item->created_at)->format('M d, y') }}</x-td>
                                    <x-td>
                                        {{ $item->unit->unit }}
                                    </x-td>
                                  <x-td>{{ Carbon\Carbon::parse($item->start)->format('M d, y').'-'.Carbon\Carbon::parse($item->end)->format('M d, y') }}</x-td>
                                <x-td>{{ $item->particular->particular}}</x-td>
                                   <x-td>
                                    {{ number_format($item->bill, 2) }}

                                        @if(App\Models\Collection::where('bill_id',
                                        $item->id)->posted()->sum('collection'))
                                        <span title="paid"
                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            <i class="fa-solid fa-circle-check"></i>
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

                                    <x-td>
                                        {{ number_format(App\Models\Collection::where('tenant_uuid', $item->tenant_uuid)->where('bill_id', $item->id)->posted()->sum('collection'), 2) }}
                                    </x-td>

                                    <x-td>{{ number_format((($item->bill)-App\Models\Collection::where('tenant_uuid', $item->tenant_uuid)->where('bill_id',$item->id)->posted()->sum('collection')), 2) }}</x-td>
                                </tr>
                                @endif
                            @endforeach
                            </x-table-body-component>
                            <x-table-body-component>
                            <tr>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td>{{number_format(App\Models\Bill::where('tenant_uuid',Session::get('tenant_uuid'))->posted()->sum('bill'), 2) }}</x-td>
                                <x-td>{{number_format(App\Models\Collection::where('tenant_uuid', Session::get('tenant_uuid'))->posted()->sum('collection'), 2) }}</x-td>
                                <x-td>{{number_format((App\Models\Bill::where('tenant_uuid',Session::get('tenant_uuid'))->posted()->sum('bill')-App\Models\Collection::where('tenant_uuid',Session::get('tenant_uuid'))->posted()->sum('collection')), 2) }}</x-td>
                            </tr>
                            </x-table-body-component>
                        </x-table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
