<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('/brands/favicon.ico') }}" type="image/png">

    <title>The Property Manager: Simplifying Rental Businesses</title>

    <!-- Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/shine/assets/css/LineIcons.2.0.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/shine/assets/css/animate.css') }}">
    <!-- Tiny Slider  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/shine/assets/css/tiny-slider.css') }}">
    <!-- Tailwind css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/shine/assets/css/tailwind.css') }}">
</head>

<body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap" class="relative">
        <!-- Navbar Start -->
        <div class="navigation fixed top-0 left-0 w-full z-30 duration-300">
            <div class="container">
                <nav class="navbar py-2 navbar-expand-lg flex justify-between items-center relative duration-300">
                    <a class="navbar-brand" href="/">
                        <img class="h-24 w-15" src="{{ asset('/brands/full-logo.png') }}" alt="Logo">
                    </a>
                    <button class="navbar-toggler focus:outline-none block lg:hidden" type="button"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse hidden lg:block duration-300 shadow absolute top-100 left-0 mt-full bg-white z-20 px-5 py-3 w-full lg:static lg:bg-transparent lg:shadow-none"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto justify-center items-center lg:flex">
                            <li class="nav-item">
                                <a class="page-scroll active" href="#hero-area">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#services">Services</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="page-scroll" href="#testimonial">Testimonial</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#pricing">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="page-scroll" href="#contact">Contact</a>
                            </li>

                        </ul>
                    </div>
                    <div class="header-btn hidden sm:block sm:absolute sm:right-0 sm:mr-16 lg:static lg:mr-0">
                        <a class="text-blue-600 border border-blue-600 px-10 py-3 rounded-full duration-300 hover:bg-blue-600 hover:text-white"
                            href="/login" target="_blank">Login</a>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->
    </header>
    <!-- Header Area wrapper End -->

    <!-- Hero Area Start -->
    <section id="hero-area" class="bg-blue-100 pt-48 pb-10">
        <div class="container">
            <div class="flex justify-between">
                <div class="w-full text-center">
                    <h2 class="text-4xl font-bold leading-snug text-gray-700 mb-10 wow fadeInUp" data-wow-delay="1s">
                        Simplifying Rental Businesses
                        {{-- <br class="hidden lg:block"> Built with TailwindCSS --}}
                    </h2>
                    <div class="text-center mb-10 wow fadeInUp" data-wow-delay="1.2s">
                        <a href="#feature" rel="nofollow" class="btn">How it works?</a>
                        <a href="/register" rel="nofollow" class="btn">Register for free</a>
                    </div>
                    <div class="text-center wow fadeInUp" data-wow-delay="1.6s">
                        <img class="img-fluid mx-auto" src="{{ asset('/brands/undraw_remotely_2j6y.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Area End -->

    <!-- Services Section Start -->
    <section id="services" class="py-24">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">Our Services</h2>
            </div>
            <div class="flex flex-wrap">
                <!-- Services item -->
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="0.3s">
                        <div class="icon text-5xl">
                            <i class="lni lni-ticket-alt"></i>
                        </div>
                        <div>
                            <h3 class="service-title">Bulk Billing</h3>
                            <p class="text-gray-600">Simplifies the process of billing by providing way to conveniently
                            add, send recurring bills to tenant/owner in a few clicks, and export ready to print
                            statements.</p>
                            {{-- <h3 class="service-title">Bulk Management</h3>
                            <p class="text-gray-600">Allows you to manage multiple properties and to assign team for
                                each property.</p> --}}
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="0.6s">
                        <div class="icon text-5xl">
                            <i class="lni lni-coin"></i>
                        </div>
                        <div>

                            <h3 class="service-title">Payment Solutions </h3>
                            <p class="text-gray-600">Receives payments from the tenants and sends remittance to unit owners.</p>
                            {{-- <h3 class="service-title">Unit Management</h3>
                            <p class="text-gray-600">Monitors status of the units and views up-to-date information and
                                status for marketing.</p> --}}
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="0.9s">
                        <div class="icon text-5xl">
                            <i class="lni lni-users"></i>
                        </div>
                        <div>
                            <h3 class="service-title">Team Monitoring</h3>
                            <p class="text-gray-600">Assigns a role to each personnel and manages them virtually.</p>
                            {{-- <h3 class="service-title">Tenant Management</h3>
                            <p class="text-gray-600">Records the movein and moveout of the tenant and keep track all the
                                previous tenants.</p> --}}
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="1.2s">
                        <div class="icon text-5xl">
                            <i class="lni lni-laptop-phone"></i>
                        </div>
                        <div>
                            <h3 class="service-title">Tenant/Owner Portal</h3>
                            <p class="text-gray-600">Provides convenient access to both tenants and owners to view their contracts, bills, payments, and file concerns.</p>
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="1.5s">
                        <div class="icon text-5xl">
                            <i class="lni lni-bar-chart"></i>
                        </div>
                        <div>
                            <h3 class="service-title">Real-time statistics and reports</h3>
                            <p class="text-gray-600">Offers a hassle free way to monitor property performance through different charts and visuals and downloadable reports. </p>
                        </div>
                    </div>
                </div>
                <!-- Services item -->
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="1.8s">
                        <div class="icon text-5xl">
                            <i class="lni lni-headphone"></i>
                        </div>
                        <div>
                            <h3 class="service-title">24x7 Customer Support</h3>
                            <p class="text-gray-600">Assigns a dedicated team to assist customers in boarding and set up their property.</p>
                        </div>
                    </div>
                </div>

                {{--
                <!-- Services item -->
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="2.1s">
                        <div class="icon text-5xl">
                            <i class="lni lni-mobile"></i>
                        </div>
                        <div>
                            <h3 class="service-title">Tenant/Owner Portal</h3>
                            <p class="text-gray-600">Provides login credentials to tenant/owner to view their contracts,
                                bills, payments, and other pertinent details.</p>
                        </div>
                    </div>
                </div> --}}
                <!-- Services item -->
                {{-- <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="2.4s">
                        <div class="icon text-5xl">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div>
                            <h3 class="service-title">Tenant/Owner Concern Tracker</h3>
                            <p class="text-gray-600">Allows tenant/owner to add, monitor, and rate a concern.</p>
                        </div>
                    </div>
                </div>

                <!-- Services item -->
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="m-4 wow fadeInRight" data-wow-delay="2.7s">
                        <div class="icon text-5xl">
                            <i class="lni lni-mobile"></i>
                        </div>
                        <div>
                            <h3 class="service-title">Owner Management</h3>
                            <p class="text-gray-600">Provides login credentials to tenant/owner to view their contracts,
                                bills,
                                payments, and other pertinent details.</p>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </section>
    <!-- Services Section End -->


    <!-- Feature Section Start -->
    <div id="feature" class="bg-blue-100 py-24">
        <div class="container">
            <div class="flex flex-wrap items-center">
                <div class="w-full">
                    <div class="mb-5 lg:mb-0">
                        <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">How it works?</h2>

                        <div class="flex flex-wrap">
                            <div class="w-full sm:w-1/2 lg:w-1/2">
                                <div class="m-3">
                                    <div class="icon text-4xl">
                                        <i class="lni lni-apartment"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="feature-title">1. Create a property.</h4>
                                        <p>Input the details of your property. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 lg:w-1/2">
                                <div class="m-3">
                                    <div class="icon text-4xl">
                                        <i class="lni lni-users"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="feature-title">2. Form a team.</h4>
                                        <p> Add and assign a role to your personnels, including manager, admin, billing,
                                            and
                                            treasury to manage the created property.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 lg:w-1/2">
                                <div class="m-3">
                                    <div class="icon text-4xl">
                                        <i class="lni lni-home"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="feature-title">3. Add the units. </h4>
                                        <p>Add the units of the property that are for lease.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 lg:w-1/2">
                                <div class="m-3">
                                    <div class="icon text-4xl">
                                        <i class="lni lni-user"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="feature-title">4. Process tenant movein.</h4>
                                        <p>Process the movein of the tenants to their respective units.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 lg:w-1/2">
                                <div class="m-3">
                                    <div class="icon text-4xl">
                                        <i class="lni lni-ticket-alt"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="feature-title">5. Post bills. </h4>
                                        <p> Post the recurring bills of the tenant in bulk or individually and
                                            automatically send them a copy of their statement of accounts in mail. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full sm:w-1/2 lg:w-1/2">
                                <div class="m-3">
                                    <div class="icon text-4xl">
                                        <i class="lni lni-coin"></i>
                                    </div>
                                    <div class="features-content">
                                        <h4 class="feature-title">6. Record payments</h4>
                                        <p>Record payments made by the tenants and them and automatically send them an
                                            acknowledgement receipts.</p>
                                    </div>
                                </div>
                            </div>
                     
                        </div>
                    </div>
                </div>
                {{-- <div class="w-full lg:w-1/2">
                    <div class="mx-3 lg:mr-0 lg:ml-3 wow fadeInRight" data-wow-delay="0.3s">
                        <img src="{{ asset('/brands/quick.png') }}" alt="">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Feature Section End -->

    <!-- Team Section Start -->
    {{-- <section id="team" class="py-24 text-center">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">Our Team</h2>
            </div>
            <div class="flex flex-wrap justify-center">
                <!-- Team Item Starts -->
                <div class="max-w-sm sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="team-item">
                        <div class="team-img relative">
                            <img class="img-fluid" src="{{ asset('/shine/assets/img/team/img1.jpg') }}" alt="">
                            <div class="team-overlay">
                                <ul class="flex justify-center">
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-indigo-500">
                                            <i class="lni lni-facebook-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-blue-400">
                                            <i class="lni lni-twitter-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-red-500">
                                            <i class="lni lni-instagram-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center px-5 py-3">
                            <h3 class="team-name">John Doe</h3>
                            <p>UX UI Designer</p>
                        </div>
                    </div>
                </div>
                <!-- Team Item Ends -->
                <!-- Team Item Starts -->
                <div class="max-w-sm sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="team-item">
                        <div class="team-img relative">
                            <img class="img-fluid" src="{{ asset('/shine/assets/img/team/img2.jpg') }}" alt="">
                            <div class="team-overlay">
                                <ul class="flex justify-center">
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-indigo-500">
                                            <i class="lni lni-facebook-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-blue-400">
                                            <i class="lni lni-twitter-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-red-500">
                                            <i class="lni lni-instagram-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center px-5 py-3">
                            <h3 class="team-name">Sarah Doe</h3>
                            <p>Front-End Developer</p>
                        </div>
                    </div>
                </div>
                <!-- Team Item Ends -->
                <!-- Team Item Starts -->
                <div class="max-w-sm sm:w-1/2 md:w-1/2 lg:w-1/3">
                    <div class="team-item">
                        <div class="team-img relative">
                            <img class="img-fluid" src="{{ asset('/shine/assets/img/team/img3.jpg') }}" alt="">
                            <div class="team-overlay">
                                <ul class="flex justify-center">
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-indigo-500">
                                            <i class="lni lni-facebook-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-blue-400">
                                            <i class="lni lni-twitter-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="mx-1">
                                        <a href="#" class="social-link hover:bg-red-500">
                                            <i class="lni lni-instagram-original" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center px-5 py-3">
                            <h3 class="team-name">Rob Hope</h3>
                            <p>Front-end Developer</p>
                        </div>
                    </div>
                </div>
                <!-- Team Item Ends -->
            </div>
        </div>
    </section> --}}
    <!-- Team Section End -->

    <!-- Clients Section Start -->
    <div id="clients" class="py-16 bg-blue-100">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-12 section-heading wow fadeInDown" data-wow-delay="0.3s">Clients</h2>
            </div>
            <div class="flex flex-wrap justify-center">
                <div class="w-1/2 md:w-1/4 lg:w-1/4">
                    <div class="m-3 wow fadeInUp" data-wow-delay="0.3s">
                        <img class="client-logo" src="{{ asset('/brands/clients/client-1.png') }}" alt="">
                    </div>
                </div>
                <div class="w-1/2 md:w-1/4 lg:w-1/4">
                    <div class="m-3 wow fadeInUp" data-wow-delay="0.6s">
                        <img class="client-logo" src="{{ asset('/brands/clients/client-2.png') }}" alt="">
                    </div>
                </div>
                <div class="w-1/2 md:w-1/4 lg:w-1/4">
                    <div class="m-3 wow fadeInUp" data-wow-delay="0.9s">
                        <img class="client-logo" src="{{ asset('/brands/clients/client-3.png') }}" alt="">
                    </div>
                </div>
                <div class="w-1/2 md:w-1/4 lg:w-1/4">
                    <div class="m-3 wow fadeInUp" data-wow-delay="1.2s">
                        <img class="client-logo" src="{{ asset('/brands/clients/client-4.png') }}" alt="">
                    </div>
                </div>
                <div class="w-1/2 md:w-1/4 lg:w-1/4">
                    <div class="m-3 wow fadeInUp" data-wow-delay="1.5s">
                        <img class="client-logo" src="{{ asset('/brands/clients/client-5.png') }}" alt="">
                    </div>
                </div>
                <div class="w-1/2 md:w-1/4 lg:w-1/4">
                    <div class="m-3 wow fadeInUp" data-wow-delay="1.8s">
                        <img class="client-logo" src="{{ asset('/brands/clients/client-6.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Clients Section End -->

    <!-- Testimonial Section Start -->
    <section id="testimonial" class="py-24 bg-gray-800">
        <div class="container">
            <div class="flex justify-center mx-3">
                <div class="w-full lg:w-7/12">
                    <div id="testimonials" class="testimonials">
                        <!-- testimonial item start -->
                        <div class="item focus:outline-none">
                            <div class="text-center py-10 px-8 md:px-10 rounded border border-gray-900">
                                <div class="text-center">
                                    <p class="text-gray-600 leading-loose">"It makes my life less stressful because the
                                        application provides an easy way for tenants to report concerns, and as I
                                        resolve the concern, it provides an option for them
                                        to monitor its status in real-time." </p>
                                </div>
                                {{-- <div class="my-3 mx-auto w-24 h-24 shadow-md rounded-full">
                                    <img class="rounded-full p-2 w-full"
                                        src="{{ asset('/shine/assets/img/testimonial/img1.jpg') }}" alt="">
                                </div> --}}
                                <div class="mb-2">
                                    <h2 class="font-bold text-lg uppercase text-blue-600 mb-2">Kate</h2>
                                    <h3 class="font-medium text-white text-sm">Admin at North Cambridge Condominium</h3>
                                </div>
                            </div>
                        </div>
                        <!-- testimonial item end -->
                        <!-- testimonial item start -->
                        {{-- <div class="item focus:outline-none">
                            <div class="text-center py-10 px-8 md:px-10 rounded border border-gray-900">
                                <div class="text-center">
                                    <p class="text-gray-600 leading-loose">Holisticly empower leveraged ROI whereas
                                        effective web-readiness. Completely enable emerging meta-services with
                                        cross-platform web services. Quickly initiate inexpensive total linkage rather
                                        than extensible scenarios. Holisticly empower leveraged ROI whereas effective
                                        web-readiness. </p>
                                </div>
                                <div class="my-3 mx-auto w-24 h-24 shadow-md rounded-full">
                                    <img class="rounded-full p-2 w-full"
                                        src="{{ asset('shine/assets/img/testimonial/img2.jpg') }}" alt="">
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-lg uppercase text-blue-600 mb-2">Mila</h2>
                                    <h3 class="font-medium text-white text-sm">PageBulb</h3>
                                </div>
                            </div>
                        </div> --}}
                        <!-- testimonial item end -->
                        <!-- testimonial item start -->
                        {{-- <div class="item focus:outline-none">
                            <div class="text-center py-10 px-8 md:px-10 rounded border border-gray-900">
                                <div class="text-center">
                                    <p class="text-gray-600 leading-loose">Holisticly empower leveraged ROI whereas
                                        effective web-readiness. Completely enable emerging meta-services with
                                        cross-platform web services. Quickly initiate inexpensive total linkage rather
                                        than extensible scenarios. Holisticly empower leveraged ROI whereas effective
                                        web-readiness. </p>
                                </div>
                                <div class="my-3 mx-auto w-24 h-24 shadow-md rounded-full">
                                    <img class="rounded-full p-2 w-full"
                                        src="{{ asset('/shine/assets/img/testimonial/img1.jpg') }}" alt="">
                                </div>
                                <div class="mb-2">
                                    <h2 class="font-bold text-lg uppercase text-blue-600 mb-2">Rob</h2>
                                    <h3 class="font-medium text-white text-sm">OnePageLove</h3>
                                </div>
                            </div>
                        </div> --}}
                        <!-- testimonial item end -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Pricing section Start -->
    <section id="pricing" class="py-24">
        <div class="container">
            <div class="flex flex-wrap justify-center md:justify-start">
                <!-- single pricing table starts -->
                <div class="w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3">
                    <div class="pricing-box">
                        <div class="mb-3">
                            <h3 class="package-name">BASIC</h3>
                        </div>
                        <div class="mb-5">
                            <p class="text-gray-700">
                                <span class="font-bold text-2xl">950</span>
                                <span class="font-medium text-sm">/ Month</span>
                            </p>
                        </div>
                        <ul class="mb-16">
                            <li class="text-gray-500 leading-9">1 year free </li>
                            <li class="text-gray-500 leading-9">1 property </li>
                            <li class="text-gray-500 leading-9">1-20 units</li>
                        </ul>
                        <a href="#" class="btn">Get It</a>
                    </div>
                </div>
                <!-- single pricing table ends -->
                <!-- single pricing table starts -->
                <div class="w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3">
                    <div class="pricing-box bg-blue-100 wow fadeInLeft" data-wow-delay="1.2s">
                        <div class="mb-3">
                            <h3 class="package-name">ADVANCED</h3>
                        </div>
                        <div class="mb-5">
                            <p class="text-gray-700">
                                <span class="font-bold text-2xl">₱1,800</span>
                                <span class="font-medium text-sm">/ Month</span>
                            </p>
                        </div>
                        <ul class="mb-16">
                            <li class="text-gray-500 leading-9">1 year free </li>
                            <li class="text-gray-500 leading-9">Up to 5 properties </li>
                            <li class="text-gray-500 leading-9">21-50 units</li>
                            <li class="text-gray-500 leading-9">Access to tenant/owner portal</li>
                            <li class="text-gray-500 leading-9">Real-time collabration</li>
                        </ul>
                        <a href="#" class="btn">Get It</a>
                    </div>
                </div>
                <!-- single pricing table ends -->
                <!-- single pricing table starts -->
                <div class="w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3">
                    <div class="pricing-box wow fadeInLeft" data-wow-delay="1.5s"">
                        <div class=" mb-3">
                        <h3 class="package-name">Premium</h3>
                    </div>
                    <div class="mb-5">
                        <p class="text-gray-700">
                            <span class="font-bold text-2xl">₱2,400</span>
                            <span class="font-medium text-sm">/ Month</span>
                        </p>
                    </div>
                    <ul class="mb-16">
                        <li class="text-gray-500 leading-9">1 year free </li>
                        <li class="text-gray-500 leading-9">Up to 10 properties </li>
                        <li class="text-gray-500 leading-9">Up to 100 units</li>
                        <li class="text-gray-500 leading-9">Access to tenant/owner portal</li>
                        <li class="text-gray-500 leading-9">Real-time collabration</li>
                        <li class="text-gray-500 leading-9">24x7 Support</li>
                    </ul>
                    <a href="#" class="btn">Get It</a>
                </div>
            </div>
            <!-- single pricing table ends -->
        </div>
        </div>
    </section>
    <!-- Pricing Table Section End -->

    <!-- carousel-area Section Start -->
    {{-- <section class="carousel-area bg-gray-800 py-32">
        <div class="container">
            <div class="flex">
                <div class="w-full relative">
                    <div class="portfolio-carousel">
                        <div>
                            <img class="w-full"
                                src="{{ asset('/brands/rooms/101955390_592535334730594_9190503888714358974_n.jpg') }}"
                                alt="">
                        </div>
                        <div>
                            <img class="w-full"
                                src="{{ asset('/brands/rooms/101969851_592535821397212_3825058178148258861_n.jpg') }}"
                                alt="">
                        </div>
                        <div>
                            <img class="w-full"
                                src="{{ asset('/brands/rooms/101980289_592536174730510_8302611439044557749_n.jpg') }}"
                                alt="">
                        </div>
                        <div>
                            <img class="w-full"
                                src="{{ asset('/brands/rooms/102567268_592535594730568_1505583604093314550_n.jpg') }}"
                                alt="">
                        </div>
                        <div>
                            <img class="w-full"
                                src="{{ asset('/brands/rooms/102726019_592535324730595_2660310519687017386_n.jpg') }}"
                                alt="">
                        </div>
                        <div>
                            <img class="w-full"
                                src="{{ asset('/brands/rooms/103450739_592536151397179_1483878626532432704_n.jpg') }}"
                                alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- carousel-area Section End -->

    <!-- Subscribe Section Start -->
    <section id="Subscribes" class="text-center py-20 bg-blue-100">
        <div class="container">
            <div class="flex justify-center mx-3">
                <div class="w-full sm:w-3/4 md:w-2/3 lg:w-1/2">
                    <h4 class="mb-3 section-heading wow fadeInUp" data-wow-delay="0.3s">Subscribe to our Newsletter</h4>
                    <p class="mb-4 text-gray-600 leading-loose text-sm wow fadeInUp" data-wow-delay="0.6s">Join our
                        subscribers list to get the latest news, updates, and special offers delivered directly to your
                        inbox.</p>

                    <form action="/subscribe" method="post">
                        @csrf

                        <div class="wow fadeInDown" data-wow-delay="0.3s">

                            <input type="Email"
                                class="w-full mb-5 bg-white border border-blue-300 rounded-full px-5 py-3 duration-300 focus:border-blue-600 outline-none"
                                name="email" placeholder="Email Address" required>

                            @error('email')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror


                            <button
                                class="border-0 bg-blue-600 text-white rounded-full w-12 h-12 duration-300 hover:opacity-75"
                                type="submit"><i class="lni lni-arrow-right"></i></button>


                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- Subscribe Section End -->

    <!-- Contact Section Start -->
    <section id="contact" class="py-24">
        <div class="container">
            <div class="text-center">
                <h2 class="mb-12 text-4xl text-gray-700 font-bold tracking-wide wow fadeInDown" data-wow-delay="0.3s">
                    Contact</h2>
            </div>

            <div class="flex flex-wrap contact-form-area wow fadeInUp" data-wow-delay="0.4s">
                <div class="w-full md:w-1/2">
                    <div class="contact">
                        <h2 class="uppercase font-bold text-xl text-gray-700 mb-5 ml-3">Contact Form</h2>
                        <form id="contactForm" method="post" action="/contact">
                            @csrf
                            <div class="flex flex-wrap">
                                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                    <div class="mx-3">
                                        <input type="text" class="form-input rounded-full" id="name" name="name"
                                            placeholder="Name" required data-error="Please enter your name">
                                        @error('name')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                                    <div class="mx-3">
                                        <input type="text" placeholder="Email" id="email"
                                            class="form-input rounded-full" name="email" required
                                            data-error="Please enter your email">
                                        @error('email')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="mx-3">
                                        <input type="text" placeholder="Subject" id="subject" name="subject"
                                            class="form-input rounded-full" required
                                            data-error="Please enter your subject">
                                        @error('subject')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="mx-3">
                                        <textarea class="form-input rounded-lg" id="message" name="message"
                                            placeholder="Your Message" rows="5" data-error="Write your message"
                                            required></textarea>
                                        @error('message')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div class="submit-button mx-3">
                                        <button class="btn" id="form-submit" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="ml-3 md:ml-12 wow fadeIn">
                        <h2 class="uppercase font-bold text-xl text-gray-700 mb-5">Get In Touch</h2>
                        <div>
                            <div class="flex flex-wrap mb-6 items-center">
                                <div class="contact-icon">
                                    <i class="lni lni-map-marker"></i>
                                </div>
                                <p class="pl-3">Philippines</p>
                            </div>
                            <div class="flex flex-wrap mb-6 items-center">
                                <div class="contact-icon">
                                    <i class="lni lni-envelope"></i>
                                </div>
                                <p class="pl-3">
                                    <a href="#" class="block">thepropertymanager2020@gmail.com</a>
                                    {{-- <a href="#" class="block">tomsaulnier@gmail.com</a> --}}
                                </p>
                            </div>
                            <div class="flex flex-wrap mb-6 items-center">
                                <div class="contact-icon">
                                    <i class="lni lni-phone-set"></i>
                                </div>
                                <p class="pl-3">
                                    <a href="#" class="block">+639 7528 26318/+639 1677 99750</a>
                                    {{-- <a href="#" class="block">+99 123 5967</a> --}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Section Start -->
    {{-- <section id="google-map-area">
        <div class="mx-6 mb-6">
            <div class="flex">
                <div class="w-full">
                    <object style="border:0; height: 450px; width: 100%;"
                        data="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3102.7887109309127!2d-77.44196278417968!3d38.95165507956235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzjCsDU3JzA2LjAiTiA3N8KwMjYnMjMuMiJX!5e0!3m2!1sen!2sbd!4v1545420879707"></object>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Map Section End -->

    <!-- Footer Section Start -->
    <footer id="footer" class="bg-gray-800 py-10">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="mx-3 mb-8">
                        <div class="footer-logo mb-3">
                            <img src="{{ asset('/brands/full-logo.png') }}" alt="">
                        </div>
                        {{-- <p class="text-gray-300">We are property managers with about a thousand listings, we were
                            using
                            traditional marketing and many steps of leasing
                            procedures, paper and pen to sign up tenant info sheets, contracts, billing statements and
                            receipts... <a href="/about">Read more</a> </p> --}}
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/2 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="mx-3 mb-8">
                        {{-- <div class="footer-logo mb-3">
                            <img src="{{ asset('/brands/full-logo.png') }}" alt="">
                        </div> --}}
                        <p class="text-gray-300">We are property managers with about a thousand listings, we were using
                            traditional marketing and many steps of leasing
                            procedures,
                            paper and pen to sign up tenant info sheets, contracts, billing statements and receipts. We
                            monitor transactions through
                            spreadsheets
                            and it takes a day to process a report. At one point, our operations are so wrapped up into
                            administrative work that we
                            are spending less
                            time strengthening our customer relations. We spend so much time looking for documents and
                            less time on satisfying
                            customer requests.
                            We realize that if we want to stay in this business and grow, we need to automate our
                            processes so we can focus on the
                            more important
                            aspects of the business like providing good customer service experience while maintaining
                            efficient operations and
                            that’s how thepropertymanager.online was born. </p>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="mx-3 mb-8">
                        <h3 class="font-bold text-xl text-white mb-5">Find us on</h3>

                        <ul class="social-icons flex justify-start">
                            <li class="mx-2">
                                <a target="_blank" href="https://www.facebook.com/onlinepropertymanager"
                                    class="footer-icon hover:bg-indigo-500">
                                    <i class="lni lni-facebook-original" aria-hidden="true"></i>
                                </a>
                            </li>
                            {{-- <li class="mx-2">
                                <a href="#" class="footer-icon hover:bg-blue-400">
                                    <i class="lni lni-twitter-original" aria-hidden="true"></i>
                                </a>
                            </li> --}}
                            {{-- <li class="mx-2">
                                <a target="_blank" href="https://www.instagram.com/onlinepropertymanager/"
                                    class="footer-icon hover:bg-red-500">
                                    <i class="lni lni-instagram-original" aria-hidden="true"></i>
                                </a>
                            </li> --}}
                            {{-- <li class="mx-2">
                                <a href="#" class="footer-icon hover:bg-indigo-600">
                                    <i class="lni lni-linkedin-original" aria-hidden="true"></i>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                {{-- <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="mx-3 mb-8">
                        <h3 class="font-bold text-xl text-white mb-5">Company</h3>
                        <ul>
                            <li><a href="#" class="footer-links">Press Releases</a></li>
                            <li><a href="#" class="footer-links">Mission</a></li>
                            <li><a href="#" class="footer-links">Strategy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="mx-3 mb-8">
                        <h3 class="font-bold text-xl text-white mb-5">About</h3>
                        <ul>
                            <li><a href="#" class="footer-links">Career</a></li>
                            <li><a href="#" class="footer-links">Team</a></li>
                            <li><a href="#" class="footer-links">Clients</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/2 lg:w-1/4 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="mx-3 mb-8">
                        <h3 class="font-bold text-xl text-white mb-5">Find us on</h3>

                        <ul class="social-icons flex justify-start">
                            <li class="mx-2">
                                <a href="#" class="footer-icon hover:bg-indigo-500">
                                    <i class="lni lni-facebook-original" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#" class="footer-icon hover:bg-blue-400">
                                    <i class="lni lni-twitter-original" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#" class="footer-icon hover:bg-red-500">
                                    <i class="lni lni-instagram-original" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#" class="footer-icon hover:bg-indigo-600">
                                    <i class="lni lni-linkedin-original" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <section class="bg-gray-800 py-6 border-t-2 border-gray-700 border-dotted">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full text-center">
                    <p class="text-white">The PMO Co &copy 2021 </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Go to Top Link -->
    <a href="#"
        class="back-to-top w-10 h-10 fixed bottom-0 right-0 mb-5 mr-5 flex items-center justify-center rounded-full bg-blue-600 text-white text-lg z-20 duration-300 hover:bg-blue-400">
        <i class="lni lni-arrow-up"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- All js Here -->
    <script src="{{ asset('/shine/assets/js/wow.js') }}"></script>
    <script src="{{ asset('/shine/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('/shine/assets/js/contact-form.js') }}"></script>
    <script src="{{ asset('/shine/assets/js/main.js') }}"></script>

    @include('layouts.notifications')
    @include('layouts.messenger-chatbot')
</body>

</html>