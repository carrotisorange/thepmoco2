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
  <div class="flex-1 flex flex-col justify-center py-2 px-4 sm:px-6 lg:flex-none lg:px-10 xl:px-24">
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
        <form class="space-y-2" action="#" method="POST">
  
      <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-4">
      <div class="sm:col-span-2">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">First Name </label>
          <div class="mt-1">
            <input id="name" name="name" type="name"  required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
          </div>
        </div>
        
        <div class="sm:col-span-2">
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Last Name </label>
          <div class="mt-1">
            <input id="name" name="name" type="name"  required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
          </div>
        </div>
</div>



        <div>
          <label for="username" class="block text-sm font-medium text-gray-700"> Username</label>
          <div class="mt-1">
            <input id="username" name="username" type="username" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium text-gray-700"> Email </label>
          <div class="mt-1">
            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="mobile" class="block text-sm font-medium text-gray-700"> Mobile </label>
          <div class="mt-1">
            <input id="mobile" name="mobile" type="mobile" autocomplete="mobile" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
          <div class="mt-1">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700"> Confirm Password </label>
          <div class="mt-1">
            <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          </div>
        </div>

        
        <div class="text-sm text-center">
                By clicking the sign up below, you agree to the <a href="terms" class="font-medium text-indigo-600 hover:text-indigo-500">Terms & Conditions</a> and <a href="privacy" class="font-medium text-indigo-600 hover:text-indigo-500">Privacy Policy</a>
              </div>


        <div>
          <button type="submit" class="mt-5 w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-700 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Sign up</button>
        </div>

          </form>

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


