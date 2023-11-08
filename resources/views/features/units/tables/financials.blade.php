<div class="text-sm">
    <div class="grid lg:grid-cols-2 md:grid-cols-2 gap-8 w-full max-w-screen-lg">
        <div class="lg:col-span-1">

            <div class="bg-white">

                <div class="flex items-center px-8 py-5 border-b">
                    <div class="w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900">Purchase Price
                        </p>
                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                            {{ App\Http\Controllers\Features\CollectionController::shortNumber($unit_details->price) }}
                        </p>
                    </div>
                </div>


                <div class="flex items-center px-8 py-5 border-b">
                    <div class="w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900">Remaining Amount to get the ROI
                        </p>
                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                            {{ App\Http\Controllers\Features\CollectionController::shortNumber($unit_details->price - $total_collected_bills) }}
                        </p>
                    </div>
                </div>
                <div class="">
                    <div class="flex items-center px-8 py-5">
                        <p class="text-sm font-medium">Monthly Financial Report</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 px-8 pb-8">
                        <div class="">
                            <label class="text-xs font-semibold" for="cardNumber">Long Term Rent</label>

                        </div>
                            <?php
                                $long_term_rent = ($unit_details->rent*$unit_details->occupancy);
                            ?>
                            {{  App\Http\Controllers\Features\CollectionController::shortNumber($long_term_rent)  }}
                        <div class="">
                            <label class="text-xs font-semibold" for="cardNumber">Daily Rent</label>

                        </div>
                        <?php
                            $daily_term_rent = ($unit_details->transient_rent*30);
                        ?>
                        {{ App\Http\Controllers\Features\CollectionController::shortNumber($daily_term_rent)  }}
                        <div class="cols-2">
                            <label class="text-xs font-semibold" for="cardNumber">Rent Revenue</label>
                        </div>
                        {{App\Http\Controllers\Features\CollectionController::shortNumber($daily_term_rent + $long_term_rent)}}
                    </div>
                </div>



            </div>
        </div>




        <div class="bg-white">

            <div class="flex items-center px-8 py-5 border-b">
                <div class="w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">Potential Gross Revenue per month

                    </p>
                    <p class="mt-1 text-xl font-semibold text-gray-500">
                        <?php
                            $gross_revenue = ($unit_details->rent*$unit_details->occupancy) + ($unit_details->transient_rent*30);
                        ?>
                        {{  App\Http\Controllers\Features\CollectionController::shortNumber($gross_revenue)  }}
                    </p>
                </div>
            </div>

            <div class="flex items-center px-8 py-5 border-b">
                <div class="w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">Total Bills for Collection
                    </p>
                    <p class="mt-1 text-xl font-semibold text-gray-500">
                        <?php
                            $bills_for_collection = $total_uncollected_bills+ $total_collected_bills;
                        ?>
                        {{   App\Http\Controllers\Features\CollectionController::shortNumber($bills_for_collection)   }}
                    </p>
                </div>
            </div>

            <div class="flex items-center px-8 py-5 border-b">
                <div class="w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">Collected Amount
                    </p>
                    <p class="mt-1 text-xl font-semibold text-gray-500">
                        {{ App\Http\Controllers\Features\CollectionController::shortNumber($total_collected_bills)}}
                    </p>
                </div>
            </div>

            <div class="flex items-center px-8 py-5 border-b">
                <div class="w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">Total Unpaid Collection:
                    </p>
                    <p class="mt-1 text-xl font-semibold text-gray-500">
                        {{   App\Http\Controllers\Features\CollectionController::shortNumber($total_uncollected_bills)}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
                    <table class="min-w-full divide-y divide-gray-300 pt-10">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                        I. Revenue (Collections)</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Particular</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Amount
                                        </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($revenues as $revenue)
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        {{ $revenue->particular }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        {{ number_format($revenue->amount, 2)}}</td>

                                </tr>
                               @endforeach

                            </tbody>
                            <tbody class="divide-y divide-gray-200 bg-white">

                                <tr>
                                    <td class="font-bold text-base whitespace-nowrap py-2 pl-4 pr-3  text-gray-500 sm:pl-6">
                                        Total Revenues</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                    </td>
                                    <td class="font-bold text-base whitespace-nowrap px-2 py-2 text-gray-900">
                                        {{ number_format($revenues->sum('amount'), 2)}}</td>

                                </tr>
                            </tbody>

                            <tbody>
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                        III. Operating Expenses</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Particular</th>
                                    <th scope="col"
                                        class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Amount
                                        </th>

                                </tr>
                                @foreach ($expenses as $expense)


                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        {{ $expense->particular }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                        {{ number_format($expense->amount, 2)}}</td>

                                </tr>
                                @endforeach
                            </thead>
                            </tbody>
                            <tbody class="divide-y divide-gray-200 bg-white">

                                <tr>
                                    <td class="font-bold text-base whitespace-nowrap py-2 pl-4 pr-3  text-gray-500 sm:pl-6">
                                    Total Operating Expenses</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">
                                      </td>
                                    <td class="font-bold text-base whitespace-nowrap px-2 py-2 text-gray-900">
                                     {{ number_format($expenses->sum('amount'), 2)}}</td>

                                </tr>
                                </tbody>

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
                                         {{ number_format($revenues->sum('amount')-$expenses->sum('amount'), 2)}}</th>

                                </tr>
                            </thead>
                            </tbody>
                        </table>
