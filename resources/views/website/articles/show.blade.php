<x-article-page-template>
    @section('title', $article->title)
    @section('description', $article->title)

    @section('og-url','propsuite.net/How-Digital-Systems-Improve-Tenant-Retention-and-Satisfaction')
    @section('og-title','How Digital Systems Improve Tenant Retention and Satisfaction')
    @section('og-description','When you own a building, you want to make sure that it is running smoothly. You also want
    to
    keep your tenants happy and satisfied so that read more...')
    @section('og-image','https://images.pexels.com/photos/4473775/pexels-photo-4473775.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1')
    <!-- start article -->
   <div class="sm:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">


    <div class="col-span-1">
        <div class=" bg-gray-50 rounded-md p-2 hidden lg:block lg:visible ml-10 mt-10 max-w-xl">

            <div class="my-5">
                <a class="grid grid-cols-4 rounded-sm">

                    <!-- Icon -->
                    <div class="col-span-1 flex justify-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="text-center text-gray-700 w-7 h-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                        </svg>
                    </div>

                    <!-- Title -->
                    <div class="col-span-3">
                        <p class="ml-1  text-gray-700 text-lg font-bold">Read more articles:</p>
                    </div>


                </a>
            </div>

            <!-- Article 22 -->
            @foreach($articles as $article)
            <div class="my-5">
                <a href="/article/{{ $article->id }}" class="grid grid-cols-4 rounded-sm">

                    <!-- Icon -->
                    <div class="col-span-1">
                        <img src="{{ asset('/brands/landing/'.$article->image) }}" class="h-full w-full">
                    </div>

                    <!-- Title -->
                    <div class="col-span-3">
                        <p class="ml-1 underline text-gray-700 text-xs">{{$article->title}}
                    </div>


                </a>
            </div>
            @endforeach

        </div>
    </div>


    <div class="sm:col-span-1 md:col-span-2 lg:col-span-3">
        <div class="pb-10 mt-10 mb-4 md:mb-0 w-full max-w-screen-md mx-auto relative" style="height: 24em;">

            <img src="{{ asset('/brands/articles/'.$article->image) }}"
                alt="{{ $article->title }}"
                class="opacity-50 absolute left-0 top-0 w-full h-full z-0 object-cover" />
            <div class="p-4 pt-56 relative">
                <a href="#"
                    class="px-4 py-1 bg-black text-gray-200 inline-flex items-center justify-center mb-2">Article</a>
                <h2 class="text-4xl font-semibold text-gray-900 ">
                    {{ $article->title }}
                </h2>
                <div class="flex mt-3">

                    <div>
                        <p class="font-semibold text-gray-700 text-sm"></p>
                        <p class="font-semibold text-gray-600 text-xs"> {{ Carbon\Carbon::parse($article->created_at)->format('M d, Y')}} </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-20 px-4 lg:px-0 text-gray-700 max-w-screen-md mx-auto text-lg leading-relaxed">

            <p class="pb-6 mt-10">
               {{$article->article}}
            </p>

        </div>
    </div>
</x-article-page-template>
