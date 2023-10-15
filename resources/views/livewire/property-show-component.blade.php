<?php $name = auth()->user()->name;
    $firstName = explode(" ",$name);
?>
<div>
    {{-- @include('layouts.notifications') --}}
<div class="h-full pb-36">
    <div class=" fixed w-1/2 bg-gray-50" aria-hidden="true"></div>
    <div class=" fixed min-h-screen right-1 w-1/3 lg:bg-gradient-to-r from-purple-400 to-gray-400  sm:bg-gray-50" aria-hidden="true"></div>

    <div class="relative flex min-h-screen flex-col">
        <div class="mt-5  lg:px-1">
            <div class="mt-1 flex items-end justify-end">

                <div class="mx-10 m-5 grid sm:grid-cols-1 gap-x-4 lg:grid-cols-6">
                    <div class="col-span-3">
                    <h1 class="text-left text-xl font-bold tracking-tight sm:text-xl lg:text-2xl">

                                        <span class="block  font-semibold text-gray-700">Welcome back, <span
                                                class=" text-purple-900 font-bold ">{{ $firstName[0] }}!</span></span>


                                    </h1>
</div>
                    <div class="col-start-5">
                        <h1
                            class="sm:w-full lg:w-56 mr-5 px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>



                                <a href="/property" class="text-gray-900 ml-2">Choose Another Property</a>
                        </h1>
                    </div>

                    <div class="lg:ml-5 sm:m-0 col-start-6">
                        <h1
                            class="sm:w-full lg:w-48 px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>


                                <a href="/user/{{ auth()->user()->id }}/export/property" target="_blank"
                                    class="text-gray-900">Export to PDF</a>
                        </h1>

                    </div>

                </div>
            </div>


            <div class="ml-auto mr-auto px-5 gap-y-5  sm:mt-10 sm:grid grid-cols-1 lg:grid-cols-8 lg:">



                    <div class="col-span-5">
                        <div class="">

                            <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                                <ul class="flex flex-wrap -mb-px" id="dashboard" data-tabs-toggle="#dashboardTab" role="tablist">
                                    <li class="mr-2" role="presentation">
                                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" id="overview-tab" data-tabs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">Overview</button>
                                    </li>
                                    <li class="mr-2" role="presentation">
                                        <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="charts-tab" data-tabs-target="#charts" type="button" role="tab" aria-controls="charts" aria-selected="false">Charts</button>
                                    </li>

                                </ul>
                            </div>
                            <div id="dashboardTab">
                                <div class="p-2 rounded-lg dark:bg-gray-800" id="overview" role="tabpanel" aria-labelledby="overview-tab">

                                <!-- metrics -->
                                <div class="w-max-screen-xl mx-auto px-4">
                                    <!--grid wrapper div-->
                                    <!--Note: negative margin you will apply below should matches padding you will apply above-->
                                    <div class="flex flex-wrap  -mx-4">
                                        <!--grid column div 1-->
                                        <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                            <!--grid content div 1-->
                                            <div class="flex-1 px-2 py-3">

                                                <div class="sm:w-full bg-purple-300 lg:w-36  h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                    <div class="flex items-center px-5 py-3">

                                                        <div class="mr-5">
                                                            <div class="">
                                                                @if($collections->posted()->where('created_at', Carbon\Carbon::now()->subMonth())->sum('collection') > $collections->posted()->where('created_at', Carbon\Carbon::now()->month())->sum('collection'))
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-8 h-8">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                                                </svg>
                                                                @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-8 h-8">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                                </svg>
                                                                @endif


                                                            </div>
                                                            <div class="flex items-center">

                                                                <div class="text-3xl font-bold text-white mr-2">
                                                                    {{App\Http\Controllers\CollectionController::shortNumber($collections->posted()->where('created_at', Carbon\Carbon::now()->month)->sum('collection'))}}
                                                                </div>
                                                                <?php $change_in_monthly_collections = App\Http\Controllers\CollectionController::divNumber($collections->posted()->where('created_at', Carbon\Carbon::now()->month())->sum('collection'), $collections->where('created_at', Carbon\Carbon::now()->subMonth())->sum('collection'))*100;?>
                                                                @if($collections->where('created_at', Carbon\Carbon::now()->subMonth())->sum('collection') > $collections->posted()->where('created_at', Carbon\Carbon::now()->month())->sum('collection'))
                                                                <div class="text-md font-medium text-red-500">{{
                                                                    number_format($change_in_monthly_collections, 1) }}%</div>
                                                                @else
                                                                <div class="text-md font-medium text-green-500">{{
                                                                    number_format($change_in_monthly_collections, 1) }}%</div>
                                                                @endif

                                                            </div>
                                                            <div class="mt-2 text-sm text-gray-500"><span class="font-light">Monthly</span>
                                                            </div>
                                                            <div class="text-md text-gray-700"><span class="font-semibold">Revenue</span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>


                                            </div>


                                        </div>
                                        <!--grid column div 2-->
                                        <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                            <!--grid content div 2-->
                                            <div class="flex-1 px-2 py-3">
                                                <div class="sm:w-full bg-indigo-200 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                    <div class="flex items-center px-5 py-3">
                                                        <div class="mr-5">
                                                            <div class="">
                                                                @if($expenses->where('created_at', Carbon\Carbon::now()->subMonth())->where('status', 'completed')->sum('amount') > $expenses->where('created_at', Carbon\Carbon::now()->month)->where('status', 'completed')->sum('amount'))
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-8 h-8">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.25 6L9 12.75l4.286-4.286a11.948 11.948 0 014.306 6.43l.776 2.898m0 0l3.182-5.511m-3.182 5.51l-5.511-3.181" />
                                                                </svg>
                                                                @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-8 h-8">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                                                </svg>
                                                                @endif

                                                            </div>
                                                            <div class="flex items-center">


                                                                <div class="text-3xl font-bold text-white mr-2">
                                                                    {{App\Http\Controllers\CollectionController::shortNumber($expenses->where('created_at', Carbon\Carbon::now()->month())->where('status', 'completed')->sum('amount')) }}
                                                                </div>
                                                                <?php $change_in_monthly_expenses = App\Http\Controllers\CollectionController::divNumber($expenses->where('created_at', Carbon\Carbon::now()->month())->where('status', 'completed')->sum('amount'), $expenses->where('created_at', Carbon\Carbon::now()->subMonth())->where('status', 'completed')->sum('amount'))*100;?>
                                                                @if($expenses->where('created_at', Carbon\Carbon::now()->subMonth())->where('status', 'completed')->sum('amount') > $expenses->where('created_at', Carbon\Carbon::now()->month())->where('status', 'completed')->sum('amount'))
                                                                <div class="text-md font-medium text-red-500">-{{
                                                                    number_format($expenses->where('created_at', Carbon\Carbon::now()->subMonth())->where('status', 'completed')->sum('amount'), 1) }}%</div>
                                                                @else
                                                                <div class="text-md font-medium text-green-500">{{
                                                                    number_format($expenses->where('created_at', Carbon\Carbon::now()->month())->where('status', 'completed')->sum('amount'), 1) }}%</div>
                                                                @endif

                                                            </div>
                                                            <div class="mt-2 text-sm text-gray-500"><span class="font-light">Monthly</span>
                                                            </div>
                                                            <div class="text-md text-gray-700"><span class="font-semibold">Expenses</span>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                           </div>
                                        <!--grid column div 3-->
                                        <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                            <!--grid content div 3-->
                                            <div class="flex-1 px-2 py-3">
                                                <div class="sm:w-full bg-purple-100 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                    <div class="flex items-center px-5 py-7">
                                                        <div class="mr-5">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185zM9.75 9h.008v.008H9.75V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 4.5h.008v.008h-.008V13.5zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                                            </svg>

                                                            <div class="flex items-center">
                                                                <div class="text-3xl font-semibold text-gray-400 mr-2">{{
                                                                    number_format($currentOccupancyRate->occupancy_rate, 1) }}%</div>

                                                            </div>
                                                            <div class="text-sm text-gray-700">Occupancy</div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--grid column div 4-->
                                        <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                            <!--grid content div 4-->
                                            <div class="flex-1 px-2 py-3">
                                                <div class="sm:w-full bg-purple-50 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                    <div class="flex items-center px-5 py-7">
                                                        <div class="mr-5">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                            </svg>

                                                            <div class="flex items-center">
                                                                <div class="text-3xl font-semibold text-gray-400 mr-2">{{ $contracts->where('status', 'active')->whereDate('start',Carbon\Carbon::now()->month)->count() }}</div>
                                                            </div>
                                                            <div class="text-sm text-gray-700">Moveins</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>

                                      <!--grid column div 5-->
                                      <div class="w-full sm:w-1/2 lg:w-1/5 flex flex-col p-4">
                                            <!--grid content div 5-->
                                            <div class="flex-1 px-2 py-3">
                                                <div class="sm:w-full bg-purple-50 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                                                    <div class="flex items-center px-5 py-7">
                                                        <div class="mr-5">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                            </svg>

                                                            <div class="flex items-center">
                                                                <div class="text-3xl font-semibold text-gray-400 mr-2">{{
                                                                    $contracts->where('status', 'inactive')->whereDate('end',Carbon\Carbon::now()->month)->count()
                                                                    }}</div>
                                                            </div>
                                                            <div class="text-sm text-gray-500">Moveouts</div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                      </div>

                                    </div>
                                </div>

                                <div class="w-max-screen-xl mx-auto px-4">
                                <!--grid wrapper div-->
                                <!--Note: negative margin you will apply below should matches padding you will apply above-->
                                <div class="flex flex-wrap  -mx-4">
                                     <!--grid column div 3-->
                                    <div class="w-full md:w-full lg:w-1/2 flex flex-col p-4">
                                        <div class="flex-1 px-2 py-2">
                                            <div class=" bg-white rounded-lg shadow-md p-5 h-full">

                                                <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                                                    <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent"
                                                        role="tablist">
                                                        <li class="" role="presentation">
                                                            <button
                                                                class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                                                id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                                                                aria-controls="profile" aria-selected="false">Payments</button>
                                                        </li>
                                                        <li class="" role="presentation">
                                                            <button
                                                                class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active"
                                                                id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                                                aria-controls="dashboard" aria-selected="true">Concerns</button>
                                                        </li>
                                                        <li class="" role="presentation">
                                                            <button
                                                                class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                                                id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                                                                aria-controls="settings" aria-selected="false">Moveout</button>
                                                        </li>

                                                    </ul>
                                                </div>

                                                <div id="myTabContent">

                                                    <div class="rounded-lg dark:bg-gray-800 hidden" id="profile" role="tabpanel"
                                                        aria-labelledby="profile-tab">
                                                        <div
                                                            class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">

                                                            <div class="col-span-1">
                                                                <div class="h-5 w-full overflow-hidden">
                                                                    <div class="flex items-center ">
                                                                        <div class="">
                                                                            <div class="ml-2 flex items-center">


                                                                                <span class="animate-pulse mx-1 text-red-600">{{
                                                                                    $paymentRequests->count() }}</span>
                                                                                <div class="text-sm font-regular text-gray-600">
                                                                                    Pending Payments</div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>



                                                            </div>


                                                        </div>
                                                        @foreach ($paymentRequests->take(4)->get() as $item)
                                                        <li class="border-gray-400 flex flex-row mb-2">
                                                            <div
                                                                class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                <div
                                                                    class="flex flex-col rounded-md w-10 h-10 bg-purple-300 justify-center items-center mr-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                                                    </svg>

                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                                    </svg>

                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                                                    </svg>

                                                                </div>
                                                                <div class="flex-1 pl-1 mr-16">
                                                                    <div class="font-medium">{{ $item->tenant }}</div>
                                                                    <div class="text-gray-600 text-sm">{{ number_format($item->amount, 2) }}
                                                                    </div>
                                                                </div>
                                                                <div button type="button"
                                                                    class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    <a target="_blank"
                                                                        href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant_uuid }}/payment_requests/{{ $item->id }}">View</a></button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <span class="text-sm">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                                            }}</span>
                                                        @endforeach
                                                        <div class="flex justify-end gap-2">
                                                            <div
                                                                class="items-center text-center px-2.5 py-1 mt-3  text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-900">
                                                                <a href="/property/{{ Session::get('property_uuid') }}/collection/{{ 'pending' }}/{{ Session::get('property_uuid') }}">See more
                                                                    payment
                                                                    requests</a></button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                                        <div class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">
                                                           <div class="col-span-1">
                                                                <div class="h-5 w-full overflow-hidden">
                                                                    <div class="flex items-center ">
                                                                        <div class="">
                                                                            <div class="ml-2 flex items-center">


                                                                                <span class="animate-pulse mx-1 text-red-600">{{
                                                                                    $concerns->where('status', 'pending')->count() }}</span>
                                                                                <div class="text-sm font-regular text-gray-600">
                                                                                    Pending Concerns</div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>



                                                            </div>
                                                        </div>

                                                        @foreach ($concerns->where('status', 'pending')->take(4)->get() as $item)
                                                        <li class="border-gray-400 flex flex-row mb-2">
                                                            <div
                                                                class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                <div
                                                                    class="flex flex-col rounded-md w-10 h-10 bg-purple-300 justify-center items-center mr-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                                                    </svg>

                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                                                    </svg>

                                                                </div>
                                                                <div class="flex-1 pl-1 mr-16">
                                                                    <div class="font-medium">
                                                                        @if($item->tenant_uuid)
                                                                        {{ $item->tenant->tenant }} - {{ $item->unit->unit }}
                                                                        @else
                                                                        {{ $item->unit->unit }}
                                                                        @endif
                                                                    </div>
                                                                    <div class="text-gray-600 text-sm">{{ $item->category->category }}</div>
                                                                </div>
                                                                <div button type="button"
                                                                    class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                   @if($item->tenant_uuid)
                                                                                <a target="_blank"
                                                                                    href="/property/{{ Session::get('property_uuid') }}/concern/{{ $item->id }}/edit">Respond</a>
                                                                                @else
                                                                                <a target="_blank"
                                                                                    href="/property/{{ Session::get('property_uuid') }}/concern/{{ $item->id }}/edit">Respond</a>
                                                                                @endif
                                                                </div>

                                                            </div>

                                                        </li>
                                                        <span class="text-sm">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                                            }}</span>
                                                        @endforeach

                                                    </div>

                                                    <div class="rounded-lg dark:bg-gray-800 hidden" id="settings" role="tabpanel"  aria-labelledby="settings-tab">
                                                        <div class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">
                                                            <div class="col-span-1">
                                                                <div class="h-5 w-full overflow-hidden">
                                                                    <div class="flex items-center ">
                                                                        <div class="">
                                                                            <div class="ml-2 flex items-center">
                                                                                <span class="animate-pulse mx-1 text-red-600">{{
                                                                                    $contracts->where('status', 'pending')->count() }}</span>
                                                                                <div class="text-sm font-regular text-gray-600">
                                                                                    Moveout Requests</div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @foreach ($contracts->where('status', 'pending')->take(4) as $item)
                                                        <li class="border-gray-400 flex flex-row mb-2">
                                                            <div
                                                                class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                <div
                                                                    class="flex flex-col rounded-md w-10 h-10 bg-purple-300 justify-center items-center mr-4">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                        stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                                                    </svg>


                                                                </div>
                                                                <div class="flex-1 pl-1 mr-16">
                                                                    <div class="font-medium">{{ $item->tenant->tenant }}</div>
                                                                    <div class="text-gray-600 text-sm">{{ $item->moveout_reason }}</div>
                                                                </div>
                                                                <div button type="button"
                                                                    class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                    <a
                                                                        href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout">View</a></button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <span class="text-sm">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                                            }}</span>
                                                        @endforeach
                                                        <div class="flex justify-end gap-2">
                                                            <div
                                                                class="items-center text-center px-2.5 py-1 mt-3  text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-900">
                                                                <a href="/property/{{ Session::get('property_uuid') }}/contract/pendingmoveout">See more
                                                                    moveout
                                                                    requests</a></button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--grid column div 1-->
                                    <div class="w-full sm:w-1/2 lg:w-1/2 flex flex-col p-4">
                                        <!--grid content div 1-->
                                        <div class="flex-1 px-2 py-2">
                                        <!-- bills and collection -->
                                        <div class=" bg-white rounded-lg shadow-md  px-5">
                                            <div class="">
                                                <div class="flex items-center">
                                                    <div class="ml-0 w-0 flex-1">
                                                        <div class="text-sm">
                                                            <h2 class="p-2 text-lg font-semibold text-gray-700">Bills and
                                                                Collection</h2>
                                                            <div
                                                                class="mb-5 bg-gray-50 h-full w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                                <div class="p-4">
                                                                    <div class="flex items-start">
                                                                        <div class="flex-shrink-0">

                                                                        </div>
                                                                        <div class="ml-3 w-0 flex-1 pt-0.5">

                                                                            <p class="text-sm font-medium text-gray-900">Total
                                                                                Bills for Collection</p>
                                                                            <p class="mt-1 text-2xl font-semibold text-gray-500">
                                                                                {{ App\Http\Controllers\CollectionController::shortNumber($bills->posted()->where('created_at', Carbon\Carbon::now()->month())->sum('bill'))  }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="mb-5 bg-purple-100 w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                                <div class="p-4">
                                                                    <div class="flex items-start">

                                                                        <div class="flex-shrink-0">

                                                                        </div>
                                                                        <div class="ml-3 w-0 flex-1 pt-0.5">

                                                                            <p class="text-sm font-medium text-gray-900">
                                                                                Collected Bills </p>
                                                                            <p class="mt-1 text-2xl font-semibold text-gray-500">
                                                                                {{  App\Http\Controllers\CollectionController::shortNumber($collections->posted()->where('created_at', Carbon\Carbon::now()->month())->sum('collection'))  }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div
                                                                class="mb-5 bg-indigo-200 w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                                                <div class="p-4">
                                                                    <div class="flex items-start">
                                                                        <div class="flex-shrink-0">

                                                                        </div>

                                                                        <div class="ml-3 w-0 flex-1 pt-0.5">

                                                                            <p class="text-sm font-medium text-gray-900">Total
                                                                                Unpaid Collection:</p>
                                                                            <p class="mt-1 text-2xl font-semibold text-gray-500">
                                                                                {{  App\Http\Controllers\CollectionController::shortNumber($bills->posted()->where('status', 'unpaid')->where('created_at', Carbon\Carbon::now()->month())->sum('bill')) }}
                                                                            </p>
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
                                   <!-- expiring contracts -->
                                   <div class="w-full sm:w-1/2 lg:w-full flex flex-col p-4">
                                        <!--grid content div 2-->
                                        <div class="flex-1 px-2 py-2">
                                     <h2 class="p-3 font-semibold text-xl text-gray-700"> Expiring Contracts</h2>
                                     <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                         <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                             @include('tables.contracts')
                                         </div>
                                         <div class="flex justify-end gap-2">
                                             <div button type="button"
                                                 class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                 </button>
                                             </div>


                                         </div>
                                    </div>

                                </div>
                            </div>
                                    <!--grid column div 2-->
                                    <div class="w-full sm:w-1/2 lg:w-1/2 flex flex-col p-4">
                                        <!--grid content div 2-->
                                        <div class="flex-1 px-2 py-2">
                                        <!-- delinquents -->
                                            <div class="bg-gray-200 rounded-lg shadow-md w-full">
                                                <div class="flex justify-end items-end pr-5 pt-6"></div>
                                                    <div class="flex items-center">
                                                        <div class="ml-0 w-0 flex-1">
                                                            <div class="pl-5 ml-4 text-xl font-semibold text-black ">Delinquents</div>
                                                        </div>
                                                    </div>

                                                    <!-- component -->
                                                    <div class="container flex mx-auto w-full items-center justify-center">

                                                        <ul class="flex flex-col bg-gray-200 p-4">
                                                            @forelse ($delinquentTenants as $item)
                                                            <a href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item['tenant_uuid'] }}/bills">
                                                                <li class="border-gray-400 flex flex-row mb-2">
                                                                    <div
                                                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                        <div
                                                                            class="flex flex-col rounded-md w-10 h-10 bg-gray-200 justify-center items-center mr-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                                fill="currentColor" class="w-6 h-6">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="flex-1 pl-1 mr-16">
                                                                            <div class="font-medium">{{ $item['tenant'] }} (T)</div>
                                                                            <div class="font-light">{{App\Http\Controllers\CollectionController::shortNumber(($item['balance']))}}</div>
                                                                        </div>

                                                                    </div>
                                                                </li>
                                                            </a>
                                                            @empty
                                                            @endforelse

                                                        </ul>



                                                    </div>

                                                    <div class="container flex mx-auto w-full items-center justify-center">

                                                        <ul class="flex flex-col bg-gray-200 p-4">
                                                            @forelse ($delinquentOwners as $item)
                                                            <a href="/property/{{ Session::get('property_uuid') }}/owner/{{ $item['owner_uuid'] }}/bills">
                                                                <li class="border-gray-400 flex flex-row mb-2">
                                                                    <div
                                                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                        <div
                                                                            class="flex flex-col rounded-md w-10 h-10 bg-gray-200 justify-center items-center mr-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                                fill="currentColor" class="w-6 h-6">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="flex-1 pl-1 mr-16">
                                                                            <div class="font-medium">{{ $item['owner'] }} (O)</div>
                                                                            <div class="font-light">{{
                                                                                App\Http\Controllers\CollectionController::shortNumber(($item['balance']))
                                                                                }}</div>
                                                                        </div>

                                                                    </div>
                                                                </li>
                                                            </a>
                                                            @empty
                                                            @endforelse

                                                        </ul>
                                                    </div>

                                                <div class="container flex mx-auto w-full items-center justify-center">

                                                        <ul class="flex flex-col bg-gray-200 p-4">
                                                            @forelse ($delinquentGuests as $item)
                                                            <a href="/property/{{ Session::get('property_uuid')}}/guest/{{ $item['guest_uuid'] }}/bills">
                                                                <li class="border-gray-400 flex flex-row mb-2">
                                                                    <div
                                                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                        <div
                                                                            class="flex flex-col rounded-md w-10 h-10 bg-gray-200 justify-center items-center mr-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                                fill="currentColor" class="w-6 h-6">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="flex-1 pl-1 mr-16">
                                                                            <div class="font-medium">{{ $item['guest'] }} (G)</div>
                                                                            <div class="font-light">{{
                                                                                App\Http\Controllers\CollectionController::shortNumber(($item['balance']))
                                                                                }}</div>
                                                                        </div>

                                                                    </div>
                                                                </li>
                                                            </a>
                                                            @empty
                                                            @endforelse

                                                        </ul>
                                                    </div>


                                                </div>


                                            </div>
                                        </div>
                                        <!--grid column div 2-->
                                    <div class="w-full sm:w-1/2 lg:w-1/2 flex flex-col p-4">
                                        <!--grid content div 2-->
                                        <div class="flex-1 px-2 py-2">
                                        <!-- personnels -->
                                            <div class="bg-indigo-200 rounded-lg shadow-md w-full">
                                                <div class="flex justify-end items-end pr-5 pt-6"></div>
                                                    <div class="flex items-center">
                                                        <div class="ml-0 w-0 flex-1">
                                                            <div class="pl-5 ml-4 text-xl font-semibold text-black ">Personnels</div>
                                                        </div>
                                                    </div>

                                                    <!-- component -->
                                                    <div class="container flex mx-auto w-full items-center justify-center">

                                                        <ul class="flex flex-col bg-indigo-200 p-4">

                                                        @foreach ($personnels->take(4) as $item)

                                                                <li class="border-gray-400 flex flex-row mb-2">
                                                                    <div
                                                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                                                        <div
                                                                            class="flex flex-col rounded-md w-10 h-10 bg-indigo-200 justify-center items-center mr-4">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                                fill="currentColor" class="w-6 h-6">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                                                                    clip-rule="evenodd" />
                                                                            </svg>


                                                                        </div>
                                                                        <div class="flex-1 pl-1 mr-16">
                                                                            <div class="font-medium">{{ $item->user->name }}</div>
                                                                            <div class="text-gray-600 text-sm">{{ $item->user->role->role }}</div>
                                                                        </div>

                                                                    </div>
                                                                </li>

                                                            @endforeach

                                                        </ul>



                                                    </div>

                                                    <div class="flex justify-end pb-5 pr-5 gap-2">
                                                        <a href="/property/{{ Session::get('property_uuid')}}/user">
                                                            <div
                                                                class="items-center text-center px-2.5 mt-3 py-2 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                                See more personnels
                                                            </div>
                                                        </a>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>



                                <!-- charts tab -->
                                <div class="p-4 rounded-lg dark:bg-gray-800 hidden" id="charts" role="tabpanel" aria-labelledby="charts-tab">

                                <div class="mx-10 lg:-ml-1 mt-10 col-span-4">

                                <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer>
                                </script>




                    <div x-data="app()" x-cloak class="">
                        <div class="sm:w-full py-10">
                            <div class="shadow p-6 rounded-lg bg-white">
                                <div class="md:flex md:justify-between md:items-center">
                                    <div>
                                        <h2 class="text-xl text-gray-800 font-bold leading-tight">Move Ins</h2>
                                        <p class="mb-2 text-gray-600 text-sm">Monthly Count</p>
                                    </div>

                                    <!-- Legends -->
                                    <div class="mb-4">
                                        <div class="flex items-center">
                                            <div class="w-2 h-2 bg-purple-200 mr-2 rounded-full"></div>
                                            <div class="text-sm text-gray-700">Moveins</div>
                                        </div>


                                    </div>
                                </div>




                                <div class="line my-8 relative">
                                    <!-- Tooltip -->
                                    <template x-if="tooltipOpen == true">
                                        <div x-ref="tooltipContainer"
                                            class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                                            :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`">
                                            <div class="shadow-xs rounded-lg bg-white p-2">
                                                <div class="flex items-center justify-between text-sm">
                                                    <div>Number:</div>
                                                    <div class="font-bold ml-2">
                                                        <span x-html="tooltipContent"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <!-- Bar Chart -->
                                    <div class="flex -mx-2 items-end mb-2">
                                        <template x-for="data in chartData">

                                            <div class="px-2 w-1/6">
                                                <div :style="`height: ${data}px`"
                                                    class="transition ease-in duration-200 bg-purple-200 hover:bg-purple-400 relative"
                                                    @mouseenter="showTooltip($event); tooltipOpen = true"
                                                    @mouseleave="hideTooltip($event)">
                                                    <div x-text="data"
                                                        class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm">
                                                    </div>
                                                </div>

                                            </div>



                                        </template>
                                    </div>

                                    <!-- Labels -->
                                    <div class="border-t border-gray-400 mx-auto"
                                        :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`">
                                    </div>
                                    <div class="flex -mx-2 items-end">
                                        <template x-for="data in labels">
                                            <div class="px-2 w-1/6">
                                                <div class="bg-red-600 relative">
                                                    <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto"
                                                        style="width: 1px"></div>
                                                    <div x-text="data"
                                                        class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm">
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                                </div>

                    <script>
                        function app() {
      return {
        chartData: {!!$new_contracts_count!!},
        labels: {!!$new_contracts_date!!},

        tooltipContent: '',
        tooltipOpen: false,
        tooltipX: 0,
        tooltipY: 0,
        showTooltip(e) {
          console.log(e);
          this.tooltipContent = e.target.textContent
          this.tooltipX = e.target.offsetLeft - e.target.clientWidth;
          this.tooltipY = e.target.clientHeight + e.target.clientWidth;
        },
        hideTooltip(e) {
          this.tooltipContent = '';
          this.tooltipOpen = false;
          this.tooltipX = 0;
          this.tooltipY = 0;
        }
      }
    }
                    </script>
                </div>

                                <div class="mt-10 mx-5 col-span-2">

                    <div class="bg-white h-full rounded-lg shadow-md overflow-hidden">


                        <div class="pt-3 font-semibold px-5 text-lg ">Collection Rate</div>
                        <canvas class="p-10" id="chartDoughnut"></canvas>
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
                                        data: [{{ $total_collected_bills }}, {{ $total_uncollected_bills }}],
                                        backgroundColor: [
                                          "rgb(133, 105, 241)",
                                          "rgb(199, 210, 254)",

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
