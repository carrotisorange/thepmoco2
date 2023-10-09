<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
    <title>Reset Password | {{ env('APP_NAME') }}</title>
</head>

<body class="font-sans antialiased" body x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">

    <div class="min-h-screen bg-white flex">
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute inset-0 h-full w-full object-cover" src="{{ asset('/brands/dashboard_home.png') }}"
                alt="">
        </div>
        <div class="flex-1 flex flex-col justify-center py-12 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <div>
                    <img class="object-cover h-40 w-48 mx-auto" src="{{ asset('/brands/full-logo.png') }}"
                        alt="Workflow">
                    <h2 class="text-3xl font-extrabold text-gray-900">
                        Set your new password
                    </h2>

                </div>

                <div class="mt-6">
                    <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email
                            </label>

                            <div class="mt-1">
                                <x-form-input id="email" name="email" type="email" autocomplete="email" required
                                    value="{{ old('email', $request->email) }}"/>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>
                            <div class="mt-1">
                                <x-form-input id="password" name="password" type="password" autocomplete="current-password"
                                    required/>
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Confirm Password
                            </label>
                            <div class="mt-1">
                                <x-form-input id="password_confirmation" name="password_confirmation" type="password"
                                    autocomplete="password_confirmation" required/>
                            </div>
                        </div>

                        <div>
                            <x-button class="w-full" type="submit">
                                Reset Password
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
</body>
@include('layouts.scripts')

</html>
