<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.auth-head')
    <title>The Property Manager</title>
</head>

<body class="font-sans antialiased" body x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">
    {{-- <div style="background-image: url('{{ asset('/brands/property_page_bg.png') }}');" --}} 
    <div class="min-h-screen w-full h-1/2">
        <nav x-data="{ open: false }" class="bg-white p-3 border-b border-gray-100">
            <!-- Primary Navigation Menu -->

            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="/property">
                                <img class="h-24 w-15" src="{{ asset('/brands/full-logo.png') }}" />
                            </a>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <x-nav-link href="#/" :active="request()->routeIs('property')">
                                <i class="fa-solid fa-building"></i>&nbspProperty
                            </x-nav-link>

                        </div>


                    </div>

                    <!-- Settings Dropdown -->
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

                                <x-dropdown-link href="/property">
                                    Property
                                </x-dropdown-link>

                                {{-- <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
                                    Subscriptions
                                </x-dropdown-link> --}}

                                <x-dropdown-link href="/select-a-plan">
                                    Plans
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                                        Log Out
                                    </x-dropdown-link>
                                </form>



                            </x-slot>
                        </x-dropdown>

                    </div>

                    <!-- Hamburger -->
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
            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
                            Profile
                        </x-dropdown-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/property">
                            Property
                        </x-dropdown-link>
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/select-a-plan">
                            Plans
                        </x-dropdown-link>
                    </div>
                    {{-- <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
                            Subscriptions
                        </x-dropdown-link>
                    </div> --}}
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
        <main class="bg-gray-200 backdrop-grayscale">
            <div class="w-full h-full backdrop-contrast-100">
                {{-- object-cover backdrop-grayscale bg-white/30 --}}
                <div class="mx-auto px-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
                    <div class="space-y-12">
                        {{-- <div class="lg:flex md:ml-10 lg:items-center lg:justify-between xl:mt-0">

                        </div> --}}
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="pb-1 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <?php $name = explode(" ", auth()->user()->name); ?>
                                <h2 class="text-xl text-purple-600 font-bold tracking-tight sm:text-4xl">Welcome back,
                                    {{ $name[0] }}</h2>
                                <p class="mt-4 text-xl text-base text-white-900">
                                    Select your property.
                                </p>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-4">
                                @if($properties->count())
                                <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    Create new property
                                </button>
                                @endif
                            </div>
                        </div>
                        <ul role="list"
                            class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:px-32 gap-x-8">
                            @foreach ($properties as $property)
                            <li>
                                <div class="space-y-4">
                                    <div class="aspect-w-3 aspect-h-2">
                                        <a href="/property/{{ $property->property->uuid }}">
                                            <img class="object-cover shadow-lg rounded-lg"
                                                src="{{ asset('/brands/property_page.png') }}" alt="property picture">
                                        </a>
                                    </div>


                                    <div class="space-y-2">
                                        <div class="text-lg leading-6 font-medium space-y-1">
                                            <h3>{{ $property->property->property }}</h3>
                                            <p class="text-indigo-600">{{ $property->property->type->type }}</p>
                                        </div>
                                        <ul role="list" class="flex space-x-5">
                                            <li>
                                                <a title="edit" href="/property/{{ $property->property->uuid }}/edit"
                                                    class="text-gray-400 hover:text-gray-500">
                                                    <span class="sr-only"></span>
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <!-- More people... -->
                        </ul>
                        @if(!$properties->count())
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No properties</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Get started by creating a new property.
                            </p>
                            <div class="mt-6">
                                <button type="button"
                                    onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                    <!-- Heroicon name: solid/plus -->
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    New Property
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    @include('layouts.footer')
</body>
@include('layouts.script')

</html>