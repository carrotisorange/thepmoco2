<x-new-layout>
    @section('title','Step 3 of 7 | Request for Payables')
    <div class="mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 xl:py-10">
        <div class="flex justify-end">
            {{-- <button type="button"
                class="mb-4 bg-white py-2 px-4 underline rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Download
                Step</button> --}}
        </div>
        {{-- start of stepper --}}
        <div class="lg:border-t lg:border-b lg:border-gray-200">
            <nav class="mx-auto max-w-9xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                <ol role="list"
                    class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-200">

                    <!-- Step 1 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                            <!-- Completed Step -->
                            <a href="/property/{{ $property->uuid }}/accountpayable/{{ $accountpayable->id }}/step-1" class="group">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium">

                                    <span class="flex-shrink-0">
                                        <!-- filled circle -->
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-600">
                                            <!-- check icon -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </span>

                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-xs font-medium text-purple-600">Step 1:</span>
                                        <span class="text-xs font-medium text-gray-500">Internal Document</span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </li>

                     <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                            <!-- Completed Step -->
                            <a href="/property/{{ $property->uuid }}/accountpayable/{{ $accountpayable->id }}/step-2" class="group">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium">

                                    <span class="flex-shrink-0">
                                        <!-- filled circle -->
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-600">
                                            <!-- check icon -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </span>
                                    </span>

                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-xs font-medium text-purple-600">Step 2:</span>
                                        <span class="text-xs font-medium text-gray-500">Approval (Manager)</span>
                                    </span>
                                </span>
                            </a>
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <!-- Step 2 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Current Step -->
                            <a href="/property/{{ $property->uuid }}/accountpayable/{{ $accountpayable->id }}/step-3" aria-current="step">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-purple-600 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-purple-600">
                                            <span class="text-purple-600">02</span>
                                        </span>
                                    </span>


                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-xs font-medium text-gray-500">Step 3:</span>
                                        <span class="text-xs font-medium text-gray-500">Approval (account payable)</span>
                                    </span>
                                </span>
                            </a>

                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>
                    <!-- Step 3 -->
                   

                    <!-- Step 4 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="/property/{{ $property->uuid }}/accountpayable/{{ $accountpayable->id }}/step-4" class="group">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">04</span>
                                        </span>
                                    </span>


                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-xs font-medium text-gray-500">Step 4:</span>
                                        <span class="text-xs font-medium text-gray-500">Payment</span>
                                    </span>
                                </span>
                            </a>

                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <!-- Step 5 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="/property/{{ $property->uuid }}/accountpayable/{{ $accountpayable->id }}/step-5" class="group">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">05</span>
                                        </span>
                                    </span>


                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-xs font-medium text-gray-500">Step 5:</span>
                                        <span class="text-xs font-medium text-gray-500">Liquidation</span>
                                    </span>
                                </span>
                            </a>

                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <!-- Step 6 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="/property/{{ $property->uuid }}/accountpayable/{{ $accountpayable->id }}/step-6" class="group">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">06</span>
                                        </span>
                                    </span>


                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-xs font-medium text-gray-500">Step 6:</span>
                                        <span class="text-xs font-medium text-gray-500">Approval (manager)</span>
                                    </span>
                                </span>
                            </a>

                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>

                    <!-- Step 7 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="/property/{{ $property->uuid }}/accountpayable/{{ $accountpayable->id }}/step-7" class="group">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">07</span>
                                        </span>
                                    </span>


                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-xs font-medium text-gray-500">Step 7:</span>
                                        <span class="text-xs font-medium text-gray-500">Chart of Account (account
                                            payable)</span>
                                    </span>
                                </span>
                            </a>

                            <!-- Separator -->
                            <div class="absolute inset-0 top-0 left-0 hidden w-3 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        {{-- end of stepper --}}

        @livewire('account-payable-create-step3-component', ['property'=> $property , 'accountpayable' => $accountpayable])
    </div>
</x-new-layout>