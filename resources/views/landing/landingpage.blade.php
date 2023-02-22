<x-landing-page-template>

@section('title','The PMO — Home')
@section('description', 'A product to make easy the life of property managers and property owners. The property management system is a handy application to simplify operations in rental properties from tenant finding, lease contract management, billing and collection management, and concerns and maintenance requests for landlords, dormitories, apartment rentals, and other rentals.')


<!-- pop up modal -->
          <dh-component>         
            <div class="py-12 bg-transparent transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
                <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-4xl">
                    <div class="relative py-3 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                      
                      <div class="bg-white dark:bg-gray-800 px-3 md:px-4 py-12 flex flex-col justify-center items-center">
                        <div role="img" aria-label="Luxe. Logo.">
                          <img src="{{ asset('/brands/favicon.ico') }}">
                        </div>
                        <h1 class="mt-8 md:mt-12 text-3xl lg:text-4xl font-semibold leading-10 text-center text-gray-800 text-center md:w-9/12 lg:w-7/12 dark:text-white">Welcome to The Property Manager Online!</h1>
                        <p class="mt-10 text-lg leading-normal text-center text-gray-600 md:w-9/12 lg:w-7/12 dark:text-white"><span class="font-bold">Free trial</span> until full setup ready.</p>
                        <p class="mt-3 text-base leading-normal text-center text-gray-600 md:w-9/12 lg:w-7/12 dark:text-white"><span class="font-bold text-purple-700 text-lg">No credit card required,</span> no strings attached</p>
                        <div class="mt-12 md:mt-14 w-full flex justify-center">
                          <a href="https://thepmo.co/select-a-plan"><button class="dark:text-white dark:border-white w-full sm:w-auto border border-gray-800 text-base font-medium text-gray-800 py-5 px-14 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 hover:bg-purple-900 hover:text-white dark:hover:text-white dark:hover:bg-gray-700">Start my Free Trial</button></a>
                        </div>
                      </div>
                    
                      <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600" onclick="modalHandler()" aria-label="close modal" role="button">
                        <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" />
                          <line x1="18" y1="6" x2="6" y2="18" />
                          <line x1="6" y1="6" x2="18" y2="18" />
                        </svg>
                        
                      </button>
                    </div>
                  </div>
                </div>
                        
              <script>
            
                let modal = document.getElementById("modal");
                function modalHandler(val) {
                    if (val) {
                        fadeIn(modal);
                    } else {
                        fadeOut(modal);
                    }
                }
                function fadeOut(el) {
                    el.style.opacity = 1;
                    (function fade() {
                        if ((el.style.opacity -= 0.1) < 0) {
                            el.style.display = "none";
                        } else {
                            requestAnimationFrame(fade);
                        }
                    })();
                }
                function fadeIn(el, display) {
                    el.style.opacity = 0;
                    el.style.display = display || "flex";
                    (function fade() {
                        let val = parseFloat(el.style.opacity);
                        if (!((val += 0.2) > 1)) {
                            el.style.opacity = val;
                            requestAnimationFrame(fade);
                        }
                    })();
                }
              </script>
            
          </dh-component>
            
        <!-- end of pop up modal -->

 

<div class="sm:block lg:flex md:flex min-h-screen">

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
  <p class="text-lg font-light mt-10 text-white">With The Property Manager Online, you can easily streamline rental property operations smoothly and harmoniously with your tenants while saving time and money!</p>
 

            <div class="mt-10 flex justify-center items-center space-x-5">
              <button id= "button1"> <a href="https://thepmo.co/select-a-plan" class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white   focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Free Trial</a></button>
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
            width="1920"
            height="1080"
            src="{{ asset('/brands/landing/portfolio_img.webp') }}"
            alt="portfolio page showing 4 buildings"
          />
        </div>
        <div class="swiper-slide">
        <h1 class="p-5 text-white text-lg text-center font-semibold">A property dashboard for property performance metrics at a glance</h1>
          <img
            width="1920"
            height="1080"
            src="{{ asset('/brands/landing/dashboard_img.webp') }}"
            alt="a sample dashboard"
          />
        </div>
        <div class="swiper-slide">
        <h1 class="p-5 text-white text-lg text-center font-semibold">Easily collaborate with a centralized database for the management team</h1>
          <img
            width="1920"
            height="1080"
            src="{{ asset('/brands/landing/employee_img.webp') }}"
            alt="a sample personnel page"
          />
          
        </div>
      </div>
      
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

    
<style>
#proud {
  background-image: linear-gradient(to top, rgba(74,56,108,0), rgba(102,102,102));

}
</style>
    <div id ="proud" class="min-h-full lg:grid  lg:grid-cols-2 lg:gap-8 lg:px-8 bg-gray-500">
          
            
          <div class="mt-12 lg:col-start-1 lg:m-0 lg:pl-20">
            <div class="py-20 mx-auto px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0 lg:py-20">
              <blockquote>
                <div>
                  
                  <span class="text-2xl font-semibold text-indigo-100">We're proud to announce the release of our Property Management System.</span>  
                  
                </div>
                <footer class="mt-6">
                  
                  
                </footer>
              </blockquote>
            </div>
          </div>

          <div class="lg:mt-20 sm:mt-0  lg:col-start-2 sm:pl-5 ">
          <div class="flex justify-center items-center">
          <p class="pb-10 px-7 text-sm font-light text-white">
          The Property Management Online System is a product of The PMO Co, that allows property managers and property owners to manage all aspects of their properties in one place. Having a property management system is like having a personal assistant. It's there for you when you need it, and it helps you make better decisions.
          </p>
          </div>
        </div>
        </div>
      </div>
    

    <!--  Feature Section -->
    <style>

#features {
  background-image: url('/brands/landing/feature-bg.webp');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
    <div id="features">
      <div class="h-full mx-auto max-w-4xl px-4 py-16 sm:px-6 sm:pt-10 sm:pb-10 lg:max-w-7xl lg:px-8 lg:pt-10">
      
        <div class="gap-x-6 gap-y-12 sm:grid grid-cols-2 lg:mt-16 lg:grid-cols-3 lg:gap-x-16 lg:gap-y-16">
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
              <p class=" mt-2">With The Property Management System, you can manage all of your tenants&#39; rent payments and check
up on them from anywhere in the world. You&#39;ll also be able to see when they&#39;re late on their rent, so
you can take action right away. You can view their payment history and make payments.
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
            <div class="max-w-xs">
          <div class="text-xs mt-6">
              <p class="mt-2">You&#39;ll be able to track all of your bills and payments with one convenient portal so that all of your
invoices and payments are in one place. You&#39;ll also be able to generate reports automatically that show
what happened over time so you can get an overview of how things are going.</p> 
             
</div>
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
<p class="mt-2">With The Property Management System, you won&#39;t have to worry about keeping track of all of your
expenses—we do that for you! Just plug in any number of expenses (like utilities or repairs) and we&#39;ll
create a report showing how much money was spent on each one over time.</p>
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
<p class="mt-2">Without the decision support system, decision making would be difficult. The property management
system helps you to make the right decision at right time with its system generated reports.</p>
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
<p class="mt-2">This dashboard shows all of your portfolio&#39;s current prices—and what they would be if they were sold
off individually. With the property management system, you can manage multiple properties under one
platform and compare the performance of properties.</p>
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
<p class="mt-2">This portal allows you to manage units within your portfolio—and even take advantage of special offers
for new units. It allows you to compare property metrics like frequency of occupancy, collection
efficiency, number of concerns received, etc to improve performance and business growth.</p>
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
    background-color: #5D5270;
}
</style>
        <div class="relative">
          <div class="flex justify-center items-center">
         <h2 class="font-bold text-white text-3xl">Kickstarter Guide</h2>
         
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
                    
                    <p class="text-lg font-semibold text-purple-900">Registration</p>
                    <p class="mt-3 text-sm text-gray-500">To kickstart the procedure register your condominiums, apartments, business spaces, residential units,
and dormitory rooms.</p>
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
                    <p class="text-lg font-semibold text-purple-900">Property Details</p>
                    <p class="mt-3 text-sm text-gray-500">Include all details of the property, room specifications, rent details, deposit requirements, and other
related features of the property and rent.</p>
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
                    <p class="text-lg font-semibold text-purple-900">Tenants’ Details.</p>
                    <p class="mt-3 text-sm text-gray-500">Insert the tenant’s details like contact information, duration and terms of the contract, and other
required information.</p>
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
                    <p class="text-lg font-semibold text-purple-900">Supervision and Management</p>
                    <p class="mt-3 text-sm text-gray-500">Portal provides you with an interface where you can supervise and manage all concerns of tenants, job
creation, and assignments, supervision of such tasks and monitor them up to completion.</p>
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
                    <p class="text-lg font-semibold text-purple-900">Billing and Finance</p>
                    <p class="mt-3 text-sm text-gray-500">Setup billing date, recurring charges, and recurring billing amount property management system will
automate the billing system and intimate to tenant accordingly.</p>
                  </a>
                </div>
              </div>
            </div>

            
          </div>
        </div>

        
      </div>
     
     <!-- TESTIMONIAL -->

     <section class="overflow-hidden bg-gray-50 py-12 md:py-20 lg:py-24">
  

  <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <div class="flex justify-center items-center ">
      <div class="max-w-sm md:max-w-md lg:max-w-3xl">
 <div class="">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
        

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
      <img class="mx-auto w-10 h-10"  src="{{ asset('/brands/clients/client-2.png') }}" alt="North Cambridge logo">
      <blockquote class="mt-10">
        <div class="mx-auto max-w-3xl text-center text-xl font-medium leading-9 text-gray-900">
          <p>&ldquo;It makes my life less stressful because the application provides an easy way for tenants to report concerns, and as I resolve the concern, it provides an option for them to monitor its status in real-time.&rdquo;</p>
        </div>
        <footer class="mt-8">
          <div class="md:flex md:items-center md:justify-center">
            <div class="md:flex-shrink-0">
              <img class="mx-auto h-10 w-10 rounded-full" src="{{ asset('/brands/landing/f-icon.webp') }}" alt="user icon">
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


        </div>
        <div class="swiper-slide">
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-martha">
      <title id="svg-martha">Martha</title>
      <defs>
        <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
    </svg>

    <div class="relative">
      <img class="mx-auto w-20 h-20"  src="{{ asset('/brands/clients/client-3.png') }}" alt="Martha logo">
      <blockquote class="mt-10">
        <div class="mx-auto max-w-3xl text-center text-xl font-medium leading-9 text-gray-900">
          <p>&ldquo;Helpful. Makes work faster and easier.&rdquo;</p>
        </div>
        <footer class="mt-8">
          <div class="md:flex md:items-center md:justify-center">
            <div class="md:flex-shrink-0">
              <img class="mx-auto h-10 w-10 rounded-full" src="{{ asset('/brands/landing/f-icon.webp') }}" alt="user icon">
            </div>
            <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
              <div class="text-base font-medium text-gray-900">Vanessa</div>

              <svg class="mx-1 hidden h-5 w-5 text-indigo-400 md:block" fill="currentColor" viewBox="0 0 20 20">
                <path d="M11 0h3L9 20H6l5-20z" />
              </svg>

              <div class="text-base font-medium text-gray-500">Leasing Manager, Martha</div>
            </div>
          </div>
        </footer>
      </blockquote>
    </div>
  </div>
        </div>
        <div class="swiper-slide">
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-martha">
      <title id="svg-martha">Daily Rental Property</title>
      <defs>
        <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
          <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
        </pattern>
      </defs>
      <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
    </svg>

    <div class="relative">
      
      <blockquote class="mt-10">
        <div class="mx-auto max-w-3xl text-center text-xl font-medium leading-9 text-gray-900">
          <p>&ldquo;Nice app!&rdquo;</p>
        </div>
        <footer class="mt-8">
          <div class="md:flex md:items-center md:justify-center">
            <div class="md:flex-shrink-0">
              <img class="mx-auto h-10 w-10 rounded-full" src="{{ asset('/brands/landing/f-icon.webp') }}" alt="user icon">
            </div>
            <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
              <div class="text-base font-medium text-gray-900">Jael</div>

              <svg class="mx-1 hidden h-5 w-5 text-indigo-400 md:block" fill="currentColor" viewBox="0 0 20 20">
                <path d="M11 0h3L9 20H6l5-20z" />
              </svg>

              <div class="text-base font-medium text-gray-500">Daily Rental Property</div>
            </div>
          </div>
        </footer>
      </blockquote>
    </div>
  </div>
          
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
          
          <form action="https://formsubmit.co/f694a11ef780365f3384eeda25acb3fc" method="POST" class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
            <div>
              <label for="first-name" class="block text-sm font-medium text-gray-900">First name</label>
              <div class="mt-1">
                <input type="text" name="first-name" id="first-name" required autocomplete="given-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>

              <label for="last-name" class="block text-sm font-medium text-gray-900">Last name</label>
              <div class="mt-1">
                <input type="text" name="last-name" id="last-name" required autocomplete="family-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>

            <label for="sex" class="block text-sm font-medium text-gray-900">Sex</label>
              <div class="mt-1">
                <select name="sex" id="sex" required class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select>
              </div>
            </div>
            <div>

              <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
              <div class="mt-1">
                <input id="email" name="email" type="email" required autocomplete="email" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>

            <label for="mobile-number" class="block text-sm font-medium text-gray-900">Mobile Number</label>
              <div class="mt-1">
                <input id="mobile-number" name="mobile-number" type="mobile-number" required autocomplete="Mobile" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>
              
            <div class="flex justify-between">
                <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
              </div>
              <div class="mt-1">
                <textarea id="message" name="message" required rows="1" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" aria-describedby="message-max"></textarea>
              </div>
            </div>

          

            <div class="sm:col-span-2">
             
            <label for="property type" class="block text-sm font-medium text-gray-700"> Property Type: </label>
            <div class="mt-5">
            
                
            <ul><input type="checkbox" id="condominium-association"> Condominium Association</ul>
            <ul><input type="checkbox" id="condominium-units"> Condominium Units</ul>
            <ul><input type="checkbox" id="student-accomodation"> Student Accomodation</ul>
            <ul><input type="checkbox" id="hoa"> HOA</ul>
            <ul><input type="checkbox" id="dormitory"> Dormitory</ul>
            <ul><input type="checkbox" id="commcercial"> Commercial</ul>
            <ul><input type="checkbox" id="self-storage"> Self storage</ul>
            <ul><input type="checkbox" id="senior-living"> Senior Living</ul>
            <ul><input type="checkbox" id="residential-apartments"> Residential Apartments</ul>
            <ul><input type="checkbox" id="bed-and-breakfast"> Bed and breakfast</ul>
            <ul><input type="checkbox" id="transient"> Transient</ul>
            
          
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
            <a href="https://www.digitalocean.com/trust/certification-reports?fbclid=IwAR3qJ79YUNro9Px4ycCvcuCgGH7MVxbcrvQitnhlh4i51su4PuJsRyKr6T0"><img class="w-20 h-20" src="{{ asset('/brands/landing/digital-ocean.png') }}" alt="digital ocean logo"></a>
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
          <img class="w-30 h-20" src="{{ asset('/brands/landing/aim-logo.png') }}" alt="AIM logo">
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
          <img class="w-20 h-20" src="{{ asset('/brands/clients/client-3.png') }}" alt="martha logo">
          </div>
          <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
          <img class="w-20 h-20" src="{{ asset('/brands/clients/client-4.png') }}" alt="cura logo">
          </div>
          


        </div>
      </div>
    </div>
          </x-landing-page-template>