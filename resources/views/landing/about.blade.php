<x-landing-page-template>
    @section('title', env('APP_NAME').' | About')
    @section('description', 'A product to make easy the life of property managers and property owners. The property
    management system is a handy application to simplify operations in rental properties from tenant finding, lease
    contract management, billing and collection management, and concerns and maintenance requests for landlords,
    dormitories, apartment rentals, and other rentals.')

    <style>
        .propsuite-bg {
            background-image: url('/brands/propsuite/propsuite-bg.png');
        }

        .purple {
            background-color: #4F3F6D;
        }

        .darkPurple {
            color: #4F3F6D;
        }
    </style>

    <body class="purple">
        <div class="propsuite-bg mt-0 lg:-mt-4 pb-16 sm:pb-20">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto py-48 sm:py-48 lg:py-48">
                    <div class="text-center">
                        <h1 class="text-2xl font-bold tracking-wide text-white sm:text-5xl leading-8">We provide <span
                                class="darkPurple">full suite digital</span> solution <br> for rental property
                            communities <br>and home
                            owners associations.</h1>
                    </div>
                </div>


                <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                    aria-hidden="true">
                    <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                    </div>
                </div>
            </div>


        </div>

        <x-partner></x-partner>

        <!-- value  -->

        <div class="min-h-fit" id="about">
            <style>
                #about {
                    background-color: #5D5270;
                }
            </style>
            <div class=" lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-8 lg:px-8">


                <div class="mt-12 lg:col-start-1 lg:m-0 lg:pl-20">
                    <div class="py-20 mx-auto px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0 lg:py-20">
                        <blockquote>
                            <div>

                                <span class="text-4xl font-bold text-indigo-100">{{ env('APP_NAME') }}</span>
                                <p class="mt-6 text-base font-light text-gray-300 tracking-wide">is a system as a
                                    service
                                    company that gives real-time, reliable, easy digital
                                    solution to long-term rental property owners, and
                                    managers to improve transparency and efficiency in
                                    business operations.

                                    Unlike manual processes, we provide a full-suite solution
                                    that allows business owners to run their operations
                                    seamlessly and harmoniously with their tenants.</p>
                            </div>
                            <footer class="mt-6">


                            </footer>
                        </blockquote>
                    </div>
                </div>

                <div class="lg:mt-20 sm:mt-0  lg:col-start-2 sm:pl-5 lg:pl-32">
                    <div class="flex justify-center items-center">
                        <img class="h-72 w-fit" src="{{ asset('/brands/landing/about.webp') }}"
                            alt="a laptop mockup showing pmo dashboard">
                    </div>
                </div>
            </div>
        </div>

        <div class="relative bg-gray-700">
            <div class="px-6 py-32 relative bg-gray-600 md:absolute md:left-0 md:h-full md:w-1/2">
                <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Mission</p>
                <p class="mt-3 text-lg text-gray-300">To provide a transformative but easy digital solution to improve
                    rental
                    property experiences between customers and real property rentals.</p>
                <div class="mt-8">
                    <div class="inline-flex rounded-md shadow">

                    </div>
                </div>
            </div>
            <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">

                <div class="md:ml-auto md:w-1/2 md:pl-10">

                    <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Vision</p>
                    <p class="mt-3 text-lg text-gray-300">Thriving rental property communities thru technology
                        enablement.</p>
                    <div class="mt-8">
                        <div class="inline-flex rounded-md shadow">

                        </div>
                    </div>
                </div>
            </div>
        </div>






        <!-- thrive -->
        <div class="relative bg-gray-900">
            <div class="absolute inset-x-0 bottom-0 h-80 xl:top-0 xl:h-full">
                <div class="h-full w-full xl:grid xl:grid-cols-2">
                    <div class="h-full xl:relative xl:col-start-2">
                        <img class="h-full w-full object-cover opacity-25 xl:absolute xl:inset-0"
                            src="https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=2830&q=80&sat=-100"
                            alt="People working on laptops">
                        <div aria-hidden="true"
                            class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b from-gray-900 xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r">
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="py-20 mx-auto max-w-4xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-flow-col-dense xl:grid-cols-2 xl:gap-x-8">
                <div class="relative pt-12 xl:col-span-2 xl:pb-24">

                    <p class="mt-3 text-3xl font-bold tracking-tight text-white">{{ env('APP_NAME') }} Values</p>

                    <div class="mt-10 grid grid-cols-1 gap-y-5 gap-x-6 sm:grid-cols-6">
                        <p>
                            <span class="block text-2xl font-bold text-white">T</span>
                            <span class="mt-1 block text-base text-gray-300"><span
                                    class="font-medium text-white">Technology</span>
                                -Enabled Experience</span>
                        </p>

                        <p>
                            <span class="block text-2xl font-bold text-white">H</span>
                            <span class="mt-1 block text-base text-gray-300"><span
                                    class="font-medium text-white">Honest</span>
                                Operations </span>
                        </p>

                        <p>
                            <span class="block text-2xl font-bold text-white">R</span>
                            <span class="mt-1 block text-base text-gray-300"><span
                                    class="font-medium text-white">Reliable</span>
                                Services</span>
                        </p>

                        <p>
                            <span class="block text-2xl font-bold text-white">I</span>
                            <span class="mt-1 block text-base text-gray-300"><span
                                    class="font-medium text-white">Innovation</span> in
                                Business Reporting</span>
                        </p>

                        <p>
                            <span class="block text-2xl font-bold text-white">V</span>
                            <span class="mt-1 block text-base text-gray-300"><span
                                    class="font-medium text-white">Vital</span> and
                                Harmonious Tenant-Landlord Relationship</span>
                        </p>

                        <p>
                            <span class="block text-2xl font-bold text-white">E</span>
                            <span class="mt-1 block text-base text-gray-300"><span
                                    class="font-medium text-white">Excellence</span> in
                                Customer Service Execution</span>
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <!-- team section -->

        <div class="bg-white min-h-fit">
            <div class=" lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-8 lg:px-8">


                <div class="mt-12 lg:col-start-1 lg:m-0 lg:pl-20">
                    <div class="flex justify-center items-center">
                        <img class="mt-10 h-full lg:w-full md:w-auto sm:w-auto"
                            src="{{ asset('/brands/landing/about-team.webp') }}" alt="a vector, 4 people working">
                    </div>
                </div>

                <div class="mx-7 mt-12 mb-12 lg:col-start-2">

                    <blockquote>
                        <div>

                            <p class="mt-6 tracking-wide  text-3xl font-bold text-purple-900">The Team </p>
                            <p class="text-base text-gray-500 mt-5 ">Behind {{ env('APP_NAME') }} is a team of real estate lessors
                                and real estate
                                managers, IT professionals, programmers, technical support specialists, and UI/UX
                                designers.
                                Our team members have worked or belong to the industry of real estate management and
                                Information Technology industry. We believe that a transformative digital system is what
                                the
                                real estate management need to reduce and even eliminate many pain points of a rental
                                property business.</p>

                            <p class="text-base text-gray-500 mt-5 ">
                                {{ env('APP_NAME') }} Team is establishing harmonious relationships between business owners,
                                managers, and tenants to make thriving rental property communities. With a
                                transformative
                                digital system, there will be transparency in business transactions, and efficiency in
                                operations.</p>
                        </div>

                    </blockquote>

                </div>
            </div>
        </div>

        <div class="bg-purple-50">
            <div
                class="mx-auto max-w-4xl py-16 px-4 sm:px-6 sm:py-24 lg:flex lg:max-w-7xl lg:items-center lg:justify-between lg:px-8">
                <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                    <span class="block">Register and start your journey with us now!</span>
                    <span
                        class="-mb-1 block bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text pb-1 text-transparent">Get
                        in
                        touch or create an account.</span>
                </h2>
                <div class="mt-6 space-y-4 sm:flex sm:space-y-0 sm:space-x-5">
                    <a href="/select-a-plan"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-full border border-transparent bg-origin-border bg-purple-500 px-4 py-1 text-base font-medium text-white shadow-sm hover:from-purple-700 hover:to-indigo-700">Start
                        Free Trial</a>

                </div>
            </div>
        </div>

        

        <div>
            <div id="contactus">
                <div class="relative bg-white shadow-xl">
                    <h2 class="sr-only">Contact us</h2>

                    <div class="grid grid-cols-1 lg:grid-cols-3">
                        <!-- Contact information -->
                        <div class="px-5 relative overflow-hidden bg-gray-700 py-10 sm:px-10 xl:p-12">
                            <div class="pointer-events-none absolute inset-0 sm:hidden" aria-hidden="true">
                                <svg class="absolute inset-0 h-full w-full" width="343" height="388"
                                    viewBox="0 0 343 388" fill="none" preserveAspectRatio="xMidYMid slice"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <svg class="absolute inset-0 h-full w-full" width="359" height="339"
                                    viewBox="0 0 359 339" fill="none" preserveAspectRatio="xMidYMid slice"
                                    xmlns="http://www.w3.org/2000/svg">
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
                                <svg class="absolute inset-0 h-full w-full" width="160" height="678"
                                    viewBox="0 0 160 678" fill="none" preserveAspectRatio="xMidYMid slice"
                                    xmlns="http://www.w3.org/2000/svg">
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
                            <p class="mt-6 max-w-3xl text-sm text-purple-200">Makati Address:
                            <p class="text-base mt-2 text-white">{{ env('APP_SECOND_ADDRESS') }}</p>
                            </p>
                            <p class="mt-6 max-w-3xl text-sm text-purple-200">Baguio Address:
                            <p class="text-base mt-2 text-white">{{ env('APP_FIRST_ADDRESS') }}</p>
                            </p>
                            <dl class="mt-8 space-y-6">
                                <dt><span class="sr-only">Phone number</span></dt>
                                <dd class="flex text-base text-indigo-50">
                                    <!-- Heroicon name: outline/phone -->
                                    <svg class="h-6 w-6 flex-shrink-0 text-indigo-200"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                    </svg>
                                    <p class="ml-3">{{ env('APP_MOBILE') }}</span>
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
                                    <p class="ml-3">{{ env('APP_EMAIL') }}</span>
                                </dd>
                            </dl>
                            <ul role="list" class="mt-8 flex space-x-12">
                                <li>
                                    <a href="https://www.{{  env('APP_FACEBOOK_PAGE') }}">
                                        <dt><span class="sr-only">Facebook</span></dt>
                                        <dd class="flex text-base text-indigo-50">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg" class="text-indigo-200 h-6 w-6"
                                                aria-hidden="true">
                                                <path
                                                    d="M22.258 1H2.242C1.556 1 1 1.556 1 2.242v20.016c0 .686.556 1.242 1.242 1.242h10.776v-8.713h-2.932V11.39h2.932V8.887c0-2.906 1.775-4.489 4.367-4.489 1.242 0 2.31.093 2.62.134v3.037l-1.797.001c-1.41 0-1.683.67-1.683 1.653v2.168h3.362l-.438 3.396h-2.924V23.5h5.733c.686 0 1.242-.556 1.242-1.242V2.242C23.5 1.556 22.944 1 22.258 1"
                                                    fill="currentColor" />
                                            </svg>
                                            <p class="ml-3">{{ env('APP_FACEBOOK_PAGE') }}</span>
                                        </dd>
                                        </dl>
                                    </a>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </div>

                        <x-contactus></x-contactus>
                    </div>
                </div>
            </div>
        </div>

</x-landing-page-template>
