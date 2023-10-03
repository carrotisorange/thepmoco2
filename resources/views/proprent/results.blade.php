<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>PropRent</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Quicksand';
    background-color: #F0E3E1;
}

.purple{
  background-color: #765283;
}

.yellow{
  background-color: #E5CF56;
}

#brown{
  background-color: #D18D6B;
}

#green{
  background-color: #92AB7D;
}

#white{
  background-color: #F0E3E1;
}
</style>
  <html>
  <body>




<!-- component -->
<style>


  /* Custom style */
  .header-right {
      width: calc(100% - 3.5rem);
  }
  .sidebar:hover {
      width: 16rem;
  }
  @media only screen and (min-width: 768px) {
      .header-right {
          width: calc(100% - 16rem);
      }
  }
</style>
<div x-data="setup()" :class="{ 'dark': isDark }">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">

      <!-- Header -->
      <div class="fixed w-full flex items-center justify-between h-14 text-white z-10">
        <div class="flex items-center justify-start md:justify-center md:w-64 h-14 bg-white dark:bg-gray-800 border-none">
          <img class="h-4 sm:h-10 md:h-8 lg:h-8  rounded-md overflow-hidden" src="{{ asset('/brands/proprent/proprent-logo.png') }}" alt="proprent logo">
        </div>
        <div class="flex justify-between items-center h-14 bg-white dark:bg-gray-800 header-right">
          <div class="bg-white rounded flex items-center w-full mr-4 p-2 mx-8 shadow-sm border border-gray-200">
            <button class="outline-none focus:outline-none">
              <svg class="w-5 text-gray-600 h-5 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </button>
            <input type="search" name="" id="" placeholder="Search" class="w-full pl-3 text-sm text-black outline-none focus:outline-none bg-transparent" />
          </div>
          <ul class="flex items-center">


            <li>
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

              <div x-data="{ open: false }" class="flex justify-center items-center">
                  <div @click="open = !open" class="relative border-b-4 border-transparent py-3" :class="{' transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                    <div class="flex justify-center items-center space-x-2 cursor-pointer">
                      <div class="w-7 h-7 rounded-full overflow-hidden ">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>

                        <div class="font-medium text-gray-800 text-sm">
                            <div class="cursor-pointer">FirstName</div>
                        </div>
                        <div class="px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-900">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>

                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 dark:bg-gray-800 bg-white rounded-lg shadow border dark:border-transparent mt-5">
                      <ul class="space-y-3 dark:text-white">
                        <li class="font-medium">
                          <a href="/proprent/profile" class="text-sm text-gray-900 flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                            <div class="mr-3">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            Profile
                          </a>
                        </li>
                        <li class="font-medium">
                          <a href="/proprent/all-listings" class="text-sm text-gray-900 flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                            <div class="mr-3">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            Listings
                          </a>
                        </li>
                        <hr class="dark:border-gray-700">
                        <li class="font-medium">
                          <a href="#" class="text-sm text-gray-900 flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                            <div class="mr-3 text-red-600">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            </div>
                            Logout
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
              </div>

            </li>
          </ul>
        </div>
      </div>
      <!-- ./Header -->

      <!-- Sidebar -->
      <div id="" class="h-full pb-10 fixed flex flex-col top-14 left-0 w-14 hover:w-64 md:w-64 bg-white dark:bg-gray-900  text-white transition-all duration-300 border-none z-10 sidebar">
        <div class="px-6 overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="hidden md:block">
              <div class="flex flex-row h-8">
                <div class="text-gray-800 text-sm font-bold py-1">Rental Rates</div>
              </div>
            </li>

            <li>
              <div class="items-center justify-between mb-4 block md:hidden">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
                  </svg>
                    <p class=" text-gray-900">Filters</p>
              </div>


            </li>




            <li>
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
            <style>
              input[type=range]::-webkit-slider-thumb {
              pointer-events: all;
              width: 16px;
              height: 24px;
              -webkit-appearance: none;
              /* @apply w-6 h-6 appearance-none pointer-events-auto; */
              }
            </style>
            <div class="py-3 flex justify-center items-center">
              <div x-data="range()" x-init="mintrigger(); maxtrigger()" class="relative max-w-xl w-full">
                <div>
                  <input type="range"
                        step="100"
                        x-bind:min="min" x-bind:max="max"
                        x-on:input="mintrigger"
                        x-model="minprice"
                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                  <input type="range"
                        step="100"
                        x-bind:min="min" x-bind:max="max"
                        x-on:input="maxtrigger"
                        x-model="maxprice"
                        class="absolute pointer-events-none appearance-none z-20 h-2 w-full opacity-0 cursor-pointer">

                  <div class="relative z-10 h-2">

                    <div class="absolute z-10 left-0 right-0 bottom-0 top-0 rounded-md bg-gray-200"></div>

                    <div class="purple absolute z-20 top-0 bottom-0 rounded-md " x-bind:style="'right:'+maxthumb+'%; left:'+minthumb+'%'"></div>

                    <div class="purple absolute z-30 w-6 h-6 top-0 left-0  rounded-full -mt-2 -ml-1" x-bind:style="'left: '+minthumb+'%'"></div>

                    <div class="purple absolute z-30 w-6 h-6 top-0 right-0  rounded-full -mt-2 -mr-3" x-bind:style="'right: '+maxthumb+'%'"></div>

                  </div>

                </div>

                <div class="flex justify-between items-center py-5">
                  <div>
                    <input type="text" maxlength="5" x-on:input="mintrigger" x-model="minprice" class="text-xs text-gray-900 px-1 py-1 border border-gray-200 rounded w-24 text-center">
                  </div>
                  <div>
                    <input type="text" maxlength="5" x-on:input="maxtrigger" x-model="maxprice" class="text-xs text-gray-900 px-1 py-1 border border-gray-200 rounded w-24 text-center">
                  </div>
                </div>

              </div>

              <script>
                  function range() {
                      return {
                        minprice: 1000,
                        maxprice: 7000,
                        min: 100,
                        max: 10000,
                        minthumb: 0,
                        maxthumb: 0,

                        mintrigger() {
                          this.minprice = Math.min(this.minprice, this.maxprice - 500);
                          this.minthumb = ((this.minprice - this.min) / (this.max - this.min)) * 100;
                        },

                        maxtrigger() {
                          this.maxprice = Math.max(this.maxprice, this.minprice + 500);
                          this.maxthumb = 100 - (((this.maxprice - this.min) / (this.max - this.min)) * 100);
                        },
                      }
                  }
              </script>
            </div>

            </li>

            <li class="text-gray-800 text-sm font-bold py-1">Property Type</li>

            <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="accent-yellow-500 w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apartment</label>
              </div>
            </li>

            <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dorm</label>
              </div>
            </li>

             <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Guesthouse</label>
              </div>
            </li>

             <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Hotel</label>
              </div>
            </li>

            <li class="text-gray-800 text-sm font-bold py-1">Amenities</li>

            <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="accent-yellow-500 w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Wifi</label>
              </div>
            </li>

            <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Air Conditioning</label>
              </div>
            </li>

             <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kitchen</label>
              </div>
            </li>

             <li class="text-gray-800 text-sm font-bold py-1">Facilities</li>

            <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="accent-yellow-500 w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Parking</label>
              </div>
            </li>

            <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pet Friendly</label>
              </div>
            </li>

             <li>
              <div class="flex items-center mb-4">
                <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-yellow-400 bg-gray-100 border-gray-300 rounded focus:ring-yellow--500 dark:focus:ring-yellow-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pool</label>
              </div>
            </li>


          </ul>
        <p class="text-center text-base text-gray-400">&copy; 2020 {{ env('APP_NAME') }}. All rights reserved.
        </p>
        </div>
      </div>
      <!-- ./Sidebar -->

      <div class="min-h-screen ml-14 mt-14 mb-10 md:ml-64">

        <div class="md:pl-17">
            <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">

                <!-- search results -->
                <h2 class="pb-10">Showing 5
                <span class="font-semibold">units</span>
                in
                <span class="text-purple-900 font-semibold">Baguio</span>
                </h2>

                <!-- catalog start -->
                 <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 xl:gap-x-8">

                    <a href="room" class="group border border-gray-300 rounded-lg p-3">
                        <div class="aspect-w-1  w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 ">
                        <img class="h-72 w-full object-cover object-center group-hover:opacity-75" src="{{ asset('/brands/proprent/room-sample.jpg') }}" alt="pmo logo">
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-start-1">
                                <h3 class="mt-4 text-lg font-bold text-gray-900">Unit Room 1</h3>
                            </div>
                             <div class="cols-start-2 mx-3 flex items-end justify-end">
                             <p class="font-bold text-md"><span class="font-light">₱</span> 1000</p>
                            </div>
                        </div>

                        <h1 class="inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <span class="font-medium text-sm">Baguio City</span>
                                </h1>
                        <!-- description -->
                        <p class="mt-2 text-xs  text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget lacus et urna pharetra aliquam. </p>

                        <div class="mt-3 grid grid-cols-3 text-center justify-center">



                            <div class="cols-start-1">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/single-bed.png" alt="single-bed"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Rooms</span>
                              </h1>
                            </div>

                            <div class="cols-start-2">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/toilet-bowl.png" alt="toilet-bowl"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Toilet</span>
                              </h1>
                            </div>

                            <div class="cols-start-3">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/user-group-man-man.png" alt="user-group-man-man"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Max</span>
                              </h1>
                            </div>

                        </div>
                    </a>

                    <a href="room" class="group border border-gray-300 rounded-lg p-3">
                        <div class="aspect-w-1  w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 ">
                        <img class="h-72 w-full object-cover object-center group-hover:opacity-75" src="{{ asset('/brands/proprent/room-sample-2.jpg') }}" alt="pmo logo">
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-start-1">
                                <h3 class="mt-4 text-lg font-bold text-gray-900">Unit Room 1</h3>
                            </div>
                             <div class="cols-start-2 mx-3 flex items-end justify-end">
                             <p class="font-bold text-md"><span class="font-light">₱</span> 1000</p>
                            </div>
                        </div>

                        <h1 class="inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <span class="font-medium text-sm">Baguio City</span>
                                </h1>
                        <!-- description -->
                        <p class="mt-2 text-xs  text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget lacus et urna pharetra aliquam. </p>

                        <div class="mt-3 grid grid-cols-3 text-center justify-center">



                            <div class="cols-start-1">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/single-bed.png" alt="single-bed"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Rooms</span>
                              </h1>
                            </div>

                            <div class="cols-start-2">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/toilet-bowl.png" alt="toilet-bowl"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Toilet</span>
                              </h1>
                            </div>

                            <div class="cols-start-3">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/user-group-man-man.png" alt="user-group-man-man"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Max</span>
                              </h1>
                            </div>

                        </div>
                    </a>

                    <a href="room" class="group border border-gray-300 rounded-lg p-3">
                        <div class="aspect-w-1  w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 ">
                        <img class="h-72 w-full object-cover object-center group-hover:opacity-75" src="{{ asset('/brands/proprent/room-sample-3.jpg') }}" alt="pmo logo">
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-start-1">
                                <h3 class="mt-4 text-lg font-bold text-gray-900">Unit Room 1</h3>
                            </div>
                             <div class="cols-start-2 mx-3 flex items-end justify-end">
                             <p class="font-bold text-md"><span class="font-light">₱</span> 1000</p>
                            </div>
                        </div>

                        <h1 class="inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <span class="font-medium text-sm">Baguio City</span>
                                </h1>
                        <!-- description -->
                        <p class="mt-2 text-xs  text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget lacus et urna pharetra aliquam. </p>

                        <div class="mt-3 grid grid-cols-3 text-center justify-center">



                            <div class="cols-start-1">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/single-bed.png" alt="single-bed"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Rooms</span>
                              </h1>
                            </div>

                            <div class="cols-start-2">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/toilet-bowl.png" alt="toilet-bowl"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Toilet</span>
                              </h1>
                            </div>

                            <div class="cols-start-3">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/user-group-man-man.png" alt="user-group-man-man"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Max</span>
                              </h1>
                            </div>

                        </div>
                    </a>

                    <a href="room" class="group border border-gray-300 rounded-lg p-3">
                        <div class="aspect-w-1  w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 ">
                        <img class="h-72 w-full object-cover object-center group-hover:opacity-75" src="{{ asset('/brands/proprent/room-sample-4.jpg') }}" alt="pmo logo">
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-start-1">
                                <h3 class="mt-4 text-lg font-bold text-gray-900">Unit Room 1</h3>
                            </div>
                             <div class="cols-start-2 mx-3 flex items-end justify-end">
                             <p class="font-bold text-md"><span class="font-light">₱</span> 1000</p>
                            </div>
                        </div>

                        <h1 class="inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <span class="font-medium text-sm">Baguio City</span>
                                </h1>
                        <!-- description -->
                        <p class="mt-2 text-xs  text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget lacus et urna pharetra aliquam. </p>

                        <div class="mt-3 grid grid-cols-3 text-center justify-center">



                            <div class="cols-start-1">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/single-bed.png" alt="single-bed"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Rooms</span>
                              </h1>
                            </div>

                            <div class="cols-start-2">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/toilet-bowl.png" alt="toilet-bowl"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Toilet</span>
                              </h1>
                            </div>

                            <div class="cols-start-3">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/user-group-man-man.png" alt="user-group-man-man"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Max</span>
                              </h1>
                            </div>

                        </div>
                    </a>

                    <a href="room" class="group border border-gray-300 rounded-lg p-3">
                        <div class="aspect-w-1  w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 ">
                        <img class="h-72 w-full object-cover object-center group-hover:opacity-75" src="{{ asset('/brands/proprent/room-sample-5.jpg') }}" alt="pmo logo">
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="cols-start-1">
                                <h3 class="mt-4 text-lg font-bold text-gray-900">Unit Room 1</h3>
                            </div>
                             <div class="cols-start-2 mx-3 flex items-end justify-end">
                             <p class="font-bold text-md"><span class="font-light">₱</span> 1000</p>
                            </div>
                        </div>

                        <h1 class="inline-flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                    </svg>
                                    <span class="font-medium text-sm">Baguio City</span>
                                </h1>
                        <!-- description -->
                        <p class="mt-2 text-xs  text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In eget lacus et urna pharetra aliquam. </p>

                        <div class="mt-3 grid grid-cols-3 text-center justify-center">



                            <div class="cols-start-1">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/single-bed.png" alt="single-bed"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Rooms</span>
                              </h1>
                            </div>

                            <div class="cols-start-2">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/toilet-bowl.png" alt="toilet-bowl"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Toilet</span>
                              </h1>
                            </div>

                            <div class="cols-start-3">
                              <h1 class="inline-flex">
                              <img width="20" height="20" src="https://img.icons8.com/metro/26/user-group-man-man.png" alt="user-group-man-man"/>
                                <span class="font-light text-sm"><span class="text-yellow-400 font-bold">10</span> Max</span>
                              </h1>
                            </div>

                        </div>
                    </a>





                </div>
            </div>
        </div>


    </main>





  </div>
</div>

</body>



</html>
