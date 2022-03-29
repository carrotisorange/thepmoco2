<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

    <title>The Property Manager | Properties</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- Alpine.js --}}
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/b3c8174312.js" crossorigin="anonymous"></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation-properties')
        <header class="bg-white shadow">
            <div class="max-w-12xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex">
                    <div class="h-3">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <nav class="rounded-md">
                                <ol class="list-reset flex">
                                    <li class="text-gray-500">Profile</li>
                                    <li><span class="text-gray-500 mx-2">/</span></li>
                                    <li class="text-gray-500">Edit</li>
                                </ol>
                            </nav>
                        </h2>
                    </div>
                    <h5 class="flex-1 text-right">

                        <x-button onclick="window.location.href='{{ url()->previous() }}'">
                            Back

                        </x-button>

                    </h5>
                </div>
            </div>
        </header>
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <!-- This example requires Tailwind CSS v2.0+ -->
                            <!-- Name -->
                            <div>
                                <form action="/profile/{{ $user->username }}/update" method="POST" id="edit-form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div>
                                        <x-label for="name" :value="__('Name')" />

                                        <x-input form="edit-form" class="block mt-1 w-full" type="text" name="name"
                                            value="{{old('name', $user->name)}}" required autofocus />

                                        @error('name')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <x-label for="username" :value="__('Username')" />

                                        <x-input form="edit-form" id="username" class="block mt-1 w-full" type="text"
                                            name="username" value="{{old('username', $user->username)}}" required
                                            autofocus />

                                        @error('username')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <x-label for="email" :value="__('Email')" />

                                        <x-input form="edit-form" id="email" class="block mt-1 w-full" type="email"
                                            name="email" value="{{old('email', $user->email)}}" required autofocus />

                                        @error('email')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <x-label for="mobile_number" :value="__('Mobile')" />

                                        <x-input form="edit-form" id="mobile_number" class="block mt-1 w-full"
                                            type="text" name="mobile_number"
                                            value="{{old('mobile_number', $user->mobile_number)}}" required autofocus />

                                        @error('mobile_number')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <x-label for="role_id" :value="__('Role')" />

                                        <select form="edit-form"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="role_id" id="role_id">
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected'
                                                : ''
                                                }}>{{ $role->role }} - {{ $role->description }}</option>
                                            @endforeach
                                        </select>

                                        @error('role_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5">
                                        <x-label for="status" :value="__('Status')" />

                                        <select form="edit-form"
                                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="status" id="status">

                                            <option value="active" {{ 'active'==$user->status ? 'selected' : ''
                                                }}>active</option>
                                            <option value="inactive" {{ 'inactive'==$user->status ? 'selected' : ''
                                                }}>inactive</option>
                                            <option value="banned" {{ 'banned'==$user->status ? 'selected' : ''
                                                }}>banned</option>
                                            <option value="pending" {{ 'pending'==$user->status ? 'selected' : ''
                                                }}>pending</option>
                                        </select>

                                        @error('status')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mt-5 flex">
                                        <div class="flex-3">
                                            <x-label for="avatar" :value="__('Avatar')" />

                                            <x-input form="edit-form" id="avatar" class="block mt-1 w-full" type="file"
                                                name="avatar" value="{{old('avatar', $user->avatar)}}" autofocus />

                                            @error('avatar')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mt-6">
                                            <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $user->avatar }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <p class="text-right">
                                            <x-button form="edit-form">
                                                Submit
                                            </x-button>
                                        </p>
                                    </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('layouts.notifications')
</body>

</html>