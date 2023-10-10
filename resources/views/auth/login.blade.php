<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Sign in | {{ env('APP_NAME') }}</title>
<style>
    body{
        font-family: Poppins;
    }
</style>
</head>

<body>

    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col justify-center py-2 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">

                <div class="flex justify-center items-center">
                    <img class="mt-10 mb-5 h-32 w-auto" src="{{ asset('/brands/'.env('APP_LOGO_V2')) }}" alt="propsuite logo">

                </div>
                <h2 class="mb-10 mt-2 text-lg tracking-tight text-purple-700">"{{ $randomQuote['quoteText']}}"
                   <br> <span class="text-sm italic text-right"> - {{ $randomQuote['quoteAuthor'] }}</span>
                </h2>

                <div class="mt-5">
                    <div>


                        <div class="mt-6 relative">

                        </div>
                    </div>

                    <div class="mt-6">
                        <form action="{{ route('login') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <x-label for="username" > Username/Email </x-label>
                                <div class="mt-1">
                                    <x-input id="username" name="username" type="username" autocomplete="username"
                                        value="{{ old('username') }}" required/>
                                </div>

                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                                <div class="mt-1">
                                    <x-input id="password" name="password" type="password" autocomplete="current-password"/>
                                </div>

                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <input id="remember-me" name="remember-me" type="checkbox"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me
                                    </label>
                                </div>

                                <div class="text-sm">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                        class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot
                                        your
                                        password? </a>

                                    @endif

                                </div>
                            </div>

                            <div>
                                <x-button class="mt-5 w-full" type="submit">Sign
                                    in</x-button>
                            </div>

                            <div class="text-sm text-center">
                                Don't have an account? <a href="/select-a-plan"
                                    class="font-medium text-indigo-600 hover:text-indigo-500">Sign
                                    up. </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block relative w-0 flex-1">
            <img class="absolute h-full w-full object-cover" src="{{ asset('/brands/signin.jpeg') }}" alt="">

        </div>
    </div>

</body>



</html>
