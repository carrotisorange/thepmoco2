<x-checkout-base-component>
    @section('title', 'Select a Plan | The Property Manager')
    <section class="">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-purple-900 dark:text-white">
                    Choose the right plan for your property</h2>
                <p class="mb-5 font-light text-dark-500 sm:text-xl dark:text-purple-400">
                    Here at The Property Manager w continue to innovate and improve our systems, tools, and resources to
                    incorporate tested policies and procedures, best practices, and best in
                    customer service.</p>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                <!-- Pricing Card -->
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Basic</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                        Best option for small property.</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">Php 950</span>
                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Unlimited Properties</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>1-20 units</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>1 user <span class="font-semibold">
                                </span>(manager)</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Accounting<span class="font-semibold">
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Tenant and Owner Portals<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-red-600 fa-xmark"></i>

                            <span>Contract management<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-red-600 fa-xmark"></i>
                            <span>Concerns<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-red-600 fa-xmark"></i>
                            <span>Maintenance requests<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-red-600 fa-xmark"></i>
                            <span>Concierge<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-red-600 fa-xmark"></i>
                            <span>Facilities management<span class="font-semibold">
                                </span></span>
                        </li>
                    </ul>
                    <a href="/plan/1/checkout/2/get"
                        class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get
                        started</a>
                </div>
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Advanced</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                        Relevant for multiple properties.</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">Php 1800</span>
                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Unlimited Properties</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Up to 50 units</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>5 users <span class="font-semibold">
                                </span>(manager, admin, treasury, billing, and account payables)</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Accounting<span class="font-semibold">
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Tenant and Owner Portals<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Contract management<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Concerns<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Maintenance requests<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-red-600 fa-xmark"></i>
                            <span>Concierge<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-red-600 fa-xmark"></i>
                            <span>Facilities management<span class="font-semibold">
                                </span></span>
                        </li>
                    </ul>
                    <a href="/plan/2/checkout/2/get"
                        class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get
                        started</a>
                </div>
                <div
                    class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                    <h3 class="mb-4 text-2xl font-semibold">Professional</h3>
                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                        Best for large and multiple properties.</p>
                    <div class="flex justify-center items-baseline my-8">
                        <span class="mr-2 text-5xl font-extrabold">Php 2500</span>
                        <span class="text-gray-500 dark:text-gray-400">/month</span>
                    </div>
                    <!-- List -->
                    <ul role="list" class="mb-8 space-y-4 text-left">
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Unlimited Properties</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Up to 100 units</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Unlimited users <span class="font-semibold">
                                </span>(manager, admin, treasury, billing, and account payables)</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Accounting<span class="font-semibold">
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Tenant and Owner Portals<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Contract management<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Concerns<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Maintenance requests<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Concierge<span class="font-semibold">
                                </span></span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <!-- Icon -->
                            <i class="fa-solid text-green-600 fa-check"></i>
                            <span>Facilities management<span class="font-semibold">
                                </span></span>
                        </li>
                    </ul>
                    <a href="/plan/3/checkout/2/get"
                        class="text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Get
                        started</a>
                </div>
            </div>
        </div>
    </section>
</x-checkout-base-component>