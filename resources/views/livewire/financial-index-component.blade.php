<div>

    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Financial Reports</h1>
                {{-- <p class="mt-2 text-sm text-gray-700">A table of placeholder stock market data that does not make
                    any
                    sense.
                </p> --}}
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button" wire:click="downloadFinancialReports" wire:loading.remove
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    <i class="fa-solid fa-download"></i> &nbsp
                    Download

                </button>

                <button type="button" wire:loading disabled wire:target="downloadFinancialReports"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    Loading...

                </button>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Description</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Estimated Monthly ({{ Carbon\Carbon::now()->format('Y') }})</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Estimated Yearly ({{ Carbon\Carbon::now()->format('Y') }})</th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                        Potential Gross Rent (total rent amount of rent per unit)
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($potential_gross_rent, 2) }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($potential_gross_rent*12, 2) }}</td>

                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                        Less Vacancy (total rent amount of vacant units)
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($less_vacancy, 2) }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($less_vacancy*12, 2) }}</td>

                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                        Effective Gross Rent (total rent amount of occupied units)
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($effective_gross_rent, 2) }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($effective_gross_rent*12, 2) }}</td>

                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                        Billed Rent (all posted rent)
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($billed_rent, 2) }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($billed_rent*12, 2) }}</td>

                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                        Collected Rent (all paid rent)
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($collected_rent, 2) }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($collected_rent*12, 2) }}</td>

                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                        Actual Revenue Collected (all collected payments)
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($actual_revenue_collected, 2) }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{
                                        number_format($actual_revenue_collected*12, 2) }}</td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>

        {{-- <div class="px-4 sm:px-6 lg:px-8">

            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            Operating Expense from Account Payables</th>
                                        <th scope="col"
                                            class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        </th>
                                    </tr>

                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            1.
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                            value
                                        </td>


                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Total Expense
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                            Value
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Net Profit
                                        </td>
                                        <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                            Value
                                        </td>
                                    </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 --}}

 <div class="py-4 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Property Finanacial Reporting</h1>

            </div>
            <!-- <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button" wire:click="downloadFinancialReports" wire:loading.remove
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    <i class="fa-solid fa-download"></i> &nbsp
                    Download

                </button>

                <button type="button" wire:loading disabled wire:target="downloadFinancialReports"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    Loading...

                </button>
            </div> -->
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                        I. Revenue (Collections)</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Particular</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">   
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        Particular</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        Amount</td>

                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">   
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        Particular</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        Amount</td>

                                </tr>

                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="font-bold text-base whitespace-nowrap px-2 py-3.5 text-left  text-gray-900 ">
                                        II. Gross Revenue (Collections)</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        </th>
                                    <th scope="col"
                                        class="font-bold text-base whitespace-nowrap px-2 py-3.5 text-left  text-gray-900">
                                        Amount</th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">   
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                       Tax Rate</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        Amount</td>

                                </tr>
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">   
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                       Net Revenue</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        Amount</td>

                                </tr>

                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                        III. Operating Expenses</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Particular</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">   
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                       Particular</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        Amount</td>

                                </tr>

                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">   
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                       Particular</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        Amount</td>

                                </tr>

                                <tr>
                                    <td class="font-bold text-base whitespace-nowrap py-2 pl-4 pr-3  text-gray-500 sm:pl-6">   
                                    Total Operating Expenses</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                      </td>
                                    <td class="font-bold text-base whitespace-nowrap px-2 py-2 text-gray-900">
                                    Amount</td>

                                </tr>

                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="font-bold text-base whitespace-nowrap px-2 py-3.5 text-left text-gray-900 ">
                                        IV. Net Income</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        </th>
                                    <th scope="col"
                                        class="font-bold text-base whitespace-nowrap px-2 py-3.5 text-left text-gray-900">
                                        Amount</th>

                                </tr>
                            </thead>
                            
                                
                              
                               
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Cashflow from operations</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                    <button type="button" wire:click="downloadCashflowReports" wire:loading.remove
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                        <i class="fa-solid fa-download"></i> &nbsp
                        Download

                    </button>

                    <button type="button" wire:loading disabled wire:target="downloadCashflowReports"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                        Loading...

                    </button>
                </div>

            </div>


            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                        <div class="sm:col-span-6">
                            <select id="small" wire:model="filter"
                                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">

                                <option value="daily">Daily</option>
                                <option value="monthly">Monthly</option>
                                <option value="yearly">Yearly</option>
                            </select>

                        </div>

                    </div>
                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">


                        @if($accountpayables->count() || $collections->count())

                        @include('tables.financials')
                        @else
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                            <<div class="mx-auto max-w-lg">
                                <h2 class="text-md font-medium text-gray-900">Cashflow from operations will be generated
                                    automatically when you do the following:</h2>
                                {{-- <p class="mt-1 text-sm text-gray-500">Get started by selecting a template or start
                                    from
                                    an
                                    empty project.</p> --}}
                                <ul role="list" class="mt-6 divide-y divide-gray-200 border-t border-b border-gray-200">
                                    <li>
                                        <div class="group relative flex items-start space-x-3 py-4">
                                            <div class="flex-shrink-0">
                                                <span
                                                    class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-pink-500">
                                                    <!-- Heroicon name: outline/megaphone -->
                                                    <i class="fa-solid fa-receipt"></i>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/property/{{ Session::get('property') }}/bill">
                                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                                        Bills
                                                    </a>
                                                </div>
                                                <p class="text-sm text-gray-500">Add bills to tenants and owners.
                                                </p>
                                            </div>
                                            <div class="flex-shrink-0 self-center">
                                                <!-- Heroicon name: mini/chevron-right -->
                                                <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="group relative flex items-start space-x-3 py-4">
                                            <div class="flex-shrink-0">
                                                <span
                                                    class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-purple-500">
                                                    <!-- Heroicon name: outline/command-line -->
                                                    <i class="fa-solid fa-coins"></i>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/property/{{ Session::get('property') }}/collection">
                                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                                        Collections
                                                    </a>
                                                </div>
                                                <p class="text-sm text-gray-500">Add the payments to the respective
                                                    tenants
                                                    and owners.</p>
                                            </div>
                                            <div class="flex-shrink-0 self-center">
                                                <!-- Heroicon name: mini/chevron-right -->
                                                <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="group relative flex items-start space-x-3 py-4">
                                            <div class="flex-shrink-0">
                                                <span
                                                    class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-yellow-500">
                                                    <!-- Heroicon name: outline/calendar -->
                                                    <i class="fa-solid fa-file-invoice"></i>
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/property/{{ Session::get('property') }}/accountpayable">
                                                        <span class="absolute inset-0" aria-hidden="true"></span>
                                                        Account Payables
                                                    </a>
                                                </div>
                                                <p class="text-sm text-gray-500">Make a request for purchase, payment,
                                                    and
                                                    refund.</p>
                                            </div>
                                            <div class="flex-shrink-0 self-center">
                                                <!-- Heroicon name: mini/chevron-right -->
                                                <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="mt-6 flex">
                                    <a href="/property/{{ Str::random(8) }}/create"
                                        class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                                        Or start from an empty property
                                        <span aria-hidden="true"> &rarr;</span>
                                    </a>
                                </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>