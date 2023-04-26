<x-landing-page-template>
@section('title','The PMO — Article')
@section('description', 'A product to make easy the life of property managers and property owners. The property management system is a handy application to simplify operations in rental properties from tenant finding, lease contract management, billing and collection management, and concerns and maintenance requests for landlords, dormitories, apartment rentals, and other rentals.')



<!-- component -->
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Articles</h1>

        <div class="mx-10 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
	    <span class="block">Page 1 of 2</span>
		

    <!-- <a href="#" class="flex items-center px-4 py-2 mx-1 text-gray-500 bg-white rounded-md cursor-not-allowed dark:bg-gray-800 dark:text-gray-600">
        previous
    </a> -->

    <a href="blog-1" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        1
    </a>

    <a href="blog-2" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        2
    </a>

    <a href="blog-3" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        3
    </a>

    <!-- <a href="blog-4" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        4
    </a> -->

    <a href="blog-2" class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        Next
    </a>
</div>
        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
            
            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article18.jpeg') }}" alt="businessman signing a contract">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="How-to-be-great-and-effective-at-rental-property-operations" class="mt-2 block">
                    <p class="text-base font-semibold text-gray-900">How to be great and effective at rental property operations</p>
                    <p class="mt-3 text-sm text-gray-500">
                    Being great at rental property operations involves a combination of skills, knowledge, and experience. Here are some tips to help you excel in this field.</p>
                </a>    
                    <span class="text-sm text-gray-500 dark:text-gray-300">26 April 2023</span>
                </div>
            </div>
            
            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article17.jpg') }}" alt="businessman signing a contract">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="How-to-Choose-the-Right-Property-Management-Company" class="mt-2 block">
                    <p class="text-base font-semibold text-gray-900">How to Choose the right Property Management Company</p>
                    <p class="mt-3 text-sm text-gray-500">
                    Choosing the right property management company can make a significant difference in the success of your investment</p>
                </a>    
                    <span class="text-sm text-gray-500 dark:text-gray-300">6 March 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article16.jpeg') }}" alt="3 vacation homes in an island">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="10-Tips-to-increase-occupancy-rate-and-profitability-for-vacation-homes" class="mt-2 block">
                    <p class="text-base font-semibold text-gray-900">10 Tips to increase occupancy rate and profitability for vacation homes</p>
                    <p class="mt-3 text-sm text-gray-500">
                    If you're a business owner, it's easy to get wrapped up in the day-to-day operations of your company.</p>
                </a>    
                    <span class="text-sm text-gray-500 dark:text-gray-300">2 March 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article15.jpeg') }}" alt="pool view with palm trees" alt="">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="Is-a-vacation-rental-more-profitable-than-a-long-term-rental-property" class="mt-2 block">
                    <p class="text-base font-semibold text-gray-900">Is a vacation rental more profitable than a long-term rental property</p>
                    <p class="mt-3 text-sm text-gray-500">
                    Vacation rentals are becoming more popular, but they can be a little bit tricky to navigate. The good news is </p>
                </a>    
                    <span class="text-sm text-gray-500 dark:text-gray-300">27 February 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article14.jpg') }}" alt="asian family">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="How-Smart-Landlords-Keep-Tenants-Happy-So-They-Dont-Move-Out" class="mt-2 block">
                    <p class="text-base font-semibold text-gray-900">How Smart Landlords Keep Tenants Happy So They Don't Move Out</p>
                    <p class="mt-3 text-sm text-gray-500">
                    Landlords are the hardest people to deal with, right? They're always asking for more money, they never clean up after themselves, and</p>
                </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">23 February 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article13.jpeg') }}" alt="door with multiple locks">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="How-to-Improve-Building-Security-to-Make-Residents-Feel-Safe" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How to Improve Building Security to Make Residents Feel Safe</p>
              <p class="mt-3 text-sm text-gray-500">
              Improving building security can involve a variety of measures, some of which include:</p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">20 February 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article12.jpg') }}" alt="family cuddling on a bed">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="How-Digital-Systems-Improve-Tenant-Retention-and-Satisfaction" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How Digital Systems Improve Tenant Retention and Satisfaction</p>
              <p class="mt-3 text-sm text-gray-500">
              When you own a building, you want to make sure that it is running smoothly. You also want to keep your tenants happy and satisfied </p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">16 February 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article11.jpg') }}" alt="apartment building with multiple windows">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="How-an-Online-Property-Management-System-Improves-Business-Profitability-for-Landlords" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How an Online Property Management System Instantly Improves Business Profitability for Landlords</p>
              <p class="mt-3 text-sm text-gray-500">
              If you own a rental property, you're probably familiar with the challenges of managing it. </p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">13 February 2023</span>
                </div>
            </div>

            

            

            

        </div>

        <div class="mx-10 mt-5 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
	    <span class="block">Page 1 of 2</span>
		

    <!-- <a href="#" class="flex items-center px-4 py-2 mx-1 text-gray-500 bg-white rounded-md cursor-not-allowed dark:bg-gray-800 dark:text-gray-600">
        previous
    </a> -->

    <a href="blog-1" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        1
    </a>

    <a href="blog-2" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        2
    </a>

    <a href="blog-3" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        3
    </a>

    <!-- <a href="blog-4" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        4
    </a> -->

    <a href="blog-2" class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        Next
    </a>
</div>

    </div>
</section>

</x-landing-page-template>