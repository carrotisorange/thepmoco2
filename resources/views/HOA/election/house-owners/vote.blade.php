<x-house-owner-layout>
    @section('title','Election | '. Session::get('property'))
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

                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 space-x-5">

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

                        

                    <div class="flex justify-end mt-5">
                     
                        <button type="button" wire:click="create"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                        </button>
                    
                    </div>
                    <div>
            </form>


</x-house-owner-layout>

