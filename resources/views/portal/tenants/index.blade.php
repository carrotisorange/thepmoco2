<x-tenant-portal-layout>
    @section('title', 'Dashboard')

    @section('header', 'Dashboard')

    <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

        <!-- card Welcome back -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </div>
                    <div class="flex items-center justify-center w-0 flex-1">
                        <dl>
                            <dt class="text-xl font-semibold font-body text-gray-500 truncate">
                                Welcome back, {{ auth()->user()->name }}</dt>
                            <dd>
                                <img class="h-64 w-auto" src="{{ asset('/brands/juan.png') }}">
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="text-sm text-center ">
                    <a href="/user/{{ auth()->user()->username }}/edit" class="font-medium text-blue-900">Update your
                        profile.</a>
                </div>
            </div>

            <div class="mt-10 grid grid-cols-1 gap-x-4 sm:grid-cols-3">

                <div class="sm:col-span-1">

                    <div class=" flex items-center justify-center">
                        <img src="{{ asset('/brands/door.png') }}" alt="building"
                            class=" w-10 object-center object-cover ">

                    </div>
                    <div class="mt-2 text-xs text-center font-semibold font-body text-gray-500 truncate">
                        Contract</div>
                    <a href="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/contracts"
                        class="flex items-center justify-center text-indigo-600 text-lg">{{ $contracts->count() }}</a>

                </div>

                <div class="sm:col-span-1">

                    <div class=" flex items-center justify-center">
                        <img src="{{ asset('/brands/tenant.png') }}" alt="building"
                            class=" w-10 object-center object-cover ">

                    </div>
                    <div class="mt-2 text-xs text-center font-semibold font-body text-gray-500 truncate">
                        Unpaid Bills</div>
                    <a href="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/bills"
                        class="flex items-center justify-center text-indigo-600 text-lg">{{ $unpaid_bills->count()
                        }}</a>

                </div>

                <div class="sm:col-span-1">

                    <div class=" flex items-center justify-center">
                        <img src="{{ asset('/brands/key-chain.png') }}" alt="building"
                            class=" w-10 object-center object-cover ">

                    </div>
                    <div class="mt-2 text-xs text-center font-semibold font-body text-gray-500 truncate">
                        Concern</div>
                    <a href="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/concerns"
                        class="flex items-center justify-center text-indigo-600 text-lg">{{ $concerns->count() }}</a>

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
                            <dt class="text-3xl font-medium text-black-500 truncate">Announcements:
                            </dt>

                            <dd>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
            @foreach ($contracts->where('end','<=',\Carbon\Carbon::now()->addMonth()) as $item)
                <div class="bg-indigo-50 px-5 py-8 mb-5 rounded-lg">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> Your contract
                            will expire in 2 days. </a>
                        <div button type="button"
                            class="items-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Renew</button></div>
                    </div>
                </div>
                @endforeach
                @foreach ($unpaid_bills->get() as $item)
                <div class="bg-indigo-50 px-5 py-8 mb-5 rounded-lg">
                    <div class="text-sm">
                        <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> You have {{
                            number_format($item->bill, 2) }}
                            unpaid bills for {{ $item->unit->unit }}. </a>
                        <div button type="button"
                            onclick="window.location.href='/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/bills'"
                            class="items-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Pay now</button></div>
                    </div>
                </div>
                @endforeach

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
                            <dt class="text-sm font-medium text-gray-500 truncate">{{ Carbon\Carbon::now()->format('D M
                                d, Y') }}</dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">{{
                                    number_format($unpaid_bills->sum('bill'), 2) }}</div>
                                <h2 class="text-lg leading-3 ml-0 font-medium text-gray-600 mt-10">
                                    Notifications</h2>
                            </dd>
                        </dl>
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
                                    <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>

                                <div class="ml-3 w-0 flex-1 pt-0.5">
                                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }} {{
                                        $item->details }}</p>
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
{{-- 
            <div button
                class=" justify-self-end items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm 
    text-white text-center bg-gray-600 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                onclick="window.location.href='/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/payments'">
                View
                More</>
            </div> --}}


        </div>
    </div>
</x-tenant-portal-layout>