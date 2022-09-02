<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Units</title>
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

  <html class="h-full bg-gray-50">
  <body class="h-full overflow-hidden font-pop">

<div class="flex h-full flex-col">

    <!-- Top nav-->
  <header class="relative flex h-16 flex-shrink-0 items-center bg-white">
    
    <!-- Logo area -->
        <div class="absolute inset-y-0 left-0 md:static md:flex-shrink-0">
          <a href="#" class="flex h-16 w-16 items-center justify-center bg-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-600 md:w-20">
            <img class="h-15 w-auto"  src="{{ asset('/brands/full-logo.png') }}">
          </a>
        </div>

    <!-- Picker area -->
        <div class="mx-auto md:hidden">
          <div class="relative">
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center justify-center pr-2">
            </div>
          </div>
        </div>

    <!-- Menu button area -->
        <div class="absolute inset-y-0 right-0 flex items-center pr-4 sm:pr-6 md:hidden">
    <!-- Mobile menu button -->
          <button type="button" class="-mr-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600">
            <span class="sr-only">Open main menu</span>
        <!-- Heroicon name: outline/menu -->
              <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                 <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
          </button>
        </div>

    <!-- Desktop nav area -->
        <div class="hidden md:flex md:min-w-0 md:flex-1 md:items-center md:justify-between">
          <div class="min-w-0 flex-1">
            <div class="relative max-w-2xl text-gray-400 focus-within:text-gray-500">
              <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center justify-center pl-4">
                <p class="font-semibold ml-5">Property Management</p>
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
              </div>
            </div>
          </div>

          <div class="ml-10 flex flex-shrink-0 items-center space-x-10 pr-4">
              <nav aria-label="Global" class="flex space-x-10">
                <a href="#" class="text-sm font-medium text-gray-900">Juan Dela Cruz</a>
                <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
              </nav>

            <div class="relative inline-block text-left">
              <button type="button" class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" id="menu-0-button" aria-expanded="false" aria-haspopup="true">
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
           <!-- PROFILE DROPDOWN! <div class="absolute right-0 z-30 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
              <div class="py-1" role="none"> -->
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-0"> Your Profile </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
-->
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
        <div class="fixed inset-0 z-40 h-full w-full bg-white sm:inset-y-0 sm:left-auto sm:right-0 sm:w-full sm:max-w-sm sm:shadow-lg" aria-label="Global">
          <div class="flex h-16 items-center justify-between px-4 sm:px-6">
            <a href="#">
              <img class="block h-10 w-auto"  src="{{ asset('/brands/logo.png') }}" alt="Workflow">
            </a>
                <button type="button" class="-mr-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-600">
                  <span class="sr-only">Close main menu</span>
              <!-- Heroicon name: outline/x -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
          </div>

        <div class="max-w-8xl mx-auto mt-2 px-4 sm:px-6">
          <div class="elative text-gray-400 focus-within:text-gray-500">
              <label for="mobile-search" class="sr-only">The Property Manager</label>
                <input id="mobile-search" type="search" placeholder="The Property Manager" class="block w-full rounded-md border-gray-300 pl-10 placeholder-gray-500 focus:border-indigo-600 focus:ring-indigo-600">
            <div class="absolute inset-y-0 left-0 flex items-center justify-center pl-3">
                <!-- Heroicon name: solid/search -->
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div>

        <div class="max-w-8xl mx-auto py-3 px-2 sm:px-4">
            <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-100">Dashboard</a>

            <a href="#" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Units</a>

            <a href="#" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Owners</a>

            <a href="#" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Teams</a>

            <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-100">Concerns</a>
        </div>

        <div class="border-t border-gray-200 pt-4 pb-3">
          <div class="max-w-8xl mx-auto flex items-center px-4 sm:px-6">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full"  src="{{ asset('/brands/avatar.png') }}" alt="">
            </div>
              <div class="ml-3 min-w-0 flex-1">
                <div class="truncate text-base font-medium text-gray-800">Basilio</div>
                  <div class="truncate text-sm font-medium text-gray-500">basilio_tenant@gmail.com</div>
              </div>

                  <a href="#" class="ml-auto flex-shrink-0 bg-white p-2 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">View notifications</span>
                <!-- Heroicon name: outline/bell -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                      </svg>
                  </a>
            </div>

            <div class="max-w-8xl mx-auto mt-3 space-y-1 px-2 sm:px-4">
              <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">Your Profile</a>
              <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">Sign out</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Bottom section -->
          <div class="flex min-h-0 flex-1 overflow-hidden">
    <!-- Narrow sidebar-->
    <nav aria-label="Sidebar" class="hidden md:block md:flex-shrink-0 md:overflow-y-auto md:bg-white ">
              <div class="relative flex w-20 flex-col space-y-1 p-3">

                <!-- Dashboard -->
                <a href="" class="ml-3 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-8 w-8 rounded-lg">
                  <span class="sr-only">Dashboard</span>
          
                  <img class="h-8 w-auto"  src="{{ asset('/brands/dashboard_gr.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </a>
                    <div class="leading-3 ml-0 text-xs text-gray-400 mt-10">Dashboard</div>

                <!-- Units -->
                <a href="#" class="ml-2 bg-purple-500 text-white flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg">
                  <span class="sr-only">Units</span>
                    <img class="h-10 w-auto"  src="{{ asset('/brands/units_white.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                 </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Units</div>
                
                <!-- Owners -->
                <a href="#" class="ml-2 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg">
                  <span class="sr-only">Owners</span>
                    <img class="h-10 w-auto"  src="{{ asset('/brands/user_gr.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Owners</div>

              
                    <!-- Tenant -->
                <a href="#" class="ml-2 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg">
                  <span class="sr-only">Concerns</span>
                    <img class="h-8 w-auto" src="{{ asset('/brands/tenant_gr.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Tenant</div>

                    <!-- Concerns -->
                <a href="#" class="ml-2 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg">
                  <span class="sr-only">Concerns</span>
                    <img class="h-10 w-auto" src="{{ asset('/brands/concerns_gr.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Concerns</div>

                    <!-- Bills -->
                <a href="#" class="ml-2 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg">
                  <span class="sr-only">Concerns</span>
                    <img class="h-8 w-auto" src="{{ asset('/brands/invoice_gr.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Bills</div>

                    <!-- Payments -->
                    <a href="#" class="ml-2 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg">
                  <span class="sr-only">Concerns</span>
                    <img class="h-8 w-auto" src="{{ asset('/brands/credit-card.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Payments</div>

                    <!-- Cashflow -->
                <a href="#" class="ml-2 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg">
                  <span class="sr-only">Concerns</span>
                    <img class="h-8 w-auto" src="{{ asset('/brands/cashflow_gr.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Cashflow</div>
                    <!-- Employees -->
                <a href="#" class=" ml-2 text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-lg">
                  <span class="sr-only">Teams</span>
                    <img class="h-10 w-auto"  src="{{ asset('/brands/team_gr.png') }}" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Employees</div>

                <!-- Log out -->
                <a href="#" class="text-gray-400  flex-shrink-0 inline-flex items-center h-5 justify-center  rounded-lg">
                  <span class="sr-only">Logout</span>
                </a>
                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">logout</div>
              </div>
            </nav>


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
      require('@tailwindcss/typography'),
    ],
  }
  ```
-->

  <div class="pt-6 sm:pb-5">

    <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <ol role="list" class="flex items-center space-x-4">
        <li>
          <div class="flex items-center">
          <img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}">
          </div>
        </li>
      </ol>
    </nav>

    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
      <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
        <div class="lg:col-start-5 lg:col-span-9">
        
          <div class="flex justify-between">
          <h1 class="text-3xl font-bold text-gray-900">Unit #1</h1>
            <a href="#" class="flex text-right text-sm font-medium text-purple-500 hover:text-purple-700">Edit</a>
          </div>
          
        </div>

        <!-- Image gallery -->
        <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-4 lg:row-start-1 lg:row-span-3">
          <h2 class="sr-only">Images</h2>

          <div class="grid grid-cols-1 lg:gap-8">
          <img src="{{ asset('/brands/door_detail.png') }}" alt="door" class="lg:col-span-2 md:row-span-2 rounded-md">
          <div class="flex items-center justify-center ml-5">
          <a href="#" class="relative inline-flex items-center px-4 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Upload Picture </a>
      </div>
          
          </div>
        </div>

        <div class="mt-8 lg:col-span-9">
          <form>
            

            <!-- Links -->
            <div class="mt-2">

              <fieldset class="mt-2">
                <div class="grid grid-cols-5 gap-2 sm:grid-cols-5">
                  <!--
                    In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                    Active: "ring-2 ring-offset-2 ring-indigo-500"
                    Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
                  -->
                  <label class="border rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium  sm:flex-1 cursor-pointer focus:outline-none">
                    <input type="radio" name="size-choice" value="XXS" class="sr-only" aria-labelledby="size-choice-0-label">
                    <a href="newunits_detail">Unit</a>
                  </label>

                  <!--
                    In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                    Active: "ring-2 ring-offset-2 ring-indigo-500"
                    Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
                  -->
                  <label class="bg-white border border-purple-900 rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium  sm:flex-1 cursor-pointer focus:outline-none">
                    <input type="radio" name="size-choice" value="XS" class="sr-only" aria-labelledby="size-choice-1-label">
                    <a href="newunits_rent">Rent</a>
                  </label>

                  <!--
                    In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                    Active: "ring-2 ring-offset-2 ring-indigo-500"
                    Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
                  -->
                  <label class="border rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium  sm:flex-1 cursor-pointer focus:outline-none">
                    <input type="radio" name="size-choice" value="S" class="sr-only" aria-labelledby="size-choice-2-label">
                    <a href="newunits_owner">Owner/Tenant</a>
                  </label>

                  <!--
                    In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                    Active: "ring-2 ring-offset-2 ring-indigo-500"
                    Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
                  -->
                  <label class="border rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium  sm:flex-1 cursor-pointer focus:outline-none">
                    <input type="radio" name="size-choice" value="M" class="sr-only" aria-labelledby="size-choice-3-label">
                    <a href="newunits_rooms">Rooms</a>
                  </label>

                  <!--
                    In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                    Active: "ring-2 ring-offset-2 ring-indigo-500"
                    Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
                  -->
                  <label class="border rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium  sm:flex-1 cursor-pointer focus:outline-none">
                    <input type="radio" name="size-choice" value="L" class="sr-only" aria-labelledby="size-choice-4-label">
                    <a href="newunits_furniture">Furniture</a>
                  </label>

                  <!--
                    In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                    Active: "ring-2 ring-offset-2 ring-indigo-500"
                    Checked: "bg-indigo-600 border-transparent text-white hover:bg-indigo-700", Not Checked: "bg-white border-gray-200 text-gray-900 hover:bg-gray-50"
                  -->

              </fieldset>
            </div>

            <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6 mt-9">

            <div class="sm:col-span-3">
              <div class="relative bg-white border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="name" class="block text-xs font-medium text-gray-900">Contract</label>
                  <input type="text" name="name" id="name" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="">
                </div>
                </div>

                <div class="sm:col-span-3">
              <div class="relative bg-white border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="job-title" class="block text-xs font-medium text-gray-900">Rent/Month</label>
                  <input type="text" name="job-title" id="job-title" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="">
              </div>
              </div>

              <div class="sm:col-span-3">
              <div class="relative bg-white border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="job-title" class="block text-xs font-medium text-gray-900">Date of Turnover</label>
                  <input type="text" name="job-title" id="job-title" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="">
              </div>
              </div>

              <div class="sm:col-span-3">
              <div class="relative bg-white border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="job-title" class="block text-xs font-medium text-gray-900">Status</label>
                  <input type="text" name="job-title" id="job-title" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="">
              </div>
              </div> 
            </div>

            <a href="#" class="mt-5 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Bills History</a>

            <div class="mt-5 flex justify-end">
            <button type="button" class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Update</button>
            </div>  
          </div>

              
          
          
          </form>
</div>
</div>
</div>





      
 



      <!-- Footer -->
<footer class="">
  <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
    <div class="flex justify-center space-x-6 md:order-2">
      <a href="#" class="text-gray-400 hover:text-gray-500">
        <span class="sr-only">Facebook</span>
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
        </svg>
      </a>

      <a href="#" class="text-gray-400 hover:text-gray-500">
        <span class="sr-only">Instagram</span>
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
        </svg>
      </a>

      <a href="#" class="text-gray-400 hover:text-gray-500">
        <span class="sr-only">Twitter</span>
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
        </svg>
      </a>

      <a href="#" class="text-gray-400 hover:text-gray-500">
        <span class="sr-only">GitHub</span>
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
        </svg>
      </a>

      <a href="#" class="text-gray-400 hover:text-gray-500">
        <span class="sr-only">Dribbble</span>
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>
    <div class="mt-8 md:mt-0 md:order-1">
      <p class="text-center text-base text-gray-400">&copy; 2020 The PMO Co. All rights reserved.</p>
    </div>
  </div>
</footer>
    </main>
  </div>
</div>

</body>



</html>