<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>The PMO — Home</title>
</head>

<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<style>
body {
    font-family: 'Poppins';
}
</style>

  <html>
  <body>

  <style>
body, #nav {
  background-color: #4A386C;
}
</style>
 
    <!-- component -->
<body>
	<nav id="nav" class="lg:sticky top-0 z-10 relative px-4 py-6 flex justify-between items-center">
		<a class="text-3xl font-bold leading-none" href="landingpage">
    <img class="h-10" src="{{ asset('/brands/landing/pmo-logo.png') }}" alt="pmo logo">
		</a>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-white p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
			<li><a class="text-md text-white font-semibold" href="landingpage">Home</a></li>
			
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="about">About Us</a></li>
			
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="faq">FAQs</a></li>
			
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="blog">Articles</a></li>
		
		</ul>
		<a id="button1"class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-white hover:bg-gray-300  rounded-xl transition duration-200" href="newsignup">Sign Up</a>
		<a class="hidden lg:inline-block py-2 px-6  text-sm text-white hover:bg-gray-400 rounded-2xl transition duration-200" href="newsignin">Sign In</a>
	</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
        <img class="h-10" src="{{ asset('/brands/favicon.ico') }}" alt="pmo logo">
				</a>
				<button class="navbar-close">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="landingpage">Home</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="about">About Us</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="faq">FAQs</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="blog">Article</a>
					</li>
					
				</ul>
			</div>
			<div class="mt-auto">
				<div class="pt-6">
					<a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="newsignin">Sign in</a>
					<a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-purple-600 hover:bg-purple-700  rounded-xl" href="newsignup">Sign Up</a>
				</div>
				<p class="my-4 text-xs text-center text-gray-400">
					<span>Copyright © 2022</span>
				</p>
			</div>
		</nav>
	</div>
</body>

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
      

  <main>

   <!-- Social Sharing Bar -->
   <div class="fixed right-0 bottom-10 z-50 px-5 py-3 bg-transparent flex flex-col space-y-3">
        <!-- Facebook -->
        <a href="https://www.facebook.com/onlinepropertymanager" title="Share on Facebook">
        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-106.468,0l0,-192.915l66.6,0l12.672,-82.621l-79.272,0l0,-53.617c0,-22.603 11.073,-44.636 46.58,-44.636l36.042,0l0,-70.34c0,0 -32.71,-5.582 -63.982,-5.582c-65.288,0 -107.96,39.569 -107.96,111.204l0,62.971l-72.573,0l0,82.621l72.573,0l0,192.915l-191.104,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Z"/></svg>
        </a>

        <!-- LinkedIn -->
        <a href="https://www.linkedin.com/company/the-pmo-co/" title="Share on LinkedIn">
        <?xml version="1.0" ?><!DOCTYPE svg  PUBLIC '-//W3C//DTD SVG 1.1//EN'  'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'><svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="30" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M449.446,0c34.525,0 62.554,28.03 62.554,62.554l0,386.892c0,34.524 -28.03,62.554 -62.554,62.554l-386.892,0c-34.524,0 -62.554,-28.03 -62.554,-62.554l0,-386.892c0,-34.524 28.029,-62.554 62.554,-62.554l386.892,0Zm-288.985,423.278l0,-225.717l-75.04,0l0,225.717l75.04,0Zm270.539,0l0,-129.439c0,-69.333 -37.018,-101.586 -86.381,-101.586c-39.804,0 -57.634,21.891 -67.617,37.266l0,-31.958l-75.021,0c0.995,21.181 0,225.717 0,225.717l75.02,0l0,-126.056c0,-6.748 0.486,-13.492 2.474,-18.315c5.414,-13.475 17.767,-27.434 38.494,-27.434c27.135,0 38.007,20.707 38.007,51.037l0,120.768l75.024,0Zm-307.552,-334.556c-25.674,0 -42.448,16.879 -42.448,39.002c0,21.658 16.264,39.002 41.455,39.002l0.484,0c26.165,0 42.452,-17.344 42.452,-39.002c-0.485,-22.092 -16.241,-38.954 -41.943,-39.002Z"/></svg>
        </a>
    </div>

  <div class="sm:block lg:flex md:flex  min-h-screen">
    <style>
body {
  background-color: #4A386C;
}

#seamless {
  color: #fb923c;
}
</style>
  <div class="flex-col items-center justify-center sm:ml-3 lg:ml-5 px-4 sm:px-4 md:px-8 lg:px-20 xl:px-48 ">
    <div class="w-full">
      
    <div class="text-gray-300 text-4xl font-bold py-24 sm:text-5xl lg:text-6xl">
      <span class="typing" id="seamless"></span>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
<script>
    var typed = new Typed(".typing", {
        strings: ["Seamless", "Simplified", "Easy to  Use"],
        typeSpeed: 1,
        backSpeed: 1,
        loop: true
    });
    </script>
       <h2>System For Rental Property Operations</h2>
</div>
  </div>
  </div>
      
   
  <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:px-16 sm-px-0 ">
  <div class="lg:block lg:py-20 md:max-w-lg xl:max-w-3xl sm:ml-12 sm:py-2 lg:-ml-5 mx-5">
  <p class="text-lg font-light mt-10 text-indigo-200">The Property Manager Online provides a full-suite solution that allows rental business owners to run their operations smoothly and harmoniously with their tenants.</p>
 

            <div class="mt-10 flex justify-end space-x-5">
            <style>
#button1 {
  background-color: #f97316;
  border-radius: 30px;
  transition-duration: 0.1s;
}

#button1:hover {
  background-color:#fdba74;
}
</style>
              <button id= "button1"> <a href="newsignup" class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Free Trial</a></button>
              <button> <a href="demopage" class="w-48 flex justify-center py-3 px-4 border border-gray-400 rounded-full shadow-sm text-sm font-medium text-white hover:bg-purple-300  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View Demo</a></button>            
            </div>

</div>
  </div>
</div>
    
</div>
</div>
</div>
    

<!-- carousel -->

<div id="gradient" class="pt-36  min-h-screen">
  <style>
#gradient {
  background-image: linear-gradient(to right, rgba(74,56,108,0), rgba(102,102,102));
}
</style>
<link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <div class="flex justify-center items-center ">
      <div class="max-w-sm md:max-w-md lg:max-w-3xl">
 <div class="min-h-screen">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
        <h1 class="p-5 text-white text-lg text-center font-semibold">Manage multiple properties in one seamless and unified system</h1>
          <img
            class="h-full w-full"
            src="{{ asset('/brands/landing/dashboard_img.png') }}"
            alt="dashboard page"
          />
        </div>
        <div class="swiper-slide">
        <h1 class="p-5 text-white text-lg text-center font-semibold">A property dashboard for property performance metrics at a glance</h1>
          <img
            class="h-full w-full"
            src="{{ asset('/brands/landing/portfolio_img.png') }}"
            alt="portfolio page"
          />
        </div>
        <div class="swiper-slide">
        <h1 class="p-5 text-white text-lg text-center font-semibold">Easily collaborate with a centralized database for the management team</h1>
          <img
            class="h-full w-full"
            src="{{ asset('/brands/landing/employee_img.png') }}"
            alt="personnel page"
          />
          
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
  </div>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      var swiper = new Swiper('.mySwiper', {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    </script>

</div>
    </div>


    

    <!-- Gradient Feature Section -->
    <div class="bg-white">
      <div class="mx-auto max-w-4xl px-4 py-16 sm:px-6 sm:pt-20 sm:pb-24 lg:max-w-7xl lg:px-8 lg:pt-24">
      
        <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-3 lg:gap-x-16 lg:gap-y-16">
          <div>
            
          <div class="flex items-center justify-center">
              <span class="-ml-32 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">

              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
</svg>


              </span>
              <h3 class="ml-5 flex text-lg font-medium text-gray-600">Tenant Portal</h3>
              
          </div>
          <div class="flex justify-center items-center">
          <div class="max-w-xs">
<div class="text-xs mt-6">
              <p class=" mt-2">View bills and payment history, upload proof of payments of rent,
              request for contract renewal or moveout, send concerns or issues to management.
              </p>
              
            </div>
  </div>
  </div>
          </div>
          <div>


          <div class="flex items-center justify-center">
              <span class="-ml-16 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">

                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
</svg>

              </span>
              <h3 class="ml-5 flex text-lg font-medium text-gray-600">Billing and Collection</h3>
            </div>

           
            <div class="flex justify-center items-center ">
          <div class="text-xs mt-6">
              <p class="mt-2">Create bills and send directly to email or tenant portal</p> 
             
            
            </div>
  </div>
          </div>

          <div>
            <div class="flex items-center justify-center">
            <span class="-ml-2  flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
</svg>


</span>
<h3 class="ml-5 flex text-center text-lg font-medium text-gray-600">Property Expenses Tracking
</h3>
</div>

<div class="flex justify-center items-center">
<div class="max-w-xs">
<div class="text-xs mt-6">
<p class="mt-2">Request approval and payment for property expense that automatically gets recorded in cashflow reports</p>
  </div>
  </div>
            </div>
          </div>

          <div>
          <div class="flex items-center justify-center">
          <span class="-ml-2 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
              </span>
<h3 class="ml-5 flex text-center text-lg font-medium text-gray-600">System Generated Reports</h3>
</div>

<div class="flex justify-center items-center">
<div class="max-w-xs">
<div class="text-xs mt-6">
<p class="mt-2">Generate and export in system reports on cashflow from operations and property performance</p>
            </div>
  </div>
  </div>
          </div>

          <div>
          <div class="flex items-center justify-center">
          <span class="-ml-20 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
</svg>


</span>
<h3 class="ml-5 flex text-center text-lg font-medium text-gray-600">Portfolio Dashboard
</h3>
</div>

<div class="flex justify-center items-center">
<div class="max-w-xs">
<div class="text-xs mt-6">
<p class="mt-2">For multiple properties managed under a portfolio, compare property metrics side by side like occupancy rate, collection efficiency, number of concerns received, etc.</p>
            </div>
          </div>
  </div>
  </div>

          <div>
          <div class="flex items-center justify-center">
          <span class="-ml-10 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">

          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
</svg>


</span>
<h3 class="ml-5 flex text-center text-lg font-medium text-gray-600">Unit Management Portal
</h3>
</div>

<div class="flex justify-center items-center">
<div class="max-w-xs">
<div class="text-xs mt-6">
<p class="mt-2">View individual unit performance, specifications, tenants, and other financial metrics.</p>
            </div>
          </div>
            </div>
          </div>

          <div>
            
            
          </div>

          <div>
            
            
          </div>
        </div>
      </div>
    </div>

    
<!-- Blog section -->

<div class="relative py-16 sm:py-24 lg:py-32" id="guide">
<style>
#guide {
    background-color: #a08cc6;
}
</style>
        <div class="relative">
          <div class="flex justify-center items-center">
         <h2 class="font-bold text-white text-3xl">Quick Start Guide</h2>
         
</div>
          <div class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-5 lg:px-8">
            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
                
</div>
              </div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
</svg>

                  <p class="mt-3">
                    <p class="text-xs text-gray-900">Step 1:</p>
                  </p>
                  <a class="mt-2 block">
                    
                    <p class="text-lg font-semibold text-purple-900">Register your property</p>
                    <p class="mt-3 text-sm text-gray-500">Register your dorm, apartments, commercial spaces, residential units, condominums.</p>
                  </a>
                </div>

</div>
</div>

                

            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
                
</div>
              </div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
</svg>

                  <p class="mt-3">
                    <p class="text-xs text-gray-900">Step 2:</p>
                  </p>
                  <a class="mt-2 block">
                    <p class="text-lg font-semibold text-purple-900">Add the units, rooms, or bed spaces</p>
                    <p class="mt-3 text-sm text-gray-500">Set up the monthly rent, deposit requirements, room features, and more.</p>
                  </a>
                </div>
</div>
</div>
                
            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
               
</div>
              </div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
</svg>

                  <p class="mt-3">
                    <p class="text-xs text-gray-900">Step 3:</p>
                  </p>
                  <a class="mt-2 block">
                    <p class="text-lg font-semibold text-purple-900">Add your tenants</p>
                    <p class="mt-3 text-sm text-gray-500">Input your tenants' names, contact details, contract period, and other necessary info.</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
              
              </div>
</div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
</svg>

                  <p class="mt-3">
                    <p class="text-xs text-gray-900">Step 4:</p>
                  </p>
                  <a class="mt-2 block">
                    <p class="text-lg font-semibold text-purple-900">Manage your tenants</p>
                    <p class="mt-3 text-sm text-gray-500">Here you can address their concerns and requests, create job orders, assign jobs, and monitor up to completion</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
             
              </div>
</div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
</svg>

                  <p class="mt-3">
                    <p class="text-xs text-gray-900">Step 5:</p>
                  </p>
                  <a class="mt-2 block">
                    <p class="text-lg font-semibold text-purple-900">Bill your tenants, collect rent & utilities</p>
                    <p class="mt-3 text-sm text-gray-500">Automate billing for recurring charges. Set your billing date, and recurring bill amount, and tenants will be notified on the bill date.</p>
                  </a>
                </div>
              </div>
            </div>

            
          </div>
        </div>

        
      </div>
     
     <!-- TESTIMONIAL -->

     <section class="overflow-hidden bg-gray-50 py-12 md:py-20 lg:py-24">
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-northcambridge">
      <title id="svg-northcambridge">North Cambridge</title>
      <defs>
        <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
    </svg>

    <div class="relative">
      <img class="mx-auto h-8"  src="{{ asset('/brands/clients/client-2.png') }}" alt="North Cambridge">
      <blockquote class="mt-10">
        <div class="mx-auto max-w-3xl text-center text-xl font-medium leading-9 text-gray-900">
          <p>&ldquo;It makes my life less stressful because the application provides an easy way for tenants to report concerns, and as I resolve the concern, it provides an option for them to monitor its status in real-time.&rdquo;</p>
        </div>
        <footer class="mt-8">
          <div class="md:flex md:items-center md:justify-center">
            <div class="md:flex-shrink-0">
              <img class="mx-auto h-10 w-10 rounded-full" src="{{ asset('/brands/user.png') }}" alt="">
            </div>
            <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
              <div class="text-base font-medium text-gray-900">Kate</div>

              <svg class="mx-1 hidden h-5 w-5 text-indigo-400 md:block" fill="currentColor" viewBox="0 0 20 20">
                <path d="M11 0h3L9 20H6l5-20z" />
              </svg>

              <div class="text-base font-medium text-gray-500">Admin, North Cambridge</div>
            </div>
          </div>
        </footer>
      </blockquote>
    </div>
  </div>
</section>


    <!-- CONTACT US SECTION -->

<div>
  <div class="">
    <div class="relative bg-white shadow-xl">
      <h2 class="sr-only">Contact us</h2>

      <div class="grid grid-cols-1 lg:grid-cols-3">
        <!-- Contact information -->
        <div class="px-5 relative overflow-hidden bg-gray-700 py-10 sm:px-10 xl:p-12">
          <div class="pointer-events-none absolute inset-0 sm:hidden" aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="343" height="388" viewBox="0 0 343 388" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z" fill="url(#linear1)" fill-opacity=".1" />
              <defs>
                <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 sm:block lg:hidden" aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="359" height="339" viewBox="0 0 359 339" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z" fill="url(#linear2)" fill-opacity=".1" />
              <defs>
                <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 lg:block" aria-hidden="true">
            <svg class="absolute inset-0 h-full w-full" width="160" height="678" viewBox="0 0 160 678" fill="none" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
              <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z" fill="url(#linear3)" fill-opacity=".1" />
              <defs>
                <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66" gradientUnits="userSpaceOnUse">
                  <stop stop-color="#fff"></stop>
                  <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                </linearGradient>
              </defs>
            </svg>
          </div>
          <h3 class="text-3xl font-medium text-white">Contact Us</h3>
          <h3 class="mt-2 text-xl font-medium text-white">The PMO Co.</h3>
          <p class="mt-6 max-w-3xl text-sm text-purple-200">Makati Address: <p class="text-base mt-2 text-white">Asian Institute of Management - Dado Banatao Incubator Benavidez Street, corner Trasierra, Legazpi Village, Makati, 1229 Metro Manila</p></p>
          <p class="mt-6 max-w-3xl text-sm text-purple-200">Baguio Address: <p class="text-base mt-2 text-white">39 Engineers Hill, Baguio City</p></p>
          <dl class="mt-8 space-y-6">
            <dt><span class="sr-only">Phone number</span></dt>
            <dd class="flex text-base text-indigo-50">
              <!-- Heroicon name: outline/phone -->
              <svg class="h-6 w-6 flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
              <p class="ml-3">(+63) 916 779 9750</span>
            </dd>
            <dt><span class="sr-only">Email</span></dt>
            <dd class="flex text-base text-indigo-50">
              <!-- Heroicon name: outline/envelope -->
              <svg class="h-6 w- flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
              <p class="ml-3">sales@thepmo.co</span>
            </dd>
          </dl>
          <ul role="list" class="mt-8 flex space-x-12">
            <li>
              <a href="https://www.facebook.com/onlinepropertymanager">
                <dt><span class="sr-only">Facebook</span></dt>
                <dd class="flex text-base text-indigo-50">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-indigo-200 h-6 w-6" aria-hidden="true">
                  <path d="M22.258 1H2.242C1.556 1 1 1.556 1 2.242v20.016c0 .686.556 1.242 1.242 1.242h10.776v-8.713h-2.932V11.39h2.932V8.887c0-2.906 1.775-4.489 4.367-4.489 1.242 0 2.31.093 2.62.134v3.037l-1.797.001c-1.41 0-1.683.67-1.683 1.653v2.168h3.362l-.438 3.396h-2.924V23.5h5.733c.686 0 1.242-.556 1.242-1.242V2.242C23.5 1.556 22.944 1 22.258 1" fill="currentColor" />
                </svg>
                <p class="ml-3">facebook.com/onlinepropertymanager</span>
                </dd>
          </dl>
              </a>
            </li>
            <li>
            
            </li>
          </ul>
        </div>

        

        <!-- Contact form -->
        <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">
          
          <form action="#" method="POST" class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
            <div>
              <label for="first-name" class="block text-sm font-medium text-gray-900">First name</label>
              <div class="mt-1">
                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>
              <label for="last-name" class="block text-sm font-medium text-gray-900">Last name</label>
              <div class="mt-1">
                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>
              <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
              <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>
              
            <div class="flex justify-between">
                <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
              </div>
              <div class="mt-1">
                <textarea id="message" name="message" rows="1" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" aria-describedby="message-max"></textarea>
              </div>
            </div>

          

            <div class="sm:col-span-2">
             
            <label for="country" class="block text-sm font-medium text-gray-700"> Property Type: </label>
            <div class="mt-5">
            
                
            <ul><input type="checkbox"> Condominium Association</ul>
            <ul><input type="checkbox"> Condominium Units</ul>
            <ul><input type="checkbox"> Student Accomodation</ul>
            <ul><input type="checkbox"> HOA</ul>
            <ul><input type="checkbox"> Dormitory</ul>
            <ul><input type="checkbox"> Commercial</ul>
            <ul><input type="checkbox"> Self storage</ul>
            <ul><input type="checkbox"> Senior Living</ul>
            <ul><input type="checkbox"> Residential Apartments</ul>
            <ul><input type="checkbox"> Bed and breakfast</ul>
            <ul><input type="checkbox"> Transient</ul>
           
            
          
        </div>
        </div>

            


            <div class="sm:col-span-2 sm:flex sm:justify-end">
              <button type="submit" class="mt-2 inline-flex w-full items-center justify-center rounded-full border border-transparent bg-purple-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="bg-gray-100">
      <div class="mx-auto max-w-7xl py-16 px-4 sm:px-6 lg:px-8">
        <p class="text-center text-xl font-semibold text-gray-500">Partnered with:</p>
        <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-4">
          <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
            <a href=""><img class="h-20" src="{{ asset('/brands/landing/digital-ocean.png') }}" alt="digital ocean"></a>
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
          <img class="h-20" src="{{ asset('/brands/landing/aim-logo.png') }}" alt="aim loogo">
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
          <img class="h-20" src="{{ asset('/brands/clients/client-3.png') }}" alt="Tuple">
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
          <img class="h-20" src="{{ asset('/brands/clients/client-4.png') }}" alt="Tuple">
          </div>
          


        </div>
      </div>
    </div>
  </main>

  <footer class="bg-gray-50" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="content-center mx-auto max-w-xl px-4 pt-16 pb-8 sm:px-6 lg:px-8 lg:pt-24">
      <div class="xl:grid xl:grid-cols-1 xl:gap-8">
        <div class="grid grid-cols-3 gap-8 xl:col-span-2">
          
          <div class="md:grid md:grid-cols-1 md:gap-8">
            <div>
              
              <ul role="list" class="mt-4 space-y-4">
                

                <li>
                  <a href="demopage" class="text-base text-gray-500 hover:text-gray-900">Demo</a>
                </li>

                <li>
                  <a href="blog" class="text-base text-gray-500 hover:text-gray-900">Articles</a>
                </li>

                
              </ul>
            </div>
            </div>

            <div class="md:grid md:grid-cols-1 md:gap-8">
              
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="about" class="text-base text-gray-500 hover:text-gray-900">About Us</a>
                </li>

                <li>
                  <a href="faq" class="text-base text-gray-500 hover:text-gray-900">FAQs</a>
                </li>

               

                
              </ul>
            </div>
          
          <div class="md:grid md:grid-cols-1 md:gap-8">
            <div>
              
              <ul role="list" class="mt-4 space-y-4">
              <li>
                  <a href="terms" class="text-base text-gray-500 hover:text-gray-900">Terms & Conditions</a>
                </li>
                

                <li>
                  <a href="privacy" class="text-base text-gray-500 hover:text-gray-900">Privacy Policy</a>
                </li>

                

               

              
              </ul>
            </div>
            
          </div>
        </div>
        
      </div>

      <div class="mt-12 border-t border-gray-200 pt-8 flex items-center justify-center lg:mt-16">
       
        <p class="mt-8 text-base text-gray-400 md:order-1 md:mt-0">&copy; 2022 The PMO Co. All rights reserved.</p>
      </div>
    </div>
  </footer>
</div>


</body>



</html>