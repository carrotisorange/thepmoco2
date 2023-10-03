<x-dropdown align="right" width="48">
    <x-slot name="trigger">

        <button
            class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">

            <div class="ml-2 text-xl">

                {{ auth()->user()->name }}

            </div>

            <div class="ml-1 text-xl">
             &nbsp; <i class="fa-solid fa-caret-down"></i>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">

        <x-dropdown-link href="/user/{{ Auth::user()->username }}/edit">
            Profile
        </x-dropdown-link>

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
            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                Log Out
            </x-dropdown-link>
        </form>
    </x-slot>
</x-dropdown>
