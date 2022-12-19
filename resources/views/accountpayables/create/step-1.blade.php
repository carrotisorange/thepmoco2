<x-new-layout>
    @section('title','Step 1 of Step 6 | Account Payables')
    <div class="mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 xl:py-10">
        {{-- start of stepper --}}
        <div class="lg:border-t lg:border-b lg:border-gray-200">
            <nav class="mx-auto max-w-9xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                <ol role="list" class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-200">
                    
                    <!-- Step 1 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                            <!-- Current Step -->
                            <a href="#" aria-current="step">
                                <span class="absolute top-0 left-0 h-full w-1 bg-indigo-600 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-indigo-600">
                                            <span class="text-indigo-600">01</span>
                                        </span>
                                    </span>
                                    
                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-indigo-600">Step 1:</span>
                                        <span class="text-sm font-medium text-gray-500">Internal Document</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </li>
                    
                    <!-- Step 2 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden lg:border-0">
                            <a href="#" class="group">
                                <span class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">02</span>
                                        </span>
                                    </span>

              
                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-gray-500">Step 2</span>
                                        <span class="text-sm font-medium text-gray-500">Quotation</span>
                                    </span>
                                </span>
                            </a>
                                    
                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>
                        
                    <!-- Step 3 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
                                <span class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">03</span>
                                        </span>
                                    </span>

              
                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-gray-500">Step 3:</span>
                                        <span class="text-sm font-medium text-gray-500">Approval (Admin)</span>
                                    </span>
                                </span>
                            </a>
                                        
                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <!-- Step 4 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
                                <span class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">04</span>
                                        </span>
                                    </span>

              
                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-gray-500">Step 4:</span>
                                        <span class="text-sm font-medium text-gray-500">Purchase Order</span>
                                    </span>
                                </span>
                            </a>
                                        
                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <!-- Step 5 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
                                <span class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">05</span>
                                        </span>
                                    </span>

              
                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-gray-500">Step 5:</span>
                                        <span class="text-sm font-medium text-gray-500">Approval (Manager)</span>
                                    </span>
                                </span>
                            </a>
                                        
                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <!-- Step 6 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
                                <span class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">06</span>
                                        </span>
                                    </span>

              
                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-gray-500">Step 6:</span>
                                        <span class="text-sm font-medium text-gray-500">Payment</span>
                                    </span>
                                </span>
                            </a>
                                        
                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        {{-- end of stepper --}}

        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            {{-- start-step-1-form --}}
            <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
            
                <div class="md:grid md:grid-cols-6 md:gap-6">

                     {{-- request for purchase --}}
                    <div class="sm:col-span-3">
                        <label for="request" class="block text-sm font-medium text-gray-700">Request for: </label>
                            <select id="purchase" name="purchase" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                <option value="">Purchase</option>
                            </select>
                    </div>

                    {{-- creation date --}}
                    <div class="sm:col-span-3">
                        <label for="creation-date" class="block text-sm font-medium text-gray-700">Creation Date:</label>
                            <input type="text" id="creation-date" name="creation-date" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    </div>

                    {{-- particular --}}
                    <div class="sm:col-span-3">
                        <label for="particular" class="block text-sm font-medium text-gray-700">Particular:</label>
                            <select id="particular" name="particular" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                <option value="">Rent</option>
                                <option value="">Rent</option>
                                <option value="">Rent</option>
                                <option value="">Rent</option>
                            </select>
                    </div>

                    {{-- requester's name --}}
                    <div class="sm:col-span-3">
                        <label for="requester" class="block text-sm font-medium text-gray-700">Requester's Name:</label>
                            <input type="text" id="requester" name="requester" rows="3" class="mt-1 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    </div>

                    {{-- cancel, next button --}}
                    <div class="col-start-6 flex items-center justify-end">
                        <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                        <button type="submit" class="ml-3 inline-flex justif y-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="accountspayables2">Next</a></button>
                    </div>

                </div>
            </form>
            {{-- end-step-1-form --}}
        </div>          
    </div>
</x-new-layout>