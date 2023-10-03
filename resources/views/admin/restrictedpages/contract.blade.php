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
                        <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-800 sm:text-4xl">
                            Contract Feature Locked</h1>
                        <p class="mt-2 text-base text-purple-500">Unlock this feature for only <span
                                class="font-bold text-xl">₱300/month!</span></p>
                        <p class="mt-5 text-sm max-w-lg text-gray-600">Lease Contracts are the backbone
                            of a rental property business. This defines the obligations of the landlord
                            or property owner to provide the space to the tenant for the duration of the
                            contract for a fee and the tenants obligations to the landlord and the
                            property for the duration of the lease period. It's best practice to have a
                            written lease agreement between landlord and tenant that both parties have
                            copies of or have access to. </p>
                        <ul class="mt-5 text-sm max-w-lg font-md">

                            <li class=" mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-green-800 w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                upload lease contracts for easy access anytime, anywhere
                            </li>



                            <li class=" mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-green-800 w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                helps keep track of all leases
                            </li>







                            <li class=" mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-green-800 w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                help landlords renew lease/advertise space to reduce vacancy periods
                            </li>


                            <li class=" mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-green-800 w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>

                                editable lease contract template available for use
                            </li>

                            <li class=" max-w-md mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="text-green-800 w-5 h-5 inline-block">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                gets tenant notified of expiring contracts (available to Tenant through
                                <a href="tenant-portal-lock" class="font-bold text-purple-700">TENANT
                                    PORTAL</a> for moveout request/renewal of contract)
                            </li>

                        </ul>
                        <div class="mt-8">
                            <div>
                                <x-button type="submit" onclick="window.location.href='/user/{{ auth()->user()->username }}/unlock'"
                                   >Unlock now</a></x-button>

                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
        <div class="hidden lg:absolute lg:inset-y-0 lg:right-0 lg:block lg:w-md">
            <img class="mt-20 h-80 w-fit" src="{{ asset('/brands/contracts.png') }}" alt="contract feature">
        </div>
    </div>
</div>