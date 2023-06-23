<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>PropRent</title>
</head>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
body {
    font-family: 'Quicksand';

}
</style>


<body>
  <div id="app">
    <main id="login-bg" class="h-full">
      <div class="bg-white py-28 sm:py-10">
        <div class=" mx-auto max-w-7xl px-6 lg:px-20">
          <div class="mx-auto max-w-2xl text-center">
            <h2 class="mt-10 text-3xl tracking-tight text-gray-900 sm:text-2xl">What <span class="font-bold">type</span>
              of account are you creating?</h2>
          </div>

          <div
            class="justify-items-center mt-16  grid sm:grid-cols-2 gap-y-10 gap-x-5 lg:mx-0 lg:max-w-7xl lg:grid-cols-2">

            <!-- home owner -->
  
       
       
              <a href="sign-up">
                <div class="border border-gray-200 shadow-lg relative">
                  <img src="{{ asset('/brands/proprent/tenant.png') }}" alt="" class="h-72 w-full object-cover">
                </div>
              
                <h3 class="mt-3 text-base font-semibold text-gray-900 group-hover:text-gray-600">
                  <span class="sr-only">Tenant</span>
         
                </h3>
              </a>
           
              <a href="sign-up">
                <div class="border border-gray-200 shadow-lg relative">
                  <img src="{{ asset('/brands/proprent/lessor.png') }}" alt="" class="h-72 w-full object-cover">
                </div>

                <h3 class="mt-3 text-base font-semibold text-gray-900 group-hover:text-gray-600">
                  <span class="sr-only">Owner</span>
           
                </h3>
              </a>
      

          </div>
        </div>
      </div>


  </div>
  </main>
  </div>
</body>

</html>