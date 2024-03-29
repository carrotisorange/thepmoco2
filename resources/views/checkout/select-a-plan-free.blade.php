<x-checkout-base-component>
    @section('title', 'Select a Plan | '. env('APP_NAME'))
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-gray-900">
        <div class="pt-12 px-4 sm:px-6 lg:px-8 lg:pt-20">
            <div class="text-center">
                {{-- <h2 class="text-xl leading-6 font-semibold text-gray-300">FREE 30-DAY ACCESS TO ALL PLANS</h2> --}}
                <p
                    class="mt-2 text-3xl tracking-tight font-bold text-white sm:text-4xl sm:tracking-tight lg:text-5xl lg:tracking-tight">
                    FREE 30-DAY ACCESS TO ALL PLANS</p>
                <p class="mt-3 max-w-4xl mx-auto text-xl text-gray-300 sm:mt-5 sm:text-2xl">Simplify your rental
                    operations with The PMO.</p>
            </div>
        </div>

        <div class="mt-16 bg-white pb-12 lg:mt-20 lg:pb-20">
            <div class="relative z-0">
                <div class="absolute inset-0 h-5/6 bg-gray-900 lg:h-2/3"></div>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="relative lg:grid lg:grid-cols-7">
                        <div
                            class="mx-auto max-w-md lg:mx-0 lg:max-w-none lg:col-start-1 lg:col-end-3 lg:row-start-2 lg:row-end-3">
                            <div
                                class="h-full flex flex-col rounded-lg shadow-lg overflow-hidden lg:rounded-none lg:rounded-l-lg">
                                <div class="flex-1 flex flex-col">
                                    <div class="bg-white px-6 py-10">
                                        <div>
                                            <h3 class="text-center text-2xl font-medium text-gray-900" id="tier-hobby">
                                                Basic
                                            </h3>
                                            <div class="mt-4 flex items-center justify-center">
                                                <span
                                                    class="px-3 flex items-start text-6xl tracking-tight text-gray-900">
                                                    <span class="mt-2 mr-2 text-4xl tracking-tight font-medium"> ₱
                                                    </span>
                                                    <span class="font-bold"> 950 </span>
                                                </span>
                                                <span class="text-xl font-medium text-gray-500"> /month </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex-1 flex flex-col justify-between border-t-2 border-gray-100 p-6 bg-gray-50 sm:p-10 lg:p-6 xl:p-10">
                                        <ul role="list" class="space-y-4">
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Unlimited properties
                                                </p>
                                            </li>

                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Up to 20 units</p>
                                            </li>

                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">1 user</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Basic Accounting</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Tenant & Owner
                                                    portal</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Contract management
                                                </p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Concerns</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Maintenance requests
                                                </p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Concierge</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Facilities
                                                    management</p>
                                            </li>
                                        </ul>
                                        <div class="mt-8">
                                            <div class="rounded-lg shadow-md">
                                                <a href="/plan/1/checkout/1/get"
                                                    class="block w-full text-center rounded-lg border border-transparent bg-white px-6 py-3 text-base font-medium text-purple-600 hover:bg-gray-50"
                                                    aria-describedby="tier-hobby"> Buy Now </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="mt-10 max-w-lg mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-start-3 lg:col-end-6 lg:row-start-1 lg:row-end-4">
                            <div class="relative z-10 rounded-lg shadow-xl">
                                <div class="pointer-events-none absolute inset-0 rounded-lg border-2 border-purple-600"
                                    aria-hidden="true"></div>
                                <div class="absolute inset-x-0 top-0 transform translate-y-px">
                                    <div class="flex justify-center transform -translate-y-1/2">
                                        <span
                                            class="inline-flex rounded-full bg-purple-600 px-4 py-1 text-base font-semibold text-white">
                                            Most popular </span>
                                    </div>
                                </div>
                                <div class="bg-white rounded-t-lg px-6 pt-12 pb-10">
                                    <div>
                                        <h3 class="text-center text-3xl tracking-tight font-semibold text-gray-900 sm:-mx-6"
                                            id="tier-growth">Advanced</h3>
                                        <div class="mt-4 flex items-center justify-center">
                                            <span
                                                class="px-3 flex items-start text-6xl tracking-tight text-gray-900 sm:text-6xl sm:tracking-tight">
                                                <span class="mt-2 mr-2 text-4xl tracking-tight font-medium"> ₱ </span>
                                                <span class="font-bold"> 1800 </span>
                                            </span>
                                            <span class="text-2xl font-medium text-gray-500"> /month </span>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="border-t-2 border-gray-100 rounded-b-lg pt-10 pb-8 px-6 bg-gray-50 sm:px-10 sm:py-10">
                                    <ul role="list" class="space-y-4">
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Unlimited properties
                                            </p>
                                        </li>

                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Up to 50 units</p>
                                        </li>

                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">5 users</p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Basic Accounting</p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Tenant & Owner portal
                                            </p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Contract management</p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Concerns</p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Maintenance requests</p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Concierge</p>
                                        </li>
                                        <li class="flex items-start">
                                            <div class="flex-shrink-0">
                                                <!-- Heroicon name: outline/check -->
                                                <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                            </div>
                                            <p class="ml-3 text-base font-medium text-gray-500">Facilities management
                                            </p>
                                        </li>
                                    </ul>
                                    <div class="mt-10">
                                        <div class="rounded-lg shadow-md">
                                            <a href="/plan/2/checkout/1/get"
                                                class="block w-full text-center rounded-lg border border-transparent bg-purple-600 px-6 py-4 text-xl leading-6 font-medium text-white hover:bg-purple-700"
                                                aria-describedby="tier-growth"> Buy Now </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="mt-10 mx-auto max-w-md lg:m-0 lg:max-w-none lg:col-start-6 lg:col-end-8 lg:row-start-2 lg:row-end-3">
                            <div
                                class="h-full flex flex-col rounded-lg shadow-lg overflow-hidden lg:rounded-none lg:rounded-r-lg">
                                <div class="flex-1 flex flex-col">
                                    <div class="bg-white px-6 py-10">
                                        <div>
                                            <h3 class="text-center text-2xl font-medium text-gray-900" id="tier-scale">
                                                Professional
                                            </h3>
                                            <div class="mt-4 flex items-center justify-center">
                                                <span
                                                    class="px-3 flex items-start text-6xl tracking-tight text-gray-900">
                                                    <span class="mt-2 mr-2 text-4xl tracking-tight font-medium"> ₱
                                                    </span>
                                                    <span class="font-bold"> 2400 </span>
                                                </span>
                                                <span class="text-xl font-medium text-gray-500"> /month </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex-1 flex flex-col justify-between border-t-2 border-gray-100 p-6 bg-gray-50 sm:p-10 lg:p-6 xl:p-10">
                                        <ul role="list" class="space-y-4">
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Unlimited properties
                                                </p>
                                            </li>

                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Up to 100 units</p>
                                            </li>

                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                              <p class="ml-3 text-base font-medium text-gray-500">Unlimited users
                                                    </p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Basic Accounting</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Tenant & Owner
                                                    portal</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Contract management
                                                </p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Concerns</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Maintenance requests
                                                </p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Concierge</p>
                                            </li>
                                            <li class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <!-- Heroicon name: outline/check -->
                                                    <svg class="flex-shrink-0 h-6 w-6 text-green-500"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </div>
                                                <p class="ml-3 text-base font-medium text-gray-500">Facilities
                                                    management</p>
                                            </li>
                                        </ul>
                                        <div class="mt-8">
                                            <div class="rounded-lg shadow-md">
                                                <a href="/plan/3/checkout/1/get"
                                                    class="block w-full text-center rounded-lg border border-transparent bg-white px-6 py-3 text-base font-medium text-purple-600 hover:bg-gray-50"
                                                    aria-describedby="tier-scale"> Buy Now </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-checkout-base-component>