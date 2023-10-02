<div class="mx-auto px-4 sm:px-6 lg:px-8">

    <div class="flex min-h-full flex-col bg-white lg:relative">
        <div class="flex flex-grow flex-col">
            <main class="flex flex-grow flex-col bg-white">
                <div class="mx-auto flex w-full max-w-7xl flex-grow flex-col px-4 sm:px-6 lg:px-8">

                    <div class="my-auto flex-shrink-0 py-16 sm:py-8">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="inline-block w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                        <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-800 sm:text-4xl">Concern Feature
                            Locked</h1>
                        <p class="mt-2 text-base text-purple-500">Unlock this feature for only <span
                                class="font-bold text-xl">₱300/month!</span></p>
                        <p class="mt-3 text-sm max-w-lg text-gray-600">Tenant concerns are usually about billing,
                            payments, contracts, house rules, or maintenance concerns. Billing, payments, and
                            contract
                            concerns are reduced through the <a href="receivable-bills-lock"
                                class="font-semibold text-purple-700">Billing and Payment Management</a> Feature or
                            <a href="contract-lock" class="font-semibold text-purple-700">Contract Management</a>
                            Feature.
                        </p>
                        <p class="mt-3 text-sm max-w-lg text-gray-600">As Landlords and property managers, we prefer
                            to
                            know our tenants concerns first so we can manage them before they use social media or
                            other
                            public portals to voice out their concerns. Great customer service is anticipating
                            concerns
                            and having a ready solution. Responding immediately to concerns is also a measure of
                            great
                            customer service.
                        </p>
                        <ul class="mt-5 text-sm max-w-lg font-md">

                            <li class=" mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-green-800 w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                tenant and owners can upload picture of their concerns
                            </li>



                            <li class=" mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-green-800 w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                landlord & management receives the concern in the dashbboard and respond
                            </li>







                            <li class=" mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-green-800 w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                can use as stand alone feature or together with the <a href="tenant-portal-lock"
                                    class="font-bold text-purple-700">TENANT PORTAL</a> for optimal end to end
                                concern
                                solution
                            </li>




                        </ul>
                        <div class="mt-8">
                            <div>
                                <x-button type="submit" onclick="window.location.href='/user/{{ auth()->user()->username }}/unlock'"
                                  >Unlock now</a></button>

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="hidden lg:absolute lg:inset-y-0 lg:right-0 lg:block lg:w-md">
            <img class="h-full w-full" src="{{ asset('/brands/concern-sample.png') }}" alt="concern feature">
        </div>
    </div>
</div>