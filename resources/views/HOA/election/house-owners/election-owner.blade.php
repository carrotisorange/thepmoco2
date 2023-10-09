<x-house-owner-layout>
    @section('title','Election | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500 text-center">Election</h1>
            </div>



    <!-- show this if there is no election  -->
    <!-- <div class=" mt-10 text-center mb-10">
                    <div class="flex justify-center">
                        <img src="{{ asset('/brands/election-vector.png') }}" alt="election vector" class="w-64"/>
                    </div>
                    <h3 class="mt-8 text-base font-medium text-gray-700">
                  
                    <p>Hi there, there's no election at the moment. <br>Please come back again another time.</p>

        
                </div>  -->

    <!-- show this if there is an upcoming election -->
          <div class=" mt-10 text-center mb-10">
                    <div class="flex justify-center">
                        <img src="{{ asset('/brands/election-vector.png') }}" alt="election vector" class="w-64"/>
                    </div>
                    <h3 class="mt-8 text-base font-medium text-gray-700">
                    To all House Owners, <br>
                    Election will take place this Saturday, September 16, 2023 at 8:00 AM to 6:00 PM</h3>
                    <p>Please be advised of the date and time.</p>

                    <div class="mt-6">
                        <button type="button"
                                                
                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                            Start Voting
                        </button>


                    </div>
                </div>  




</x-house-owner-layout>

