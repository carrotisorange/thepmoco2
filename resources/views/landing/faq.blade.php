<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>The PMO — FAQs</title>
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
#nav {
  background-color: #4A386C;
}
</style>
 
    <!-- component -->
<body class="bg-white">
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
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="landingpage">Home</a></li>
			
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="about">About Us</a></li>
			
			<li><a class="text-md text-white font-semibold" href="faq">FAQs</a></li>
			
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="blog">Articles</a></li>
		
		</ul>
		<a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-white bg-purple-700 hover:bg-gray-300  rounded-2xl transition duration-200" href="newsignup">Sign Up</a>
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
   <div class=" pb-16 lg:z-10 lg:pb-0">
          <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-xl lg:px-0 lg:py-20">
              <blockquote>
                <div>
                  <svg class="h-12 w-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                    <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                  </svg>
                  <p class="mt-2 text-3xl font-xl text-gray-800">What is an <span class="font-bold">online rental property management system?</span></p>
                </div>
                <footer class="mt-6">
                  <p class="text-base font-sm text-gray-500">It is a digital system to organize property data in one digital place that is cloud based and 	can be accessed online anytime and from anywhere with internet connectivity.</p>
                  
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
          
          <p class="mt-12 text-3xl font-light tracking-tight text-gray-900">
          Why do <span class="font-bold">property managers</span> need an <span class="font-bold">online rental property management system?</span></p>
          <p class="mt-5 text-md text-gray-600 ">An online property management system is a better and simpler way of managing rental properties that replaces the tedious and repetitive manual processes of property managers managing a rental property like billing and collection management. </p>
          
          <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-6 sm:grid-cols-2">
           
          </div>
        </div>
      </div>
    </div>



    <div class="relative bg-gray-500 ">
        <div class="mx-auto max-w px-6 py-12 lg:py-32 lg:px-8 md:py-28 sm:py-20 sm:px-6 relative h-72 bg-gray-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
        <div class="md:ml-auto md:pl-">
            
        <p class="mt-2 text-3xl  text-white">Who uses online property management system?</p>
          <p class="mt-10 text-md font-light  text-gray-100">
          Professional property and leasing managers use an online system to increase efficiency in operating the property and communicating with their customers. Rental property owners use an online property management system to monitor their rental properties. Tenants use The PMO system to keep track of their bills and payments history and send their concerns to management.
          </p>
            
            <div class="mt-8">
              <div class="inline-flex rounded-md shadow">
                
              </div>
            </div>
        </div>
</div>
        <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">

          <div class="md:ml-auto md:w-1/2 md:pl-10">
          <p class="mt-2 text-3xl  text-white">How much does a property management system cost?</p>
            <p class="mt-10 text-md font-light text-gray-100">The cost of an online property management system is low-cost. It is designed to simplify property management work and reduce operating expenses. It is usually paid through monthly or annual subscription so that it can fit into most operating budgets of rental properties. </p>
            
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
            <h2 class="text-center text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">What are the features of an online rental property management system?</h2>
            <div class="mt-10 space-y-6 text-gray-500 text-center">
              <p class="text-lg"> Features available in The PMO System include tenants contract management , concerns 	management, billing and collection management , cash flow reports, property dashboards, unit 	management, user roles management.
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
      <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-center lg:mt-16">
       
        <p class="mt-8 text-base text-center text-gray-400 md:order-1 md:mt-0">&copy; 2022 The PMO Co. All rights reserved.</p>
      </div>
    </div>
  </footer>
</div>


</body>



</html>