<?php $propertyName= App\Models\Property::find(Session::get('property_uuid'))->property.' '.App\Models\Property::find(Session::get('property_uuid'))->type->type; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="facebook-domain-verification" content="q3z93v1eg3wsq648g7aq2cuby3ibcv" />

    <title>@yield('title')</title>

    {{--
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" /> --}}

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/b3c8174312.js" crossorigin="anonymous"></script>

    <!-- Scripts -->

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    @yield('styles')

    @livewireStyles
</head>

<body class="h-full overflow-hidden">
    <div class="flex h-full flex-col">
        <!-- Top nav-->
        <nav x-data="{ open: false }" class="bg-white p-3 border-b border-gray-100">

            <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-5">

                <div class="flex justify-between h-16">
                    <div class="flex">

                        <div class="shrink-0 flex items-center">
                            <a href="/property">
                                <img class="h-24 w-15" src="{{ asset('/brands/'.env('APP_LOGO')) }}" />
                            </a>
                        </div>

                        <div class="hidden space-x-3 sm:-my-px sm:ml-10 sm:flex">
                            <h1 class="text-xl pt-2 tracking-tight font-medium leading-tight text-gray-700">
                                @if (Session::has('property'))
                                {{ $propertyName }}

                                <a class="mt-2 inline-block" href="/property/{{ Session::get('property_uuid') }}/edit"
                                    title="Edit your Property">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-purple-700 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                @endif
                            </h1>

                        </div>

                    </div>
                    @auth
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- notification icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>

                        <!-- help icon -->
                        @if(Session::has('property'))
                        <a href="/support" target="_blank">
                            <x-button title="help">
                                Need Support?
                            </x-button>
                        </a>
                        @endif

                        @include('includes.profile-dropdown')

                    </div>

                    @endauth
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
                @auth
                @include('includes.mobilenavbar')
                @endauth
            </div>
        </nav>
        <!-- Bottom section -->
        <div class="flex min-h-0 flex-1 overflow-hidden">
            @include('includes.navbar')
            <main class="flex-1 pb-16 h-screen y-screen overflow-y-scroll">
                @if(env('APP_SANDBOX'))
                @include('layouts.banner')
                @endif
                <div class="mt-1">
                    @include('layouts.notifications')
                    {{ $slot }}
                </div>
                <div class="mb-1">
                    @include('layouts.footer')
                </div>
            </main>
        </div>
    </div>
    @include('layouts.scripts')
</body>

</html>

