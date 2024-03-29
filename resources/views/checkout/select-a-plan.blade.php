<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Sign up | {{ env('APP_NAME') }}</title>
</head>

<style>
    body {
        font-family: Poppins;
    }
</style>

<body>

    <html>

    <body class="h-min">

        <div class="hidden lg:block relative flex-1 items-center justify-center">
            <img class="absolute inset-0 w-auto pt-32 ml-10" src="{{ asset('/brands/signup_vector.png') }}" alt="">
            <img class="absolute inset-0 w-32 py-12 ml-10" src="{{ asset('/brands/'.env('APP_LOGO')) }}" alt="">
        </div>
        <div class="">
            <div class="flex-1 flex flex-col py-2 px-4 sm:px-6 lg:flex-none lg:px-10 ">
                <div class="grid grid-cols-1 gap-y-6 gap-x-10 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                    <div class="w-full max-w-sm">
                        <div class="sm:col-span-1">


                        </div>

                    </div>

                    <div class="pt-20">
                        <h2 class="text-center text-2xl tracking-tight font-semibold text-gray-900 mb-5">Create an
                            Account
                        </h2>
                        <form
                            class="px-5 sm:px-5 md:px-10 lg:px-20 space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2"
                            action="/register" method="POST">
                            @csrf

                            <div class="mt-1">
                                <x-label for="username"> Full Name</x-label>
                                <div class="mt-1">
                                    <x-input id="name" name="name" type="text" value="{{ old('name') }}" />
                                </div>
                            </div>
                            <div class="mt-1">
                                <x-label for="gender"> Gender</x-label>
                                <div class="mt-1">
                                    <x-select id="gender" name="gender">
                                        <option value="">Select one</option>
                                        <option value="female" {{ 'female'==old('gender') ? 'Select one' : 'selected' }}>female
                                        </option>
                                        <option value="male" {{ 'male'==old('gender') ? 'Select one' : 'selected' }}>male
                                        </option>
                                    </x-select>
                                </div>
                            </div>

                            <div class="lg:col-span-2 mt-5">
                                <x-label for="username"> Username</x-label>
                                <div class="mt-1">
                                    <x-input id="username" name="username" type="text" value="{{ old('username') }}" />
                                </div>
                            </div>

                            <div class="lg:col-span-2 mt-5">
                                <x-label for="email"> Email </x-label>
                                <div class="mt-1">
                                    <x-input id="email" name="email" type="email" value="{{ old('email') }}" />
                                </div>
                            </div>

                            <div class="lg:col-span-2 mt-5">
                                <x-label for="mobile_number"> Mobile </x-label>
                                <div class="mt-1">
                                    <x-input id="mobile_number" name="mobile_number" type="text"
                                        value="{{ old('mobile_number') }}" />
                                </div>
                            </div>

                            <div class="mt-5">
                                <x-label for="password"> Password </x-label>
                                <div class="mt-1">
                                    <x-input id="password" name="password" type="password" autocomplete="password"
                                        value="{{ old('password') }}" />
                                </div>
                            </div>

                            <div class="mt-5">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                    Confirm
                                    Password
                                </label>
                                <div class="mt-1">
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                                </div>
                            </div>


                            <div class="mt-5 text-sm text-center lg:col-span-2">
                                By clicking the sign up below, you agree to the <a href="/terms"
                                    target="_blank" class="font-medium text-indigo-600 hover:text-indigo-500">Terms &
                                    Conditions</a> and <a href="/privacy" target="_blank"
                                    class="font-medium text-indigo-600 hover:text-indigo-500">Privacy
                                    Policy</a>
                            </div>


                            <div class="lg:col-span-2">
                                <button type="submit" class="w-64 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center
bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mt-5 w-full">Sign
                                    up</button>
                            </div>

                            <div class="mt-5 text-sm text-center lg:col-span-2">
                                Already have an account? <a href="/login"
                                    class="font-medium text-indigo-600 hover:text-indigo-500">Sign in. </a>
                            </div>

                        </form>


                    </div>
                </div>


    </body>

    </html>
