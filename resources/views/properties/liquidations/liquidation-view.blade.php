<x-new-layout>


<div class="mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
    <div class="pt-6 pb-3 flex justify-between">
        <h1 class="text-xl font-medium mx-8">Liquidation Details</h1>
        <div class="flex justify-end space-x-4"> 
            <button class="px-3 py-2 rounded-lg bg-purple-500 text-sm text-white">Export</button>
            <button class="px-3 py-2 rounded-lg bg-purple-500 text-sm text-white">Send Email</button>
            <button class="px-3 py-2 rounded-lg bg-purple-500 text-sm text-white">Save</button>
        </div>
    </div>
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
               
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Batch No
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Date
                                        created
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                       
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Name
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Department/Section
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                     
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Unit
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    
                                    </td>
                                </tr>

                            </thead>

                        </table>
                    </div>
                </div>
            </div>

        <h1 class="py-8 ml-4 font-semibold">Particulars</h1>
        <table class="w-full mb-10 text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
            
                    <x-th>#</x-th>
                    <x-th>Unit</x-th>
                    <x-th>Vendor</x-th>         
                    <x-th>OR Number</x-th>
                    <x-th>Item</x-th>
                    <x-th>Quantity</x-th>
                    <x-th>Amount total</x-th>
                    <x-th>Expense Type</x-th>
                </tr>
            </thead>
             <tbody class="bg-white divide-y divide-gray-200">
                <tr>          
                    <x-td>Value</x-td>
                    <x-td>Value</x-td>
                    <x-td>Value</x-td>
                    <x-td>Value</x-td>
                    <x-td>Value</x-td>
                    <x-td>Value</x-td>
                    <x-td>Value</x-td>
                    <x-td>
                        <select class="text-sm rounded-lg">
                            <option value="">MRF </option>
                            <option value="">Fire Extinguisher</option>
                            <option value="">Cable and Internet</option>
                            <option value="">Environmental Fee</option>
                            <option value="">Bladdet Tank</option>
                            <option value="">Cause of Magnet</option>
                            <option value="">Special Assessment</option>
                            <option value="">Surcharges</option>
                            <option value="">Building Insurance</option>
                            <option value="">Reconnection Fee</option>
                            <option value="">Condo Dues</option>
                            <option value="">Real Property Tax</option>
                            <option value="">Salaries and Wages</option>
                            <option value="">Employees Benefits</option>
                            <option value="">Housekeeping and Janitorial</option>
                            <option value="">Facilities Maintenance</option>
                            <option value="">Electrical Systems</option>
                            <option value="">Mechanical System</option>
                            <option value="">Fire Protection System</option>
                            <option value="">Auxiliary System</option>
                            <option value="">Building Interior and Exterior</option>
                            <option value="">STP</option>
                            <option value="">Refills & Lights Replacements</option>
                            <option value="">Permit/ Fees/ Taxes</option>
                            <option value="">Professional Fees</option>
                            <option value="">Software Maintenance</option>
                            <option value="">Transportation</option>
                            <option value="">Communication</option>
                            <option value="">Internet </option>
                            <option value="">Representation</option>
                            <option value="">Registration</option>
                            <option value="">Depreciation Expense</option>
                            <option value="">Precentage Tax
                            <option value="">Value Added Tax</option>
                            <option value="">Income Tax</option>
                            <option value="">Office Supplies</option>
                            <option value="">Miscellaneous Expense</option>
                    </select>
                </x-td>  
            </tbody>
        </table>

        <div>
            <div class="cols-start-3 mt-10 space-y-3 0 pb-3 sm:space-y-0 sm:divide-y sm:pb-0">
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-3">
                    <label for="total" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Liquidation
                        Total</label>
                    <div class="mt-2 sm:col-start-3 sm:mt-0">
                     
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="cash_advance" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Cash
                        Advance</label>
                    CV Number: 
                    <input id="cash_advance" name="cash_advance" step="0.001" type="number" placeholder="CV NUMBER"
                        autocomplete="cv_number" wire:model="cv_number"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
              
                    <p class="text-red-500 text-xs mt-2"></p>
              
                    <div class="mt-2 sm:col-start-3 sm:mt-0">

                      
                        <p class="text-red-500 text-xs mt-2"></p>
                     
                    </div>
                </div>



                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="total_amount" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Total
                        Return</label>


                    <div class="mt-2 sm:col-start-3 sm:mt-0">
                        <div class="mt-2 sm:col-start-3 sm:mt-0">
                           
                        </div>
                    </div>
                </div>
            </div>




    </div>
</div>

</x-new-layout>