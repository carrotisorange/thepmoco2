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
    <title>Sign In | The Property Manager</title>
</head>

<body>

    <div class="min-h-screen flex">
        <div class="flex-1 flex flex-col justify-center py-2 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
            <div class="mx-auto w-full max-w-sm lg:w-96">

                <div>
                    <img class="mt-10 mb-5 h-48 w-auto" src="{{ asset('/brands/logo_cropped.png') }}" alt="Workflow">
                    <h2 class="mb-10 text-center mt-2 text-2xl tracking-tight font-semibold text-gray-500">Sign in to
                        your account</h2>

                </div>

                <div class="mt-5">
                    <div>


                        <div class="mt-6 relative">

                        </div>
                    </div>

                    <div class="mt-6">
                        <form action="{{ route('login') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700"> Username </label>
                                <div class="mt-1">
                                    <input id="username" name="username" type="username" autocomplete="username"
                                        value="{{ old('username') }}" required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                @error('username')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password"
                                        required
                                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                @error('password')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
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
                                <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-500 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign
                                    in</button>
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