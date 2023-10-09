<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
                <div  class=" p-4 purple" id="remittance-summary" role="tabpanel"
                        aria-labelledby="remittance-summary-tab">

                        <div class="sm:flex sm:items-center justify-between space-x-6 pb-8">
                        <div class="underline text-sm text-purple-500">Go back to Unit</div>
                        <div class="px-8 text-xl font-medium">
                         Unit # Remittance
                        </div>

                            <div class="flex justify-end w-full px-10">
                                <p class="text-sm font-light">Filter by Month:</p>

                                    <select id="small" wire:model="filter"
                                        class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                            </div>

                            <button class="px-2 py-1 rounded-full text-sm text-center w-56 text-white bg-purple-500">Send to Owner</button>

                        </div>



                        <div>
                        

                            <div class="flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <div class="grid grid-cols-2">
                                        <p class="text-sm font-medium text-gray-900">Total Amount Collected
                                        </p>
                                        <p class="mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('monthly_rent') +
                                            $remittances->sum('marketing_fee') + $remittances->sum('management_fee'),
                                            2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <div class="grid grid-cols-2">
                                        <p class="text-sm font-medium text-gray-900">Total Rent
                                        </p>
                                        <p class="mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('monthly_rent'), 2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <div class="grid grid-cols-2">
                                        <p class="text-sm font-medium text-gray-900">Total Deductions
                                        </p>
                                        <p class="mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('total_deductions'), 2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center px-8 py-5 border-b">
                                <div class="w-0 flex-1 pt-0.5">
                                    <p class="flex-col mt-1 text-sm font-base text-gray-500">

                                    </p>
                                    <div class="grid grid-cols-3 space-x-5">

                                        <p class="ml-5 flex-col mt-1 text-sm font-base text-gray-500">
                                            Bank Transfer Fee
                                        </p>

                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('bank_transfer_fee'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Management Fee
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('management_fee'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Marketing Fee
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('marketing_fee'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Purchased Materials/Unit Repairs/Etc
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('miscellaneous_fee'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Membership Fee
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('membership_fee'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Condo Dues
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('condo_dues'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Parking Dues
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('parking_dues'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Water
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('water'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Electricity
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('electricity'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Generator Share
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('generator_share'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Surcharges
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('surcharges'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Building Insurance
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('building_insurance'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Real Property Tax
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('real_property_tax'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Housekeeping Fee
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('housekeeping_fee'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Laundry Fee
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('laundry_fee'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Complimentary
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Complimentary
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Internet
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('internet'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Special Assessment
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('special_assessment'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Materials Recovery Facility
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('materials_recovery_facility'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Recharge of Fire Extinguisher
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('recharge_of_fire_extinguisher'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Environmental Fee
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('environmental_fee'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Bladder Tank
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('bladder_tank'), 2)}}
                                        </p>

                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            Cause of Magnet
                                        </p>
                                        <input class="w-full text-xs border border-gray-400 py-2 my-2"></input>
                                        <p class="flex-col mt-1 text-sm font-base text-gray-500">
                                            {{ number_format($remittances->sum('cause_of_magnet'), 2)}}
                                        </p>









                                    </div>
                                </div>
                            </div>




                            <div class="flex items-center px-8 py-5">
                                <div class="w-0 flex-1 pt-0.5">
                                    <div class="grid grid-cols-2">
                                        <p class="text-sm font-medium text-gray-900">Total Remittance
                                        </p>
                                        <p class="mt-1 text-sm font-base text-gray-500">

                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                    </div>
    </div>

</x-new-layout>
