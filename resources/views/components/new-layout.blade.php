<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
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

                        <div class="hidden space-x-3 sm:-my-px sm:ml-10 sm:flex">
                            <h1 class="text-xl py-5 tracking-tight font-bold leading-tight text-gray-900">
                                @if (Session::has('property'))
                                {{ App\Models\Property::find(Session::get('property'))->property.'
                                '.App\Models\Property::find(Session::get('property'))->type->type }}
                                @endif
                            </h1>
                            <!-- help icon -->
                            <button title="help" class="py-5">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" text-purple-500 w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                </svg>
                            </button>
                        </div>



                        {{-- {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link href="/users" :active="request()->routeIs('user')">
                                <i class="fa-solid fa-user"></i>&nbspUser
                            </x-nav-link>
                        </div> --}}
                    </div>
                    @auth


                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- notification bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="text-gray-500 w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">

                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                                    <div class="ml-2 text-xl">

                                        {{ auth()->user()->name }}

                                    </div>

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

                                <x-dropdown-link href="/chatify" target="_blank">
                                    Chat
                                </x-dropdown-link>
                                @if(auth()->user()->role_id != 7 && auth()->user()->role_id != 8)
                                <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
                                    Subscriptions
                                </x-dropdown-link>
                                @endif
                                <x-dropdown-link href="/property">
                                    Portfolio
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

                    @endauth
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
                @auth
                <div class="pt-4 pb-1 border-t border-gray-200 overflow-y-auto h-screen mb-20">
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}">
                            Dashboard
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Dashboard
                        </x-dropdown-link>
                        @endif
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/unit">
                            Units
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Units
                        </x-dropdown-link>
                        @endif
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/calendar">
                            Calendar
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Calendar
                        </x-dropdown-link>
                        @endif
                    
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/tenant">
                            Tenants
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Tenants
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/contract/">
                            Contracts
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Contracts
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/guest/">
                            Guests
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Guests
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/owner">
                            Owners
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Owners
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/user">
                            Personnels
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Personnels
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/concern">
                            Concerns
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Concerns
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/bill">
                            Bills
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Bills
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/collection">
                            Collections
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Collections
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/accountpayable">
                            Account Payables
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Account Payables
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/cashflow">
                            Cashflows
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Cashflows
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/utilities">
                            Utilities
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Utilities
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
                            Profile
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Profile
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/chatify">
                            Chat
                        </x-dropdown-link>
                    </div>
                    @if(auth()->user()->role_id != 7 && auth()->user()->role_id != 8)
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
                            Subscriptions
                        </x-dropdown-link>
                    </div>
                    @endif
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/property">
                            Portfolio
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
                @endauth
            </div>
        </nav>
        <!-- Bottom section -->
        <div class="flex min-h-0 flex-1 overflow-hidden">
            <!-- Narrow sidebar-->
            {{-- @include('layouts.navigation') --}}
            <nav aria-label="Sidebar" class="hidden md:block md:flex-shrink-0 md:bg-white overflow-y-auto h-screen">
                <div class="relative flex w-22 flex-col space-y-3 p-3 mb-20">
                    <!-- Dashboard -->

                    <x-nav-link href="/property/{{ Session::get('property') }}"
                        :active="request()->routeIs('dashboard')">
                        <span class="sr-only">Dashboard</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/dashboard_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </x-nav-link>
                    <div class="leading-3 ml-0 text-xs text-gray-400 mt-10">Dashboard</div>

                    <!-- Units -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/unit"
                        :active="request()->routeIs('unit')">
                        <span class="sr-only">Units</span>
                        <img class="h-10 w-auto" src="{{ asset('/brands/units_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('unit')">
                        <span class="sr-only">Unit</span>
                        <img class="h-10 w-auto" src="{{ asset('/brands/units_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Units</div>

                    <!-- Calendar -->

                    <!-- Units -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/calendar"
                        :active="request()->routeIs('calendar')">
                        <span class="sr-only">Calendar</span>
                        <img class="h-7 w-auto" src="{{ asset('/brands/calendar.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('calendar')">
                        <span class="sr-only">Unit</span>
                        <img class="h-7 w-auto" src="{{ asset('/brands/calendar.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Calendar</div>

                    <!-- Tenants -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/tenant"
                        :active="request()->routeIs('tenant')">
                        <span class="sr-only">Tenants</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/tenant_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('tenant')">
                        <span class="sr-only">Tenant</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/tenant_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Tenants</div>

                    <!-- Contracts -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/contract"
                        :active="request()->routeIs('contract')">
                        <span class="sr-only">Contracts</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/contract-gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('contract')">
                        <span class="sr-only">Contracts</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/contract-gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Contracts</div>

                    <!-- Guest -->

                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/guest"
                        :active="request()->routeIs('guest')">

                        <span class="sr-only">Guests</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/guest.png') }}" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('guests')">

                        <span class="sr-only">Utilities</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/utilities-gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Guests</div>

                    <!-- Owners -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/owner"
                        :active="request()->routeIs('owner')">
                        <span class="sr-only">Owners</span>
                        <img class="h-10 w-auto" src="{{ asset('/brands/user_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('owner')">
                        <span class="sr-only">Owners</span>
                        <img class="h-10 w-auto" src="{{ asset('/brands/user_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Owners</div>

                    <!-- Personnels -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/user"
                        :active="request()->routeIs('user')">
                        <span class="sr-only">Personnels</span>

                        <img class="h-13 w-auto" src="{{ asset('/brands/team_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('user')">
                        <span class="sr-only">Personnels</span>

                        <img class="h-13 w-auto" src="{{ asset('/brands/team_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Personnels</div>

                    <!-- Concerns -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/concern"
                        :active="request()->routeIs('concern')">

                        <span class="sr-only">Concerns</span>
                        <img class="h-10 w-auto" src="{{ asset('/brands/concerns_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('concern')">

                        <span class="sr-only">Concerns</span>
                        <img class="h-10 w-auto" src="{{ asset('/brands/concerns_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Concerns</div>


                    <!-- Bills -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/bill"
                        :active="request()->routeIs('bill')">

                        <span class="sr-only">Bills</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/invoice_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('bill')">

                        <span class="sr-only">Bills</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/invoice_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Bills</div>


                    <!-- Collection -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/collection"
                        :active="request()->routeIs('collection')">

                        <span class="sr-only">Collections</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/credit-card.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('collection')">

                        <span class="sr-only">Collections</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/credit-card.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Collections</div>

                    <!-- Account Payable -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/accountpayable"
                        :active="request()->routeIs('accountpayable')">

                        <span class="sr-only">Account <br> Payables </span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/ap_gr.png') }}" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('accountpayable')">

                        <span class="sr-only">Account <br> Payables </span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/ap_gr.png') }}" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Account <br> Payables</div>

                    <!-- Cashflow -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/cashflow"
                        :active="request()->routeIs('cashflow')">

                        <span class="sr-only">Cashflows</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/cashflow_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('cashflow')">

                        <span class="sr-only">Cashflows</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/cashflow_gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Cashflows</div>

                    <!-- Utilities -->
                    @if(Session::get('property'))
                    <x-nav-link href="/property/{{ Session::get('property') }}/utilities"
                        :active="request()->routeIs('utilities')">

                        <span class="sr-only">Utilities</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/utilities-gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @else
                    <x-nav-link href="/property/" :active="request()->routeIs('utilities')">

                        <span class="sr-only">Utilities</span>
                        <img class="h-8 w-auto" src="{{ asset('/brands/utilities-gr.png') }}" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </x-nav-link>
                    @endif

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Utilities</div>




                </div>
            </nav>
            @include('layouts.notifications')
            <main class="flex-1 pb-8 h-screen y-screen overflow-y-scroll">
                {{ $slot }}
                <div class="mb-12">
                    @include('layouts.footer')
                </div>
            </main>
        </div>
    </div>
    @include('layouts.scripts')
</body>

</html>