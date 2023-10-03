<div>
    <div class="mx-10">
        <form wire:submit.prevent="finishChartOfAccount">
            <div class="px-4 sm:px-6 lg:px-8">

                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Batch No
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $accountpayableliquidation->batch_no }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Date
                                            Requested
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                            Carbon\Carbon::parse($accountpayableliquidation->created_at)->format('M d,
                                            Y')
                                            }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Prepared
                                            by
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                            App\Models\User::where('id', $accountpayableliquidation->prepared_by)->pluck('name')->first() }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Name
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                            $accountpayableliquidation->name }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Department/Section
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                            $accountpayableliquidation->department }}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Unit
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if($accountpayableliquidation->unit_uuid)
                                            {{ App\Models\Unit::find($accountpayableliquidation->unit_uuid)->unit }}
                                            @else
                                            NA
                                            @endif
                                        </td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Approved
                                            by
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if($accountpayableliquidation->approved_by)
                                            {{ App\Models\User::find($accountpayableliquidation->approved_by)->name }}
                                            @else
                                            NA
                                            @endif
                                        </td>
                                    </tr> --}}
                                </thead>

                            </table>
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
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            #
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Unit</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Vendor
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">OR
                                            Number
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Item</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Quantity
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Amount
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Total</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Expense Type</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($particulars as $index => $particular)
                                    <div wire:key="particular-field-{{ $particular->id }}">
                                    <tr>
                                        <td
                                            class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                            {{ $index+1 }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if($particular->vendor_id)
                                            {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                                            @else
                                            NA
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if($particular->unit_uuid)
                                            {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                                            @else
                                            NA
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $particular->or_number }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $particular->item }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $particular->quantity }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ number_format($particular->price, 2) }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ number_format($particular->total, 2) }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500" wire:model="particulars.{{ $index }}.expense_type_id"
                                        wire:change="updateLiquidation({{ $particular->id }})">
                                        
                                         <x-form-select >
                                        @foreach ($expense_types as $expense_type)
                                        {{-- <option value="">Select one</option> --}}
                                        <option value="{{ $expense_type->id }}" {{ 'particulars'.$index.'expense_type_id'===$expense_type->id? 'selected' : '' }}>{{
                                            $expense_type->expense_type }}
                                        </option>
                                        @endforeach
                                           
                                        </x-form-select>
                                           
                                        </td>
                                        </div>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Total
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            {{
                                            number_format($particulars->sum('total'),2) }}
                                        </th>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
               <div>
                        <div class="cols-start-3 mt-10 space-y-3 0 pb-3 sm:space-y-0 sm:divide-y sm:pb-0">
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-3">
                                <label for="total" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Liquidation
                                    Total</label>
                                <div class="mt-2 sm:col-start-3 sm:mt-0">
                                    {{ number_format($total,2) }}
                                </div>
                            </div>
                    
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="cash_advance" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Cash
                                    Advance</label>
                                CV Number: {{ $cv_number }}
                             
                                <div class="mt-2 sm:col-start-3 sm:mt-0">
                    
                                    <input id="cash_advance" name="cash_advance" type="number" step="0.001" autocomplete="cash_advance"
                                        wire:model="cash_advance" disabled
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                                    @error('cash_advance')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                    
                    
                    
                            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                                <label for="total_amount" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Total
                                    Return</label>
                    
                    
                                <div class="mt-2 sm:col-start-3 sm:mt-0">
                                    <div class="mt-2 sm:col-start-3 sm:mt-0">
                                        {{ number_format((double)$total-(double)$cash_advance,2) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    
                    
                        <div>
                            <p class="mt-5 px-6 text-right">
                                
                                <a target="_blank" href="/property/{{ Session::get('property_uuid')}}/accountpayable/{{ $accountpayable->id }}/export/complete" wire:loading.remove 
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                    Export 
                                </a>

                                <button type="submit" wire:loading.remove
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                    Finish
                                </button>
                    
                                <button type="button" wire:loading disabled 
                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                    Loading...
                                </button>
                    
                    
                            </p>
                        </div>
                    
                        <!-- /approval section -->
                    
                    </div>
            </div>
        </form>
    </div>

</div>