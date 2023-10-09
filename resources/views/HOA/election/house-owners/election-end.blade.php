<x-house-owner-layout>
    @section('title','Election | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">Election</h1>
            </div>



    <!-- show this if no existing election is taking place -->
            <!-- <div class=" mt-10 text-center mb-10">
                    <div class="flex justify-center">
                        <img src="{{ asset('/brands/election-vector.png') }}" alt="election vector" class="w-64"/>
                    </div>
                    <h3 class="mt-8 text-base font-medium text-gray-700">You don't have an ongoing election at the moment. <br> Click the button below to start.</h3>

                    <div class="mt-6">
                        <button type="button"
                                                
                            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

                            Create a new Election
                        </button>


                    </div>
                </div> -->

<!-- TABS -->

<div class="mx-auto">
    
    <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
        <ul class="flex flex-wrap -mb-px" id="electionTab" data-tabs-toggle="#electionTabContent" role="tablist">
            <li role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="election-tab" data-tabs-target="#election" type="button" role="tab" aria-controls="election" aria-selected="false">Election</button>
            </li>
           
            <li class="mr-2" role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" id="candidates-tab" data-tabs-target="#candidates" type="button" role="tab" aria-controls="candidates" aria-selected="true">Candidates</button>
            </li>

            <li role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="results-tab" data-tabs-target="#results" type="button" role="tab" aria-controls="results" aria-selected="false">Results</button>
            </li>
        </ul>
    </div>
 

    <div class="p-4 rounded-lg dark:bg-gray-800" id="election" role="tabpanel" aria-labelledby="election-tab">

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
        
            
    </div>

    <div class="p-4 rounded-lg dark:bg-gray-800 hidden" id="candidates" role="tabpanel" aria-labelledby="candidates-tab">
        
        <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                


            <div class="lg:col-span-2 ">


                <h2 class="sr-only">Candidates</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 space-x-0 lg:space-x-5">

                    <div class="lg:col-span-1 mt-2">
                        <div class="bg-white">

                            <form class="">

                                <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">

                                    <li class="flex py-6">
                                        <div class="flex-shrink-0">
                                        <img src="{{ asset('/brands/user.png') }}" alt="" class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32"> 
                                        </div>

                                        <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                        <div>
                                            
                                            <h4 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                            </h4>
                                            <div class="flex justify-between">
                                                <p class="text-sm font-medium text-gray-900">Position</p>
                                                    <div class="flex items-center mb-4">
                                                        <input id="default-checkbox" type="checkbox" value="" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                    </div>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>

                                            <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                        </div>

                                        
                                    </li>
                                    <li class="flex py-6">
                                        <div class="flex-shrink-0">
                                        <img src="{{ asset('/brands/user.png') }}" alt="" class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32"> 
                                        </div>

                                        <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                        <div>
                                            
                                            <h4 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                            </h4>
                                            <div class="flex justify-between">
                                                <p class="text-sm font-medium text-gray-900">Position</p>
                                                <!-- HIDE CHECKBOX -->
                                                    <div class="flex items-center mb-4">
                                                        <input id="default-checkbox" type="checkbox" value="" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                    </div>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>

                                            <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                        </div>

                                        
                                    </li>
                                </ul>

                            </form>

                        </div>
                    </div>


                    <div class="lg:col-span-1 mt-2">
                        <div class="bg-white">

                            <form class="">
        
                                <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">
                                    <li class="flex py-6">
                                        <div class="flex-shrink-0">
                                        <img src="{{ asset('/brands/user.png') }}" alt="" class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32"> 
                                        </div>
            
                                        <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                        <div>
                                            
                                            <h4 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                            </h4>
                                            <div class="flex justify-between">
                                                <p class="text-sm font-medium text-gray-900">Position</p>
                                                    <div class="flex items-center mb-4">
                                                        <input id="default-checkbox" type="checkbox" value="" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                    </div>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>
            
                                            <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                        </div>
            
                                        
                                    </li>
                                    <li class="flex py-6">
                                        <div class="flex-shrink-0">
                                        <img src="{{ asset('/brands/user.png') }}" alt="" class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32"> 
                                        </div>
            
                                        <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                        <div>
                                            
                                            <h4 class="text-sm">
                                                <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                            </h4>
                                            <div class="flex justify-between">
                                                <p class="text-sm font-medium text-gray-900">Position</p>
                                                    <div class="flex items-center mb-4">
                                                        <input id="default-checkbox" type="checkbox" value="" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                        <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                    </div>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>
            
                                            <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                        </div>
            
                                        
                                    </li>
        
                                <!-- More CANDIDATES... -->
                                </ul>
                            </form>
        
                        </div>
                    </div>
        
                </div>
        
            </div>
        </div>
    </div>









                        
                            



        <div class="p-4 rounded-lg dark:bg-gray-800" id="results" role="tabpanel" aria-labelledby="results-tab">

        
            <div class="flex justify-between">

         

            <div class="w-full flex justify-end py-6">

            </div>
            </div>


            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>
                        <x-th>#</x-th>
                        <x-th>CANDIDATE</x-th>
                        <x-th>VOTES</x-th>

                    </tr>
                </thead>
                <tbody class="text-base bg-white divide-y divide-gray-200">

                    <tr>
                        
                        <x-td>1</x-td>
                        <x-td>Juan Dela Cruz</x-td>
                        <x-td>100</x-td>

                    
                    </tr>
                
                </tbody>
            </table>
        </div>
    </div>

 </div>




</x-house-owner-layout>

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>