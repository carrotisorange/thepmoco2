<x-hoa-layout>
    @section('title','Policy Form | '. env('APP_NAME'))
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
                        <div class="overflow-hidden border border-gray-200 lg:border-0">
                        <!-- Current Step -->
                        <a href="#" aria-current="step">
                            <span class="absolute left-0 top-0 h-full w-1 bg-indigo-600 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                            <span class="flex items-start px-6 py-5 text-sm font-medium lg:pl-9">
                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                                <span class="text-sm font-medium text-indigo-600">Policy Form</span>
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
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="overflow-hidden border border-gray-200 rounded-b-md border-t-0 lg:border-0">
                        <!-- Upcoming Step -->
                        <a href="#" class="group">
                            <span class="absolute left-0 top-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                            <span class="flex items-start px-6 py-5 text-sm font-medium lg:pl-9">
                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                                <span class="text-sm font-medium text-gray-500">Candidates</span>
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
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="overflow-hidden border border-gray-200 rounded-b-md border-t-0 lg:border-0">
                        <!-- Upcoming Step -->
                        <a href="#" class="group">
                            <span class="absolute left-0 top-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                            <span class="flex items-start px-6 py-5 text-sm font-medium lg:pl-9">
                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                                <span class="text-sm font-medium text-gray-500">Ballot</span>
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

                        

                    <div class="flex justify-end mt-5">

                        <x-button onclick="window.location.href='{{ url()->previous() }}'">
                            Cancel
                        </x-button>
                    
                        <x-button type="button" wire:click="create"> Next
                        </x-button>
                    
                    </div>
                    <div>
            </form>

</x-hoa-layout>