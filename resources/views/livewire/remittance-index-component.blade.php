<div>
        <div class="sm:flex sm:items-center justify-between pb-8">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Remittances</h1>
               <button type="button" data-modal-toggle="instructions-create-remittance-modal"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                    type="button">Create remittance
                </button>
            </div>
            <div class="flex justify-end">
               
                <p class="text-sm font-light">Filter by Month:</p>

                <select id="small" wire:model="created_at"
                    class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

                   @foreach ($dates as $date)
                        <option value="{{ $date->created_at }}">{{ Carbon\Carbon::parse($date->created_at)->format('M, Y') }}</option>
                   @endforeach
                </select>

            </div>
        </div>



        <div class="pb-16">
            <div class="outer-wrapper">
                <div class="table-wrapper">
                    <table style="overflow: scroll;">
                        <thead>
                          
                            <th>Unit #</th>
                            <th>Date Paid</th>
                            <th>AR #</th>
                            <th>Particulars</th>
                   
                            <th>Owner Name</th>
                            <th>Payee Name</th>
                            <th>Monthly Rent</th> <!-- AUTO COMPUTE -->
                            <th>Net Rent </th> <!-- MANAGEMENT FEE + NET RENT -->
                            <th>Management Fee</th> <!-- FROM COLLECTION -->
                            <th>Marketing Fee</th>
                            <th class="bg-yellow-300">Bank Transfer Fee</th>
                            <th class="bg-yellow-300">Purchased Materials/Unit Repairs/Others</th>
                            <th class="bg-yellow-300">Unit Owner Membership Fee </th>
                            <th class="bg-yellow-300">CONDO DUES</th>
                            <th class="bg-yellow-300">PARKING DUES</th>
                            <th class="bg-yellow-300">WATER</th>
                            <th class="bg-yellow-300">ELECTRICITY</th>
                            <th class="bg-yellow-300">GENERATOR SHARE</th>
                            <th class="bg-yellow-300">SURCHARGES OF UNIT OWNER</th>
                            <th class="bg-yellow-300">BUILDING INSURANCE</th>
                            <th class="bg-yellow-300">REAL PROPERTY TAX - COMMON AREA</th>
                            <th class="bg-yellow-300">HOUSEKEEPING FEE</th>
                            <th class="bg-yellow-300">LAUNDRY FEE</th>
                            <th class="bg-yellow-300">COMPLIMENTARY</th>
                            <th class="bg-yellow-300">INTERNET</th>
                            <th class="bg-yellow-300">SPECIAL ASSESSMENT</th>
                            <th class="bg-yellow-300">MATERIALS RECOVERY FACILITY</th>
                            <th class="bg-yellow-300">RECHARGE OF FIRE EXTINGUISHER</th>
                            <th class="bg-yellow-300">ENVIRONMENTAL FEE</th>
                            <th class="bg-yellow-300">BLADDER TANK</th>
                            <th class="bg-yellow-300">CAUSE OF MAGNET</th>
                            <th>TOTAL DEDUCTIONS</th>
                            <th>REMITTANCE</th>
                            <th>CV NO.</th>
                            <th>Check No</th>
                        </thead>
                        <tbody>
                           @foreach ($remittances as $index => $remittance)
                               <tr>
                                  
                                    <td class="sticky-col first-col">{{ $remittance->unit->unit }}</td>
                                    <td class="sticky-col second-col">{{ Carbon\Carbon::parse($remittance->created_at)->format('M d, Y') }}</td>
                                    <td class="sticky-col third-col">{{ $remittance->ar_no }}</td>
                                    <td class="sticky-col fourth-col">{{ $remittance->particular->particular }}</td>
                                    <td class="sticky-col fifth-col">{{ $remittance->owner->owner }}</td>
                                    <td class="sticky-col sixth-col">{{ $remittance->payee->tenant }}</td>
                                    <td>{{ number_format($remittance->monthly_rent, 2) }}</td>
                                    <td>{{ number_format($remittance->net_rent, 2) }}</td>
                                    <td>{{ number_format($remittance->management_fee, 2) }}</td>
                                    <td>{{ number_format($remittance->marketing_fee, 2) }}</td>
                                    <td>Value 11</td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                                    <td><input></input></td>
                            
                                    <td>{{ number_format($remittance->total_deductions, 2) }}</td>
                                    <td>{{ number_format($remittance->remittance, 2) }}</td>
                                    <td><input></input></td>
                                    <td>Value 35</td>
                               
                                </tr>
                           @endforeach
                    </table>
                </div>
            </div>
        </div>
        @include('modals.instructions.create-remittance-modal')
</div>
