<x-house-owner-layout>
    @section('title','Welcome | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="sm:flex-auto">
                <h1 class="text-3xl  text-gray-500 text-center">Welcome to the  <br><span class="font-semibold">HOA name</span> Property!</h1>
            </div>

          <div class=" mt-10 text-center mb-10">
                    <div class="flex justify-center py-12">
                        <img src="{{ asset('/brands/houses.png') }}" alt="election vector" class="w-96"/>
                    </div>

                    <p class="text-lg">Get started and set up your profile now.</p>

                    <div class="mt-6">
                        <button type="button"
                                                
                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                            Set up my Profile
                        </button>


                    </div>
            </div>
        </div>
    </div>  




</x-house-owner-layout>