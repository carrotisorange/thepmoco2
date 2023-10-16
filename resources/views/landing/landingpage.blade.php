<x-landing-page-template>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('title', env('APP_NAME').' | Home')
    @section('description', 'Increase transparency, and efficiency in rental property operations with a simple and easy
    to
    use system for leasing and property management.')

    <style>
        #modal-bg {
            background-image: url('/brands/landing/modal-bg.png');
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
            background-image: linear-gradient(to right, rgba(74, 56, 108, 0), rgba(102, 102, 102));
        }

        #features {
            background-image: url('/brands/landing/feature-bg.webp');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #guide {
            background-color: #5D5270;
        }

        #owner-btn {
            background-color: #4A386C;
            border-radius: 4px;
        }



        #propsuite-image {
            background-image: url('/brands/propsuite/propsuite-image.png');
        }




        .propmanOrangebg {
            background-color: #FFDE59;
        }

        .proprentOrangebg {
            background-color: #4F3F6D;
        }

        .propbizOrangebg {
            background-color: #F4B700;
        }

        .propSuitebg {
            background-color: #4F3F6D;
        }


        .bgStart {
            background-color: #4F1964;
        }

        #propman-image {
            background-image: url('/brands/propsuite/propbiz-landing-bg.png');
        }

        #proprent-image {
            background-image: url('/brands/propsuite/proprent-landing-bg.png');
        }

        #propbiz-image {
            background-image: url('/brands/propsuite/propman-landing-bg.png');
        }

        /* DEMO-SPECIFIC STYLES */
        .typewriter h1 {

            overflow: hidden;
            /* Ensures the content is not revealed until the animation */
            border-right: .15em solid orange;
            /* The typwriter cursor */
            white-space: nowrap;
            /* Keeps the content on a single line */
            line-height: normal;
            animation:
                typing 2s steps(30, end),
                blink-caret .5s step-end infinite;

        }

        /* The typing effect */
        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        /* The typewriter cursor effect */
        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: orange
            }
        }
    </style>


    <body id="background" class="bgStart">


        <!-- pop up modal -->
        <dh-component>
            <div class="hidden py-5 rounded-lg shadow  bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0"
                id="modal">
                <div role="alert" class="container mx-auto  max-w-2xl">
                    <div class="mt-24 relative py-3 shadow-2xl bg-white ">

                        <div id="modal-bg" class="px-3 md:px-4 py-6 flex flex-col justify-center items-center">
                            <div role="img" aria-label="propsuite logo">
                                <img class="w-48" src="{{ asset('/brands/propsuite/propsuite.png') }}">
                            </div>
                            <h1
                                class="mt-8 md:mt-12 text-xl lg:text-2xl font-semibold  text-gray-800 text-center   dark:text-white">
                                Welcome to {{ env('APP_NAME') }}</h1>
                            <p
                                class="mt-10 text-md leading-normal text-center text-gray-600 md:w-9/12 lg:w-9/12 dark:text-white">
                                <span class="font-bold text-xl"> Free trial</span> until full setup ready.
                            </p>
                            <p
                                class="mt-3 mb-3 text-base leading-normal text-center text-gray-600 md:w-9/12 dark:text-white">
                                <span class="font-bold text-purple-700 text-lg">No credit card required,</span> no
                                strings attached</p>
                            <div class="mt-12 md:mt-14 w-full flex justify-center">
                                <a href="/select-a-plan"><button
                                        class="bg-purple-900 dark:text-white dark:border-white w-full sm:w-auto border border-purple-800 text-base font-medium text-white py-5 px-14 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 hover:bg-purple-600 hover:text-white dark:hover:text-white dark:hover:bg-gray-700">Start
                                        my Free Trial</button></a>
                            </div>
                        </div>

                        <button
                            class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                            onclick="modalHandler()" aria-label="close modal" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                                height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>

                        </button>
                    </div>
                </div>
            </div>

            @include('modals.tech-support')
            <script>
                let modal = document.getElementById("modal");
                function modalHandler(val) {
                    if (val) {
                        fadeIn(modal);
                    } else {
                        fadeOut(modal);
                    }
                }
                function fadeOut(el) {
                    el.style.opacity = 1;
                    (function fade() {
                        if ((el.style.opacity -= 0.1) < 0) {
                            el.style.display = "none";
                        } else {
                            requestAnimationFrame(fade);
                        }
                    })();
                }
                function fadeIn(el, display) {
                    el.style.opacity = 0;
                    el.style.display = display || "flex";
                    (function fade() {
                        let val = parseFloat(el.style.opacity);
                        if (!((val += 0.2) > 1)) {
                            el.style.opacity = val;
                            requestAnimationFrame(fade);
                        }
                    })();
                }
            </script>

        </dh-component>

        <style>
            [data-component="slideshow"] .slide {
                display: none;

            }

            [data-component="slideshow"] .slide.active {
                display: block;
            }
        </style>

        <div class="lg:ml-28 max-w-7xl mt-0 lg:mt-24 block lg:absolute left-0 mx-16">
            <div class="text-center text-gray-100 text-2xl font-bold pt-24 pb-10 sm:text-2xl lg:text-5xl">




                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
                        <script>
                          var typed = new Typed(".threeWords", {
                              strings: ["Property Management System", "Rental Property Listings", "Property Management Service", "Fullsuite Digital Service"],
                              typeSpeed: 40,
                              backSpeed: 15,
                              loop: true
                          });
                        </script> -->


            </div>

        </div>


        <div id="slideshow-example" data-component="slideshow">
            <div role="list">



                <div class="slide py-16 bg-transparent" id="">
                    <div class="sm:block lg:flex md:flex h-96">

                        <div class="flex-col items-center justify-center ml-10 lg:px-10 xl:px-16 sm-px-0">
                            <div class="w-full">
                                <div class="flex justify-center items-center md:block -mt-20 pb-10 lg:pb-0 lg:mt-20">
                                    <img src="{{ asset('/brands/propsuite/propman.png') }}" class="w-36">
                                </div>
                                <div
                                    class="typewriter -ml-6 lg:ml-0 text-left flex sm:block md:block lg:block text-white justify-center items-center text-xl font-bold sm:text-3xl lg:text-5xl">
                                    <h1>Property Management System</h1>
                                </div>
                            </div>
                        </div>

                        <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:px-16">
                            <div class="lg:block lg:py-20 md:max-w-sm lg:max-w-md xl:max-w-lg sm:py-2 mx-5 mt-5">
                                <p class="text-sm lg:text-base font-light md:-mt-36 lg:mt-1 text-white text-justify">
                                    Property Management
                                    System for long term and short term rental properties and home owners associations.
                                </p>
                                <div class="lg:ml-0 mt-10 flex justify-center items-center space-x-2">
                                    <button class="propmanOrangebg rounded-full"> <a href="/select-a-plan"
                                            class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-semibold text-purple-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Free
                                            Trial</a></button>
                                    <button> <a href="demopage"
                                            class="w-48 flex justify-center py-3 px-4 border border-gray-400 rounded-full shadow-sm text-sm font-medium text-white hover:bg-purple-300  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View
                                            Demo</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide py-16 bg-transparent" id="">
                    <div class="sm:block lg:flex md:flex h-96">

                        <div class="flex-col items-center justify-center ml-10 lg:px-10 xl:px-16 sm-px-0">
                            <div class="w-full">
                                <div class="flex justify-center items-center md:block -mt-20 pb-10 lg:pb-0 lg:mt-20">
                                    <img src="{{ asset('/brands/propsuite/proprent-purple.png') }}" class="w-36">
                                </div>
                                <div
                                    class="typewriter text-center flex sm:block md:block lg:block text-white justify-center items-center text-xl font-bold sm:text-3xl lg:text-5xl">
                                    <h1>Rental Property Listings</h1>
                                </div>
                            </div>
                        </div>

                        <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:ml-20 lg:px-16">
                            <div class="lg:block lg:py-20 md:max-w-sm lg:max-w-md xl:max-w-lg  sm:py-2 mx-5 mt-5">
                                <p class="text-sm lg:text-base font-light md:-mt-36 lg:mt-1 text-white text-justify">
                                    Leasing platform
                                    for rental property owners to list vacant rooms and units for long term or short
                                    term rental and a
                                    Leasing Marketplace for tenants to find available place.</p>
                                <div class="mt-10 flex justify-end items-center space-x-5">
                                    <button class="proprentOrangebg rounded-full"> <a href="proprent-search"
                                            target="blank"
                                            class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-bold text-yellow-200  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Coming
                                            Soon</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide py-16 bg-transparent" id="">
                    <div class="sm:block lg:flex md:flex h-96">

                        <div class="flex-col items-center justify-center ml-10 lg:px-10 xl:px-16 sm-px-0">
                            <div class="w-full">
                                <div class="flex justify-center items-center md:block -mt-20 pb-10 lg:pb-0 lg:mt-20">
                                    <img src="{{ asset('/brands/propsuite/propbiz.png') }}" class="w-36">
                                </div>
                                <div
                                    class="typewriter -ml-7 lg:ml-0 text-left flex sm:block md:block lg:block text-white justify-center items-center text-xl font-bold sm:text-3xl lg:text-5xl">
                                    <h1>Property Management Services</h1>
                                </div>
                            </div>
                        </div>

                        <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:px-16">
                            <div class="lg:block lg:py-20 md:max-w-sm lg:max-w-md xl:max-w-lg sm:py-2 mx-5 mt-5">
                                <p class="text-sm lg:text-base font-light md:-mt-36 lg:mt-1 text-white text-justify">
                                    Property management
                                    services that provides online and onsite operations management services to rental
                                    property owners.</p>
                                <div class="mt-10 flex justify-end items-center space-x-5">
                                    <button class="propbizOrangebg rounded-full"> <a href="propbiz"
                                            class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-bold text-purple-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="slide py-16 bg-transparent" id="">
                    <div class="sm:block lg:flex md:flex h-96 ">

                        <div class="flex-col items-center justify-center ml-10 lg:px-10 xl:px-16 sm-px-0">
                            <div class="w-full">
                                <div class="flex justify-center items-center md:block -mt-20 pb-10 lg:pb-0 lg:mt-16">
                                    <img src="{{ asset('/brands/propsuite/propsuite.png') }}" class="-ml-3 w-36">
                                </div>
                                <div
                                    class="typewriter text-center flex sm:block md:block lg:block text-white justify-center items-center text-xl font-bold sm:text-3xl lg:text-5xl">
                                    <h1>Fullsuite Digital Solutions</h1>
                                </div>
                            </div>
                        </div>

                        <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:px-16">
                            <div class="lg:block lg:py-20 md:max-w-sm lg:max-w-md xl:max-w-lg sm:py-2 mx-5 mt-5">
                                <p
                                    class="ml-0 lg:ml-16 text-sm lg:text-base font-light md:-mt-36 lg:mt-1 text-white text-justify">
                                    We
                                    provide full suite digital solution for rental property communities and home owners
                                    associations.</p>
                                <div class="mt-10 flex justify-end items-center space-x-5">
                                    <button class="propSuitebg rounded-full"> <a href="about"
                                            class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-bold text-yellow-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Learn
                                            More</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>


        <script>
            var slideshows = document.querySelectorAll('[data-component="slideshow"]');
            slideshows.forEach(initSlideShow);

            function initSlideShow(slideshow) {

              var slides = document.querySelectorAll(`#${slideshow.id} [role="list"] .slide`);

              var index = 0, time = 3000;
              slides[index].classList.add('active');

              setInterval( () => {
                slides[index].classList.remove('active');

                index++;
                if (index === slides.length) index = 0;

                slides[index].classList.add('active');

              }, time);
            }
        </script>

        <!-- services -->

        <div id="services" class="bg-white py-16 sm:py-24 lg:py-32 min-h-screen" id="guide">
            <div class="">
                <div class="flex justify-center items-center px-5 lg:px-0">
                    <h2 class="font-semibold text-gray-600 text-3xl">What are the services that we offer?</h2>
                </div>




                <!-- This is an example component -->
                <div class="max-w-4xl mx-auto hidden lg:block">

                    <div class="my-8">
                        <ul class="flex justify-center items-center -mb-px space-x-8" id="myTab"
                            data-tabs-toggle="#myTabContent" role="tablist">
                            <li class="mr-2 rounded-xl" role="presentation">
                                <img class="h-48 inline-block border text-gray-500  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 active"
                                    id="profile-tab" data-tabs-target="#profile" type="button" role="tab"
                                    aria-controls="profile" aria-selected="true"
                                    src="{{ asset('/brands/'.env('APP_LOGO_PROPMAN')) }}">
                                <p class="py-2 block text-base font-semibold text-center">Propman</p>
                            </li>
                            <li class="mr-2 rounded-xl" role="presentation">
                                <img class="h-48 inline-block border text-gray-500  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                    aria-controls="dashboard" aria-selected="false"
                                    src="{{ asset('/brands/'.env('APP_LOGO_PROPRENT')) }}">
                                <p class="py-2 block text-base font-semibold text-center">Proprent</p>
                            </li>
                            <li class="mr-2 rounded-xl" role="presentation">
                                <img class="h-48 inline-block border text-gray-500  rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300"
                                    id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                                    aria-controls="settings" aria-selected="false"
                                    src="{{ asset('/brands/'.env('APP_LOGO_PROPBIZ')) }}">
                                <p class="py-2 block text-base font-semibold text-center">Propbiz</p>
                            </li>

                        </ul>
                    </div>
                    <div id="myTabContent" class="mt-10 hidden lg:block">

                        <div class="p-4 rounded-lg border " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="grid grid-cols-2">
                                <img class="flex-col w-72 justify-center items-center"
                                    src="{{ asset('/brands/propsuite/propman.png') }}">
                                <div class="flex-col">
                                    <p class="text-gray-500 dark:text-gray-400 text-base text-justify"><span
                                            class="font-bold">Property
                                            management system</span> as a service that provides a transformative digital
                                        solution to simplify
                                        operations of long term or short term rental properties. Unlike manual
                                        processes, our online system
                                        provides real-time, reliable and accessible information to landlords and
                                        managers to increase
                                        transparency and efficiency of operations. </p>
                                    <div class="flex items-center justify-end mt-5">
                                        <a href="propman"><button
                                                class="bg-yellow-200 hover:bg-yellow-400 p-2 rounded-md text-sm font-bold">Learn
                                                More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 rounded-lg border hidden" id="dashboard" role="tabpanel"
                            aria-labelledby="dashboard-tab">
                            <div class="grid grid-cols-2">
                                <img class="flex-col w-72 justify-center items-center"
                                    src="{{ asset('/brands/propsuite/proprent.png') }}">
                                <div class="flex-col">
                                    <p class="text-gray-500 dark:text-gray-400 text-base text-justify"><span
                                            class="font-bold">Leasing
                                            Marketplace</span> for tenants to find available place for long term or
                                        short term rentals. Unlike
                                        social media pages, we verify the address and the accuracy of the rental space
                                        to increase trust in
                                        the proprent community. </p>
                                    <div class="flex items-center justify-end mt-5">
                                        <a href="proprent"><button
                                                class="bg-yellow-200 hover:bg-yellow-400 p-2 rounded-md text-sm font-bold">Learn
                                                More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 rounded-lg border hidden" id="settings" role="tabpanel"
                            aria-labelledby="settings-tab">
                            <div class="grid grid-cols-2">
                                <img class="flex-col w-72 justify-center items-center"
                                    src="{{ asset('/brands/propsuite/propbiz.png') }}">
                                <div class="flex-col">
                                    <p class="text-gray-500 dark:text-gray-400 text-base text-justify"><span
                                            class="font-bold">Property
                                            management services</span> that provides online and onsite operations
                                        management services to
                                        rental property owners. Unlike caretakers, our property and leasing manager
                                        partners are
                                        professionals using a management system that allows owners to have real time
                                        business insights on
                                        their rental properties.</p>
                                    <div class="flex items-center justify-end mt-5">
                                        <a href="propbiz"><button
                                                class="bg-yellow-200 hover:bg-yellow-400 p-2 rounded-md text-sm font-bold">Learn
                                                More</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!--  -->
                <div
                    class="block lg:hidden mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-3 lg:px-8">

                    <div class="flex flex-col overflow-hidden rounded-xl">
                        <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                            <div class="flex-1">
                                <a class="mt-2 block">
                                    <p class="text-lg text-center font-medium text-gray-800">proprent</p>
                                </a>
                                <a href="/proprent"> <img src="{{ asset('/brands/'.env('APP_LOGO_PROPRENT')) }}"></a>

                            </div>
                        </div>
                        <div class="flex-col pt-3">
                            <p class="text-gray-500 dark:text-gray-400 text-base text-justify"><span
                                    class="font-bold">Property
                                    management system</span> as a service that provides a transformative digital
                                solution to simplify
                                operations of long term or short term rental properties. Unlike manual processes, our
                                online system
                                provides real-time, reliable and accessible information to landlords and managers to
                                increase
                                transparency and efficiency of operations. </p>
                            <div class="flex items-center justify-end mt-5">
                                <a href="propman"><button
                                        class="bg-yellow-200 hover:bg-yellow-400 p-2 rounded-md text-sm font-bold">Learn
                                        More</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col overflow-hidden rounded-xl">
                        <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                            <div class="flex-1">
                                <a class="mt-2 block">
                                    <p class="text-lg text-center font-medium text-gray-800">propman</p>
                                </a>
                                <a href="/propman"> <img src="{{ asset('/brands/'.env('APP_LOGO_PROPMAN')) }}"></a>

                            </div>
                        </div>
                        <div class="flex-col pt-3">
                            <p class="text-gray-500 dark:text-gray-400 text-base text-justify"><span
                                    class="font-bold">Leasing
                                    Marketplace</span> for tenants to find available place for long term or short term
                                rentals. Unlike
                                social media pages, we verify the address and the accuracy of the rental space to
                                increase trust in the
                                proprent community. </p>
                            <div class="flex items-center justify-end mt-5">
                                <a href="proprent"><button
                                        class="bg-yellow-200 hover:bg-yellow-400 p-2 rounded-md text-sm font-bold">Learn
                                        More</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col overflow-hidden rounded-xl">
                        <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                            <div class="flex-1">
                                <a class="mt-2 block">
                                    <p class="text-lg text-center font-medium text-gray-800">propbiz</p>
                                </a>
                                <a href="/propbiz"> <img src="{{ asset('/brands/'.env('APP_LOGO_PROPBIZ')) }}"></a>

                            </div>
                        </div>
                        <div class="flex-col pt-3">
                            <p class="text-gray-500 dark:text-gray-400 text-base text-justify"><span
                                    class="font-bold">Property
                                    management services</span> that provides online and onsite operations management
                                services to rental
                                property owners. Unlike caretakers, our property and leasing manager partners are
                                professionals using a
                                management system that allows owners to have real time business insights on their rental
                                properties.</p>
                            <div class="flex items-center justify-end mt-5">
                                <a href="propbiz"><button
                                        class="bg-yellow-200 hover:bg-yellow-400 p-2 rounded-md text-sm font-bold">Learn
                                        More</button></a>
                            </div>
                        </div>
                    </div>








                </div>
            </div>
        </div>

        <!-- services end -->


        <!-- partnered with section -->

        <div class="bg-gray-100">
            <div class="mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
                <p class="text-center text-xl font-semibold text-gray-500">Partnered with:</p>

                <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-6">
                    <div class="col-span-1 block md:col-span-2 lg:col-span-1">
                        <div class="flex justify-center">
                            <img class="w-36 flex justify-center" src="{{ asset('/brands/dhsud-logo.png') }}" alt="dhsud logo">
                        </div>
                        <p class="text-center">DHSUD CAR</p>
                    </div>
                    <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                        <a
                            href="https://www.digitalocean.com/trust/certification-reports?fbclid=IwAR3qJ79YUNro9Px4ycCvcuCgGH7MVxbcrvQitnhlh4i51su4PuJsRyKr6T0"><img
                                class="w-36 " src="{{ asset('/brands/landing/digital-ocean.png') }}"
                                alt="digital ocean logo"></a>
                    </div>
                    <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                        <img class="w-36 " src="{{ asset('/brands/landing/aim.png') }}" alt="AIM logo">
                    </div>
                    <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
                        <a href="https://marthavacationhomes.com/"><img class="w-36 "
                                src="{{ asset('/brands/landing/martha.png') }}" alt="martha logo"></a>
                    </div>
                    <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
                        <a href="https://www.curaservices.net/"><img class="w-36 "
                                src="{{ asset('/brands/landing/cura.png') }}" alt="cura logo"></a>
                    </div>
                    <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
                        <img class="w-36" src="{{ asset('/brands/landing/bayani-hall.png') }}" alt="bayani hall logo">
                    </div>

                </div>
            </div>
        </div>
        <!-- end partnered with section -->


        <!-- testimonial section -->

        <section class="overflow-hidden bg-gray-50 py-12 md:py-20 lg:py-24">
            <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
            <div class="flex justify-center items-center ">
                <div class="max-w-sm md:max-w-md lg:max-w-3xl">
                    <div class="">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <!-- north cambridge -->
                                <div class="swiper-slide">
                                    <div class=" mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                                        <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2"
                                            width="404" height="404" fill="none" viewBox="0 0 404 404" role="img"
                                            aria-labelledby="svg-northcambridge">
                                            <title id="svg-northcambridge">North Cambridge</title>
                                            <defs>
                                                <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0"
                                                    width="20" height="20" patternUnits="userSpaceOnUse">
                                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200"
                                                        fill="currentColor" />
                                                </pattern>
                                            </defs>
                                            <rect width="404" height="404"
                                                fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
                                        </svg>

                                        <div class="">
                                            <img class="mx-auto w-10 h-10"
                                                src="{{ asset('/brands/clients/client-2.png') }}"
                                                alt="North Cambridge logo">
                                            <blockquote class="mt-10">
                                                <div
                                                    class="mx-auto max-w-3xl text-center text-xl font-medium leading-9 text-gray-900">
                                                    <p>&ldquo;It makes my life less stressful because the application
                                                        provides an easy way for
                                                        tenants to report concerns, and as I resolve the concern, it
                                                        provides an option for them to
                                                        monitor its status in real-time.&rdquo;</p>
                                                </div>

                                                <footer class="mt-8">
                                                    <div class="md:flex md:items-center md:justify-center">
                                                        <div class="md:flex-shrink-0">
                                                            <img class="mx-auto h-10 w-10 rounded-full"
                                                                src="{{ asset('/brands/landing/f-icon.webp') }}"
                                                                alt="user icon">
                                                        </div>
                                                        <div
                                                            class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                                                            <div class="text-base font-medium text-gray-900">Kate</div>
                                                            <svg class="mx-1 hidden h-5 w-5 text-indigo-400 md:block"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M11 0h3L9 20H6l5-20z" />
                                                            </svg>

                                                            <div class="text-base font-medium text-gray-500">Admin,
                                                                North Cambridge</div>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class=" mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                                        <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2"
                                            width="404" height="404" fill="none" viewBox="0 0 404 404" role="img"
                                            aria-labelledby="svg-martha">
                                            <title id="svg-martha">Martha</title>
                                            <defs>
                                                <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0"
                                                    width="20" height="20" patternUnits="userSpaceOnUse">
                                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200"
                                                        fill="currentColor" />
                                                </pattern>
                                            </defs>
                                            <rect width="404" height="404"
                                                fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
                                        </svg>

                                        <div class="">
                                            <img class="mx-auto w-20 h-20"
                                                src="{{ asset('/brands/clients/client-3.png') }}" alt="Martha logo">
                                            <blockquote class="mt-10">
                                                <div
                                                    class="mx-auto max-w-3xl text-center text-xl font-medium leading-9 text-gray-900">
                                                    <p>&ldquo;Helpful. Makes work faster and easier.&rdquo;</p>
                                                </div>
                                                <footer class="mt-8">
                                                    <div class="md:flex md:items-center md:justify-center">
                                                        <div class="md:flex-shrink-0">
                                                            <img class="mx-auto h-10 w-10 rounded-full"
                                                                src="{{ asset('/brands/landing/f-icon.webp') }}"
                                                                alt="user icon">
                                                        </div>
                                                        <div
                                                            class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                                                            <div class="text-base font-medium text-gray-900">Vanessa
                                                            </div>
                                                            <svg class="mx-1 hidden h-5 w-5 text-indigo-400 md:block"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M11 0h3L9 20H6l5-20z" />
                                                            </svg>
                                                            <div class="text-base font-medium text-gray-500">Leasing
                                                                Manager, Martha</div>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class=" mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                                        <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2"
                                            width="404" height="404" fill="none" viewBox="0 0 404 404" role="img"
                                            aria-labelledby="svg-martha">
                                            <title id="svg-martha">Daily Rental Property</title>
                                            <defs>
                                                <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0"
                                                    width="20" height="20" patternUnits="userSpaceOnUse">
                                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200"
                                                        fill="currentColor" />
                                                </pattern>
                                            </defs>
                                            <rect width="404" height="404"
                                                fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
                                        </svg>
                                        <div class="">
                                            <blockquote class="mt-10">
                                                <div
                                                    class="mx-auto max-w-3xl text-center text-xl font-medium leading-9 text-gray-900">
                                                    <p>&ldquo;Nice app!&rdquo;</p>
                                                </div>
                                                <footer class="mt-8">
                                                    <div class="md:flex md:items-center md:justify-center">
                                                        <div class="md:flex-shrink-0">
                                                            <img class="mx-auto h-10 w-10 rounded-full"
                                                                src="{{ asset('/brands/landing/f-icon.webp') }}"
                                                                alt="user icon">
                                                        </div>
                                                        <div
                                                            class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                                                            <div class="text-base font-medium text-gray-900">Jael</div>
                                                            <svg class="mx-1 hidden h-5 w-5 text-indigo-400 md:block"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M11 0h3L9 20H6l5-20z" />
                                                            </svg>
                                                            <div class="text-base font-medium text-gray-500">Daily
                                                                Rental Property</div>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </blockquote>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Swiper JS -->
                        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                        <script>
                            var swiper = new Swiper('.mySwiper', {
                      spaceBetween: 30,
                      centeredSlides: true,
                      autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                      },
                      pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                      },
                      navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                      },
                    });
                        </script>
                    </div>
                </div>
            </div>
        </section>
        <!-- end testimonial section -->

        <!-- contact us section -->

        <div>
            <div class="">
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

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


                        <script>
                            $(function() {
        index = 0;

        setInterval(function() {
          index++;
          $("#static").fadeOut(0, function() {
            $(this)

              .css('color', index % 2 == 0 ? '#FFDE59' : '#4F3F6D')
              .fadeIn(0);
          });
        }, 3000);
      });

                        </script>
                        <script>
                            var text = ["Rental Property Listings", "Property Management Services","Fullsuite Digital Solutions","Property Management System",];
    var counter = 0;
    var elem = document.getElementById("changeText");
    var inst = setInterval(change, 3000);

    function change() {
      elem.innerHTML = text[counter];
      counter++;
      if (counter >= text.length) {
        counter = 0;
        // clearInterval(inst); // uncomment this if you want to stop refreshing after one cycle
      }
    }
                        </script>

                        <script>
                            var doc = document.getElementById("background");
    var color = ["#DBB132","#4F1964","#DBC054","#4F3F6D",];
    var i = 0;
    function change() {
        doc.style.backgroundColor = color[i];
    i = (i + 1) % color.length;
    }

    setInterval(change, 3000);
                        </script>


</x-landing-page-template>
