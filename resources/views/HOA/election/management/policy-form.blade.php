<x-new-layout>
    @section('title','Policy Form | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">

            <a href="/property/{{ Session::get('property_uuid')}}/election">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    class="my-4 w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>

        <div class="lg:border-b lg:border-t lg:border-gray-200">
                <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                    <ol role="list" class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-200">
                        @foreach($electionSubfeaturesArray as $index => $subfeature)
                            @if($subfeature === 'policy-form')
                            <li class="relative overflow-hidden lg:flex-1">
                                <div class="overflow-hidden border border-gray-200 lg:border-0">
                                    <!-- Current Step -->
                                    <a href="/property/{{ Session::get('property_uuid')}}/election/{{ $election->id }}/step-{{ $index+1 }}"
                                        aria-current="step">
                                        <span class="absolute left-0 top-0 h-full w-1 bg-indigo-600 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full"
                                            aria-hidden="true"></span>
                                        <span class="flex items-start px-6 py-5 text-sm font-medium lg:pl-9">
                                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                                                <span class="text-sm font-medium text-indigo-600">{{ $subfeature }}</span>
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
                            @else
                            <li class="relative overflow-hidden lg:flex-1">
                        <div class="overflow-hidden border border-gray-200 rounded-t-md border-b-0 lg:border-0">
                        <!-- Completed Step -->
                       <a href="/property/{{ Session::get('property_uuid')}}/election/{{ $election->id }}/step-{{ $index+1 }}" aria-current="step">
                            <span class="absolute left-0 top-0 h-full w-1 bg-transparent group-hover:bg-gray-200 lg:bottom-0 lg:top-auto lg:h-1 lg:w-full" aria-hidden="true"></span>
                            <span class="flex items-start px-6 py-5 text-sm font-medium">
                            <span class="ml-4 mt-0.5 flex min-w-0 flex-col">
                                <span class="text-sm font-medium">{{ $subfeature }}</span>
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

                            @endif

                        @endforeach
                    </ol>
                </nav>
            </div>

           @livewire('policy-form-create-component')
        </div>
    </div>
</x-new-layout>
