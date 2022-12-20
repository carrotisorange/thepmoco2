<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>Kommunal.ph</title>
</head>
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<style>
body {
    font-family: 'Poppins';
}
</style>
  <html>
  <body>

  <div class="min-h-screen flex">
  <div class="flex-1 flex flex-col justify-center py-2 px-4 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
    <div class="mx-auto w-full max-w-sm lg:w-96">
      
      <div>
        
        <h2 class="mb-10 text-center mt-2 text-2xl tracking-tight font-semibold text-gray-700">Create an account</h2>

      </div>

      <div class="mt-5">
        <div>
          

          <div class="mt-6 relative">
            
          </div>
        </div>

        <div class="mt-6">
        <div class="flex flex-row justify-center  min-w-screen">
    <div class="flex-none p-2">
        <button onclick="showDropdownOptions()" class="flex flex-row justify-between w-96 px-2 py-2 text-gray-700 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:border-green-600">
            <span class="select-none">Select</span>

            <svg id="arrow-down" class="hidden w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
            <svg id="arrow-up" class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" /></svg>
        </button>
        <div id="options" class="hidden w-96 py-2 mt-2 bg-white rounded-lg shadow-xl">
            <a href="owner-signup" class="block px-4 py-2 text-gray-800 hover:bg-green-500 hover:text-white">Owner</a>
            <a href="tenant-signup" class="block px-4 py-2 text-gray-800 hover:bg-green-500 hover:text-white">Tenant</a>
        </div>
    </div>
</div>
<script>
    function showDropdownOptions() {
        document.getElementById("options").classList.toggle("hidden");
        document.getElementById("arrow-up").classList.toggle("hidden");
        document.getElementById("arrow-down").classList.toggle("hidden");
    }
</script>

<p class="text-center mt-2 text-sm tracking-tight font-medium text-gray-700">Already have an account?<a href="sigin" class="font-bold text-green-900"> Sign in</a></p>

        </div>
      </div>
    </div>
  </div>
  <div class="hidden lg:block relative w-0 flex-1">
    <img class="absolute h-full w-full object-cover" src="{{ asset('/brands/catalogue/signin-kommunal.png') }}" alt="">
    
  </div>
</div>

  


</body>



</html>


