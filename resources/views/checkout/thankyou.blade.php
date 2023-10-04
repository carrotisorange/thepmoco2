<x-checkout-base-component>
    @section('title', 'Thank you | '. env('APP_NAME'))

    <div class="container px-4 -mx-auto">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="bg-white">
            <div class="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    <span class="block">Thanks for Signing Up</span>

                </h2>
                <p class="mt-4 text-lg leading-6 text-dark-200">Start managing your property now.
                <p>
                <div class="mt-8 flex justify-center">
                    <div class="inline-flex rounded-md shadow">
                        <a href="/profile/{{ $temporary_username }}/complete"
                            class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                            Get Started
                        </a>
                    </div>
                    {{-- <div class="ml-3 inline-flex">
                        <a href="#"
                            class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
                            Learn more
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative bg-gray-800">
        <div class="h-50 bg-indigo-600 sm:h-50 md:absolute md:left-0 md:h-full md:w-1/2">
            <img class="w-full h-full" src="{{ asset('/brands/dashboard_tenant.png') }}">
        </div>
        <div class="relative max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
            <div class="md:ml-auto md:w-1/2 md:pl-10">
                <h2 class="text-base font-semibold uppercase tracking-wider text-gray-300">
                    Award winning support
                </h2>
                <p class="mt-2 text-white text-3xl font-extrabold tracking-tight sm:text-4xl">
                    We’re here to help
                </p>
                <p class="mt-3 text-lg text-gray-300">
                    Our vision is to be the go-to property manager online tools and resources and to continue our growth
                    by providing our
                    clients quality and total management system as a service that adds value to their rental property
                    business.
                </p>
                <div class="mt-8">
                    <div class="inline-flex rounded-md shadow">
                        <a href="/support" target="_blank"
                            class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">
                            Visit the help center
                            <!-- Heroicon name: solid/external-link -->
                            <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                <path
                                    d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-checkout-base-component>
