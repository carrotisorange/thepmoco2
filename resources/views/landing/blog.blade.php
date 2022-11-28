<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>The PMO — Articles</title>
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
		<a class="text-3xl font-bold leading-none" href="/">
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
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="/">Home</a></li>
			
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="about">About Us</a></li>
			
			<li><a class="text-md text-gray-400 hover:text-gray-500" href="faq">FAQs</a></li>
			
			<li><a class="text-md text-white font-semibold" href="blog">Articles</a></li>
		
		</ul>
		<a class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-white bg-purple-700 hover:bg-gray-300  rounded-2xl transition duration-200" href="select-a-plan">Sign Up</a>
		<a class="hidden lg:inline-block py-2 px-6  text-sm text-white hover:bg-gray-400 rounded-2xl transition duration-200" href="login">Sign In</a>
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
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="/">Home</a>
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
					<a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="login">Sign in</a>
					<a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-purple-600 hover:bg-purple-700  rounded-xl" href="select-a-plan">Sign Up</a>
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

 <!-- This example requires Tailwind CSS v2.0+ -->
<div class="relative  px-4 pt-16 pb-20 sm:px-6 lg:px-8 lg:pt-10 lg:pb-28">
  <div class="absolute inset-0">
    <div class="h-1/3 bg-white sm:h-2/3"></div>
  </div>
  <div class="relative mx-auto max-w-5xl">
    
    <div class="mx-auto mt-5 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-3">
      <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <a href="article1"><img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt=""></a>
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="article1" class="hover:underline">Article</a>
            </p>
            <a href="article1" class="mt-2 block">
              <p class="text-xl font-semibold text-gray-900">How our journey started</p>
              <p class="mt-3 text-base text-gray-500">
                When we first started out as property managers, we followed the old-school methods. During leasing procedures, we used the traditional way</p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
              <a href="">
                <span class="sr-only">Anonymous</span>
                <img class="h-16 w-16 rounded-full" src="{{ asset('/brands/landing/f-icon.png') }}" alt="">
              </a>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-900">
                <a href="" class="hover:underline">Anonymous</a>
              </p>
              <div class="flex space-x-1 text-sm text-gray-500">
                <time datetime="2020-03-16">Date</time>
                <span aria-hidden="true">&middot;</span>
                <span>6 min read</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="">
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline">Video</a>
            </p>
            <a href="#" class="mt-2 block">
              <p class="text-xl font-semibold text-gray-900">How to use search engine optimization to drive sales</p>
              <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore optio animi., tempore temporibus quo laudantium.</p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
              <a href="#">
                <span class="sr-only">Brenna Goyette</span>
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </a>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-900">
                <a href="#" class="hover:underline">Brenna Goyette</a>
              </p>
              <div class="flex space-x-1 text-sm text-gray-500">
                <time datetime="2020-03-10">Mar 10, 2020</time>
                <span aria-hidden="true">&middot;</span>
                <span>4 min read</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="hidden flex flex-col overflow-hidden rounded-lg shadow-lg">
        <div class="flex-shrink-0">
          <img class="h-48 w-full object-cover" src="https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80" alt="">
        </div>
        <div class="flex flex-1 flex-col justify-between bg-white p-6">
          <div class="flex-1">
            <p class="text-sm font-medium text-indigo-600">
              <a href="#" class="hover:underline">Case Study</a>
            </p>
            <a href="#" class="mt-2 block">
              <p class="text-xl font-semibold text-gray-900">Improve your customer experience</p>
              <p class="mt-3 text-base text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint harum rerum voluptatem quo recusandae magni placeat saepe molestiae, sed excepturi cumque corporis perferendis hic.</p>
            </a>
          </div>
          <div class="mt-6 flex items-center">
            <div class="flex-shrink-0">
              <a href="#">
                <span class="sr-only">Daniela Metz</span>
                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </a>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-gray-900">
                <a href="#" class="hover:underline">Daniela Metz</a>
              </p>
              <div class="flex space-x-1 text-sm text-gray-500">
                <time datetime="2020-02-12">Feb 12, 2020</time>
                <span aria-hidden="true">&middot;</span>
                <span>11 min read</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    
      
   
  </main>

  <footer class="" aria-labelledby="footer-heading">
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
      <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-center lg:mt-16">
       
        <p class="mt-8 text-base text-center text-gray-400 md:order-1 md:mt-0">&copy; 2022 The PMO Co. All rights reserved.</p>
      </div>
    </div>
  </footer>
</div>


</body>



</html>