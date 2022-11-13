<x-new-layout>
    @section('title', $unit->unit.' | '.Session::get('property_name'))

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
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                                <!-- Heroicon name: solid/check -->
                                                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span class="text-sm font-medium text-gray-900">Owner Information
                                            </span>

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
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                                                <span class="text-indigo-600">02</span>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span class="text-sm font-medium text-indigo-600">Document Information
                                            </span>

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
                                        class="absolute top-0 left-0 w-1 h-full  lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
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
                                                class="text-sm font-medium text-gray-500 group-hover:text-gray-900">Financial
                                                Information

                                            </span>
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
                                        class="absolute top-0 left-0 w-1 h-full  lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
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
                                                class="text-sm font-medium text-gray-500 group-hover:text-gray-900">Occupancy
                                                Information
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

                    </ol>
                </nav>


            </div>

            @livewire('deed-of-sale-component', ['unit' => $unit, 'owner' => $owner])
        </div>
    </div>
</x-new-layout>