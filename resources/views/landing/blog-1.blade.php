<x-landing-page-template>
@section('title','The PMO — Article')

<div class="mx-10 mt-4 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
	<span class="block">Page 1 of 2</span>
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
          <a href="article7"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article7.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article7" class="hover:underline">Article</a>
            </p>
            <a href="article7" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">How To Improve Tenant Retention Rates:</p>
              <p class="mt-3 text-sm text-gray-500">
              10 steps on how to improve tenant retention rates!</p>
            </a>
          </div>
          
        </div>
      </div>

    <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article6"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article6.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article6" class="hover:underline">Article</a>
            </p>
            <a href="article6" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">Why Digitalization is the best strategy for 2023</p>
              <p class="mt-3 text-sm text-gray-500">
              Digitalization is a strategic approach to business that seeks to leverage the power of digital technologies to achieve business objectives.</p>
            </a>
          </div>
          
        </div>
      </div>

      <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article5"><img class="h-48 w-full object-cover" src="{{ asset('/brands/landing/article5.jpg') }}" alt="three people looking laptop property management system"></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article5" class="hover:underline">Article</a>
            </p>
            <a href="article5" class="mt-2 block">
              <p class="text-base font-semibold text-gray-900">What do we offer as a SaaS company to property managers and owners in The Property Manager Online?</p>
              <p class="mt-3 text-sm text-gray-500">
              Property managers, real estate agents, and owners of property are always looking for ways to improve the efficiency with which they do their jobs.</p>
            </a>
          </div>
          
        </div>
      </div>

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

      
      
        

    </div>
  </div>
</div>

    
</x-landing-page-template>