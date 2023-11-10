<x-landing-page-template>

  @section('title','PropSuite Condo')
  @section('description', 'Increase transparency, and efficiency in rental property operations with a simple and easy to
  use system for leasing and property management.')


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
      background-color: #BCB4D1;
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

    .propsuite-condo-bg {
      background-image: url('/brands/propsuite/propsuite-condo-bg.png');
      height: 100%;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;

    }

    nav:{
        color: #9FA6A8;
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
  </style>



  <!-- seamless section -->

  <div class="pb-10 lg:pb-0 propsuite-condo-bg sm:block lg:flex md:flex min-h-screen">
    <div class="flex-col items-center justify-center sm:ml-3 lg:ml-5 px-4 sm:px-4 md:px-8 lg:px-20 xl:px-36">
      <div class="w-full">
        <div class="text-gray-700 text-4xl font-bold py-24 sm:text-5xl lg:text-5xl">
          <img class="w-36" src="{{ asset('/brands/landing/propsuite-condo.png') }}">

          <h2 class="mt-5">Property Management System</h2>
        </div>
      </div>
    </div>

    <div class="flex-col justify-center sm:-py-2 md:py-20 lg:py-8 lg:px-36 sm-px-0">
      <div class="lg:block lg:py-20 md:max-w-lg xl:max-w-md sm:ml-12 sm:py-2  mx-5">
        <p class="text-base font-light mt-10 text-gray-600 text-justify">Condominium Community Management System to improve transparency in the complex management of condominiums. Provide better customer services to increase customer satisfaction with PropSuite Condo features that are accessible to unit owners. </p>

        <div class="mt-10 flex justify-center items-center space-x-5">
          <button class=" rounded-full"> <a href="/select-a-plan"
              class="propmanOrangebg border border-gray-500 w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-bold text-gray-800  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Free
              Trial</a></button>
          <button> <a href="#contactus"
              class="w-48 flex justify-center py-3 px-4 border border-gray-400 rounded-full shadow-sm text-sm font-medium text-gray-800 hover:bg-purple-400  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Request Demo</a></button>
        </div>
      </div>
    </div>

  </div>

  <!-- seamless end -->

 <!--  feature Section -->

 <div id="features">
    <div class="h-full mx-auto max-w-4xl px-4 py-16 sm:px-6 sm:pt-10 lg:max-w-7xl lg:px-8 lg:pt-10">
      <div class="mx-auto gap-x-6 gap-y-12 sm:grid grid-cols-2 lg:mt-16 lg:grid-cols-2 lg:gap-x-16 lg:gap-y-16">

        <div>
          <div class=" lg:py-0 flex items-center justify-start lg:justify-center">
            <span class="ml-0 lg:-ml-32 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABFUlEQVR4nO2UQUrDQBSGA4KnsLtCoTfwBAby/TOrQRC6cuEh3LrrSZRC9+INuhKUHkEFFXUtRp4mEGtMGxmDi/zwMzDzfj5m3kuSpFcsee8HkmbAi1nS3Dk3+gvIg6R8xY92Fg0kaVYD+TBwFg3E51PVgiQ9dwICnqKBJM0bQKfRQM65kTW+BnKfpulOElPe+4E13npitptEh3Qm59wYOAbOgVvgTtKFpBNgN4Sw1ZTPsmwPuLS1tgDYB64aRrv0DXC0mg8hbEuaSnor6myd2n4VclAp2NSHZV7SEFj8MKm2PyxB1y0h5mWRnaz5yPPinzmx4te2IMsUt9k406r4SzD5Dqr2rQfl//Lp1NUwaE19r+Q3egei5COvKQ3c5AAAAABJRU5ErkJggg==">
            </span>

            <h3 class="ml-5 flex text-xl font-medium text-gray-800">Unit Owners' Portal</h3>
          </div>

          <div class="pb-6 lg:pb-0 flex justify-center items-center">
            <div class="max-w-xs">
              <div class="text-sm font-light text-gray-600 mt-6">
                <p class=" mt-2">Unit Owners get access to their unit data, transaction history, and community updates
                </p>
              </div>
            </div>
          </div>
        </div>

        <div>
          <div class=" lg:py-0 flex items-center justify-start lg:justify-center">
            <span class="ml-0 lg:-ml-32 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB1UlEQVR4nK2WvUoDQRSFxx/8QSsT8AkUtbOyXJuEJHPusM2ARB8giWAn2MhWYmVhI/oCilaCtVqIMWopig9iElBBvXE2rEM22bh7YYqdGc43Z+bO3hHCBBGtEdE9gAYRfcVpABoAalLKVREMAEdxxSm8HQadcMcbgJLruikRM1zXTRFRmTWNwyK7qZmPkkg4AFSMiarwzySuk2w2O6WUko7jDAdAaQOqC38v40A8zxskomuj9QBgzh9r6ycBArBhJcBL4qB8Pj/LW2OB9hIFeb9bdmPdoVet9XiiIABblpMPpdRScE5sUKFQmCeipuVmx54XC8QpzNllQZ4dxxnrC6S1HpFSLvMZdAIB8CzIu1JqsdPcUBBDAFwYgdPgBeRgQRa2zmY7zH0oCMCxtdoTH5bL5UaJ6Mkaf7QXExV03uG333JGRLvWWFMptRAG6bV1k/bdMLArAJ9W32Y3SFcQRyaTmQj8u8JaVWs9FAsUAVaXUs70gkQCdYMBWI8CiQzqBANwKYQY6BvkFz4uUmGTTYLsAzgjoumokD+FD8Cd+ShHFegD1CrlAG4FP4kCj5NKN2d9ANIG0qpTSqmV1gA/iXqk8r8bgAN7FUW+G0k9IFmr7eQH8A1nqUVH99rSlwAAAABJRU5ErkJggg==">
            </span>
            <h3 class="ml-5 flex text-xl font-medium text-gray-800">General Assembly and Elections</h3>
          </div>

          <div class="pb-6 lg:pb-0 flex justify-center items-center">
            <div class="max-w-xs">
                <div class="text-sm font-light text-gray-600 mt-6">
                    <p class=" mt-2">Increase participation and reach quorum during General Assembly and Elections.
                </div>
            </div>
          </div>
        </div>

        <div>
          <div class="lg:-ml-16 lg:py-0 flex items-center justify-start lg:justify-center">
            <span class="ml-0 lg:-ml-32 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAABLUlEQVR4nLXVvUrEQBTF8fGjEAR9CUEttLRNIYGQnH9SSAoLfYpFBdE0IliKj2FhLdiJiNprIYKo4Bv4UUXCJrDoLjgh98CU4ce53Jk41zLAsqRHZ5kgCCYl3QEPphCwB5TAmRkSx/Ei8FlBkg7NRgbc1m3KJEk2TSBJuw1CH1qxQBaakTUnz/PZTpE8zyeAm0EEeHNdR9LOL6QELsxHVm/cSacjk3Q9pE056kh68YaALR+EPrTvhaRpOi/pwxN6CoJg6t9IURTjwGWLNni1kdTzRYBz5xvg1RP5AuZcV4miaGYEdOAM7tSfdQ7DcLpraHUItNYpUkMbps9QE2B7oMl39RN0FgGOB6AjE6SGTmvovdpAM0jSVQ2tmyFVgOfqaXLOjVlD91mWLbX5+AeJ+TGB4EIFgwAAAABJRU5ErkJggg==">
            </span>
            <h3 class="ml-5 flex text-xl font-medium text-gray-800">Utilities Billing</h3>
          </div>

          <div class="pb-6 lg:pb-0 flex justify-center items-center">
            <div class="max-w-xs">
                <div class="text-sm font-light text-gray-600 mt-6">
                    <p class=" mt-2">Make utilities billing with historical readings available online for review of owners or tenants.
                </div>
            </div>
          </div>
        </div>

        <div>
          <div class="lg:-ml-32 lg:py-0 flex items-center justify-start lg:justify-center">
            <span class="ml-0 lg:-ml-32 flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAACXBIWXMAAAsTAAALEwEAmpwYAAAA7UlEQVR4nO2VTQrCMBSEiz/ojdyZbaQzb5edqKteI+teUEVciPUYgvLQQinRxj+s4MBAGEg+Mi+QJPmGsizrh3JjzFAdm6u8953klkjuSGbGmF6ZiciI5BLAVkTGTbn3viMijuTqHuik1s0kFwByAMdKfrxmeShP03QGYF3mjaCqmw5HLa86BjQludFqtKJ6XXdy3TOPBula52StHcQ+AGvtwDnXrZ/TCHpF/INUoddUrTdUU7tBz4itBvE/o6TtM/o9kIikJA9R/8iDIF5cAJhoWER/WM+BTgD2QdC7DQXptT4JA7AnaV9tqX06A+RIqjpea3QvAAAAAElFTkSuQmCC">
            </span>
            <h3 class="ml-5 flex text-xl font-medium text-gray-800">Accounts Payable</h3>
          </div>

          <div class="pb-6 lg:pb-0 flex justify-center items-center">
            <div class="max-w-xs">
                <div class="text-sm font-light text-gray-600 mt-6">
                    <p class=" mt-2">Make approval for operating expenses and financial reporting a breeze with seamless financial management features. 
                </div>
            </div>
          </div>
        </div>

       

       

      </div>
    </div>
  </div>

  <!-- end feature section -->


    <!-- products -->
    <div class="bg-gray-900">
           
            <div
                id="" class="py-8 mx-auto max-w-4xl px-4 sm:px-6 lg:max-w-7xl lg:px-8 xl:grid xl:grid-flow-col-dense xl:grid-cols-2 xl:gap-x-8">
                <div class=" xl:col-span-2">

                    <p class="mt-6 text-2xl font-medium tracking-tight text-center text-white">See more of our products: </p>

                    <div class="mt-6 mx-auto grid grid-cols-1 gap-y-5 gap-x-6 sm:grid-cols-4">
                        
                        <div class="flex justify-center items-center border border-gray-500 hover:border-white">
                        <a href="/propsuite">
                         <img class="w-56 mt-0"
                                    src="{{ asset('/brands/landing/propsuite.png')}}"></a> 
                        </div>

                        <div class="flex justify-center items-center border border-gray-500 hover:border-white">
                        <a href="/propsuite-lite">
                         <img class="w-56 mt-0"
                                    src="{{ asset('/brands/landing/propsuite-lite.png')}}"></a> 
                        </div>

                        <div class="flex justify-center items-center border border-gray-500 hover:border-white">
                        <a href="/propsuite-daily">
                         <img class="w-56 mt-0"
                                    src="{{ asset('/brands/landing/propsuite-daily.png')}}"></a> 
                        </div>

                        <div class="flex justify-center items-center border border-gray-500 hover:border-white">
                        <a href="/propsuite-hoa">
                         <img class="w-56 mt-0"
                                    src="{{ asset('/brands/landing/propsuite-hoa.png')}}"></a> 
                        </div>

                        
                        

                    </div>

                    
                </div>
            </div>
        </div>


  <!-- guide section -->

  <div class="relative py-16 sm:py-24 lg:py-32" id="guide">
    <div class="relative">
      <div class="flex justify-center items-center">
        <h2 class="font-bold text-white text-3xl">Kickstarter Guide</h2>
      </div>
      <div class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-5 lg:px-8">

        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
          <div class="flex flex-1 flex-col justify-between bg-white p-6">

            <div class="flex-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
              </svg>

              <p class="mt-3">
              <p class="text-xs text-gray-900">Step 1:</p>
              </p>
              <a class="mt-2 block">
                <p class="text-lg font-semibold text-purple-900">Registration</p>
                <p class="mt-3 text-sm text-gray-500">To kickstart the procedure register your condominiums, apartments,
                  business spaces, residential units,
                  and dormitory rooms.</p>
              </a>

            </div>
          </div>
        </div>

        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
          <div class="flex flex-1 flex-col justify-between bg-white p-6">
            <div class="flex-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
              </svg>
              <p class="mt-3">
              <p class="text-xs text-gray-900">Step 2:</p>
              </p>
              <a class="mt-2 block">
                <p class="text-lg font-semibold text-purple-900">Property Details</p>
                <p class="mt-3 text-sm text-gray-500">Include all details of the property, room specifications, rent
                  details, deposit requirements, and other
                  related features of the property and rent.</p>
              </a>
            </div>
          </div>
        </div>

        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
          <div class="flex flex-1 flex-col justify-between bg-white p-6">
            <div class="flex-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
              </svg>
              <p class="mt-3">
              <p class="text-xs text-gray-900">Step 3:</p>
              </p>
              <a class="mt-2 block">
                <p class="text-lg font-semibold text-purple-900">Tenants’ Details.</p>
                <p class="mt-3 text-sm text-gray-500">Insert the tenant’s details like contact information, duration and
                  terms of the contract, and other
                  required information.</p>
              </a>
            </div>
          </div>
        </div>

        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
          <div class="flex flex-1 flex-col justify-between bg-white p-6">
            <div class="flex-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
              </svg>
              <p class="mt-3">
              <p class="text-xs text-gray-900">Step 4:</p>
              </p>
              <a class="mt-2 block">
                <p class="text-lg font-semibold text-purple-900">Supervision and Management</p>
                <p class="mt-3 text-sm text-gray-500">Portal provides you with an interface where you can supervise and
                  manage all concerns of tenants, job
                  creation, and assignments, supervision of such tasks and monitor them up to completion.</p>
              </a>
            </div>
          </div>
        </div>

        <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
          <div class="flex flex-1 flex-col justify-between bg-white p-6">
            <div class="flex-1">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
              </svg>
              <p class="mt-3">
              <p class="text-xs text-gray-900">Step 5:</p>
              </p>
              <a class="mt-2 block">
                <p class="text-lg font-semibold text-purple-900">Billing and Finance</p>
                <p class="mt-3 text-sm text-gray-500">Setup billing date, recurring charges, and recurring billing
                  amount property management system will
                  automate the billing system and intimate to tenant accordingly.</p>
              </a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
  <!-- end guide section -->


  

  <!-- contact us section -->

  <div id="contactus">
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


          <!-- partnered with section -->

          <x-partner></x-partner>
          <!-- end partnered with section -->

</x-landing-page-template>
