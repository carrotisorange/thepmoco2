<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                @if($propertyCollectionsCount)
                <x-button wire:click="export">
                    Export
                </x-button>
                @endif
            </div>
        </div>
        @if($propertyCollectionsCount)
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <x-label>Start</x-label>
                <x-form-input name="startDate" type="date" wire:model="startDate" />
            </div>
            <div class="sm:col-span-3">
                <x-label>End</x-label>
                <x-form-input name="endDate" type="date" wire:model="endDate" />
            </div>
        </div>

        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <x-table-component>
                        <table-head-component>
                            <tr>
                                <x-td><b>Collections</b></x-td>
                                <x-td></x-td>
                            </tr>
                        </table-head-component>
                        <table-head-component>
                            @foreach ($revenues as $index => $revenue)
                            <tr>
                                <x-td>{{ $revenue->particular }}</x-td>
                                <x-td>{{ number_format($revenue->amount, 2) }}</x-td>
                            </tr>
                            @endforeach
                        </table-head-component>
                        <table-head-component>
                            <tr>
                                <x-td><b>Gross Collections</b></x-td>
                                <x-td><b>{{ number_format($revenues->sum('amount'), 2) }}</b></x-td>
                            </tr>
                        </table-head-component>
                        <table-head-component>
                            <tr>
                                <x-td><b>Less Expenses</b></x-td>
                                <x-td></x-td>
                            </tr>
                        </table-head-component>
                        <table-head-component>
                            @foreach ($expenses as $index => $expense)
                            <tr>
                                <x-td>{{ $expense->particular }}</x-td>
                                <x-td>{{ number_format($expense->expense, 2) }}</x-td>
                            </tr>
                            @endforeach
                        </table-head-component>
                        <table-head-component>
                            <tr>
                                <x-td><b>Total Expenses</b></x-td>
                                <x-td><b>{{ number_format($expenses->sum('expense'), 2) }}</b></x-td>
                            </tr>
                        </table-head-component>
                        <table-head-component>
                            <tr>
                                <x-td><b>Net Collection</b></x-td>
                                <x-td><b>{{ number_format($revenues->sum('amount') - $expenses->sum('expense'), 2)  }}</b></x-td>
                            </tr>
                        </table-head-component>

                    </x-table-component>

                    <div class="mt-10">
                        <x-table-component>
                            <table-head-component>
                                <tr>
                                    <x-th>Description</x-th>
                                    <x-th>Estimated Monthly</x-th>
                                    <x-th>Estimated Yearly</x-th>
                                </tr>
                            </table-head-component>
                            <table-body-component>
                                <tr>
                                    <x-td> Potential Gross Rent <span title="total rent amount of rent per unit"><i class="fa-solid fa-circle-info"></i> </span> </x-td>
                                    <x-td>{{ number_format($potential_gross_rent, 2) }}</x-td>
                                    <x-td>{{ number_format($potential_gross_rent*12, 2) }}</x-td>
                                </tr>
                                <tr>
                                    <x-td> Less Vacancy <span title="total rent amount of vacant units"><i class="fa-solid fa-circle-info"></i>
                                        </span></x-td>
                                    <x-td>{{ number_format($less_vacancy, 2) }}</x-td>
                                    <x-td>{{ number_format($less_vacancy*12, 2) }}</x-td>

                                </tr>
                                <tr>
                                    <x-td>Effective Gross Rent <span title="total rent amount of occupied units"><i class="fa-solid fa-circle-info"></i> </span> </x-td>
                                    <x-td>{{number_format($effective_gross_rent, 2) }}</x-td>
                                    <x-td>{{ number_format($effective_gross_rent*12, 2) }}</x-td>
                                </tr>
                                <tr>
                                    <x-td>Billed Rent <span title="all posted rent"><i
                                                class="fa-solid fa-circle-info"></i>
                                        </span> </x-td>
                                    <x-td>{{ number_format($billed_rent, 2) }}</x-td>
                                    <x-td>{{ number_format($billed_rent*12, 2) }}</x-td>

                                </tr>
                                <tr>
                                    <x-td>Collected Rent <span title="all paid rent"><i class="fa-solid fa-circle-info"></i>
                                        </span> </x-td>
                                    <x-td>{{ number_format($collected_rent, 2) }}</x-td>
                                    <x-td>{{ number_format($collected_rent*12, 2) }}</x-td>

                                </tr>
                                <tr>
                                    <x-td>Actual Revenue <span title="all collected payments"><i class="fa-solid fa-circle-info"></i> </span>
                                    </x-td>
                                    <x-td>{{ number_format($actual_revenue_collected, 2) }}</x-td>
                                    <x-td>{{ number_format($actual_revenue_collected*12, 2) }}</x-td>
                                </tr>
                            </table-body-component>
                        </x-table-component>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
            <div class="mx-auto max-w-lg">
                <h2 class="text-md font-medium text-gray-900">Financials will be generated
                    automatically when you do the following:</h2>

                <ul role="list" class="mt-6 divide-y divide-gray-200 border-t border-b border-gray-200">
                    <li>
                        <div class="group relative flex items-start space-x-3 py-4">
                            <div class="flex-shrink-0">
                                <span class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-pink-500">
                                    <!-- Heroicon name: outline/megaphone -->
                                    <i class="fa-solid fa-receipt"></i>
                                </span>
                            </div>
                            <div class="min-w-0 flex-1">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="/property/{{ Session::get('property_uuid') }}/bill">
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
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
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
                                    <a href="/property/{{ Session::get('property_uuid') }}/collection">
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
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
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
                                    <a href="/property/{{ Session::get('property_uuid') }}/rfp">
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
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="mt-6 flex">
                    <a href="/property" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">
                        Or start from an empty property
                        <span aria-hidden="true"> &rarr;</span>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
