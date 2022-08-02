<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.auth-head')
    <title>Profile | The Property Manager</title>
</head>

<body class="font-sans antialiased" body x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">
    <div class="min-h-screen bg-gray-100">
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
                            <x-nav-link href="#/" :active="request()->routeIs('profile')">
                                <i class="fa-solid fa-user"></i>&nbspProfile
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
        <main>
            <div class="w-full h-full">
                <div class="mx-auto px-12 md:w-1/2 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
                    <form class="space-y-8 divide-y divide-gray-200" method="POST"
                        action="/user/{{ $user->username }}/update">
                        @csrf
                        @method('PATCH')
                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                            <div>


                                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="name"
                                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Full Name
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <input type="text" name="name" id="name" autocomplete="name"
                                                    value="{{old('name', $user->name)}}"
                                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>
                                        @error('name')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="username"
                                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Username
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <input type="text" name="username" id="username" autocomplete="username"
                                                    value="{{old('username', $user->username)}}"
                                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>
                                        @error('username')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="email"
                                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Email
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <input type="email" name="email" id="email" autocomplete="email"
                                                    value="{{old('email', $user->email)}}"
                                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="mobile_number"
                                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Mobile
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <input type="text" name="mobile_number" id="mobile_number"
                                                    value="{{old('mobile_number', $user->mobile_number)}}"
                                                    autocomplete="mobile_number"
                                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>
                                        @error('mobile_number')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="password"
                                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Password
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <input type="password" name="password" id="password"
                                                    autocomplete="password"
                                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                            </div>
                                        </div>
                                        @error('password')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="role_id"
                                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Role
                                        </label>
                                        @if(auth()->user()->role_id === 5)
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <select name="role_id" id="role_id" autocomplete="role_id"
                                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                    @foreach($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id
                                                        ?'selected': 'selected'}}>{{ $role->role }} - {{
                                                        $role->description }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        @error('role_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div> --}}

                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                            Status
                                        </label>
                                        @if(auth()->user()->role_id === 5)
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="max-w-lg flex rounded-md shadow-sm">
                                                <select name="status" id="status" autocomplete="status"
                                                    class="flex-1 block w-full focus:ring-purple-500 focus:border-purple-500 min-w-0 rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                    <option value="active" {{ 'active'==$user->status ? 'selected' : ''
                                                        }}>active</option>
                                                    <option value="inactive" {{ 'inactive'==$user->status ? 'selected' :
                                                        ''
                                                        }}>inactive</option>
                                                    <option value="banned" {{ 'banned'==$user->status ? 'selected' : ''
                                                        }}>banned</option>
                                                    <option value="pending" {{ 'pending'==$user->status ? 'selected' :
                                                        ''
                                                        }}>pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        @endif
                                        @error('status')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label for="avatar" class="block text-sm font-medium text-gray-700">
                                            Avatar
                                        </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <div class="flex items-center">
                                                <span class="h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                                                    @if(auth()->user()->avatar)
                                                    <img class="" src="/storage/{{ $user->avatar }}" alt="">
                                                    @else
                                                    <img class="" src="{{ auth()->user()->avatarUrl() }}" alt="">
                                                    @endif
                                                </span>
                                                <button type="button"
                                                    class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                                    Change
                                                </button>
                                            </div>
                                        </div>
                                    </div> --}}


                                </div>
                            </div>

                            <div class="pt-5">
                                <div class="flex justify-end">
                                    <button type="button" onclick="window.location.href='/property'"
                                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    @include('layouts.footer')
</body>
@include('layouts.script')

</html>