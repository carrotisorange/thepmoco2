<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>The Property Manager Online</title>
</head>

<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<style>
body {
    font-family: 'Poppins';
}
</style>

  <html>
  <body>


  <header class="sm:relative lg:sticky top-0 z-10  h-20 flex-shrink-0">
    <div class="relative">
    <style>
header {
  background-color: #4A386C;
}
</style>
      <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">Your Company</span>
            <img class="h-10" src="{{ asset('/brands/landing/pmo-logo.png') }}" alt="pmo logo">
          </a>
        </div>
        <div class="-my-2 -mr-2 md:hidden">
          <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400  hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
            <span class="sr-only">Open menu</span>
            <!-- Heroicon name: outline/bars-3 -->
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button>
        </div>
        <nav class="hidden space-x-10 md:flex">
          <div class="relative">
          
            <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
            <a href="landingpage" class="text-base font-medium text-gray-200 hover:text-gray-900">Home</a>
              <!--
                Heroicon name: mini/chevron-down

                Item active: "text-gray-600", Item inactive: "text-gray-400"
              -->
              
            </button>

            <div class="hidden absolute z-10 -ml-4 mt-3 w-screen max-w-md transform lg:left-1/2 lg:ml-0 lg:max-w-2xl lg:-translate-x-1/2">
              <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid grid-cols-2">
                  <a href="" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                    
                  

               

                  

                  <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                    
                    
                  </a>
                </div>
              </div>
            </div>
          </div>

          <a href="about" class="text-base font-medium text-gray-200 hover:text-gray-900">About Us</a>
          <a href="faq" class="text-base font-medium text-gray-200 hover:text-gray-900">FAQs</a>
          <a href="blog" class="text-base font-medium text-gray-200 hover:text-gray-900">Articles</a>

        </nav>
        <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
       
        <button><a href="newsignup" class="inline-flex items-center justify-center whitespace-nowrap rounded-full border border-transparent bg-origin-border px-4 py-1 text-sm font-medium text-white shadow-sm bg-purple-700 hover:bg-purple-500">Sign up</a></button>
          <a href="newsignin" class="ml-8 whitespace-nowrap text-sm font-medium text-gray-300 hover:text-gray-900">Sign in</a>
          
        </div>
      </div>

      <!--
        Mobile menu, show/hide based on mobile menu state.

        Entering: "duration-200 ease-out"
          From: "opacity-0 scale-95"
          To: "opacity-100 scale-100"
        Leaving: "duration-100 ease-in"
          From: "opacity-100 scale-100"
          To: "opacity-0 scale-95"
      -->
      <div class="hidden absolute inset-x-0 top-0 z-30 origin-top-right transform p-2 transition md:hidden">
        <div class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
          <div class="px-5 pt-5 pb-6">
            <div class="flex items-center justify-between">
              <div>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?from-color=purple&from-shade=600&to-color=indigo&to-shade=600&toShade=600" alt="Your Company">
              </div>
              <div class="-mr-2">
                <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Close menu</span>
                  <!-- Heroicon name: outline/x-mark -->
                  <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
            </div>
            <div class="mt-6">
              <nav class="grid grid-cols-1 gap-7">
                <a href="#" class="-m-3 flex items-center rounded-lg p-3 hover:bg-gray-50">
                  <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <!-- Heroicon name: outline/inbox -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                    </svg>
                  </div>
                  <div class="ml-4 text-base font-medium text-gray-900">Inbox</div>
                </a>

                <a href="#" class="-m-3 flex items-center rounded-lg p-3 hover:bg-gray-50">
                  <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <!-- Heroicon name: outline/chat-bubble-bottom-center-text -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                    </svg>
                  </div>
                  <div class="ml-4 text-base font-medium text-gray-900">Messaging</div>
                </a>

                <a href="#" class="-m-3 flex items-center rounded-lg p-3 hover:bg-gray-50">
                  <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <!-- Heroicon name: outline/chat-bubble-left-right -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>
                  </div>
                  <div class="ml-4 text-base font-medium text-gray-900">Live Chat</div>
                </a>

                <a href="#" class="-m-3 flex items-center rounded-lg p-3 hover:bg-gray-50">
                  <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
                    <!-- Heroicon name: outline/question-mark-circle -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                  </div>
                  <div class="ml-4 text-base font-medium text-gray-900">Knowledge Base</div>
                </a>
              </nav>
            </div>
          </div>
          <div class="py-6 px-5">
            <div class="grid grid-cols-2 gap-4">
              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">Pricing</a>
              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">Partners</a>
              <a href="#" class="text-base font-medium text-gray-900 hover:text-gray-700">Company</a>
            </div>
            <div class="mt-6">
              <a href="#" class="flex w-full items-center justify-center rounded-md border border-transparent bg-gradient-to-r from-purple-600 to-indigo-600 bg-origin-border px-4 py-2 text-base font-medium text-white shadow-sm hover:from-purple-700 hover:to-indigo-700">Sign up</a>
              <p class="mt-6 text-center text-base font-medium text-gray-500">
                Existing customer?
                <a href="#" class="text-gray-900">Sign in</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main>
    <!-- Hero section -->
  
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

        
        <div class="relative shadow-xl sm:overflow-hidden ">
          <div class="absolute inset-0">
            <div class="flex items-center justify-center ">
            
</div>
            <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-gray-300 mix-blend-multiply" style= "background-image: url('/brands/faq.jpg ');"></div>
          </div>
          <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
            <h1 class="text-4xl font-bold tracking-tight sm:text-4xl lg:text-4xl">
              <span class=" text-gray-800">Frequently asked questions</span>
              
            </h1>
            <p class="text-xl text-white sm:max-w-3xl">Everything You Need to Know</p>
            <p class="mt-10 text-md text-gray-700 sm:max-w-3xl">Need assistance? Check out our answers to some of the most frequently asked questions below. If you can’t find the answer to your question here, get in touch with us today.

</p>
            
          </div>
        </div>
      </div>
    </div>

   <!-- Testimonial section -->
   <div class=" pb-16 mx-14 lg:z-10 lg:pb-0">
          <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0 lg:py-20">
              <blockquote>
                <div>
                  <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                    <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                  </svg>
                  <p class="mt-2 text-2xl font-xl text-gray-800">Why do I need a <span class="font-bold">system</span> for managing my properties?</p>
                </div>
                <footer class="mt-6">
                  <p class="text-base font-sm text-gray-500">Larger properties require full-time attention to maintain. These larger properties also require greater scrutiny of cash flow because of multiple owners’ interests. Third-party professional property managers are needed not only to oversee the maintenance of the building and its facilities, and collect dues and rents but also to manage the financial aspect of the property. Multiple-owned properties are much more complicated to manage due to the differences of opinion and interests of the multiple owners and third-party professional property managers provide an objective opinion when handling property concerns which have its objective the enhancement of the value of the real estate.</p>
                  
                </footer>
              </blockquote>
            </div>
          </div>
        </div>
      </div>

    
      
    <!-- Stats section -->
    <div class="relative bg-gray-50">
    <div class="absolute inset-x-0 bottom-0 h-80 xl:top-0 xl:h-full">
        <div class=" h-full w-full xl:grid xl:grid-cols-3">
          <div class="h-full xl:relative xl:col-start-3">
            <img class="h-full w-full object-cover opacity-75 xl:absolute xl:inset-0" src="{{ asset('/brands/landing/faq-2.png') }}" alt="People working on laptops">
            <div aria-hidden="true" class="absolute inset-x-0 top-0 h-32  xl:inset-y-0 xl:left-0 xl:h-full xl:w-32 xl:bg-gradient-to-r"></div>
          </div>
        </div>
      </div>
      <div class="mx-4 max-w-3xl px-4 sm:px-6 xl:grid-cols-2 xl:gap-x-8">
        <div class="relative pt-12 pb-64 sm:pt-24 sm:pb-64 xl:col-start-1 xl:pb-24">
          
          <p class="mt-12 mx-14 text-3xl font-light tracking-tight text-gray-900">
          Is a system better than using <span class="font-bold">excel</span> to manage?</p>
          <p class="mt-5 text-md text-gray-600 "></p>
          <p class="mt-5 text-md text-gray-600 "></p>
          <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
           
          </div>
        </div>
      </div>
    </div>



    <div class="relative bg-gray-500 ">
        <div class="mx-auto max-w px-6 py-12 lg:py-32 lg:px-8 md:py-28 sm:py-20 sm:px-6 relative h-72 bg-gray-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        <div class="md:ml-auto md:pl-">
            
          <p class="mt-2 text-xl font-light tracking-tight text-gray-100 sm:text-xl">
Condominium unit owners who invest for the purpose of renting it out are a good investment for the passive income it’s supposed to generate for the owner. This is truly passive income only if it is managed by a third-party property manager.</p>
            
            <div class="mt-8">
              <div class="inline-flex rounded-md shadow">
                
              </div>
            </div>
        </div>
</div>
        <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">

          <div class="md:ml-auto md:w-1/2 md:pl-10">
            
            <p class="mt-2 text-xl font-light tracking-tight text-gray-100 sm:text-xl">Unit owners who are active investors manage their own properties. They invest in condominium units because of the business of renting out real estate. They may need different services from property or leasing managers from time to time but they mostly manage the day-to-day operations of their properties.</p>
            
            <div class="mt-8">
              <div class="inline-flex rounded-md shadow">
                
              </div>
            </div>
          </div>
        </div>
      </div>

    
<!-- Blog section -->
<div class="relative bg-gray-white pb-10">
        <div class="py-20 relative">
        

          <div class="relative mx-auto max-w-5xl sm:px-6 lg:px-0">
          <!-- Content area -->
          <div class="pt-8 sm:pt-8 lg:pt-8">
            <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Does PMO help me see all my properties' metrics?</h2>
            <div class="mt-10 space-y-6 text-gray-500 text-center">
              <p class="text-lg">Just like any business, you need full time focus and commitment to operate a rental property to reach the objective of the business. If the daily operations become too burdensome to the rental property owner, then it is time to hire a professional property manager. If the owner has a full time job or lives far away from the rental property, then it would be best to hire the services of a local property manager who will be committed to operate the rental property. A property management system is then necessary as a channel for the owner to be updated about the status of their property because it automates the reporting aspect of the job of a property manager. 
</p>
             
            </div>
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
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Demo</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Articles</a>
                </li>

           

                
              </ul>
            </div>
            </div>

            <div class="md:grid md:grid-cols-1 md:gap-8">
              
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">About Us</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">FAQs</a>
                </li>

               

                
              </ul>
            </div>
          
          <div class="md:grid md:grid-cols-1 md:gap-8">
            <div>
              
              <ul role="list" class="mt-4 space-y-4">
               
              <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Terms & Conditions</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Privacy Policy</a>
                </li>

             
               

              
              </ul>
            </div>
            
          </div>
        </div>
        
      </div>
      <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-center lg:mt-16">
       
        <p class="mt-8 text-base text-center text-gray-400 md:order-1 md:mt-0">&copy; 2022 The PMO Co. All rights reserved.</p>
      </div>
    </div>
  </footer>
</div>


</body>



</html>