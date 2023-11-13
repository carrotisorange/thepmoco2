<x-new-layout-base>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <div class="pt-10 block lg:flex justify-between">
        <div class="w-full">
            <h1 class="text-4xl font-bold">Dashboard</h1>
        </div>
        <!-- number of buildings -->
        <div class="w-full bg-white rounded-lg shadow p-3 md:p-6 justify-end">
            <div class="flex justify-between pb-0 lg:pb- mb-4">
                    <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                    <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/building.png" alt="building"/>
                    </div>
                    <div>
                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Buildings</p>
                    </div>
                    </div>
                    <div>

                    </div>
                </div>
        </div>
        <!-- number of personnels -->
        <div class="w-full bg-white rounded-lg shadow p-3 md:p-6 justify-end">
            <div class="grid grid-cols-3 gap-3 mb-2">
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-purple-400 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Personnels</dd>
                    </dl>
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-purple-100 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Current</dd>
                    </dl>
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-purple-200 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Users</dd>
                    </dl>
                    </div>
        </div>

    </div>

    <div class="mt-8 grid grid-cols-4">

        <!-- number of contracts -->
        <div class="w-full col-span-3 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                <div class="flex pb-4 mb-4">
                        <div class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                        <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/paper.png" alt="paper"/>
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Contracts</p>
                        </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-green-400 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Active</dd>
                    </dl>
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-green-100 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Inactive</dd>
                    </dl>

                    </div>
                </div>
            </div>
        </div>

         <!-- number of units -->
         <div class="w-full col-span-3 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                <div class="flex pb-4 mb-4">
                        <div class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                        <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/door.png" alt="door"/>
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Units</p>
                        </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3 mb-2">
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-indigo-400 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Occupied</dd>
                    </dl>
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-indigo-200 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Vacant</dd>
                    </dl>
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-indigo-100 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Maintenance</dd>
                    </dl>
                    </div>
                </div>
            </div>
        </div>


        <!-- number of tenants -->
        <div class="w-full col-span-3 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex pb-4 mb-4">
                        <div class="flex justify-between">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/name.png" alt="name"/>
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Tenants</p>
                            </div>

                            <div>
                                <svg data-popover-target="verified-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                                </svg>
                            </div>
                        </div>
                    <div>

                </div>
            </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt class="w-8 h-8 rounded-full bg-yellow-400 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                            <dd class="text-sm font-medium">Verifed</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt class="w-8 h-8 rounded-full bg-yellow-100 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                            <dd class="text-sm font-medium">Unverified</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- number of owners -->
        <div class="w-full col-span-3 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                <div class="flex  pb-4 mb-4">
                        <div class="flex justify-between">
                        <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                        <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/caretaker.png" alt="caretaker"/>
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Owners</p>
                        </div>
                        <div>
                                <svg data-popover-target="verified-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                                </svg>
                        </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-gray-300 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Verifed</dd>
                    </dl>
                    <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <dt class="w-8 h-8 rounded-full bg-gray-100 text-sm font-medium flex items-center justify-center mb-1">12</dt>
                        <dd class="text-sm font-medium">Unverified</dd>
                    </dl>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- second row -->
    <div class="mt-10 grid grid-cols-4">
        <!-- occupancy rate -->
        <div class="col-span-4 lg:col-span-2">
            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

            <div class="flex justify-between mb-3">
                <div class="flex justify-center items-center">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Occupancy Rate</h5>
                    <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                    </svg>
                    <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                        <div class="p-3 space-y-2">
                            <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                            <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                            <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>
                            <a href="#" class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read more <svg class="w-2 h-2 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg></a>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                    </div>
                <div>
                    <button type="button" data-tooltip-target="data-tooltip" data-tooltip-placement="bottom" class="hidden sm:inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm"><svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 1v11m0 0 4-4m-4 4L4 8m11 4v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3"/>
            </svg><span class="sr-only">Download data</span>
                    </button>
                    <div id="data-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Download CSV
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>

            <!-- Donut Chart -->
            <div class="py-6" id="donut-chart"></div>

            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                <!-- Button -->
                <button
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="lastDaysdropdown"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    Last 7 days
                    <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                        </li>
                    </ul>
                </div>

                </div>
            </div>
            </div>

            <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                const getChartOptions = () => {
                    return {
                    series: [35.1, 23.5, 2.4, 5.4],
                    colors: ["#1C64F2", "#16BDCA", "#FDBA8C", "#E74694"],
                    chart: {
                        height: 320,
                        width: "100%",
                        type: "donut",
                    },
                    stroke: {
                        colors: ["transparent"],
                        lineCap: "",
                    },
                    plotOptions: {
                        pie: {
                        donut: {
                            labels: {
                            show: true,
                            name: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: 20,
                            },
                            total: {
                                showAlways: true,
                                show: true,
                                label: "Occupancy Rate",
                                fontFamily: "Inter, sans-serif",
                                formatter: function (w) {
                                const sum = w.globals.seriesTotals.reduce((a, b) => {
                                    return a + b
                                }, 0)
                                return `${sum}k`
                                },
                            },
                            value: {
                                show: true,
                                fontFamily: "Inter, sans-serif",
                                offsetY: -20,
                                formatter: function (value) {
                                return value + "k"
                                },
                            },
                            },
                            size: "80%",
                        },
                        },
                    },
                    grid: {
                        padding: {
                        top: -2,
                        },
                    },
                    labels: ["Occupied", "Vacant", "Reserved", "Under Maintenance"],
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                        formatter: function (value) {
                            return value + "k"
                        },
                        },
                    },
                    xaxis: {
                        labels: {
                        formatter: function (value) {
                            return value  + "k"
                        },
                        },
                        axisTicks: {
                        show: false,
                        },
                        axisBorder: {
                        show: false,
                        },
                    },
                    }
                }

                if (document.getElementById("donut-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("donut-chart"), getChartOptions());
                    chart.render();

                    // Get all the checkboxes by their class name
                    const checkboxes = document.querySelectorAll('#devices input[type="checkbox"]');

                    // Function to handle the checkbox change event
                    function handleCheckboxChange(event, chart) {
                        const checkbox = event.target;
                        if (checkbox.checked) {
                            switch(checkbox.value) {
                            case 'desktop':
                                chart.updateSeries([15.1, 22.5, 4.4, 8.4]);
                                break;
                            case 'tablet':
                                chart.updateSeries([25.1, 26.5, 1.4, 3.4]);
                                break;
                            case 'mobile':
                                chart.updateSeries([45.1, 27.5, 8.4, 2.4]);
                                break;
                            default:
                                chart.updateSeries([55.1, 28.5, 1.4, 5.4]);
                            }

                        } else {
                            chart.updateSeries([35.1, 23.5, 2.4, 5.4]);
                        }
                    }

                    // Attach the event listener to each checkbox
                    checkboxes.forEach((checkbox) => {
                        checkbox.addEventListener('change', (event) => handleCheckboxChange(event, chart));
                    });
                }
            });
            </script>


        </div>

        <div class="col-span-4 lg:col-span-2">
            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Income</dt>
                <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">₱5,405</dd>
                </dl>
                <div>
                <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                    <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                    </svg>
                    Income rate 23.5%
                </span>
                </div>
            </div>

            <div class="grid grid-cols-2 py-3">
                <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Collection</dt>
                <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">₱23,635</dd>
                </dl>
                <dl>
                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Expense</dt>
                <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">-₱18,230</dd>
                </dl>
            </div>

            <div id="bar-chart"></div>
                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                    <button
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="lastDaysdropdown"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    Last 6 months
                    <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 6 months</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last year</a>
                        </li>
                        </ul>
                    </div>

                </div>
                </div>
            </div>

            <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                var options = {
                series: [
                    {
                    name: "Collection",
                    color: "#593f62",
                    data: ["1420", "1620", "1820", "1420", "1650", "2120"],
                    },
                    {
                    name: "Expense",
                    data: ["788", "810", "866", "788", "1100", "1200"],
                    color: "#d9bbf9",
                    }
                ],
                chart: {
                    sparkline: {
                    enabled: false,
                    },
                    type: "bar",
                    width: "100%",
                    height: 400,
                    toolbar: {
                    show: false,
                    }
                },
                fill: {
                    opacity: 1,
                },
                plotOptions: {
                    bar: {
                    horizontal: true,
                    columnWidth: "100%",
                    borderRadiusApplication: "end",
                    borderRadius: 6,
                    dataLabels: {
                        position: "top",
                    },
                    },
                },
                legend: {
                    show: true,
                    position: "bottom",
                },
                dataLabels: {
                    enabled: false,
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    formatter: function (value) {
                    return "₱" + value
                    }
                },
                xaxis: {
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                    formatter: function(value) {
                        return "₱" + value
                    }
                    },
                    categories: ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    axisTicks: {
                    show: false,
                    },
                    axisBorder: {
                    show: false,
                    },
                },
                yaxis: {
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                    }
                },
                grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                    left: 2,
                    right: 2,
                    top: -20
                    },
                },
                fill: {
                    opacity: 1,
                }
                }

                if(document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("bar-chart"), options);
                chart.render();
                }
            });
            </script>

        </div>
    </div>
    <div class="mt-10 grid grid-cols-6">

        <!-- bills -->
        <div class="col-span-6 lg:col-span-2">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

            <div class="flex justify-between items-start w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mr-1">Bills</h5>
                        <svg data-popover-target="verified-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
                        </svg>
                        <div data-popover id="verified-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth - Incremental</h3>
                                <p>Report helps navigate cumulative growth of community activities. Ideally, the chart should have a growing trend, as stagnating chart signifies a significant decrease of community activity.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                <p>For each date bucket, the all-time volume of activities is calculated. This means that activities in period n contain all activities up to period n, plus the activities generated by your community in period.</p>

                            </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
                <button id="dateRangeButton" data-dropdown-toggle="dateRangeDropdown" data-dropdown-ignore-click-outside-class="datepicker" type="button" class="inline-flex items-center text-blue-700 dark:text-blue-600 font-medium hover:underline">31 Nov - 31 Dev <svg class="w-3 h-3 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
                </button>
                <div id="dateRangeDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 lg:w-96 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="p-3" aria-labelledby="dateRangeButton">
                    <div date-rangepicker datepicker-autohide class="flex items-center">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Start date">
                        </div>
                        <span class="mx-2 text-gray-500 dark:text-gray-400">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </div>
                            <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="End date">
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            </div>

            <!-- Line Chart -->
            <div class="py-6" id="pie-chart"></div>

            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
            <div class="flex justify-between items-center pt-5">
                <!-- Button -->
                <button
                id="dropdownDefaultButton"
                data-dropdown-toggle="lastDaysdropdown"
                data-dropdown-placement="bottom"
                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                type="button">
                Last 7 days
                <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
                </button>
                <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                    </li>
                    </ul>
                </div>

            </div>
            </div>
            </div>

            <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
            const getChartOptions = () => {
                return {
                    series: [52.8, 26.8, 20.4],
                    colors: ["#1C64F2", "#16BDCA", "#9061F9"],
                    chart: {
                    height: 420,
                    width: "100%",
                    type: "pie",
                    },
                    stroke: {
                    colors: ["white"],
                    lineCap: "",
                    },
                    plotOptions: {
                    pie: {
                        labels: {
                        show: true,
                        },
                        size: "100%",
                        dataLabels: {
                        offset: -25
                        }
                    },
                    },
                    labels: ["All Bills", "Paid", "Unpaid"],
                    dataLabels: {
                    enabled: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                    },
                    legend: {
                    position: "bottom",
                    fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                    labels: {
                        formatter: function (value) {
                        return value + "%"
                        },
                    },
                    },
                    xaxis: {
                    labels: {
                        formatter: function (value) {
                        return value  + "%"
                        },
                    },
                    axisTicks: {
                        show: false,
                    },
                    axisBorder: {
                        show: false,
                    },
                    },
                }
                }

                if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
                chart.render();
                }
            });
            </script>


        </div>

        <!-- collection rate -->
        <div class="col-span-6 lg:col-span-2">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                    <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/coins.png" alt="coins"/>
                </div>
                <div>
                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">15%</h5>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Collection Rate</p>
                </div>
                </div>
                <div>

                </div>
            </div>

            <div class="grid grid-cols-2">
                <dl class="flex items-center">
                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Billed:</dt>
                    <dd class="text-gray-900 text-sm dark:text-white font-semibold">6</dd>
                </dl>
                <dl class="flex items-center justify-end">
                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Uncollected Bills:</dt>
                    <dd class="text-gray-900 text-sm dark:text-white font-semibold">12334</dd>
                </dl>
            </div>

            <div id="collection-chart"></div>
                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                    <button
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="lastDaysdropdown"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    Last 7 days
                    <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                        </li>
                        </ul>
                    </div>

                </div>
                </div>
            </div>

            <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                const options = {
                    colors: ["#1A56DB", "#b4c4ae"],
                    series: [
                        {
                        name: "Billed",
                        color: "#5d5179",
                        data: [
                            { x: "Mon", y: 231 },
                            { x: "Tue", y: 122 },
                            { x: "Wed", y: 63 },
                            { x: "Thu", y: 421 },
                            { x: "Fri", y: 122 },
                            { x: "Sat", y: 323 },
                            { x: "Sun", y: 111 },
                        ],
                        },
                        {
                        name: "Uncollected",
                        color: "#b9c0da",
                        data: [
                            { x: "Mon", y: 232 },
                            { x: "Tue", y: 113 },
                            { x: "Wed", y: 341 },
                            { x: "Thu", y: 224 },
                            { x: "Fri", y: 522 },
                            { x: "Sat", y: 411 },
                            { x: "Sun", y: 243 },
                        ],
                        },
                    ],
                    chart: {
                        type: "bar",
                        height: "320px",
                        fontFamily: "Inter, sans-serif",
                        toolbar: {
                        show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                        },
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: {
                        fontFamily: "Inter, sans-serif",
                        },
                    },
                    states: {
                        hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                        },
                    },
                    stroke: {
                        show: true,
                        width: 0,
                        colors: ["transparent"],
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                        left: 2,
                        right: 2,
                        top: -14
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    xaxis: {
                        floating: false,
                        labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                        },
                        axisBorder: {
                        show: false,
                        },
                        axisTicks: {
                        show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1,
                    },
                    }

                    var chart = new ApexCharts(document.getElementById("collection-chart"), options);
            chart.render();


            });
            </script>

        </div>

        <!-- delinquents -->
        <div class="col-span-6 lg:col-span-2 p-4">
            <div class="flex justify-between">
                <h1 class="py-3 font-bold text-2xl">Delinquents</h1>
                <p class="p-3 text-xl font-medium">12</p>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        Neil Sims
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        email@flowbite.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        ₱320
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        Bonnie Green
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        email@flowbite.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        $3467
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        Michael Gough
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        email@flowbite.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        ₱67
                    </div>
                </div>
            </li>
            <li class="py-3 sm:py-4">
                <div class="flex items-center space-x-4">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        Thomas Lean
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        email@flowbite.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        ₱2367
                    </div>
                </div>
            </li>
            <li class="pt-3 pb-0 sm:pt-4">
                <div class="flex items-center space-x-4">

                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        Lana Byrd
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        email@flowbite.com
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        ₱367
                    </div>
                </div>
            </li>
            </ul>

            <div class="flex justify-end items-center pt-5">
                <!-- Button -->
                <button
                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                type="button">
                See all Bills
                </button>
            </div>

        </div>

    </div>




    <!-- fourth row -->

    <div class="mt-10 grid grid-cols-4">

        <!-- water consumption -->
        <div class="col-span-4 lg:col-span-2">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">1234</h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Water Consumption</p>
                </div>
                <div
                class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                23%
                <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                </svg>
                </div>
            </div>
            <div id="waters-chart" class="px-2.5"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
                <div class="flex justify-between items-center pt-5">
                <!-- Button -->
                <button
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="lastDaysdropdown"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    Last 7 days
                    <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                        </li>
                    </ul>
                </div>

                </div>
            </div>
            </div>

            <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                let options = {
                // set the labels option to true to show the labels on the X and Y axis
                xaxis: {
                    show: true,
                    categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'],
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                    },
                    axisBorder: {
                    show: false,
                    },
                    axisTicks: {
                    show: false,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                    formatter: function (value) {
                        return value;
                    }
                    }
                },
                series: [
                    {
                    name: "Water Consumption",
                    data: [150, 141, 145, 152, 135, 125],
                    color: "#1A56DB",
                    },

                ],
                chart: {
                    sparkline: {
                    enabled: false
                    },
                    height: "100%",
                    width: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                    enabled: false,
                    },
                    toolbar: {
                    show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                    show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false,
                },
                }

                if (document.getElementById("waters-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("waters-chart"), options);
                chart.render();
                }
            });
            </script>

        </div>

        <!-- electricity -->
        <div class="col-span-4 lg:col-span-2">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800">
            <div class="flex justify-between p-4 md:p-6 pb-0 md:pb-0">
                <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">1234</h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Water Consumption</p>
                </div>
                <div
                class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                23%
                <svg class="w-3 h-3 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                </svg>
                </div>
            </div>
            <div id="electric-chart" class="px-2.5"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
                <div class="flex justify-between items-center pt-5">
                <!-- Button -->
                <button
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="lastDaysdropdown"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    Last 7 days
                    <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                        </li>
                        <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                        </li>
                    </ul>
                </div>

                </div>
            </div>
            </div>

            <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                let options = {
                // set the labels option to true to show the labels on the X and Y axis
                xaxis: {
                    show: true,
                    categories: ['01 Feb', '02 Feb', '03 Feb', '04 Feb', '05 Feb', '06 Feb', '07 Feb'],
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                    },
                    axisBorder: {
                    show: false,
                    },
                    axisTicks: {
                    show: false,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                    formatter: function (value) {
                        return value;
                    }
                    }
                },
                series: [
                    {
                    name: "Electricity Consumption",
                    data: [150, 141, 145, 152, 135, 125],
                    color: "#ffba08",
                    },

                ],
                chart: {
                    sparkline: {
                    enabled: false
                    },
                    height: "100%",
                    width: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                    enabled: false,
                    },
                    toolbar: {
                    show: false,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                    show: false,
                    },
                },
                fill: {
                    type: "gradient",
                    gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                stroke: {
                    width: 6,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false,
                },
                }

                if (document.getElementById("electric-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("electric-chart"), options);
                chart.render();
                }
            });
            </script>

        </div>


    </div>
    <!-- fourth row row -->

    <div class="mt-10 grid grid-cols-6">
        <!-- concerns -->
        <div class="col-span-6 lg:col-span-3 p-4">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                    <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/comments.png" alt="comments"/>
                </div>
                <div>
                    <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">15</h5>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Concerns</p>
                </div>
                </div>
                <div>
                <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                    <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                    </svg>
                    42.5%
                </span>
                </div>
            </div>

            <div class="grid grid-cols-2">
                <dl class="flex items-center">
                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Resolved Concerns:</dt>
                    <dd class="text-gray-900 text-sm dark:text-white font-semibold">6</dd>
                </dl>
                <dl class="flex items-center justify-end">
                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Average days to be resolved:</dt>
                    <dd class="text-gray-900 text-sm dark:text-white font-semibold">1 day/s</dd>
                </dl>
            </div>

            <div id="column-chart"></div>
                <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-between items-center pt-5">
                    <!-- Button -->
                    <button
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="lastDaysdropdown"
                    data-dropdown-placement="bottom"
                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    Last 7 days
                    <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 7 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 30 days</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last 90 days</a>
                        </li>
                        </ul>
                    </div>

                </div>
                </div>
            </div>

            <script>
            // ApexCharts options and config
            window.addEventListener("load", function() {
                const options = {
                    colors: ["#1A56DB", "#FDBA8C"],
                    series: [
                        {
                        name: "Concern",
                        color: "#7d869c",
                        data: [
                            { x: "Mon", y: 231 },
                            { x: "Tue", y: 122 },
                            { x: "Wed", y: 63 },
                            { x: "Thu", y: 421 },
                            { x: "Fri", y: 122 },
                            { x: "Sat", y: 323 },
                            { x: "Sun", y: 111 },
                        ],
                        },
                        {
                        name: "Resolved",
                        color: "#e5e8b6",
                        data: [
                            { x: "Mon", y: 232 },
                            { x: "Tue", y: 113 },
                            { x: "Wed", y: 341 },
                            { x: "Thu", y: 224 },
                            { x: "Fri", y: 522 },
                            { x: "Sat", y: 411 },
                            { x: "Sun", y: 243 },
                        ],
                        },
                    ],
                    chart: {
                        type: "bar",
                        height: "320px",
                        fontFamily: "Inter, sans-serif",
                        toolbar: {
                        show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                        },
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: {
                        fontFamily: "Inter, sans-serif",
                        },
                    },
                    states: {
                        hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                        },
                    },
                    stroke: {
                        show: true,
                        width: 0,
                        colors: ["transparent"],
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                        left: 2,
                        right: 2,
                        top: -14
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    xaxis: {
                        floating: false,
                        labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                        },
                        axisBorder: {
                        show: false,
                        },
                        axisTicks: {
                        show: false,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        opacity: 1,
                    },
                    }

                    var chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();


            });
            </script>

        </div>
        <!-- guests -->
        <div class="col-span-6 lg:col-span-3 p-4">
                    <div class="flex justify-between">
                        <h1 class="py-3 font-bold text-xl">Total Guest Welcomed</h1>
                        <p class="p-3 text-xl font-semibold">12</p>
                    </div>
                    <div class="flex justify-between py-2">
                        <h1 class="py-1 font-light text-sm">Average Number of Days Stayed:</h1>
                        <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">

                        42.5% day/s
                </span>
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                        <li class="pb-3 sm:pb-4">
                            <div class="flex items-center space-x-4">

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Neil Sims
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <a href=""><img width="26" height="26" src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward"/></a>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Bonnie Green
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <a href=""><img width="26" height="26" src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward"/></a>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Michael Gough
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <a href=""><img width="26" height="26" src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward"/></a>
                                </div>
                            </div>
                        </li>
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Thomas Lean
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <a href=""><img width="26" height="26" src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward"/></a>
                                </div>
                            </div>
                        </li>
                        <li class="pt-3 pb-0 sm:pt-4">
                            <div class="flex items-center space-x-4">

                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                    Lana Byrd
                                    </p>
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    email@flowbite.com
                                    </p>
                                </div>
                                <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                    <a href=""><img width="26" height="26" src="https://img.icons8.com/metro/26/EBEBEB/forward.png" alt="forward"/></a>
                                </div>
                            </div>
                        </li>
                </ul>
                <div class="flex justify-end items-center pt-5">
                    <!-- Button -->
                    <button
                    class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    See all Guests
                    </button>
                </div>

        </div>

    </div>
    <!-- fifth row row -->

    <div class="mt-10 grid grid-cols-6">
        <!-- election -->
        <div class="col-span-6 lg:col-span-3 p-4">
                    <div class="flex justify-between">
                        <h1 class="py-3 font-bold text-xl">Election Date</h1>
                        <p class="p-3 text-lg font-medium">October 23, 2023</p>
                    </div>
                    <div class="flex justify-between py-2">
                        <h1 class="py-1 font-light text-sm">Current BODS:</h1>
                        <p class="p-3 text-sm font-medium">5</p>
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                    <li class="pb-3 sm:pb-4">
                        <div class="flex items-center space-x-4">

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Neil Sims
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Bonnie Green
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Michael Gough
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Thomas Lean
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="pt-3 pb-0 sm:pt-4">
                        <div class="flex items-center space-x-4">

                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Lana Byrd
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@flowbite.com
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>


        </div>
        <!-- memos -->
        <div class="col-span-6 lg:col-span-3">
        <div class="w-full bg-white rounded-lg shadow p-3 md:p-6 justify-end">
            <div class="flex justify-between pb-0 lg:pb- mb-4">
                    <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26" viewBox="0 0 26 26"
                    style="fill:#737373;">
                    <path d="M 20.265625 4.207031 C 20.023438 3.96875 19.773438 3.722656 19.527344 3.476563 C 19.277344 3.230469 19.035156 2.980469 18.792969 2.734375 C 17.082031 0.988281 16.0625 0 15 0 L 7 0 C 4.796875 0 3 1.796875 3 4 L 3 22 C 3 24.203125 4.796875 26 7 26 L 19 26 C 21.203125 26 23 24.203125 23 22 L 23 8 C 23 6.9375 22.011719 5.917969 20.265625 4.207031 Z M 21 22 C 21 23.105469 20.105469 24 19 24 L 7 24 C 5.894531 24 5 23.105469 5 22 L 5 4 C 5 2.894531 5.894531 2 7 2 L 14.289063 1.996094 C 15.011719 2.179688 15 3.066406 15 3.953125 L 15 7 C 15 7.550781 15.449219 8 16 8 L 19 8 C 19.996094 8 21 8.003906 21 9 Z"></path>
                    </svg>
                    </div>
                    <div>
                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">3</h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Memos</p>
                    </div>
                    </div>
                    <div>

                    </div>
                </div>
        </div>
        </div>


    </div>


</x-new-layout>
