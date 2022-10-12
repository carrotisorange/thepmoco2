<x-new-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    @section('title','Dashboard | '. Session::get('property_name'))

    <!-- Main area -->

    <main class="flex-1 pb-2">
        <div class="">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mt-2 grid grid-cols-1 gap-5 lg:grid-cols-3">

                    <div class="bg-white overflow-hidden">
                        <div class="p-5">
                            <div class="flex items-center">

                                <div class="w-0 flex-1">





                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-x-4  sm:grid-cols-6">

                            <div class="sm:col-span-6 ml-2 font-bold text-3xl mb-5">{{ $property->property }}</div>
                            <div class="sm:col-span-6 mb-5">
                                <div class="bg-purple-300 h-35 overflow-hidden shadow rounded-lg">
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="flex">
                                            </div>
                                            <div class="w-0 flex-1">
                                                <dl>
                                                    <dt class="text-lg font-bold font-body text-gray-700 truncate">
                                                        Welcome
                                                        back, {{ auth()->user()->name }}</dt>
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


                            <div class="sm:col-span-6 mb-5">
                                <div class="text-l font-semibold font-body text-gray-500 underline truncate">
                                    <a href="/property/{{ $property->uuid }}/concern">Pending
                                        Concerns: {{ $pending_concerns->count() }}</a>
                                </div>
                                <div class="bg-white overflow-hidden shadow rounded-lg px-5 py-5 mb-5">
                                    @forelse ($pending_concerns->take(1)->get() as $item)
                                    <div class="text-semibold">
                                        <a href="#/" class="text-sm text-gray-900 font-bold mt-2">{{
                                            $item->tenant->tenant
                                            }} ({{ $item->unit->unit }}) reported {{ $item->category->category }}
                                            concern.</a>
                                        <div class="flex justify-end gap-2">
                                            <div button type="button"
                                                class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <a
                                                    href="/property/{{ $property->uuid }}/concern/{{ $item->id }}">View</a></button>
                                            </div>

                                        </div>
                                    </div>
                                    @empty
                                    <div class="text-semibold">
                                        <a href="#/" class="text-sm text-gray-900 font-bold mt-2">
                                            No pending concerns found.
                                        </a>

                                    </div>
                                    @endforelse
                                </div>

                            </div>









                            <!-- concerns received -->


                            <div class="sm:col-span-3">

                                <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-10">
                                    <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                        Concerns
                                        Received:</div>
                                    <div class="text-center font-semibold font-body text-gray-500 truncate"><a
                                            href="/property/{{ $property->uuid }}/concern/"
                                            class="text-gray-700 text-3xl ">{{ $concerns->count() }}</a> </div>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <div class="bg-gray-50 h-20 overflow-hidden shadow rounded-lg mb-10">
                                    <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                        Concerns
                                        Closed:</div>
                                    <div class="text-center font-semibold font-body text-gray-500 truncate"><a
                                            href="/property/{{ $property->uuid }}/concern/closed"
                                            class="text-gray-700 text-3xl ">{{ $closed_concerns->count() }}</a> </div>
                                </div>
                            </div>








                            <!-- number by categories scroll -->



                            <div class="sm:col-span-3">

                                <div class="bg-purple-100 h-20 overflow-hidden shadow rounded-lg mb-5 mt-2">
                                    <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">Units:
                                    </div>
                                    <div class="text-center font-semibold font-body text-gray-500 truncate"><a
                                            href="/property/{{ $property->uuid }}/unit"
                                            class="text-gray-700 text-3xl ">{{ $units->count() }}</a> </div>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <div class="bg-purple-100 h-20 overflow-hidden shadow rounded-lg mb-5 mt-2">
                                    <div class="ml-2 mt-2 text-sm font-semibold font-body text-gray-500 truncate">
                                        Tenants:
                                    </div>
                                    <div class="text-center font-semibold font-body text-gray-500 truncate"><a
                                            href="/property/{{ $property->uuid }}/tenant"
                                            class="text-gray-700 text-3xl ">{{ $tenants->count() }}</a> </div>
                                </div>
                            </div>





                            <div class="sm:col-span-6 mt-5">

                                 <a href="#/" class="text-sm text-gray-900 font-bold mt-2">Current Occupancy Rate: {{
                                number_format($current_occupancy_rate->occupancy_rate, 2) }}%</a>
                                <div class="">
                      
                               <canvas id="occupancy_rate" class="chartjs" width="undefined" height="undefined"></canvas>


                                    <!-- graph chart.js -->
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                                    <!-- chart line -->
                                   <script>
                                        new Chart(document.getElementById("occupancy_rate"), {
                                                                                            "type": "line",
                                                                                            "data": {
                                                                                                "labels": {!!$occupancy_rate_date!!},
                                                                                                "datasets": [{
                                                                                                    "label": " Occupancy Graph",
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

                            <div class="sm:col-span-3">
                                <div class="mt-10 text-sm text-center font-semibold font-body text-gray-500 truncate">
                                    Occupied: <a href=# class="text-indigo-600 text-lg">{{ $occupied_units->count()
                                        }}</a> </div>
                                <div class="flex justify-center item-center">
                                    <img src="{{ asset('/brands/key.png') }}" alt="building"
                                        class="h-20 w-20 object-center object-cover ">
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <div class="mt-10 text-sm text-center font-semibold font-body text-gray-500 truncate">
                                    Vacant: <a href=# class="text-indigo-600 text-lg">30</a> </div>
                                <div class="flex justify-center item-center">
                                    <img src="{{ asset('/brands/ghost.png') }}" alt="building"
                                        class="h-20 w-20 object-center object-cover ">
                                </div>

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

                        <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                                <div class="bg-gray-50 h-36 mt-10 overflow-hidden shadow rounded-lg">
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                            </div>

                                            <div class="w-0 flex-1">
                                                <div
                                                    class="text-l font-semibold font-body text-gray-500 underline truncate">
                                                    <a href="/property/{{ $property->uuid }}/contract/pendingmoveout">Moveout
                                                        Requests: {{ $pending_contracts->count() }}</a>
                                                </div>
                                                @forelse ($pending_contracts->take(1)->get() as $item)
                                                <a href="#/" class="text-sm text-gray-900 font-bold mt-2">
                                                    {{ $item->tenant->tenant }} requested to moveout in unit {{
                                                    $item->unit->unit }}
                                                </a>
                                                <div class="flex justify-end gap-2">
                                                    <div button type="button"
                                                        class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <a
                                                            href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout">View</a></button>
                                                    </div>

                                                </div>
                                                @empty
                                                <a href="#/" class="text-sm text-gray-900 font-bold mt-2">
                                                    No moveout requests found.
                                                </a>
                                                {{-- <div class="flex justify-end gap-2">
                                                    <div button type="button"
                                                        class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <a
                                                            href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout">View</a></button>
                                                    </div>

                                                </div> --}}
                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-3">

                                <div class="text-center font-semibold text-lg text-gray-500 mt-5 mb-5">Moveouts:</div>
                                <div class="bg-purple-100 h-16 overflow-hidden shadow rounded-lg mb-2">
                                    <div class="py-3 text-center font-semibold font-body text-gray-500 truncate"><a
                                            href=# class="text-gray-700 text-3xl ">{{ $movingout_contracts->count()
                                            }}</a> </div>
                                </div>
                            </div>
                            <div class="sm:col-span-3">
                                <div class="text-center font-semibold text-lg text-gray-500 mt-5 mb-5">Move Ins:</div>
                                <div class="bg-purple-100 h-16 overflow-hidden shadow rounded-lg mb-2">
                                    <div class="py-3 text-center font-semibold font-body text-gray-500 truncate"><a
                                            href=# class="text-gray-700 text-3xl ">{{ $movingin_contracts->count()
                                            }}</a> </div>
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <div class="bg-gray-50 h-36 mt-5 overflow-hidden shadow rounded-lg">
                                    <div class="p-5">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0">
                                            </div>

                                            <div class="w-0 flex-1">
                                                <div
                                                    class="text-l font-semibold font-body text-gray-500 underline truncate">
                                                    <a href="/property/{{ $property->uuid }}/collection/pending">Payments
                                                        Approval Requests: ({{ $payment_requests->count() }})</a>
                                                </div>
                                                @forelse ($payment_requests->take(1)->get() as $item)
                                                <a href="" class="text-sm text-gray-900 font-bold mt-2">{{ $item->tenant
                                                    }} uploaded request for payments.</a>
                                                <div class="flex justify-end gap-2">
                                                    <div button type="button"
                                                        class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <a
                                                            href="/property/{{ $property->uuid }}/tenant/{{ $item->tenant_uuid }}/payment_requests/{{ $item->id }}">View</a></button>
                                                    </div>

                                                </div>
                                                @empty
                                                <div class="text-semibold">
                                                    <a href="#/" class="text-sm text-gray-900 font-bold mt-2">
                                                        No payment requests found.
                                                    </a>

                                                </div>

                                                @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="grid  gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-6 mt-2">
                                <div class="bg-white h-24 overflow-hidden shadow rounded-lg mb-5 mt-12">
                                    <div class=" mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Total Bills for
                                        Collection of the Month:</div>
                                    <div class="text-center font-semibold font-body text-gray-500 truncate"><a href=#
                                            class="text-gray-700 text-lg ">{{ number_format($monthly_bills, 2) }}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <div class="bg-white h-24 overflow-hidden shadow rounded-lg mb-5">
                                    <div class="mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Collected Amount of
                                        the
                                        Month:</div>
                                    <div class="text-center font-semibold font-body text-gray-500 truncate"><a href=#
                                            class="text-gray-700 text-lg ">{{ number_format($monthly_collections, 2)
                                            }}</a> </div>
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <div class="bg-gray-white h-24 overflow-hidden shadow rounded-lg mb-5">
                                    <div class="mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Total Unpaid of the
                                        Month:</div>
                                    <div class="text-center font-semibold font-body text-gray-500 truncate"><a href=#
                                            class="text-gray-700 text-lg ">{{ number_format($monthly_unpaid_bills, 2)
                                            }}</a> </div>
                                </div>
                            </div>

                            <div class="sm:col-span-6">
                                <div class="bg-white h-24 overflow-hidden shadow rounded-lg mb-5">
                                    <div class=" mt-2 ml-2 font-semibold text-sm mb-5 text-gray-500">Total Unpaid
                                        Collection
                                        of all time:</div>
                                    <div class="text-center font-semibold font-body text-gray-500 truncate"><a href=#
                                            class="text-gray-700 text-lg ">{{ number_format($total_unpaid_bills, 2)
                                            }}</a> </div>
                                </div>
                            </div>




                        </div>


                    </div>











                    <!--button -->
                    <div class="bg-white">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="ml-0 w-0 flex-1">
                                    <div class="mt-5 grid  gap-x-4 sm:grid-cols-6">
                                        <div class="sm:col-span-6">
                                            <dl>
                                                <dt class="text-lg font-semibold text-gray-900 mb-5">
                                                    {{ Carbon\Carbon::now()->format('D, M d, Y') }}
                                                </dt>

                                                <dd>
                                                    <div class="text-sm font-medium text-gray-500">Daily Collected
                                                        Amount:
                                                    </div>
                                                    <div class="text-lg font-medium text-gray-900">{{
                                                        number_format($daily_collections, 2) }}</div>
                                                    <h2
                                                        class="text-lg leading-3 ml-0 font-medium text-gray-600 mt-5 mb-2">
                                                        Notifications</h2>
                                                </dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gray-50 px-5 py-3">
                                @forelse ($notifications->take(3)->get() as $item)
                                <div class="text-sm">
                                    <div
                                        class="mb-5 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="p-4">
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check-circle -->
                                                    <svg class="h-6 w-6 text-green-400"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                </div>

                                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                                    <p class="text-sm font-medium text-gray-900">{{ $item->user->name }} {{ $item->details }}</p>
                                                    <p class="mt-1 text-sm text-gray-500">{{
                                                    Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                @empty
                                <div class="text-sm">
                                    <div
                                        class="mb-5 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="p-4">
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check-circle -->
                                                    <i class="fa-solid fa-folder-open"></i>
                                                </div>

                                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                                    <p class="text-sm font-medium text-gray-900">No new notifications
                                                    </p>
                                                    <p class="mt-1 text-sm text-gray-500">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                                @endforelse

                            </div>

                        </div>

                        <div type="button" onclick="window.location.href='/property/{{ $property->uuid }}/notification'"
                            class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-gray-900 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            View More</button></div>

                        <div class="sm:col-span-3 mt-10">
                            <div class="overflow-hidden">
                                <div class="py-3 px-5 ">Collection Rate</div>
                                <canvas class="p-8" id="chartDoughnut"></canvas>
                                
                            </div>

                            <!-- Required chart.js -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            <!-- Chart doughnut -->
                            <script>
                                const dataDoughnut = {
                          labels: ["Collected", "Uncollected", ],
                          datasets: [
                            {
                              label: "My First Dataset",
                              data: [{{ $monthly_collections }}, {{ $monthly_unpaid_bills }}],
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
                    <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-3">

                        <div class="sm:col-span-6 mb-3 mt-10">
                            <div class="px-4">
                                <div class="sm:flex sm:items-center">
                                    <div class="mt-2 flex flex-col">
                                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                                <a href="#/" class="text-sm text-gray-900 font-bold mt-2">Expiring
                                                    Contracts ({{ $expiring_contracts->count() }})</a>
                                                <div
                                                    class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                                    @include('admin.tables.contracts')
                                                </div>

                                                @if($expiring_contracts->count())
                                                <div class="flex justify-end gap-2">
                                                    <div button type="button"
                                                        class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <a href="/property/{{ $property->uuid }}/contract/expiring">See
                                                            more</a></button>
                                                    </div>
                                                </div>
                                                @endif


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
    </main>
</x-new-layout>