<x-owner-portal-layout>
    @section('title', 'Dashboard')

    @section('header', 'Dashboard')

    <div class="mt-8">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                <!-- FIRST COLUMN -->

                <!-- welcome back -->
                <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-6">


                    <div class="sm:col-span-6 mb-3">
                        <div class="bg-gray-800 h-35 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                    </div>
                                    <div class="w-0 flex-1">
                                        <dl>
                                            <dt class="text-lg font-bold font-body text-white truncate">Welcome
                                                back,
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


                    <div class="sm:col-span-6">
                        <div class="bg-white h-24">


                            <div class="">
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


                        </div>











                        <!-- number by categories scroll -->
                        <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-6 ml-2 font-bold text-lg mt-10 mb-2 py-8"></div>

                            <div class="sm:col-span-3">

                                <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-5">
                                    <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                        Total
                                        collected:</div>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg">
                                    <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                        Total
                                        unpaid bills:</div>
                                </div>
                            </div>

                            <div class="sm:col-span-3">

                                <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-5">
                                    <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                        Moveouts:</div>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg">
                                    <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                        Moveins:</div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>



                <!-- card Announcements -->
                <div class="bg-white overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/scale -->
                                <img class="h-10 w-auto" src="{{ asset('/brands/megaphone.png') }}">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                            <div class="ml-5 w-0 flex-1">

                                <dl>
                                    <dt class="text-3xl font-medium text-black-500 truncate">Announcements:</dt>

                                    <dd>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="bg-indigo-50 px-5 py-10 mb-5 rounded-lg">
                        <div class="text-sm">
                            <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> Your contract will
                                expire
                                in 2 days. </a>
                            <div button type="button"
                                class="items-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Renew</button></div>
                        </div>
                    </div>
                    <div class="bg-indigo-50 px-5 py-8 mb-5 rounded-lg">
                        <div class="text-sm">
                            <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> You have unpaid bills
                                for
                                unit #2. </a>
                            <div button type="button"
                                class="items-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Pay now</button></div>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 gap-x-4 sm:grid-cols-5">

                        <div class="sm:col-span-1">

                            <div class=" flex items-center justify-center">
                                <img src="{{ asset('/brands/door.png') }}" alt="building"
                                    class=" w-10 object-center object-cover ">

                            </div>
                            <div class="mt-2 text-xs text-center font-semibold font-body text-gray-500 truncate">
                                Unit
                            </div>
                            <a href="#/" class="flex items-center justify-center text-indigo-600 text-lg">{{ $units->count() }}</a>

                        </div>

                        <div class="sm:col-span-1">

                            <div class=" flex items-center justify-center">
                                <img src="{{ asset('/brands/tenant.png') }}" alt="building"
                                    class=" w-10 object-center object-cover ">

                            </div>
                            <div class="mt-2 text-xs text-center font-semibold font-body text-gray-500 truncate">
                                Tenant
                            </div>
                            

                        </div>

                        <div class="sm:col-span-1">

                            <div class=" flex items-center justify-center">
                                <img src="{{ asset('/brands/key-chain.png') }}" alt="building"
                                    class=" w-10 object-center object-cover ">

                            </div>
                            <div class="mt-2 text-xs text-center font-semibold font-body text-gray-500 truncate">
                                Occupied</div>
                            <a href=# class="flex items-center justify-center text-indigo-600 text-lg">30</a>

                        </div>

                        <div class="sm:col-span-1">

                            <div class=" flex items-center justify-center">
                                <img src="{{ asset('/brands/ghost.png') }}" alt="building"
                                    class=" w-10 object-center object-cover ">

                            </div>
                            <div class="mt-2 text-xs text-center font-semibold font-body text-gray-500 truncate">
                                Vacant
                            </div>
                            <a href=# class="flex items-center justify-center text-indigo-600 text-lg">30</a>

                        </div>

                        <div class="sm:col-span-1">

                            <div class=" flex items-center justify-center">
                                <img src="{{ asset('/brands/contract.png') }}" alt="building"
                                    class=" w-10 object-center object-cover ">

                            </div>
                            <div class="mt-2 text-xs text-center font-semibold font-body text-gray-500 truncate">
                                Concerns</div>
                            <a href=# class="flex items-center justify-center text-indigo-600 text-lg">30</a>

                        </div>




                    </div>
                </div>

                <!-- card Notifications -->
                <div class="bg-white">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <!-- Heroicon name: outline/scale -->

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                </svg>
                            </div>
                            <div class="ml-0 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">
                                        {{ Carbon\Carbon::now()->format('D, M d, Y') }}
                                    </dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">
                                            0.00
                                        </div>
                                        <h2 class="text-lg leading-3 ml-0 font-medium text-gray-600 mt-10">Notifications
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
                                            <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3 w-0 flex-1 pt-0.5">
                                            <p class="text-sm font-medium text-gray-900">Successfully paid!</p>
                                            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for rent.</p>
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
                                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3 w-0 flex-1 pt-0.5">
                                            <p class="text-sm font-medium text-gray-900">Successfully paid!</p>
                                            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for rent.</p>
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
                                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3 w-0 flex-1 pt-0.5">
                                            <p class="text-sm font-medium text-gray-900">Successfully paid!</p>
                                            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for rent.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div button type="button"
                        class=" justify-self-end items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm 
    text-white text-center bg-gray-600 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View
                        More</button>
                    </div> --}}


                </div>
            </div>
            </aside>

</x-owner-portal-layout>