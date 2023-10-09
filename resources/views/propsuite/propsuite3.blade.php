<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

<body>

    <style>
        body {
            font-family: Poppins;
        }

        #propsuite-bg {
            background-image: url('/brands/propsuite/propsuite-bg.png');
        }

        .darkPurple {
            color: #4F3F6D;
        }

        .darkPurplebg {
            background-color: #4F3F6D;
        }
    </style>

    <nav class="lg:sticky top-0 z-10 relative px-4 py-4 flex justify-between items-center bg-gray-100">
        <a class="text-3xl font-bold leading-none" href="/">
            <img class="h-10" src="{{ asset('/brands/propsuite/propsuite.png') }}" alt="{{ env('APP_LOGO_DESC') }}">
        </a>
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-white p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
        <ul
            class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-10">
            <li><a class="text-base font-medium text-gray-500 hover:text-gray-400" href="/">Home</a></li>

            <li><a class="text-base font-medium text-gray-500 hover:text-gray-400" href="#about">About Us</a></li>

            <li><a class="text-base font-medium text-gray-500 hover:text-gray-400" href="#faq">FAQs</a></li>

            <li><a class="text-base font-medium text-gray-500 hover:text-gray-400" href="blog-1">Articles</a></li>


        </ul>
        <a id="button1"
            class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 darkPurplebg hover:bg-gray-100 text-sm font-bold text-white hover:bg-gray-300  rounded-2xl transition duration-200"
            href="/select-a-plan">Sign Up</a>
        <a class="hidden lg:inline-block py-2 px-6  text-sm text-white bg-gray-400 hover:bg-gray-500 rounded-2xl transition duration-200"
            href="/">Sign In</a>
    </nav>
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="#">
                    <img class="h-20" src="{{ asset('/brands/'.env('APP_LOGO')) }}" alt="{{ env('APP_LOGO_DESC') }}">
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
                        <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                            href="/">Home</a>
                    </li>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                            href="about">About Us</a>
                    </li>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                            href="faq">FAQs</a>
                    </li>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                            href="blog-1">Articles</a>
                    </li>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                            href="owner-corner">Property Owners Corner</a>
                    </li>

                </ul>
            </div>
            <div class="mt-auto">
                <div class="pt-6">
                    <a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl"
                        href="/login">Sign in</a>
                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-purple-600 hover:bg-purple-700  rounded-xl"
                        href="/select-a-plan">Sign Up</a>
                </div>
                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2022</span>
                </p>
            </div>
        </nav>
    </div>
</body>

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

<div class="bg-white">




    <main>
        <!-- Hero section -->
        <div id="propsuite-bg" class="relative isolate overflow-hidden bg-gray-900 pb-16 pt-14 sm:pb-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto py-32 sm:py-48 lg:py-48">
                    <div class="text-center">
                        <h1 class="text-2xl font-bold tracking-wide text-white sm:text-5xl leading-5">We provide <span
                                class="darkPurple">full suite digital</span> solution <br> for <span
                                class="darkPurple">rental property
                                communities</span></h1>
                        <p class="mt-6 text-lg leading-8 text-gray-300"></p>
                        <div class="mt-10 flex items-center justify-center gap-x-6">
                            <a href="#services"
                                class="rounded-2xl bg-gray-200 px-3.5 py-2.5 text-lg text-gray-600 font-medium shadow-sm hover:bg-gray-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">Get
                                started</a>
                        </div>
                    </div>
                </div>


                <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>
            </div>

            <!-- Feature section
    <div class="mt-32 sm:mt-56">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl sm:text-center">
          <h2 class="text-base font-semibold leading-7 text-indigo-600">Everything you need</h2>
          <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">No server? No problem.</p>
          <p class="mt-6 text-lg leading-8 text-gray-600">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis.</p>
        </div>
      </div>
      <div class="relative overflow-hidden pt-16">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <img src="https://tailwindui.com/img/component-images/project-app-screenshot.png" alt="App screenshot" class="mb-[-12%] rounded-xl shadow-2xl ring-1 ring-gray-900/10" width="2432" height="1442">
          <div class="relative" aria-hidden="true">
            <div class="absolute -inset-x-20 bottom-0 bg-gradient-to-t from-white pt-[7%]"></div>
          </div>
        </div>
      </div>
      <div class="mx-auto mt-16 max-w-7xl px-6 sm:mt-20 md:mt-24 lg:px-8">
        <dl class="mx-auto grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 text-base leading-7 text-gray-600 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-x-8 lg:gap-y-16">
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900">
              <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z" clip-rule="evenodd" />
              </svg>
              Push to deploy.
            </dt>
            <dd class="inline">Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900">
              <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
              </svg>
              SSL certificates.
            </dt>
            <dd class="inline">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900">
              <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z" clip-rule="evenodd" />
              </svg>
              Simple queues.
            </dt>
            <dd class="inline">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900">
              <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 2.5c-1.31 0-2.526.386-3.546 1.051a.75.75 0 01-.82-1.256A8 8 0 0118 9a22.47 22.47 0 01-1.228 7.351.75.75 0 11-1.417-.49A20.97 20.97 0 0016.5 9 6.5 6.5 0 0010 2.5zM4.333 4.416a.75.75 0 01.218 1.038A6.466 6.466 0 003.5 9a7.966 7.966 0 01-1.293 4.362.75.75 0 01-1.257-.819A6.466 6.466 0 002 9c0-1.61.476-3.11 1.295-4.365a.75.75 0 011.038-.219zM10 6.12a3 3 0 00-3.001 3.041 11.455 11.455 0 01-2.697 7.24.75.75 0 01-1.148-.965A9.957 9.957 0 005.5 9c0-.028.002-.055.004-.082a4.5 4.5 0 018.996.084V9.15l-.005.297a.75.75 0 11-1.5-.034c.003-.11.004-.219.005-.328a3 3 0 00-3-2.965zm0 2.13a.75.75 0 01.75.75c0 3.51-1.187 6.745-3.181 9.323a.75.75 0 11-1.186-.918A13.687 13.687 0 009.25 9a.75.75 0 01.75-.75zm3.529 3.698a.75.75 0 01.584.885 18.883 18.883 0 01-2.257 5.84.75.75 0 11-1.29-.764 17.386 17.386 0 002.078-5.377.75.75 0 01.885-.584z" clip-rule="evenodd" />
              </svg>
              Advanced security.
            </dt>
            <dd class="inline">Lorem ipsum, dolor sit amet consectetur adipisicing elit aute id magna.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900">
              <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.84 1.804A1 1 0 018.82 1h2.36a1 1 0 01.98.804l.331 1.652a6.993 6.993 0 011.929 1.115l1.598-.54a1 1 0 011.186.447l1.18 2.044a1 1 0 01-.205 1.251l-1.267 1.113a7.047 7.047 0 010 2.228l1.267 1.113a1 1 0 01.206 1.25l-1.18 2.045a1 1 0 01-1.187.447l-1.598-.54a6.993 6.993 0 01-1.929 1.115l-.33 1.652a1 1 0 01-.98.804H8.82a1 1 0 01-.98-.804l-.331-1.652a6.993 6.993 0 01-1.929-1.115l-1.598.54a1 1 0 01-1.186-.447l-1.18-2.044a1 1 0 01.205-1.251l1.267-1.114a7.05 7.05 0 010-2.227L1.821 7.773a1 1 0 01-.206-1.25l1.18-2.045a1 1 0 011.187-.447l1.598.54A6.993 6.993 0 017.51 3.456l.33-1.652zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
              </svg>
              Powerful API.
            </dt>
            <dd class="inline">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo.</dd>
          </div>
          <div class="relative pl-9">
            <dt class="inline font-semibold text-gray-900">
              <svg class="absolute left-1 top-1 h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />
                <path fill-rule="evenodd" d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z" clip-rule="evenodd" />
              </svg>
              Database backups.
            </dt>
            <dd class="inline">Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus.</dd>
          </div>
        </dl>
      </div>
    </div> -->

            <!-- Testimonial section -->

            <div id="services" class="relative py-16 sm:py-24 lg:py-32" id="guide">
                <div class="relative">
                    <div class="flex justify-center items-center ">
                        <h2 class="font-semibold text-gray-600 text-3xl">What are the services that we offer?</h2>
                    </div>
                    <div
                        class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-4 lg:px-8">

                        <div class="flex flex-col overflow-hidden rounded-xl">
                            <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                                <div class="flex-1">
                                    <a class="mt-2 block">
                                        <p class="text-lg text-center font-medium text-gray-800">proprent</p>
                                    </a>
                                    <a href="/proprent"> <img
                                            src="{{ asset('/brands/'.env('APP_LOGO_PROPRENT')) }}"></a>

                                </div>
                            </div>
                            <p class="py-3 text-sm font-light text-gray-500">I need to advertise my listings/I want to
                                look for
                                available listings.</p>
                        </div>

                        <div class="flex flex-col overflow-hidden rounded-xl">
                            <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                                <div class="flex-1">
                                    <a class="mt-2 block">
                                        <p class="text-lg text-center font-medium text-gray-800">propman</p>
                                    </a>
                                    <a href="/propman"> <img
                                            src="{{ asset('/brands/'.env('APP_LOGO_PROPMAN')) }}"></a>

                                </div>
                            </div>
                            <p class="py-3 text-sm font-light text-gray-500">I need a property management system to
                                manage my
                                property.</p>
                        </div>

                        <div class="flex flex-col overflow-hidden rounded-xl">
                            <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                                <div class="flex-1">
                                    <a class="mt-2 block">
                                        <p class="text-lg text-center font-medium text-gray-800">propbiz</p>
                                    </a>
                                    <a href="/propbiz"> <img
                                            src="{{ asset('/brands/'.env('APP_LOGO_PROPBIZ')) }}"></a>

                                </div>
                            </div>
                            <p class="py-3 text-sm font-light text-gray-500">I need a property management service to
                                help in managing
                                my properties.</p>
                        </div>

                        <div class="flex flex-col overflow-hidden rounded-xl">
                            <div class="flex flex-1 flex-col justify-center items-center bg-gray-700 w-full p-6">
                                <div class="flex-1">
                                    <a class="mt-2 block">
                                        <p class="text-lg text-center font-medium text-white">proppay</p>
                                    </a>
                                    <a href="/proppay"> <img
                                            src="{{ asset('/brands/propsuite/proppay-notext.png') }}"></a>

                                </div>
                            </div>
                            <p class="py-3 text-sm font-light text-gray-500">I need a payment gateway to pay my rent.
                            </p>
                        </div>






                    </div>

                </div>
            </div>




            <div id="about" class="bg-gray-200 mt-10">
                <div class="lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-8 lg:px-8">


                    <div class="mt-12 lg:col-start-1 lg:m-0 lg:pl-20">
                        <div class="py-20 mx-auto px-4  sm:px-6 lg:max-w-none lg:px-0 lg:py-20">
                            <blockquote>
                                <div>

                                    <span class="text-4xl font-bold text-gray-800">The Property Manager Online</span>
                                    <p class="mt-6 text-base font-light text-gray-700 tracking-wide">is a system as a
                                        service
                                        company that gives real-time, reliable, easy digital
                                        solution to long-term rental property owners, and
                                        managers to improve transparency and efficiency in
                                        business operations.

                                        Unlike manual processes, we provide a full-suite solution
                                        that allows business owners to run their operations
                                        seamlessly and harmoniously with their tenants.</p>
                                </div>
                                <footer class="mt-6">


                                </footer>
                            </blockquote>
                        </div>
                    </div>

                    <div class="lg:mt-20 sm:mt-0  lg:col-start-2 sm:pl-5 lg:pl-32">
                        <div class="flex justify-center items-center">
                            <img class="h-72 w-fit" src="{{ asset('/brands/landing/about.webp') }}"
                                alt="a laptop mockup showing pmo dashboard">
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative bg-gray-700">
                <div class="px-6 py-32 relative bg-gray-600 md:absolute md:left-0 md:h-full md:w-1/2">
                    <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Mission</p>
                    <p class="mt-3 text-lg text-gray-300">To provide a transformative but easy digital solution to
                        improve rental
                        property experiences between customers and real property rentals.</p>
                    <div class="mt-8">
                        <div class="inline-flex rounded-md shadow">

                        </div>
                    </div>
                </div>
                <div
                    class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">

                    <div class="md:ml-auto md:w-1/2 md:pl-10">

                        <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Vision</p>
                        <p class="mt-3 text-lg text-gray-300">Thriving rental property communities thru technology
                            enablement.</p>
                        <div class="mt-8">
                            <div class="inline-flex rounded-md shadow">

                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <!-- thrive -->
            <div class="relative bg-gray-900">
                <div class="absolute inset-x-0 bottom-0 h-80 xl:top-0 xl:h-full">
                    <div class="h-full w-full xl:grid xl:grid-cols-2">
                        <div class="h-full xl:relative xl:col-start-2">
                            <img class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0"
                                src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100"
                                alt="People working on laptops">
                            <div aria-hidden="true"
                                class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r">
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="py-20 mx-auto max-w-4xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-flow-col-dense xl:grid-cols-2 xl:gap-x-8">
                    <div class="relative pt-12 xl:col-span-2 xl:pb-24">

                        <p class="mt-3 text-3xl font-bold tracking-tight text-white">{{ env('APP_NAME') }} Values</p>

                        <div class="mt-10 grid grid-cols-1 gap-y-5 gap-x-6 sm:grid-cols-6">
                            <p>
                                <span class="block text-2xl font-bold text-white">T</span>
                                <span class="mt-1 block text-base text-gray-300"><span
                                        class="font-medium text-white">Technology</span>
                                    -Enabled Experience</span>
                            </p>

                            <p>
                                <span class="block text-2xl font-bold text-white">H</span>
                                <span class="mt-1 block text-base text-gray-300"><span
                                        class="font-medium text-white">Honest</span>
                                    Operations </span>
                            </p>

                            <p>
                                <span class="block text-2xl font-bold text-white">R</span>
                                <span class="mt-1 block text-base text-gray-300"><span
                                        class="font-medium text-white">Reliable</span>
                                    Services</span>
                            </p>

                            <p>
                                <span class="block text-2xl font-bold text-white">I</span>
                                <span class="mt-1 block text-base text-gray-300"><span
                                        class="font-medium text-white">Innovation</span>
                                    in Business Reporting</span>
                            </p>

                            <p>
                                <span class="block text-2xl font-bold text-white">V</span>
                                <span class="mt-1 block text-base text-gray-300"><span
                                        class="font-medium text-white">Vital</span> and
                                    Harmonious Tenant-Landlord Relationship</span>
                            </p>

                            <p>
                                <span class="block text-2xl font-bold text-white">E</span>
                                <span class="mt-1 block text-base text-gray-300"><span
                                        class="font-medium text-white">Excellence</span>
                                    in Customer Service Execution</span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ section -->
        <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-56 lg:px-8">
            <div class="mx-auto max-w-4xl divide-y divide-gray-900/10">
                <h2 class="text-2xl font-bold leading-10 tracking-tight text-gray-900">Frequently asked questions</h2>
                <dl class="mt-10 space-y-6 divide-y divide-gray-900/10">
                    <div class="pt-6">
                        <dt>
                            <!-- Expand/collapse question button -->
                            <button type="button"
                                class="flex w-full items-start justify-between text-left text-gray-900"
                                aria-controls="faq-0" aria-expanded="false">
                                <span class="text-base font-semibold leading-7">What&#039;s the best thing about
                                    Switzerland?</span>
                                <span class="ml-6 flex h-7 items-center">
                                    <!--
                    Icon when question is collapsed.

                    Item expanded: "hidden", Item collapsed: ""
                  -->
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                    </svg>
                                    <!--
                    Icon when question is expanded.

                    Item expanded: "", Item collapsed: "hidden"
                  -->
                                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                    </svg>
                                </span>
                            </button>
                        </dt>
                        <dd class="mt-2 pr-12" id="faq-0">
                            <p class="text-base leading-7 text-gray-600">I don&#039;t know, but the flag is a big plus.
                                Lorem ipsum
                                dolor sit amet consectetur adipisicing elit. Quas cupiditate laboriosam fugiat.</p>
                        </dd>
                    </div>

                    <!-- More questions... -->
                </dl>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-32 bg-gray-900 sm:mt-56" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 py-16 sm:py-24 lg:px-8 lg:py-32">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <img class="h-7" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                    alt="Company name">
                <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white">Solutions</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Marketing</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Analytics</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Commerce</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Insights</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm font-semibold leading-6 text-white">Support</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Pricing</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Documentation</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Guides</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">API Status</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white">Company</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">About</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Blog</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Jobs</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Press</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Partners</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm font-semibold leading-6 text-white">Legal</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Claim</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Privacy</a>
                                </li>
                                <li>
                                    <a href="#" class="text-sm leading-6 text-gray-300 hover:text-white">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

</body>

</html>
