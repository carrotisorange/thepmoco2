<x-new-layout>
    @section('title','Policy Form | '. env('APP_NAME'))

    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="mt-10 px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-500">
                            {{ucfirst(Route::current()->getName())}}
                        </h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        {{-- <x-button
                            onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election/create'">
                            New Election
                        </x-button> --}}

                    </div>
                </div>
            </div>
            {{--
            <a href="/property/{{ Session::get('property_uuid')}}/election">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="my-4 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a> --}}



            <div class="lg:border-b lg:border-t lg:border-gray-200">
                <nav class="flex border-b border-gray-200 bg-white" aria-label="Breadcrumb">
                    <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6 lg:px-8">
                        <li class="flex">
                            <div class="flex items-center">
                                <a href="/property" class="text-gray-400 hover:text-gray-500">
                                    <svg class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Home</span>
                                </a>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="flex items-center">
                                <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                                    preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                </svg>
                                <a href="/property/{{ Session::get('property_uuid') }}/election"
                                    class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Election</a>
                            </div>
                        </li>

                        <li class="flex">
                            <div class="flex items-center">
                                <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                                    preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                </svg>
                                <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700"
                                    aria-current="page">Policy Form</a>
                            </div>
                        </li>

                    </ol>
                </nav>
            </div>

            @livewire('election-edit-step1-component',['election' => $election])
        </div>
    </div>
</x-new-layout>
