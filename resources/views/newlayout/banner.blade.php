<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Welcome</title>
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
<html class="h-full w-full bg-no-repeat bg-cover">
  <body class="h-full overflow-hidden font-pop">

<div class="flex h-full flex-col">
  <!-- Top nav-->
  <header class="relative flex h-16 flex-shrink-0 items-center bg-white">
    <!-- Logo area -->
    <div class="absolute inset-y-0 left-0 md:static md:flex-shrink-0">
      <a href="#" class="flex h-16 w-16 items-center justify-center bg-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-600 md:w-20">
        <img class="h-15 w-auto"src="{{ asset('/brands/full-logo.png') }}">
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
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
      </div>
      <div class="ml-10 flex flex-shrink-0 items-center space-x-5 pr-4">
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
           <!-- PROFILE DROPDOWN! --> 
           <div class="hidden absolute right-0 z-30 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1">
              <div class="py-1" role="none"> 
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-0"> Profile </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-0"> Subscription </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-0"> Properties </a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-0-item-0"> Log Out </a>
              </div>
              </div>
            </div>
          </div>
        </div>

   
      
          
          
        
  </header>

  

    <!-- Main area -->
    <main class="flex-1 pb-8 h-screen y-screen">
    
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

<div class="flex items-center m-10 h-12 w-auto py-3 bg-yellow-100 text-center rounded-md">
    
<h1 class="flex-1">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
</svg>


        <span class="font-medium text-red-500">1 day </span>left of trial. 
        <span class="font-medium">Skip</span>
        trial and 
        <span class="font-medium">unlock all features!</span>
        <a href="" class="text-sm font-light text-gray-500">Learn more.</a>
</h1>


</div>

  <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 mt-5">
  <h2 class="p-2 text-left text-3xl font-bold tracking-tight text-gray-900 font-pop">Welcome, Name!</h2>
 


    <div class=" mt-10 items-center justify-center">
    <h2 class="text-center text-xl font-semibold tracking-tight text-gray-700 font-pop">No properties</h2>
    <h2 class="text-center text-base  tracking-tight text-gray-500 font-pop">Get started by creating a new property.</h2>
    </div>

    <div class="mt-10 flex items-center justify-center">
    <div button type="button" class="w-64 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-purple-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New Property</button></div>
</div>







   
      
    </main>
  </div>
</div>

</body>



</html>