<div>
    <div class=" fixed w-1/2 bg-gray-50" aria-hidden="true"></div>
    <div class=" fixed min-h-screen right-4 w-1/3 lg:bg-gradient-to-r from-purple-400 to-indigo-400 sm:bg-gray-50"
        aria-hidden="true"></div>
    <div class="relative flex min-h-screen flex-col">
        <div class="mt-5 px-4 sm:px-5 lg:px-1">
            <div class="mt-1 flex items-end justify-end">

                <div class="mx-10 m-5 grid sm:grid-cols-1 gap-x-4 lg:grid-cols-6">

                    <div class="col-start-1">
                        <h1
                            class="sm: w-full lg:w-56 mr-5 px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">

                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                                </svg>



                                <a href="/property" class="text-gray-900 ml-2">Choose Another Property</a>
                        </h1>
                    </div>

                    <div class="lg:ml-5 sm:m-0 col-start-5">
                        <h1
                            class="w-42 px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">

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
                    <div class="col-start-6">
                        <h1
                            class="px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                                <a href="" class="text-gray-900">Export to Excel</a>
                        </h1>
                    </div>
                </div>
            </div>


            <div class=" mt-10 mb-12 gap-y-5 sm:mt-10 sm:grid grid-cols-1 lg:grid-cols-8 ">
                <div class="col-span-6 my-5 sm:block lg:inline-flex">

                    <div class="lg:ml-6 md:ml-5 sm:ml-1 max-w-md sm:px-6 sm:mx-3 lg:mx-5 lg:px-5">
                        <div class="relative shadow-md sm:overflow-hidden sm:rounded-2xl">
                            <div class="absolute inset-0">
                                <img class="h-full w-full " src="{{ asset('/brands/dash1.png') }}">

                            </div>
                            <div class="relative px-4 py-10 sm:px-6 sm:py-20 lg:py-10 lg:px-8">
                                <h1 class="text-left text-xl font-bold tracking-tight sm:text-xl lg:text-2xl">
                                    <?php $name = auth()->user()->name; 
                                                  $firstName = explode(" ",$name)
                                            ?>
                                    <span class="block  font-semibold text-gray-700">Welcome back, <span
                                            class=" text-purple-900 font-bold ">{{ $firstName[0] }}!</span></span>


                                </h1>
                                <a href="/property/{{ $property->uuid }}/notification">
                                    <p class="mt-8 text-gray-600">You have <span class="font-semibold">2</span>
                                        new notifications!</p>
                                </a>

                            </div>


                        </div>
                    </div>

                    <div class="lg:-my-24 sm:my-10  col-span-2 sm:block lg:inline-flex">




                        <div class=" bg-white rounded-lg shadow-md p-5 h-72 ">




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
                                <div class=" rounded-lg dark:bg-gray-800 hidden" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div
                                        class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">

                                        <div class="col-span-1">
                                            <div class="h-5 w-full overflow-hidden">
                                                <div class="flex items-center ">
                                                    <div class="">
                                                        <div class="ml-2 flex items-center">


                                                            <span class="animate-pulse mx-1 text-red-600">{{
                                                                $payment_requests->count() }}</span>
                                                            <div class="text-sm font-regular text-gray-600">
                                                                Pending Payments</div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>



                                        </div>


                                    </div>
                                    @foreach ($payment_requests->take(1)->get() as $item)
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
                                                <a
                                                    href="/property/{{ $property->uuid }}/tenant/{{ $item->tenant_uuid }}/payment_requests/{{ $item->id }}">View</a></button>
                                            </div>
                                        </div>
                                    </li>
                                    <span class="text-sm">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                        }}</span>
                                    @endforeach
                                    <div class="flex justify-end gap-2">
                                        <div
                                            class="items-center text-center px-2.5 py-1 mt-3  text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-900">
                                            <a href="/property/{{ $property->uuid }}/collection/pending">See more
                                                payment
                                                requests</a></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel"
                                    aria-labelledby="dashboard-tab">

                                    <div
                                        class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">

                                        <div class="col-span-1">
                                            <div class="h-5 w-full overflow-hidden">
                                                <div class="flex items-center ">
                                                    <div class="">
                                                        <div class="ml-2 flex items-center">
                                                            <span class="animate-pulse mx-1 text-red-600">{{
                                                                $pending_concerns->count() }}</span>
                                                            <div class="text-sm font-regular text-gray-600">
                                                                Concerns Received</div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>



                                        </div>



                                    </div>


                                    </li>
                                    @foreach ($pending_concerns->take(1)->get() as $item)
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
                                                <div class="font-medium">{{ $item->tenant->tenant }}</div>
                                                <div class="text-gray-600 text-sm">{{ $item->category->category }}</div>
                                            </div>
                                            <div button type="button"
                                                class="items-center text-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                <a
                                                    href="/property/{{ $property->uuid }}/tenant/{{ $item->tenant_uuid }}/concern/{{ $item->id }}/edit">Respond</a></button>
                                            </div>

                                        </div>

                                    </li>
                                    <span class="text-sm">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                        }}</span>
                                    @endforeach

                                    <div class="flex justify-end gap-2">
                                        <div
                                            class="items-center text-center px-2.5 py-1 mt-3  text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-900">
                                            <a href="/property/{{ $property->uuid }}/concern">See more
                                                concerns</a></button>
                                        </div>

                                    </div>
                                </div>
                                <div class="rounded-lg dark:bg-gray-800 hidden" id="settings" role="tabpanel"
                                    aria-labelledby="settings-tab">
                                    <div
                                        class="mt-3 mb-5 justify-center  grid grid-cols-2 gap-y-5 gap-x-2 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">

                                        <div class="col-span-1">
                                            <div class="h-5 w-full overflow-hidden">
                                                <div class="flex items-center ">
                                                    <div class="">
                                                        <div class="ml-2 flex items-center">
                                                            <span class="animate-pulse mx-1 text-red-600">{{
                                                                $pending_contracts->count() }}</span>
                                                            <div class="text-sm font-regular text-gray-600">
                                                                Moveout Requests</div>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>



                                        </div>


                                    </div>
                                    @foreach ($pending_contracts->take(1) as $item)
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
                                                    href="/property/{{ $property->uuid }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout">View</a></button>
                                            </div>
                                        </div>
                                    </li>
                                    <span class="text-sm">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans()
                                        }}</span>
                                    @endforeach
                                    <div class="flex justify-end gap-2">
                                        <div
                                            class="items-center text-center px-2.5 py-1 mt-3  text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-900">
                                            <a href="/property/{{ $property->uuid }}/contract/pendingmoveout">See more
                                                moveout
                                                requests</a></button>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="space-x-2">


                <div class="ml-auto mr-auto px-12 gap-y-5  sm:mt-10 sm:grid grid-cols-1 lg:grid-cols-8 lg:">

                    <div class="col-span-1">
                        <div
                            class="sm:w-full bg-purple-300 lg:w-36  h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">

                            <div class="flex items-center px-5 py-3">

                                <div class="mr-5">
                                    <div class="">
                                        @if($previous_monthly_collections > $current_monthly_collections)
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


                                        <div class="text-3xl font-bold text-white mr-2">{{
                                            App\Http\Controllers\CollectionController::shortNumber($current_monthly_collections)
                                            }}</div>
                                        <?php $change_in_monthly_collections = App\Http\Controllers\CollectionController::divNumber($current_monthly_collections, $previous_monthly_collections)*100;?>
                                        @if($previous_monthly_collections > $current_monthly_collections)
                                        <div class="text-md font-medium text-red-500">-{{
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

                    <div class="col-span-1">
                        <div
                            class="sm:w-full bg-indigo-200 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                            <div class="flex items-center px-5 py-3">
                                <div class="mr-5">
                                    <div class="">
                                        @if($previous_monthly_expenses > $current_monthly_expenses)
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


                                        <div class="text-3xl font-bold text-white mr-2">{{
                                            App\Http\Controllers\CollectionController::shortNumber($current_monthly_expenses)
                                            }}</div>
                                        <?php $change_in_monthly_expenses = App\Http\Controllers\CollectionController::divNumber($current_monthly_expenses, $previous_monthly_expenses)*100;?>
                                        @if($previous_monthly_expenses > $current_monthly_expenses)
                                        <div class="text-md font-medium text-red-500">-{{
                                            number_format($change_in_monthly_expenses, 1) }}%</div>
                                        @else
                                        <div class="text-md font-medium text-green-500">{{
                                            number_format($change_in_monthly_expenses, 1) }}%</div>
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

                    <div class="col-span-1">
                        <div
                            class="sm:w-full bg-purple-100 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                            <div class="flex items-center px-5 py-7">
                                <div class="mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185zM9.75 9h.008v.008H9.75V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 4.5h.008v.008h-.008V13.5zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>

                                    <div class="flex items-center">
                                        <div class="text-3xl font-semibold text-gray-400 mr-2">{{
                                            number_format($current_occupancy_rate->occupancy_rate, 1) }}%</div>

                                    </div>
                                    <div class="text-sm text-gray-700">Occupancy</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <div
                            class="sm:w-full bg-purple-50 lg:w-36 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                            <div class="flex items-center px-5 py-7">
                                <div class="mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                    </svg>

                                    <div class="flex items-center">
                                        <div class="text-3xl font-semibold text-gray-400 mr-2">{{
                                            $current_monthly_moveins
                                            }}</div>

                                    </div>
                                    <div class="text-sm text-gray-700">Moveins</div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-span-1">
                        <div class="sm:w-full bg-gray-100 h-full overflow-hidden rounded-lg shadow-md rounded-5xl mb-5">
                            <div class="flex items-center px-5 py-7">
                                <div class="mr-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-purple-900 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                    </svg>

                                    <div class="flex items-center">
                                        <div class="text-3xl font-semibold text-gray-400 mr-2">{{
                                            $current_monthly_moveins
                                            }}</div>

                                    </div>
                                    <div class="text-sm text-gray-500">Moveouts</div>
                                </div>

                            </div>
                        </div>
                    </div>



                    <div class="lg:-my-72 sm:my-2 lg:mx-12 sm:mx-2 w-full col-span-3">

                        <!-- calendar -->
                        <div
                            class='flex justify-center items-center mb-8 sm:mx-0 lg:mx-5 bg-white shadow-md rounded-lg p-1 max-w-full '>
                            <?php $period = Carbon\CarbonPeriod::create(now(), now()->addDays(6)) ;?>
                            @foreach ($period as $date)
                            @if($date->format('D') == Carbon\Carbon::now()->format('D') )
                            <div
                                class='flex group bg-purple-300 shadow-lg light-shadow rounded-lg mx-1 cursor-pointer justify-center relative w-16 content-center'>
                                <span class="flex h-3 w-3 absolute -top-1 -right-1">
                                    <span
                                        class="animate-ping absolute group-hover:opacity-75 opacity-0 inline-flex h-full w-full rounded-full bg-purple-400 "></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-purple-500"></span>
                                </span>
                                <div class='flex items-center px-4 py-4'>
                                    <div class='text-center'>
                                        <p class='text-purple-900 text-sm'> {{ $date->format('D') }} </p>
                                        <p class='text-purple-900  mt-3 font-bold'> {{ $date->format('d') }} </p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div
                                class='flex group hover:bg-purple-100 hover:shadow-lg hover-light-shadow rounded-lg mx-1 transition-all	duration-300	 cursor-pointer justify-center w-10'>
                                <div class='flex items-center px-4 py-4'>
                                    <div class='text-center'>
                                        <p
                                            class='text-gray-900 group-hover:text-purple-900 text-sm transition-all	duration-300'>
                                            {{ $date->format('D') }}
                                        </p>
                                        <p
                                            class='text-gray-900 group-hover:text-purple-900 mt-3 group-hover:font-bold transition-all	duration-300'>
                                            {{ $date->format('d') }} </p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach


                        </div>


                        <div
                            class="bg-white sm:mx-0 lg:mx-5 sm:items-center mb-5 lg:h-72 sm:h-48 md:h-80  overflow-hidden rounded-lg shadow-md rounded-5xl">
                            <div class="flex items-center pl-7 pr-5 py-5">
                                <div class="col-span-1">
                                    <div class="flex justify-end ">
                                        <div class="underline text-xs text-gray-500"><a href="/property">See
                                                all properties</a></div>
                                    </div>

                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-10 h-10">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                        </svg>
                                        <div class="text-xl font-bold text-purple-800 ml-2 mr-2">
                                            {{ $property->property }}
                                        </div>
                                    </div>



                                    <div
                                        class="bg-gray-100 w-full rounded-lg mx-3 py-3 justify-center items-center mt-5 grid grid-cols-3 gap-y-5 gap-x-10 sm:grid-cols-3 lg:grid-cols-3 lg:gap-x-10">

                                        <div class="col-span-1 mt-2 -mr-5 border-r border-gray-300">
                                            <div class="">
                                                <div class="flex ">
                                                    <div class="flex-shrink-0">
                                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 53 53" style="enable-background:new 0 0 53 53"
                                                            xml:space="preserve">
                                                            <path d="M27 29h3v2h-3z" />
                                                            <path
                                                                d="M45 51V1a.999.999 0 0 0-.071-.351c-.008-.02-.013-.04-.022-.06a1.01 1.01 0 0 0-.185-.274l-.049-.046c-.029-.026-.054-.056-.085-.079A.991.991 0 0 0 44.4.085l-.014-.008a.991.991 0 0 0-.349-.07C44.024.007 44.013 0 44 0H10a1 1 0 0 0-1 1v50H4v2h45v-2h-4zm-20-3.82V8.227l18-5.85V50.78l-18-3.6zM11 2h26.687L23.69 6.549A1 1 0 0 0 23 7.5V48a1 1 0 0 0 .804.98L33.901 51H11V2z" />
                                                        </svg>
                                                    </div>
                                                    <div class="w-0 flex-1 -pt-2">

                                                        <p class="ml-2 text-lg font-semibold text-gray-900">
                                                            {{ $vacant_units->count() }}</p>

                                                    </div>

                                                </div>
                                                <p class="ml-2 mt-2 text-md font-regular text-indigo-700">
                                                    Vacant</p>
                                            </div>



                                        </div>




                                        <div class="col-span-1 mt-2 -mr-5 border-r border-gray-300">
                                            <div class="">
                                                <div class="flex ">
                                                    <div class="flex-shrink-0">
                                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 52 52" style="enable-background:new 0 0 52 52"
                                                            xml:space="preserve">
                                                            <path d="M16.5 28h7v2h-7z" />
                                                            <path
                                                                d="M44.5 50V1a1 1 0 0 0-1-1h-34a1 1 0 0 0-1 1v49h-5v2h45v-2h-4zm-31 0V5h26v45h-26zm28 0V4a1 1 0 0 0-1-1h-28a1 1 0 0 0-1 1v46h-1V2h32v48h-1z" />
                                                        </svg>
                                                    </div>
                                                    <div class="w-0 flex-1 -pt-2">

                                                        <p class="ml-2 text-lg font-semibold text-gray-900">
                                                            {{ $occupied_units->count() }}</p>

                                                    </div>

                                                </div>
                                                <p class="ml-1 mt-2 text-md font-regular text-indigo-700">
                                                    Occupied</p>
                                            </div>



                                        </div>


                                        <div class="col-span-1 mt-2 ">
                                            <div class="">
                                                <div class="flex ">
                                                    <div class="flex-shrink-0">
                                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 433.521 433.521"
                                                            style="enable-background:new 0 0 433.521 433.521"
                                                            xml:space="preserve">
                                                            <path
                                                                d="M269.568 250.041a7 7 0 1 1 0 14H209.34a7 7 0 1 1 0-14h60.228zm38.856-24.547a7 7 0 0 0-7-7H209.34a7 7 0 1 0 0 14h92.084a7 7 0 0 0 7-7zM157.206 65.186V34.173a7 7 0 0 1 7-7l25.395-.015C189.601 12.184 201.784 0 216.76 0c14.977 0 27.161 12.184 27.161 27.158v.015h25.393a7 7 0 0 1 7 7v31.013a7 7 0 0 1-7 7H164.206a7 7 0 0 1-7-7zm14-7h91.107V41.173H236.92a7 7 0 0 1-7-7v-7.015c0-7.256-5.903-13.158-13.159-13.158-7.257 0-13.161 5.902-13.161 13.158v7.015a7 7 0 0 1-7 7h-25.395v17.013zm212.387-7.181v365.651c0 9.3-7.565 16.865-16.865 16.865H66.793c-9.299 0-16.864-7.565-16.864-16.865V51.005c0-9.3 7.565-16.865 16.864-16.865h67.815a7 7 0 1 1 0 14H95.517v337.661h242.487V48.14h-39.092a7 7 0 1 1 0-14h67.815c9.3 0 16.866 7.565 16.866 16.865zm-14 0c0-1.553-1.313-2.865-2.865-2.865h-14.724v344.661a7 7 0 0 1-7 7H88.517a7 7 0 0 1-7-7V48.14H66.793c-1.553 0-2.864 1.313-2.864 2.865v365.651c0 1.553 1.312 2.865 2.864 2.865h299.935c1.553 0 2.865-1.313 2.865-2.865V51.005zm-240.899 77.317a7 7 0 0 0-2.717 9.52l12.862 23.137a7 7 0 0 0 12.236 0l22.422-40.331a7 7 0 1 0-12.237-6.803l-16.304 29.326-6.744-12.132a6.997 6.997 0 0 0-9.518-2.717zm42.087 86.662a7.001 7.001 0 0 0-9.52 2.717l-16.304 29.325-6.744-12.132a6.998 6.998 0 0 0-9.52-2.717 7 7 0 0 0-2.717 9.52l12.862 23.137a7 7 0 0 0 12.236 0l22.422-40.33a6.998 6.998 0 0 0-2.715-9.52zm38.559-54.799h60.229a7 7 0 1 0 0-14H209.34a7 7 0 1 0 0 14zm92.084-45.547H209.34a7 7 0 1 0 0 14h92.084a7 7 0 1 0 0-14z" />
                                                        </svg>
                                                    </div>
                                                    <div class="w-0 flex-1 -pt-2">

                                                        <p class="ml-2 text-lg font-semibold text-gray-900">
                                                            {{ $unlisted_units->count() }}</p>

                                                    </div>

                                                </div>
                                                <p class="ml-1 mt-2 text-md font-regular text-indigo-700">
                                                    Unlisted</p>
                                            </div>



                                        </div>


                                    </div>

                                </div>
                            </div>

                            <div
                                class="mx-2 py-3 justify-center items-center grid grid-cols-2 gap-y-5 gap-x-10 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">
                                <div class="col-span-1">
                                    <div class="h-10 w-full overflow-hidden">
                                        <div class="flex items-center ">
                                            <div class="ml-20 mt-2">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="text-gray-500 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                                                    </svg>
                                                    <span class="font-semibold text-gray-800 text-lg mx-1">{{
                                                        $units->count() }}</span>
                                                    <div class="text-md font-medium text-purple-600">Units
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                </div>
                                <div class="col-span-1">
                                    <div class="h-10 w-full overflow-hidden">
                                        <div class="flex items-center ">
                                            <div class="mt-2">
                                                <div class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="text-gray-500 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                    </svg>

                                                    <span class="font-semibold text-gray-800 text-lg mx-1">{{
                                                        $tenants->count() }}</span>
                                                    <div class="text-md font-medium text-purple-600">Tenants
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



            <div class="px-10 mt-10 gap-y-5 gap-x-6 sm:mt-10 sm:grid grid-cols-1 lg:grid-cols-6 lg:gap-x-5">

                <div class="bg-white mt-5 mr-5 pt-12 px-5 rounded-lg shadow-lg lg:my-10 sm:my-20 pb-4 col-span-4">
                    <div class="px-4 py-3 flex justify-end  sm:px-6">

                        <div>

                            {{-- <select wire:model="collectionLineValue"
                                class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                <option value="30_days">30 days</option>
                                <option value="90_days">90 days</option>
                                <option value="this_year">This year</option>
                            </select> --}}
                        </div>
                    </div>


                    <div class="relative flex flex-col  break-words max-w-2xl mb-6 ">
                        <div class="rounded-t mb-0 px-4 py-3 bg-transparent">
                            <div class="flex flex-wrap items-center">
                                <div class="relative w-full max-w-full flex-grow flex-1">


                                </div>
                            </div>
                        </div>
                        <div class="p-4 flex-auto">
                            <!-- Chart -->
                            <div class="relative h-350-px">
                                <canvas id="line-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" charset="utf-8">
                    </script>
                    <script type="text/javascript">
                        (function () {
                /* Chart initialisations */
                /* Line Chart */
                var config = {
                  
                  type: "line",
                  data: {
                    labels: {!!$collection_rate_date!!}, 
                    datasets: [
                      {
                        label: "Income",
                        backgroundColor: "#9370DB",
                        borderColor: "#9370DB",
                        data: {!!$collection_rate_value!!},
                        fill: false,
                      },
                      {
                        label: "Expense",
                        fill: false,
                        backgroundColor: "#DB7093",
                        borderColor: "	#DB7093",
                        data: {!!$expense_rate_value!!},
                      },
                    ],
                  },
                  options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    title: {
                      display: false,
                      text: "Sales Charts",
                      fontColor: "gray",
                    },
                    legend: {
                      labels: {
                        fontColor: "gray",
                      },
                      align: "end",
                      position: "bottom",
                    },
                    tooltips: {
                      mode: "index",
                      intersect: false,
                    },
                    hover: {
                      mode: "nearest",
                      intersect: true,
                    },
                    scales: {
                      xAxes: [
                        {
                          ticks: {
                            fontColor: "rgba(169,169,169,.7)",
                          },
                          display: true,
                          scaleLabel: {
                            display: false,
                            labelString: "Month",
                            fontColor: "gray",
                          },
                          gridLines: {
                            display: false,
                            borderDash: [2],
                            borderDashOffset: [2],
                            color: "rgba(147,112,219,0.3)",
                            zeroLineColor: "rgba(0, 0, 0, 0)",
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2],
                          },
                        },
                      ],
                      yAxes: [
                        {
                          ticks: {
                            fontColor: "rgba(169,169,169,.7)",
                          },
                          display: true,
                          scaleLabel: {
                            display: false,
                            labelString: "Value",
                            fontColor: "gray",
                          },
                          gridLines: {
                            borderDash: [3],
                            borderDashOffset: [3],
                            drawBorder: false,
                            color: "",
                            zeroLineColor: "rgba(147,112,219,0)",
                            zeroLineBorderDash: [2],
                            zeroLineBorderDashOffset: [2],
                          },
                        },
                      ],
                    },
                  },
                };
                var ctx = document.getElementById("line-chart").getContext("2d");
                window.myLine = new Chart(ctx, config);
              })();
                    </script>

                </div>

                <div class="lg:my-10 sm:my-5 mt-10 col-span-2 mx-2">

                    <div class=" px-2 bg-white h-full py-10 rounded-lg shadow-md  w-full">

                        <!-- component -->
                        {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer>
                        </script> --}}
                        <div class="flex justify-end">
                            <div>

                                {{-- <select wire:model="occupancyGraphValue"
                                    class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option value="30_days">30 days</option>
                                    <option value="90_days">90 days</option>
                                    <option value="this_year">This year</option>
                                </select> --}}
                            </div>
                        </div>
                        <h2 class="px-2 font-semibold text-lg">Occupancy Graph</h2>

                        <canvas class="" id="chartLine"></canvas>


                        <!-- graph chart.js -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <!-- chart line -->
                        <script>
                            const data = {
                 labels: {!!$occupancy_rate_date!!},
                 datasets: [
                 {
                 label: "Occupancy ",
                  backgroundColor: "rgba(244, 114, 182)",
                  borderColor: "rgba(244, 114, 182)",
                  data: {!!$occupancy_rate_value!!},
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
                </div>
                <!-- This is an example component -->



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

                <div class="mt-10 mx-5 col-span-2">

                    <div class=" bg-white rounded-lg shadow-md  px-5">
                        <div class="">
                            <div class="flex items-center">
                                <div class="ml-0 w-0 flex-1">
                                    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
                                        defer></script>
                                    <div class="flex justify-end">
                                        <div x-data="{ dropdownOpen: true }" class="relative ">
                                            <button @click="dropdownOpen = !dropdownOpen"
                                                class="relative z-10 block rounded-md  p-2 focus:outline-none">
                                                <svg class="h-5 w-5 text-gray-800" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                            <div x-show="dropdownOpen" @click="dropdownOpen = false"
                                                class="fixed inset-0 h-full w-full z-10"></div>

                                            <div x-show="dropdownOpen"
                                                class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                                    This Month
                                                </a>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                                    This Day
                                                </a>
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                                                    For All Time
                                                </a>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="text-sm">
                                        <h2 class="p-2 text-lg font-semibold text-gray-700">Bills and
                                            Collection</h2>
                                        <div
                                            class="mb-5 bg-gray-50 h-full w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                            <div class="p-4">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <svg class="w-6 h-6" viewBox="-3 0 143 143" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#a)" fill="#000">
                                                                <path
                                                                    d="M120.6 8.383c.449 11.6.645 22.706 1.355 33.779 1.51 23.515 4.141 46.96 4.506 70.547.086 5.496 0 11.003-.286 16.491a21.134 21.134 0 0 1-1.572 6.12c-1.176 3.151-3.306 4.02-6.332 2.532a47.556 47.556 0 0 1-5.698-3.567c-2.311-1.58-4.554-3.259-6.957-4.989-.574.302-1.129.64-1.662 1.01-3.971 3.121-7.956 6.222-11.873 9.41-4.115 3.347-7.81 3.386-12.344-.55-2.878-2.5-5.624-5.151-8.443-7.72-.401-.366-.876-.653-1.482-1.098-3.44 2.572-6.834 5.139-10.258 7.662-5.01 3.692-5.077 4.271-12.011.262-4.05-2.34-7.634-5.485-11.61-8.401-4.445 2.641-9.133 5.465-13.857 8.223-5.427 3.169-9.643.925-10.215-5.397-.04-.446-.03-.897-.037-1.346-.239-18.86-.476-37.718-.711-56.577-.188-15.828-.36-31.656-.513-47.483-.05-5.157-.007-10.316-.007-16.02-.788 0-1.844.021-2.9-.005a25.536 25.536 0 0 1-4.681-.25c-.794-.17-1.908-1.076-1.993-1.761a3.725 3.725 0 0 1 1.058-2.864 5.364 5.364 0 0 1 3.12-.968c11.1-.503 22.202-.96 33.305-1.369 16.938-.642 33.874-1.35 50.816-1.849 14.026-.411 28.059-.56 42.09-.824a8.22 8.22 0 0 1 .673.011c2.731.175 4.441 1.631 4.332 3.684-.105 1.97-1.684 3.244-4.319 3.288-3.68.066-7.364.019-11.494.019Zm-4.143 119.549c.077-1.497.163-2.167.138-2.833-.632-16.943-1.182-33.889-1.944-50.826-.812-18.054-2.467-36.08-1.313-54.186.239-3.768.035-7.563.035-11.803l-94.96 3.085c.538 39.283 2.277 78.382 2.797 117.838.924-.459 1.531-.713 2.083-1.053 2.197-1.355 4.266-2.964 6.584-4.064 5.167-2.457 8.694-2.954 12.886.944 3.372 3.135 7.685 5.259 11.486 7.77 1.561-1.201 2.744-2.054 3.864-2.985a366.84 366.84 0 0 0 5.894-5.028c3.208-2.781 6.534-3.177 10.22-1.136.976.555 1.919 1.169 2.822 1.838 3.072 2.219 6.124 4.465 9.274 6.769 3.91-2.852 7.721-5.621 11.52-8.407 4.335-3.178 7.171-3.281 11.71-.379 2.137 1.366 4.269 2.751 6.904 4.456Z" />
                                                                <path
                                                                    d="M44.381 79.789c-3.918 0-7.836.008-11.754-.006a12.8 12.8 0 0 1-2.673-.149c-1.662-.364-2.865-1.296-2.94-3.162a3.125 3.125 0 0 1 2.682-3.363 45.292 45.292 0 0 1 5.979-.816c7.244-.629 14.49-1.252 21.744-1.76a19.16 19.16 0 0 1 4.981.419 3.602 3.602 0 0 1 2.96 3.263 3.42 3.42 0 0 1-2.1 3.84 22.684 22.684 0 0 1-6.46 1.486c-4.13.229-8.28.066-12.42.066l.001.182ZM34.632 45.388c-1.01 0-2.024.045-3.032-.01-2.38-.13-3.873-1.273-4.188-3.15-.328-1.93.932-3.72 3.398-4.31a61.25 61.25 0 0 1 7.628-1.29c5.804-.63 11.617-1.217 17.44-1.62 1.778-.135 3.564.12 5.232.749 3.03 1.217 3.38 4.512.671 6.351a11.644 11.644 0 0 1-4.965 1.818c-3.56.434-7.166.479-10.753.69-3.811.225-7.622.455-11.433.687l.002.085ZM45.89 88.354c2.358 0 4.72-.092 7.069.037a9.699 9.699 0 0 1 3.872.836 4.263 4.263 0 0 1 2.35 3.811 4.268 4.268 0 0 1-2.35 3.812c-1.325.593-2.759.906-4.21.919-5.94.276-11.885.459-17.83.59a17.088 17.088 0 0 1-4.32-.44c-1.999-.48-3.262-2.078-3.15-3.82.115-1.844 1.036-3.282 2.891-3.7a64.42 64.42 0 0 1 7.279-1.232c2.787-.304 5.6-.375 8.401-.547l-.001-.266ZM36.844 28.567c-2.015 0-4.033.05-6.046-.022-.988-.035-2.17-.013-2.901-.53a5.638 5.638 0 0 1-2.049-2.783c-.411-1.39.355-2.661 1.686-3.323a9.114 9.114 0 0 1 2.853-.903c4.552-.572 9.11-1.115 13.68-1.527 1.304-.119 2.841-.123 3.927.459a6.373 6.373 0 0 1 2.7 3.077c.58 1.49-.385 3.014-1.75 3.629a20.582 20.582 0 0 1-5.725 1.63c-2.093.273-4.247.062-6.375.062v.23ZM36.145 62.17c-2.025-.293-3.491-.388-4.893-.739-1.576-.394-2.672-1.64-2.46-3.18.16-1.171.999-2.892 1.927-3.205 4.373-1.47 8.91-2.246 13.54-1.181a3.14 3.14 0 0 1 2.678 3.037 3.271 3.271 0 0 1-2.433 3.616c-2.905.77-5.905 1.185-8.36 1.651ZM90.334 44.23c-2.214-.3-4.485-.394-6.616-.985-.994-.278-2.418-1.552-2.39-2.33.038-1.076 1.144-2.228 2.025-3.116.482-.486 1.428-.598 2.19-.705 2.664-.376 5.332-.759 8.012-.985 3.493-.295 6.248 1.287 6.422 3.529.171 2.217-2.297 4.05-5.913 4.314-1.228.09-2.467.014-3.702.014l-.028.264ZM91.055 95.77c-1.151-.11-3.04-.223-4.91-.486a2.821 2.821 0 0 1-2.582-3.023 2.967 2.967 0 0 1 2.57-3.092c3.633-.598 7.285-1.162 10.953-1.431 2.51-.184 4.214 1.312 4.375 3.224.163 1.938-1.187 3.626-3.653 4.113-1.964.388-3.996.428-6.754.695ZM90.511 79.682c-1.829-.262-3.395-.398-4.917-.731-1.685-.37-2.854-1.473-2.888-3.243a3.243 3.243 0 0 1 2.745-3.359 72.338 72.338 0 0 1 8.26-1.36c2.517-.24 4.4 1.264 4.719 3.347.284 1.857-1.014 3.863-3.226 4.525a36.88 36.88 0 0 1-4.692.821ZM89.072 60.41a25.732 25.732 0 0 1-4.804-.947c-.811-.295-1.575-1.522-1.792-2.457a2.261 2.261 0 0 1 .363-1.795 2.247 2.247 0 0 1 1.575-.934 68.506 68.506 0 0 1 9.654-.803 3.498 3.498 0 0 1 3.374 3.182c.036 1.453-1.266 2.937-3.252 3.344-1.697.234-3.405.37-5.118.41Z" />
                                                            </g>
                                                            <defs>
                                                                <clipPath id="a">
                                                                    <path fill="#fff" transform="translate(.735 .953)"
                                                                        d="M0 0h135.862v141.769H0z" />
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                                        <p class="text-sm font-medium text-gray-900">Total
                                                            Bills for Collection</p>
                                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                                            {{
                                                            App\Http\Controllers\CollectionController::shortNumber($total_uncollected_bills
                                                            + $total_collected_bills)
                                                            }}
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
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 95.929 95.929"
                                                            style="enable-background:new 0 0 95.929 95.929"
                                                            xml:space="preserve">
                                                            <path
                                                                d="M11.465 87.419c2 1.4 4 2.4 6.1 3.3 4.1 1.8 8.4 2.9 12.7 3.7s8.6 1.2 13 1.2c2.1.2 4.3.3 6.4.3 6.8.1 13.7-.5 20.4-2.1 3.4-.8 6.7-1.8 10-3.3 1.6-.7 3.2-1.6 4.8-2.7 1.5-1.1 3.1-2.3 4.4-3.9.8-.9 1.4-2 1.8-3 .4-1.1.5-2.1.4-3s-.4-1.5-.7-1.8c-.3-.3-.7-.4-1.2-.4-.8.1-1.5 1-2.1 1.7l-2.6 2.6c-2.1 1.9-5 3.3-8 4.4s-6.2 1.9-9.4 2.6c-5.2 1.1-10.5 1.8-15.9 2.1-5.4.3-10.8.2-16.2-.4-4.7-1.2-9.3-2.5-13.7-4.3-2.1-.9-4.2-1.9-6-3s-3.3-2.6-3.8-3.7c-.1-.1-.1-.3-.2-.4 0-.1 0-.1-.1-.2V66.719c1.8 1.8 3.9 3.1 6.2 4.2 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3 1.2-.7 2.4-1.5 3.5-2.4s2.2-2 3.1-3.3c1.1-1.5 1.6-3.4 1.3-4.7-.1-.7-.4-1.2-.7-1.5-.3-.3-.7-.4-1.2-.4h-.1c1.5-6.4 2.2-13.9 2.4-21.4.2-5.3.3-10.5.4-15.8v-2.6l-.1-.4c0-.3-.1-.6-.2-.9-.1-.5-.3-1-.4-1.4-.7-1.8-1.8-3.2-2.9-4.4-2.3-2.3-4.9-3.8-7.4-5.1-5.2-2.5-10.6-3.9-16-4.8-5.4-.7-10.9-1-16.3-.9-2.7 0-5.4 0-8.1.1-4.3.2-8.6.7-12.9 1.6s-8.5 2.1-12.7 4c-2.1 1-4.1 2.1-6.1 3.7-1 .8-1.9 1.7-2.8 2.9-.9 1.1-1.6 2.5-2.1 4-.2.8-.4 1.6-.4 2.4V20.419l.3 3.1.3 6.2c.2 4.7 1.1 8.6 2.9 8.2 1.6-.3 2.8-3.7 3-8.5 0-.9.1-1.7.1-2.6.2.2.4.5.6.7 1.8 2 4.2 3.6 6.7 4.7 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3.6-.4 1.2-.7 1.8-1.2v11.3c-1.4 1.4-3.4 2.6-5.5 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-.6-.5-1-1-1.4-1.4-.4-.5-.6-1-.7-1.3 0-.1-.1-.1-.2-.2s-.2 0-.3 0h-.2c-.1 0-.1-.2-.2-.2-.1-.2-.3-.3-.4-.3-.5-.3-.9-.2-1.3.1-.2.2-.4.4-.5.6-.1.2-.3.5-.3.8-.2 1.1-.1 2.4.4 3.6.5 1.2 1.3 2.3 2.2 3.3 1.8 2 4.2 3.6 6.7 4.7 6.1 2.7 12.4 4.4 18.8 5.3 3.2.5 6.4.7 9.7.8h2.5c.8 0 1.5 0 2.4-.1 1.7-.1 3.3-.2 4.9-.4 1.6 0 3.2-.1 4.8-.2 5.1-.4 10.2-1.3 15.2-3 2.5-.8 5-1.9 7.4-3.3.6-.4 1.3-.8 1.9-1.2 0 3.3 0 6.7-.1 10 0 .3 0 .6.1 1-1.4 1.4-3.4 2.6-5.5 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-.6-.5-1-1-1.4-1.4-.4-.5-.6-1-.7-1.3 0-.1-.1-.1-.2-.2h-.1c0-3 0-6 .1-8.9 0-.9-.7-2.3-1.1-2.7-1-.9-1.8.3-2.4 2-2.2 5.6-3.1 12.4-3.3 19.3l-.2 6.3-.1 1.6v1.8c0 .4.1.9.2 1.3.1.3.2.6.3 1 .3.7.6 1.4.9 2 1.6 2.4 3.5 4 5.5 5.4zm-.9-68V19.119c0-.1 0-.3.1-.4.1-.3.2-.5.3-.8.5-1.2 1.8-2.4 3.3-3.4s3.3-1.9 5.1-2.7c6-2.5 12.7-3.9 19.4-4.7 6.7-.8 13.6-.9 20.4-.3 6 1.2 11.9 2.8 17.2 5.1 2.6 1.2 5.2 2.6 6.9 4.2.8.8 1.5 1.7 1.7 2.3 0 .1.1.2.1.3v.1c0-.2.1.6.1.7v2.9c-1.4 1.4-3.4 2.5-5.4 3.5-2.1 1-4.4 1.8-6.7 2.5-7.5 2.4-15.5 3.7-23.7 4-7.3-1.1-14.5-1.9-21.4-3.6-3.5-.8-6.9-1.9-9.9-3.3-1.5-.7-2.9-1.6-4.1-2.5-2.3-1.8-3.4-3.6-3.4-3.6z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                                        <p class="text-sm font-medium text-gray-900">
                                                            Collected Amount </p>
                                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                                            {{
                                                            App\Http\Controllers\CollectionController::shortNumber($total_collected_bills)
                                                            }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div
                                            class="mb-5 bg-indigo-200 w-full shadow-md rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                            <div class="p-4">
                                                <div class="flex items-start">
                                                    <div class="flex-shrink-0">
                                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 297 297"
                                                            style="enable-background:new 0 0 297 297"
                                                            xml:space="preserve">
                                                            <path
                                                                d="M47.156 188.376c0 2.861 1.109 14.855 9.212 29.09 6.86 12.052 19.88 26.147 43.843 29.262v40.243c0 5.538 4.49 10.029 10.029 10.029 5.538 0 10.028-4.491 10.028-10.029v-49.644c0-5.538-4.49-10.029-10.028-10.029-16.487 0-28.643-6.465-36.128-19.216-5.521-9.402-6.922-17.345-6.922-20.844v-82.294c0-1.782 0-6.519 8.237-6.519 8.235 0 8.235 4.736 8.235 6.519v34.548c0 2.736 1.117 5.354 3.095 7.246a9.982 9.982 0 0 0 7.374 2.773c.024-.011 5.862.022 13.244 4.191 11.333 6.402 20.478 19.249 26.445 37.151 1.752 5.255 7.432 8.097 12.686 6.344 5.255-1.752 8.095-7.432 6.343-12.686-12.976-38.932-35.79-50.37-49.128-53.701V38.037c0-2.17 0-5.803 8.236-5.803 8.235 0 8.235 3.633 8.235 5.803v54.73c0 5.539 4.491 10.029 10.029 10.029s10.028-4.49 10.028-10.029V25.86c0-2.17 0-5.803 8.236-5.803 8.235 0 8.235 3.633 8.235 5.803v66.907c0 5.539 4.491 10.029 10.029 10.029s10.029-4.49 10.029-10.029v-54.73c0-2.17 0-5.803 8.235-5.803 8.236 0 8.236 3.633 8.236 5.803v71.278c0 5.538 4.491 10.029 10.029 10.029 5.539 0 10.029-4.491 10.029-10.029V71.849c0-1.782 0-6.519 8.236-6.519s8.244 4.736 8.244 6.519v116.402c.011.177.717 18.087-9.919 29.341-6.086 6.441-15.135 9.706-26.894 9.706-5.539 0-10.029 4.491-10.029 10.029v49.644c0 5.538 4.49 10.029 10.029 10.029 5.538 0 10.028-4.491 10.028-10.029v-40.253c12.868-1.712 23.415-6.855 31.443-15.35 15.825-16.745 15.516-40.586 15.391-43.899V71.849c0-15.647-11.636-26.577-28.294-26.577-2.912 0-5.667.342-8.236.977v-8.211c0-15.469-11.371-25.86-28.295-25.86-3.986 0-7.66.583-10.954 1.667C169.732 5.253 160.514 0 148.487 0c-12.028 0-21.245 5.253-25.575 13.844-3.294-1.084-6.968-1.667-10.954-1.667-16.924 0-28.295 10.392-28.295 25.86v41.307c-2.569-.635-5.324-.976-8.235-.976-16.66 0-28.295 10.93-28.295 26.577-.001-.001.023 61.792.023 83.431z" />
                                                        </svg>
                                                    </div>

                                                    <div class="ml-3 w-0 flex-1 pt-0.5">

                                                        <p class="text-sm font-medium text-gray-900">Total
                                                            Unpaid Collection:</p>
                                                        <p class="mt-1 text-2xl font-semibold text-gray-500">
                                                            {{
                                                            App\Http\Controllers\CollectionController::shortNumber($total_uncollected_bills)
                                                            }}</p>
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
                <div class="mt-20 lg: lg:my-24 sm:my-10  col-span-2">
                    <div class="bg-gray-200 rounded-lg shadow-md w-full">
                        <div class="flex justify-end items-end pr-5 pt-6">

                        </div>
                        <div class="flex items-center">


                            <div class="ml-0 w-0 flex-1">

                                <div class="pl-5 ml-4 text-xl font-semibold text-black ">Delinquents</div>



                            </div>
                        </div>


                        <!-- component -->
                        <div class="container flex mx-auto w-full items-center justify-center">

                            <ul class="flex flex-col bg-gray-200 p-4">
                                @foreach ($delinquents as $item)
                                <a href="/property/{{ $property->uuid }}/tenant/{{ $item->tenant->uuid }}/bills">
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
                                                <div class="font-medium">{{ $item->tenant->tenant }}</div>
                                                <div class="font-light">{{
                                                    App\Http\Controllers\CollectionController::shortNumber($item->balance)
                                                    }}</div>
                                            </div>

                                        </div>
                                    </li>
                                </a>
                                @endforeach

                            </ul>


                        </div>


                    </div>


                </div>



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
                <div class="mt-10 lg: sm:my-10  col-span-2">
                    <div class="bg-indigo-200 rounded-lg shadow-md w-full">
                        <div class="flex justify-end items-end pr-5 pt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="flex items-center">


                            <div class="ml-0 w-0 flex-1">

                                <div class="pl-5  text-xl font-semibold text-black ">Notifications</div>



                            </div>
                        </div>


                        <!-- component -->
                        {{-- <div class="container flex mx-auto w-full items-center justify-center">

                            <ul class="flex flex-col bg-indigo-200 p-4">
                                @foreach ($notifications as $item)
                                <li class="border-gray-400 flex flex-row mb-2">
                                    <div
                                        class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                        <div
                                            class="flex flex-col rounded-md w-10 h-10 bg-indigo-200 justify-center items-center mr-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="text-white w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                            </svg>

                                        </div>
                                        <div class="flex-1 pl-1 mr-16">
                                            <div class="font-medium">{{ $item->user->name.' '.$item->details }}</div>
                                            <div class="text-gray-600 text-sm">{{ $item->payment_status }}</div>
                                        </div>
                                        <div class="text-gray-600 text-xs">{{
                                            Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</div>
                                    </div>
                                </li>

                                @endforeach

                            </ul>

                        </div> --}}

                        <div class="flex justify-end pb-5 pr-5 gap-2">
                            <div
                                class="items-center text-center px-2.5 mt-3 py-2 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                </button>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="mr-5 mt-10 col-span-4">
                    <h2 class="p-3 font-semibold text-xl text-gray-700"> Expiring Contracts</h2>
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            @include('portals.tenants.tables.contracts')
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

            <div class="mt-20 lg:flex lg: sm:my-10  col-span-2">
                <div class="bg-purple-200 rounded-lg shadow-md w-full">
                    <div class="flex justify-end items-end pr-5 pt-6">

                    </div>
                    <div class="flex items-center">


                        <div class="ml-0 w-0 flex-1">

                            <div class="pl-5  text-xl font-semibold text-black ">Personnels</div>



                        </div>
                    </div>


                    <!-- component -->
                    <div class="container flex mx-auto w-full items-center justify-center">

                        <ul class="flex flex-col bg-purple-200 p-4">
                            @foreach ($personnels as $item)


                            <li class="border-gray-400 flex flex-row mb-2">
                                <div
                                    class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-4 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                                    <div
                                        class="flex flex-col rounded-md w-10 h-10 bg-purple-200 justify-center items-center mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6">
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
                        <div
                            class="items-center text-center px-2.5 mt-3 py-2 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            </button>
                        </div>

                    </div>

                </div>


            </div>

        </div>


    </div>
</div>