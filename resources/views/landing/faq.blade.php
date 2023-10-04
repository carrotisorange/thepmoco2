<x-landing-page-template>
    @section('title','The PMO — FAQs')
    @section('description', 'A product to make easy the life of property managers and property owners. The property
    management system is a handy application to simplify operations in rental properties from tenant finding, lease
    contract management, billing and collection management, and concerns and maintenance requests for landlords,
    dormitories, apartment rentals, and other rentals.')
    <div class="shadow-xl sm:overflow-hidden ">
        <style>
            body {
                background-color: #A69CC1;
            }

            #everything {
                background-image: url('/brands/landing/faq.jpg');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;

            }
        </style>



        <div class="mt-0 sm:met-0 lg:-mt-4 px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
            <h1 class="text-4xl font-bold tracking-tight sm:text-4xl lg:text-4xl">
                <span class=" text-gray-800">Frequently asked questions</span>

            </h1>
            <p class="text-xl text-white sm:max-w-3xl">Everything You Need to Know</p>
            <p class="mt-10 text-md text-gray-700 sm:max-w-3xl">Need assistance? Check out our answers to some of the
                most
                frequently asked questions below. If you can’t find the answer to your question here, <span
                    class="font-bold text-purple-900"><a href="#contactus">get in touch</a></span> with us today.

            </p>

        </div>
    </div>
    </div>
    </div>

    <!-- what is online rental section -->
    <div class="pb-16 lg:z-10 lg:pb-0" style="background-image: url('/brands/landing/faq-bg.webp');"
        alt="a laptop, message icon, settings icon as background">
        <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-4xl lg:px-0 lg:py-20">
                <blockquote>
                    <div>
                        <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32"
                            aria-hidden="true">
                            <path
                                d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                        </svg>
                        <p class="mt-2 text-3xl font-xl text-gray-800">What is an <span class="font-bold">online rental
                                property
                                management system?</span></p>
                    </div>
                    <footer class="mt-6">
                        <p class="text-base font-sm text-gray-500">
                            An online rental property management system is a software application that helps property
                            owners to
                            manage their rental properties. It allows you to do all the things you would normally be
                            doing yourself,
                            like collecting rent, checking the condition of appliances, making repairs, and even paying
                            bills and
                            taxes.
                            Many online rental property management systems also have built-in accounting features that
                            automatically track your money. <span class="font-bold">{{ env('APP_NAME') }}</span> has
                            this feature.
                        </p>

                    </footer>
                </blockquote>
            </div>
        </div>
    </div>
    </div>



    <!-- why do section -->
    <div class="relative bg-gray-900">
        <div class="absolute inset-x-0 bottom-0 xl:top-0 h-72 xl:h-full">
            <div class=" h-full w-full xl:grid xl:grid-cols-6">

                <div class="sm:ml-0 lg:ml-24 h-full xl:relative xl:col-start-4 col-span-3">
                    <img class=" h-full w-full object-cover opacity-80 xl:absolute xl:inset-0"
                        src="{{ asset('/brands/landing/faq-squares.png') }}"
                        alt="person with laptop accessing thepmo.co">
                    <div aria-hidden="true"
                        class="absolute inset-x-0 top-0 h-32  xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r">
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-4 max-w-3xl px-5 sm:px-6  xl:gap-x-8">
            <div class="relative sm:pl-0 lg:pl-20 pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">

                <p class="mt-12 text-3xl font-light tracking-tight text-indigo-100">
                    Why do <span class="font-bold">property managers</span> need an <span class="font-bold">online
                        rental property
                        management system?</span></p>

                <p class="mt-5 mb-5 text-sm font-thin text-gray-300">
                    Online property management systems have become a necessity for property managers to have to
                    effectively run their businesses. Without a proper online property management system, a property
                    manager can&#39;t collect rent and manage their rental properties effectively.
                </p>

                <p class="mt-5 mb-5 text-sm font-thin text-gray-300">
                    Property management systems are also very important because they allow managers to stay updated on
                    everything that is going on at their properties. For example, if something needs repairing or
                    maintenance, they can log into their online rental property management system and see what needs
                    repair immediately. They will also be able to see how much rent each tenant has paid and when they
                    last paid it. If a tenant owes money, the manager can contact them through the online rental
                    property
                    management system and get the money back right away. This way, the manager does not have to worry
                    about contacting tenants or dealing with collection calls from them.
                </p>

                <p class="mt-5 mb-5 text-sm font-thin text-gray-300">
                    They help to increase the efficiency of your business, while also providing you with a more detailed
                    picture of your rental property portfolio. Here are some of the benefits that a property management
                    system can provide:
                </p>



                <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">

                </div>
            </div>
        </div>
    </div>

    <!-- key features section -->
    <div class="bg-gray-white pb-10">
        <div class="py-20">


            <div class="mx-auto max-w-5xl sm:px-6 lg:px-0">
                <!-- Content area -->
                <div class="pt-8 sm:pt-8 lg:pt-8">
                    <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Key Features of
                        a PMS:
                    </h2>


                    <div
                        class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-2 lg:px-8">

                        <div class="flex flex-col overflow-hidden">
                            <div class="flex flex-1 flex-col justify-between bg-white p-6">
                                <div class="flex-1">
                                    <a class="mt-2 block">

                                        <p class="text-2xl font-semibold text-purple-900">Centralized property
                                            management system.</p>
                                        <p class="mt-3 text-sm text-gray-500">This means that all the details about the
                                            property are stored
                                            in one place, making it easier for you to access the information at any
                                            time.</p>
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="flex flex-col overflow-hidden">
                            <div class="flex flex-1 flex-col justify-between bg-white p-6">
                                <div class="flex-1">
                                    <a class="mt-2 block">

                                        <p class="text-2xl font-semibold text-purple-900">Efficient communication with
                                            tenants and
                                            landlords.</p>
                                        <p class="mt-3 text-sm text-gray-500">You can communicate with your tenants and
                                            landlords through
                                            email, text messages, or phone calls using this tool but it also allows you
                                            to see their responses
                                            right on the screen so that you know what they mean when they respond as
                                            quickly as possible –
                                            it’s faster than writing down notes!</p>
                                    </a>
                                </div>
                            </div>
                        </div>






                    </div>


                </div>
            </div>
        </div>


        <!-- who uses section -->
        <div class="relative overflow-hidden pt-16 pb-32 bg-gray-300">
            <div aria-hidden="true" class="absolute inset-x-0 top-0 h-48"></div>
            <div class="relative">
                <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
                    <div class="mx-auto max-w-xl px-4 sm:px-6 lg:mx-0 lg:max-w-none lg:py-16 lg:px-0">
                        <div>

                            <div class="mt-6">
                                <h2 class="text-3xl font-bold tracking-tight text-gray-900">Who uses an online property
                                    management
                                    system?</h2>
                                <p class="mt-4 text-sm text-gray-700">The property management system (PMS) is a software
                                    program that
                                    can be used by real estate agents, managers, leasing managers, and owners. It allows
                                    them to maintain
                                    a database of high-quality property listings for sale or lease on the market. The
                                    PMS is also used by
                                    real estate agents who want to manage their listings.</p>
                                <p class="mt-4 text-sm text-gray-700">The property management system will help them keep
                                    track of their
                                    listings, manage their inventory, and effectively market their properties. It has
                                    many different
                                    features that make it easier for you to run your business.</p>
                                <p class="mt-4 text-sm text-gray-700">A large number of people in the real estate
                                    industry are using
                                    online property management systems today because they provide many benefits over
                                    traditional methods
                                    of doing business. This includes:</p>
                                <p class="mt-4 text-sm text-gray-700">Improved efficiency - With an online property
                                    management system,
                                    you can access more information about each property without having to call up each
                                    listing separately.
                                    You can also easily add new listings and update existing ones without having to do
                                    any manual work at
                                    all!</p>
                                <p class="mt-4 text-sm text-gray-700">Increased sales - Online property management
                                    system have made it
                                    easier for real estate agents to sell properties faster because they don't have to
                                    spend time looking
                                    through stacks of papers or sending out dozens of emails every day! This reduces the
                                    amount of time
                                    spent on the job which means more money for you!</p>

                            </div>
                        </div>


                        <!-- how much section -->

                    </div>
                    <div class="mt-12 sm:mt-16 lg:mt-0">
                        <div class="-mr-48 pl-4 sm:pl-6 md:-mr-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                            <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none opacity-75"
                                src="{{ asset('/brands/landing/test-2.jpg')}}" alt="Inbox user interface">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-24">
                <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
                    <div class="mx-auto max-w-xl px-4 sm:px-6 lg:col-start-2 lg:mx-0 lg:max-w-none lg:py-32 lg:px-0">
                        <div>

                            <div class="mt-6">
                                <h2 class="text-3xl font-bold tracking-tight text-gray-900">How much does a property
                                    management system
                                    cost?</h2>
                                <p class="mt-4 text-sm text-gray-700">The price of a property management system varies
                                    based on many
                                    factors. The type of system, the number of users, and the size of your company all
                                    affect the cost and
                                    maintenance of the system.</p>
                                <p class="mt-4 text-sm text-gray-700">You should also consider how long you will use it,
                                    whether it's
                                    part-time or full-time, and whether there are any additional fees for features such
                                    as tenant
                                    reporting or email marketing.</p>
                                <p class="mt-4 text-sm text-gray-700">Most property management systems include basic
                                    features like
                                    accounting and billing, but they also offer more advanced features like tenant
                                    screening, mobile
                                    access, and online payment processing. Because they offer so many options, you'll
                                    need to determine
                                    which features are most important to you before selecting a system. Our property
                                    management system is
                                    low cost with the maximum features we can provide.</p>

                            </div>
                        </div>
                    </div>
                    <div class="mt-12 sm:mt-16 lg:col-start-1 lg:mt-0">
                        <div class="-ml-48 pr-4 sm:pr-6 md:-ml-16 lg:relative lg:m-0 lg:h-full lg:px-0">
                            <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none opacity-75"
                                src="{{ asset('/brands/landing/test-3.jpg') }}" alt="Customer profile user interface">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- features section -->
        <div class=" bg-gray-white pb-10">
            <div class="py-20 ">


                <div class=" mx-auto max-w-5xl sm:px-6 lg:px-0">
                    <!-- Content area -->
                    <div class="pt-8 sm:pt-8 lg:pt-8">
                        <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What are the
                            features of
                            an online rental property management system?</h2>
                        <div class="mt-10 space-y-6 text-gray-500 text-center">
                            <p class="mx-5 text-lg">
                                Our goal is to help you save money and improve your business. We want to work with you
                                to streamline
                                your processes and make sure that you&#39;re as efficient as possible.
                            </p>
                        </div>

                        <div
                            class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-3 lg:px-8">

                            <div class="flex flex-col overflow-hidden rounded-lg">
                                <div class="flex flex-1 flex-col justify-between bg-purple-100 p-6">
                                    <div class="flex-1">
                                        <a class="mt-2 block">

                                            <p class="text-sm font-light text-purple-900">Manage tenants, payments, and
                                                bills</p>
                                            <p class="mt-3 text-sm text-gray-500"></p>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-col overflow-hidden rounded-lg">
                                <div class="flex flex-1 flex-col justify-between bg-gray-100 p-6">
                                    <div class="flex-1">
                                        <a class="mt-2 block">

                                            <p class="text-sm font-light text-purple-900">Manage contracts with vendors
                                                and contractors</p>
                                            <p class="mt-3 text-sm text-gray-500"></p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col overflow-hidden rounded-lg">
                                <div class="flex flex-1 flex-col justify-between bg-purple-100 p-6">
                                    <div class="flex-1">
                                        <a class="mt-2 block">

                                            <p class="text-sm font-light text-purple-900">View reports on income and
                                                expenses.</p>
                                            <p class="mt-3 text-sm text-gray-500"></p>
                                        </a>
                                    </div>
                                </div>
                            </div>




                        </div>


                    </div>
                </div>
            </div>

            <!-- what is rms section -->
            <div class=" pb-16 lg:z-10 lg:pb-0" style="background-image: url('/brands/landing/faq-bg.webp');"
                alt="a laptop, message icon, settings icon as background">
                <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
                    <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-4xl lg:px-0 lg:py-20">
                        <blockquote>
                            <div>
                                <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32"
                                    aria-hidden="true">
                                    <path
                                        d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                                </svg>
                                <p class="mt-2 text-3xl font-xl text-gray-800">What is a <span class="font-bold">real
                                        estate management
                                        system?</span></p>
                            </div>
                            <footer class="mt-6">
                                <p class="text-base font-sm text-gray-500">
                                    A real estate management system (or RMS) is a collection of software and hardware
                                    elements that bring
                                    together all of the information needed to manage a property, from one centralized
                                    location.
                                </p>
                                <p class="text-base font-sm text-gray-500">
                                    It includes everything from accounting to marketing, finance, and tenant management.
                                </p>
                                <p class="text-base font-sm text-gray-500">
                                    Real Estate Management Systems are used by property managers and leasing agents to
                                    automate many of
                                    their key processes, such as collecting rent payments, managing leases, and leasing
                                    renewals.
                                </p>

                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>

        <!-- real estate section -->
        <style>
            #estate {
                background-color: #5D5270;
            }
        </style>
        <div id="estate" class="relative">
            <div class="absolute inset-x-0 bottom-0 xl:top-0 h-72 xl:h-full">
                <div class=" h-full w-full xl:grid xl:grid-cols-6">

                    <div class="h-full xl:relative xl:col-start-4 col-span-3">

                        <div aria-hidden="true"
                            class="absolute inset-x-0 top-0 h-32 bg-gradient-to-b  xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-4 max-w-3xl px-10 sm:px-6  xl:gap-x-8">
                <div class="relative sm:pl-0 lg:pl-20 pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">

                    <p class="mt-12 text-3xl font-light tracking-tight text-indigo-100">
                        Real Estate Management in the Philippines</p>

                    <p class="mt-5 mb-5 text-sm font-thin text-gray-300">
                        In the Philippines, real estate management still conducts their business utilizing manual
                        procedures. They
                        would gain from using a rental management system to digitalize their business operations.
                    </p>

                    <p class="mt-5 mb-5 text-sm font-thin text-gray-300">
                        The property management system is one of the most important parts of any real estate business.
                        It ensures
                        that the property is managed well and that it remains in good shape for the owner to enjoy.
                    </p>

                    <p class="mt-5 mb-5 text-sm font-thin text-gray-300">
                        To run a successful property management business, you will need to have a good system in place.
                        This can
                        include setting up policies, procedures, and systems for doing things like paying rent on time
                        and regularly
                        checking up on your tenants, among other things. You should also have a good understanding of
                        how taxes work
                        so that you can collect them properly and pay them on time.
                    </p>

                    <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">

                    </div>
                </div>
            </div>
        </div>

        <!-- rms advantages section -->
        <div class=" bg-gray-white pb-10">
            <div class="py-20 ">


                <div class=" mx-auto max-w-9xl sm:px-6 lg:px-0">
                    <!-- Content area -->
                    <div class="pt-8 sm:pt-8 lg:pt-8">
                        <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">The
                            advantages of using
                            an RMS</h2>
                        <div class="mt-10 space-y-6 text-gray-500 text-center">
                            <div class="flex justify-center items-center">
                                <p class="mx-5 text-center max-w-5xl text-lg">
                                    The real estate management system is software that helps you to manage your
                                    property. The system can
                                    also be used by the owner of the property to manage it.
                                </p>
                            </div>
                        </div>

                        <div
                            class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-4 lg:px-8">

                            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                                <div class="flex flex-1 flex-col justify-between bg-white p-6">
                                    <div class="flex-1">
                                        <a class="mt-2 block">

                                            <p class="text-sm font-light text-purple-900">The user interface is simple
                                                and easy to use. It has
                                                an intuitive interface that makes it easy for both new users and
                                                experienced users to use.</p>
                                            <p class="mt-3 text-sm text-gray-500"></p>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                                <div class="flex flex-1 flex-col justify-between bg-white p-6">
                                    <div class="flex-1">
                                        <a class="mt-2 block">

                                            <p class="text-sm font-light text-purple-900">The software provides reports
                                                on all aspects of the
                                                property, including rent history, profit and loss statement, etc. This
                                                allows you to get an
                                                overview of how your property is performing over time.</p>
                                            <p class="mt-3 text-sm text-gray-500"></p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                                <div class="flex flex-1 flex-col justify-between bg-white p-6">
                                    <div class="flex-1">
                                        <a class="mt-2 block">

                                            <p class="text-sm font-light text-purple-900">It allows you to keep track of
                                                all expenses related
                                                to your real estate business such as rental expenses, maintenance
                                                expenses, etc. You can also
                                                keep track of tax issues related to your business as well as calculate
                                                depreciation costs based
                                                on the amount of time that your building has been in use.</p>
                                            <p class="mt-3 text-sm text-gray-500"></p>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                                <div class="flex flex-1 flex-col justify-between bg-white p-6">
                                    <div class="flex-1">
                                        <a class="mt-2 block">

                                            <p class="text-sm font-light text-purple-900">The system allows you to keep
                                                track of any changes
                                                made to any aspect of your property such as changing its location or
                                                adding a new room or
                                                changing out any fixtures or appliances in the building.
                                            </p>
                                            <p class="mt-3 text-sm text-gray-500"></p>
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>
                </div>
            </div>


            <!-- asset management section -->
            <div class=" pb-16 lg:z-10 lg:pb-0" style="background-image: url('/brands/landing/faq-bg.webp');"
                alt="a laptop, message icon, settings icon as background">
                <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
                    <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-4xl lg:px-0 lg:py-20">

                        <div>

                            <h1 class="mt-2 text-3xl font-xl text-gray-800">What is the <span class="font-bold">asset
                                    management
                                    system in the Philippines?</span></h1>
                        </div>
                        <div class="mt-6">
                            <p class="mb-5 text-base font-sm text-gray-500">
                                A real estate management system (or RMS) is a collection of software and hardware
                                elements that bring
                                together all of the information needed to manage a property, from one centralized
                                location.
                            </p>
                            <p class="mb-5 text-base font-sm text-gray-500">
                                It includes everything from accounting to marketing, finance, and tenant management.
                            </p>
                            <p class="mb-5 text-base font-sm text-gray-500">
                                Real Estate Management Systems are used by property managers and leasing agents to
                                automate many of
                                their key processes, such as collecting rent payments, managing leases, and leasing
                                renewals.
                            </p>

                        </div>

                        <div>

                            <h2 class="mt-2 text-xl font-xl text-gray-800">National Asset Management System: What Is It?
                            </h2>
                        </div>
                        <div class="mt-6">
                            <p class="mb-5 text-base font-sm text-gray-500">
                                The concept of NAMS is not new. It has been introduced in several countries as one of
                                their strategies
                                for sustainable economic growth through the effective use of assets. According to a
                                study conducted by
                                World Bank, "the NAMS concept has gained popularity because it provides a platform for
                                building a
                                national asset base."
                            </p>
                            <p class="mb-5 text-base font-sm text-gray-500">
                                According to this report published by World Bank, "the NAMS concept has gained
                                popularity because it
                                provides a platform for building a national asset base."
                            </p>


                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div id="contactus">
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

</x-landing-page-template>