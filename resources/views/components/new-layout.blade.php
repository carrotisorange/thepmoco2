<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="h-full overflow-hidden font-body">
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

                        <div class="hidden space-x-3 sm:-my-px sm:ml-10 sm:flex">
                            <h1 class="text-xl py-5 tracking-tight font-medium leading-tight text-gray-700">
                                @if (Session::has('property'))
                                {{ App\Models\Property::find(Session::get('property'))->property.'
                                '.App\Models\Property::find(Session::get('property'))->type->type }}
                                &nbsp;
                                <a class="mt-2 inline-block" href="/property/{{ Session::get('property') }}/edit" title="Edit your Property">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-purple-700 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                @endif
                            </h1>
                            
                        </div>

                    </div>
                    @auth
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- help icon -->
                        <a href="/help"><button title="help" class="py-5 px-3">
                                <div class="inline-block font-medium text-gray-500">Need help?</div></a>
                            </button>
                        
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">

                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

                                    <div class="ml-2 text-xl">

                                        {{ auth()->user()->name }}

                                    </div>

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

                                {{-- <x-dropdown-link href="/chatify" target="_blank">
                                    Chat
                                </x-dropdown-link> --}}
                                @if(auth()->user()->role_id != 7 && auth()->user()->role_id != 8)
                                <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
                                    Subscriptions
                                </x-dropdown-link>
                                @endif
                                <x-dropdown-link href="/property">
                                    Portfolio
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
                <div class="pt-4 pb-1 border-t border-gray-200 overflow-y-auto h-screen mb-20">
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}">
                            Dashboard
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Dashboard
                        </x-dropdown-link>
                        @endif
                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/chatify">
                            Messages
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/chatify/">
                            Messages
                        </x-dropdown-link>
                        @endif
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/unit">
                            Units
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Units
                        </x-dropdown-link>
                        @endif
                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/calendar">
                            Calendar
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Calendar
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/tenant">
                            Tenants
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Tenants
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/contract/">
                            Contracts
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Contracts
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/guest/">
                            Guests
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Guests
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/owner">
                            Owners
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Owners
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/user">
                            Personnels
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Personnels
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/concern">
                            Concerns
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Concerns
                        </x-dropdown-link>
                        @endif

                    </div>
                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/bill">
                            Bills
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Bills
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/collection">
                            Collections
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Collections
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/accountpayable">
                            Account Payables
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Account Payables
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/financial">
                            Financials
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Financials
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/utilities">
                            Utilities
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Utilities
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        @if(Session::get('property'))
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
                            Profile
                        </x-dropdown-link>
                        @else
                        <x-dropdown-link href="/property/">
                            Profile
                        </x-dropdown-link>
                        @endif

                    </div>

                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/chatify">
                            Chat
                        </x-dropdown-link>
                    </div>
                    @if(auth()->user()->role_id != 7 && auth()->user()->role_id != 8)
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/subscriptions">
                            Subscriptions
                        </x-dropdown-link>
                    </div>
                    @endif
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link href="/property">
                            Portfolio
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
                @endauth
            </div>
        </nav>
        <!-- Bottom section -->
        <div class="flex min-h-0 flex-1 overflow-hidden">
            <!-- Narrow sidebar-->
            @include('includes.navbar')
            
            <main class="flex-1 pb-8 h-screen y-screen overflow-y-scroll">
                <div class="mt-3">
                    @include('layouts.notifications')
                    {{ $slot }}
                </div>
                <div class="mb-12">
                    @include('layouts.footer')
                </div>
            </main>
        </div>
    </div>
    @include('layouts.scripts')
</body>
</html>