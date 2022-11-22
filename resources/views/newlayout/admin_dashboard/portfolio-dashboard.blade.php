<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>



  <html class="h-full bg-purple-50">
  <body class="h-full overflow-hidden font-body">

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



          <!-- Main area -->
        <main class="flex-1 pb-2 overflow-y-scroll">
        <div class="fixed  h-full w-1/2 bg-indigo-50" aria-hidden="true"></div>
<div class="fixed right-4 h-full w-1/3  sm:bg-purple-200" aria-hidden="true"></div>
<div class="relative flex min-h-screen flex-col">
        
<!--
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
<div class="mt-5 px-4 sm:px-6 lg:px-1">
<div class="mt-1 flex items-end justify-end">

<div class="mt-3 b-5 grid sm:grid-cols-2 gap-x-4 lg:grid-cols-6">

<div class="lg:mt-10 sm:mt-0 lg:-mx-16 sm:ml-10 col-span-2">
<h1 class="lg:text-4xl sm:text-lg font-semibold">Portfolio Dashboard</h1>
</div>

<div class="lg:ml-5 sm:m-0 col-start-3">
      <h1 class="w-42 mr-5 px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">
      
      <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
</svg>


        <a href="" class="text-gray-900">Export to PDF</a>
    </h1>

</div>
<div class="col-start-4">
    <h1 class="mr-10 px-3 py-1 text-sm border rounded-lg border-gray-300 font-semibold bg-white text-purple-600">
    <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
</svg>
        <a href="" class="text-gray-900">Export to Excel</a>
    </h1>
    </div>
</div>
</div>

</div>




      
<div class="">

    <div class="mt-5 ml-auto mr-auto px-12 grid grid-cols-2 gap-y-5 gap-x-6  sm:grid-cols-1 lg:grid-cols-6 lg:gap-x-5">

    <div class="col-span-4">
    

    
   
      
    <div class="mt-12 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">Property</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Units</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Tenants</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Occupied</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Vacant</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Reserved</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Dirty</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Pending</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Maintenance</th>
                
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm text-gray-900 font-semibold">Condominium</th>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm text-gray-900 font-semibold">Condominium</th>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm text-gray-900 font-semibold">Condominium</th>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm text-gray-900 font-semibold">Condominium</th>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm text-gray-900 font-semibold">Condominium</th>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">20</td>
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

      </div>

      <div class="px-4 py-3 flex items-center justify-between  sm:px-6">
  <div class="flex-1 flex justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
  </div>
  <div class="mt-5 hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">1</span>
        of
        <span class="font-medium">3</span>
        pages
      </p>
    </div>
    <div>
      <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Previous</span>
          <!-- Heroicon name: solid/chevron-left -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
        
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Next</span>
          <!-- Heroicon name: solid/chevron-right -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </div>
</div>
     

    </div>

    

    
    
    <div class="lg:-my-20 sm:my-2 lg:mx-6 sm:mx-0 w-full col-span-2">

<div class="bg-white pb-5 sm:items-center lg:h-60 sm:h-48 md:h-80  overflow-hidden rounded-lg shadow-md rounded-5xl">
    <div class="flex  justify-center items-center  py-5">

                    <div class="col-span-1">
                    <div class="flex justify-end ">
                                <div class="underline text-xs text-gray-500"><a href="portfolio-dashboard">Occupancy Rate: 32%</a></div>
</div>

                        <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-10 h-10">
<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
</svg>
                            <div class="text-xl font-bold text-gray-800 ml-2 mr-2"><span class="font-bold text-purple-900">11</span> Properties</div>
</div>
                           
                        
                        
                        <div class="mt-3 bg-gray-100 h-20 w-full rounded-lg mx-3  justify-center items-center grid grid-cols-3 gap-x-10 sm:grid-cols-3 lg:grid-cols-3 lg:gap-x-10"> 

<div class="col-span-1 mt-2 -mr-5 border-r border-gray-300">
<div class="">
                   <div class="flex ">
                   <div class="flex-shrink-0">
                   <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 53 53" style="enable-background:new 0 0 53 53" xml:space="preserve"><path d="M27 29h3v2h-3z"/><path d="M45 51V1a.999.999 0 0 0-.071-.351c-.008-.02-.013-.04-.022-.06a1.01 1.01 0 0 0-.185-.274l-.049-.046c-.029-.026-.054-.056-.085-.079A.991.991 0 0 0 44.4.085l-.014-.008a.991.991 0 0 0-.349-.07C44.024.007 44.013 0 44 0H10a1 1 0 0 0-1 1v50H4v2h45v-2h-4zm-20-3.82V8.227l18-5.85V50.78l-18-3.6zM11 2h26.687L23.69 6.549A1 1 0 0 0 23 7.5V48a1 1 0 0 0 .804.98L33.901 51H11V2z"/></svg>
                  </div>
                      <div class="w-0 flex-1 -pt-2">
                        
                        <p class="ml-2 text-lg font-semibold text-gray-900">2</p>
                        
                      </div>
                      
                  </div>
                  <p class="ml-2 mt-2 text-center text-md font-regular text-indigo-700">Vacant</p>
                </div>


                
                        </div>
                        



                        <div class="col-span-1 mt-2 -mr-5 border-r border-gray-300">
<div class="">
                   <div class="flex ">
                   <div class="flex-shrink-0">
                   <svg class="h-6 w-6"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" style="enable-background:new 0 0 52 52" xml:space="preserve"><path d="M16.5 28h7v2h-7z"/><path d="M44.5 50V1a1 1 0 0 0-1-1h-34a1 1 0 0 0-1 1v49h-5v2h45v-2h-4zm-31 0V5h26v45h-26zm28 0V4a1 1 0 0 0-1-1h-28a1 1 0 0 0-1 1v46h-1V2h32v48h-1z"/></svg>
                  </div>
                      <div class="w-0 flex-1 -pt-2">
                        
                        <p class="ml-2 text-lg font-semibold text-gray-900">2</p>
                        
                      </div>
                      
                  </div>
                  <p class="ml-1 mt-2 text-md font-regular text-indigo-700">Occupied</p>
                </div>


                
                        </div>


                    <div class="col-span-1 mt-2 ">
                    <div class="">
                   <div class="flex ">
                   <div class="flex-shrink-0">
                   <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 433.521 433.521" style="enable-background:new 0 0 433.521 433.521" xml:space="preserve"><path d="M269.568 250.041a7 7 0 1 1 0 14H209.34a7 7 0 1 1 0-14h60.228zm38.856-24.547a7 7 0 0 0-7-7H209.34a7 7 0 1 0 0 14h92.084a7 7 0 0 0 7-7zM157.206 65.186V34.173a7 7 0 0 1 7-7l25.395-.015C189.601 12.184 201.784 0 216.76 0c14.977 0 27.161 12.184 27.161 27.158v.015h25.393a7 7 0 0 1 7 7v31.013a7 7 0 0 1-7 7H164.206a7 7 0 0 1-7-7zm14-7h91.107V41.173H236.92a7 7 0 0 1-7-7v-7.015c0-7.256-5.903-13.158-13.159-13.158-7.257 0-13.161 5.902-13.161 13.158v7.015a7 7 0 0 1-7 7h-25.395v17.013zm212.387-7.181v365.651c0 9.3-7.565 16.865-16.865 16.865H66.793c-9.299 0-16.864-7.565-16.864-16.865V51.005c0-9.3 7.565-16.865 16.864-16.865h67.815a7 7 0 1 1 0 14H95.517v337.661h242.487V48.14h-39.092a7 7 0 1 1 0-14h67.815c9.3 0 16.866 7.565 16.866 16.865zm-14 0c0-1.553-1.313-2.865-2.865-2.865h-14.724v344.661a7 7 0 0 1-7 7H88.517a7 7 0 0 1-7-7V48.14H66.793c-1.553 0-2.864 1.313-2.864 2.865v365.651c0 1.553 1.312 2.865 2.864 2.865h299.935c1.553 0 2.865-1.313 2.865-2.865V51.005zm-240.899 77.317a7 7 0 0 0-2.717 9.52l12.862 23.137a7 7 0 0 0 12.236 0l22.422-40.331a7 7 0 1 0-12.237-6.803l-16.304 29.326-6.744-12.132a6.997 6.997 0 0 0-9.518-2.717zm42.087 86.662a7.001 7.001 0 0 0-9.52 2.717l-16.304 29.325-6.744-12.132a6.998 6.998 0 0 0-9.52-2.717 7 7 0 0 0-2.717 9.52l12.862 23.137a7 7 0 0 0 12.236 0l22.422-40.33a6.998 6.998 0 0 0-2.715-9.52zm38.559-54.799h60.229a7 7 0 1 0 0-14H209.34a7 7 0 1 0 0 14zm92.084-45.547H209.34a7 7 0 1 0 0 14h92.084a7 7 0 1 0 0-14z"/></svg>
                  </div>
                      <div class="w-0 flex-1 -pt-2">
                        
                        <p class="ml-2 text-lg font-semibold text-gray-900">2</p>
                        
                      </div>
                      
                  </div>
                  <p class="ml-1 mt-2 text-md font-regular text-indigo-700">Unlisted</p>
                </div>


                
                        </div>


</div>
                    
  </div>
  </div>

  <div class="mx-2 justify-center items-center grid grid-cols-2 gap-x-10 sm:grid-cols-2 lg:grid-cols-2 lg:gap-x-2">
<div class="col-span-1">
<div class="h-10 w-full overflow-hidden">
<div class="flex justify-center items-center ">
                <div class="mt-0">
                    <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
</svg>
                        <span class="font-semibold text-gray-800 text-lg mx-1">2</span>
                        <div class="text-md font-medium text-purple-600">Units</div>
                        
                    </div>
                   
                </div>
                
            </div>

                    </div>
                    
                    
                </div>
                <div class="col-span-1">
<div class="h-10 w-full overflow-hidden">
<div class="flex justify-center items-center ">
                <div class="">
                    <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-6 h-6">
<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
</svg>

                        <span class="font-semibold text-gray-800 text-lg mx-1">2</span>
                        <div class="text-md font-medium text-purple-600">Tenants</div>
                        
                    </div>
                   
                </div>
                
            </div>

                    </div>
                </div>
  

  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  



  <div x-data="app()" x-cloak class="">
    <div class="sm:w-full py-10">
      <div class="shadow p-6 rounded-lg bg-white">
        <div class="md:flex md:justify-between md:items-center">
          <div>
            <h2 class="text-xl text-gray-800 font-bold leading-tight">Occupancy Rate</h2>
            <p class="mb-2 text-gray-600 text-sm">Monthly Percentage</p>
          </div>

          <!-- Legends -->
          <div class="mb-4">
            <div class="flex items-center">
              <div class="w-2 h-2 bg-purple-200 mr-2 rounded-full"></div>
              <div class="text-sm text-gray-700">%</div>
            </div>
          </div>
        </div>


        <div class="line my-8 relative">
          <!-- Tooltip -->
          <template x-if="tooltipOpen == true">
            <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                 :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`"
                 >
              <div class="shadow-xs rounded-lg bg-white p-2">
                <div class="flex items-center justify-between text-sm">
                  <div>Rate:</div>
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
                     @mouseleave="hideTooltip($event)"
                     >
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                </div>
              </div>

            </template>
          </div>

          <!-- Labels -->
          <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
          <div class="flex -mx-2 items-end">
            <template x-for="data in labels">
              <div class="px-2 w-1/6">
                <div class="bg-red-600 relative">
                  <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
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
        chartData: [50, 10, 80, 42, 33, 16, 72, 80, 30, 55, 20],
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11'],

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


<div class="lg:my-4 sm:my-10 col-span-4">
     <h1 class="text-2xl font-semibold">Bills</h1>
    <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">Property</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">For Collection</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Collected</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Uncollected</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Past Due Accounts</th>
      
                
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>

           
           
            
            
           
          </table>
        </div>

        
      </div>
    </div>
  </div>

  <div class="px-4 py-3 flex items-center justify-between  sm:px-6">
  <div class="flex-1 flex justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
  </div>
  <div class="mt-5 hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">1</span>
        of
        <span class="font-medium">3</span>
        pages
      </p>
    </div>
    <div>
      <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Previous</span>
          <!-- Heroicon name: solid/chevron-left -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
        
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Next</span>
          <!-- Heroicon name: solid/chevron-right -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </div>
</div>
     

  </div>

<div class="lg:ml-5 col-span-2">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  



  <div x-data="app()" x-cloak class="">
    <div class="sm:w-full py-10">
      <div class="shadow p-6 rounded-lg bg-white">
        <div class="md:flex md:justify-between md:items-center">
          <div>
            <h2 class="text-xl text-gray-800 font-bold leading-tight">Collection Rate</h2>
            <p class="mb-2 text-gray-600 text-sm">Monthly Percentage</p>
          </div>

          <!-- Legends -->
          <div class="mb-4">
            <div class="flex items-center">
              <div class="w-2 h-2 bg-indigo-200 mr-2 rounded-full"></div>
              <div class="text-sm text-gray-700">%</div>
            </div>
          </div>
        </div>


        <div class="line my-8 relative">
          <!-- Tooltip -->
          <template x-if="tooltipOpen == true">
            <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                 :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`"
                 >
              <div class="shadow-xs rounded-lg bg-white p-2">
                <div class="flex items-center justify-between text-sm">
                  <div>Rate:</div>
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
                     class="transition ease-in duration-200 bg-indigo-200 hover:bg-indigo-400 relative"
                     @mouseenter="showTooltip($event); tooltipOpen = true" 
                     @mouseleave="hideTooltip($event)"
                     >
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                </div>
              </div>

            </template>
          </div>

          <!-- Labels -->
          <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
          <div class="flex -mx-2 items-end">
            <template x-for="data in labels">
              <div class="px-2 w-1/6">
                <div class="bg-red-600 relative">
                  <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
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
        chartData: [50, 10, 80, 42, 33, 16, 72, 80, 30, 55, 20],
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11'],

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


  <div class="sm:my-10 col-span-4">
     <h1 class="text-2xl font-semibold">Concerns</h1>
    <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">Property</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Received</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Pending</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Closed</th>
                
      
                
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>

           
           
            
            
           
          </table>
        </div>

        
      </div>
    </div>
  </div>
  <div class="px-4 py-3 flex items-center justify-between  sm:px-6">
  <div class="flex-1 flex justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
  </div>
  <div class="mt-5 hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">1</span>
        of
        <span class="font-medium">3</span>
        pages
      </p>
    </div>
    <div>
      <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Previous</span>
          <!-- Heroicon name: solid/chevron-left -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
        
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Next</span>
          <!-- Heroicon name: solid/chevron-right -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </div>
</div>
  </div>

  <div class="lg:ml-5 lg:my-10 col-span-2">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  



  <div x-data="app()" x-cloak class="">
    <div class="sm:w-full py-10">
      <div class="shadow p-6 rounded-lg bg-white">
        <div class="md:flex md:justify-between md:items-center">
          <div>
            <h2 class="text-xl text-gray-800 font-bold leading-tight">Concerns</h2>
            <p class="mb-2 text-gray-600 text-sm">Monthly Concerns Received</p>
          </div>

          <!-- Legends -->
          <div class="mb-4">
            <div class="flex items-center">
              <div class="w-2 h-2 bg-gray-200 mr-2 rounded-full"></div>
              <div class="text-sm text-gray-700">#</div>
            </div>
          </div>
        </div>


        <div class="line my-8 relative">
          <!-- Tooltip -->
          <template x-if="tooltipOpen == true">
            <div x-ref="tooltipContainer" class="p-0 m-0 z-10 shadow-lg rounded-lg absolute h-auto block"
                 :style="`bottom: ${tooltipY}px; left: ${tooltipX}px`"
                 >
              <div class="shadow-xs rounded-lg bg-white p-2">
                <div class="flex items-center justify-between text-sm">
                  <div>Count:</div>
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
                     class="transition ease-in duration-200 bg-gray-200 hover:bg-gray-400 relative"
                     @mouseenter="showTooltip($event); tooltipOpen = true" 
                     @mouseleave="hideTooltip($event)"
                     >
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 -mt-6 text-gray-800 text-sm"></div>
                </div>
              </div>

            </template>
          </div>

          <!-- Labels -->
          <div class="border-t border-gray-400 mx-auto" :style="`height: 1px; width: ${ 100 - 1/chartData.length*100 + 3}%`"></div>
          <div class="flex -mx-2 items-end">
            <template x-for="data in labels">
              <div class="px-2 w-1/6">
                <div class="bg-red-600 relative">
                  <div class="text-center absolute top-0 left-0 right-0 h-2 -mt-px bg-gray-400 mx-auto" style="width: 1px"></div>
                  <div x-text="data" class="text-center absolute top-0 left-0 right-0 mt-3 text-gray-700 text-sm"></div>
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
        chartData: [50, 10, 80, 42, 33, 16, 72, 80, 30, 55, 20],
        labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11'],

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
  



    

   

    <div class="lg:-my-10 sm:my-10 col-span-4">
     <h1 class="text-2xl font-semibold">Contracts</h1>
    <div class="mt-8 flex flex-col">
    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
          <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">Property</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Received</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Pending</th>
                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Closed</th>
                
      
                
                </th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
              <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>
            <tbody class="divide-y divide-gray-200 bg-white">
            <tr>
                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">Property Name</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 font-bold">Number</td>
                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500 ">Number</td>
                
                
                
                
              </tr>

              <!-- More properties... -->
            </tbody>

           
           
            
            
           
          </table>
        </div>
      </div>
  </div>
      </div>

      <div class="px-4 py-3 flex items-center justify-between  sm:px-6">
  <div class="flex-1 flex justify-between sm:hidden">
    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
    <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
  </div>
  <div class="mt-5 hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
    <div>
      <p class="text-sm text-gray-700">
        Showing
        <span class="font-medium">1</span>
        of
        <span class="font-medium">3</span>
        pages
      </p>
    </div>
    <div>
      <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Previous</span>
          <!-- Heroicon name: solid/chevron-left -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
        <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
        
        <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
          <span class="sr-only">Next</span>
          <!-- Heroicon name: solid/chevron-right -->
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </nav>
    </div>
  </div>
</div>
     

  </div>

    </div>
    

</div>
<div>
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