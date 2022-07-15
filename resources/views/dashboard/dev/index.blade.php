<x-app-layout>
    @section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    @endsection

    @section('title', '| Dashboard')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">

                                <li class="text-gray-500">Dashboard</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    {{-- <x-button onclick="window.location.href='/properties'">
                        Back</x-button>

                    @can('accountowner')
                    <x-button
                        onclick="window.location.href='/property/{{ Session::get('property') }}/team/{{ Str::random(8) }}/create'">
                        Create Team</x-button>
                    @endcan --}}
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
                                                <h5 class="font-bold uppercase text-gray-500">Total Sessions</h5>
                                                <h3 class="font-bold text-3xl">{{ $sessions->count() }} <span
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
                                                <h5 class="font-bold uppercase text-gray-500">Total Properties</h5>
                                                <h3 class="font-bold text-3xl"> <span class="text-pink-500"><i
                                                            class="fas fa-exchange-alt"></i>{{ $properties->count()
                                                        }}</span>
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
                                                <h5 class="font-bold uppercase text-gray-500">Total Users</h5>
                                                <h3 class="font-bold text-3xl"> <span class="text-yellow-600"><i
                                                            class="fas fa-caret-up"></i>{{ $users->count()-2 }}</span>
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
                                                <h5 class="font-bold uppercase text-gray-500">Total Units</h5>
                                                <h3 class="font-bold text-3xl">{{ $units->count() }}</h3>
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
                                                <h5 class="font-bold uppercase text-gray-500">Total tenants</h5>
                                                <h3 class="font-bold text-3xl">{{ $tenants->count() }}</h3>
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
                                                <h5 class="font-bold uppercase text-gray-500">Total Contracts</h5>
                                                <h3 class="font-bold text-3xl"><span class="text-red-500"><i
                                                            class="fas fa-caret-up"></i></span>{{ $contracts->count() }}
                                                </h3>
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
                                            <h5 class="font-bold uppercase text-gray-600">Sign Up</h5>
                                        </div>
                                        <div class="p-5">
                                            <canvas id="chartjs-7" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                            <script>
                                                new Chart(document.getElementById("chartjs-7"), {
                                                        "type": "bar",
                                                        "data": {
                                                            "labels": {!!$properties_count_labels!!},
                                                            "datasets": [{
                                                                "label": "Property Count",
                                                                "data": {!!$properties_count_values!!},
                                                                "borderColor": "rgb(255, 99, 132)",
                                                                "backgroundColor": "rgba(255, 99, 132, 0.2)"
                                                            }, {
                                                                "label": "User Count",
                                                                "data": {!!$users_count_values!!},
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
                                            <h5 class="font-bold uppercase text-gray-600">Sessions</h5>
                                        </div>
                                        <div class="p-5">
                                            <canvas id="chartjs-0" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                            <script>
                                                new Chart(document.getElementById("chartjs-0"), {
                                                        "type": "line",
                                                        "data": {
                                                            "labels": {!!$get_session_rate_labels!!},
                                                            "datasets": [{
                                                                "label": "Sessions",
                                                                "data": {!!$sessions_count_values!!},
                                                                "fill": false,
                                                                "borderColor": "rgb(75, 192, 192)",
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
                                            <h5 class="font-bold uppercase text-gray-600">Property Type</h5>
                                        </div>
                                        <div class="p-5"><canvas id="property-type" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                            <script>
                                                new Chart(document.getElementById("property-type"), {
                                                        "type": "doughnut",
                                                        "data": {
                                                            "labels": {!!$get_property_type_labels!!},
                                                            "datasets": [{
                                                                "label": "Issues",
                                                                "data": {!!$get_property_type_values!!},
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
                                    <!--Graph Card-->
                                    <div class="bg-white border rounded shadow">
                                        <div class="border-b p-3">
                                            <h5 class="font-bold uppercase text-gray-600">Tenant Type</h5>
                                        </div>
                                        <div class="p-5"><canvas id="tenant-type" class="chartjs" width="undefined"
                                                height="undefined"></canvas>
                                            <script>
                                                new Chart(document.getElementById("tenant-type"), {
                                                        "type": "doughnut",
                                                        "data": {
                                                            "labels": {!!$get_property_tenant_type_labels!!},
                                                            "datasets": [{
                                                                "label": "Issues",
                                                                "data": {!!$get_property_tenant_type_values!!},
                                                                "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                                            }]
                                                        }
                                                    });
                                            </script>
                                        </div>
                                    </div>
                                    <!--/Graph Card-->
                                </div>

                                <div class="w-full md:w-1/2 p-3">
                                    <h1>Points Leader</h1>
                                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                                        <div class=" overflow-hidden shadow-sm sm:rounded-lg">

                                            <div class="flex flex-col">
                                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                                    <div
                                                        class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                                        @if (!$points->count())
                                                        <span class="text-center text-red">No points found!</span>
                                                        @else
                                                        <div
                                                            class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                                            <table class="min-w-full divide-y divide-gray-200">
                                                                <thead class="bg-gray-50">
                                                                    <tr>
                                                                        <x-th>#</x-th>
                                                                        <x-th>User</x-th>
                                                                        <x-th>Points</x-th>
                                                                    </tr>
                                                                </thead>
                                                                <?php $ctr = 1; ?>
                                                                @foreach ($points as $point)
                                                                <tbody class="bg-white divide-y divide-gray-200">
                                                                    <tr>
                                                                        <x-td>{{ $ctr++ }}</x-td>
                                                                        <x-td>{{ $point->name }}</x-td>
                                                                        <x-td>{{ $point->total }}</x-td>
                                                                    </tr>
                                                                </tbody>
                                                                @endforeach
                                                            </table>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    {{ $points->links() }}
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