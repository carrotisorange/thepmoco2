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

  <header id="" class="fixed w-full top-0 z-50">
    <nav id="nav" class="lg:sticky top-0 z-10 relative px-4 py-5 flex justify-between items-center">
        <a class="text-3xl font-bold leading-none" href="/login">
            <img class="ml-5 h-12" src="{{ asset('/brands/proprent.png') }}" alt="proprent logo">
        </a>



        <!-- desktop nav -->
        <!-- <ul
            class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-10">
            <li><a class="text-base font-bold text-purple-900 hover:text-yellow-200" href="/dashboard">Home</a></li>
            <li><a class="text-base font-bold text-purple-900 hover:text-yellow-200" href="/lot">About</a></li>
            <li><a class="text-base font-bold text-purple-900 hover:text-yellow-200" href="/design">Support</a></li>
        </ul> -->



        <a class="hidden lg:ml-auto lg:mr-3 py-2 px-8 bg-g-50 border border-yellow-500 text-sm font-bold text-yellow-500 hover:border-blue-500 hover:text-blue-500 transition duration-200"
            href="/login">Log In</a>


        <ul class="hidden space-x-2 lg:inline-flex items-center">

            <li class="rounded-2xl py-1">
                <a href="/register" class="text-purple-900 text-base font-bold flex items-center px-2 hover:text-yellow-300">
                    Sign In
                </a>
            </li>

            <li id="yellow" class="rounded-2xl py-1">
                <a href="/register" class="font-bold text-sm flex items-center px-2 hover:text-gray-900">
                    Sign Up
                </a>
            </li>
        </ul>

        <!-- burger menu -->
        <div class="lg:hidden">
            <button class="navbar-burger flex items-center text-yellow-500 p-3">
                <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <title>Mobile menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </button>
        </div>
    </nav>


    <!-- mobile nav -->
    <div class="navbar-menu relative z-50 hidden">
        <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>

        <nav
            class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
            <div class="flex items-center mb-8">
                <a class="mr-auto text-3xl font-bold leading-none" href="/login">
                    <img class="h-20" src="{{ asset('/images/homefie-logo.png') }}" alt="homefie logo">
                </a>
                <!-- x button -->
                <button class="navbar-close">
                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <div>
                <ul>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-500"
                            href="/">Home</a>
                    </li>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-500"
                            href="">About</a>
                    </li>
                    <li class="mb-1" tabindex="0">
                        <a class="block p-4 text-sm font-medium text-gray-600 hover:bg-blue-100 hover:text-blue-500"
                            href="">Support</a>
                    </li>
            
                </ul>
            </div>

            <div class="mt-auto">
                <div class="pt-6">

                    <a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-yellow-500 hover:bg-yellow-400 "
                        href="/logout">Sign Out</a>
                </div>
                <p class="my-4 text-xs text-center text-gray-400">
                    <span>Copyright © 2023</span>
                </p>
            </div>
        </nav>
    </div>
</header>

<!-- script for mobile view -->
<script>
    // Burger menus
            document.addEventListener('DOMContentLoaded', function() {

                // open
                const burger = document.querySelectorAll('.navbar-burger');
                const menu = document.querySelectorAll('.navbar-menu');
                if (burger.length && menu.length) {
                    for (var i = 0; i < burger.length; i++) {
                        burger[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }


                // close
                const close = document.querySelectorAll('.navbar-close');
                const backdrop = document.querySelectorAll('.navbar-backdrop');
                if (close.length) {
                    for (var i = 0; i < close.length; i++) {
                        close[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }
                if (backdrop.length) {
                    for (var i = 0; i < backdrop.length; i++) {
                        backdrop[i].addEventListener('click', function() {
                            for (var j = 0; j < menu.length; j++) {
                                menu[j].classList.toggle('hidden');
                            }
                        });
                    }
                }
            });
</script>




  <!-- Static sidebar for desktop -->
  <div class="hidden md:fixed md:inset-y-0 md:flex md:w-96 md:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-grow flex-col overflow-y-auto bg-white pt-5">
      
      <div class="py-20 ml-5 mt-5 flex flex-1 flex-col">
        
      <div class="py-8 px-8 border border-gray-400 rounded-md">
        
        <h1 class="font-light text-sm">Room Details </h1>
        <div class="grid grid-cols-2">
          <div class="cols-start-1">
        <h3 class="mt-4 text-xl font-bold text-gray-900">Unit Room 1</h3>
</div>
        
</div>
        <p class="mt-4 text-xs  text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non purus vitae massa sollicitudin ultrices. Aenean mollis tincidunt leo. Nunc auctor magna ut convallis gravida. Cras porttitor orci arcu, eu facilisis lacus facilisis vel. Aenean pulvinar urna vel est tempor, vel tristique sem sagittis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec fringilla tellus ligula, et ullamcorper eros ultricies nec. </p>

        <div class="px-5 grid grid-cols-2">
        
        <div>
      <p class="mt-6 font-bold text-md text-2xl"><span>₱</span> 1000</p>
      <p class="text-sm font-light">Total Price bills included</p>
        </div>

        <div>
        <div class="mt-6 flex justify-center items-center">

<button class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">Reserve <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>

    <!-- Dropdown menu -->
    <div class="hidden bg-white text-base w-56 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
        <div class="px-4 py-3">
        <span class="font-bold block text-lg">Contact:</span>
        <span class="block text-base font-medium text-gray-900 truncate">John Doe</span>
        <span class="block text-base font-medium text-gray-900 truncate">09123456789</span>
        </div>
        
    </div>


</div>
        </div>
</div>
        

<script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
</div>
</div>


</div>

      
      </div>
    </div>
  </div>
  

    <main>
      

<div class="bg-white md:pl-96">
  <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
  <div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
   

    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 xl:gap-x-8">


    <div class="cols-span-4 group">
        <div class="aspect-w-1  w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 ">


        <!-- component -->
<script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

<article x-data="slider" class="relative w-full flex flex-shrink-0 overflow-hidden shadow-2xl">
    <div class="rounded-full bg-gray-600 text-white absolute top-5 right-5 text-sm px-2 text-center z-10">
        <span x-text="currentIndex"></span>/
        <span x-text="images.length"></span>
    </div>

    <template x-for="(image, index) in images">
        <figure class="h-96" x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <img :src="image" alt="Image" class="absolute inset-0 z-10 h-full w-full object-cover opacity-70" />
        
        </figure>
    </template>

    <button @click="back()"
        class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
        <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
            </path>
        </svg>
    </button>

    <button @click="next()"
    class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
        <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
        xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</article>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('slider', () => ({
            currentIndex: 1,
            images: [
                'https://source.unsplash.com/1600x900/?beach',
                'https://source.unsplash.com/1600x900/?cat',
                'https://source.unsplash.com/1600x900/?dog',
                'https://source.unsplash.com/1600x900/?lego',
                'https://source.unsplash.com/1600x900/?textures&patterns'
            ],
            back() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            next() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                } else if (this.currentIndex <= this.images.length){
                    this.currentIndex = this.images.length - this.currentIndex + 1
                }
            },
        }))
    })
</script>
</div>

        <div class="mt-10">
      <h2 class="mb-10 text-lg font-bold">About this Unit </h2>  

      
      <div class="mt-5 grid grid-cols-2">

       <!-- amenities -->
<h1 class="mb-10 flex-1">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
</svg>


<span class="font-light text-sm">Apartment</span>
</h1>

<h1 class="mb-10 flex-1">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="inline-block w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125z" />
</svg>

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

      <h2 class="mt-5 mb-10 text-lg font-bold">Room Details </h2> 
      <p class="text-sm font-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non purus vitae massa sollicitudin ultrices. Aenean mollis tincidunt leo. Nunc auctor magna ut convallis gravida. Cras porttitor orci arcu, eu facilisis lacus facilisis vel. Aenean pulvinar urna vel est tempor, vel tristique sem sagittis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec fringilla tellus ligula, et ullamcorper eros ultricies nec</p>
      </div>
        
</div>

     
<div class="md:hidden lg:hidden py-10 ml-5 mt-5 flex flex-1 flex-col">
        
        <div class="py-8 px-8 border border-gray-400 rounded-md">
          
          <h1 class="font-light text-sm">Room Details </h1>
          <div class="grid grid-cols-2">
            <div class="cols-start-1">
          <h3 class="mt-4 text-xl font-bold text-gray-900">Unit Room 1</h3>
  </div>
          
  </div>
          <p class="mt-4 text-xs  text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non purus vitae massa sollicitudin ultrices. Aenean mollis tincidunt leo. Nunc auctor magna ut convallis gravida. Cras porttitor orci arcu, eu facilisis lacus facilisis vel. Aenean pulvinar urna vel est tempor, vel tristique sem sagittis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec fringilla tellus ligula, et ullamcorper eros ultricies nec. </p>
  
          <div class="px-5 grid grid-cols-2">
          
          <div>
        <p class="mt-6 font-bold text-md text-2xl"><span>₱</span> 1000</p>
        <p class="text-sm font-light">Total Price</p>
          </div>
  
          <div>
        <p class="bg-purple-100 rounded-lg w-32 text-center py-3 mt-6 text-xs">Bills Included</p>
  
          </div>
  </div>
  <div class="mt-6 flex justify-center items-center">
  <button class="bg-purple-600 text-sm py-2 px-20 rounded-3xl text-white">Reserve</button>
  </div>
  </div>
  
  
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