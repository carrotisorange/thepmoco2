<nav aria-label="Sidebar" class="hidden md:block md:flex-shrink-0 md:bg-white overflow-auto h-screen pb-32">
    <div class="relative flex w-22 flex-col space-y-3 p-3">
        <!-- Dashboard -->

        <x-nav-link href="/property/{{ Session::get('property') }}" :active="request()->routeIs('dashboard')">
            <span class="sr-only">Dashboard</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/dashboard_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
        </x-nav-link>
        <div class="font-medium leading-3 ml-0 text-xs text-gray-900 mt-10">Dashboard</div>

        <!-- Messages -->

        <x-nav-link href="/chatify" target="_blank" :active="request()->routeIs('chatify')">
            <span class="sr-only">Messages</span>

            <i class="fa-solid fa-comments"></i>

        </x-nav-link>

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Messages</div>

        <!-- Units -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/unit" :active="request()->routeIs('unit')">
            <span class="sr-only">Units</span>
            <img class="h-10 w-auto" src="{{ asset('/brands/units_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('unit')">
            <span class="sr-only">Unit</span>
            <img class="h-10 w-auto" src="{{ asset('/brands/units_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 -ml-2 text-xs text-center text-gray-900 mt-10">Units</div>

        <!-- Units -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/calendar" :active="request()->routeIs('calendar')">
            <span class="sr-only">Calendar</span>
            <img class="h-7 w-auto" src="{{ asset('/brands/calendar.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('calendar')">
            <span class="sr-only">Unit</span>
            <img class="h-7 w-auto" src="{{ asset('/brands/calendar.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Calendar</div>

        <!-- Tenants -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/tenant" :active="request()->routeIs('tenant')">
            <span class="sr-only">Tenants</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/tenant_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('tenant')">
            <span class="sr-only">Tenant</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/tenant_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Tenants</div>

        <!-- Contracts -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/contract" :active="request()->routeIs('contract')">
            <span class="sr-only">Contracts</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/contract-gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('contract')">
            <span class="sr-only">Contracts</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/contract-gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Contracts</div>

        <!-- Guest -->

        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/guest" :active="request()->routeIs('guest')">

            <span class="sr-only">Guests</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/guest.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('guests')">

            <span class="sr-only">Utilities</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/utilities-gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Guests</div>

        <!-- Owners -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/owner" :active="request()->routeIs('owner')">
            <span class="sr-only">Owners</span>
            <img class="h-10 w-auto" src="{{ asset('/brands/user_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('owner')">
            <span class="sr-only">Owners</span>
            <img class="h-10 w-auto" src="{{ asset('/brands/user_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Owners</div>

        <!-- Personnels -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/user" :active="request()->routeIs('user')">
            <span class="sr-only">Personnels</span>

            <img class="h-13 w-auto" src="{{ asset('/brands/team_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('user')">
            <span class="sr-only">Personnels</span>

            <img class="h-13 w-auto" src="{{ asset('/brands/team_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Personnels</div>

        <!-- Concerns -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/concern" :active="request()->routeIs('concern')">

            <span class="sr-only">Concerns</span>
            <img class="h-10 w-auto" src="{{ asset('/brands/concerns_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('concern')">

            <span class="sr-only">Concerns</span>
            <img class="h-10 w-auto" src="{{ asset('/brands/concerns_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Concerns</div>


        <!-- Bills -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/bill" :active="request()->routeIs('bill')">

            <span class="sr-only">Bills</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/invoice_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('bill')">

            <span class="sr-only">Bills</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/invoice_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 -ml-2 text-xs text-center text-gray-900 mt-10">Bills</div>


        <!-- Collection -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/collection"
            :active="request()->routeIs('collection')">

            <span class="sr-only">Collections</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/credit-card.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('collection')">

            <span class="sr-only">Collections</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/credit-card.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Collections</div>

        <!-- Account Payable -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/accountpayable"
            :active="request()->routeIs('accountpayable')">

            <span class="sr-only">Request for<br> Purchases </span>
            <img class="h-8 w-auto" src="{{ asset('/brands/ap_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('accountpayable')">

            <span class="sr-only">Request for<br> Purchases </span>
            <img class="h-8 w-auto" src="{{ asset('/brands/ap_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Request for<br> Purchases
        </div>

        <!-- Financials -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/financial" :active="request()->routeIs('financial')">

            <span class="sr-only">Financials</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/cashflow_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('financial')">

            <span class="sr-only">Financials</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/cashflow_gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Financials</div>

        <!-- Utilities -->
        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/utilities" :active="request()->routeIs('utilities')">

            <span class="sr-only">Utilities</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/utilities-gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('utilities')">

            <span class="sr-only">Utilities</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/utilities-gr.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Utilities</div>



        @if(Session::get('property'))
        <x-nav-link href="/property/{{ Session::get('property') }}/remittances"
            :active="request()->routeIs('remittances')">

            <span class="sr-only">Remittances</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/remittance.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @else
        <x-nav-link href="/property/" :active="request()->routeIs('remittances')">

            <span class="sr-only">Remittances</span>
            <img class="h-8 w-auto" src="{{ asset('/brands/remittance.png') }}" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
        </x-nav-link>
        @endif

        <div class="font-medium leading-3 ml-0 text-xs text-center text-gray-900 mt-10">Remittances</div>

    </div>
</nav>