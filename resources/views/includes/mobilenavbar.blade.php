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