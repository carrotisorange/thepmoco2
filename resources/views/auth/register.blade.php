<x-guest-layout>
    @section('title', 'Register | '. env('APP_NAME'))
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img class="h-48 w-15" src="{{ asset('/brands/full-logo.png') }}" />
            </a>
        </x-slot>

        <div class="py-8">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                        autofocus />

                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="username" :value="__('Username')" />

                    <x-input id="username" class="block mt-1 w-full" type="text" name="username"
                        :value="old('username')" required />

                    @error('username')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mobile Number -->
                <div class="mt-4">
                    <x-label for="mobile_number" :value="__('Mobile Number')" />

                    <x-input id="mobile_number" class="block mt-1 w-full" type="number" name="mobile_number"
                        :value="old('mobile_number')" required />
                </div>

                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required />


                </div>

                <div class="mt-4">

                    <div class="form-check">
                        <input name="terms_of_use"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="{{ old('terms_of_user') }}" id="flexCheckDefault" required>
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                            <a class="text-blue-600" href="#/" data-modal-toggle="terms-and-use">Terms of Use</a>
                        </label>
                    </div>


                </div>

                <div class="mt-4">

                    <div class="form-check">
                        <input name="privacy_and_policy"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="{{ old('privacy_and_policy') }}" id="flexCheckDefault" required>
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                            <a class="text-blue-600" href="#/" data-modal-toggle="privacy-policy">Privacy and Policy</a>
                        </label>
                    </div>


                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
        @include('websites.terms-of-use')
        @include('websites.privacy-policy')

    </x-auth-card>
</x-guest-layout>
