<x-house-owner-layout>
    @section('title','Election | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">



            <form class="space-y-1" method="POST">
                <div class="py-6">

                    <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                    <div class="lg:col-span-2 mt-2 ml-5">
                            <div
                                class="relative  bg-white  px-3 py-2 focus-within:z-10 focus-within:ring-1 ">
                                <!-- <label for="floor_id" class="block text-sm font-medium text-gray-900">Heading optional</label> -->
                                    <p
                                        class="block w-full text-gray-900  sm:text-base">
                                        This a sample custom heading created by the management to greet the home owners.
                                    </p>
                            </div>           
                        </div>
                        <div class="lg:col-span-2 ml-5">
                            <div
                                class="relative bg-white  px-3 py-2">
                                <!-- <label for="floor_id" class="block text-sm font-medium text-gray-900">Elecom Rules</label> -->
                                <p class="font-semibold py-8">Elecom Rules</p>
                                    <p
                                        class="block w-full text-gray-900  sm:text-base">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a neque vel lorem condimentum pretium non a nisi. Cras ornare quam sed urna accumsan aliquet. Quisque posuere fringilla sagittis. In nibh lacus, suscipit ac ipsum ac, fringilla blandit libero. Nam ullamcorper tellus et est bibendum dignissim. Sed a tortor purus. Fusce sit amet ullamcorper dolor. Suspendisse faucibus nunc eu ipsum mollis, id sodales sem tristique. Vestibulum semper dignissim urna ut eleifend. Nunc justo arcu, tristique vel massa vitae, tempus tincidunt velit. Mauris nunc ligula, lobortis vel ultricies a, euismod ac nisi. Aliquam ut fringilla lectus. Morbi vestibulum odio a neque hendrerit posuere. Proin sit amet mi varius, semper ligula et, rutrum sapien. Curabitur pellentesque est erat, aliquet porta neque aliquet non.
                                    </p>

                                    <div class="flex items-center my-8">
                                    <input id="default-checkbox" type="checkbox" value="" class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree to the Elecom Rules stated above.</label>
                                </div>
                            </div>           
                        </div>

                        <div class="lg:col-span-2  ml-5">
                            <div
                                class="relative bg-white px-3 py-2">
                                <!-- <label for="floor_id" class="block text-sm font-medium text-gray-900">Elecom Rules</label> -->
                                <p class="font-semibold py-4">General Instructions</p>
                                    <p
                                        class="block w-full text-gray-900  sm:text-base">
                                        Please select only this number of candidates. Click the checkbox to select a candidate. Once you've submitted you won't be able to change your votes. </p>

                                    
                            </div>           
                        </div>

                       

                        <div class="lg:col-span-2 ml-5">
                            <div
                                class="relative bg-white px-3 py-2">
                                <p class="font-semibold py-4">List of Running Candidates</p>
                            </div>           
                        </div>


                        <div class="lg:col-span-2 mt-2">


                                <h2 class="sr-only">Candidates</h2>

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 space-x-0 lg:space-x-5">

                                <div class="lg:col-span-1 mt-2">
                                <div class="bg-white">

                                    <form class="mt-12">
                         
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
                                                <button type="button" data-modal-toggle="default-modal" class="block text-sm text-blue-500 underline">Resume</button>

                                                
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
                                                <button type="button" data-modal-toggle="default-modal" class="block text-sm text-blue-500 underline">Resume</button>

                                                
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
                                                <button type="button" data-modal-toggle="default-modal" class="block text-sm text-blue-500 underline">Resume</button>

                                                
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
                                                <button type="button" data-modal-toggle="default-modal" class="block text-sm text-blue-500 underline">Resume</button>

                                                
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

                <div class="max-w-2xl mx-auto">
                    <!-- Main modal -->
                    <div id="default-modal" data-modal-show="false" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal  top-0 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                        <div class="relative w-full max-w-2xl px-4 h-full ">
                            <!-- Modal content -->
                            <div class=" h-full w-full rounded-lg shadow relative dark:bg-gray-700">
                                <!-- Modal header -->
                                <div class="flex items-start justify-between p-5 ">
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="default-modal">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class=""> 
                                       
                                    <img src="{{ asset('/brands/sample-resume.png') }}" alt="" class="w-full h-full rounded-md object-cover object-center sm:h-32 sm:w-32">   
                                </div>
                               
                            </div>
                        </div>
                    </div>

                </div>

                <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>

                        

                    <div class="flex justify-end mt-5">
                     
                        <button type="button" wire:click="create"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                        </button>
                    
                    </div>
                    <div>
            </form>


</x-house-owner-layout>

