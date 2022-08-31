<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>@yield('title')</title>
</head>

<body class="h-full font-body">
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
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                                    <div class="ml-2 text-xl">{{ auth()->user()->name }}</div>

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

                                <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
                                    Subscriptions
                                </x-dropdown-link>

                                <x-dropdown-link href="/property">
                                    Portforlio
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

                <div class="pt-4 pb-1 border-t border-gray-200">

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
                            Profile
                        </x-dropdown-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
                            Subscriptions
                        </x-dropdown-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/property">
                            Portforlio
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
            </div>
        </nav>
        <!-- Main area -->
        <main class="flex-1 pb-8 h-screen y-screen">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                    {{ $slot }}
                </div>
               <div class="text-purple-500">
                    @include('layouts.footer')
               </div>
        </main>
    </div>
</body>
@include('layouts.script')

</html>