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

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article6.jpg') }}" alt="two people talking in a restaurant">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="Why-Digitalization-is-the-best-strategy-for-2023" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">Why Digitalization is the best strategy for 2023</p>
              <p class="mt-3 text-sm text-gray-500">
              Digitalization is a strategic approach to business that seeks to leverage the power of digital technologies to achieve business objectives.</p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">26 January 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article5.jpg') }}" alt="hand holding a pc mouse">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="What-do-we-offer-as-a-SaaS-company-to-property-managers-and-owners" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">What do we offer as a SaaS company to property managers and owners in The Property Manager Online?</p>
              <p class="mt-3 text-sm text-gray-500">
              Property managers, real estate agents, and owners of property are always looking for ways to improve the efficiency with which they do their jobs.</p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">23 January 2023</span>
                </div>
            </div>

            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('/brands/landing/article4.jpg') }}" alt="person holding an open sign">

                <div class="flex flex-col justify-between py-6 lg:mx-6">
                <a href="Secret-Recipe-For-Brand-Building-As-Small-Business" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">Secret Recipe For Brand Building As Small Business.</p>
              <p class="mt-3 text-sm text-gray-500">
              In today's marketplace, it's hard for small businesses to stand out from the crowd. But there is one thing that every small business has in common:</p>
            </a>
                    <span class="text-sm text-gray-500 dark:text-gray-300">19 January 2023</span>
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