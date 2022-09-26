<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feature Checkout</title>
    <link href="https://unpkg.com/tailwindcss@^2.2.7/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

  <html class="h-full bg-gray-white">
  <body class="h-full overflow-y">




  
<div class="flex h-full flex-col">

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
  <!-- Background color split screen for large screens -->
  <div class="fixed top-0 left-0 hidden h-full w-1/2 bg-white lg:block" aria-hidden="true"></div>
  <div class="fixed top-0 right-0 hidden h-full w-1/2 bg-purple-900 lg:block" aria-hidden="true"></div>

  <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-x-16 lg:grid-cols-2 lg:px-8 lg:pt-16">
    <h1 class="sr-only">Checkout</h1>

    <section aria-labelledby="summary-heading" class="bg-purple-900 py-12 text-indigo-300 md:px-10 lg:col-start-2 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:bg-transparent lg:px-0 lg:pt-0 lg:pb-24">
      <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
        <h2 id="summary-heading" class="sr-only">Order summary</h2>

        <dl>
          <dt class="text-sm font-medium">Total</dt>
          <dd class="mt-1 text-3xl font-bold tracking-tight text-white">₱605.00</dd>
        </dl>

        <ul role="list" class="divide-y divide-white divide-opacity-10 text-sm font-medium">

          <li class="flex items-start space-x-4 py-6">
            
            <div class="flex-auto space-y-1">
              <h3 class="text-white">Contract Feature</h3>
            </div>
            <p class="flex-none text-base font-medium text-white">₱300.00</p>

            
          </li>
          <li class="flex items-start space-x-4 py-6">
            
            <div class="flex-auto space-y-1">
              <h3 class="text-white">Concern Feature</h3>
            </div>
            <p class="flex-none text-base font-medium text-white">₱300.00</p>

            
          </li>

          

          <!-- More products... -->
        </ul>

        <dl class="space-y-6 border-t border-white border-opacity-10 pt-6 text-sm font-medium">
          <div class="flex items-center justify-between">
            <dt>Subtotal</dt>
            <dd>₱600.00</dd>
          </div>

       

          <div class="flex items-center justify-between">
            <dt>Fees</dt>
            <dd>₱5.00</dd>
          </div>

          <div class="flex items-center justify-between border-t border-white border-opacity-10 pt-6 text-white">
            <dt class="text-base">Total</dt>
            <dd class="text-base">₱605.00</dd>
          </div>
        </dl>
      </div>
    </section>

    

    <section aria-labelledby="payment-and-shipping-heading" class="py-16 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:pt-0 lg:pb-24">
      <h2 id="payment-and-shipping-heading" class="sr-only">Payment and shipping details</h2>

     
                  

      <form>
       

          <div class="px-10 mt-10">
            <h3 class="text-lg font-medium text-gray-900">Select and Unlock Features:</h3>
            <p class="mt-3 text-sm "><span class="font-bold text-sm text-red-900">note:</span>  You can <span class="font-semibold">cancel</span> subscription to this feature <span class="font-semibold">anytime!</span>
            
           Cancellation will only be applied on  <span class="font-semibold">next billing date.</span></p>

            <div class="px-5 mt-6">

            <div class="mt-5 flex items-center justify-between">
            <dt><input type="checkbox" class="mr-3">Contract Feature</dt>
            <dd>₱300.00</dd>
          </div>

          <div class="mt-5 flex items-center justify-between">
            <dt><input type="checkbox" class="mr-3">Concern Feature</dt>
            <dd>₱300.00</dd>
          </div>

          <div class="mt-5 flex items-center justify-between">
            <dt><input type="checkbox" class="mr-3">Tenant Portal Feature</dt>
            <dd>₱600.00</dd>
          </div>

          <div class="mt-5 flex items-center justify-between">
            <dt><input type="checkbox" class="mr-3">Owner Portal Feature</dt>
            <dd>₱600.00</dd>
          </div>

          <div class="mt-5 flex items-center justify-between">
            <dt><input type="checkbox" class="mr-3">Account Payables Feature</dt>
            <dd>₱300.00</dd>
          </div>
          
          <div class="mt-5 flex items-center justify-between">
            <dt><input type="checkbox" class="mr-3">Account Receivables Feature</dt>
            <dd>₱600.00</dd>
          </div>

          <div class="mt-5 flex items-center justify-between">
            <dt><input type="checkbox" class="mr-3">Portfolio Dashboard Feature</dt>
            <dd>₱600.00</dd>
          </div>
        
           
   
            
            </div>
          </div>

          <div class="mt-10 flex justify-end border-t border-gray-200 pt-6">
            <button type="submit" class="rounded-md border border-transparent bg-purple-900 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Buy Now</button>
          </div>
        </div>
      </form>
    </section>
  </div>
</div>

</div>
</body>



</html>