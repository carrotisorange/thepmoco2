<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">

        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button wire:click="export">
                   Export
                </x-button>
            </div>
        </div>
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

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="">
                            <tr>
                                <x-td><b>Collections</b></x-td>
                                <x-td></x-td>
                            </tr>
                        </thead>

                     <thead class="">
                            @foreach ($revenues as $index => $revenue)
                            <tr>
                                <x-td>{{ $revenue->particular }}</x-td>
                                <x-td>{{ number_format($revenue->amount, 2) }}</x-td>
                            </tr>
                            @endforeach
                        </thead>
                      <thead class="">
                            <tr>
                                <x-td><b>Gross Collections</b></x-td>
                                <x-td><b>{{ number_format($revenues->sum('amount'), 2) }}</b></x-td>
                            </tr>
                        </thead>
                        <thead class="">
                            <tr>
                                <x-td><b>Less Expenses</b></x-td>
                                <x-td></x-td>
                            </tr>
                        </thead>
                      <thead class="">
                            @foreach ($expenses as $index => $expense)
                            <tr>
                                <x-td>{{ $expense->particular }}</x-td>
                                <x-td>{{ number_format($expense->expense, 2) }}</x-td>
                            </tr>
                            @endforeach
                        </thead>
                     <thead class="">
                            <tr>
                                <x-td><b>Total Expenses</b></x-td>

                                <x-td><b>{{ number_format($expenses->sum('expense'), 2) }}</b></x-td>
                            </tr>
                        </thead>
                        <thead class="">
                            <tr>
                                <x-td><b>Net Collection</b></x-td>

                                <x-td><b>{{ number_format($revenues->sum('amount') - $expenses->sum('expense'), 2) }}</b></x-td>
                            </tr>
                        </thead>

                    </table>

                    <div class="mt-10">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-th>Description</x-th>
                                    <x-th>Estimated Monthly</x-th>
                                    <x-th>Estimated Yearly</x-th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr>
                                    <x-td> Potential Gross Rent <span title="total rent amount of rent per unit"><i
                                                class="fa-solid fa-circle-info"></i> </span> </x-td>
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
                                    <x-td>Effective Gross Rent <span title="total rent amount of occupied units"><i
                                                class="fa-solid fa-circle-info"></i> </span> </x-td>
                                    <x-td>{{number_format($effective_gross_rent, 2) }}</x-td>
                                    <x-td>{{ number_format($effective_gross_rent*12, 2) }}</x-td>
                                </tr>
                                <tr>
                                    <x-td>Billed Rent <span title="all posted rent"><i class="fa-solid fa-circle-info"></i>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
