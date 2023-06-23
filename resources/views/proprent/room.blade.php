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
    <div class=" md:fixed md:inset-y-0 right-0 md:flex md:w-96 md:flex-col ">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="-ml-12 flex flex-grow flex-col overflow-y-auto bg-white pt-5">
            <div class="py-20 mt-5 flex flex-1 flex-col">
    
                <div class="py-8 px-10 mx-auto border border-gray-400 rounded-md">
                    <h1 class="font-light text-sm">Room Details </h1>
          
            
                    <div class="grid grid-cols-2">
                        <div class="cols-start-1">
                            <h3 class="mt-4 text-xl font-bold text-gray-900">Unit Room 1</h3>
                        </div>
                    </div>
            
                    <p class="mt-4 text-xs  text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non purus vitae massa sollicitudin ultrices. Aenean mollis tincidunt leo. Nunc auctor magna ut convallis gravida. Cras porttitor orci arcu, eu facilisis lacus facilisis vel.</p>
            
                    <div class="grid grid-cols-2">
                        <div>
                            <p class="mt-6 font-bold text-md text-2xl"><span>₱</span> 1000</p>
                        </div>
                    <div>
    
                    <div class="mt-6 flex justify-center items-center">
                        <button class="text-white bg-yellow-400 p-2 rounded-lg text-sm">Message Lessor</button>
                    </div>
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
 <div class="lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
          <h2 class="sr-only">Images</h2>

          <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img class="object-cover w-full " src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-full" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-full" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-full" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-full" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
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
      <h2 class="mb-10 text-lg font-bold">About this Unit </h2>  

      
      <div class="mt-5 grid grid-cols-2">

       <!-- amenities -->
<h1 class="mb-10 inline-flex">
<img width="26" height="26" src="https://img.icons8.com/metro/26/exterior.png" alt="exterior"/>
<span class="font-light text-sm">Apartment</span>
</h1>

<h1 class="mb-10 inline-flex">
<img width="26" height="26" src="https://img.icons8.com/metro/26/bedroom.png" alt="bedroom"/>
<span class="font-light text-sm">2 Bedrooms</span>
</h1>

<h1 class="mb-10 flex-1">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
</svg>


<span class="font-light text-sm">0 months minimum stay</span>
</h1>

<h1 class="mb-10 flex-1">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6 20.25h12m-7.5-3v3m3-3v3m-10.125-3h17.25c.621 0 1.125-.504 1.125-1.125V4.875c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125z" />
</svg>


<span class="font-light text-sm">Furnished</span>
</h1>

<h1 class="mb-10 flex-1">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 017.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 011.06 0z" />
</svg>


<span class="font-light text-sm">Wifi</span>
</h1>

<h1 class="mb-10 flex-1">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
</svg>


<span class="font-light text-sm">1 Bathroom</span>
</h1>

<h1 class="mb-10 flex-1">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
</svg>


<span class="font-light text-sm">Parking</span>
</h1>


</div>

      <h1>Amenities</h1>
      <h2 class="mt-5 mb-10 text-lg font-bold">Room Details </h2> 
      <p class="text-sm font-light">Location is near lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non purus vitae massa sollicitudin ultrices. Aenean mollis tincidunt leo. Nunc auctor magna ut convallis gravida. Cras porttitor orci arcu, eu facilisis lacus facilisis vel. Aenean pulvinar urna vel est tempor, vel tristique sem sagittis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec fringilla tellus ligula, et ullamcorper eros ultricies nec</p>
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