<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
    <title> @yield('title') </title>
</head>

<body class="font-sans antialiased" body x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">
    <div class="h-screen overflow-hidden bg-gray-100 flex flex-col">
        <!-- Top nav-->
        <header class="flex-shrink-0 relative h-16 bg-white flex items-center">
            <!-- Logo area -->
            <div class="absolute inset-y-0 left-0 md:static md:flex-shrink-0">
                <a href="/{{auth()->user()->role_id}}/{{ auth()->user()->username }}/dashboard"
                    class="flex items-center justify-center h-16 w-16 bg-purple-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-600 md:w-20">
                    <img class="h-8 w-auto" src="{{ asset('/brands/logo.png') }}" alt="The PMO Co">
                </a>
            </div>

            <!-- Picker area -->
            <div class="mx-auto md:hidden">
                <div class="relative">
                    <label for="inbox-select" class="sr-only">Choose inbox</label>
                    <select id="inbox-select"
                        class="rounded-md border-0 bg-none pl-3 pr-8 text-base font-medium text-gray-900 focus:ring-2 focus:ring-purple-600">
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
            <div class="absolute inset-y-0 right-0 pr-4 flex items-center sm:pr-6 md:hidden">
                <!-- Mobile menu button -->
                {{-- <button type="button"
                    class="-mr-2 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-600">
                    <span class="sr-only">Open main menu</span>
                    <!-- Heroicon name: outline/menu -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button> --}}
            </div>

            <!-- Desktop nav area -->
            <div class="hidden md:min-w-0 md:flex-1 md:flex md:items-center md:justify-between">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="md:flex md:items-center md:justify-between">
                    <div class="flex-1 min-w-0">
                        <h2 class="ml-5 text-1xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                            @yield('header')
                        </h2>
                    </div>

                </div>
                <div class="ml-10 pr-4 flex-shrink-0 flex items-center space-x-10">
                    <nav aria-label="Global" class="flex space-x-10">
                        {{-- <a href="#" class="text-sm font-medium text-gray-900">Inboxes</a>
                        <a href="#" class="text-sm font-medium text-gray-900">Reporting</a>
                        <a href="#" class="text-sm font-medium text-gray-900">Settings</a> --}}
                    </nav>
                    <div class="flex items-center space-x-8">
                        <span class="inline-flex">
                            <a href="#" class="-mx-1 bg-white p-1 rounded-full text-gray-400 hover:text-gray-500">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </a>
                        </span>

                        <!-- Profile dropdown -->
                        <div class="ml-3 relative" x-data="{ dropdown: false }">
                            <div>
                                <button x-on:click="dropdown = ! dropdown" type="button"
                                    class="max-w-xs bg-gray-800 rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                    id="user-menu-button" aria-expanded="false" aria-haspopup="false">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->avatarUrl() }}" alt="">
                                </button>
                            </div>
                            <div x-show="dropdown"
                                class="z-40 origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="/user/{{ auth()->user()->username }}/edit"
                                    class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                    id="user-menu-item-0">Your Profile</a>

                                <a href="/logout" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                    tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->

            <div class="fixed inset-0 z-40 md:hidden" role="dialog" aria-modal="true">
                <!--
        Off-canvas menu overlay, show/hide based on off-canvas menu state.

        Entering: "transition-opacity ease-linear duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "transition-opacity ease-linear duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
                <div class="hidden sm:block sm:fixed sm:inset-0 sm:bg-gray-600 sm:bg-opacity-75" aria-hidden="true">
                </div>

                <!--
        Mobile menu, toggle classes based on menu state.

        Entering: "transition ease-out duration-150 sm:ease-in-out sm:duration-300"
          From: "transform opacity-0 scale-110 sm:translate-x-full sm:scale-100 sm:opacity-100"
          To: "transform opacity-100 scale-100  sm:translate-x-0 sm:scale-100 sm:opacity-100"
        Leaving: "transition ease-in duration-150 sm:ease-in-out sm:duration-300"
          From: "transform opacity-100 scale-100 sm:translate-x-0 sm:scale-100 sm:opacity-100"
          To: "transform opacity-0 scale-110  sm:translate-x-full sm:scale-100 sm:opacity-100"
      -->
                <nav class="fixed z-40 inset-0 h-full w-full bg-purple sm:inset-y-0 sm:left-auto sm:right-0 sm:max-w-sm sm:w-full sm:shadow-lg"
                    aria-label="Global">
                    <div class="h-16 flex items-center justify-between px-4 sm:px-6">
                        <a href="/{{auth()->user()->role_id}}/{{ auth()->user()->username }}/dashboard">
                            <img class="block h-8 w-auto" src="{{ asset('/brands/logo.png') }}" alt="The PMO Co">
                        </a>
                        <button type="button"
                            class="-mr-2 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-600">
                            <span class="sr-only">Close main menu</span>
                            <!-- Heroicon name: outline/x -->
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    {{-- <div class="mt-2 max-w-8xl mx-auto px-4 sm:px-6">
                        <div class="relative text-gray-400 focus-within:text-gray-500">
                            <label for="mobile-search" class="sr-only">Search all inboxes</label>
                            <input id="mobile-search" type="search" placeholder="Search all inboxes"
                                class="block w-full border-gray-300 rounded-md pl-10 placeholder-gray-500 focus:border-purple-600 focus:ring-purple-600">
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
                    </div> --}}
                    <div class="max-w-8xl mx-auto py-3 px-2 sm:px-4">
                        <a href="#"
                            class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-100">Announcements</a>

                        <a href="#"
                            class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Contracts
                        </a>

                        <a href="#"
                            class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Bills</a>

                        <a href="#"
                            class="block rounded-md py-2 pl-5 pr-3 text-base font-medium text-gray-500 hover:bg-gray-100">Collections</a>
                    </div>
                    <div class="border-t border-gray-200 pt-4 pb-3">
                        <div class="max-w-8xl mx-auto px-4 flex items-center sm:px-6">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatarUrl() }}" alt="">
                            </div>
                            <div class="ml-3 min-w-0 flex-1">
                                <div class="text-base font-medium text-gray-800 truncate">{{ auth()->user()->name }}
                                </div>
                                <div class="text-sm font-medium text-gray-500 truncate">{{ auth()->user()->email }}
                                </div>
                            </div>
                            <a href="#" class="ml-auto flex-shrink-0 bg-white p-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </a>
                        </div>
                        <div class="mt-3 max-w-8xl mx-auto px-2 space-y-1 sm:px-4">
                            <a href="/user/{{ auth()->user()->username }}/edit"
                                class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">Your
                                Profile</a>

                            <a href="/logout"
                                class="block rounded-md py-2 px-3 text-base font-medium text-gray-900 hover:bg-gray-50">Sign
                                out</a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!-- Bottom section -->
        <div class="min-h-0 flex-1 flex overflow-hidden">
            <!-- Narrow sidebar-->
            <nav aria-label="Sidebar" class="hidden md:block md:flex-shrink-0 md:bg-gray-800 md:overflow-y-auto">
                <div class="relative w-20 flex flex-col p-3 space-y-3">
                    <a href="/{{auth()->user()->role_id}}/{{ auth()->user()->username }}/dashboard"
                        title="announcements"
                        class="bg-gray-900 text-white flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                        <span class="sr-only">Announcements</span>
                        <!-- Heroicon name: outline/inbox -->
                        <i class="fa-solid fa-volume-high"></i>

                    </a>

                    <a href="/{{auth()->user()->role_id}}/{{ auth()->user()->username }}/contracts" title="contracts"
                        class="text-gray-400 hover:bg-gray-700 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                        <span class="sr-only">Contracts</span>
                        <!-- Heroicon name: outline/archive -->
                        <i class="fa-solid fa-file-contract"></i>
                    </a>

                    <a href="/{{auth()->user()->role_id}}/{{ auth()->user()->username }}/bills" title="bills"
                        class="text-gray-400 hover:bg-gray-700 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                        <span class="sr-only">Bills</span>
                        <!-- Heroicon name: outline/user-circle -->
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                    </a>

                    <a href="/{{auth()->user()->role_id}}/{{ auth()->user()->username }}/collections"
                        title="collections"
                        class="text-gray-400 hover:bg-gray-700 flex-shrink-0 inline-flex items-center justify-center h-14 w-14 rounded-lg">
                        <span class="sr-only">Collections</span>
                        <!-- Heroicon name: outline/flag -->
                        <i class="fa-solid fa-money-bills"></i>
                    </a>


                </div>
            </nav>

            <!-- Main area -->
            <main class="min-w-0 flex-1 border-t border-gray-200 lg:flex">
                <!-- Primary column -->
                <section aria-labelledby="primary-heading"
                    class="min-w-0 flex-1 h-full flex flex-col overflow-hidden lg:order-last">
                    <h1 id="primary-heading" class="sr-only">Home</h1>
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    {{ $slot }}
                </section>
            </main>
        </div>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    @include('layouts.footer')
</body>
@include('layouts.script')

</html>