<x-new-layout>
    @section('title', $unit->unit.' | '. env('APP_NAME'))

    <div class="mx-auto px-4 sm:px-6 lg:px-8">

        <div class="pt-6 sm:pb-5">
            <div class="lg:border-t lg:border-b lg:border-gray-200">

                <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                    <ol role="list"
                        class="rounded-md overflow-hidden lg:flex lg:border-l lg:border-r lg:border-gray-200 lg:rounded-none">


                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">

                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                                                <span class="text-indigo-600">01</span>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span class="text-sm font-medium text-indigo-600">Tenant
                                                Information</span>

                                        </span>
                                    </span>
                                </a>
                            </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                                <span class="text-gray-500 group-hover:text-gray-900">02</span>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span
                                                class="text-sm font-medium text-gray-500 group-hover:text-gray-900">Guardian
                                                Information</span>

                                        </span>
                                    </span>
                                </a>


                                <!-- Separator -->
                                <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                            vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                                <span class="text-gray-500 group-hover:text-gray-900">03</span>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span
                                                class="text-sm font-medium text-gray-500 group-hover:text-gray-900">Reference
                                                Information</span>

                                        </span>
                                    </span>
                                </a>

                                <!-- Separator -->
                                <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                            vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                                <span class="text-gray-500 group-hover:text-gray-900">04</span>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span
                                                class="text-sm font-medium text-gray-500 group-hover:text-gray-900">Contract
                                                Information</span>

                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                                <span class="text-gray-500 group-hover:text-gray-900">05</span>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span
                                                class="text-sm font-medium text-gray-500 group-hover:text-gray-900">Unit
                                                Inventory
                                            </span>

                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </li>


                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full  lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-gray-300 rounded-full group-hover:border-gray-400">
                                                <span class="text-gray-500 group-hover:text-gray-900">06</span>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span
                                                class="text-sm font-medium text-gray-500 group-hover:text-gray-900">Bill
                                                Information</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </li>
                    </ol>
                </nav>


            </div>

            @livewire('tenant-create-component', ['unit' => $unit])

        </div>
    </div>
</x-new-layout>