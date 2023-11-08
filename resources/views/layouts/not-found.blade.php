
<x-landing-page-template>
    @section('title', 'Page not found |' . env('APP_NAME'))
    <div class="py-16 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 mt-5">

  <h2 class="pt-3 pb-5 text-center text-4xl font-bold tracking-tight text-gray-900 font-pop">404</h2>

  <div class=" flex items-center justify-center">
  <img class="h-56 w-auto"src="{{ asset('/brands/unlock/oops.png') }}">
    </div>

    <p class="text-center font-semibold text-lg text-gray-700">Page not Found.</p>
    <p class="mt-2 text-center font-light text-medium text-gray-700">Sorry, we couldn’t find the page you’re looking for.</p>
    <div class="mt-5 flex items-center justify-center">
    <a href="/"><div button type="button" class="mr-3 w-72 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-purple-900 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Go back to home.</button></div></a>

    </div>

        </div>

    </div>
</x-landing-page-template>
