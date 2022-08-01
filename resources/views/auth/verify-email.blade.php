<x-checkout-base-component>
    @section('title', 'Verify Email | The Property Manager')

    <div class="bg-gray-50 sm:pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-xs font-bold text-gray-900 sm:text-4xl">

                </h2>
                <p class="text-xl text-gray-500 sm:mt-4">
                    Thanks for signing up! Before getting started, could you verify your email address by
                    clicking on
                    the
                    link we just emailed to you? If you didn't receive the email, we will gladly send you
                    another.

                    @if (session('status') == 'verification-link-sent')
                    <div class="font-medium text-sm text-white-600">
                        A new verification link has been sent to the email address you provided during
                        registration.
                    </div>

                @endif

                <div class="mt-4 flex items-center justify-between p-2">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-button>
                                {{ __('Resend Verification Email') }}
                            </x-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
                </p>
            </div>
        </div>
        <div class="bg-white sm:pb-16">
            <div class="relative">
                <div class="absolute inset-0 h-1/2 bg-gray-50"></div>
                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                </div>
            </div>
        </div>
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-purple-800">
        <div class="max-w-7xl mx-auto py-5 px-4 sm:py-16 sm:px-6 lg:px-8 lg:py-20">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-1xl font-bold text-white sm:text-4xl">
                    The service you deserve, with the people you trust.
                </h2>
                <p class="mt-3 text-xl text-indigo-200 sm:mt-4">
                    Simplify your rental operations with The PMO
                </p>
            </div>
            <dl class="mt-10 text-center sm:max-w-3xl sm:mx-auto sm:grid sm:grid-cols-3 sm:gap-8">
                <div class="flex flex-col">
                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                        Customer Support
                    </dt>
                    <dd class="order-1 text-5xl font-extrabold text-white">
                        24/7
                    </dd>
                </div>

                <div class="flex flex-col mt-10 sm:mt-0">
                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                        Statistics and Reports
                    </dt>
                    <dd class="order-1 text-5xl font-extrabold text-white">
                        Real-time
                    </dd>
                </div>
                <div class="flex flex-col mt-10 sm:mt-0">
                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-indigo-200">
                        Properties
                    </dt>
                    <dd class="order-1 text-5xl font-extrabold text-white">
                        Unlimited
                    </dd>
                </div>
            </dl>
        </div>
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->


</x-checkout-base-component>