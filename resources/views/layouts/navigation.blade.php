<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->

    <div class="max-w-12xl mx-auto px-4 sm:px-6 lg:px-8">
        @if (Session::has('property'))
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/property">
                        <img class="h-24 w-15" src="{{ asset('/brands/full-logo.png') }}" />
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/property/{{ Session::get('property') }}"
                        :active="request()->routeIs('dashboard')">
                        <i class="fa-solid fa-chart-line"></i>&nbspDashboard
                    </x-nav-link>

                </div>
                @can('accountowner')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/property/{{ Session::get('property') }}/user"
                        :active="request()->routeIs('user')">
                        <i class="fa-solid fa-user-gear"></i>&nbspUser
                    </x-nav-link>
                </div>
                @endcan

                @can('admin')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/property/{{ Session::get('property') }}/unit"
                        :active="request()->routeIs('unit')">
                        <i class="fa-solid fa-house"></i>&nbspUnit
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/property/{{ Session::get('property') }}/owner"
                        :active="request()->routeIs('owner')">
                        <i class="fa-solid fa-user-tie"></i>&nbspOwner
                    </x-nav-link>
                </div>
                @endcan
                {{--
                @can('treasury') --}}
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/property/{{ Session::get('property') }}/tenant"
                        :active="request()->routeIs('tenant')">
                        <i class="fa-solid fa-user"></i>&nbspTenant
                    </x-nav-link>
                </div>
                {{-- @endcan --}}

                @can('billing')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/property/{{ Session::get('property') }}/bill"
                        :active="request()->routeIs('bill')">
                        <i class="fa-solid fa-file-invoice-dollar"></i>&nbspBill
                    </x-nav-link>
                </div>
                @endcan

                @can('treasury')
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link href="/property/{{ Session::get('property') }}/payment"
                        :active="request()->routeIs('payment')">
                        <i class="fa-solid fa-cash-register"></i>&nbspPayment
                    </x-nav-link>
                </div>
                @endcan

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div class="flex -space-x-1 overflow-hidden">
                                @if(auth()->user()->avatar)
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                    src="/storage/{{ auth()->user()->avatar }}" alt="Profile Photo">
                                @else
                                <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                    src="{{ auth()->user()->avatarUrl() }}" alt="Profile Photo">
                                @endif

                            </div>
                            <div class="ml-2">{{ Auth::user()->username }}</div>

                            <div class="ml-1">
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
                        <x-dropdown-link href="/property">
                            <i class="fa-regular fa-building"></i> {{ __('Properties') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
                            <i class="fa-regular fa-address-card"></i> {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="/property/{{ Session::get('property') }}/referral">
                            <i class="fa-solid fa-user-group"></i> {{ __('Referral') }}
                        </x-dropdown-link>
                        <x-dropdown-link
                            href="/property/{{ Session::get('property') }}/timestamp">
                            <i class="fa-solid fa-user-clock"></i> {{ __('Timestamp') }}
                        </x-dropdown-link>
                        <x-dropdown-link target="_blank" href="/chatify">
                            <i class="fab fa-rocketchat"></i> {{ __('Chatify') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="/user/{{ auth()->user()->username }}/point">
                            <i class="fas fa-coins"></i> {{ __('My Points') }}
                        </x-dropdown-link>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <i class="fa-regular fa-face-sad-tear"></i> {{ __('Log Out') }}
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
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="/property/{{ Session::get('property') }}"
                :active="request()->routeIs('dashboard')">
                <i class="fa-solid fa-chart-line"></i>&nbspDashboard
            </x-responsive-nav-link>
            @can('accountowner')
            <x-responsive-nav-link href="/property/{{ Session::get('property') }}/user"
                :active="request()->routeIs('user')">
                <i class="fa-solid fa-user-gear"></i>&nbspUser
            </x-responsive-nav-link>
            @endcannot

            @can('managerandadmin')
            <x-responsive-nav-link href="/property/{{ Session::get('property') }}/unit"
                :active="request()->routeIs('unit')">
                <i class="fa-solid fa-house"></i>&nbspUnits
            </x-responsive-nav-link>
            @endcan

            {{-- @can('treasury') --}}
            <x-responsive-nav-link href="/property/{{ Session::get('property') }}/tenant"
                :active="request()->routeIs('tenant')">
                <i class="fa-solid fa-user"></i>&nbspTenant
            </x-responsive-nav-link>
            {{-- @endcan --}}

            @can('managerandadmin')
            <x-responsive-nav-link href="/property/{{ Session::get('property') }}/owner"
                :active="request()->routeIs('owner')">
                <i class="fa-solid fa-user-tie"></i>&nbspOwner
            </x-responsive-nav-link>
            @endcan

            @can('billing')
            <x-responsive-nav-link href="/property/{{ Session::get('property') }}/bill"
                :active="request()->routeIs('bill')">
                <i class="fa-solid fa-file-invoice-dollar"></i>&nbspBill
            </x-responsive-nav-link>
            @endcan


            @can('treasury')
            <x-responsive-nav-link href="/property/{{ Session::get('property') }}/payment"
                :active="request()->routeIs('payment')">
                <i class="fa-solid fa-cash-register"></i>&nbspPayment
            </x-responsive-nav-link>
            @endcan

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="/property" :active="request()->routeIs('property')">
                    <i class="fa-regular fa-building"></i> {{ __('Properties') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link target="_blank" href="/chatify" :active="request()->routeIs('chatify')">
                    <i class="fab fa-rocketchat"></i> {{ __('Chatify') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link target="_blank" href="/point">
                    <i class="fas fa-coins"></i> {{ __('My Points') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link href="/user/{{ Auth::user()->username }}/edit"
                    :active="request()->routeIs('profile')">
                    <i class="fa-regular fa-address-card"></i> {{ __('Profile') }}
                </x-responsive-nav-link>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fa-regular fa-face-sad-tear"></i> {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endif
    </div>

</nav>