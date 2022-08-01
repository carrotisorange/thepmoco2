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
                                                <input type="text" name="name" id="name" autocomplete="name" value="{{old('name', $user->name)}}"
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
                                                <input type="text" name="username" id="username" autocomplete="username" value="{{old('username', $user->username)}}"
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
                                                <input type="email" name="email" id="email" autocomplete="email" value="{{old('email', $user->email)}}"
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
                                                <input type="text" name="mobile_number" id="mobile_number" value="{{old('mobile_number', $user->mobile_number)}}"
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
                                                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ?'selected': 'selected'}}>{{ $role->role }} - {{ $role->description }}</option>
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
    <footer class="bg-white">
        <div class="text-purple-700 max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <div class="mt-2 flex justify-center space-x-6">
                <a title="Need support?" href="https://www.thepropertymanager.online/support/" target="_blank"
                    class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Support</span>
                    <i class="fa-brands fa-rocketchat"></i>
                </a>

                <a title="Follow us on Facebook" href="https://www.facebook.com/onlinepropertymanager/" target="_blank"
                    class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Facebook</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

                <a title="Like us on Facebook" href="https://www.instagram.com/thepmoco/" target="_blank"
                    class="text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Instagram</span>
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

            </div>
            <p class="mt-8 text-center text-base text-gray-400">
                &copy; 2022 The PMO Co. All rights reserved.
            </p>
        </div>
    </footer>
</body>
@include('layouts.script')

</html>