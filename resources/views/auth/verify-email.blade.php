<x-new-layout-base>
    @section('title', 'Verify Email | The Property Manager')



    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!--
      This example requires Tailwind CSS v2.0+ 
      
      This example requires some changes to your config:
      
      ```
      // tailwind.config.js
      module.exports = {
        // ...
        plugins: [
          // ...
          require('@tailwindcss/aspect-ratio'),
        ],
      }
      ```
    -->

        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8 mt-5">
            <div class=" flex items-center justify-center">
                <img class="h-56 w-auto" src="{{ asset('/brands/thanks.png') }}">
            </div>
            <h2 class="pt-3 pb-5 text-center text-2xl font-bold tracking-tight text-gray-900 font-pop">Thanks
                for signing up!</h2>
            <p class="text-center text-md font-medium text-medium text-gray-700">Your journey with The Property
                Manager Online starts when you</p>
            <p class="text-center text-md font-medium text-medium text-gray-700">verify your email by clicking
                the link we sent you.</p>
            </p>



            <p class="mt-5 text-center text-md font-normal text-gray-500">If you did not receive an email, click
                on the resend button below.

            </p>


            <div class="mt-5 flex items-center justify-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <button type="submit"
                            class="mr-3 w-56 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-purple-900 hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Resend verification email
                        </button>
                    </div>
                </form>




            </div>


        </div>
{{-- 
        <div class="mt-3 flex items-center justify-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit"
                    class="w-32 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Log Out</button>
            </form>

        </div> --}}
        @if (session('status') == 'verification-link-sent')
        <p class="mt-5 text-center text-sm font-normal text-green-500">
            A new verification link has been sent to the email address you provided during
            registration.
        </p>
        @endif
    </div>
    </x-newlayout-base>