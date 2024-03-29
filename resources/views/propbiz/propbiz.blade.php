<x-landing-page-template>

    @section('title','Propbiz | Home')
    @section('description', 'Increase transparency, and efficiency in rental property operations with a simple and easy
    to
    use system for leasing and property management.')


    <style>
        body {
            font-family: 'Poppins';
        }

        #button1 {
            background-color: #F79630;
            border-radius: 30px;
            transition-duration: 0.1s;
        }

        #button2 {
            background-color: #8B5CF6;
            border-radius: 30px;
            transition-duration: 0.1s;
        }

        #button1:hover,
        #button2:hover {
            background-color: #fdba74;
        }

        body {
            background-color: #4F1964;
        }

        .propbiz-bg {
            background-image: url('/brands/propsuite/propbiz-landing-bg.png');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;

        }

        #seamless {
            color: #F79630;
        }

        #owner {
            background-color: #E0DAED;
        }

        #gradient {
            background-image: linear-gradient(to right, rgba(79, 25, 100), rgba(79, 63, 109));
        }

        #features {
            background-image: url('/brands/landing/feature-bg.webp');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #guide {
            background-color: #4F3F6D;
        }

        #owner-btn {
            background-color: #4A386C;
            border-radius: 4px;
        }

        .propbizOrange {
            color: #F4B700;
        }

        .propbizOrangebg {
            background-color: #F4B700;
        }
    </style>



    <!-- seamless section -->

    <div class="propbiz-bg sm:block lg:flex md:flex min-h-screen py-16">
        <div class="flex-col items-center justify-center sm:ml-3 lg:ml-5 px-4 sm:px-4 md:px-8 lg:px-20 xl:px-36">
            <div class="w-full">
                <div class="text-gray-300 text-4xl font-bold py-24 sm:text-5xl lg:text-5xl">
                    <img class="w-36" src="{{ asset('/brands/propsuite/propbiz.png') }}">

                    <h2 class="">Professional Property <br>Management Services </h2>
                </div>
            </div>
        </div>

        <div class="flex-col justify-center ml-0 lg:ml-24 sm:-py-2 md:py-20 lg:py-8 lg:px-48 sm-px-0">
            <div class="lg:block lg:py-20 md:max-w-lg xl:max-w-lg sm:ml-12 sm:py-2 lg:-ml-5 mx-5">
                <p class="text-base font-light mt-10 text-white text-justify">Property owner and property manager
                    matching
                    service. Pre-qualified licensed real estate managers for rental property owners who need management
                    services
                    for property rental business.</p>
                <div class="mt-10 flex justify-center items-center space-x-5">
                    <button class="propbizOrangebg rounded-full"> <a href="agent-corner"
                            class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Property
                            Manager</a></button>
                    <button class="propbizOrangebg rounded-full"> <a href="owner-corner"
                            class="w-48 flex justify-center py-4 px-4 border border-gray-400 rounded-full shadow-sm text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 leading-3">Property
                            Owner</a></button>
                </div>
            </div>
        </div>

    </div>

    <!-- seamless end -->




    <!-- contact us section -->

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
                                <svg class="h-6 w-6 flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                <p class="ml-3">{{env('APP_MOBILE')}}</span>
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
                                    </a>
                                </li>
                            </ul>
                    </div>

                    <x-contactus></x-contactus>


                    <!-- partnered with section -->

                    <x-partner></x-partner>
                    <!-- end partnered with section -->

</x-landing-page-template>
