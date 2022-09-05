<x-new-layout>
    @section('title','Units | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto px-4 sm:px-6 lg:px-11">
            <!-- Main area -->
            <main class="flex-1 pb-8 h-screen y-screen overflow-y-scroll">
                <div class="mt-8">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">



                            <!-- FIRST COLUMN -->

                            <!-- welcome back -->
                            <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-6">

                                <div class="sm:col-span-6 ml-2 font-bold text-3xl mb-5">{{ $property->property }}</div>
                                <div class="sm:col-span-6 mb-3">
                                    <div class="bg-purple-300 h-35 overflow-hidden shadow rounded-lg">
                                        <div class="p-5">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                </div>
                                                <div class="w-0 flex-1">
                                                    <dl>
                                                        <dt class="text-lg font-bold font-body text-gray-700 truncate">
                                                            Welcome back,
                                                            {{ auth()->user()->name }}</dt>
                                                </div>

                                                <div class="sm:col-span-1">
                                                    <img class="h-24 w-auto mt-2 flex justify-end"
                                                        src="{{ asset('/brands/juan.png') }}">
                                                    </dl>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- moveout request, payments approval -->
                                <div class="sm:col-span-6">
                                    <div class="bg-gray-50 h-36 overflow-hidden shadow rounded-lg mb-2">
                                        <div class="p-5">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                </div>

                                                <div class="w-0 flex-1">
                                                    <div class="text-l font-semibold font-body text-gray-500 truncate">
                                                        Moveout Requests: 
                                                        <?php $status = 'pendingmoveout'; ?>
                                                    <a href="/property/{{ Session::get('property') }}/contract/{{ $status }}" class="font-medium text-blue-900">{{ $pending_moveout_contracts->count() }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="sm:col-span-6">
                                    <div class="bg-gray-50 h-36 overflow-hidden shadow rounded-lg">
                                        <div class="p-5">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                </div>

                                                <div class="w-0 flex-1">
                                                    <div class="text-l font-semibold font-body text-gray-500 truncate">
                                                        Payments
                                                        Approval Requests:</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- number by categories scroll -->
                                <div class="sm:col-span-6 ml-2 font-bold text-lg mt-10 mb-2">Number by categories:</div>


                                <div class="sm:col-span-3">

                                    <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-5">
                                        <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                            Units: {{ $total_units }}</div>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg">
                                        <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                            Tenants: {{ $total_tenants }}</div>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">

                                    <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-5">
                                        <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                            Concerns
                                            Received:</div>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg">
                                        <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                            Concerns
                                            Closed:</div>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">

                                    <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-5">
                                        <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                            Past Due
                                            Accounts: {{ $past_due_accounts }}</div>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg">
                                        <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                            Expired
                                            Contracts: {{ $expired_contracts }}</div>
                                    </div>
                                </div>


                            </div>


                            <!-- SECOND COLUMN -->

                            <!-- Concerns Requests -->
                            <div class="bg-white overflow-hidden">
                                <div class="p-5">
                                    <div class="flex items-center">

                                        <div class="w-0 flex-1">


                                        </div>
                                    </div>
                                </div>

                                <div class="font-bold text-lg mb-5">Concerns Requests:</div>
                                <div class="bg-white overflow-hidden shadow rounded-lg px-5 py-5 mb-8 ">
                                    <div class="text-semibold">

                                        <div class="flex justify-end">
                                            <div button type="button"
                                                class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Review</button></div>
                                        </div>
                                    </div>


                                </div>






                                <!-- moveout, moveins -->


                                <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <div class="ml-2 font-bold text-lg"></div>
                                        <div class="text-center font-semibold text-lg mb-5 text-gray-500">Moveouts:
                                        </div>
                                        <div class="bg-purple-100 h-20 overflow-hidden shadow rounded-lg mb-5">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-3">
                                        <div class="text-center font-semibold text-lg mb-5 text-gray-500">Move Ins:
                                        </div>
                                        <div class="bg-purple-100 h-20 overflow-hidden shadow rounded-lg mb-5">
                                        </div>
                                    </div>
                                </div>

                                <!-- total collection of the month -->
                                <div class="sm:col-span-6 mt-2">
                                    <div class="bg-gray-200 h-16 overflow-hidden shadow rounded-lg mb-5">
                                        <div class="mt-2 ml-2 text-left font-semibold text-sm mb-5 text-gray-500">Total
                                            Collection
                                            of the Month:</div>
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <div class="bg-gray-200 h-16 overflow-hidden shadow rounded-lg mb-5">
                                        <div class="mt-2 ml-2 text-left font-semibold text-sm mb-5 text-gray-500">Total
                                            Unpaid of
                                            the Month:</div>
                                    </div>
                                </div>

                                <div class="sm:col-span-6">
                                    <div class="bg-white h-24">

                                    </div>
                                </div>

                                <div class="mt-5">
                                    <canvas id="occupancy_rate" class="chartjs" width="undefined"
                                        height="undefined"></canvas>
                                </div>

                                <!-- graph chart.js -->
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <!-- chart line -->
                                <script>
                                    new Chart(document.getElementById("occupancy_rate"), {
                                                        "type": "line",
                                                        "data": {
                                                            "labels": {!!$occupancy_rate_date!!},
                                                            "datasets": [{
                                                                "label": "Occupancy Rate",
                                                                 data: {!!$occupancy_rate_value!!},
                                                                "fill": false,
                                                                "borderColor": "rgba(148,0,211)",
                                                                "lineTension": 0.1
                                                            }]
                                                        },
                                                       
                                                        "options": {
                                                            legend: {
                                                            display: false
                                                            },
                                                        }
                                                    });
                                </script>

                                <!-- total bills for collection -->

                                <div class="mt-10 grid grid-cols-1 gap-x-4 sm:grid-cols-6">

                                    <div class="sm:col-span-3">
                                        <div
                                            class="ml-2 mt-2 text-sm text-center font-semibold font-body text-gray-500 truncate">
                                            Occupied: <a href="/property/{{ $property->uuid }}/unit/"
                                                class="text-indigo-600 text-lg">{{ $occupied_units }}</a> </div>
                                        <img src="{{ asset('/brands/key.png') }}" alt="building"
                                            class="ml-10 h-20 w-20 object-center object-cover ">

                                    </div>

                                    <div class="sm:col-span-3">
                                        <div
                                            class="mt-2 text-sm text-center font-semibold font-body text-gray-500 truncate">
                                            Vacant:
                                            <a a href="/property/{{ $property->uuid }}/unit/"
                                                class="text-indigo-600 text-lg">{{ $vacant_units }}</a>
                                        </div>
                                        <img src="{{ asset('/brands/vacant.png') }}" alt="building"
                                            class="ml-10 h-20 w-20 object-center object-cover ">


                                    </div>
                                </div>

                            </div>




                            <!-- Notifications -->
                            <div class>

                                <!--button -->
                                <div class="bg-white">
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="ml-0 w-0 flex-1">
                                                <dl>
                                                    <dt class="text-lg font-semibold text-gray-900 truncate mb-5">
                                                        {{ Carbon\Carbon::now()->format('D, M d, Y') }}
                                                    </dt>
                                                    <dd>
                                                        <div class="text-sm font-medium text-gray-500">Daily Collected
                                                            Amount:</div>
                                                        <div class="text-lg font-medium text-gray-900">{{
                                                            number_format($daily_collected_amount,2) }}</div>
                                                        <h2
                                                            class="text-lg leading-3 ml-0 font-medium text-gray-600 mt-10">
                                                            Today
                                                        </h2>
                                                    </dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-gray-50 px-5 py-3">
                                        <div class="text-sm">
                                            <div
                                                class="mb-5 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                <div class="p-4">
                                                    <div class="flex items-start">
                                                        <div class="flex-shrink-0">
                                                            <!-- Heroicon name: outline/check-circle -->
                                                            <svg class="h-6 w-6 text-green-400"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </div>

                                                        <div class="ml-3 w-0 flex-1 pt-0.5">
                                                            <p class="text-sm font-medium text-gray-900">Successfully
                                                                paid!</p>
                                                            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for
                                                                rent.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="mb-5 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                <div class="p-4">
                                                    <div class="flex items-start">
                                                        <div class="flex-shrink-0">
                                                            <!-- Heroicon name: outline/check-circle -->
                                                            <svg class="h-6 w-6 text-green-400"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </div>

                                                        <div class="ml-3 w-0 flex-1 pt-0.5">
                                                            <p class="text-sm font-medium text-gray-900">Successfully
                                                                paid!</p>
                                                            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for
                                                                rent.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div
                                                class="mb-5 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                <div class="p-4">
                                                    <div class="flex items-start">
                                                        <div class="flex-shrink-0">
                                                            <!-- Heroicon name: outline/check-circle -->
                                                            <svg class="h-6 w-6 text-green-400"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="2"
                                                                stroke="currentColor" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </div>

                                                        <div class="ml-3 w-0 flex-1 pt-0.5">
                                                            <p class="text-sm font-medium text-gray-900">Successfully
                                                                paid!</p>
                                                            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for
                                                                rent.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                                <div button type="button"
                                    class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-gray-900 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    View More</button></div>

                                <div class="mt-10 grid grid-cols-1 gap-x-4 sm:grid-cols-6">

                                    <div class="sm:col-span-6 mt-2">
                                        <div class="bg-white h-24 overflow-hidden shadow rounded-lg mb-5 mt-10">
                                            <div class=" mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Total Bills
                                                for
                                                Collection: {{ number_format($current_month_property_unpaid_bills, 2) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <div class="bg-white h-24 overflow-hidden shadow rounded-lg mb-5">
                                            <div class="mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Collected
                                                Amount: {{ number_format( $current_month_total_collected_payment, 2) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-6">
                                        <div class="bg-white h-24 overflow-hidden shadow rounded-lg mb-5">
                                            <div class=" mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Total
                                                Unpaid
                                                Collection: {{ number_format($current_month_total_unpaid_collection, 2)
                                                }}</div>
                                        </div>
                                    </div>


                                </div>






                            </div </section>




                        </div>









                        <div class="grid grid-cols-2 gap-x-4 sm:grid-cols-6">

                            <div class="sm:col-span-4 mb-3 mt-10">
                                <div class="px-4">
                                    <div class="sm:flex sm:items-center">
                                        <div class="sm:flex-auto">
                                            <h1 class="text-xl font-semibold text-gray-900">Expiring Contracts ({{
                                                $expiring_contracts->count() }})</h1>
                                        </div>


                                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                                        </div>
                                        <!-- 30 days -->
                                    </div>


                                    <div class="mt-8 flex flex-col">
                                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                                <div
                                                    class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                                    <table class="min-w-full divide-y divide-gray-300">
                                                        <tr>
                                                            <th scope="col"
                                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                                Name</th>
                                                            <th scope="col"
                                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                                Unit</th>
                                                            <th scope="col"
                                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                                Status</th>
                                                            <th scope="col"
                                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                                Moveout</th>
                                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                                <span class="sr-only">Renew</span>
                                                                <span class="sr-only">Moveout</span>
                                                            </th>
                                                        </tr>
                                                        </thead>

                                                        @forelse ($expiring_contracts as $item)
                                                        <tbody class="divide-y divide-gray-200 bg-white">

                                                            <tr>
                                                                <td
                                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">

                                                                    <div class="flex items-center">
                                                                        <div class="h-10 w-10 flex-shrink-0">
                                                                            <img src="{{ asset('/brands/user.png') }}"
                                                                                alt="building"
                                                                                class="w-40 object-center object-cover lg:w-full lg:h-full">
                                                                        </div>

                                                                        <div class="ml-4">
                                                                            <div class="font-medium text-gray-900">
                                                                                {{ $item->tenant->tenant }}
                                                                            </div>
                                                                            <div class="text-gray-500">
                                                                                {{ $item->tenant->type }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td
                                                                    class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                    <div class="font-medium text-gray-900">
                                                                        {{ $item->unit->unit }}
                                                                    </div>
                                                                    <div class="text-gray-500">
                                                                        {{ $item->unit->building->building }}
                                                                    </div>
                                                                </td>

                                                                <td
                                                                    class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                    @if($item->status == 'active')
                                                                    <span
                                                                        class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{
                                                                        $item->status }}</span>
                                                                    @else
                                                                    <span
                                                                        class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">{{
                                                                        $item->status }}</span>
                                                                    @endif
                                                                </td>

                                                                <td
                                                                    class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                    {{ Carbon\Carbon::parse($item->end)->format('M d,
                                                                    Y') }}
                                                                </td>
                                                                <td
                                                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                                                                        class="text-indigo-600 hover:text-indigo-900">Renew</a>
                                                                </td>

                                                                <td
                                                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                                    <a href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                                                                        class="text-indigo-600 hover:text-indigo-900">Moveout</a>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr>
                                                                <td
                                                                    class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                                    <div class="text-gray-900">No data found!</div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                        @endforelse

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                            <div class="sm:col-span-2 mt-5">
                                <div class="overflow-hidden">
                                    <div class="py-3 px-5 ">Collection Rate</div>
                                    <canvas class="p-8" id="chartDoughnut"></canvas>
                                </div>

                                <!-- Required chart.js -->
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                <!-- Chart doughnut -->
                                <script>
                                    const dataDoughnut = {
                                              labels: ["Billed","Collected", "Uncollected", ],
                                              datasets: [
                                                {
                                                  label: "My First Dataset",
                                                  data: [300, 50, 20],
                                                  backgroundColor: [
                                                    "rgb(133, 105, 241)",
                                                    "rgb(164, 101, 241)",
                                                    "rgb(101, 143, 241)",
                                                  ],
                                                  hoverOffset: 4,
                                                },
                                              ],
                                            };
                    
                                            const configDoughnut = {
                                              type: "doughnut",
                                              data: dataDoughnut,
                                              options: {},
                                            };
                    
                                            var chartBar = new Chart(
                                              document.getElementById("chartDoughnut"),
                                              configDoughnut
                                            );
                                </script>


                            </div>


                        </div>







                    </div>

            </main>
        </div>
    </div>
</x-new-layout>