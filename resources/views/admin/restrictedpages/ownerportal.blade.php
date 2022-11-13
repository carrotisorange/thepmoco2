<x-new-layout>
    @section('title','Owners | '. Session::get('property_name'))
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
                            <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-800 sm:text-4xl">Owner Portal
                                Feature Locked</h1>
                            <p class="mt-2 text-base text-purple-500">Unlock this feature for only <span
                                    class="font-bold text-xl">₱600/month!</span></p>
                            <p class="mt-5 text-sm max-w-lg text-gray-600">Real Estate Investors in Rental Properties
                                believe that real estate is the best investment not only because of the excellent return
                                on
                                their investment but because it is tangible qualities. However, not all real estate
                                investors want the work of managing their rental property. They prefer to hire the
                                services
                                of a professional leasing and property manager to oversee the day to day operations of
                                the
                                rental property. For professional leasing and property managers, it is part of our
                                responsibility to report to the owner all the transactions pertaining to their property
                                no
                                matter. </p>
                            <ul class="mt-5 text-sm max-w-lg font-md">

                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    gives viewing access to the property owner to view property status, transactions,
                                    payments, maintenance or repairs to be done
                                </li>



                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    gives owner approval for repair and maintenance works
                                </li>







                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    no need to create and send regular reports, just give owner portal access to owners
                                </li>




                                <li class=" max-w-md mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    works optimally with <a href="concern-lock"
                                        class="font-bold text-purple-700">CONCERNS
                                        MANAGEMENT</a> and <a href="receivable-bills-lock"
                                        class="font-bold text-purple-700">BILLING AND COLLECTION</a> features.
                                </li>

                            </ul>
                            <div class="mt-8">
                                <div>
                                    <button type="submit"
                                        onclick="window.location.href='/user/{{ auth()->user()->username }}/unlock'"
                                        class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-purple-700 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a
                                            href="check-page">Unlock now</a></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div class="hidden lg:absolute lg:inset-y-0 lg:right-0 lg:block lg:w-md">
                <img class="mt-20 h-80 w-fit" src="{{ asset('/brands/owner-portals.png') }}" alt="contracts feature">
            </div>
        </div>
    </div>
</x-new-layout>