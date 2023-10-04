    <x-hoa-layout>
    @section('title','Ballot Form | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="my-4 w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>

        <!-- stepper -->

        <div class="lg:border-b lg:border-t lg:border-gray-200">
                <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                    <ol role="list" class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-200">
                    
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="overflow-hidden border border-gray-200 rounded-t-md border-b-0 lg:border-0">
                        <!-- Completed Step -->
                         <a href="/property/{{ Session::get('property_uuid')}}/election/{{ $year }}/step-1" aria-current="step">
                            <span class="absolute left-0 top-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                            <span class="flex items-start px-6 py-5 text-sm font-medium">
                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                                <span class="text-sm font-medium">Policy Form</span>
                            </span>
                            </span>
                        </a>
                        </div>
                        
                    </li>
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="overflow-hidden border border-gray-200 rounded-t-md border-b-0 lg:border-0">
                        <!-- Completed Step -->
                         <a href="/property/{{ Session::get('property_uuid')}}/election/{{ $year }}/step-2" aria-current="step">
                            <span class="absolute left-0 top-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                            <span class="flex items-start px-6 py-5 text-sm font-medium">
                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                                <span class="text-sm font-medium">Candidates</span>
                            </span>
                            </span>
                        </a>
                        </div>
                        <div class="absolute inset-0 left-0 top-0 hidden w-3 lg:block" aria-hidden="true">
                            <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                            <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                            </svg>
                        </div>
                    </li>
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="overflow-hidden border border-gray-200 lg:border-0">
                        <!-- Current Step -->
                       <a href="/property/{{ Session::get('property_uuid')}}/election/{{ $year }}/step-3" aria-current="step">
                            <span class="absolute left-0 top-0 h-full w-1 bg-indigo-600 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                            <span class="flex items-start px-6 py-5 text-sm font-medium lg:pl-9">
                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                                <span class="text-sm font-medium text-indigo-600">Ballot Form</span>
                            </span>
                            </span>
                        </a>
                        <!-- Separator -->
                        <div class="absolute inset-0 left-0 top-0 hidden w-3 lg:block" aria-hidden="true">
                            <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                            <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                            </svg>
                        </div>
                        </div>
                    </li>
                    
                    </ol>
                </nav>
            </div>

            <form class="space-y-1" method="POST">
                <div class="py-6">

                    <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                    <div class="lg:col-span-2 mt-2 ml-5">
                        <div
                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                            <label for="floor_id" class="block text-base font-medium text-gray-900">Heading/Greetings <span
                                    class="font-light text-gray-500">optional</span></label>
                            <x-form-input name="headings">
                            </x-form-input>
                        </div>
                    </div>
                    <div class="lg:col-span-2 mt-2 ml-5">
                        <div
                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                            <label for="floor_id" class="block text-base font-medium text-gray-900">Elecom Rules</label>
                            <x-form-input name="elecon_rules">
                            </x-form-input>
                        </div>
                    </div>
                    
                    <div class="lg:col-span-2 mt-2 ml-5">
                        <div
                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                            <label for="floor_id" class="block text-base font-medium text-gray-900">General Instructions</label>
                            <x-form-input name="general_instructions">
                            </x-form-input>
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
                                                    <img src="{{ asset('/brands/user.png') }}" alt=""
                                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                </div>
                    
                                                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                    <div>
                    
                                                        <h4 class="text-sm">
                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                        </h4>
                                                        <div class="flex justify-between">
                                                            <p class="text-sm font-medium text-gray-900">Position</p>
                                                            <div class="flex items-center mb-4">
                                                                <input id="default-checkbox" type="checkbox" value=""
                                                                    class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                <label for="default-checkbox"
                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                            </div>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>
                    
                                                        <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                                    </div>
                    
                    
                                            </li>
                                            <li class="flex py-6">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('/brands/user.png') }}" alt=""
                                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                </div>
                    
                                                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                    <div>
                    
                                                        <h4 class="text-sm">
                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                        </h4>
                                                        <div class="flex justify-between">
                                                            <p class="text-sm font-medium text-gray-900">Position</p>
                                                            <div class="flex items-center mb-4">
                                                                <input id="default-checkbox" type="checkbox" value=""
                                                                    class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                <label for="default-checkbox"
                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
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
                                                    <img src="{{ asset('/brands/user.png') }}" alt=""
                                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                </div>
                    
                                                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                    <div>
                    
                                                        <h4 class="text-sm">
                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                        </h4>
                                                        <div class="flex justify-between">
                                                            <p class="text-sm font-medium text-gray-900">Position</p>
                                                            <div class="flex items-center mb-4">
                                                                <input id="default-checkbox" type="checkbox" value=""
                                                                    class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                <label for="default-checkbox"
                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                            </div>
                                                        </div>
                                                        <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>
                    
                                                        <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                                    </div>
                    
                    
                                            </li>
                                            <li class="flex py-6">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('/brands/user.png') }}" alt=""
                                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                </div>
                    
                                                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                    <div>
                    
                                                        <h4 class="text-sm">
                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                        </h4>
                                                        <div class="flex justify-between">
                                                            <p class="text-sm font-medium text-gray-900">Position</p>
                                                            <div class="flex items-center mb-4">
                                                                <input id="default-checkbox" type="checkbox" value=""
                                                                    class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                <label for="default-checkbox"
                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
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

                        
                        </div>

                            
                  


                </div>

                        

                    <div class="flex justify-end mt-5">
                     
                        <button type="button" wire:click="create"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-md font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Publish 
                        </button>
                    
                    </div>
                    <div>
            </form>

</x-hoa-layout>