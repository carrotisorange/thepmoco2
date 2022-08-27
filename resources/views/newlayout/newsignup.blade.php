<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Sign up</title>
</head>

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
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-300s">
  <body class="h-full">
  ```
-->
<div class="min-h-full flex flex-col-2 justify-end sm:px-6 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-md">
  <img class="mt-10 h-20 w-auto" src="{{ asset('/brands/logo_text.png') }}">
  <img class="ml-10 h-auto w-auto py-20" src="{{ asset('/brands/signup_vector.png') }}">
  </div>
  
  <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
  <h2 class="mt-6 text-center text-3xl tracking-tight font-bold text-gray-900 mb-5">Create an Account</h2>
    <div class="bg-white py-5 px-4 shadow sm:rounded-lg sm:px-10">
    
      <form class="space-y-2" action="#" method="POST">

      <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-4">
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

        

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-500 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign in</button>
        </div>
      </form>
        
      </div>
    </div>
  </div>
</div>

</body>

</html>