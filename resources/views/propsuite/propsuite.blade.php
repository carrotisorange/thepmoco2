<x-landing-page-template>

@section('title','Propsuite — Home')
@section('description', 'Increase transparency, and efficiency in rental property operations with a simple and easy to use system for leasing and property management.')

<style>
  #modal-bg{
    background-image: url('/brands/landing/modal-bg.png');
    background-repeat: no-repeat;
    background-size: cover;
  }

  #seamless {
    color: #F79630;
  }

  #owner {
  background-color: #E0DAED;
  }

  #gradient {
  background-image: linear-gradient(to right, rgba(74,56,108,0), rgba(102,102,102));
  }

  #features {
  background-image: url('/brands/landing/feature-bg.webp');
  background-repeat: no-repeat;
  background-size: cover;
  }

  #guide {
    background-color: #5D5270;
  }

  #owner-btn {
    background-color:#4A386C;
    border-radius:4px;
  }

  .propman-bg{
    background-image: url('/brands/propsuite/propman-landing-bg.png');
  }

  #proprent-bg{
    background-image: url('/brands/propsuite/proprent-landing-bg.png');
  }

  #propbiz-bg{
    background-image: url('/brands/propsuite/propbiz-landing-bg.png');
  }

  .propmanOrange{
    color: #FFDE59;
  }

  .propmanOrangebg{
    background-color: #FFDE59;
  }

</style>

<body id="background">
<!-- pop up modal -->
          <dh-component>         
            <div class="py-5 rounded-lg shadow  bg-gray-700 bg-opacity-75 transition duration-150 ease-in-out z-10 absolute top-0 right-0 bottom-0 left-0" id="modal">
                <div role="alert" class="container mx-auto  max-w-2xl">
                    <div class="mt-24 relative py-3 shadow-2xl bg-white ">
                      
                      <div id ="modal-bg" class="px-3 md:px-4 py-6 flex flex-col justify-center items-center">
                        <div role="img" aria-label="propsuite logo">
                          <img class="w-48" src="{{ asset('/brands/propsuite/propsuite.png') }}">
                        </div>
                        <h1 class="mt-8 md:mt-12 text-xl lg:text-2xl font-semibold  text-gray-800 text-center   dark:text-white">Welcome to Propsuite</h1>
                        <p class="mt-10 text-md leading-normal text-center text-gray-600 md:w-9/12 lg:w-9/12 dark:text-white"><span class="font-bold text-xl"> Free trial</span> until full setup ready.</p>
                        <p class="mt-3 mb-3 text-base leading-normal text-center text-gray-600 md:w-9/12 dark:text-white"><span class="font-bold text-purple-700 text-lg">No credit card required,</span> no strings attached</p>
                        <div class="mt-12 md:mt-14 w-full flex justify-center">
                          <a href="https://thepmo.co/select-a-plan"><button class="bg-purple-900 dark:text-white dark:border-white w-full sm:w-auto border border-purple-800 text-base font-medium text-white py-5 px-14 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 hover:bg-purple-600 hover:text-white dark:hover:text-white dark:hover:bg-gray-700">Start my Free Trial</button></a>
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

<!-- seamless section -->

          <div  class="sm:block lg:flex md:flex flex items-center justify-center">
            <div class="flex-col items-center justify-center px-4 sm:px-4 md:px-8 lg:px-20 xl:px-36 p-48">
              <div class="w-full">
                <div  class="text-gray-200 text-4xl text-center font-bold  sm:text-5xl lg:text-6xl">

                  <span class="prop"></span>
            
                </div>
              </div>

    
            </div>
            
        </div>
            <div class="-mt-32 pb-56 flex items-center justify-center gap-x-6">
              <a href="#services" class="rounded-full bg-yellow-300 px-3.5 py-2 text-base text-gray-600 font-medium shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400">Get Started</a>
            </div>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
                  <script>
                    var typed = new Typed(".prop", {
                        strings: ["Propman Management System", "Proprent Rental  Listings", "Propbiz Professional Services", "Propsuite Full Suite Solution",],
                        typeSpeed: 10,
                        backSpeed: 10,
                        loop: true
                    });
            </script>

            <script>
            var doc = document.getElementById("background");
            var color = ["#AD84F3","#4F1964","#975AB6","#4F3F6D",];
            var i = 0;
            function change() {
                doc.style.backgroundColor = color[i];
            i = (i + 1) % color.length;
            }
            
            setInterval(change, 1700);
            </script>

           

          

          

<!-- services -->

<div id="services" class="bg-white py-16 sm:py-24 lg:py-32" id="guide">
            <div class="">
              <div class="flex justify-center items-center ">
                <h2 class="font-semibold text-gray-600 text-3xl">What are the services that we offer?</h2>
              </div>
              <div class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-5xl lg:grid-cols-3 lg:px-8">

              <div class="flex flex-col overflow-hidden rounded-xl">
                  <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                    <div class="flex-1">                     
                      <a class="mt-2 block">
                        <p class="text-lg text-center font-medium text-gray-800">propman</p>
                      </a>
                      <a href="#propman"> <img src="{{ asset('/brands/propsuite/propman-notext.png') }}"></a>
                      
                    </div>
                  </div>
                  <p class="py-3 text-sm font-light text-gray-500">I need a property management system to manage my property.</p>
                </div>

                <div class="flex flex-col overflow-hidden rounded-xl">
                  <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                    <div class="flex-1">                     
                      <a class="mt-2 block">
                        <p class="text-lg text-center font-medium text-gray-800">proprent</p>
                      </a>
                      <a href="/proprent"> <img src="{{ asset('/brands/propsuite/proprent-notext.png') }}"></a>
                      
                    </div>
                  </div>
                  <p class="py-3 text-sm font-light text-gray-500">I need to advertise my listings/I want to look for available listings.</p>
                </div>

                
                    
                <div class="flex flex-col overflow-hidden rounded-xl">
                  <div class="flex flex-1 flex-col justify-center items-center bg-purple-100 w-full p-6">

                    <div class="flex-1">                     
                      <a class="mt-2 block">
                        <p class="text-lg text-center font-medium text-gray-800">propbiz</p>
                      </a>
                      <a href="/propbiz"> <img src="{{ asset('/brands/propsuite/propbiz-notext.png') }}"></a>
                      
                    </div>
                  </div>
                  <p class="py-3 text-sm font-light text-gray-500">I need a property management service to help in managing my properties.</p>
                </div>
                
               
    
               
    

                

              </div>
             
            </div>
          </div>

<!-- services end -->

<!-- propman section -->

<div id="propman" class="propman-bg sm:block lg:flex md:flex  py-16">
            <div class="flex-col items-center justify-center sm:ml-3 lg:ml-5 px-4 sm:px-4 md:px-8 lg:px-20 xl:px-36">
              <div class="w-full">
                <div class="text-gray-300 text-4xl font-bold py-24 sm:text-5xl lg:text-5xl">
                  <img class="h-24" src="{{ asset('/brands/propsuite/propman.png') }}">
                  
                  <h2 class="text-2xl">Property Management System</h2>
                </div>
              </div>
            </div>

            <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:px-48 sm-px-0">
              <div class="lg:block lg:py-20 md:max-w-lg xl:max-w-md sm:ml-12 sm:py-2  mx-5">
                <p class="text-lg font-light mt-10 text-white">Property Management System for long term and short term rental properties and home owners associations. </p>

                <div class="mt-10 flex justify-center items-center space-x-5">
                  <button class="bg-yellow-200 rounded-full"> <a href="propman" class="w-48 flex  justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Free Trial</a></button>
                  <button> <a href="demopage" class="w-48 flex justify-center py-3 px-4 border border-gray-400 rounded-full shadow-sm text-sm font-medium text-white hover:bg-purple-300  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View Demo</a></button>            
                </div>
              </div>
            </div>

          </div>

<!-- propman end -->
    
<!-- prorent section -->

<div id="proprent-bg" class="sm:block lg:flex md:flex py-16">
            <div class="flex-col items-center justify-center sm:ml-3 lg:ml-5 px-4 sm:px-4 md:px-8 lg:px-20 xl:px-36">
              <div class="w-full">
                <div class="text-gray-300 text-4xl font-bold py-24 sm:text-5xl lg:text-5xl">
                  <img class="h-24" src="{{ asset('/brands/propsuite/proprent.png') }}">
                  
                  <h2 class="text-2xl">Rental Property Listings</h2>
                </div>
              </div>
            </div>

            <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:px-48 sm-px-0">
              <div class="lg:block lg:py-20 md:max-w-lg xl:max-w-md sm:ml-12 sm:py-2 mx-5">
                <p class="text-lg font-light mt-10 text-white">Leasing platform for rental property owners to list vacant rooms and units for long term or short term rentals. </p>

                <div class="mt-10 flex justify-center items-center space-x-5">
                  <button class="proprentOrangebg rounded-full"> <a href="https://thepmo.co/select-a-plan" class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Free Trial</a></button>
                  <button> <a href="demopage" class="w-48 flex justify-center py-3 px-4 border border-gray-400 rounded-full shadow-sm text-sm font-medium text-white hover:bg-purple-300  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View Demo</a></button>            
                </div>
              </div>
            </div>

          </div>

<!-- proprent end -->

<!-- propbiz section -->

<div id="propbiz-bg" class="sm:block lg:flex md:flex py-16">
            <div class="flex-col items-center justify-center sm:ml-3 lg:ml-5 px-4 sm:px-4 md:px-8 lg:px-20 xl:px-36">
              <div class="w-full">
                <div class="text-gray-300 text-4xl font-bold py-24 sm:text-5xl lg:text-5xl">
                  <img class="h-24" src="{{ asset('/brands/propsuite/propbiz.png') }}">
                  
                  <h2 class="text-xl">Professional Property Management Services</h2>
                </div>
              </div>
            </div>

            <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:px-48 sm-px-0">
              <div class="lg:block lg:py-20 md:max-w-lg xl:max-w-lg sm:ml-12 sm:py-2 lg:-ml-5 mx-5">
                <p class="text-lg font-light mt-10 text-white">Property management services that provides online and onsite operations management services to rental property owners.</p>

                <div class="mt-10 flex justify-center items-center space-x-5">
                  <button class="propbizOrangebg rounded-full"> <a href="https://thepmo.co/select-a-plan" class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Free Trial</a></button>
                  <button> <a href="demopage" class="w-48 flex justify-center py-3 px-4 border border-gray-400 rounded-full shadow-sm text-sm font-medium text-white hover:bg-purple-300  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">View Demo</a></button>            
                </div>
              </div>
            </div>

          </div>

<!-- propbiz end -->



<!-- testimonial section -->

          <section class="overflow-hidden bg-gray-50 py-12 md:py-20 lg:py-24">
            <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
            <div class="flex justify-center items-center ">
              <div class="max-w-sm md:max-w-md lg:max-w-3xl">
                <div class="">
                  <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                      <!-- north cambridge -->
                      <div class="swiper-slide">
                        <div class=" mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                          <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-northcambridge">
                            <title id="svg-northcambridge">North Cambridge</title>
                            <defs>
                              <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                              </pattern>
                            </defs>
                            <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
                          </svg>
        
                          <div class="">
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
                        <div class=" mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                          <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-martha">
                            <title id="svg-martha">Martha</title>
                            <defs>
                              <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                              </pattern>
                            </defs>
                            <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
                          </svg>

                          <div class="">
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
                        <div class=" mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                          <svg class="absolute top-full right-full translate-x-1/3 -translate-y-1/4 transform lg:translate-x-1/2 xl:-translate-y-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" role="img" aria-labelledby="svg-martha">
                            <title id="svg-martha">Daily Rental Property</title>
                            <defs>
                              <pattern id="ad119f34-7694-4c31-947f-5c9d249b21f3" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                              </pattern>
                            </defs>
                            <rect width="404" height="404" fill="url(#ad119f34-7694-4c31-947f-5c9d249b21f3)" />
                          </svg>
                          <div class=""> 
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
            </div>
          </section>
<!-- end testimonial section -->        
      
<!-- contact us section -->

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
                        <p class="ml-3">pamelatecson@thepmo.co</span>
                      </dd>
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
                        </a>
                      </li>
                    </ul>
                  </div>
                  
                  <x-contactus></x-contactus>
                  

<!-- partnered with section -->

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
<!-- end partnered with section -->

</x-landing-page-template>