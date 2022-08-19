<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Portal</title>
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
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
  <html class="h-full bg-white">
  <body class="h-full overflow-hidden font-body>

<div class="flex h-full flex-col">
  <!-- Top nav-->
  <header class="relative flex h-16 flex-shrink-0 items-center bg-white">
    <!-- Logo area -->
    <div class="absolute inset-y-0 left-0 md:static md:flex-shrink-0">
      <a href="#" class="flex h-16 w-16 items-center justify-center bg-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-600 md:w-20">
        <img class="h-15 w-auto" src=brands/full-logo.png>
      </a>
    </div>

    <!-- Picker area -->
    <div class="mx-auto md:hidden">
      <div class="relative">
        <label for="inbox-select" class="sr-only">Choose inbox</label>
        <select id="inbox-select" class="rounded-md border-0 bg-none pl-3 pr-8 text-base font-medium text-gray-900 focus:ring-2 focus:ring-indigo-600">
          <option selected>Open</option>

          <option>Archive</option>

          <option>Customers</option>

          <option>Flagged</option>

          <option>Spam</option>

          <option>Drafts</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center justify-center pr-2">
          <!-- Heroicon name: solid/chevron-down -->
          <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
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
            <p class="font-semibold ml-5">Tenant Portal</p>
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
      </div>
      <div class="ml-10 flex flex-shrink-0 items-center space-x-10 pr-4">
        <nav aria-label="Global" class="flex space-x-10">
          <a href="#" class="text-sm font-medium text-gray-900">Basilio Tenant</a>
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
              <img class="block h-10 w-auto" src="brands/logo.png" alt="Workflow">
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
            <div class="relative text-gray-400 focus-within:text-gray-500">
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

            <a href="#" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Contracts</a>

            <a href="#" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Bills</a>

            <a href="#" class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Payments</a>

            <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-100">Concerns</a>

            
          </div>
          <div class="border-t border-gray-200 pt-4 pb-3">
            <div class="max-w-8xl mx-auto flex items-center px-4 sm:px-6">
              <div class="flex-shrink-0">
                <img class="h-10 w-10 rounded-full" src="brands/avatar.png" alt="">
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
      <div class="relative flex w-20 flex-col space-y-3 p-3">
        <a href="#" class="bg-purple-500 text-white flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
          <span class="sr-only">Dashboard</span>
          <!-- Heroicon name: outline/inbox -->
          <img class="h-10 w-auto" src=brands/dashboard_white.png fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </a>
        <div class="leading-3 ml-0 text-xs text-gray-400 mt-10">Dashboard</div>

        <a href="#" class="text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
          <span class="sr-only">Contracts</span>
          <!-- Heroicon name: outline/archive -->
          <img class="h-13 w-auto" src=brands/units_gr.png fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
        </a>
        <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Contracts</div>

        <a href="#" class="text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
          <span class="sr-only">Bills</span>
          <!-- Heroicon name: outline/user-circle -->
          <img class="h-8 w-auto" src=brands/invoice_gr.png fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </a>
        <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Bills</div>

        <a href="#" class="text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
          <span class="sr-only">Payments</span>
          <!-- Heroicon name: outline/flag -->
          <img class="h-8 w-auto" src=brands/credit-card.png fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
        </a>
        <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Payments</div>

        <a href="#" class="text-gray-400 hover:bg-gray-100 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
          <span class="sr-only">Concerns</span>
          <!-- Heroicon name: outline/ban -->
          <img class="h-12 w-auto" src=brands/concerns_gr.png fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
          </svg>
        </a>
        <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">Concerns</div>

        <a href="#" class="text-gray-400  flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
          <span class="sr-only">Logout</span>
          <!-- Heroicon name: outline/pencil-alt -->
          <img class="h-8 w-auto" src=brands/logout_gr.png fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </a>
        <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">logout</div>
      </div>
    </nav>

    <!-- Main area -->
    <main class="flex-1 pb-8">
    <div class="mt-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="mt-2 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
          <!-- card -->
          <div class="bg-white overflow-hidden shadow rounded-lg">
              <div class="p-5">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    
                    
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                  </div>
                  <div class="ml-5 w-0 flex-1">
                    <dl>
                      <dt class="text-xl font-semibold font-body text-gray-500 truncate">Welcome back, Basilio</dt>
                      <dd>
                        
                        <img class="h-45 w-auto" src=brands/juan.png>
                      </dd>
                    </dl>
                  </div>
                </div>
              </div>
              <div class="px-5 py-3">
                <div class="text-sm">
                  <p class="font-medium text-center"> Update your profile. </p>
                  </div>
                  
              </div>
              <div class="grid grid-cols-3 gap-4 place-content-center ">
              <img class=" ml-8 h-10 w-auto flex " src=brands/contract.png>
              <img class=" ml-8 h-10 w-auto flex " src=brands/contract.png>
              <img class=" ml-8 h-10 w-auto flex " src=brands/contract.png>
              <button class="type= py-2.5 px-5 mr-2 mb-2 text-sm font-light text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Contracts</button> 
              <button class="type= py-2.5 px-5 mr-2 mb-2 text-sm font-light text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Unpaid Bills</button> 
              <button class="type= py-2.5 px-5 mr-2 mb-2 text-sm font-light text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Concerns</button>  
            </div>
            
            </div>


            <!-- card -->
            <div class="bg-white overflow-hidden">
              <div class="p-5">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/scale -->
                    <img class="h-10 w-auto" src=brands/megaphone.png>
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                  </div>
                  <div class="ml-5 w-0 flex-1">
                    
                    <dl>
                      <dt class="text-3xl font-medium text-black-500 truncate">Announcements:</dt>
                      
                      <dd>
                      </dd>
                    </dl>
                  </div>
                </div>
              </div>
              <div class="bg-indigo-50 px-5 py-8 mb-5 rounded-lg">
                <div class="text-sm">
                <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> Your contract will expire in 2 days. </a>
                <div button type="button" class="items-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Renew</button></div>
                </div>
              </div>
              <div class="bg-indigo-50 px-5 py-8 mb-5 rounded-lg">
                <div class="text-sm">
                  <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> You have unpaid bills for unit #2. </a>
                  <div button type="button" class="items-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Pay now</button></div>
                </div>
              </div>
              <div class="bg-indigo-50 px-5 py-8 mb-5 rounded-lg">
                <div class="text-sm">
                  <a href="#" class="font-medium text-cyan-700 hover:text-cyan-900"> You have unpaid bills. </a>
                  <div button type="button" class="items-center px-2.5 py-1.5 border w-20 mt-5 border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Pay now</button></div>
                </div>
              </div>
            </div>
            <!-- card -->
            <div class="bg-white">
              <div class="p-5">
                <div class="flex items-center">
                  <div class="flex-shrink-0">
                    <!-- Heroicon name: outline/scale -->
                    
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                  </div>
                  <div class="ml-0 w-0 flex-1">
                    <dl>
                      <dt class="text-sm font-medium text-gray-500 truncate">Friday, August 19, 2022</dt>
                      <dd>
                        <div class="text-lg font-medium text-gray-900">$30,659.45</div>
                        <h2 class="text-lg leading-3 ml-0 font-medium text-gray-600 mt-10">Today</h2>
                      </dd>
                    </dl>
                  </div>
                </div>
              </div>
              
              <div class="bg-gray-50 px-5 py-3">
                <div class="text-sm">
                <div class="mb-5 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
      <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <!-- Heroicon name: outline/check-circle -->
            <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Successfully paid!</p>
            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for rent.</p>
          </div>
                </div>
              </div>
</div>
<div class="mb-5 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
              <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <!-- Heroicon name: outline/check-circle -->
            <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Successfully paid!</p>
            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for rent.</p>
          </div>
          </div>
</div>
</div>
<div class="mb-5 max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
      <div class="p-4">
        <div class="flex items-start">
          <div class="flex-shrink-0">
            <!-- Heroicon name: outline/check-circle -->
            <svg class="h-6 w-6 text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div class="ml-3 w-0 flex-1 pt-0.5">
            <p class="text-sm font-medium text-gray-900">Successfully paid!</p>
            <p class="mt-1 text-sm text-gray-500">You paid 16,000.00 for rent.</p>
          </div>
                </div>
              </div>
</div>
</div>
</div>

<div button type="button" class=" justify-self-end items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm 
text-white text-center bg-gray-600 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View More</button>
</div>
            
            

            <!-- More items... -->

        </div>

                    
                
                    
                
              
           


              

        </div>
      </aside>
    </main>
  </div>
</div>

</body>
</html>