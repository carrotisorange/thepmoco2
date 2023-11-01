<x-checkout-base-component>
    @section('title', 'Profile | '. env('APP_NAME'))

    <div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
        <div class="relative max-w-xl mx-auto">
            <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none"
                viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                        patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
            </svg>
            <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none"
                viewBox="0 0 404 404" aria-hidden="true">
                <defs>
                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20"
                        patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
            </svg>
            <div class="text-center">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Set up your account
                </h2>
                {{-- <p class="mt-4 text-lg leading-6 text-gray-500">
                    Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien tortor
                    lacus arcu.
                </p> --}}
            </div>
            <div class="mt-12">
                <form action="/profile/{{ $user->username }}/complete/update" method="POST" id="edit-form"
                    enctype="multipart/form-data" class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    @csrf
                    @method('PATCH')
                    <div class="sm:col-span-2">
                        <x-label>Username</x-label>
                        <div class="mt-1">
                            <input type="text" name="username" id="username" autocomplete="username" value="{{old('username')}}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                        <x-validation-error-component name='username' />
                    </div>
                    <div class="sm:col-span-2">
                        <x-label>Email address</x-label>
                        <div class="mt-1">
                            <input type="text" name="email" id="email" autocomplete="email"
                                value="{{old('email', $user->email)}}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                      <x-validation-error-component name='email' />
                    </div>
                    <div class="sm:col-span-2">
                        <x-label>Mobile Number</x-label>
                        <div class="mt-1">
                            <input type="text" name="mobile_number" id="mobile_number" autocomplete="organization"
                                value="{{old('mobile_number', $user->mobile_number)}}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                       <x-validation-error-component name='mobile_number' />
                    </div>

                    <div>
                        <x-label>Password</x-label>
                        <div class="mt-1">
                            <input type="password" name="password" id="password" autocomplete="password"
                                {{old('password')}}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                     <x-validation-error-component name='password' />
                    </div>
                    <div>
                        <x-label for="last-name" class="block text-sm font-medium text-gray-700">Confirm Password</x-label>
                        <div class="mt-1">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                autocomplete="password_confirmation" value="{{old('password_confirmation')}}"
                                class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                       <x-validation-error-component name='password_confirmation' />
                    </div>

                    <div class="sm:col-span-2">
                        <x-button type="submit">
                            Submit
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-checkout-base-component>
