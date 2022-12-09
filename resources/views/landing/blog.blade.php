<x-landing-page-template>
@section('title','The PMO — Article')


<div class="relative  px-4 pt-16 pb-20 sm:px-6 lg:px-8 lg:pt-10 lg:pb-28">
  <div class="absolute inset-0">
    <div class="h-1/3 bg-white sm:h-2/3"></div>
  </div>
  <div class="relative mx-auto max-w-5xl">
    
    <div class="mx-auto mt-5 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
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
              <p class="text-xl font-semibold text-gray-900">How our journey started</p>
              <p class="mt-3 text-base text-gray-500">
                When we first started out as property managers, we followed the old-school methods. During leasing procedures, we used the traditional way</p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
              <a href="">
                <span class="sr-only">Anonymous</span>
                <img class="h-16 w-16 rounded-full" src="{{ asset('/brands/landing/f-icon.webp') }}" alt="user vector icon">
              </a>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-900">
                <a href="" class="hover:underline">Anonymous</a>
              </p>
              <div class="flex space-x-1 text-sm text-gray-500">
                <time datetime="2020-03-16">10/22</time>
                <span aria-hidden="true">&middot;</span>
                <span>less than 1 min read</span>
              </div>
            </div>
          </div>
        </div>
      </div>

     

      
    </div>
  </div>
</div>

    
</x-landing-page-template>