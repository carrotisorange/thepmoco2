<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="facebook-domain-verification" content="q3z93v1eg3wsq648g7aq2cuby3ibcv" />

    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=847561769549195&ev=PageView
        &noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

    <title>{{ Session::get('property')? Session::get('property'): config('APP_NAME') }} @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.3.4/dist/flowbite.min.css" />

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/b3c8174312.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    {{-- Flowbite --}}
    <script src="../path/to/flowbite/dist/flowbite.js"></script>

    @yield('styles')

    @livewireStyles

</head>

<body class="h-full overflow-hidden font-body">
    <div class="flex h-full flex-col">
        <!-- Top nav-->
        <nav x-data="{ open: false }" class="bg-white p-3 border-b border-gray-100">

            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-5">

                <div class="flex justify-between h-16">
                    <div class="flex">

                        <div class="shrink-0 flex items-center">
                            <a href="/property">
                                <img class="h-24 w-15" src="{{ asset('/brands/full-logo.png') }}" />
                            </a>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <h1 class="text-xl py-5 tracking-tight font-bold leading-tight text-gray-900">
                                Owner Portal</h1>

                        </div>
                        {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link href="/users" :active="request()->routeIs('user')">
                                <i class="fa-solid fa-user"></i>&nbspUser
                            </x-nav-link>
                        </div> --}}
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                                    <div class="ml-2 text-xl">{{ auth()->user()->name }}</div>

                                    <div class="ml-1 text-xl">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
                                    Profile
                                </x-dropdown-link>



                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                                                            this.closest('form').submit();">
                                        Log Out
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>

                    </div>

                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

                <div class="pt-4 pb-1 border-t border-gray-200 overflow-y-auto h-screen">

                    {{-- <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}">
                            Dashboard
                        </x-dropdown-link>
                    </div> --}}

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/units">
                            Units
                        </x-dropdown-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/bills">
                            Bills
                        </x-dropdown-link>
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link
                            href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/payments">
                            Payments
                        </x-dropdown-link>
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/remittances">
                            Remittances
                        </x-dropdown-link>
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link
                            href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/concerns">
                            Concerns
                        </x-dropdown-link>
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
                            Profile
                        </x-dropdown-link>
                    </div>


                    <div class="pt-2 pb-3 space-y-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Bottom section -->
        <div class="flex min-h-0 flex-1 overflow-hidden">
            <!-- Narrow sidebar-->
            <nav aria-label="Sidebar"
                class="hidden md:block md:flex-shrink-0 md:overflow-y-auto md:bg-white overflow-y-auto h-screen">
                <div class="relative flex w-20 flex-col space-y-3 p-3">
                    <!-- Dashboard -->
                    {{-- <x-nav-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}"
                        :active="request()->routeIs('owner-dashboard')">
                        <span class="sr-only">Dashboard</span>
                        <img class="h-10 w-auto" src="{{ asset('/brands/dashboard_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </x-nav-link>
                    <div class="leading-3 ml-0 text-xs text-gray-400 mt-10">Dashboard</div> --}}

                    <!-- Contracts -->
                    <x-nav-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/units"
                        :active="request()->routeIs('owner-units')"> <span class="sr-only">units</span>
                        <img class="h-13 w-auto" src="{{ asset('/brands/units_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </x-nav-link>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Units</div>

                    <!-- Bills -->
                    <x-nav-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/bills"
                        :active="request()->routeIs('owner-bills')"> <span class="sr-only">Bills</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/invoice_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </x-nav-link>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Bills</div>

                    <!-- Payments -->
                    <x-nav-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/payments"
                        :active="request()->routeIs('owner-payments')"> <span class="sr-only">Payments</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/credit-card.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                    </x-nav-link>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Payments</div>

                    <x-nav-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/remittances"
                        :active="request()->routeIs('owner-remittances')"> <span class="sr-only">Remittances</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/credit-card.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                    </x-nav-link>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Remittances</div>

                    <!-- Concerns -->
                    <x-nav-link href="/{{auth()->user()->role_id}}/owner/{{ auth()->user()->username }}/concerns"
                        :active="request()->routeIs('owner-concerns')"> <span class="sr-only">Concerns</span>
                        <img class="h-12 w-auto" src="{{ asset('/brands/concerns_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Concerns</div>
                </div>
            </nav>

            <main class="flex-1 pb-8 h-screen y-screen overflow-y-auto h-screen ">
                {{ $slot }}
                <div class="mb-10">
                    @include('layouts.footer')
                </div>
            </main>
        </div>
    </div>>
    @include('layouts.scripts')
</body>

</html>