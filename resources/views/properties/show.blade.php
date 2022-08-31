<x-new-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    @section('title', $property->property.' | The Property Manager')
    <div class="mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">



                <!-- FIRST COLUMN -->

                <!-- welcome back -->
                <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-6">

                    <div class="sm:col-span-6 ml-2 font-bold text-3xl mb-5">Property Name</div>
                    <div class="sm:col-span-6 mb-3">
                        <div class="bg-purple-300 h-35 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                    </div>
                                    <div class="w-0 flex-1">
                                        <dl>
                                            <dt class="text-lg font-bold font-body text-gray-700 truncate">
                                                Welcome back, Juan</dt>
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
                                            Moveout Requests:</div>
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
                                            Payments Approval Requests:</div>
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
                                Units:</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg">
                            <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                Tenants:</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">

                        <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-5">
                            <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                Concerns Received:</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg">
                            <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                Concerns Closed:</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">

                        <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-5">
                            <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                Past Due Accounts:</div>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg">
                            <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                Expired Contracts:</div>
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
                                Collection of the Month:</div>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <div class="bg-gray-200 h-16 overflow-hidden shadow rounded-lg mb-5">
                            <div class="mt-2 ml-2 text-left font-semibold text-sm mb-5 text-gray-500">Total
                                Unpaid of the Month:</div>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <div class="bg-white h-24">

                        </div>
                    </div>

                    <div class="mt-5">
                        <canvas class="" id="chartLine"></canvas>
                    </div>

                    <!-- graph chart.js -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                    <!-- chart line -->
                    <script>
                        const labels = ["January", "February", "March", "April", "May", "June"];
                                const data = {
                                    labels: labels,
                                    datasets: [
                                    {
                                    label: "Occupancy Graph",
                                     backgroundColor: "hsl(252, 82.9%, 67.8%)",
                                     borderColor: "hsl(252, 82.9%, 67.8%)",
                                     data: [0, 10, 5, 2, 20, 30, 45],
                                    },
                                    ],
                                 };
                
                                const configLineChart = {
                                    type: "line",
                                    data,
                                    options: {},
                                 };
                
                                var chartLine = new Chart(
                                 document.getElementById("chartLine"),
                                    configLineChart
                                );
                    </script>

                    <!-- total bills for collection -->

                    <div class="mt-10 grid grid-cols-1 gap-x-4 sm:grid-cols-6">

                        <div class="sm:col-span-3">
                            <div class="ml-2 mt-2 text-sm text-center font-semibold font-body text-gray-500 truncate">
                                Occupied: <a href=# class="text-indigo-600 text-lg">50</a> </div>
                            <img src="{{ asset('/brands/key.png') }}" alt="building"
                                class="ml-10 h-20 w-20 object-center object-cover ">

                        </div>

                        <div class="sm:col-span-3">
                            <div class="mt-2 text-sm text-center font-semibold font-body text-gray-500 truncate">
                                Vacant: <a href=# class="text-indigo-600 text-lg">30</a> </div>
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
                                            Friday, August 19, 2022</dt>
                                        <dd>
                                            <div class="text-sm font-medium text-gray-500">Daily Collected
                                                Amount:</div>
                                            <div class="text-lg font-medium text-gray-900">$30,659.45</div>
                                            <h2 class="text-lg leading-3 ml-0 font-medium text-gray-600 mt-10">
                                                Today</h2>
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
                                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="2"
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
                                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="2"
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
                                                <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="2"
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
                                    for Collection:</div>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <div class="bg-white h-24 overflow-hidden shadow rounded-lg mb-5">
                                <div class="mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Collected
                                    Amount:</div>
                            </div>
                        </div>

                        <div class="sm:col-span-6">
                            <div class="bg-white h-24 overflow-hidden shadow rounded-lg mb-5">
                                <div class=" mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Total
                                    Unpaid Collection:</div>
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
                                <h1 class="text-xl font-semibold text-gray-900">Expiring Contracts</h1>
                            </div>


                            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                            </div>
                            <!-- 30 days -->
                        </div>


                        <div class="mt-8 flex flex-col">
                            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-300">


                                            <thead class="bg-gray-50">
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


                                            <tbody class="divide-y divide-gray-200 bg-white">

                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">

                                                        <div class="flex items-center">
                                                            <div class="h-10 w-10 flex-shrink-0">
                                                                <img src="{{ asset('/brands/user.png') }}"
                                                                    alt="building"
                                                                    class="w-40 object-center object-cover lg:w-full lg:h-full">
                                                            </div>

                                                            <div class="ml-4">
                                                                <div class="font-medium text-gray-900">
                                                                    Lindsay Walton</div>
                                                                <div class="text-gray-500">
                                                                    lindsay.walton@example.com</div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <div class="text-gray-900">Unit #2</div>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <span
                                                            class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        Sept. 1</td>

                                                    <td
                                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                        <a href="#"
                                                            class="text-indigo-600 hover:text-indigo-900">Moveout<span
                                                                class="sr-only">, Lindsay Walton</span></a>
                                                    </td>

                                                    <td
                                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                        <a href="#"
                                                            class="text-indigo-600 hover:text-indigo-900">Renew<span
                                                                class="sr-only">, Lindsay Walton</span></a>
                                                    </td>
                                                </tr>
                                            <tbody class="divide-y divide-gray-200 bg-white">

                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">

                                                        <div class="flex items-center">
                                                            <div class="h-10 w-10 flex-shrink-0">
                                                                <img src="{{ asset('/brands/user.png') }}"
                                                                    alt="building"
                                                                    class="w-40 object-center object-cover lg:w-full lg:h-full">
                                                            </div>

                                                            <div class="ml-4">
                                                                <div class="font-medium text-gray-900">
                                                                    Lindsay Walton</div>
                                                                <div class="text-gray-500">
                                                                    lindsay.walton@example.com</div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <div class="text-gray-900">Unit #2</div>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <span
                                                            class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        Sept. 1</td>

                                                    <td
                                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                        <a href="#"
                                                            class="text-indigo-600 hover:text-indigo-900">Moveout<span
                                                                class="sr-only">, Lindsay Walton</span></a>
                                                    </td>

                                                    <td
                                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                        <a href="#"
                                                            class="text-indigo-600 hover:text-indigo-900">Renew<span
                                                                class="sr-only">, Lindsay Walton</span></a>
                                                    </td>
                                                </tr>

                                            <tbody class="divide-y divide-gray-200 bg-white">

                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">

                                                        <div class="flex items-center">
                                                            <div class="h-10 w-10 flex-shrink-0">
                                                                <img src="{{ asset('/brands/user.png') }}"
                                                                    alt="building"
                                                                    class="w-40 object-center object-cover lg:w-full lg:h-full">
                                                            </div>

                                                            <div class="ml-4">
                                                                <div class="font-medium text-gray-900">
                                                                    Lindsay Walton</div>
                                                                <div class="text-gray-500">
                                                                    lindsay.walton@example.com</div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <div class="text-gray-900">Unit #2</div>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        <span
                                                            class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                                                    </td>

                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                        Sept. 1</td>

                                                    <td
                                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                        <a href="#"
                                                            class="text-indigo-600 hover:text-indigo-900">Moveout<span
                                                                class="sr-only">, Lindsay Walton</span></a>
                                                    </td>

                                                    <td
                                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                        <a href="#"
                                                            class="text-indigo-600 hover:text-indigo-900">Renew<span
                                                                class="sr-only">, Lindsay Walton</span></a>
                                                    </td>
                                                </tr>


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


        <!-- Footer -->
        <footer class="">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                <div class="flex justify-center space-x-6 md:order-2">
                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">GitHub</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <a href="#" class="text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Dribbble</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                <div class="mt-8 md:mt-0 md:order-1">
                    <p class="text-center text-base text-gray-400">&copy; 2020 The PMO Co. All rights
                        reserved.</p>
                </div>
            </div>
        </footer>
        </main>
    </div>
    </div>

</x-new-layout>

@section('scripts')
<script>
    /*Toggle dropdown list*/
    /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

    var userMenuDiv = document.getElementById("userMenu");
    var userMenu = document.getElementById("userButton");

    var navMenuDiv = document.getElementById("nav-content");
    var navMenu = document.getElementById("nav-toggle");

    document.onclick = check;

    function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //User Menu
        if (!checkParent(target, userMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, userMenu)) {
                // click on the link
                if (userMenuDiv.classList.contains("invisible")) {
                    userMenuDiv.classList.remove("invisible");
                } else { userMenuDiv.classList.add("invisible"); }
            } else {
                // click both outside link and outside menu, hide menu
                userMenuDiv.classList.add("invisible");
            }
        }

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
            // click NOT on the menu
            if (checkParent(target, navMenu)) {
                // click on the link
                if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                } else { navMenuDiv.classList.add("hidden"); }
            } else {
                // click both outside link and outside menu, hide menu
                navMenuDiv.classList.add("hidden");
            }
        }

    }

    function checkParent(t, elm) {
        while (t.parentNode) {
            if (t == elm) { return true; }
            t = t.parentNode;
        }
        return false;
    }
</script>