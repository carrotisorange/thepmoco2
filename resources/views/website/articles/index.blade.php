<x-landing-page-template>
    @section('title', env('APP_NAME').' | Articles')
    @section('description', 'A product to make easy the life of property managers and property owners. The property
    management system is a handy application to simplify operations in rental properties from tenant finding, lease
    contract management, billing and collection management, and concerns and maintenance requests for landlords,
    dormitories, apartment rentals, and other rentals.')


    <style>
        body {
            background-color: #4F3F6D;
        }
    </style>
    <!-- component -->
    <section class="mt-0 sm:mt-0 lg:-mt-4 bg-white dark:bg-gray-900">
        <div class="container px-6 py-10 mx-auto">
            <h1 class="text-3xl font-semibold text-gray-800 capitalize lg:text-4xl dark:text-white"> {{ucfirst(Route::current()->getName())}}</h1>

            <div class="mx-10 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
                <span class="block">{{ $articles->links() }}</span>


                <!-- <a href="#" class="flex items-center px-4 py-2 mx-1 text-gray-500 bg-white rounded-md cursor-not-allowed dark:bg-gray-800 dark:text-gray-600">
        previous
    </a> -->

                {{-- <a href="blog-1"
                    class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
                    1
                </a>

                <a href="blog-2"
                    class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
                    2
                </a>

                <a href="blog-3"
                    class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
                    3
                </a>

                <!-- <a href="blog-4" class="items-center hidden px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md sm:flex dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
        4
    </a> -->

                <a href="blog-2"
                    class="flex items-center px-4 py-2 mx-1 text-gray-700 transition-colors duration-300 transform bg-white rounded-md dark:bg-gray-800 dark:text-gray-200 hover:bg-yellow-500 dark:hover:bg-yellow-500 hover:text-white dark:hover:text-gray-200">
                    Next
                </a> --}}

            </div>
            <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
                @foreach ($articles as $article)
                <div class="lg:flex">
                    <img class="object-cover w-full h-56 rounded-lg lg:w-64"
                        src="{{ asset('/brands/articles/'.$article->image) }}" alt="{{ $article->title }}">

                    <div class="flex flex-col justify-between py-6 lg:mx-6">
                        <a href="/article/{{ $article->id }}" class="mt-2 block">
                            <p class="text-base font-semibold text-gray-900">{{ $article->title }}</p>
                            <p class="mt-3 text-sm text-gray-500">
                                {{ Str::limit($article->article) }}
                        </a>
                        <span class="text-sm text-gray-500 dark:text-gray-300">{{ Carbon\Carbon::parse($article->create_at)->format('M d, Y') }}</span>
                    </div>
                </div>
                @endforeach


            </div>

            <div class="mx-10 mt-5 flex justify-end items-center space-y-2 text-xs sm:space-y-0 sm:space-x-3 ">
               {{ $articles->links() }}
            </div>

        </div>
    </section>

</x-landing-page-template>
