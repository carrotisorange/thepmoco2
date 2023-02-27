<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content= "width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="Property,
    Property Management,
    Property manager,
    Property management system,
    Leasing,
    Leasing management,
    Leasing manager,
    Leasing management system,
    Real estate management,
    Real estate manager,
    Real estate management system,
    Long-term lease,
    Long-term Rental property,
    Rental Property,
    Rental property management system,
    Real Property Technology,
    Rental Property Technology,
    Rental Property Business,
    System as a service,
    Condominium management system,
    Association Management System,
    Rental billing system,
    property management system for hotels,
    property management system in hotel,
    leasing management software,
    property leasing management,
    property management software,
    property management software systems,
    property management companies,
    Real Estate Technology,
    online condominium management system,
    association management system software">


           

    <!-- facebook -->
    <meta property="og:url"                content="@yield('og-url')">
    <meta property="og:type"               content="article">
    <meta property="og:title"              content="@yield('og-title')">
    <meta property="og:description"        content="@yield('og-description')">
    <meta property="og:image"              content="@yield('og-image')">


</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P3GZPSF');</script>
<!-- End Google Tag Manager -->

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XFVDKSHJQL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XFVDKSHJQL');
</script>

</head>

<style>
body {
    font-family: 'Poppins';
}
#nav {
  background-color: #4A386C;
}
#button1 {
  background-color: #f97316;
  border-radius: 30px;
  transition-duration: 0.1s;
}
#button2{
  background-color: #8B5CF6;
  border-radius: 30px;
  transition-duration: 0.1s;
}
#button1:hover, #button2:hover {
  background-color:#fdba74;
}
</style>

  <html>
  <body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3GZPSF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
 
    <!-- navigation -->
<body>
	<nav id="nav" class="lg:sticky top-0 z-10 relative px-4 py-6 flex justify-between items-center">
		<a class="text-3xl font-bold leading-none" href="/">
    <img class="h-10" src="{{ asset('/brands/landing/pmo-logo.webp') }}" alt="the pmo logo">
		</a>
		<div class="lg:hidden">
			<button class="navbar-burger flex items-center text-white p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-10">
			<li><a class="text-lg text-gray-200 hover:text-gray-400" href="/">Home</a></li>
			
			<li><a class="text-lg text-gray-200 hover:text-gray-400" href="about">About Us</a></li>
			
			<li><a class="text-lg text-gray-200 hover:text-gray-400" href="faq">FAQs</a></li>
			
			<li><a class="text-lg text-gray-200 hover:text-gray-400" href="blog-1">Articles</a></li>
		
		</ul>
		<a id="button1"class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm font-bold text-white hover:bg-gray-300  rounded-xl transition duration-200" href="https://thepmo.co/select-a-plan">Sign Up</a>
		<a class="hidden lg:inline-block py-2 px-6  text-sm text-white hover:bg-gray-400 rounded-2xl transition duration-200" href="https://thepmo.co/">Sign In</a>
	</nav>
	<div class="navbar-menu relative z-50 hidden">
		<div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="#">
        <img class="h-20" src="{{ asset('/brands/pm_logo_2.png') }}" alt="the pmo logo">
				</a>
				<button class="navbar-close">
					<svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					<li class="mb-1" tabindex="0">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="/" >Home</a>
					</li>
					<li class="mb-1" tabindex="0">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="about" >About Us</a>
					</li>
					<li class="mb-1" tabindex="0">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="faq" >FAQs</a>
					</li>
					<li class="mb-1" tabindex="0">
						<a class="block p-4 text-sm font-semibold text-gray-400 hover:bg-purple-100 hover:text-purple-500 rounded" href="blog-1">Articles</a>
					</li>
					
				</ul>
			</div>
			<div class="mt-auto">
				<div class="pt-6">
					<a class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl" href="https://thepmo.co/">Sign in</a>
					<a class="block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold bg-purple-600 hover:bg-purple-700  rounded-xl" href="https://thepmo.co/select-a-plan">Sign Up</a>
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
    
    {{$slot}}
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
                  <a href="blog-1" class="text-base text-gray-500 hover:text-gray-900">Articles</a>
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

                <li>
                  <a href="job" class="text-base text-gray-500 hover:text-gray-900">Jobs</a>
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