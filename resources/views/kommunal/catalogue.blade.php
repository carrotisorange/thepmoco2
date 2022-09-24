<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Kommunal</title>
</head>
<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
-->
  <html>
  <body>

<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<div class="bg-white">
  <header>
    <div class="relative bg-white">
      <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-6 sm:px-6 md:justify-start md:space-x-10 lg:px-8">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <a href="#">
            <span class="sr-only">Your Company</span>
            <img class="h-8 w-auto sm:h-10" src="{{ asset('/brands/logo.png') }}" alt="pmo logo">
          </a>
        </div>
        <div class="-my-2 -mr-2 md:hidden">
          <button type="button" class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
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
            <button type="button" class="text-gray-500 group inline-flex items-center rounded-md bg-white text-base font-medium hover:text-gray-900 " aria-expanded="false">
              <span>Home</span>
              <!--
                Heroicon name: mini/chevron-down

                Item active: "text-gray-600", Item inactive: "text-gray-400"
              -->
              
            </button>

            <!--
              'Solutions' flyout menu, show/hide based on flyout menu state.

              Entering: "transition ease-out duration-200"
                From: "opacity-0 translate-y-1"
                To: "opacity-100 translate-y-0"
              Leaving: "transition ease-in duration-150"
                From: "opacity-100 translate-y-0"
                To: "opacity-0 translate-y-1"
            -->
            <div class="hidden absolute z-10 -ml-4 mt-3 w-screen max-w-md transform lg:left-1/2 lg:ml-0 lg:max-w-2xl lg:-translate-x-1/2">
              <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                  <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                    
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Inbox</p>
                      <p class="mt-1 text-sm text-gray-500">Get a better understanding of where your traffic is coming from.</p>
                    </div>
                  </a>

                  <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white sm:h-12 sm:w-12">
                      <!-- Heroicon name: outline/chat-bubble-bottom-center-text -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                      </svg>
                    </div>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Messaging</p>
                      <p class="mt-1 text-sm text-gray-500">Speak directly to your customers in a more meaningful way.</p>
                    </div>
                  </a>

                  <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white sm:h-12 sm:w-12">
                      <!-- Heroicon name: outline/chat-bubble-left-right -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                      </svg>
                    </div>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Live Chat</p>
                      <p class="mt-1 text-sm text-gray-500">Your customers&#039; data will be safe and secure.</p>
                    </div>
                  </a>

                  <a href="#" class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50">
                    <div class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-md bg-gradient-to-r from-purple-600 to-indigo-600 text-white sm:h-12 sm:w-12">
                      <!-- Heroicon name: outline/question-mark-circle -->
                      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                      </svg>
                    </div>
                    <div class="ml-4">
                      <p class="text-base font-medium text-gray-900">Knowledge Base</p>
                      <p class="mt-1 text-sm text-gray-500">Connect with third-party tools that you&#039;re already using.</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">About</a>
          <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">FAQ</a>
          <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Support</a>
          <a href="#" class="text-base font-medium text-gray-500 hover:text-gray-900">Blog</a>

        </nav>
        <div class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
        <a href="#" class="inline-flex items-center justify-center whitespace-nowrap rounded-full border border-transparent bg-origin-border bg-purple-500 px-4 py-1 text-base font-medium text-white shadow-sm hover:from-purple-700 hover:to-indigo-700">Sign up</a>
          <a href="newsignin" class="ml-8 whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900">Sign in</a>
          
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
      <div class="absolute inset-x-0 top-0 z-30 origin-top-right transform p-2 transition md:hidden">
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


  <div class=" flex" style= "background-image: url('/brands/build-stock.png');">
  <div class="flex-1 flex flex-col justify-center py-2 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-48">
    <div class="mx-auto w-full max-w-sm lg:w-96">
      
    <div class="text-4xl font-bold tracking-tight sm:text-5xl lg:text-5xl">
      <h2>Simplifying Rental Property Operations</h2>
      <p class="text-lg font-thin mt-10 ">Semper curabitur ullamcorper posuere nunc sed. Ornare iaculis bibendum malesuada faucibus lacinia porttitor. Pulvinar laoreet sagittis viverra duis. In venenatis sem arcu pretium pharetra at. Lectus viverra dui tellus ornare pharetra.</p>
</div>


      <div class="mt-5">
        <div>
          

          <div class="mt-6 relative">
            
          </div>
        </div>

        <div class="mt-6">
          <form action="#" method="POST" class="space-y-6">
            

            <div>
              <button type="submit" class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-purple-500 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Start Free Trial</button>
              
            </div>

          

          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="hidden lg:block relative w-0 flex-1 justify-center py-20">
    <svg xmlns="http://www.w3.org/2000/svg" width="452.553" height="472.429"><g fill="#f2f2f2"><path d="M182.775 380.824c-.844-1.424-4.497.1-5.168-1.192-.67-1.287 2.724-3.249 4.663-7.73.35-.808 2.553-5.9.922-7.471-3.092-2.979-17.24 9.312-22.19 5.29-1.087-.882-1.847-2.645-5.135-5.506-1.308-1.138-2.1-1.652-2.865-1.46-1.087.27-1.173 1.725-2.337 4.584-1.748 4.287-2.78 4.028-3.799 7.449-.755 2.539-.583 4.015-1.472 4.303-1.258.407-2.416-2.287-4.01-2.046-1.628.247-2.612 3.383-2.923 5.73-.583 4.407 1.035 7.314 1.932 10.371.975 3.322 1.553 8.375-.697 15.528l-22.278 62.766c4.919-12.88 19.159-48.186 25.143-61.305 1.727-3.788 3.634-7.63 7.55-9.146 3.771-1.46 8.95-.588 15.55-2.178.772-.186 2.911-.73 3.18-1.989.223-1.04-1.035-1.62-.842-2.595.26-1.307 2.734-1.323 5.776-2.831 2.144-1.064 3.48-2.328 4.629-3.416.346-.327 5.495-5.261 4.371-7.156Z"/><path d="M95.13 413.866c-.942.004-1.248 2.236-2.076 2.193-.825-.043-.809-2.274-2.448-4.519-.296-.405-2.16-2.955-3.402-2.608-2.353.658-.403 11.148-3.806 12.418-.746.278-1.83.142-4.183.931-.936.314-1.417.554-1.544.985-.18.611.508 1.073 1.575 2.47 1.6 2.094 1.175 2.526 2.56 4.013 1.029 1.103 1.803 1.445 1.688 1.964-.164.735-1.82.526-2.161 1.379-.349.87.906 2.257 1.969 3.087 1.994 1.557 3.888 1.602 5.647 2.044 1.912.48 4.559 1.654 7.42 4.823l24.378 29.043c-4.902-6.13-18.121-23.306-22.834-30.028-1.36-1.94-2.696-3.985-2.31-6.345.371-2.272 2.293-4.562 3.417-8.26.132-.433.482-1.64-.058-2.135-.446-.41-1.095.04-1.517-.335-.567-.505.14-1.724.277-3.652.097-1.36-.139-2.38-.34-3.257-.062-.265-.998-4.216-2.252-4.21ZM113.93 418.086l-.568-5.068.26-.384c1.2-1.777 1.811-3.512 1.819-5.159 0-.262-.011-.523-.024-.79-.049-1.057-.11-2.371.575-3.903.385-.854 1.464-2.832 3.086-2.587.437.061.768.262 1.018.497l.115-.181c.506-.771.906-1.102 1.291-1.42.296-.245.602-.497 1.082-1.094.21-.262.374-.492.513-.685.42-.585.968-1.282 1.934-1.27 1.033.049 1.574.903 1.932 1.468.64 1.009.93 1.735 1.122 2.217.07.177.15.375.19.436.333.49 3.038.032 4.057-.135 2.29-.381 4.27-.712 5.087.732.585 1.033.15 2.398-1.33 4.168-.461.55-.952.969-1.388 1.297.361.215.684.546.815 1.064.309 1.229-.747 2.46-3.137 3.664-.593.3-1.392.702-2.512.896a9.867 9.867 0 0 1-1.408.124c-.009.235-.064.49-.207.752-.42.77-1.294 1.138-2.61 1.05-1.449-.076-2.642-.353-3.694-.595-.92-.21-1.71-.39-2.332-.348-1.153.093-2.041 1.016-3.084 2.213l-2.602 3.041ZM116.563 387.91l-4.758 1.835-.438-.153c-2.023-.71-3.856-.862-5.451-.452-.254.066-.504.144-.759.223-1.01.316-2.266.708-3.921.434-.924-.155-3.11-.697-3.285-2.329a1.838 1.838 0 0 1 .222-1.11l-.204-.066c-.874-.293-1.295-.596-1.7-.889-.313-.224-.634-.456-1.333-.768-.307-.138-.571-.238-.793-.323-.672-.257-1.486-.61-1.72-1.549-.214-1.011.475-1.75.931-2.24a12.216 12.216 0 0 1 1.86-1.649c.153-.112.324-.24.373-.294.39-.446-.74-2.947-1.16-3.89-.95-2.118-1.771-3.95-.581-5.106.85-.828 2.281-.754 4.368.23.65.306 1.18.674 1.607 1.013.117-.404.354-.8.823-1.059 1.11-.61 2.568.1 4.34 2.106.44.497 1.032 1.169 1.503 2.203.221.487.363.94.478 1.33.23-.051.49-.062.779.01.852.21 1.429.962 1.677 2.258.295 1.42.33 2.645.362 3.724.03.942.058 1.753.256 2.344.382 1.091 1.5 1.717 2.922 2.422l3.602 1.745ZM113.93 372.98l-.568-5.069.26-.384c1.2-1.777 1.811-3.512 1.819-5.159 0-.261-.011-.523-.024-.79-.049-1.057-.11-2.371.575-3.903.385-.854 1.464-2.832 3.086-2.587.437.061.768.262 1.018.497l.115-.181c.506-.771.906-1.102 1.291-1.42.296-.244.602-.497 1.082-1.094.21-.261.374-.492.513-.685.42-.585.968-1.282 1.934-1.27 1.033.049 1.574.903 1.932 1.468.64 1.009.93 1.735 1.122 2.218.07.176.15.374.19.435.333.49 3.038.032 4.057-.134 2.29-.382 4.27-.713 5.087.731.585 1.033.15 2.398-1.33 4.168-.461.55-.952.969-1.388 1.297.361.215.684.546.815 1.064.309 1.229-.747 2.46-3.137 3.664-.593.3-1.392.702-2.512.896a9.867 9.867 0 0 1-1.408.124c-.009.235-.064.49-.207.752-.42.77-1.294 1.138-2.61 1.05-1.449-.076-2.642-.353-3.694-.595-.92-.21-1.71-.39-2.332-.348-1.153.093-2.041 1.016-3.084 2.213l-2.602 3.041Z"/><path d="m119.115 471.357-1.062-.665-.257-1.226.257 1.226-1.238.142c-.02-.115-.087-.38-.189-.793-.554-2.266-2.244-9.163-3.653-20.023a204.149 204.149 0 0 1-1.656-23.17c-.115-7.807.255-13.717.55-18.467.225-3.583.496-6.994.763-10.318.71-8.878 1.379-17.265.881-26.55-.11-2.072-.341-6.387-2.862-10.978-1.462-2.662-3.476-5.026-5.987-7.023l1.561-1.963c2.772 2.208 5 4.826 6.624 7.782 2.794 5.09 3.046 9.792 3.168 12.05.506 9.45-.17 17.917-.888 26.88-.264 3.312-.536 6.708-.758 10.276-.294 4.706-.66 10.565-.546 18.271.113 7.702.663 15.4 1.634 22.887 1.392 10.723 3.057 17.517 3.604 19.749.292 1.191.353 1.441.054 1.913Z"/><path d="M100.066 357.494c-.103 0-.207-.003-.312-.01-2.134-.115-4.11-1.393-5.874-3.796-.828-1.13-1.251-2.42-2.095-4.992-.131-.397-.768-2.408-1.154-5.176-.253-1.808-.222-2.565.137-3.233.398-.744 1.041-1.262 1.766-1.612a1.416 1.416 0 0 1 .097-.74c.427-1.044 1.563-.907 2.177-.841.311.039.699.09 1.117.068.659-.032 1.012-.227 1.548-.521.513-.282 1.15-.631 2.096-.825 1.865-.389 3.428.14 3.943.313 2.71.903 4.046 3.01 5.593 5.45.308.49 1.367 2.271 2.065 4.714.504 1.762.433 2.545.282 3.127-.309 1.197-1.037 1.882-2.886 3.394-1.93 1.584-2.9 2.377-3.732 2.859-1.937 1.118-3.153 1.82-4.768 1.82Z"/></g><path fill="#ffb6b6" d="m217.451 467.068 6.563-.001 3.121-25.312-9.685.001.001 25.312z"/><path d="M239.935 466.92c.204.343.312 1.454.312 1.854 0 1.23-.997 2.228-2.227 2.228h-20.323c-.84 0-1.52-.68-1.52-1.52v-.846s-1.005-2.543 1.065-5.677c0 0 2.572 2.454 6.416-1.39l1.134-2.054 8.205 6.001 4.549.56c.995.123 1.877-.019 2.389.843Z" fill="#2f2e41"/><path fill="#ffb6b6" d="m197.451 467.068 6.563-.001 3.121-25.312-9.685.001.001 25.312z"/><path d="M219.935 466.92c.204.343.312 1.454.312 1.854 0 1.23-.997 2.228-2.227 2.228h-20.323c-.84 0-1.52-.68-1.52-1.52v-.846s-1.005-2.543 1.065-5.677c0 0 2.572 2.454 6.416-1.39l1.134-2.054 8.205 6.001 4.549.56c.995.123 1.877-.019 2.389.843ZM225.032 357.755l7 27.107-3.5 69.61-16.5 1.104-1-40.071-2 41.25-17-3.536-1-90.75 34-4.714z" fill="#2f2e41"/><path d="M157.268 266.488c-2.258-3.963-6.134-6.01-8.656-4.573-2.522 1.438-2.735 5.816-.475 9.78a11.416 11.416 0 0 0 3.646 3.972l9.782 16.672 7.726-4.757-10.463-15.93c-.1-1.822-.635-3.592-1.56-5.164Z" fill="#ffb6b6"/><path d="M201.722 325.344s-9.27 12.777-14.94 8.211c-5.67-4.566-36.998-55.894-36.998-55.894l12.432-6.663 39.506 54.346Z" fill="#6c63ff"/><path fill="#ffb6b6" d="m193.032 309.755 12-18 12 5-3 16-21-3z"/><path fill="#6c63ff" d="m194.032 305.755 21-1 14 4 3 74-42-4v-39.024l-6-19.976 10-14z"/><path d="M228.69 355.671a16.386 16.386 0 0 1-.842-6.692c.537-6.398.639-18.934-5.883-24.597l-3.683-3.99c-.077-.084-.163-.155-.241-.236l6.094-14.325-3.681-1.566-5.657 13.297a16.15 16.15 0 0 0-8.396-2.373c-3.458 0-6.763 1.128-9.493 3.113l-3.45-12.64-3.86 1.054 4.314 14.415c-.157.19-.328.367-.477.566l-2.107 2.829a16.487 16.487 0 0 1-1.693 1.929c-1.294 1.267-3.818 4.343-3.842 9.079-.008 1.62-.341 3.221-.835 4.764l-2.505 7.828c-.235.735-.42 1.483-.545 2.244-1.104 6.704-4.927 38.283 21.201 37.651 24.357-.59 25.96-15.42 25.818-20.346-.03-1.069.065-2.13.265-3.18.365-1.927.694-5.336-.502-8.824Z" fill="#3f3d56"/><path fill="#ffb6b6" d="m338.723 36.017 2.278 35.166-28.641 6.572 1.995-28.434 24.368-13.304zM340.904 463.408l-12.91-.001-6.142-49.796 19.054.001-.002 49.796z"/><path d="M296.673 463.115c-.402.677-.614 2.862-.614 3.65a4.382 4.382 0 0 0 4.381 4.381h39.98a2.99 2.99 0 0 0 2.99-2.99v-1.664s1.978-5.002-2.094-11.169c0 0-5.061 4.829-12.623-2.734l-2.23-4.04-16.143 11.806-8.947 1.102c-1.958.24-3.693-.038-4.7 1.658Z" fill="#2f2e41"/><path fill="#ffb6b6" d="m375.904 463.408-12.91-.001-6.142-49.796 19.054.001-.002 49.796z"/><path d="M331.673 463.115c-.402.677-.614 2.862-.614 3.65a4.382 4.382 0 0 0 4.381 4.381h39.98a2.99 2.99 0 0 0 2.99-2.99v-1.664s1.978-5.002-2.094-11.169c0 0-5.061 4.829-12.623-2.734l-2.23-4.04-16.143 11.806-8.947 1.102c-1.958.24-3.693-.038-4.7 1.658ZM384.032 226.755s11 14 9 22-16 192-16 192l-20-1-12-165-3.086 166-18.914-1-24-206 85-7Z" fill="#2f2e41"/><path d="M268.405 271.394c-1.891 7.248-7.164 12.147-11.776 10.943s-6.818-8.055-4.925-15.306a18.746 18.746 0 0 1 4.089-7.853l8.4-30.609 14.28 4.248-9.797 29.724c.618 2.93.525 5.966-.271 8.853Z" fill="#ffb6b6"/><circle cx="315.458" cy="36.626" r="28.574" fill="#ffb6b6"/><path fill="#e6e6e6" d="m312.032 72.755 30-6 33 17 7 109 9 41-93 1 4-55-6-87 16-20z"/><path d="M305.032 95.755s-16-5-22 4-17 90-17 90l-11 61 20 3 33-107-3-51Z" fill="#e6e6e6"/><path d="M450.565 236.336c3.26 6.744 2.423 13.892-1.87 15.966s-10.412-1.711-13.673-8.458a18.746 18.746 0 0 1-1.979-8.63l-13.452-28.75 13.626-6.024 11.814 28.981c2.37 1.83 4.268 4.2 5.534 6.915Z" fill="#ffb6b6"/><path d="M362.508 84.791s14.369-8.633 22.323-1.302c7.953 7.33 37.75 83.45 37.75 83.45l25.08 56.683-18.728 7.634-57.31-96.196-9.115-50.268Z" fill="#e6e6e6"/><path d="M431.67 471.24c0 .66-.53 1.19-1.19 1.19H1.19c-.66 0-1.19-.53-1.19-1.19 0-.32.12-.6.32-.81h89.72c1.91 0 3.78-.13 5.62-.38h334.82c.66 0 1.19.53 1.19 1.19Z" fill="#3f3d56"/><path d="M255.902 274.545c1.785-4.198 5.398-6.68 8.07-5.544 2.67 1.136 3.39 5.46 1.603 9.659a11.416 11.416 0 0 1-3.162 4.367l-7.786 17.692-8.225-3.83 8.55-17.035c-.112-1.82.214-3.64.95-5.31Z" fill="#ffb6b6"/><circle cx="203.899" cy="286.652" r="18.393" fill="#ffb6b6"/><path fill="#6c63ff" d="m227.032 308.755 18-7 6-21 13 5-10 30-27 10.315v-17.315z"/><path d="m201.48 307.103 10.97-8.926s-1.038-13.376 2.905-14.579 8.056-6.008 8.056-6.008-6.527-14.744-18.016-12.507c-11.488 2.237-8.867-1.166-15.947 2.583-7.08 3.75-8.74 8.753-7.88 14.069.862 5.316-1.702 18.523 6.874 19.203s13.038 6.165 13.038 6.165ZM298.152 43.023c-2.086-3.803-1.003-5.618-2.884-7.105 0 0-.757-.598-6.457-1.36-.544-9.325-2.055-10.571-2.055-10.572-1.74-1.436-4.51-1.236-6.275-.583-3.733 1.38-3.604 5.015-6.083 5.51-3.424.685 5.912-5.17 5.803-11.362-.09-5.052 3.53-9.662 4.79-9.303 1.25.357 4.6-3.282 6.237-3.09 1.118.13 5.858-1.495 7.078-1.241 1.332.277 5.585 2.948 5.812 2.433 1.579-3.574 1.283-4.624 2.457-5.589 2.081-1.709 5.138-.159 10.04.934C326.704 3.944 328.754.722 333.8 3.42c2.549 1.363 4.51 4.646 8.33 11.156 5.342 9.104 8.013 13.656 7.63 18.686-.39 5.13-2.847 4.606-4.544 12.11-1.89 8.354.382 12.424-2.656 14.944-2.348 1.948-21.816 2.098-23.993.05-3.728-3.506 2.099-10.784-1.86-16.757-2.43-3.666-7.747-5.636-10.376-4.13-2.972 1.704-1.872 7.488-3.896 7.866-1.734.325-3.919-3.66-4.282-4.322Z" fill="#2f2e41"/><g><path d="M159.66 275.482c3.98-3.363 2.924-11.159-2.36-17.414-2.313-2.738-5.053-4.726-7.737-5.815l-3.084-3.56-39.826-49.901s-22.056-49.642-28.566-55.005c-6.51-5.363-14.17-2.57-14.17-2.57l-5.978 7.394 37.244 69.312 38.116 38.359 5.145 5.364c.626 2.828 2.128 5.861 4.442 8.599 5.284 6.255 12.794 8.6 16.774 5.237Z" fill="#ffb6b6"/><path fill="#e6e6e6" d="m84.482 153.017 9.98 14.638 14.328 21.205-25.745 8.906-22.731-39.004 24.168-5.745z"/><path d="m94.615 103.201-7.229 27.559-27.558-5.422S70.67 105.46 67.96 96.424l26.655 6.777ZM65.523 461.928l16.596-.001 7.894-64.013-24.493.002.003 64.012z" fill="#ffb6b6"/><path d="M122.382 461.552c.516.87.79 3.679.79 4.69a5.633 5.633 0 0 1-5.633 5.633H66.144a3.843 3.843 0 0 1-3.843-3.842v-2.14s-2.542-6.43 2.692-14.357c0 0 6.506 6.206 16.227-3.515l2.867-5.193 20.75 15.176 11.503 1.416c2.516.31 4.747-.048 6.042 2.132ZM111.603 276.676 88.735 432.29h-28.69l3.814-88.828 2.008-46.707-5.823-22.232s-2.655-4.942-4.891-10.932c-2.521-6.76-4.512-14.864-1.556-18.707 1.087-1.417 3.915-2.466 7.758-3.246 2.348-.48 5.081-.854 8.032-1.144 16.967-1.679 41.1-.63 41.1-.63l.614 20.246.34 11.306.162 5.26Z" fill="#2f2e41"/><path fill="#ffb6b6" d="m36.29 454.318 16.419 2.412 17.122-62.183-24.234-3.561-9.307 63.332z"/><path d="M92.598 462.216c.385.936.246 3.755.099 4.756a5.633 5.633 0 0 1-6.392 4.753l-50.848-7.476a3.843 3.843 0 0 1-3.243-4.36l.311-2.117s-1.58-6.732 4.752-13.813c0 0 5.534 7.087 16.566-1.117l3.591-4.721 18.323 18.033 11.174 3.074c2.444.672 4.703.643 5.667 2.988ZM111.963 250.724l-3.136 27.012-17.105 56.922-28.159 93.712-28.382-4.17 25.473-133.246-2.522-22.848s-.822-2.271-1.763-5.596c-1.87-6.578-4.213-17.29-1.634-22.754.348-.743.785-1.388 1.326-1.91 1.014-.983 3.076-1.58 5.838-1.897 11.544-1.305 35.32 2.427 45.9 4.259l4.164 10.516Z" fill="#2f2e41"/><path d="m90.097 122.628 31.173 39.305-5.596 40.978-4.795 41.697-56.472-8.584s12.198-29.365 13.553-30.72 4.76 1.991 2.38-2.393-5.09-4.384-2.832-6.643-17.62-31.625-17.62-47.437c0-15.812 9.488-28.462 9.488-28.462l30.721 2.259Z" fill="#e6e6e6"/><circle cx="82.824" cy="87.406" r="21" fill="#ffb6b6"/><path d="M81.843 127.556s3.142-24.863 3.698-32.094c.556-7.23 10.763-18.52 10.763-18.52l7.23 5.84s6.118 0 1.947-8.898c-4.172-8.9-11.958-10.29-11.958-10.29s-.835-11.68-15.296-10.29c-14.46 1.39-20.857 13.071-20.857 13.071s-.834-14.74-10.011-3.893c-9.178 10.845-14.461 15.295-4.728 18.91 9.733 3.616 16.964.835 16.964.835s-9.455 1.946-7.787 8.62c1.669 6.675-21.97 36.988-11.124 40.325 10.846 3.337 35.04 11.402 37.821 6.118 2.781-5.284 3.338-9.734 3.338-9.734Z" fill="#2f2e41"/><path d="M168.407 277.564c4.009-3.329 3.017-11.134-2.214-17.433-2.29-2.757-5.013-4.768-7.687-5.88l-3.055-3.584-39.407-50.234S94.406 150.608 87.94 145.19c-6.465-5.418-14.148-2.69-14.148-2.69l-6.039 7.344 36.662 69.622 37.793 38.677 5.1 5.408c.602 2.832 2.079 5.878 4.37 8.635 5.23 6.3 12.72 8.707 16.73 5.377Z" fill="#ffb6b6"/><path d="M65.466 138.64s9.647 50.06 20.624 57.44l21.875-17.056s1.915-.083-1.648-4.107c-3.563-4.025-2.65-12.667-2.65-12.667s1.602 2.074-1.886-.805c-3.488-2.88-.24-22.682-.24-22.682l-36.075-.124Z" fill="#e6e6e6"/></g><path d="M224.793 345.18a1 1 0 0 1-.977-.789l-1.1-5.108a16.925 16.925 0 0 0-15.783-13.34c-7.112-.319-13.703 3.894-16.404 10.478l-2.759 6.725a1 1 0 1 1-1.85-.759l2.76-6.725c3.02-7.363 10.383-12.065 18.343-11.717a18.926 18.926 0 0 1 17.648 14.917l1.1 5.108a1 1 0 0 1-.978 1.21ZM225.973 361.444c-.03 0-.06-.001-.09-.004l-37.004-3.3a1 1 0 0 1 .177-1.992l37.005 3.3a1 1 0 0 1-.088 1.996Z" fill="#ffb6b6"/></svg>
  </div>
</div>
    
</div>
</div>
</div>
    


<!-- This is an example component -->
<div class="relative bg-purple-50 py-5 sm:py-24 lg:py-32" >
        <div class="relative">
          <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-screen lg:px-8">

	<div id="default-carousel" class="relative" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="overflow-hidden relative rounded-lg h-screen sm:h-fit md:h-fit 2xl:h-fit">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <h2 class="mb-20 text-3xl font-bold tracking-tight text-gray-900">Manage All Your Properties in One Unified System</h2>
                
                <img src="{{ asset('/brands/car.png') }}" class="block absolute w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <h2 class="mb-20 text-3xl font-bold tracking-tight text-gray-900">A property dashboard to oversee all your processes!</h2>
            <img src="{{ asset('/brands/car.png') }}" class="block absolute  w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <h2 class="mb-20 text-3xl font-bold tracking-tight text-gray-900">Easily collaborate and align your goals with your team!</h2>
            <img src="{{ asset('/brands/car.png') }}" class="block absolute  w-full -translate-x-1/2 -translate-y-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="bg-black w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="bg-black w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="bg-black w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-8 h-8 text-black sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                <span class="hidden">Previous</span>
            </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-8 h-8 text-black sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                <span class="hidden">Next</span>
            </span>
        </button>
    </div>
    </section>
</div>
</div>
</div>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</div>


    

    <!-- Gradient Feature Section -->
    <div class="bg-gradient-to-r from-purple-700 to-gray-500">
      <div class="mx-auto max-w-4xl px-4 py-16 sm:px-6 sm:pt-20 sm:pb-24 lg:max-w-7xl lg:px-8 lg:pt-24">
        
       

        <div class="mt-12 grid grid-cols-1 gap-x-6 gap-y-12 sm:grid-cols-2 lg:mt-16 lg:grid-cols-3 lg:gap-x-16 lg:gap-y-16">
          <div>
            
            <div class="flex items-center justify-center">
              <span class="h-12 w-12 flex items-center justify-center rounded-md bg-white bg-opacity-10">
                <!-- Heroicon name: outline/inbox -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth=1.5 stroke="currentColor">
  <path strokeLinecap="round" strokeLinejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
</svg>

              </span>
            </div>
            <div class="mt-6">
              <h3 class="text-center text-lg font-medium text-white">Bulk Billing</h3>
              <p class="text-center mt-2 text-base text-purple-200">Simplifies the process of billing by providing a way to conveniently add, send recurring bills to tenant/owner in a few clicks, and export ready-to-print statements.</p>
            </div>
          </div>

          <div>
          <div class="flex items-center justify-center">
              <span class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                <!-- Heroicon name: outline/users -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
</svg>

              </span>
            </div>
            <div class="mt-6">
              <h3 class="text-center text-lg font-medium text-white">Payment Solutions</h3>
              <p class="text-center mt-2 text-base text-purple-200">Receives payments from the tenants and sends remittances to unit owners.</p>
            </div>
          </div>

          <div>
            <div class="flex items-center justify-center">
              <span class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                <!-- Heroicon name: outline/trash -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                </svg>
              </span>
            </div>
            <div class="mt-6">
              <h3 class="text-center text-lg font-medium text-white">Team Monitoring</h3>
              <p class="text-center mt-2 text-base text-purple-200">Assigns a role to each employee and manages them virtually.</p>
            </div>
          </div>

          <div>
          <div class="flex items-center justify-center">
              <span class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                <!-- Heroicon name: outline/pencil-square -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
              </span>
            </div>
            <div class="mt-6">
              <h3 class="text-center text-lg font-medium text-white">Tenant/Owner Portal</h3>
              <p class="text-center mt-2 text-base text-purple-200">Provides convenient access to both tenants and owners to view their contracts, bills, payments, and file concerns.</p>
            </div>
          </div>

          <div>
          <div class="flex items-center justify-center">
              <span class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                <!-- Heroicon name: outline/document-chart-bar -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25M9 16.5v.75m3-3v3M15 12v5.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
              </span>
            </div>
            <div class="mt-6">
              <h3 class="text-center text-lg font-medium text-white">Real-time Statistics & Reports</h3>
              <p class="text-center mt-2 text-base text-purple-200">Offers a hassle-free way to monitor property performance through different charts and visuals and downloadable reports.</p>
            </div>
          </div>

          <div>
          <div class="flex items-center justify-center">
              <span class="flex h-12 w-12 items-center justify-center rounded-md bg-white bg-opacity-10">
                <!-- Heroicon name: outline/arrow-uturn-left -->
                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75a4.5 4.5 0 01-4.884 4.484c-1.076-.091-2.264.071-2.95.904l-7.152 8.684a2.548 2.548 0 11-3.586-3.586l8.684-7.152c.833-.686.995-1.874.904-2.95a4.5 4.5 0 016.336-4.486l-3.276 3.276a3.004 3.004 0 002.25 2.25l3.276-3.276c.256.565.398 1.192.398 1.852z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.867 19.125h.008v.008h-.008v-.008z" />
</svg>

              </span>
            </div>
            <div class="mt-6">
              <h3 class="text-center text-lg font-medium text-white">24/7 Customer Support</h3>
              <p class="text-center mt-2 text-base text-purple-200">Assigns a dedicated team to assist customers in boarding and setting up their property.</p>
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
<div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32" >
        <div class="relative">
          <div class="mx-auto max-w-md px-4 text-center sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Quick Start Guide</p>
           
          </div>

          <div class="mx-auto mt-12 grid max-w-md gap-8 px-4 sm:max-w-lg sm:px-6 lg:max-w-7xl lg:grid-cols-5 lg:px-8">
            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
                <img class="h-20  object-cover mb-5" src="{{ asset('/brands/registered.png') }}" alt="">
</div>
              </div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                  <p class="text-sm font-medium text-cyan-600">
                    <a href="#" class="hover:underline">Step 1:</a>
                  </p>
                  <a href="#" class="mt-2 block">
                    <p class="text-xl font-semibold text-gray-900">Register your property</p>
                    <p class="mt-3 text-base text-gray-500">Register your dorm, apartments, commercial spaces, residential units, condominums.</p>
                  </a>
                </div>

</div>
</div>

                

            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
                <img class="h-20  object-cover mb-5" src="{{ asset('/brands/room.png') }}" alt="">
</div>
              </div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                  <p class="text-sm font-medium text-cyan-600">
                    <a href="#" class="hover:underline">Step 2:</a>
                  </p>
                  <a href="#" class="mt-2 block">
                    <p class="text-xl font-semibold text-gray-900">Add the units, rooms, or bed spaces</p>
                    <p class="mt-3 text-base text-gray-500">Set up the monthly rent, deposit requirements, room features, and more.</p>
                  </a>
                </div>
</div>
</div>
                
            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
                <img class="h-20  object-cover mb-5" src="{{ asset('/brands/tenants.png') }}" alt="">
</div>
              </div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                  <p class="text-sm font-medium text-cyan-600">
                    <a href="#" class="hover:underline">Step 3:</a>
                  </p>
                  <a href="#" class="mt-2 block">
                    <p class="text-xl font-semibold text-gray-900">Add your tenants</p>
                    <p class="mt-3 text-base text-gray-500">Input your tenants' names, contact details, contract period, and other necessary info.</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
              <img class="h-20  object-cover mb-5" src="{{ asset('/brands/management.png') }}" alt="">
              </div>
</div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                  <p class="text-sm font-medium text-cyan-600">
                    <a href="#" class="hover:underline">Step 4:</a>
                  </p>
                  <a href="#" class="mt-2 block">
                    <p class="text-xl font-semibold text-gray-900">Manage your tenants</p>
                    <p class="mt-3 text-base text-gray-500">Here you can address their concerns and requests, create job orders, assign jobs, and monitor up to completion</p>
                  </a>
                </div>
              </div>
            </div>

            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
              <div class="flex-shrink-0">
              <div class="flex items-center justify-center">
              <img class="h-20 object-cover mb-5" src="{{ asset('/brands/bill.png') }}" alt="">
              </div>
</div>
              <div class="flex flex-1 flex-col justify-between bg-white p-6">
                <div class="flex-1">
                  <p class="text-sm font-medium text-cyan-600">
                    <a href="#" class="hover:underline">Step 5:</a>
                  </p>
                  <a href="#" class="mt-2 block">
                    <p class="text-xl font-semibold text-gray-900">Bill your tenants, collect rent & utilities</p>
                    <p class="mt-3 text-base text-gray-500">Automate billing for recurring charges. Set your billing date, and recurring bill amount, and tenants will be notified on the bill date.</p>
                  </a>
                </div>
              </div>
            </div>

            
          </div>
        </div>

        
      </div>
     
      <div class="relative overflow-hidden pt-16 pb-32 bg-gray-50">
      <div aria-hidden="true" class="absolute inset-x-0 top-0 h-48 bg-gradient-to-b from-purple-50"></div>
      <div class="relative">
        <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-2 lg:gap-24 lg:px-8">
          <div class="mx-auto max-w-xl px-4 sm:px-6 lg:mx-0 lg:max-w-none lg:py-16 lg:px-0">
           
            
            <div class="mt-8 border-t border-gray-200 pt-6">
            <span class="sr-only"> out of 5 stars</span>
            </p>
            <div class="ml-1 flex items-center mb-5">
              <!--
                Heroicon name: mini/star

                Active: "text-yellow-400", Inactive: "text-gray-200"
              -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>

              <!-- Heroicon name: mini/star -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>

              <!-- Heroicon name: mini/star -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>

              <!-- Heroicon name: mini/star -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>

              <!-- Heroicon name: mini/star -->
              <svg class="text-yellow-400 h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd" />
              </svg>
            </div>
              <blockquote>
                <div>
                  <p class="text-base text-gray-500">&ldquo;It makes my life less stressful because the application provides an easy way for tenants to report concerns, and as I resolve the concern, it provides an option for them to monitor its status in real-time.&rdquo;</p>
                </div>
                <footer class="mt-3">
                  <div class="flex items-center space-x-3">
                    
                    <div class="flex-shrink-0">
                      <img class="h-6 w-6 rounded-full" src="{{ asset('/brands/user.png') }}"alt="">
                    </div>
                    
                    <div class="text-base font-medium text-gray-700">Kate, Admin at North Cambridge Condominium</div>
                  </div>
                </footer>
              </blockquote>
            </div>
          </div>
</div>
</div>
</div>
</div>

    <!-- CTA Section -->
   <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
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
          <p class="mt-6 max-w-3xl text-base text-indigo-50">Asian Institute of Management - Dado Banatao Incubator Benavidez Street, corner Trasierra, Legazpi Village, Makati, 1229 Metro Manila</p>
          <dl class="mt-8 space-y-6">
            <dt><span class="sr-only">Phone number</span></dt>
            <dd class="flex text-base text-indigo-50">
              <!-- Heroicon name: outline/phone -->
              <svg class="h-6 w-6 flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
              <span class="ml-3">(+63) 916 779 9750</span>
            </dd>
            <dt><span class="sr-only">Email</span></dt>
            <dd class="flex text-base text-indigo-50">
              <!-- Heroicon name: outline/envelope -->
              <svg class="h-6 w- flex-shrink-0 text-indigo-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
              <span class="ml-3">support@workcation.com</span>
            </dd>
          </dl>
          <ul role="list" class="mt-8 flex space-x-12">
            <li>
              <a class="text-indigo-200 hover:text-indigo-100" href="#">
                <span class="sr-only">Facebook</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" aria-hidden="true">
                  <path d="M22.258 1H2.242C1.556 1 1 1.556 1 2.242v20.016c0 .686.556 1.242 1.242 1.242h10.776v-8.713h-2.932V11.39h2.932V8.887c0-2.906 1.775-4.489 4.367-4.489 1.242 0 2.31.093 2.62.134v3.037l-1.797.001c-1.41 0-1.683.67-1.683 1.653v2.168h3.362l-.438 3.396h-2.924V23.5h5.733c.686 0 1.242-.556 1.242-1.242V2.242C23.5 1.556 22.944 1 22.258 1" fill="currentColor" />
                </svg>
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
                <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="bg-purple-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>
              <label for="last-name" class="block text-sm font-medium text-gray-900">Last name</label>
              <div class="mt-1">
                <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="bg-purple-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>
              <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
              <div class="mt-1">
                <input id="email" name="email" type="email" autocomplete="email" class="bg-purple-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
              </div>
            </div>
            <div>
              
            <div class="flex justify-between">
                <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
              </div>
              <div class="mt-1">
                <textarea id="message" name="message" rows="1" class="bg-purple-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" aria-describedby="message-max"></textarea>
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
              <button type="submit" class="mt-2 inline-flex w-full items-center justify-center rounded-full border border-transparent bg-purple-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Send</button>
            </div>
          </form>
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
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Plans and Pricing</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Quick Start Guide</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">About The PMO</a>
                </li>

                
              </ul>
            </div>
            </div>

            <div class="md:grid md:grid-cols-1 md:gap-8">
              
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">FAQ</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Support</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Blogs</a>
                </li>

                
              </ul>
            </div>
          
          <div class="md:grid md:grid-cols-1 md:gap-8">
            <div>
              
              <ul role="list" class="mt-4 space-y-4">
                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Acceptable Use</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Privacy Policy</a>
                </li>

                <li>
                  <a href="#" class="text-base text-gray-500 hover:text-gray-900">Terms & Conditions</a>
                </li>

               

              
              </ul>
            </div>
            
          </div>
        </div>
        
      </div>
      <div class="mt-12 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between lg:mt-16">
        <div class="flex space-x-6 md:order-2">
          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Facebook</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
            </svg>
          </a>

          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
            </svg>
          </a>

          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Twitter</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
            </svg>
          </a>

          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">GitHub</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
            </svg>
          </a>

          <a href="#" class="text-gray-400 hover:text-gray-500">
            <span class="sr-only">Dribbble</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
        <p class="mt-8 text-base text-gray-400 md:order-1 md:mt-0">&copy; 2022 The PMO Co. All rights reserved.</p>
      </div>
    </div>
  </footer>
</div>


</body>



</html>