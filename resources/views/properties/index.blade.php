<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Portfolio</title>
</head>
<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
-->
<html class="h-full w-full bg-no-repeat bg-cover" style="background-image: url('/brands/property_bg.png');">

<body class="font-sans antialiased " body x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">

    <div class="flex h-full flex-col">
        <!-- Top nav-->
        <header class="relative flex h-16 flex-shrink-0 items-center bg-white">
            <!-- Logo area -->
            <div class="absolute inset-y-0 left-0 md:static md:flex-shrink-0">
                <a href="#"
                    class="flex h-16 w-16 items-center justify-center bg-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-600 md:w-20">
                    <img class="h-15 w-auto" src="{{ asset('/brands/full-logo.png') }}">
                </a>
            </div>

            <!-- Picker area -->
            <div class="mx-auto md:hidden">
                <div class="relative">
                    <label for="inbox-select" class="sr-only">Choose inbox</label>
                    <select id="inbox-select"
                        class="rounded-md border-0 bg-none pl-3 pr-8 text-base font-medium text-gray-900 focus:ring-2 focus:ring-indigo-600">
                        <option selected>Open</option>

                        <option>Archive</option>

                        <option>Customers</option>

                        <option>Flagged</option>

                        <option>Spam</option>

                        <option>Drafts</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center justify-center pr-2">
                        <!-- Heroicon name: solid/chevron-down -->
                        <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Menu button area -->
            <div class="absolute inset-y-0 right-0 flex items-center pr-4 sm:pr-6 md:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                    class="-mr-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                    <span class="sr-only">Open main menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Desktop nav area -->
            <div class="hidden md:flex md:min-w-0 md:flex-1 md:items-center md:justify-between">
                <div class="min-w-0 flex-1">
                    <div class="relative max-w-2xl text-gray-400 focus-within:text-gray-500">


                        <div
                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center justify-center pl-4">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="ml-10 flex flex-shrink-0 items-center space-x-5 pr-4">
                    <nav aria-label="Global" class="flex space-x-10">
                        <a href="#" class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</a>
                        <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </nav>


                    <div class="relative inline-block text-left">
                        <button type="button"
                            class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2"
                            id="menu-0-button" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>

                        </button>

                        <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
                        <!-- PROFILE DROPDOWN! -->
                        <div class="absolute right-0 z-30 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
                            <div class="py-1" role="none">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="/user/{{ Auth::user()->username }}/edit"
                                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="menu-0-item-0"> Profile </a>
                                <a href="/user/{{ Auth::user()->username }}/subscriptions"
                                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="menu-0-item-0"> Subscription </a>
                                <a href="/property" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="menu-0-item-0"> Properties </a>
                                <a href="/users" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="menu-0-item-0">
                                    Users </a>
                                <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="menu-0-item-0"> Log Out </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->

            <div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
                <!--
        Off-canvas menu backdrop, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
                <div class="hidden sm:fixed sm:inset-0 sm:block sm:bg-gray-600 sm:bg-opacity-75"></div>

                <div class="fixed inset-0 z-40">
                    <!--
          Mobile menu, toggle classes based on menu state.

          Entering: "transition ease-out duration-150 sm:ease-in-out sm:duration-300"
            From: "transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
            To: "transform opacity-100 scale-100  sm:translate-x-0 sm:scale-100 sm:opacity-100"
          Leaving: "transition ease-in duration-150 sm:ease-in-out sm:duration-300"
            From: "transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
            To: "transform opacity-0 scale-110  sm:translate-x-full sm:scale-100 sm:opacity-100"
        -->
                    <div class="fixed inset-0 z-40 h-full w-full bg-white sm:inset-y-0 sm:left-auto sm:right-0 sm:w-full sm:max-w-sm sm:shadow-lg"
                        aria-label="Global">
                        <div class="flex h-16 items-center justify-between px-4 sm:px-6">
                            <a href="#">
                                <img class="block h-10 w-auto" src="{{ asset('/brands/logo.png') }}" alt="Workflow">
                            </a>
                            <button type="button"
                                class="-mr-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                                <span class="sr-only">Close main menu</span>
                                <!-- Heroicon name: outline/x -->
                                <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div class="max-w-8xl mx-auto mt-2 px-4 sm:px-6">
                            <div class="relative text-gray-400 focus-within:text-gray-500">
                                <label for="mobile-search" class="sr-only">The Property Manager</label>
                                <input id="mobile-search" type="search" placeholder="The Property Manager"
                                    class="block w-full rounded-md border-gray-300 pl-10 placeholder-gray-500 focus:border-indigo-600 focus:ring-indigo-600">
                                <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="max-w-8xl mx-auto py-3 px-2 sm:px-4">
                            <a href="/user/{{ Auth::user()->username }}/edit"
                                class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Profile</a>


                            <a href="/user/{{ Auth::user()->username }}/subscriptions"
                                class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Subscriptions</a>

                            <a href="/property"
                                class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Properties</a>

                            <a href="/users"
                                class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Users</a>

                            <a href="/logout"
                                class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Logout</a>

                        </div>
                        <div class="border-t border-gray-200 pt-4 pb-3">
                            <div class="max-w-8xl mx-auto flex items-center px-4 sm:px-6">
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('/brands/avatar.png') }}" alt="">
                                </div>
                                <div class="ml-3 min-w-0 flex-1">
                                    <div class="truncate text-base font-medium text-gray-800">{{ auth()->user()->name }}
                                    </div>
                                    <div class="truncate text-sm font-medium text-gray-500">{{ auth()->user()->email }}
                                    </div>
                                </div>
                                <a href="#"
                                    class="ml-auto flex-shrink-0 bg-white p-2 text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">View notifications</span>
                                    <!-- Heroicon name: outline/bell -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </a>
                            </div>
                            {{-- <div class="max-w-8xl mx-auto mt-3 space-y-1 px-2 sm:px-4">
                                <a href="#"
                                    class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">Your
                                    Profile</a>

                                <a href="#"
                                    class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">Sign
                                    out</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </header>



        <!-- Main area -->
        <main class="flex-1 pb-8 h-screen y-screen overflow-y-scroll">

            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->

                <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    <h2 class="text-2xl font-bold tracking-tight text-gray-900 font-pop">Welcome back, {{
                        auth()->user()->name }}!</h2>
                    <p class="mt-2 text-sm text-gray-700">Select a property.</p>

                    <div class="mt-1 mb-5 grid grid-cols-5 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        @foreach ($properties as $property)
                        <div class="group relative">
                            <div
                                class="w-full h-32 bg-white rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                <a href="/property/{{ $property->property->uuid }}">
                                    <img src="{{ asset('/brands/property_page.png') }}" alt="building"
                                        class="w-40 object-center object-cover lg:w-full lg:h-full">
                                </a>
                            </div>
                            <h3 class="text-medium text-gray-700 font-semibold text-center">{{
                                $property->property->property }}</h3>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- This example requires Tailwind CSS v2.0+ -->

                <div class="mt-10 px-4 sm:px-6 lg:px-8">
                    @if(!$properties->count())
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No properties</h3>
                        <p class="mt-1 text-sm text-gray-500">Get started by creating a new property.</p>
                        <div class="mt-6">
                            <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                <!-- Heroicon name: solid/plus -->
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                New Property
                            </button>
                        </div>
                    </div>
                    @else
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-xl font-semibold text-gray-900">Portforlio</h1>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            {{-- <button type="button"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export</button>
                            <button type="button"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Edit</button>
                            --}}

                        </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Property</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->property }}
                                                </th>
                                                @endforeach

                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Type</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->type->type }}
                                                </th>
                                                @endforeach

                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    No. of Units</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->units->count() }}
                                                </th>
                                                @endforeach

                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>

                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Occupied</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->units->where('status_id', 2)->count() }}
                                                </th>
                                                @endforeach

                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>

                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Vacant</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->units->where('status_id', 1)->count() }}
                                                </th>
                                                @endforeach

                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>

                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Pending
                                                </td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->units->where('status_id', 6)->count() }}
                                                </th>
                                                @endforeach

                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Occupancy Rate</td>
                                                @foreach ($properties as $property)
                                                {{-- <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->units->where('status_id', 6)->count() }}
                                                </th> --}}
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Total bills for Collection</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ number_format($property->property->bills->sum('bill'), 2) }}
                                                </th>
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Collected Amount</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{
                                                    number_format($property->property->collections->sum('collection'),
                                                    2) }}
                                                </th>
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Collection Efficiency</td>
                                                @foreach ($properties as $property)
                                                {{-- <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ number_format($property->property->bills->whereIn('status',
                                                    ['unpaid', 'partially_paid'])->sum('bill') -
                                                    $property->property->bills->whereIn('status', ['unpaid',
                                                    'partially_paid'])->sum('initial_payment'), 2) }}
                                                </th> --}}
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    Total Unpaid Collection</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ number_format($property->property->bills->whereIn('status',
                                                    ['unpaid', 'partially_paid'])->sum('bill') -
                                                    $property->property->bills->whereIn('status', ['unpaid',
                                                    'partially_paid'])->sum('initial_payment'), 2) }}
                                                </th>
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    No. of past due Accounts</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->bills->whereIn('status', ['unpaid',
                                                    'partially_paid'])->count() }}
                                                </th>
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    No. of Expiring Contracts</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->contracts->where('end','
                                                    <=',Carbon\Carbon::now()->addMonth())->count() }}
                                                </th>
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    No. of Expired Contracts</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{
                                                    $property->property->contracts->where('status','inactive')->count()
                                                    }}
                                                </th>
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    No. of Concerns Received</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{
                                                    $property->property->concerns->where('status','received')->count()
                                                    }}
                                                </th>
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                                    No. of Concerns Closed</td>
                                                @foreach ($properties as $property)
                                                <th scope="col"
                                                    class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                                    {{ $property->property->concerns->where('status','closed')->count()
                                                    }}
                                                </th>
                                                @endforeach
                                            </tr>

                                            <!-- More properties... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Footer -->
                <footer class="">
                    <div
                        class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                        <div class="flex justify-center space-x-6 md:order-2">
                            <a href="https://www.facebook.com/onlinepropertymanager/"
                                class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a href="https://www.instagram.com/thepmoco/" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Instagram</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a href="https://www.thepropertymanager.online/support/"
                                class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Support</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path
                                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                </svg>
                            </a>
                            {{--
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">GitHub</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>

                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Dribbble</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a> --}}
                        </div>
                        <div class="mt-8 md:mt-0 md:order-1">
                            <p class="text-center text-base text-gray-400">&copy; 2020 The PMO Co. All rights reserved.
                            </p>
                        </div>
                    </div>
                </footer>
        </main>
    </div>
    </div>

</body>



</html>