<x-new-layout>
    @section('title','Tenants | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex min-h-full flex-col bg-white lg:relative">
                    <div class="flex flex-grow flex-col">
                        <main class="flex flex-grow flex-col bg-white">
                            <div class="mx-auto flex w-full max-w-7xl flex-grow flex-col px-4 sm:px-6 lg:px-8">

                                <div class="my-auto flex-shrink-0 py-16 sm:py-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                    <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-800 sm:text-4xl">
                                        Tenant Portal Feature Locked</h1>
                                    <p class="mt-2 text-base text-purple-500">Unlock this feature for only <span
                                            class="font-bold text-xl">₱600/month!</span></p>

                                    <p class="mt-5 text-sm max-w-lg text-gray-600">Great customer experience is
                                        possible through tech enabled experiences. Reduce face to face contact and
                                        still build that rapport with your tenant is possible with a tenant portals.
                                        In this digital age, technology enablement is vital for a harmonious
                                        experience between tenants and rental business. This will form part of your
                                        competitive advangate over other landlords.
                                    </p>
                                    <ul class="mt-5 text-sm max-w-lg font-md">


                                        <li class=" mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="text-green-800 w-5 h-5 inline-block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            allows tenant to view their bills, payment history
                                        </li>

                                        <li class=" mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="text-green-800 w-5 h-5 inline-block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            allows tenant to upload proof of payment for rent and other bills
                                        </li>

                                        <li class=" mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="text-green-800 w-5 h-5 inline-block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            allows tenant to view contracts and request for moveout
                                        </li>

                                        <li class=" mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="text-green-800 w-5 h-5 inline-block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            allows tenant to send concerns
                                        </li>




                                        <li class=" mb-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor"
                                                class="text-green-800 w-5 h-5 inline-block">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            works well with <a href="concern-lock"
                                                class="font-bold text-purple-700">CONCERNS
                                                MANAGEMENT</a> and <a href="receivable-bills-lock"
                                                class="font-bold text-purple-700">BILLS
                                                AND PAYMENT MANAGEMENT</a>
                                        </li>




                                    </ul>
                                    <div class="mt-8">
                                        <div>
                                            <button type="submit"
                                                onclick="window.location.href='/user/{{ auth()->user()->username }}/unlock'"
                                                class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-purple-700 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Unlock
                                                now</a></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>

                    </div>
                    <div class="hidden lg:absolute lg:inset-y-0 lg:right-0 lg:block lg:w-md">
                        <img class=" h-full w-full pr-10" src="{{ asset('/brands/tenant-sample.png') }}"
                            alt="tenant portal feature">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-new-layout>