<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="canonical" href="http://propsuite.net" />
    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="Property,
    Property Management,
    Property manager,
    Property management system,
    Leasing,
    Leasing management,
    Leasing manager,
    Leasing management system,
    Real estate management,
    Real estate manager,
    Real estate management system,
    Long-term lease,
    Long-term Rental property,
    Rental Property,
    Rental property management system,
    Real Property Technology,
    Rental Property Technology,
    Rental Property Business,
    System as a service,
    Condominium management system,
    Association Management System,
    Rental billing system,
    property management system for hotels,
    property management system in hotel,
    leasing management software,
    property leasing management,
    property management software,
    property management software systems,
    property management companies,
    Real Estate Technology,
    online condominium management system,
    association management system software">

    <!-- facebook -->
    <meta property="og:url" content="http://propsuite.net">
    <meta property="og:type" content="website">
    <meta property="og:title"
        content="Increase transparency, and efficiency in rental property operations with a simple and easy to use system for leasing and property management.">
    <meta property="og:description" content="Visit us now: propsuite.net">
    <meta property="og:image" content="http://propsuite.net/brands/propsuite/propsuite.png">

    <script type="application/ld+json">

        "@context": "https://schema.org",
        "@type": "Saas Business",
        "name": "Propsuite",
        "image": "http://propsuite.net/brands/propsuite/propsuite.png",
        "@id": "http://propsuite.net/",
        "url": "http://propsuite.net/",
        "telephone": "(+63) 916 779 9750",
        "email": "admin@propsuite.net",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "39 Engineers Hill",
            "addressLocality": "Baguio City",
            "postalCode": "2600",
            "addressCountry": "Philippines"
        }
        "sameAs" : [
            "https://www.linkedin.com/company/propsuite",
        ]


    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P3GZPSF');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XFVDKSHJQL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-XFVDKSHJQL');
    </script>

    <script type="text/javascript">
        (function() {
        window.sib = {
            equeue: [],
            client_key: "zog8pyjpmglpbw3pgnvz7kyg"
        };
        /* OPTIONAL: email for identify request*/
        // window.sib.email_id = 'example@domain.com';
        window.sendinblue = {};
        for (var j = ['track', 'identify', 'trackLink', 'page'], i = 0; i < j.length; i++) {
        (function(k) {
            window.sendinblue[k] = function() {
                var arg = Array.prototype.slice.call(arguments);
                (window.sib[k] || function() {
                        var t = {};
                        t[k] = arg;
                        window.sib.equeue.push(t);
                    })(arg[0], arg[1], arg[2]);
                };
            })(j[i]);
        }
        var n = document.createElement("script"),
            i = document.getElementsByTagName("script")[0];
            n.type = "text/javascript", n.id = "sendinblue-js",
            n.async = !0, n.src = "https://sibautomation.com/sa.js?key="+ window.sib.client_key,
            i.parentNode.insertBefore(n, i), window.sendinblue.page();
    })();
    </script>

</head>

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

    .topnav {
        width: 100%;
        background-size: cover;
        background: transparent;
        height: 80px;
        min-width: 400px;
    }

    .navbar {
        width: 100%;
        position: fixed;
        top: 0px;
        transition: 0.5s;
        background: transparent;
        height: 80px;
        min-width: 400px;
    }

    .navbar ul li {

        cursor: pointer;
        border-radius: 10px;
        transition: 0.5s;
    }
</style>

<html>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3GZPSF" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <!-- navigation -->

    <body>
        <nav class="topnav hidden  lg:block">
            <div class="navbar" id="nav">
                <a class="text-3xl font-bold leading-none " href="/">
                    <img class="h-14 m-3" src="{{ asset('/brands/propsuite/propsuite-gray.png') }}"
                        alt="propsuite logo">
                </a>




                <ul
                    class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-10">

                    <li>
                        <button
                            class="text-gray-200 hover:text-gray-400 font-medium rounded-lg text-base text-center inline-flex items-center"
                            type="button" data-dropdown-toggle="products">Products<svg class="w-4 h-4 ml-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div class="hidden text-base z-50 list-none bg-white" id="products">

                            <ul class="" aria-labelledby="products">
                                <li>
                                    <a href="/propsuite" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">PropSuite</a>
                                </li>
                                <li>
                                    <a href="/propsuite-lite" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">PropSuite Lite</a>
                                </li>
                                <li>
                                    <a href="/propsuite-daily" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">PropSuite Daily</a>
                                </li>
                                <li>
                                    <a href="/propsuite-hoa" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">PropSuite HOA</a>
                                </li>
                                <li>
                                    <a href="/propsuite-condo" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">PropSuite Condo</a>
                                </li>
                            </ul>
                        </div>



                    </li>
                    <li>
                        <button
                            class="text-gray-200 hover:text-gray-400 font-medium rounded-lg text-base text-center inline-flex items-center"
                            type="button" data-dropdown-toggle="services">Services<svg class="w-4 h-4 ml-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div class="hidden text-base z-50 list-none bg-white" id="services">

                            <ul class="" aria-labelledby="services">
                                <li>
                                    <a href="/propsuite" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">PropSuite</a>
                                </li>
                                <li>
                                    <a href="/propbiz" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">PropBiz</a>
                                </li>
                                <li>
                                    <a href="/proprent" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">PropRent</a>
                                </li>
                            </ul>
                        </div>



                    </li>

                    <li>
                        <button
                            class="text-gray-200 hover:text-gray-400 font-medium rounded-lg text-base text-center inline-flex items-center"
                            type="button" data-dropdown-toggle="resources">Resources<svg class="w-4 h-4 ml-2" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>
                        <!-- Dropdown menu -->
                        <div class="hidden text-base z-50 list-none bg-white" id="resources">

                            <ul class="" aria-labelledby="resources">
                                <li>
                                    <a href="/resources" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">Resources</a>
                                </li>
                                <li>
                                    <a href="/articles" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">Articles</a>
                                </li>
                                <li>
                                    <a href="/about" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">About Us</a>
                                </li>
                                <li>
                                    <a href="/faq" class="text-base  text-gray-600 hover:text-yellow-500 hover:underline block px-3  py-3">FAQs</a>
                                </li>
                            </ul>
                        </div>



                    </li>



                    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>


                    <li><a class="text-base font-medium text-gray-200 hover:text-gray-400" href="pricing">Pricing</a></li>


                    </li>


                </ul>

                <div class="flex justify-end -mt-12 px-10">
                    <div class="flex justify-between space-x-5">
                        <button class="rounded-xl px-3 py-1 bg-yellow-300 text-sm text-white hover:bg-gray-200"><a
                                href="/login">Sign In</a></button>
                        <button
                            class="rounded-xl px-3 py-1 bg-transparent border border-gray-100 text-sm text-white hover:bg-gray-200"><a
                                href="/select-a-plan">Sign Up</a></button>
                    </div>
                </div>

            </div>

            </div>


        </nav>

        <script>
            const nav = document.querySelector('.navbar');

            window.addEventListener('scroll', () => {
                if (window.scrollY > 100) nav.style.background = '#4F3F6D';
                else nav.style.background = 'transparent';
            });
        </script>

        <div class="navbar-menu relative z-50 hidden">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
            <nav
                class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                <div class="flex items-center mb-8">
                    <a class="mr-auto text-3xl font-bold leading-none" href="#">
                        <img class="h-20" src="{{ asset('/brands/'.env('APP_LOGO')) }}"
                            alt="{{ env('APP_LOGO_DESC') }}">
                    </a>
                    <button class="navbar-close">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul>
                        <li class="mb-1" tabindex="0">
                            <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                                href="/">Home</a>
                        </li>
                        <li class="mb-1" tabindex="0">
                            <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                                href="/about">About Us</a>
                        </li>
                        <li class="mb-1" tabindex="0">
                            <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                                href="/faq">FAQs</a>
                        </li>
                        <li class="mb-1" tabindex="0">
                            <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                                href="/articles">Articles</a>
                        </li>
                        <li class="mb-1" tabindex="0">
                            <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                                href="/owner-corner">Property Owners Corner</a>
                        </li>

                    </ul>
                </div>
        </div>

        <nav id="nav" class="lg:sticky top-0 z-10 relative px-4 py-4 flex justify-between items-center">
            <a class="text-3xl font-bold leading-none" href="/">
                <img class="h-10 lg:hidden" src="{{ asset('/brands/propsuite/propsuite-gray.png') }}"
                    alt="propsuite logo">
            </a>
            <div class="lg:hidden">
                <button class="navbar-burger flex items-center text-white p-3">
                    <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Mobile menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                    </svg>
                </button>
            </div>

        </nav>
        <div class="navbar-menu relative z-50 hidden">
            <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
            <nav id="nav"
                class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
                <div class="flex items-center mb-8">
                    <a class="mr-auto text-3xl font-bold leading-none" href="#">
                        <img class="h-20" src="{{ asset('/brands/'.env('APP_LOGO')) }}"
                            alt="{{ env('APP_LOGO_DESC') }}">
                    </a>
                    <button class="navbar-close">
                        <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <div>
                    <ul>
                        <li class="mb-1" tabindex="0">
                            <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                                href="/">Home</a>
                        </li>



                        <button class="w-full block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 roundedtext-center inline-flex items-center" type="button" data-dropdown-toggle="prod-mobile">Products
                            <svg class="justify-end w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>

                        </button>

                        <div class="w-full hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4 p-4" id="prod-mobile">

                            <ul class="py-1" aria-labelledby="prod-mobile">
                            <li>
                                <a href="/propsuite" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">PropSuite</a>
                            </li>
                            <li>
                                <a href="/propsuite-lite" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">PropSuite Lite</a>
                            </li>
                            <li>
                                <a href="/propsuite-daily" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">PropSuite Daily</a>
                            </li>
                            <li>
                                <a href="/propsuite-hoa" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">PropSuite HOA</a>
                            </li>
                            <li>
                                <a href="/propsuite-condo" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">PropSuite Condo</a>
                            </li>
                            </ul>
                        </div>

                        <button class="w-full block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 roundedtext-center inline-flex items-center" type="button" data-dropdown-toggle="serv-mobile">Services
                            <svg class="justify-end w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>

                        </button>

                        <div class="w-full hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4 p-4" id="serv-mobile">

                            <ul class="py-1" aria-labelledby="serv-mobile">
                            <li>
                                <a href="/propsuite" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">PropSuite</a>
                            </li>
                            <li>
                                <a href="/propbiz" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">PropBiz</a>
                            </li>
                            <li>
                                <a href="/proprent" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">PropRent</a>
                            </li>

                            </ul>
                        </div>

                        <button class="w-full block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 roundedtext-center inline-flex items-center" type="button" data-dropdown-toggle="res-mobile">Resources
                            <svg class="justify-end w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>

                        </button>

                        <div class="w-full hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4 p-4" id="res-mobile">

                            <ul class="py-1" aria-labelledby="res-mobile">
                            <li>
                                <a href="/resources" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">Resources</a>
                            </li>

                            <li>
                                <a href="/articles" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">Articles</a>
                            </li>
                            <li>
                                <a href="/about" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">About Us</a>
                            </li>
                            <li>
                                <a href="/faq" class="w-full text-sm hover:bg-gray-100 text-gray-700 block p-4">FAQs</a>
                            </li>

                            </ul>
                        </div>




                        <li class="mb-1" tabindex="0">
                            <a class="block p-4 text-sm font-medium text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded"
                                href="/pricing">Pricing</a>
                        </li>

                        <li class="mt-5 mb-1" tabindex="0">
                            <a class="block p-4 text-sm text-center font-medium text-white bg-purple-500 hover:bg-purple-100 hover:text-purple-500 rounded"
                            href="/login">Sign In</a>
                        </li>

                        <li class="mb-1" tabindex="0">
                            <a class="block p-4 text-sm text-center font-medium text-white bg-yellow-300 hover:bg-purple-100 hover:text-purple-500 rounded"
                            href="/select-a-plan">Sign Up</a>
                        </li>

                    </ul>
                </div>
                <div class="mt-auto">

                    <p class="my-4 text-xs text-center text-gray-400">
                        <span>Copyright © 2022</span>
                    </p>
                </div>
            </nav>
        </div>
    </body>

    <script>
        // Burger menus
        document.addEventListener('DOMContentLoaded', function() {
            // open
            const burger = document.querySelectorAll('.navbar-burger');
            const menu = document.querySelectorAll('.navbar-menu');

            if (burger.length && menu.length) {
                for (var i = 0; i < burger.length; i++) {
                    burger[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            // close
            const close = document.querySelectorAll('.navbar-close');
            const backdrop = document.querySelectorAll('.navbar-backdrop');

            if (close.length) {
                for (var i = 0; i < close.length; i++) {
                    close[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }

            if (backdrop.length) {
                for (var i = 0; i < backdrop.length; i++) {
                    backdrop[i].addEventListener('click', function() {
                        for (var j = 0; j < menu.length; j++) {
                            menu[j].classList.toggle('hidden');
                        }
                    });
                }
            }
        });
    </script>

    <main>
        <!-- Social Sharing Bar -->
        <div class="fixed right-0 bottom-0 z-50 px-5 py-3 bg-transparent flex flex-col space-y-3">
            <!-- Facebook -->
            <a href="https://www.facebook.com/propsuite" title="Share on Facebook">
                <?xml version="1.0" ?>
                <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg
                    height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                    version="1.1" viewBox="0 0 512 512" width="30" xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path
                        d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-106.468,0l0,-192.915l66.6,0l12.672,-82.621l-79.272,0l0,-53.617c0,-22.603 11.073,-44.636 46.58,-44.636l36.042,0l0,-70.34c0,0 -32.71,-5.582 -63.982,-5.582c-65.288,0 -107.96,39.569 -107.96,111.204l0,62.971l-72.573,0l0,82.621l72.573,0l0,192.915l-191.104,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Z" />
                </svg>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/company/propsuite" title="Share on LinkedIn">
                <?xml version="1.0" ?>
                <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg
                    height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                    version="1.1" viewBox="0 0 512 512" width="30" xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path
                        d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-288.985,423.278l0,-225.717l-75.04,0l0,225.717l75.04,0Zm270.539,0l0,-129.439c0,-69.333 -37.018,-101.586 -86.381,-101.586c-39.804,0 -57.634,21.891 -67.617,37.266l0,-31.958l-75.021,0c0.995,21.181 0,225.717 0,225.717l75.02,0l0,-126.056c0,-6.748 0.486,-13.492 2.474,-18.315c5.414,-13.475 17.767,-27.434 38.494,-27.434c27.135,0 38.007,20.707 38.007,51.037l0,120.768l75.024,0Zm-307.552,-334.556c-25.674,0 -42.448,16.879 -42.448,39.002c0,21.658 16.264,39.002 41.455,39.002l0.484,0c26.165,0 42.452,-17.344 42.452,-39.002c-0.485,-22.092 -16.241,-38.954 -41.943,-39.002Z" />
                </svg>
            </a>
        </div>

        {{$slot}}
    </main>


    <footer class="bg-gray-50" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="content-center mx-auto max-w-xl px-4 pt-16 pb-8 sm:px-6 lg:px-8 lg:pt-24">
            <div class="xl:grid xl:grid-cols-1 xl:gap-8">
                <div class="grid grid-cols-3 gap-8 xl:col-span-2">

                    <div class="md:grid md:grid-cols-1 md:gap-8">
                        <div>

                            <ul role="list" class="mt-4 space-y-4">

                                <li>
                                    <a href="articles" class="text-base text-gray-500 hover:text-gray-900">Articles</a>
                                </li>

                                <li>
                                    <a href="job" class="text-base text-gray-500 hover:text-gray-900">Jobs</a>
                                </li>


                            </ul>
                        </div>
                    </div>

                    <div class="md:grid md:grid-cols-1 md:gap-8">

                        <ul role="list" class="mt-4 space-y-4">
                            <li>
                                <a href="/about" class="text-base text-gray-500 hover:text-gray-900">About Us</a>
                            </li>

                            <li>
                                <a href="/faq" class="text-base text-gray-500 hover:text-gray-900">FAQs</a>
                            </li>

                            <li>
                                <a href="/propbiz" class="text-base text-gray-500 hover:text-gray-900">Propbiz</a>
                            </li>






                        </ul>
                    </div>

                    <div class="md:grid md:grid-cols-1 md:gap-8">
                        <div>

                            <ul role="list" class="mt-4 space-y-4">
                                <li>
                                    <a href="terms" class="text-base text-gray-500 hover:text-gray-900">Terms &
                                        Conditions</a>
                                </li>


                                <li>
                                    <a href="privacy" class="text-base text-gray-500 hover:text-gray-900">Privacy
                                        Policy</a>
                                </li>

                            </ul>
                        </div>

                    </div>
                </div>

            </div>

            <div class="mt-12 border-t border-gray-200 pt-8 flex items-center justify-center lg:mt-16">

                <p class="mt-8 text-base text-gray-400 md:order-1 md:mt-0">&copy; 2023 {{ env('APP_NAME') }} All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    </div>

    <script src="https://cdn.popupsmart.com/bundle.js" data-id="79845" async defer></script>

</body>

</html>
