@section('styles')
<style>
    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
    }

    .animated.faster {
        -webkit-animation-duration: 500ms;
        animation-duration: 500ms;
    }

    .fadeIn {
        -webkit-animation-name: fadeIn;
        animation-name: fadeIn;
    }

    .fadeOut {
        -webkit-animation-name: fadeOut;
        animation-name: fadeOut;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }
</style>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection
<div class="px-10">
    <div class="pt-10 block lg:flex justify-between">
        <div class="w-full">
            <h1 class="text-3xl font-bold text-gray-500" wire:ignore>{{ucfirst(Route::current()->getName())}}</h1>
        </div>
        <!-- notifications -->
        <div class="flex w-full">
            <div>
                <button onclick="openModal()"
                    class='p-2 mt-2 border border-4 border-purple-500 bg-transparent text-purple-500 hover:bg-purple-500 hover:text-white rounded text-base'><img
                        class="inline-flex" width="26" height="26"
                        src="https://img.icons8.com/metro/26/9061f9/appointment-reminders.png"
                        alt="appointment-reminders" /> See Notifications</button>
            </div>

            <div class="main-modal fixed w-full inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster"
                style="background: rgba(0,0,0,.7);">
                <div class="border border-teal-500 shadow-lg modal-container bg-white mx-auto rounded shadow-lg z-50">
                    <div class="modal-content py-4 text-left px-6">
                        <!--Title-->
                        <div class="flex justify-between items-center pb-3">
                            <p class="text-base font-medium">Notifications</p>
                            <div class="modal-close cursor-pointer z-50">
                                <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18"
                                    height="18" viewBox="0 0 18 18">
                                    <path
                                        d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <!--Body-->
                        <div class="my-5">

                            <div x-data="{ openTab: 1 }" class="">
                                <div class="mx-auto">
                                    <div class="mb-4 flex space-x-4 p-2 bg-white rounded-lg shadow-md">
                                        <button x-on:click="openTab = 1"
                                            :class="{ 'bg-purple-600 text-white': openTab === 1 }"
                                            class="flex-1 p-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-all duration-300 text-sm">Expiring
                                            Contracts</button>
                                        <button x-on:click="openTab = 2"
                                            :class="{ 'bg-purple-600 text-white': openTab === 2 }"
                                            class="flex-1 p-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-all duration-300 text-sm">Payment
                                            Requests</button>
                                        <button x-on:click="openTab = 3"
                                            :class="{ 'bg-purple-600 text-white': openTab === 3 }"
                                            class="flex-1 p-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-all duration-300 text-sm">Moveout
                                            Requests</button>
                                        <button x-on:click="openTab = 4"
                                            :class="{ 'bg-purple-600 text-white': openTab === 4 }"
                                            class="flex-1 p-1 rounded-md focus:outline-none focus:shadow-outline-purple transition-all duration-300 text-sm">Concerns</button>
                                    </div>

                                    <div x-show="openTab === 1"
                                        class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-purple-600">
                                        <div class="flex justify-between py-2">
                                            <h1 class="py-1 font-light text-sm">Total Expiring Contracts:</h1>
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                                                {{ $expiringContracts->count() }}
                                            </span>
                                        </div>

                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                                            @foreach ($expiringContracts->take(5) as $item)
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p
                                                            class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            {{ $item->tenant->tenant }}
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            {{ Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a href=""><img width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png"
                                                                alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="flex justify-end items-center pt-5">
                                            <!-- Button -->
                                            <button
                                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/contract'"
                                                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                type="button">
                                                See all Contracts
                                            </button>
                                        </div>
                                    </div>

                                    <div x-show="openTab === 2"
                                        class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-purple-600">
                                        <div class="flex justify-between py-2">
                                            <h1 class="py-1 font-light text-sm">Total Pending Payments:</h1>
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                                                {{ $pendingPaymentRequests->count() }}

                                            </span>
                                        </div>

                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                                            @foreach($pendingPaymentRequests->take(5) as $item)
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p
                                                            class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            {{$item->tenant}}
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            {{ number_format($item->amount, 2) }}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a
                                                            href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant_uuid }}/payment_requests/{{ $item->id }}"><img
                                                                width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png"
                                                                alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="flex justify-end items-center pt-5">
                                            <!-- Button -->
                                            <button
                                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/collection/pending'"
                                                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                type="button">
                                                See all Payment Requests
                                            </button>
                                        </div>
                                    </div>

                                    <div x-show="openTab === 3"
                                        class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-purple-600">
                                        <div class="flex justify-between py-2">
                                            <h1 class="py-1 font-light text-sm">Total Moveout Requests:</h1>
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                                                {{ $pendingMoveoutContracts->count() }}

                                            </span>
                                        </div>

                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                                            <!-- limit list to 5 -->
                                            @foreach ($pendingMoveoutContracts->take(5) as $item)
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p
                                                            class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            {{$item->tenant->tenant}}
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            {{Carbon\Carbon::parse($item->end)->format('M d, Y')}}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a
                                                            href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout/step-1"><img
                                                                width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png"
                                                                alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="flex justify-end items-center pt-5">
                                            <!-- Button -->
                                            <button
                                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/contract'"
                                                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                type="button">
                                                See all Moveout Requests
                                            </button>
                                        </div>
                                    </div>

                                    <div x-show="openTab === 4"
                                        class="transition-all duration-300 bg-white p-4 rounded-lg shadow-md border-l-4 border-purple-600">
                                        <div class="flex justify-between py-2">
                                            <h1 class="py-1 font-light text-sm">Total Pending Concerns:</h1>
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                                                {{ $pendingConcerns->count() }}
                                            </span>
                                        </div>

                                        <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                                            <!-- limit list to 5 -->
                                            @foreach ($pendingConcerns->take(5) as $totalPendingConcern)
                                            <li class="pb-3 sm:pb-4">
                                                <div class="flex items-center space-x-4">

                                                    <div class="flex-1 min-w-0">
                                                        <p
                                                            class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                            @if($totalPendingConcern->tenant_uuid)
                                                            {{$totalPendingConcern->tenant->tenant}}
                                                            @else
                                                            NA
                                                            @endif
                                                        </p>
                                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                            {{ $totalPendingConcern->status }}
                                                        </p>
                                                    </div>
                                                    <div
                                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                                        <a
                                                            href="/property/{{ Session::get('property_uuid') }}/concern/{{ $totalPendingConcern->id }}/edit"><img
                                                                width="26" height="26"
                                                                src="https://img.icons8.com/metro/26/EBEBEB/forward.png"
                                                                alt="forward" /></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="flex justify-end items-center pt-5">
                                            <!-- Button -->
                                            <button
                                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/concern'"
                                                class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                                type="button">
                                                See all Concerns
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                const modal = document.querySelector('.main-modal');
                const closeButton = document.querySelectorAll('.modal-close');

                const modalClose = () => {
                    modal.classList.remove('fadeIn');
                    modal.classList.add('fadeOut');
                    setTimeout(() => {
                        modal.style.display = 'none';
                    }, 500);
                }

                const openModal = () => {
                    modal.classList.remove('fadeOut');
                    modal.classList.add('fadeIn');
                    modal.style.display = 'flex';
                }

                for (let i = 0; i < closeButton.length; i++) {

                    const elements = closeButton[i];

                    elements.onclick = (e) => modalClose();

                    modal.style.display = 'none';

                    window.onclick = function (event) {
                        if (event.target == modal) modalClose();
                    }
                }
            </script>
        </div>
        <!-- number of buildings -->
        <div class="w-full bg-white rounded-lg shadow p-3 md:p-6 justify-end">
            <div class="flex justify-between pb-0 lg:pb- mb-4">
                <div class="flex items-center">
                    <div
                        class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                        <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/building.png"
                            alt="building" />
                    </div>
                    <div>
                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{ $allBuildings->count()
                            }}</h5>
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
                    <dt
                        class="w-8 h-8 rounded-full bg-purple-400 text-sm font-medium flex items-center justify-center mb-1">
                        {{ $allPersonnels->count() }}</dt>
                    <dd class="text-sm font-medium">Personnels</dd>
                </dl>
                <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt
                        class="w-8 h-8 rounded-full bg-purple-100 text-sm font-medium flex items-center justify-center mb-1">
                        {{ $activePersonnels->count() }}</dt>
                    <dd class="text-sm font-medium">Current</dd>
                </dl>
                <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                    <dt
                        class="w-8 h-8 rounded-full bg-purple-200 text-sm font-medium flex items-center justify-center mb-1">
                        {{ $verifiedPersonnels->count() }}</dt>
                    <dd class="text-sm font-medium ">Verified</dd>
                </dl>
            </div>
        </div>

    </div>

    <div class="mt-8 grid grid-cols-4">

        <!-- number of contracts -->
        <div class="w-full col-span-4 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex pb-4 mb-4">
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/paper.png"
                                    alt="paper" />
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{
                                    $allContracts->count() }}</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Contracts</p>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-green-400 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $activeContracts->count() }}
                            </dt>
                            <dd class="text-sm font-medium">Current Tenants</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-green-100 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $allContracts->count()-$activeContracts->count() }}
                            </dt>
                            <dd class="text-sm font-medium">Past Tenants</dd>
                        </dl>

                    </div>
                </div>
            </div>
        </div>

        <!-- number of tenants -->
        <div class="w-full col-span-4 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex pb-4 mb-4">
                        <div class="flex justify-between">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/name.png"
                                    alt="name" />
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{
                                    $allTenants->count() }}</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Tenants</p>
                            </div>

                            <div>
                                <svg data-popover-target="verified-info" data-popover-placement="bottom"
                                    class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                </svg>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-yellow-400 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $allVerifiedTenants->count() }}</dt>
                            <dd class="text-sm font-medium">Verified</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-yellow-100 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $allTenants->count()-$allVerifiedTenants->count() }}</dt>
                            <dd class="text-sm font-medium">Unverified</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- number of units -->
        <div class="w-full col-span-4 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex pb-4 mb-4">
                        <div class="flex items-center">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/door.png"
                                    alt="door" />
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{
                                    $allUnits->count() }}</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Units</p>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-indigo-400 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $occupiedUnits->count() }}</dt>
                            <dd class="text-sm font-medium">Occupied</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-indigo-200 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $vacantUnits->count()}}</dt>
                            <dd class="text-sm font-medium">Vacant</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-indigo-100 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $reservedUnits->count() }}
                            </dt>
                            <dd class="text-sm font-medium">Reserved</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- number of owners -->
        <div class="w-full col-span-4 lg:col-span-1">
            <div class="w-full bg-white rounded-lg shadow p-2 md:p-6">
                <div class="bg-white p-3 rounded-lg">
                    <div class="flex  pb-4 mb-4">
                        <div class="flex justify-between">
                            <div
                                class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                                <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/caretaker.png"
                                    alt="caretaker" />
                            </div>
                            <div>
                                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{
                                    $allOwners->count() }}</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Owners</p>
                            </div>
                            <div>
                                <svg data-popover-target="verified-info" data-popover-placement="bottom"
                                    class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                </svg>
                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 mb-2">
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-gray-300 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $allVerifiedOwners->count() }} </dt>
                            <dd class="text-sm font-medium">Verified</dd>
                        </dl>
                        <dl class=" rounded-lg flex flex-col items-center justify-center h-[78px]">
                            <dt
                                class="w-8 h-8 rounded-full bg-gray-100 text-sm font-medium flex items-center justify-center mb-1">
                                {{ $allOwners->count()-$allVerifiedOwners->count() }}</dt>
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
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">Occupancy Rate
                        </h5>


                    </div>

                </div>

                <!-- Donut Chart -->
                <div class="py-6" id="donut-chart"></div>

                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
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
                    series: {!! $occupancyPieChartValues !!},
                    colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
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
                                return `{!! $occupancyRate !!}`
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
                    labels: {!! $occupancyPieChartLabels !!},
                    dataLabels: {
                        enabled: true,
                    },
                    legend: {
                        position: "bottom",
                        fontFamily: "Inter, sans-serif",
                    },
                    yaxis: {
                        labels: {
                        formatter: function (value) {
                            return value
                        },
                        },
                    },
                    xaxis: {
                        labels: {
                        formatter: function (value) {
                            return value
                        },
                        },
                        axisTicks: {
                        show: true,
                        },
                        axisBorder: {
                        show: true,
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

        <!-- guests -->
        <div class="col-span-4 lg:col-span-2 p-4">
            <div class="flex justify-between">
                <h1 class="py-3 font-bold text-xl">Total Guests Welcomed</h1>
                <p class="p-3 text-xl font-semibold">{{ $allGuests->count() }}</p>
            </div>
            <div class="flex justify-between py-2">
                <h1 class="py-1 font-light text-sm">Average Number of Days Stayed:</h1>
                <span
                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">

                    {{number_format($averageNumberOfDaysGuestsStayed, 2)}} day/s
                </span>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                @foreach ($allGuests->take(5) as $item)
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{ $item->guest }}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{ $item->email }}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            <a href="/property/{{ Session::get('property_uuid') }}/guest/{{ $item->uuid }}"><img
                                    width="26" height="26" src="https://img.icons8.com/metro/26/EBEBEB/forward.png"
                                    alt="forward" /></a>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <div class="flex justify-end items-center pt-5">
                <!-- Button -->
                <button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest'"
                    class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    See all Guests
                </button>
            </div>

        </div>


    </div>
    <div class="mt-7 grid grid-cols-6">
        <!-- income rate -->
        <div class="col-span-6 lg:col-span-2">
            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Income</dt>
                        <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">₱{{
                            number_format($postedCollections-$completedRFPs,2) }}</dd>
                    </dl>
                </div>

                <div class="grid grid-cols-2 py-3">
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Collection</dt>
                        <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400">₱{{
                            number_format($postedCollections,2) }}</dd>
                    </dl>
                    <dl>
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Expense</dt>
                        <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500">₱{{
                            number_format($completedRFPs,2) }}</dd>
                    </dl>
                </div>

                <div id="bar-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
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
                    color: "#2D3047",
                    data: {!! $collectionBarValues !!},
                    },

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
                    categories: {!! $incomeBarLabels !!},
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

        <!-- collection rate -->
        <div class="col-span-6 lg:col-span-4">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                            <img width="26" height="26" src="https://img.icons8.com/metro/26/737373/coins.png"
                                alt="coins" />
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">
                                {{ $collectionRate }}
                            </h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Collection Rate</p>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Billed:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{
                            number_format($postedBills,2) }}</dd>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Unbilled:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">NA</dd>
                    </dl>
                </div>

                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Collected:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{
                            number_format($postedCollections,2) }}</dd>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Total Uncollected:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{
                            number_format($postedUnpaidBills, 2) }}</dd>
                    </dl>
                </div>

                <div id="collection-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-end items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
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
                    // colors: ["#1A56DB", "#b4c4ae"],
                    series: [
                        {
                        name: "Billed",
                        color: "#5d5179",
                        data:{!! $billedBillBarValues !!},
                        },
                        {
                        name: "Uncollected",
                        color: "#AD84F3",
                        data: {!! $uncollectedBillBarValues !!},
                        },
                        {
                        name: "Collected",
                        color: "#A5A5A5",
                        data:{!! $collectedBillBarValues !!},
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

        <!-- bills -->
        <div class="mt-5 col-span-6 lg:col-span-3">

            <div class="w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">

                <div class="flex justify-between items-start w-full">
                    <div class="flex-col items-center">
                        <div class="flex items-center mb-1">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white mr-1">Bills</h5>
                            <svg data-popover-target="verified-info" data-popover-placement="bottom"
                                class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                            </svg>
                            <div data-popover id="verified-info" role="tooltip"
                                class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                <div class="p-3 space-y-2">
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Verified
                                    </h3>
                                    <p>are those users who have access to their portals and have verified their email
                                        addresses. </p>
                                    <h3 class="font-semibold text-gray-900 dark:text-white">Unverified</h3>
                                    <p>are those users who have been given access to their portals via emails but
                                        haven't verified their email address yet.</p>

                                </div>
                                <div data-popper-arrow></div>
                            </div>
                        </div>


                    </div>

                </div>

                <!-- Line Chart -->
                <div class="py-6" id="pie-chart"></div>

                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
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
                    series: [{!! $postedPaidBills !!}, {!! $postedUnpaidBills !!}],
                    colors: ["#E0CA3C", "#AB4B4B"],
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
                    labels: ["Paid", "Unpaid"],
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
                        return value
                        },
                    },
                    },
                    xaxis: {
                    labels: {
                        formatter: function (value) {
                        return value
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

        <!-- delinquents -->
        <div class="col-span-6 lg:col-span-3 p-4">
            <div class="flex justify-between">
                <h1 class="py-3 font-bold text-2xl">Delinquents</h1>
                <span
                    class="text-red-800 text-lg font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-red-900 dark:text-red-300">
                    {{ $delinquentTenants->count() }}

                </span>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                @foreach ($delinquentTenants->take(5) as $item)
                <li class="pb-3 sm:pb-4">
                    <div class="flex items-center space-x-4">

                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                {{$item->tenant}}
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                {{$item->email}}
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            {{number_format($item->totalBill,2)}}
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

            <div class="flex justify-end items-center pt-5">
                <!-- Button -->
                <button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/bill/delinquents'"
                    class="p-2 text-sm font-medium text-gray-500 border hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                    type="button">
                    See all delinquents
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
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{
                            $electricConsumption }}</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Electric Consumption</p>
                    </div>

                </div>
                <div id="waters-chart" class="px-2.5"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
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
                    categories: {!! $utilityWaterConsumptionChartLabels !!},
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
                    data: {!! $utilityWaterConsumptionChartValues !!},
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
                        <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">{{
                            $waterConsumption }}</h5>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Total Water Consumption</p>
                    </div>
                </div>
                <div id="electric-chart" class="px-2.5"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between mt-5 p-4 md:p-6 pt-0 md:pt-0">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
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
                    categories: {!! $utilityElectricConsumptionChartLabels !!},
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
                    data: {!! $utilityElectricConsumptionChartValues !!},
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
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{
                                $activeConcerns->count() }}</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Active Concerns</p>
                        </div>

                    </div>
                    <div>

                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{
                            $closedConcerns->count() }}</h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Resolved Concerns</p>

                    </div>
                    <div>

                        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{ $allConcerns->count()
                            }}</h5>
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">All time Concerns</p>

                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <dl class="flex items-center">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Resolved Concerns:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{ $closedConcerns->count() }}</dd>
                    </dl>
                    <dl class="flex items-center justify-end">
                        <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal mr-1">Average days to be
                            resolved:</dt>
                        <dd class="text-gray-900 text-sm dark:text-white font-semibold">{{
                            number_format($averageNumberOfDaysForConcernsToBeResolved,1) }} day/s</dd>
                    </dl>
                </div>

                <div id="column-chart"></div>
                <div
                    class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                    <div class="flex justify-between items-center pt-5">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                            type="button">
                            This Month
                            <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">January</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">February</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">March</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">April</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">May</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">June</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">July</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">August</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">September</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">October</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">November</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">December</a>
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
                        color: "#93C6D6",
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
                        color: "#9E8FB2",
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

        <!-- election -->
        <div class="col-span-6 lg:col-span-3 p-4">
            <!-- memos -->
            <div class="w-full bg-white rounded-lg shadow p-3 md:p-6 justify-end">
                <div class="flex justify-between pb-0 lg:pb- mb-4">
                    <div class="flex items-center">
                        <div
                            class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="26" height="26"
                                viewBox="0 0 26 26" style="fill:#737373;">
                                <path
                                    d="M 20.265625 4.207031 C 20.023438 3.96875 19.773438 3.722656 19.527344 3.476563 C 19.277344 3.230469 19.035156 2.980469 18.792969 2.734375 C 17.082031 0.988281 16.0625 0 15 0 L 7 0 C 4.796875 0 3 1.796875 3 4 L 3 22 C 3 24.203125 4.796875 26 7 26 L 19 26 C 21.203125 26 23 24.203125 23 22 L 23 8 C 23 6.9375 22.011719 5.917969 20.265625 4.207031 Z M 21 22 C 21 23.105469 20.105469 24 19 24 L 7 24 C 5.894531 24 5 23.105469 5 22 L 5 4 C 5 2.894531 5.894531 2 7 2 L 14.289063 1.996094 C 15.011719 2.179688 15 3.066406 15 3.953125 L 15 7 C 15 7.550781 15.449219 8 16 8 L 19 8 C 19.996094 8 21 8.003906 21 9 Z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">{{
                                $approvedBulletins->count() }}</h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Number of Memos</p>
                        </div>
                    </div>
                    <div>

                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <h1 class="py-3 font-bold text-xl">Election Date</h1>
                <p class="p-3 text-lg font-medium">October 23, 2023</p>
            </div>
            <div class="flex justify-between py-2">
                <h1 class="py-1 font-light text-base">Current BODS:</h1>
                <span
                    class="bg-green-100 text-green-800 text-base font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                    5
                </span>
            </div>
            <ul class="divide-y divide-gray-200 dark:divide-gray-700 shadow p-3">
                <!-- limit to 5 only -->
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
    </div>
</div>
