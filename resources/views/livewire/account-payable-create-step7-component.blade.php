<div>
    <div class="mx-10">
        <form wire:submit.prevent="finishChartOfAccount">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <x-table-component>
                                <x-table-head-component>
                                    <tr>
                                        <x-th >
                                            Batch No
                                        </x-th>
                                        <x-td >
                                            {{ $accountpayableliquidation->batch_no }}
                                        </x-td>
                                    </tr>
                                    <tr>
                                        <x-th >
                                            Date
                                            Requested
                                        </x-th>
                                        <x-td >{{
                                            Carbon\Carbon::parse($accountpayableliquidation->created_at)->format('M d,
                                            Y')
                                            }}</x-td>
                                    </tr>
                                    <tr>
                                        <x-th >
                                            Prepared
                                            by
                                        </x-th>
                                        <x-td >{{
                                            App\Models\User::where('id',
                                            $accountpayableliquidation->prepared_by)->pluck('name')->first() }}</x-td>
                                    </tr>
                                    <tr>
                                        <x-th >
                                            Name
                                        </x-th>
                                        <x-td >{{
                                            $accountpayableliquidation->name }}</x-td>
                                    </tr>
                                    <tr>
                                        <x-th >
                                            Department/Section
                                        </x-th>
                                        <x-td >{{
                                            $accountpayableliquidation->department }}</x-td>
                                    </tr>
                                </x-table-head-component>
                            </x-table-component>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="mt-5 sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Particulars</h1>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <x-table-component>
                                <x-table-head-component>
                                    <tr>
                                        <x-th >
                                            #
                                        </x-th>
                                        <x-th >
                                            Unit</x-th>
                                        <x-th >
                                            Vendor
                                        </x-th>
                                        <x-th >OR
                                            Number
                                        </x-th>
                                        <x-th >
                                            Item</x-th>
                                        <x-th >
                                            Quantity
                                        </x-th>
                                        <x-th >
                                            Amount
                                        </x-th>
                                        <x-th >
                                            Total</x-th>
                                        <x-th >
                                            Expense Type</x-th>
                                    </tr>
                                </x-table-head-component>
                                <x-table-body-component>
                                    @foreach($particulars as $index => $particular)
                                    <div wire:key="particular-field-{{ $particular->id }}">
                                        <tr>
                                            <x-td
                                                >
                                                {{ $index+1 }}</x-td>
                                            <x-td >
                                                @if($particular->vendor_id)
                                                {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                                                @else
                                                NA
                                                @endif
                                            </x-td>
                                            <x-td >
                                                @if($particular->unit_uuid)
                                                {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                                                @else
                                                NA
                                                @endif
                                            </x-td>
                                            <x-td >
                                                {{ $particular->or_number }}
                                            </x-td>
                                            <x-td >
                                                {{ $particular->item }}
                                            </x-td>
                                            <x-td >
                                                {{ $particular->quantity }}
                                            </x-td>
                                            <x-td >
                                                {{ number_format($particular->price, 2) }}
                                            </x-td>
                                            <x-td >
                                                {{ number_format($particular->total, 2) }}
                                            </x-td>
                                            <x-td
                                                wire:model="particulars.{{ $index }}.expense_type_id"
                                                wire:change="updateLiquidation({{ $particular->id }})">

                                                <x-form-select>
                                                    @foreach ($expense_types as $expense_type)
                                                    {{-- <option value="">Select one</option> --}}
                                                    <option value="{{ $expense_type->id }}" {{ 'particulars'
                                                        .$index.'expense_type_id'===$expense_type->id? 'selected' : ''
                                                        }}>{{
                                                        $expense_type->expense_type }}
                                                    </option>
                                                    @endforeach

                                                </x-form-select>

                                            </x-td>
                                    </div>
                                    </tr>
                                    @endforeach
                                    </x-table-body-component>
                                    <x-table-body-component>
                                    <tr>
                                        <x-th >Total  </x-th>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-th >{{   number_format($particulars->sum('total'),2) }} </x-th>
                                        <x-td ></x-td>
                                    </tr>
                                </x-table-body-component>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="cols-start-3 mt-10 space-y-3 0 pb-3 sm:space-y-0 sm:divide-y sm:pb-0">
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-3">
                            <x-label for="total">Liquidation Total</x-label>
                            <div class="mt-2 sm:col-start-3 sm:mt-0">
                                {{ number_format($total,2) }}
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <x-label for="cash_advance">Cash Advance</x-label>
                            CV Number: {{ $cv_number }}
                            <div class="mt-2 sm:col-start-3 sm:mt-0">
                                <x-form-input id="cash_advance" name="cash_advance" type="number" step="0.001" wire:model="cash_advance" disabled />
                                <x-validation-error-component name='cash_advance' />
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <x-label for="total_amount"  >Total Return</x-label>
                            <div class="mt-2 sm:col-start-3 sm:mt-0">
                                <div class="mt-2 sm:col-start-3 sm:mt-0">
                                    {{ number_format((double)$total-(double)$cash_advance,2) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="mt-5 px-6 text-right">
                            <a target="_blank"
                                href="/property/{{ Session::get('property_uuid')}}/rfp/{{ $accountpayable->id }}/export/complete"
                                class="w-64 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
                                bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Export
                            </a>
                            <x-button type="submit">
                                Finish
                            </x-button>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
