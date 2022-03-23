<x-app-layout>
    @section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    @endsection

    @section('title', '| '.$property->property)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="#/" class="text-blue-600 hover:text-blue-700">{{ $property->property }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Dashboard</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button
                        onclick="window.location.href='/properties'">
                        Back</x-button>
                    <x-button
                        onclick="window.location.href='/property/{{ Session::get('property') }}/team/{{ Str::random(8) }}/create'">
                        Create Team</x-button>
                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!--Container-->
                    <div class="container w-full mx-auto">

                        <div class="w-full md:px-0 mb-16 text-gray-800 leading-normal">

                            <!--Console Content-->

                            <div class="flex flex-wrap">
                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Metric Card-->
                                    <div class="bg-white border rounded shadow p-2">
                                        <div class="flex flex-row items-center">
                                            <div class="flex-shrink pr-4">
                                                <div class="rounded p-3 bg-green-600"><i
                                                        class="fa fa-solid fa-coins fa-2x fa-fw fa-inverse"></i>

                                                </div>
                                            </div>
                                            <div class="flex-1 text-right md:text-center">
                                                <h5 class="font-bold uppercase text-gray-500">Total Collections</h5>
                                                <h3 class="font-bold text-3xl">{{ $collections }} <span
                                                        class="text-green-500"><i class="fas fa-caret-up"></i></span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Metric Card-->
                                </div>
                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Metric Card-->
                                    <div class="bg-white border rounded shadow p-2">
                                        <div class="flex flex-row items-center">
                                            <div class="flex-shrink pr-4">
                                                <div class="rounded p-3 bg-pink-600"><i
                                                        class="fas fa-users fa-2x fa-fw fa-inverse"></i>
                                                </div>
                                            </div>
                                            <div class="flex-1 text-right md:text-center">
                                                <h5 class="font-bold uppercase text-gray-500">Total Tenants</h5>
                                                <h3 class="font-bold text-3xl">{{ $tenants }} <span
                                                        class="text-pink-500"><i class="fas fa-exchange-alt"></i></span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Metric Card-->
                                </div>
                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Metric Card-->
                                    <div class="bg-white border rounded shadow p-2">
                                        <div class="flex flex-row items-center">
                                            <div class="flex-shrink pr-4">
                                                <div class="rounded p-3 bg-yellow-600"><i
                                                        class="fas fa-solid fa-house fa-2x fa-fw fa-inverse"></i></div>
                                            </div>
                                            <div class="flex-1 text-right md:text-center">
                                                <h5 class="font-bold uppercase text-gray-500">Total Units</h5>
                                                <h3 class="font-bold text-3xl">{{ $units }} <span
                                                        class="text-yellow-600"><i class="fas fa-caret-up"></i></span>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Metric Card-->
                                </div>
                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Metric Card-->
                                    <div class="bg-white border rounded shadow p-2">
                                        <div class="flex flex-row items-center">
                                            <div class="flex-shrink pr-4">
                                                <div class="rounded p-3 bg-blue-600"><i
                                                        class="fas fa-server fa-2x fa-fw fa-inverse"></i>
                                                </div>
                                            </div>
                                            <div class="flex-1 text-right md:text-center">
                                                <h5 class="font-bold uppercase text-gray-500">Server Uptime</h5>
                                                <h3 class="font-bold text-3xl">152 days</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Metric Card-->
                                </div>
                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Metric Card-->
                                    <div class="bg-white border rounded shadow p-2">
                                        <div class="flex flex-row items-center">
                                            <div class="flex-shrink pr-4">
                                                <div class="rounded p-3 bg-indigo-600"><i
                                                        class="fas fa-tasks fa-2x fa-fw fa-inverse"></i>
                                                </div>
                                            </div>
                                            <div class="flex-1 text-right md:text-center">
                                                <h5 class="font-bold uppercase text-gray-500">To Do List</h5>
                                                <h3 class="font-bold text-3xl">{{ $concerns }} concerns</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Metric Card-->
                                </div>
                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Metric Card-->
                                    <div class="bg-white border rounded shadow p-2">
                                        <div class="flex flex-row items-center">
                                            <div class="flex-shrink pr-4">
                                                <div class="rounded p-3 bg-red-600"><i
                                                        class="fas fa-inbox fa-2x fa-fw fa-inverse"></i>
                                                </div>
                                            </div>
                                            <div class="flex-1 text-right md:text-center">
                                                <h5 class="font-bold uppercase text-gray-500">Issues</h5>
                                                <h3 class="font-bold text-3xl">3 <span class="text-red-500"><i
                                                            class="fas fa-caret-up"></i></span></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/Metric Card-->
                                </div>
                            </div>

                            <!--Divider-->
                            <hr class="border-b-2 border-gray-400 my-8 mx-4">

                            <div class="flex flex-row flex-wrap flex-grow mt-2">

                                <div class="w-full md:w-1/2 p-3">
                                    <!--Graph Card-->
                                    <div class="bg-white border rounded shadow">
                                        <div class="border-b p-3">
                                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                                        </div>
                                        <div class="p-5">
                                            <canvas id="chartjs-7" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                            <script>
                                                new Chart(document.getElementById("chartjs-7"), {
                                                        "type": "bar",
                                                        "data": {
                                                            "labels": ["January", "February", "March", "April"],
                                                            "datasets": [{
                                                                "label": "Page Impressions",
                                                                "data": [10, 20, 30, 40],
                                                                "borderColor": "rgb(255, 99, 132)",
                                                                "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                                            }, {
                                                                "label": "Adsense Clicks",
                                                                "data": [5, 15, 10, 30],
                                                                "type": "line",
                                                                "fill": false,
                                                                "borderColor": "rgb(54, 162, 235)"
                                                            }]
                                                        },
                                                        "options": {
                                                            "scales": {
                                                                "yAxes": [{
                                                                    "ticks": {
                                                                        "beginAtZero": true
                                                                    }
                                                                }]
                                                            }
                                                        }
                                                    });
                                            </script>
                                        </div>
                                    </div>
                                    <!--/Graph Card-->
                                </div>

                                <div class="w-full md:w-1/2 p-3">
                                    <!--Graph Card-->
                                    <div class="bg-white border rounded shadow">
                                        <div class="border-b p-3">
                                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                                        </div>
                                        <div class="p-5">
                                            <canvas id="chartjs-0" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                            <script>
                                                new Chart(document.getElementById("chartjs-0"), {
                                                        "type": "line",
                                                        "data": {
                                                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                                            "datasets": [{
                                                                "label": "Views",
                                                                "data": [65, 59, 80, 81, 56, 55, 40],
                                                                "fill": false,
                                                                "borderColor": "rgb(75, 192, 192)",
                                                                "lineTension": 0.1
                                                            }]
                                                        },
                                                        "options": {}
                                                    });
                                            </script>
                                        </div>
                                    </div>
                                    <!--/Graph Card-->
                                </div>

                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Graph Card-->
                                    <div class="bg-white border rounded shadow">
                                        <div class="border-b p-3">
                                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                                        </div>
                                        <div class="p-5">
                                            <canvas id="chartjs-1" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                            <script>
                                                new Chart(document.getElementById("chartjs-1"), {
                                                        "type": "bar",
                                                        "data": {
                                                            "labels": ["January", "February", "March", "April", "May", "June", "July"],
                                                            "datasets": [{
                                                                "label": "Likes",
                                                                "data": [65, 59, 80, 81, 56, 55, 40],
                                                                "fill": false,
                                                                "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)", "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)", "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"],
                                                                "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)", "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)", "rgb(201, 203, 207)"],
                                                                "borderWidth": 1
                                                            }]
                                                        },
                                                        "options": {
                                                            "scales": {
                                                                "yAxes": [{
                                                                    "ticks": {
                                                                        "beginAtZero": true
                                                                    }
                                                                }]
                                                            }
                                                        }
                                                    });
                                            </script>
                                        </div>
                                    </div>
                                    <!--/Graph Card-->
                                </div>

                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Graph Card-->
                                    <div class="bg-white border rounded shadow">
                                        <div class="border-b p-3">
                                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                                        </div>
                                        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                            <script>
                                                new Chart(document.getElementById("chartjs-4"), {
                                                        "type": "doughnut",
                                                        "data": {
                                                            "labels": ["P1", "P2", "P3"],
                                                            "datasets": [{
                                                                "label": "Issues",
                                                                "data": [300, 50, 100],
                                                                "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                                            }]
                                                        }
                                                    });
                                            </script>
                                        </div>
                                    </div>
                                    <!--/Graph Card-->
                                </div>

                                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                                    <!--Template Card-->
                                    <div class="bg-white border rounded shadow">
                                        <div class="border-b p-3">
                                            <h5 class="font-bold uppercase text-gray-600">Template</h5>
                                        </div>
                                        <div class="p-5">

                                        </div>
                                    </div>
                                    <!--/Template Card-->
                                </div>

                                <div class="w-full p-3">
                                    <!--Table Card-->
                                    <div class="bg-white border rounded shadow">
                                        <div class="border-b p-3">
                                            <h5 class="font-bold uppercase text-gray-600">Expiring contracts</h5>
                                        </div>
                                        <div class="p-5">
                                            <table class="w-full p-5 text-gray-700">
                                                <thead>
                                                    <tr>
                                                        <th class="text-left text-blue-900">#</th>
                                                        <th class="text-left text-blue-900">Tenant</th>
                                                        <th class="text-left text-blue-900">Email</th>
                                                        <th class="text-left text-blue-900">Mobile</th>
                                                        <th class="text-left text-blue-900">Unit</th>
                                                        <th class="text-left text-blue-900">Rent</th>
                                                        <th class="text-left text-blue-900">Duration</th>
                                                        <th class="text-left text-blue-900">Status</th>
                                                        <th class="text-left text-blue-900">Expiration date</th>
                                                    </tr>
                                                </thead>

                                                <?php $ctr = 1; ?>
                                                <tbody>
                                                    @forelse($contracts as $contract)
                                                    <tr>
                                                        <td>{{ $ctr++ }}</td>
                                                        <td>{{ $contract->tenant }}</td>
                                                        <td>{{ $contract->email }}</td>
                                                        <td>{{ $contract->mobile_number }}</td>
                                                        <td>{{ $contract->building.' '.$contract->unit }}</td>
                                                        <td>{{ number_format($contract->rent, 2) }}</td>
                                                        <td>{{ Carbon\Carbon::parse($contract->start)->format('M d,
                                                            Y').'-'.Carbon\Carbon::parse($contract->end)->format('M d,
                                                            Y') }}</td>
                                                        <td>{{ $contract->contract_status }}</td>
                                                        <td>{{ Carbon\Carbon::parse($contract->end)->format('M d, Y') }}
                                                            (<span class="text-red">{{
                                                                Carbon\Carbon::parse($contract->end)->diffForHumans()
                                                                }}</span>)</td>
                                                    </tr>
                                                    @empty
                                                    <span>No contracts found!</span>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    @endsection
</x-app-layout>