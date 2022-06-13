@section('styles')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
<!--Replace with your tailwind.css once created-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
    integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
@endsection
<x-index-layout>
    @section('title', '| Dashboard')
    <x-slot name="labels">
        Dashboard
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='/properties'">
            Select another property
        </x-button>

        @can('manager')
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/edit'">
            Edit your property
        </x-button>


        @endcan
    </x-slot>

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
                                <h5 class="font-bold uppercase text-gray-500">Monthly Collections</h5>
                                <h3 class="font-bold text-3xl">{{ number_format($collections, 2) }}
                                    {{-- <span class="text-green-500"><i class="fas fa-caret-up"></i></span>
                                    --}}
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
                                        class="fa-2x fa-fw fa-solid fa-inversef fa-file-invoice-dollar"></i>

                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Monthly Bills</h5>
                                <h3 class="font-bold text-3xl">{{ number_format($bills, 2) }}
                                    {{-- <span class="text-pink-500"><i class="fas fa-exchange-alt"></i></span> --}}
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
                                <h5 class="font-bold uppercase text-gray-500">Units</h5>
                                <h3 class="font-bold text-3xl">{{ $units }}
                                    {{-- <span class="text-yellow-600"><i class="fas fa-caret-up"></i></span> --}}
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
                                <div class="rounded p-3 bg-blue-600">
                                    <i class="fa-solid fa-2x fa-users fa-fw fa-inverse"></i>

                                    {{-- <i class="fas fa-server fa-2x fa-fw fa-inverse"></i> --}}
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Tenants</h5>
                                <h3 class="font-bold text-3xl">{{ $tenants }}</h3>
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
                                <div class="rounded p-3 bg-indigo-600">
                                    <i class="fa-solid fa-2x fa-file-contract fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Active Contracts
                                </h5>
                                <h3 class="font-bold text-3xl">{{ $contracts }}</h3>
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
                                        class="fas fa-screwdriver-wrench fa-2x fa-fw fa-inverse"></i>
                                </div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-500">Pending Concerns</h5>
                                <h3 class="font-bold text-3xl">{{ $concerns }}
                                    {{-- <span class="text-red-500"><i class="fas fa-caret-up"></i></span>
                                    --}}
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>
            </div>

            @if($expiring_contracts->count())
            <div class="w-full p-3">
                <!--Table Card-->
                <div class="bg-white border rounded shadow">
                    <div class="border-b p-3">
                        <h5 class="font-bold uppercase text-gray-600">Expiring contracts</h5>
                    </div>
                    <div class="p-5">

                        <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="bg-white border-b border-gray-200">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <?php $ctr =1; ?>
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <x-th>#</x-th>
                                                            <x-th>Tenant</x-th>
                                                            <x-th>Unit</x-th>
                                                            <x-th>Status</x-th>
                                                            <x-th>Moveout date</x-th>
                                                            <x-th></x-th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($expiring_contracts as $contract)
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        <tr>
                                                            <x-td>{{ $ctr++ }}</x-td>
                                                            <x-td>
                                                                <div class="flex items-center">
                                                                    <div class="flex-shrink-0 h-10 w-10">
                                                                        <a
                                                                            href="/tenant/{{ $contract->tenant_uuid }}/contracts">
                                                                            <img class="h-10 w-10 rounded-full"
                                                                                src="/storage/{{ $contract->tenant->photo_id }}"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="ml-4">
                                                                        <div class="text-sm font-medium text-gray-900">
                                                                            <b>{{
                                                                                $contract->tenant->tenant
                                                                                }}</b>
                                                                        </div>
                                                                        <div class="text-sm text-gray-500">
                                                                            {{
                                                                            $contract->tenant->type
                                                                            }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </x-td>
                                                            <x-td>
                                                                <div class="text-sm text-gray-900">{{
                                                                    $contract->unit->unit }}
                                                                </div>

                                                                <div class="text-sm text-gray-500">{{
                                                                    $contract->unit->building->building}}
                                                                </div>

                                                            </x-td>
                                                            <x-td>
                                                                @if($contract->status === 'active')
                                                                <span
                                                                    class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                    <i class="fa-solid fa-circle-check"></i>
                                                                    {{
                                                                    $contract->status }}
                                                                    @else
                                                                    <span
                                                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                                        <i class="fa-solid fa-circle-xmark"></i>
                                                                        {{
                                                                        $contract->status }}
                                                                    </span>
                                                                    @endif
                                                            </x-td>
                                                            <x-td>
                                                                {{
                                                                Carbon\Carbon::parse($contract->end)->format('M
                                                                d,
                                                                Y') }}
                                                                <span
                                                                    class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-300">
                                                                    <svg class="mr-1 w-3 h-3" fill="currentColor"
                                                                        viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                                                            clip-rule="evenodd">
                                                                        </path>
                                                                    </svg>
                                                                    {{
                                                                    Carbon\Carbon::parse($contract->end)->diffForHumans()
                                                                    }}
                                                                </span>

                                                            </x-td>
                                                            <x-td>
                                                                @can('admin')
                                                                <x-button id="dropdownDividerButton"
                                                                    data-dropdown-toggle="dropdownDivider.{{ $contract->uuid }}"
                                                                    type="button">Actions
                                                                    <svg class="ml-2 w-4 h-4" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M19 9l-7 7-7-7">
                                                                        </path>
                                                                    </svg>
                                                                </x-button>

                                                                <div id="dropdownDivider.{{ $contract->uuid }}"
                                                                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                                    <ul class="py-1"
                                                                        aria-labelledby="dropdownDividerButton">
                                                                        {{-- <li>
                                                                            <a href="/tenant/{{ $contract->tenant_uuid }}/edit"
                                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                                    class="fa-solid fa-file-contract"></i>&nbspShow
                                                                                Tenant</a>
                                                                        </li> --}}
                                                                        <li>
                                                                            <a href="/unit/{{ $contract->unit_uuid }}/edit"
                                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                                    class="fa-solid fa-house"></i>&nbspShow
                                                                                Unit</a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="/contract/{{ $contract->uuid }}/transfer"
                                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                                    class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                                                                Contract</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="/contract/{{ $contract->uuid }}/renew"
                                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                                    class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                                                                Contract</a>
                                                                        </li>

                                                                    </ul>
                                                                    @if($contract->status ===
                                                                    'active')
                                                                    <div class="py-1">
                                                                        <a href="/contract/{{ $contract->uuid }}/moveout/bills"
                                                                            class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                                            <i
                                                                                class="fa-solid fa-arrow-right-to-bracket"></i>&nbspMoveout</a>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                                @endcan
                                                            </x-td>

                                                        </tr>
                                                    </tbody>
                                                    @endforeach
                                                </table>
                                                {{ $expiring_contracts->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif

            <!--Divider-->
            {{--
            <hr class="border-b-2 border-gray-400 my-8 mx-4"> --}}

            <div class="flex flex-row flex-wrap flex-grow mt-2">

                <div class="w-full md:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">Current Occupancy Rate ({{
                                number_format($current_occupancy_rate->occupancy_rate, 2) }}%)</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="occupancy_rate" class="chartjs" width="undefined" height="undefined"></canvas>
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
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">Current Collection Rate ({{
                                number_format($current_collection_rate, 2) }}%)</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="collection_rate" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("collection_rate"), {
                                                        "type": "bar",
                                                        "data": {
                                                            "labels": {!!$collection_rate_date!!},
                                                            "datasets": [{
                                                                "label": "Collections",
                                                                 "data": {!!$collection_rate_value!!},
                                                                "fill": true,
                                                                "borderColor": "rgba(255, 99, 132, 0.2)",
                                                                "backgroundColor": "rgba(255, 99, 132, 0.2)",
                                                                "lineTension": 0.1
                                                            }, {
                                                            "label": "Bills",
                                                            "data": {!!$bill_rate_value!!},
                                                            "type": "bar",
                                                            "fill": true,
                                                            "borderColor": "rgb(255, 159, 64, 0.2)",
                                                            "backgroundColor": "rgb(255, 159, 64, 0.2)"
                                                            }
                                                            , {
                                                            //"label": "Collections Overtime",
                                                            "data": {!!$collection_rate_value!!},
                                                            "type": "line",
                                                            "fill": false,
                                                            "borderColor": "rgb(148,0,211)",
                                                            "backgroundColor": "rgba(148,0,211)",
                                                            }
                                                                , {
                                                            //"label": "Collections Overtime",
                                                            "data": {!!$bill_rate_value!!},
                                                            "type": "line",
                                                            "fill": false,
                                                            "borderColor": "rgb(148,0,211)",
                                                            "backgroundColor": "rgba(148,0,211)",
                                                            }
                                                        ]
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
                            <h5 class="font-bold uppercase text-gray-600">Tenant Moveins/Moveouts</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-1"), {
                                                        "type": "bar",
                                                        "data": {
                                                            "labels": {!!$tenant_movein_label!!},
                                                            "datasets": [{
                                                                "label": "No of Moveins",
                                                                "data": {!!$tenant_movein_value!!},
                                                                "fill": true,
                                                                "backgroundColor": ["rgba(255, 159, 64)"],
                                                                "borderColor": ["rgb(255, 159, 64)"],
                                                                "borderWidth": 1
                                                            },{
                                                                "label": "No of Moveouts",
                                                                "data": {!!$tenant_moveout_value!!},
                                                                "fill": true,
                                                                "backgroundColor": ["rgba(255, 159, 64, 0.2)"],
                                                                "borderColor": ["rgb(255, 159, 64, 0.2)"],
                                                                "borderWidth": 1
                                                            }
                                                        ]
                                                        },
                                                        "options": {
                                                            "scales": {
                                                                "yAxes": [{
                                                                    "ticks": {
                                                                        "beginAtZero": false
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
                            <h5 class="font-bold uppercase text-gray-600">Reasons for moveout</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="moveout_reason" class="chartjs" width="undefined" height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("moveout_reason"), {
                                                        "type": "bar",
                                                        "data": {
                                                            "labels": {!!$reasons_for_moveout_label!!},
                                                            "datasets": [{
                                                                
                                                                "data": {!!$reasons_for_moveout_value!!},
                                                                "fill": true,
                                                                "backgroundColor": ["rgba(255, 159, 64)"],
                                                                "borderColor": ["rgb(255, 159, 64)"],
                                                                "borderWidth": 1
                                                            }
                                                        ]
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
                            <h5 class="font-bold uppercase text-gray-600">Tenant Type</h5>
                        </div>
                        <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined"
                                height="undefined"></canvas>
                            <script>
                                new Chart(document.getElementById("chartjs-4"), {
                                                        "type": "doughnut",
                                                        "data": {
                                                            "labels": {!!$tenant_type_label!!},
                                                            "datasets": [{
                                                                "label": "Issues",
                                                                "data": {!!$tenant_type_value!!},
                                                                "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)"]
                                                            }]
                                                        }
                                                    });
                            </script>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-index-layout>
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