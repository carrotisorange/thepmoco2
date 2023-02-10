<x-landing-page-template>
@section('title','The PMO — Article')
@section('description', 'A product to make easy the life of property managers and property owners. The property management system is a handy application to simplify operations in rental properties from tenant finding, lease contract management, billing and collection management, and concerns and maintenance requests for landlords, dormitories, apartment rentals, and other rentals.')
<div class="mx-10 mt-4 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
	<span class="block">Page 3 of 3</span>
	<div class="space-x-1">
		<a href="blog-2"><button title="previous" type="button" class="inline-flex items-center justify-center w-8 h-8 py-0 border rounded-md shadow">
			<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4">
				<polyline points="15 18 9 12 15 6"></polyline>
			</svg>
		</button>
    </a>
    <!--  
		<button title="next" type="button" class="inline-flex items-center justify-center w-8 h-8 py-0 border rounded-md shadow">
			<svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4">
				<polyline points="9 18 15 12 9 6"></polyline>
			</svg>
		</button>
    -->
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
          <a href="article4"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article4.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article4" class="hover:underline">Article</a>
            </p>
            <a href="article4" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">Secret Recipe For Brand Building As Small Business.</p>
              <p class="mt-3 text-sm text-gray-500">
              In today's marketplace, it's hard for small businesses to stand out from the crowd. But there is one thing that every small business has in common:</p>
            </a>
          </div>
        </div>
      </div>

      
    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article3"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article3.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article3" class="hover:underline">Article</a>
            </p>
            <a href="article3" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">What are the benefits of a property management system for property managers?</p>
              <p class="mt-3 text-sm text-gray-500">
              A property management system can be a great tool for landlords and property managers. It can help you to manage your properties more efficiently,</p>
            </a>
          </div>
        </div>
      </div>


    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article2"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article2.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article2" class="hover:underline">Article</a>
            </p>
            <a href="article2" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How to use a leasing management system to improve operational efficiency?</p>
              <p class="mt-3 text-sm text-gray-500">
              If you've ever tried to manage a property, you know how hard it can be. From accounting for rent payments to tracking expenses, there are just so many things that need to get done.</p>
            </a>
          </div>
            
        </div>
      </div>

    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article1"><img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="a desk with a keyboard, mouse, phone, and office supplies"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article1" class="hover:underline">Article</a>
            </p>
            <a href="article1" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How our journey started</p>
              <p class="mt-3 text-sm text-gray-500">
                When we first started out as property managers, we followed the old-school methods. During leasing procedures, we used the traditional way</p>
            </a>
          </div>
          
        </div>
      </div>

      

      

      
      

     

      
    </div>
  </div>
</div>

    
</x-landing-page-template>