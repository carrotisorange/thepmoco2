<x-hoa-layout>
    @section('title','Election | '. Session::get('property'))
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
           
            <li class="mr-2" role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" id="candidates-tab" data-tabs-target="#candidates" type="button" role="tab" aria-controls="candidates" aria-selected="true">Candidates</button>
            </li>

            <li role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="results-tab" data-tabs-target="#results" type="button" role="tab" aria-controls="results" aria-selected="false">Results</button>
            </li>
        </ul>
    </div>
 


    <div class="p-4 rounded-lg dark:bg-gray-800 hidden" id="candidates" role="tabpanel" aria-labelledby="candidates-tab">
        
        <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                


                    <div class="lg:col-span-2 mt-2">


                        <div class="bg-white">
                            <div class="mx-auto max-w-7xl overflow-hidden sm:px-6 lg:px-8">
                                <h2 class="sr-only">Products</h2>

                                <div class="-mx-px grid grid-cols-2 border-l border-gray-200 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">


                                    <div class="group relative border-b border-r border-gray-200 p-4 sm:p-6">
                                        <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg ">
                                            <img src="{{ asset('/brands/user.png') }}" alt="" class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="pb-4 pt-10 text-center">
                                            <h3 class="text-base font-semibold text-gray-900">
                                        
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Name
                                    
                                            </h3>
                                            
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">Position</p>
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">5 years as HOA Member </p>
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">Resume</p>
                                            
                                        </div>
                                    </div>
                                    <div class="group relative border-b border-r border-gray-200 p-4 sm:p-6">
                                        <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg ">
                                        <img src="{{ asset('/brands/user.png') }}" alt="" class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="pb-4 pt-10 text-center">
                                        <h3 class="text-base font-semibold text-gray-900">
                                        
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Name
                                    
                                        </h3>
                                            
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">Position</p>
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">5 years as HOA Member </p>
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">Resume</p>
                                            
                                        </div>
                                    </div>
                                    <div class="group relative border-b border-r border-gray-200 p-4 sm:p-6">
                                        <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg ">
                                        <img src="{{ asset('/brands/user.png') }}" alt="" class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="pb-4 pt-10 text-center">
                                        <h3 class="text-base font-semibold text-gray-900">
                                        
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Name
                                    
                                        </h3>
                                            
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">Position</p>
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">5 years as HOA Member </p>
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">Resume</p>
                                            
                                        </div>
                                    </div>
                                    <div class="group relative border-b border-r border-gray-200 p-4 sm:p-6">
                                        <div class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg ">
                                        <img src="{{ asset('/brands/user.png') }}" alt="" class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="pb-4 pt-10 text-center">
                                        <h3 class="text-base font-semibold text-gray-900">
                                        
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Name
                                    
                                        </h3>
                                            
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">Position</p>
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">5 years as HOA Member </p>
                                                <p class="mt-4 text-sm text-left font-light text-gray-900">Resume</p>
                                            
                                        </div>
                                    </div>

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
                        <x-th>MODE OF CONDUCTING ELECTION</x-th>
                        <x-th>TOTAL NUMBER OF QUALIFIED VOTES</x-th>


                    </tr>
                </thead>
                <tbody class="text-base bg-white divide-y divide-gray-200">

                    <tr>
                        
                        <x-td>online</x-td>
                        <x-td>300</x-td>

                    
                    </tr>
                
                </tbody>
            </table>

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




</x-hoa-layout>

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>