<x-landing-page-template>
    @section('title','The PMO — Demo')
    @section('description', 'A product to make easy the life of property managers and property owners. The property
    management system is a handy application to simplify operations in rental properties from tenant finding, lease
    contract management, billing and collection management, and concerns and maintenance requests for landlords,
    dormitories, apartment rentals, and other rentals.')

    <div class="mt-8 bg-white min-h-screen">
        <h2 class="p-5 text-lg text-center"><span class="font-bold text-purple-700">The Property Manager Online</span>
            Video
            Demo</h2>
        <div class="flex items-center justify-center">
            <video class="w-full max-w-2xl h-auto rounded-lg border border-gray-200 dark:border-gray-700" controls>
                <source src="/brands/landing/demo-cut-1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <p class="pt-5 text-center text-light text-sm">A demo video for creating a property, adding units and tenants.
        <p class="text-center text-light text-sm"><span class="font-semibold text-purple-700"><a
                    href="/select-a-plan">Subscribe</a></span> to The PMO for a full demo!</p>
        </p>
    </div>



    <!-- CONTACT US SECTION -->

    <div>
        <div class="">
            <div class="relative bg-white shadow-xl">
                <h2 class="sr-only">Contact us</h2>

                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Contact information -->
                    <div class="px-5 relative overflow-hidden bg-gray-700 py-10 sm:px-10 xl:p-12">
                        <div class="pointer-events-none absolute inset-0 sm:hidden" aria-hidden="true">
                            <svg class="absolute inset-0 h-full w-full" width="343" height="388" viewBox="0 0 343 388"
                                fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z"
                                    fill="url(#linear1)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 sm:block lg:hidden"
                            aria-hidden="true">
                            <svg class="absolute inset-0 h-full w-full" width="359" height="339" viewBox="0 0 359 339"
                                fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z"
                                    fill="url(#linear2)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 lg:block"
                            aria-hidden="true">
                            <svg class="absolute inset-0 h-full w-full" width="160" height="678" viewBox="0 0 160 678"
                                fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                                <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z"
                                    fill="url(#linear3)" fill-opacity=".1" />
                                <defs>
                                    <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66"
                                        gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#fff"></stop>
                                        <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-medium text-white">Contact Us</h3>
                        <h3 class="mt-2 text-xl font-medium text-white">{{ env('APP_NAME') }}</h3>
                        <p class="mt-6 max-w-3xl text-base text-indigo-50">{{ env('APP_SECOND_ADDRESS') }}</p>
                        <p class="mt-6 max-w-3xl text-base text-indigo-50">{{ env('APP_FIRST_ADDRESS') }}</p>
                        <dl class="mt-8 space-y-6">
                            <dt><span class="sr-only">Phone number</span></dt>
                            <dd class="flex text-base text-indigo-50">
                                <!-- Heroicon name: outline/phone -->
                                <svg class="h-6 w-6 flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                <span class="ml-3">{{ env('APP_MOBILE ') }}</span>
                            </dd>
                            <dt><span class="sr-only">Email</span></dt>
                            <dd class="flex text-base text-indigo-50">
                                <!-- Heroicon name: outline/envelope -->
                                <svg class="h-6 w- flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                </svg>
                                <span class="ml-3">sales@thepmo.co</span>
                            </dd>
                        </dl>
                        <ul role="list" class="mt-8 flex space-x-12">
                            <li>
                                <a class="text-indigo-200 hover:text-indigo-100"
                                    href="https://www.{{  env('APP_FACEBOOK_PAGE') }}">
                                    <dt><span class="sr-only">Facebook</span></dt>
                                    <dd class="flex text-base text-indigo-50">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" aria-hidden="true">
                                            <path
                                                d="M22.258 1H2.242C1.556 1 1 1.556 1 2.242v20.016c0 .686.556 1.242 1.242 1.242h10.776v-8.713h-2.932V11.39h2.932V8.887c0-2.906 1.775-4.489 4.367-4.489 1.242 0 2.31.093 2.62.134v3.037l-1.797.001c-1.41 0-1.683.67-1.683 1.653v2.168h3.362l-.438 3.396h-2.924V23.5h5.733c.686 0 1.242-.556 1.242-1.242V2.242C23.5 1.556 22.944 1 22.258 1"
                                                fill="currentColor" />
                                        </svg>
                                        <span class="ml-3">{{ env('APP_FACEBOOK_PAGE') }}</span>
                                    </dd>
                                    </dl>
                                </a>
                            </li>
                            <li>

                            </li>
                        </ul>
                    </div>

                    <!-- Contact form -->
                    <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">

                        <form action="https://formsubmit.co/f694a11ef780365f3384eeda25acb3fc" method="POST"
                            class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-900">First
                                    name</label>
                                <div class="mt-1">
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                        class="bg-indigo-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-900">Last name</label>
                                <div class="mt-1">
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                        class="bg-indigo-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        class="bg-indigo-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                            <div>

                                <div class="flex justify-between">
                                    <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                                    <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
                                </div>
                                <div class="mt-1">
                                    <textarea id="message" name="message" rows="1"
                                        class="bg-indigo-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        aria-describedby="message-max"></textarea>
                                </div>
                            </div>



                            <div class="sm:col-span-2">

                                <label for="country" class="block text-sm font-medium text-gray-700"> Property Type:
                                </label>
                                <div class="mt-5">


                                    <ul><input type="checkbox" id="condominium-association"> Condominium Association
                                    </ul>
                                    <ul><input type="checkbox" id="condominium-units"> Condominium Units</ul>
                                    <ul><input type="checkbox" id="student-accomodation"> Student Accomodation</ul>
                                    <ul><input type="checkbox" id="hoa"> HOA</ul>
                                    <ul><input type="checkbox" id="dormitory"> Dormitory</ul>
                                    <ul><input type="checkbox" id="commcercial"> Commercial</ul>
                                    <ul><input type="checkbox" id="self-storage"> Self storage</ul>
                                    <ul><input type="checkbox" id="senior-living"> Senior Living</ul>
                                    <ul><input type="checkbox" id="residential-apartments"> Residential Apartments</ul>
                                    <ul><input type="checkbox" id="bed-and-breakfast"> Bed and breakfast</ul>
                                    <ul><input type="checkbox" id="transient"> Transient</ul>



                                </div>
                            </div>




                            <div class="sm:col-span-2 sm:flex sm:justify-end">
                                <button type="submit"
                                    class="mt-2 inline-flex w-full items-center justify-center rounded-full border border-transparent bg-purple-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-landing-page-template>