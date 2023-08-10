<x-landing-page-template>
@section('title','The PMO — Article')
@section('description', 'A product to make easy the life of property managers and property owners. The property management system is a handy application to simplify operations in rental properties from tenant finding, lease contract management, billing and collection management, and concerns and maintenance requests for landlords, dormitories, apartment rentals, and other rentals.')



<!-- component -->
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white">Articles</h1>

        <div class="mx-10 mt-4 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
	<span class="block">Page 1 of 3</span>
		

   <a href="blog-1" class="items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        previous
    </a> 

    <a href="blog-1" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        1
    </a>

    <a href="blog-2" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        2
    </a>

    <!-- <a href="blog-3" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        3
    </a>

    <a href="blog-4" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        4
    </a> -->

    <a href="blog-3" class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        Next
    </a> 
</div>
        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
            
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

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article10.jpg') }}" alt="living room with sofa and coffee table">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="Why-Designing-Beautiful-Rentable-Spaces-Has-Over-All-Positive-Results" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">Why Designing Beautiful Rentable Spaces Has Over All Positive Results</p>
              <p class="mt-3 text-sm text-gray-500">
              Renting a space is a great way to earn some extra money, but it can be challenging if you don’t know what you’re doing. </p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">9 February 2023</span>
                </div>
            </div>


            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article9.jpg') }}" alt="aged man writing infront of computer">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="How-to-reduce-digitalization-pain-points" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How to reduce digitalization pain points</p>
              <p class="mt-3 text-sm text-gray-500">
              The digitalization of business has introduced a whole new set of challenges for many organizations.</p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">6 February 2023</span>
                </div>
            </div>
        
        
            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article8.jpg') }}" alt="person with broom and dustpan">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="Importance-of-having-a-Housekeeping-Program-for-Rental-Properties" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">Importance of having a Housekeeping Program for Rental Properties</p>
              <p class="mt-3 text-sm text-gray-500">
              Training housekeeping staff is an important aspect of ensuring that guests have a positive experience and that the property is well-maintained.</p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">2 February 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article7.jpg') }}" alt="person handing keys to another person" alt="">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="How-To-Improve-Tenant-Retention-Rates" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How To Improve Tenant Retention Rates:</p>
              <p class="mt-3 text-sm text-gray-500">
              10 steps on how to improve tenant retention rates!</p>
            </a>    
                    <span class="text-sm text-gray-500 dark:text-gray-300">30 January 2023</span>
                </div>
            </div>

            

            

            

            

            

           

            

        </div>

        <div class="mx-10 mt-4 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
	<span class="block">Page 1 of 3</span>
		

   <a href="blog-1" class="items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        previous
    </a> 

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

    <a href="blog-3" class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        Next
    </a> 
</div>

    </div>
</section>

</x-landing-page-template>