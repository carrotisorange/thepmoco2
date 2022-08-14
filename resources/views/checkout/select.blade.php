<x-checkout-base-component>
    @section('title', 'Select a Plan | The Property Manager')
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:flex-col sm:align-center">
                <h1 class="text-5xl font-extrabold text-gray-900 sm:text-center">Pricing Plans</h1>
                <p class="mt-5 text-xl text-gray-500 sm:text-center">Simplify your rental operations with The PMO.</p>
                <h1 class="text-3xl p-2 font-extrabold text-gray-900 sm:text-center line-through">Normal Price: 2500 PER MONTH</h1>
                <h1 class="text-4xl p-2 font-extrabold text-gray-900 sm:text-center">ONLY 950/MONTH</h1>
                <div class="relative self-center mt-1 bg-gray-100 rounded-lg p-0.5 flex sm:mt-8">
                    <button type="button"
                        class="relative w-1/2 bg-white border-gray-200 rounded-md shadow-sm py-2 text-sm font-medium text-gray-900 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:z-10 sm:w-auto sm:px-8">
                        Exclusive offer for the first 6 months for only 950
                    </button>
                    {{-- <button type="button"
                        class="ml-0.5 relative w-1/2 border border-transparent rounded-md py-2 text-sm font-medium text-gray-700 whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:z-10 sm:w-auto sm:px-8">Yearly
                        billing</button> --}}
                </div>
            </div>
            <div
                class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-2xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-2">
                <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200">
                    <div class="p-6">
                        <h2 class="text-lg leading-6 font-medium text-gray-900">Discount</h2>
                        <p class="mt-4 text-2xl text-gray-500">62% OFF</p>
                    </div>
                    <div class="pt-6 pb-8 px-6">
                        {{-- <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                        --}}
                        <ul role="list" class="divide-y divide-gray-200 border-b border-gray-200">
                            <li class="flex py-6 space-x-6">
                                <img src="{{ asset('/brands/full-logo.png') }}" alt=""
                                    class="flex-none w-80 h-40 object-center object-cover bg-gray-200 rounded-md">
                                <div class="flex flex-col justify-between space-y-4">
                                    <div class="text-sm font-medium space-y-1">
                                        {{-- <h3 class="text-gray-900">{{ $selected_plan->plan }} plan</h3>
                                        <p class="text-gray-900">₱{{ number_format($selected_plan->price, 2) }}/month
                                        </p>
                                        <p class="text-gray-500">Limited to {{ $selected_plan->description }} units</p>
                                        --}}

                                    </div>

                                </div>
                            </li>

                            <!-- More products... -->
                        </ul>
                    </div>
                    {{-- <div class="p-6">
                        <a href="/plan/3/checkout/2/get"
                            class="mt-8 block w-full bg-purple-800 border border-gray-800 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-purple-900">
                            <span class="line-through"> </span> Buy Now for only 950/month</a>
                    </div> --}}
                </div>
                <div class="border border-gray-200 rounded-lg shadow-sm divide-y divide-gray-200">
                    <div class="p-6">
                        <h2 class="text-lg leading-6 font-medium text-gray-900">Professional</h2>
                        <p class="mt-4 text-sm text-gray-500">Best for all time of rental properties.</p>
                    </div>
                    <div class="pt-6 pb-8 px-6">
                        <h3 class="text-xs font-medium text-gray-900 tracking-wide uppercase">What's included</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500"><span
                                        class="text-1xl font-extrabold">Unlimited</span> properties</span>
                            </li>

                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500">Up to 100 units</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500"><span
                                        class="text-1xl font-extrabold">Unlimited</span> users</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500">Accounting</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500">Tenant & Owner portal</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500">Contract management</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500">Concerns</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500">Maintenance requests</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500">Concierge</span>
                            </li>
                            <li class="flex space-x-3">
                                <!-- Heroicon name: solid/check -->
                                <i class="fa-solid text-green-600 fa-check"></i>
                                <span class="text-sm text-gray-500">Facilities management</span>
                            </li>
                        </ul>
                    </div>
                    <div class="p-2">
                        <a href="/plan/3/checkout/2/get"
                            class="mt-8 block w-full bg-purple-800 border border-gray-800 rounded-md py-2 text-sm font-semibold text-white text-center hover:bg-purple-900">
                            <span class="line-through"> </span> Buy Now for only 950/month</a>

                        <p class="mt-5 text-xl text-gray-500 sm:text-center">Cancel Anytime! 100% secure payment.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-checkout-base-component>