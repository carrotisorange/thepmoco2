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

  }

  #purple {
    background-color: #614A6B;
  }


  #yellow {
    background-color: #F4B700;
  }

  #brown {
    background-color: #D18D6B;
  }
</style>
<html class="h-screen w-full bg-cover" style="background-image: url('/brands/proprent/building.gif');">

<body>


  <header id="" class="fixed w-full top-0 z-50">
    <nav id="nav" class="lg:sticky top-0 z-10 relative px-4 py-5 flex justify-between items-center">
      <a class="text-3xl font-bold leading-none" href="">
        <img class="ml-5 h-10" src="{{ asset('/brands/propsuite/proprent.png') }}" alt="proprent logo">
      </a>



      <!-- desktop nav -->
      <ul
        class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-10">
        <li><a class="text-base font-bold text-purple-900 hover:text-yellow-200 underline" href="/">Go Back to {{ env('APP_NAME') }}
            Home</a></li>
        <!-- <li><a class="text-base font-bold text-purple-900 hover:text-yellow-200" href="/lot">About</a></li>
            <li><a class="text-base font-bold text-purple-900 hover:text-yellow-200" href="/design">Support</a></li> -->
      </ul>



      <a class="hidden lg:ml-auto lg:mr-3 py-2 px-8 bg-g-50 border border-yellow-500 text-sm font-bold text-yellow-500 hover:border-blue-500 hover:text-blue-500 transition duration-200"
        href="/login">Log In</a>


      <ul class="hidden space-x-2 lg:inline-flex items-center">

        <li class="rounded-2xl py-1">
          <a href="proprent-coming-soon"
            class="text-purple-900 text-base font-bold flex items-center px-2 hover:text-yellow-300">
            Sign In
          </a>
        </li>

        <li id="yellow" class="rounded-2xl py-1">
          <a href="proprent-coming-soon" class="font-bold text-sm flex items-center px-2 text-white">
            Sign Up
          </a>
        </li>
      </ul>

      <!-- burger menu -->
      <div class="lg:hidden">
        <button class="navbar-burger flex items-center text-yellow-500 p-3">
          <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>Mobile menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
          </svg>
        </button>
      </div>
    </nav>


    <!-- mobile nav -->
    <div class="navbar-menu relative z-50 hidden">
      <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>

      <!-- <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="/login">
                    <img class="h-20" src="{{ asset('/brands/proprent/proprent-logo.png') }}" alt="proprent logo">
                </a>

                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div>
                <ul>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-500"
                            href="/">Home</a>
                    </li>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-500"
                            href="">About</a>
                    </li>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-500"
                            href="">Support</a>
                    </li>

                </ul>
            </div>

            <div class="mt-auto">
                <div class="pt-6">

                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-yellow-500 hover:bg-yellow-400 "
                        href="/logout">Sign Out</a>
                </div>
                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2023</span>
                </p>
            </div>
        </nav> -->
    </div>
  </header>

  <!-- script for mobile view -->
  <script>
    // Burger menus
            document.addEventListener('DOMContentLoaded', function() {

                // open
                const burger = document.querySelectorAll('.navbar-burger');
                const menu = document.querySelectorAll('.navbar-menu');
                if (burger.length && menu.length) {
                    for (var i = 0; i < burger.length; i++) {
                        burger[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }


                // close
                const close = document.querySelectorAll('.navbar-close');
                const backdrop = document.querySelectorAll('.navbar-backdrop');
                if (close.length) {
                    for (var i = 0; i < close.length; i++) {
                        close[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }
                if (backdrop.length) {
                    for (var i = 0; i < backdrop.length; i++) {
                        backdrop[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }
            });
  </script>


  <main class="pt-10">


    <div class="h-screen">
      <div
        class="sm:py-0 lg:py-36 flex-1 flex flex-col justify-center pt-10 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-48">
        <div class="mx-auto w-full max-w-full lg:w-full">

          <div class="pt-3 flex justify-center items-center">
            <h2 class="text-center text-gray-800 text-2xl font-bold">Look for a place to stay without difficulty.</h2>

          </div>
          <div class="pt-3 flex justify-center items-center">
            <p class="text-center font-medium text-base text-gray-500">Find available units effortlessly, for free.</p>
          </div>
          <form>
            <div class="pt-10 flex">
              <label for="search-dropdown"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Your Email</label>
              <button id="purple" id="dropdown-button" data-dropdown-toggle="dropdown"
                class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                type="button">All categories <svg aria-hidden="true" class="ml-1 w-4 h-4" fill="currentColor"
                  viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
                </svg></button>
              <div id="dropdown"
                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
                data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom"
                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 910px);">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                  <li>
                    <button type="button"
                      class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Apartment</button>
                  </li>
                  <li>
                    <button type="button"
                      class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dormitory</button>
                  </li>
                  <li>
                    <button type="button"
                      class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transient</button>
                  </li>
                  <li>
                    <button type="button"
                      class="inline-flex py-2 px-4 w-full hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Vacation</button>
                  </li>
                </ul>
              </div>
              <div class="relative w-full">
                <input type="search" id="search-dropdown"
                  class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-yellow-500 focus:border-yellow-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-yellow-500"
                  placeholder="Search by City...  " required="">
                <button type="submit" id="purple" onClick="location.href='proprent-coming-soon'"
                  class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-red-300 rounded-r-lg border border-red-100 hover:bg-red-200 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                  <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
                  <span class="sr-only">Search</span>
                </button>

              </div>
            </div>
          </form>




        </div>


      </div>


    </div>

    <div class="sm:hidden lg:block">
      <ul role="list" id="purple" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <li class="col-span-1">
          <div class="px-20 flex w-full items-center justify-between space-x-6 p-6">
            <div class="flex-1 truncate">
              <div class="flex items-center space-x-3">
                <h3 class="truncate text-sm font-medium text-white">No subscription</h3>

              </div>

            </div>

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="h-8 w-8 text-white">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
            </svg>

          </div>

        </li>

        <li class="col-span-1">
          <div class="px-20 flex w-full items-center justify-between space-x-6 p-6">
            <div class="flex-1 truncate">
              <div class="flex items-center space-x-3">
                <h3 class="truncate text-sm font-medium text-white">No running advertisment cost</h3>

              </div>

            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-8 h-8 text-white">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>


          </div>

        </li>


        <li class="col-span-1">
          <div class="px-20 flex w-full items-center justify-between space-x-6 p-6">
            <div class="flex-1 truncate">
              <div class="flex items-center space-x-3">
                <h3 class="truncate text-sm font-medium text-white">List Multiple Properties</h3>

              </div>

            </div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-8 h-8 text-white">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
            </svg>


          </div>

        </li>

        <!-- More people... -->
      </ul>

    </div>

    </div>







  </main>

  <footer class="bg-gray-50" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="content-center mx-auto max-w-xl px-4 pt-16 pb-8 sm:px-6 lg:px-8 lg:pt-24">
      <div class="xl:grid xl:grid-cols-1 xl:gap-8">
        <div class="grid grid-cols-3 gap-8 xl:col-span-2">

          <div class="md:grid md:grid-cols-1 md:gap-8">
            <div>

              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Home</a>
                </li>




              </ul>
            </div>
          </div>

          <div class="md:grid md:grid-cols-1 md:gap-8">

            <ul role="list" class="mt-4 space-y-4">
              <li>
                <a href="#" class="text-base text-center text-gray-500 hover:text-gray-900">About</a>
              </li>




            </ul>
          </div>

          <div class="md:grid md:grid-cols-1 md:gap-8">
            <div>

              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Terms and Condiitons</a>
                </li>






              </ul>
            </div>

          </div>
        </div>

      </div>
      <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-center lg:mt-16">

        <p class="mt-8 text-base text-gray-400 md:order-1 md:mt-0">&copy; 2022 {{ env('APP_NAME') }} All rights
          reserved.</p>
      </div>
    </div>
  </footer>
  </div>


</body>



</html>
