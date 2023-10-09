
<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
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

                                {{ env('APP_NAME') }} Sales


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
                        <a href="/help">
                            <x-button title="help">
                                Need help?
                            </x-button>
                        </a>
                        @endif

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

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
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

                <div class="pt-4 pb-1 border-t border-gray-200 overflow-y-auto h-screen">

                    <?php
                                    $portal = 'sale';

                                    $portalFeatures = App\Models\Portal::where('portal', $portal)->pluck('features')->first();

                                    $availableFeatures = explode(",", $portalFeatures);

                                    ?>
                    @foreach($availableFeatures as $feature)
                    <?php
                                    $feature = App\Models\Feature::find($feature);
                                ?>
                    <div class="pt-2 pb-3 space-y-1">
                        <x-dropdown-link
                            href="/{{auth()->user()->role_id}}/{{$portal}}/{{ auth()->user()->username }}/{{ $feature->alias }}">
                            {{ $feature->feature }}
                        </x-dropdown-link>
                    </div>
                    @endforeach


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
        <!-- Bottom section -->
        <div class="flex min-h-0 flex-1 overflow-hidden">
            <!-- Narrow sidebar-->
            <nav aria-label="Sidebar"
                class="hidden md:block md:flex-shrink-0 md:overflow-y-auto md:bg-white overflow-y-auto h-screen">
                <div class="relative flex w-20 flex-col space-y-3 p-3">
                    @foreach($availableFeatures as $feature)
                    <?php
                                    $feature = App\Models\Feature::find($feature);
                                ?>

                    <x-nav-link href="/{{auth()->user()->role_id}}/{{$portal}}/{{ auth()->user()->username }}/{{ $feature->alias }}"
                        :active="request()->routeIs($feature->alias)">
                        <span class="sr-only">{{ $feature->feature }}</span>
                        <img title="{{ $feature->feature }}" class="h-8 w-auto" src="{{ asset('/brands/'.$feature->default_icon) }}"
                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </x-nav-link>

                    <div class="leading-3 ml-0 text-xs text-center text-gray-400 mt-10">{{ $feature->feature }}</div>
                    @endforeach
                </div>
            </nav>

            <main class="flex-1 pb-16 h-screen y-screen overflow-y-scroll">
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
