<x-new-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    @section('title', $property->property.' | The Property Manager')
    <div class="mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-11">
            <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
                <!-- card Welcome back -->
                <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-6 ml-2 font-bold text-3xl mb-5">
                        {{ $property->property }}
                        <section>
                    </div>
                    <div class="sm:col-span-6 mb-3">
                        <div class="bg-purple-300 h-35 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                    </div>
                                    <div class="w-0 flex-1">
                                        <dl>
                                            <dt class="text-lg font-bold font-body text-gray-700 truncate">
                                                Welcome back, {{ auth()->user()->name }}</dt>
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
                        <div class="bg-gray-50 h-36 overflow-hidden shadow rounded-lg">
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
                                            Payments Approval:</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>


                <!-- card Announcements -->
                <div class="bg-white overflow-hidden">
                    <div class="p-5">
                        <div class="flex items-center">

                            <div class="w-0 flex-1">





                            </div>
                        </div>
                    </div>
                    <div class="font-bold text-lg mb-5">Concerns Requests:</div>
                    <div class="bg-white overflow-hidden shadow rounded-lg px-5 py-5 mb-5 ">
                        <div class="text-semibold">

                            <div class="flex justify-end">
                                <div button type="button"
                                    class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Review</button></div>
                            </div>
                        </div>
                    </div>

                    <div class="font-bold text-lg">
                        @if($property->units->count())
                        <?php $occupancy_rate = $property->units->where('status_id', 2)->count()/$property->units->count() * 100; ?>
                        @else
                        <?php $occupancy_rate = 0;?>
                        @endif
                        Occupancy Rate ({{  number_format($occupancy_rate, 2) }}%)
                    </div>


               <canvas id="occupancy_rate" class="chartjs" width="undefined" height="undefined"></canvas>

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

                    <!-- vacant, occupied -->

                    <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-4">

                        <div class="sm:col-span-2 mb-5">
                            <div class="bg-white overflow-hidden">
                                <div class="p-5">
                                    <div class="px-5">
                                        <img class="h-12 w-auto mt-2 flex justify-end"
                                            src="{{ asset('/brands/key.png') }}">Occupied
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sm:col-span-2 mb-5">
                            <div class="bg-white overflow-hidden">
                                <div class="p-5">
                                    <div class="px-5">
                                        <img class="h-12 w-auto mt-2 flex justify-end"
                                            src="{{ asset('/brands/key.png') }}">Vacant
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <!-- card Notifications -->
                <div class>
                    <!--button -->
                    <div class="bg-white">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="ml-0 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">{{
                                            Carbon\Carbon::now()->format('l, M d, Y') }}</dt>
                                        <dd>
                                            <div class="text-lg font-medium text-gray-900">Php {{
                                                number_format($property_collected_payments, 2) }}</div>
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
                        class="items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm 
                text-white text-center bg-gray-900 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        View
                        More</button>
                    </div>





                </div>
                </section>
            </div>

            <div class="sm:col-span-4 ml-2 font-bold text-xl mb-5 mt-6">
                Number by categories:
            </div>
            <section>
                <div class="grid grid-cols-1 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-2 mb-3 mt-6">
                        <div class="bg-gray-300 h-24 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="w-0 flex-1">
                                        <div class="text-l font-semibold font-body text-gray-500 truncate">
                                            Total number of Units: {{ $property->units->count() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="sm:col-span-2 mb-3 mt-6">
                        <div class="bg-purple-300 h-24 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="w-0 flex-1">
                                        <div class="text-l font-semibold font-body text-gray-500 truncate">
                                            Total collected for August: {{ $property_collected_payments }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-2 mb-3 mt-6">
                        <div class="bg-blue-100 h-24 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="w-0 flex-1">
                                        <div class="text-l font-semibold font-body text-gray-500 truncate">
                                            Total number of Tenants: {{ $property->tenants->count() }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-2 mb-3 mt-6">
                        <div class="bg-yellow-50 h-24 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="w-0 flex-1">
                                        <div class="text-l font-semibold font-body text-gray-500 truncate">
                                            Total unpaid Bills: {{ number_format($property_unpaid_bills,2) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="sm:col-span-2 mb-3 mt-6">

                    </div>

                </div>





                <div class="grid grid-cols-2 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-4 mb-3 mt-6">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-xl font-semibold text-gray-900">Expiring Contracts ({{ $expiring_contracts->count() }})</h1>
                                </div>
                                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                                    <button type="button"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">30
                                        days</button>
                                </div>
                            </div>
                            <div class="mt-8 flex flex-col">
                                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div
                                            class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
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
                                                            <span class="sr-only">Edit</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                @foreach ($expiring_contracts as $contract)
                                                <tbody class="divide-y divide-gray-200 bg-white">
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                                            <div class="flex items-center">
                                                                {{-- <div class="h-10 w-10 flex-shrink-0">
                                                                    <img src="{{ asset('/brands/user.png') }}"
                                                                        alt="building"
                                                                        class="w-40 object-center object-cover lg:w-full lg:h-full">
                                                                </div> --}}
                                                                <div class="">
                                                                    <div class="font-medium text-gray-900">
                                                                        {{ $contract->tenant->tenant }}</div>
                                                                    <div class="text-gray-500">
                                                                        {{$contract->tenant->email}}</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            <div class="flex items-center">

                                                                <div class="">
                                                                    <div class="font-medium text-gray-900">
                                                                        {{ $contract->unit->unit }}</div>
                                                                    <div class="text-gray-500">
                                                                        {{$contract->unit->building->building}}</div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            <span
                                                                class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">
                                                                {{ $contract->status }}
                                                            </span>
                                                        </td>
                                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                            <div class="text-sm text-gray-900">{{
                                                                Carbon\Carbon::parse($contract->end)->format('M d,
                                                                Y') }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">
                                                                <span
                                                                    class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-300">
                                                                    {{
                                                                    Carbon\Carbon::parse($contract->end)->diffForHumans()
                                                                    }}
                                                                </span>
                                                            </div>
                                                        </td>
                                                        <td
                                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                            @can('admin')

                                                            <x-button
                                                                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/renew'">
                                                                Renew</x-button>
                                                            <?php
                                                                $unpaid_bills = App\Models\Tenant::find($contract->tenant_uuid)->bills->where('status', '!=', 'paid');
                                                            ?>
                                                            @if($unpaid_bills->count()<=0) <x-button
                                                                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $item->uuid }}/moveout'">
                                                                Moveout</x-button>
                                                                @else
                                                                <x-button data-modal-toggle="popup-error-modal">
                                                                    Moveout</x-button>
                                                                @endif

                                                                @endcan
                                                        </td>
                                                    </tr>

                                                    <!-- More people... -->
                                                </tbody>
                                                @endforeach

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