<x-new-layout>
    @section('title','Step 1 of Step 4 | Moveout')
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

                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Current Step -->
                            <a href="#" aria-current="step">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-purple-600 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-purple-600">
                                            <span class="text-purple-600">01</span>
                                        </span>
                                    </span>


                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-gray-500">Step 1:</span>
                                        <span class="text-sm font-medium text-gray-500">Moveout Form</span>
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
                    <!-- Step 4 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">02</span>
                                        </span>
                                    </span>


                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-gray-500">Step 2:</span>
                                        <span class="text-sm font-medium text-gray-500">Statements of Account</span>
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
                            <a href="#" class="group">
                                <span
                                    class="absolute top-0 left-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                    aria-hidden="true"></span>
                                <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                    <span class="flex-shrink-0">
                                        <span
                                            class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-gray-300">
                                            <span class="text-gray-500">03</span>
                                        </span>
                                    </span>


                                    <span class="mt-0.5 ml-4 flex min-w-0 flex-col">
                                        <span class="text-sm font-medium text-gray-500">Step 3:</span>
                                        <span class="text-sm font-medium text-gray-500">Moveout Clearance Form</span>
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

                    <!-- Step 4 -->
                    <li class="relative overflow-hidden lg:flex-1">
                        <div class="border border-gray-200 overflow-hidden border-t-0 rounded-b-md lg:border-0">
                            <!-- Upcoming Step -->
                            <a href="#" class="group">
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
                                        <span class="text-sm font-medium text-gray-500">Step 4:</span>
                                        <span class="text-sm font-medium text-gray-500">Request for Refund</span>
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

        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            {{-- start-step-3-form --}}
            @livewire('contract-moveout-step1-component', ['contract' => $contract])
            {{-- end-step-3-form --}}
        </div>
    </div>
</x-new-layout>