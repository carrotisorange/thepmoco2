<x-landing-page-template>

  @section('title','Propman | Home')
  @section('description', 'Increase transparency, and efficiency in rental property operations with a simple and easy to
  use system for leasing and property management.')

  <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

  <style>
    body {
      font-family: 'Poppins';
    }

    #button1 {
      background-color: #F79630;
      border-radius: 30px;
      transition-duration: 0.1s;
    }

    #button2 {
      background-color: #8B5CF6;
      border-radius: 30px;
      transition-duration: 0.1s;
    }

    #button1:hover,
    #button2:hover {
      background-color: #fdba74;
    }

    body {
      background-color: #422040;
      height: 100%;
    }


    #owner {
      background-color: #E0DAED;
    }

    #gradient {
      background-image: linear-gradient(to right, rgba(79, 25, 100), rgba(79, 63, 109));
    }

    #features {
      background-image: url('/brands/landing/feature-bg.webp');
      background-repeat: no-repeat;
      background-size: cover;
    }

    #guide {
      background-color: #4F3F6D;
    }

    #owner-btn {
      background-color: #4A386C;
      border-radius: 4px;
    }

    .propbizOrange {
      color: #F4B700;
    }

    .propmanOrangebg {
      background-color: #FFDE59;
    }

    .resource-bg {
      background-image: url('/brands/propsuite/resource-bg.png');
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;

    }

    #darkPurple {
      background-color: #331832;
    }

    #Violet {
      background-color: #694D75;
    }

    #LightPurple {
      background-color: #D0D0D0;
    }

    #Gray{
      background-color: #9FA6A8;
    }

    #DarkGray{
      background-color: #5A5A5A;
    }

    .violet{
        background-color: #6B4E71;
    }
    .purple{
        background-color: #4F3F6D;
    }
  </style>


                    
                    
                    
                    <div class="resource-bg mt-0  overflow-hidden py-6 sm:py-24">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2">

                                <div class="lg:ml-auto lg:pl-4 lg:pt-4">
                                    <div class="lg:max-w-lg">
                                        <h2 class="text-base font-medium leading-7 text-yellow-300">Latest Article</h2>
                                        <p class="mt-2 text-3xl font-bold tracking-tight text-gray-100 sm:text-4xl">How To Be An Environmentally Friendly Rental Property</p>
                                        <p class="mt-6 text-lg leading-8 text-gray-200 font-light">Multiple unit apartment buildings or rental apartments have a big impact in the environment. They p...</p>
                                        <div class="mt-8">
                                            <a href="/articles" class="inline-flex rounded-full bg-yellow-600 px-3.5 py-2.5 text-sm font-light text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                                Read more Articles</a>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="flex items-start justify-end lg:order-first">
                                    <img src="{{ asset('/brands/landing/article22.jpg') }}" alt="Product screenshot" class=" rounded-xl shadow-xl ring-1 ring-gray-400/10 " width="700" height="100">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="bg-purple-100 overflow-hidden bg-white py-24 sm:py-32">
                        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                            <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start">
                            <div class="lg:pr-4 lg:pt-4">
                                <div class="lg:max-w-lg">
                                <h2 class="text-base font-semibold leading-7 text-purple-600">Company News</h2>
                                <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Propsuite celebrates National Shelter Month with DHSUD </p>
                                <p class="mt-6 text-lg leading-8 text-gray-600">Registered Home Owners Associations with up to 20% discount.</p>
                                <div class="mt-8">
                                    <a href="about" class="inline-flex rounded-full bg-purple-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                        Learn more About Us</a>
                                </div>
                              
                                </div>
                            </div>
                            <img src="{{ asset('/brands/shelter-month.png') }}" alt="Product screenshot" class=" rounded-xl shadow-xl ring-1 ring-gray-400/10 " width="700" height="100">
                            </div>
                        </div>
                    </div>

                    <div class="violet mt-0 sm:met-0 lg:-mt-4 px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
                        <h1 class="text-4xl font-bold tracking-tight sm:text-4xl lg:text-4xl">
                            <span class="text-gray-300">Frequently asked questions</span>

                        </h1>
                        <p class="mb-10 text-xl text-purple-300 sm:max-w-3xl">Everything You Need to Know</p>
                        <div class="block lg:flex ">
                            <p class="text-md text-gray-200 sm:max-w-3xl">Check out our answers to some of the
                                most
                                frequently asked questions.
                            </p>
                        </div>

                        <div class="block lg:flex justify-between items-start my-2">
                            <div class="w-full sm:w-10/12 md:w-1/2 my-1">
                                <ul class="flex flex-col">
                                    <li class="bg-white my-2 shadow-lg" x-data="accordion(1)">
                                    <h2
                                        @click="handleClick()"
                                        class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                                    >
                                        <span>Who uses an online property management system?</span>
                                        <svg
                                        :class="handleRotate()"
                                        class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                                        viewBox="0 0 20 20"
                                        >
                                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                                        </svg>
                                    </h2>
                                    <div
                                        x-ref="tab"
                                        :style="handleToggle()"
                                        class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                                    >
                                        <p class="p-3 text-gray-900">
                                        The property management system (PMS) is a software program that can be used by real estate agents, managers, leasing managers, and owners. It allows them to maintain a database of high-quality property listings for sale or lease on the market. The PMS is also used by real estate agents who want to manage their listings.</p>
                                    </div>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                
                                <a href="/faq" class="inline-flex rounded-full bg-gray-900 px-3.5 py-2.5 text-sm font-light text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    See Frequently Asked Questions</a>
                            </div>
                        </div>
                           
                    </div>


   
                




                            
                        


                    


 

  <!-- contact us section -->

  <div>
    <div class="">
      <div class="relative bg-white shadow-xl">
        <h2 class="sr-only">Contact us</h2>

        <div class="grid grid-cols-1 lg:grid-cols-3">
          <!-- Contact information -->
          <div class="px-5 relative overflow-hidden bg-gray-700 py-10 sm:px-10 xl:p-12">
            <div class="pointer-events-none absolute inset-0 sm:hidden" aria-hidden="true">
              <svg class="absolute inset-0 h-full w-full" width="343" height="388" viewBox="0 0 343 388" fill="none"
                preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                <path d="M-99 461.107L608.107-246l707.103 707.107-707.103 707.103L-99 461.107z" fill="url(#linear1)"
                  fill-opacity=".1" />
                <defs>
                  <linearGradient id="linear1" x1="254.553" y1="107.554" x2="961.66" y2="814.66"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#fff"></stop>
                    <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 sm:block lg:hidden"
              aria-hidden="true">
              <svg class="absolute inset-0 h-full w-full" width="359" height="339" viewBox="0 0 359 339" fill="none"
                preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                <path d="M-161 382.107L546.107-325l707.103 707.107-707.103 707.103L-161 382.107z" fill="url(#linear2)"
                  fill-opacity=".1" />
                <defs>
                  <linearGradient id="linear2" x1="192.553" y1="28.553" x2="899.66" y2="735.66"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#fff"></stop>
                    <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <div class="pointer-events-none absolute top-0 right-0 bottom-0 hidden w-1/2 lg:block" aria-hidden="true">
              <svg class="absolute inset-0 h-full w-full" width="160" height="678" viewBox="0 0 160 678" fill="none"
                preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                <path d="M-161 679.107L546.107-28l707.103 707.107-707.103 707.103L-161 679.107z" fill="url(#linear3)"
                  fill-opacity=".1" />
                <defs>
                  <linearGradient id="linear3" x1="192.553" y1="325.553" x2="899.66" y2="1032.66"
                    gradientUnits="userSpaceOnUse">
                    <stop stop-color="#fff"></stop>
                    <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                  </linearGradient>
                </defs>
              </svg>
            </div>
            <h3 class="text-3xl font-medium text-white">Contact Us</h3>
            <h3 class="mt-2 text-xl font-medium text-white">{{ env('APP_NAME') }}</h3>
            <p class="mt-6 max-w-3xl text-sm text-purple-200">Makati Address:
            <p class="text-base mt-2 text-white">{{ env('APP_SECOND_ADDRESS') }}</p>
            </p>
            <p class="mt-6 max-w-3xl text-sm text-purple-200">Baguio Address:
            <p class="text-base mt-2 text-white">{{ env('APP_FIRST_ADDRESS') }}</p>
            </p>
            <dl class="mt-8 space-y-6">
              <dt><span class="sr-only">Phone number</span></dt>
              <dd class="flex text-base text-indigo-50">
                <!-- Heroicon name: outline/phone -->
                <svg class="h-6 w-6 flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                </svg>
                <p class="ml-3">{{env('APP_MOBILE')}}</span>
              </dd>
              <dt><span class="sr-only">Email</span></dt>
              <dd class="flex text-base text-indigo-50">
                <!-- Heroicon name: outline/envelope -->
                <svg class="h-6 w- flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                <p class="ml-3">{{ env('APP_EMAIL') }}</span>
              </dd>
              <ul role="list" class="mt-8 flex space-x-12">
                <li>
                  <a href="https://www.{{  env('APP_FACEBOOK_PAGE') }}">
                    <dt><span class="sr-only">Facebook</span></dt>
                    <dd class="flex text-base text-indigo-50">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="text-indigo-200 h-6 w-6" aria-hidden="true">
                        <path
                          d="M22.258 1H2.242C1.556 1 1 1.556 1 2.242v20.016c0 .686.556 1.242 1.242 1.242h10.776v-8.713h-2.932V11.39h2.932V8.887c0-2.906 1.775-4.489 4.367-4.489 1.242 0 2.31.093 2.62.134v3.037l-1.797.001c-1.41 0-1.683.67-1.683 1.653v2.168h3.362l-.438 3.396h-2.924V23.5h5.733c.686 0 1.242-.556 1.242-1.242V2.242C23.5 1.556 22.944 1 22.258 1"
                          fill="currentColor" />
                      </svg>
                      <p class="ml-3">{{ env('APP_FACEBOOK_PAGE') }}</span>
                    </dd>
                  </a>
                </li>
              </ul>
          </div>

          <x-contactus></x-contactus>

          <script>
            document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
                tab: 0
            });
            
            Alpine.data('accordion', (idx) => ({
                init() {
                this.idx = idx;
                },
                idx: -1,
                handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
                },
                handleRotate() {
                return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
                },
                handleToggle() {
                return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
                }
            }));
            })
        </script>


</x-landing-page-template>
