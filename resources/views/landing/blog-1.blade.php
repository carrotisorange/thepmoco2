<x-landing-page-template>
@section('title','The PMO — Article')
@section('description', 'A product to make easy the life of property managers and property owners. The property management system is a handy application to simplify operations in rental properties from tenant finding, lease contract management, billing and collection management, and concerns and maintenance requests for landlords, dormitories, apartment rentals, and other rentals.')
<div class="mx-10 mt-4 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
	<span class="block">Page 1 of 3</span>
	<div class="space-x-1">
		<a href="blog-1"><button title="previous" type="button" class="inline-flex items-center justify-center w-8 h-8 py-0 border rounded-md shadow">
			<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4">
				<polyline points="15 18 9 12 15 6"></polyline>
			</svg>
		</button>
    </a>

		<a href="blog-2"><button title="next" type="button" class="inline-flex items-center justify-center w-8 h-8 py-0 border rounded-md shadow">
			<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4">
				<polyline points="9 18 15 12 9 6"></polyline>
			</svg>
		</button>
    </a>
	</div>
</div>

<div class="relative  px-4 pt-16 pb-20 sm:px-6 lg:px-8 lg:pt-5 lg:pb-28">
  <div class="absolute inset-0">
    <div class="h-1/3 bg-white sm:h-2/3"></div>
  </div>
  <div class="relative mx-auto max-w-6xl">
    
    <div class="mx-auto mt-3 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-4">

    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article12"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article12.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article12" class="hover:underline">Article</a>
            </p>
            <a href="article12" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How Digital Systems Improve Tenant Retention and Satisfaction</p>
              <p class="mt-3 text-sm text-gray-500">
              When you own a building, you want to make sure that it is running smoothly. You also want to keep your tenants happy and satisfied so that they don't move out. By using digital systems</p>
            </a>
          </div>
          
        </div>
      </div>

    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article11"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article11.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article11" class="hover:underline">Article</a>
            </p>
            <a href="article11" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How an Online Property Management System Instantly Improves Business Profitability for Landlords</p>
              <p class="mt-3 text-sm text-gray-500">
              If you own a rental property, you're probably familiar with the challenges of managing it. You'll have bad tenants, late payments, and sometimes even need to evict people from your space. In order to run your business effectively,</p>
            </a>
          </div>
          
        </div>
      </div>

    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article10"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article10.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article10" class="hover:underline">Article</a>
            </p>
            <a href="article10" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">Why Designing Beautiful Rentable Spaces Has Over All Positive Results</p>
              <p class="mt-3 text-sm text-gray-500">
              Renting a space is a great way to earn some extra money, but it can be challenging if you don’t know what you’re doing. </p>
            </a>
          </div>
          
        </div>
      </div>

    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article9"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article9.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article9" class="hover:underline">Article</a>
            </p>
            <a href="article9" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How to reduce digitalization pain points</p>
              <p class="mt-3 text-sm text-gray-500">
              The digitalization of business has introduced a whole new set of challenges for many organizations.</p>
            </a>
          </div>
          
        </div>
      </div>

    

      

      

      
      
        

    </div>
  </div>
</div>

    
</x-landing-page-template>