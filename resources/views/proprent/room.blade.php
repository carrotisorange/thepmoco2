<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>PropRent</title>
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Quicksand';
    background-color: white;
}

#purple{
  background-color: #14544E;
}
</style>
  <html>
  <body>

  <header class="fixed w-full top-0 z-50 bg-white">
    <nav id="nav" class="lg:sticky top-0 z-10 relative px-4 flex justify-between items-center">
        <a class="text-3xl font-bold leading-none" href="/login">
            <img class="ml-5 h-8" src="{{ asset('/brands/proprent/proprent-logo.png') }}" alt="proprent logo">
        </a>

        <a class="hidden lg:ml-auto lg:mr-3 py-2 px-8 bg-g-50 border border-yellow-500 text-sm font-bold text-yellow-500 hover:border-blue-500 hover:text-blue-500 transition duration-200"
            href="/login">Log In</a>


            <ul class="flex items-center">
            
            
            <li>
            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

              <div x-data="{ open: false }" class="flex justify-center items-center">
                  <div @click="open = !open" class="relative border-b-4 border-transparent py-3" :class="{' transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                    <div class="flex justify-center items-center space-x-2 cursor-pointer">
                      <div class="w-7 h-7 rounded-full overflow-hidden ">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-900">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                      
                        <div class="font-medium text-gray-800 text-sm">
                            <div class="cursor-pointer">FirstName</div>
                        </div>
                        <div class="px-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-900">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                        
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 dark:bg-gray-800 bg-white rounded-lg shadow border dark:border-transparent mt-5">
                      <ul class="space-y-3 dark:text-white">
                        <li class="font-medium">
                          <a href="#" class="text-sm text-gray-900 flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                            <div class="mr-3">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            Account
                          </a>
                        </li>
                        <li class="font-medium">
                          <a href="#" class="text-sm text-gray-900 flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-indigo-700">
                            <div class="mr-3">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            Setting
                          </a>
                        </li>
                        <hr class="dark:border-gray-700">
                        <li class="font-medium">
                          <a href="#" class="text-sm text-gray-900 flex items-center transform transition-colors duration-200 border-r-4 border-transparent hover:border-red-600">
                            <div class="mr-3 text-red-600">
                              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            </div>
                            Logout
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
              </div>

            </li>
          </ul>
        </nav>
    </header>

    <!-- Static sidebar for desktop -->
    <div class="py-10 md:fixed md:inset-y-0 right-0 md:flex md:w-96 md:flex-col ">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="ml-5 lg:-ml-10 mx-6 flex flex-grow flex-col overflow-y-auto bg-white pt-5">
            <div class="py-20 mt-5 flex flex-1 flex-col">
    
                <div class="py-8 px-7 mx-auto border border-gray-400 rounded-md">
      
                    
                    <div>
                            <p class="py-6 font-bold text-md text-2xl"><span>₱</span> 1000 <span class="text-base font-light">Unit Price</span></p>
                            
                        </div>
                 
            
                    <p class="py-1 font-light text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae mattis massa, in convallis ligula. Aliquam erat volutpat.</p>
    
                    <div class="w-full mt-6">
                    <!-- change to message button once reserved -->
                    <a href="/proprent/reservation"><button class="w-full text-white bg-yellow-300 p-2 rounded-lg text-sm">Reserve</button></a>
                    </div>

                    <p class="py-2 text-center font-medium text-sm">You won't be charged yet.</p>
                </div>
            
            </div>
        </div>
    </div>
     


    











        


    </div>
  </div>
  

    <main>
      

<div class="bg-white md:pr-96">
  <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
  <div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
   

    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 xl:gap-x-8">


    <div class="cols-span-4 group">
        <div class="aspect-w-1  w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 ">


 <!-- Image gallery -->
 <div class="h-96 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
          <h2 class="sr-only">Images</h2>

          <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>

          <!-- Swiper JS -->
          <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
          <script>
            var swiper = new Swiper('.mySwiper', {
                            navigation: {
                              nextEl: '.swiper-button-next',
                              prevEl: '.swiper-button-prev',
                            },
                          });
          </script>
        </div>

                        </div>
      <div class="mt-10">
      <h2 class="text-xl font-bold">Name of Place/Unit</h2>  
      <p class="font-light text-sm py-2"> <span><span class="font-medium">6</span> bedrooms</span> <span><span class="font-medium">6</span> beds</span> <span><span class="font-medium">6</span> baths</span> </p>

      <div class="mt-6 border border-t border-gray-200"></div>
      <!-- description -->
      <div class="font-light text-base py-4">
      Come and stay in this beautifully designed beach-front villa in a peaceful beach setting in one of the most iconic residential beach areas in all of DA NANG CITY. Whether you’re in town for a business trip, a family vacation, or a weekend getaway with good friends, this is a perfect spot for your group. 
      </div>

      <div class="mt-6 border border-t border-gray-200"></div>
      
      <h2 class="text-lg font-bold pt-4 pb-7">Room Details</h2> 
      <div class="grid grid-cols-2">
        

          <!-- amenities -->
          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/exterior.png" alt="exterior"/>
          <span class="font-light text-sm">Apartment</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/bed.png" alt="bed"/>
          <span class="font-light text-sm">2 Bedrooms</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/calendar--v1.png" alt="calendar--v1"/>
          <span class="font-light text-sm">0 months minimum stay</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/tv.png" alt="tv"/>
          <span class="font-light text-sm">Furnished</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/wi-fi-good.png" alt="wi-fi-good"/>
          <span class="font-light text-sm">Wifi</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/shower-and-tub.png" alt="shower-and-tub"/>
          <span class="font-light text-sm">1 Bathroom</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/parking.png" alt="parking"/>
          <span class="font-light text-sm">Parking</span>
          </h1>
        </div>

        <button class="border border-gray-200 p-3">Show more Amenities</button>
      </div>

      <div class="mt-6 border border-t border-gray-200"></div>

      <h2 class="text-lg font-bold pt-4 pb-7">No reviews yet</h2> 

      <div class="mt-6 border border-t border-gray-200"></div>

      <h2 class="text-lg font-bold pt-4 pb-7">Where you'll be</h2> 
      <div class="">
        <img class="w-full" src="https://snazzy-maps-cdn.azureedge.net/assets/232526-sample-map-style.png?v=20180925120645" alt="shower-and-tub"/> 
      </div>
    </div>

     

        
      

      <!-- More products... -->
    </div>
  </div>
</div>
  </div>
</div>

    </main>

   

  </div>

  
</div>

</body>



</html>