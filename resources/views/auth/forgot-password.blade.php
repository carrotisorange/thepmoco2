<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 

<head>
    @include('layouts.head')
      <title>Forgot Password | {{ env('APP_NAME') }}</title>
         <!-- Favicon -->
    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">
</head>

<body class="font-sans antialiased" body x-data="{'isModalOpen': false}" x-on:keydown.escape="isModalOpen=false">
    <div class="max-w-12xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="rounded-lg shadow-xl overflow-hidden lg:grid lg:grid-cols-2 lg:gap-4">
            <div class="pt-10 pb-12 px-6 sm:pt-16 sm:px-16 lg:py-16 lg:pr-0 xl:py-20 xl:px-20">
                <img class="object-cover h-40 w-48" src="{{ asset('/brands/'.env('APP_LOGO')) }}" alt="{{ env('APP_LOGO_DESC ') }}">
                <div class="lg:self-center">

                    <h2 class="text-3xl font-extrabold text-gray-800 sm:text-4xl">
                        <span class="block">Forgot your password?</span>
                        {{-- <span class="block">Start your free trial today.</span> --}}
                    </h2>
                    <p class="mt-4 text-lg leading-6 text-gray-700"> No problem. Just let us know your email
                        address and we will email you a
                        password reset link that will allow you to choose a new one.</p>
                    <!-- Validation Errors -->
                    {{--
                    <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                    <form class="mt-8 sm:flex" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <label for="email" class="sr-only">Email address</label>
                        <x-form-input id="email" name="email" type="email" autocomplete="email" required
                            value="{{ old('email') }}"
                          
                            placeholder="Enter your email"/>
                        <div class="mt-3 sm:mt-0 sm:ml-3 sm:flex-shrink-0">
                            <x-button type="submit">
                                Email Password Reset Link
                            </x-button>
                        </div>
                    </form>

                    <!-- Session Status -->
                    <div class="mt-4 mb-4 font-medium text-md text-white-600">
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                    </div>

                    <div class="mt-4 mb-4 font-medium text-md text-red-600">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>
                </div>

                <div class="flex items-center">
                    <div class="text-md">
                        Does not have an account?
                        <a href="/select-a-plan" class="font-medium text-white-600 hover:text-white-500">
                            Sign up here.
                        </a>
                    </div>
                </div>
            </div>
            <div class="-mt-6 aspect-w-5 aspect-h-3 md:aspect-w-2 md:aspect-h-1">
                <img class="transform translate-x-6 translate-y-6 rounded-md object-cover object-left-top sm:translate-x-16 lg:translate-y-20"
                    src="{{ asset('/brands/success_property.png') }}" alt="App screenshot">
            </div>
        </div>
    </div>
</body>
@include('layouts.scripts')

</html>
