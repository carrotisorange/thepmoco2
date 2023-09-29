<x-hoa-layout>
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

                            Plan a new Election
                        </button>


                    </div>
                </div> -->

<!-- TABS -->

<div class="mx-auto">
    
    <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
        <ul class="flex flex-wrap -mb-px" id="electionTab" data-tabs-toggle="#electionTabContent" role="tablist">
            <li class="mr-2" role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="policy-form-tab" data-tabs-target="#policy-form" type="button" role="tab" aria-controls="policy-form" aria-selected="false">Policy Form</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300 active" id="candidates-tab" data-tabs-target="#candidates" type="button" role="tab" aria-controls="candidates" aria-selected="true">Candidates</button>
            </li>
            <li class="mr-2" role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="qualified-voters-tab" data-tabs-target="#qualified-voters" type="button" role="tab" aria-controls="qualified-voters" aria-selected="false">Qualified Voters</button>
            </li>
            <li role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="ballot-form-tab" data-tabs-target="#ballot-form" type="button" role="tab" aria-controls="ballot-form" aria-selected="false">Ballot Form</button>
            </li>
            <li role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="voters-tab" data-tabs-target="#voters" type="button" role="tab" aria-controls="voters" aria-selected="false">Voters</button>
            </li>
            <li role="presentation">
                <button class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm font-medium text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" id="results-tab" data-tabs-target="#results" type="button" role="tab" aria-controls="results" aria-selected="false">Results</button>
            </li>
        </ul>
    </div>
    <div id="myTabContent">
        <div class="p-4 rounded-lg dark:bg-gray-800 hidden" id="policy-form" role="tabpanel" aria-labelledby="policy-form-tab">
        <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
        <div class="lg:col-span-1 mt-2 ml-5">
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="floor_id" class="block text-base font-medium text-gray-900">Date of Election</label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>

                        <div class="lg:col-span-1 mt-2 ml-5">
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="floor_id" class="block text-base font-medium text-gray-900">Time Limit</label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>

                        <div class="lg:col-span-1 mt-2 ml-5">
                            <p class="py-6 text-base">Qualified Voters</p>
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="floor_id" class="block text-base font-medium text-gray-900">Number of Months behind dues</label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>

                        <div class="lg:col-span-1 mt-6 ml-5">

                            <div
                                class="relative bg-white  px-3 py-2">
                                <label for="floor_id" class="block text-base font-medium text-gray-900 mb-6">Allow Proxy Voting</label>
                            
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-base font-medium text-gray-900 dark:text-gray-300">Yes</label>
                                </div>
                                <div class="flex items-center mb-4">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-base font-medium text-gray-900 dark:text-gray-300">No</label>
                                </div>

                            </div>           
                        </div>

                        <div class="lg:col-span-2 mt-2 ml-5">
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="floor_id" class="block text-base font-medium text-gray-900">Other Policies <span class="font-light text-gray-300">optional</span></label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>
                  

                        
   
                  

                        
                </div>


        </div>


        <div class="p-4 rounded-lg dark:bg-gray-800" id="candidates" role="tabpanel" aria-labelledby="candidates-tab">
        <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                        <div class="lg:col-span-1 mt-2 ml-5">
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="" class="block text-base font-medium text-gray-900">Number of Candidates</label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>

                        <div class="lg:col-span-1 mt-2 ml-5">
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="floor_id" class="block text-base font-medium text-gray-900">Number of Winning Candidates</label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>

                        <div class="lg:col-span-2 mt-2 ml-5">
                            <div class="flex justify-between py-6">    
                                <p class="">Candidates</p>
                                

                                <button class="px-2 py-2 bg-purple-500 rounded-lg text-white text-base">Add a New Candidate</button>
                            </div>
                        </div>


                        <div class="lg:col-span-2 mt-2">
                            <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4">
                                <div class="lg:col-span-1 mt-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="floor_id" class="block text-base font-medium text-gray-900">Name</label>
                                            <input
                                                class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                            </input>
                                    </div>           
                                </div>
                                <div class="lg:col-span-1 mt-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="floor_id" class="block text-base font-medium text-gray-900">Position</label>
                                            <input
                                                class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                            </input>
                                    </div>           
                                </div>
                                <div class="lg:col-span-1 mt-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="floor_id" class="block text-base font-medium text-gray-900"># of Years as HOA member</label>
                                            <input
                                                class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                            </input>
                                    </div>           
                                </div>
                                <div class="lg:col-span-1 mt-2">
                                    <div
                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                        <label for="floor_id" class="block text-base font-medium text-gray-900">Resume</label>
                                        <div class="flex text-base text-gray-600">
                                                <label for="file-upload"
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload a file</span>
                                                    <input id="file-upload" type="file" wire:model="contract" class="sr-only">
                                                </label>
                                            </div>
                                    </div>           
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                            


        
        <div class="p-4 rounded-lg dark:bg-gray-800 hidden" id="qualified-voters" role="tabpanel" aria-labelledby="qualified-voters-tab">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                <div class="relative w-full mb-5">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" id="search" wire:model="search"
                        class="bg-white block p-4 pl-10 w-full text-base h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for house owner..." required>

                </div>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="mb-5 mt-2 relative overflow-hidden">

                            <table class="w-full text-base text-left text-gray-500">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>HOME OWNER</x-th>
                                        <x-th>HOUSE NUMBER</x-th>
                                        <x-th>ELIGBLE TO VOTE</x-th>
                                        <x-th>HAS VOTED</x-th>
                                        <x-th>POSITION</x-th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                            
                                    <tr>
                                        
                                        <x-td>1</x-td>
                                        <x-td>Juan Dela Cruz</x-td>
                                        <x-td>156-A</x-td>
                                        <x-td>Yes</x-td>
                                        <x-td>No</x-td>
                                        <x-td>Officer</x-td>
                                    
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

        </div>





        <div class="p-4 rounded-lg dark:bg-gray-800 hidden" id="ballot-form" role="tabpanel" aria-labelledby="ballot-form-tab">
        
            <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                        <div class="lg:col-span-2 mt-2 ml-5">
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="floor_id" class="block text-base font-medium text-gray-900">Heading/Greetings <span class="font-light text-gray-500">optional</span></label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>
                        <div class="lg:col-span-2 mt-2 ml-5">
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="floor_id" class="block text-base font-medium text-gray-900">Elecom Rules</label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>

                        <div class="lg:col-span-2 mt-2 ml-5">
                            <div
                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                <label for="floor_id" class="block text-base font-medium text-gray-900">General Instructions</label>
                                    <input
                                        class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                    </input>
                            </div>           
                        </div>

                        <div class="lg:col-span-2 mt-2 ml-5">
                            <div class="flex justify-between py-6">    
                                <p class="">List of Running Candidates</p>
                                <button class="px-2 py-2 bg-purple-500 rounded-lg text-white text-base">Edit Candidates</button>
                            </div>
                        </div>


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

                                    <!-- More products... -->
                                    </ul>



                                </form>

                                </div>

                            </div>



                        </div>

                    </div>
                </div>

            </div>
   
                      





        <div class="p-4 rounded-lg dark:bg-gray-800" id="voters" role="tabpanel" aria-labelledby="voters-tab">
            <div class="flex justify-between">

                <div class="w-full flex justify-between py-6">
                    <!-- show only if proxy voting is allowed -->
                    <button class="underline font-medium text-blue-500 rounded-lg px-2 text-base">View Proxy Voters</button>
                    <a href="" class="text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                        Download List</a>

                </div>
            </div>

                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="mb-5 mt-2 relative overflow-hidden">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>HOME OWNER</x-th>
                                        <x-th>HOUSE NUMBER</x-th>
                                        <x-th>POSITION</x-th>
                                        <x-th>TIME STARTED</x-th>
                                        <x-th>TIME ENDED</x-th>
                                        <x-th>SIGNATURE</x-th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                            
                                    <tr>
                                        
                                        <x-td>1</x-td>
                                        <x-td>Juan Dela Cruz</x-td>
                                        <x-td>156-A</x-td>
                                        <x-td>Officer</x-td>
                                        <x-td>1:00 PM</x-td>
                                        <x-td>1:15 PM</x-td>
                                        <x-td>signature</x-td>
                                    
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                            
        </div>



        <div class="p-4 rounded-lg dark:bg-gray-800" id="results" role="tabpanel" aria-labelledby="results-tab">

            

        
            <div class="flex justify-between">

                <div class="w-full flex py-6">

                    <a href="qualified-votes" class="underline font-medium text-blue-500 rounded-lg px-2 text-base">View Total Number of Qualified Votes</a>
                    
                
                   

                </div>
         

                <div class="w-full flex justify-end py-6">
                    
                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class="text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                        Actions <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download Results</a>
                        </li>
                        
                            
                        
                    
                        </ul>
                    </div>

                </div>


                

            </div>

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>
                        <x-th>MODE OF CONDUCTING ELECTION</x-th>
                       


                    </tr>
                </thead>
                <tbody class="text-base bg-white divide-y divide-gray-200">

                    <tr>
                        
                        <x-td>online</x-td>                   
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