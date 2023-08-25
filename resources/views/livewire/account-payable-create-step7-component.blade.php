<div>
    <div class="mx-10">

        <div class="px-4 sm:px-6 lg:px-8">

            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
<table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Batch No
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $accountpayableliquidation->batch_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Date
                                        Requested
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        Carbon\Carbon::parse($accountpayableliquidation->created_at)->format('M d, Y')
                                        }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Prepared
                                        by
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        App\Models\User::find($accountpayableliquidation->prepared_by)->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Name
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        $accountpayableliquidation->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Department/Section
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                        $accountpayableliquidation->department }}</td>
                                </tr>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Unit
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($accountpayableliquidation->unit_uuid)
                                        {{ App\Models\Unit::find($accountpayableliquidation->unit_uuid)->unit }}
                                        @else
                                        NA
                                        @endif
                                    </td>
                                </tr>
                                
                            </thead>
                        
                        </table>
                    </div>
                </div>
            </div>
            <h1 class="py-8 font-semibold">Particulars</h1>
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
            <div class="mt-2 flex justify-end">
                <div>
                    <p class="mt-5 px-6 text-right">

                        {{-- <button type="button" wire:click="exportRFP"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                            Export
                        </button>

                        <button type="button" wire:click="submitForm"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                            Finish
                        </button> --}}



                    </p>
                </div>
            </div>
        </div>

    </div>
    @include('layouts.notifications')
</div>