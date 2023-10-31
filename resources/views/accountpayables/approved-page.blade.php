<x-new-layout>

    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <nav class="mx-auto max-w-9xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                <ol role="list"
                    class="overflow-hidden rounded-md lg:flex lg:rounded-none lg:border-l lg:border-r lg:border-gray-200">
                @foreach ($subfeaturesArray as $index => $subfeature)
                <li class="relative overflow-hidden lg:flex-1">
                    <div class="border border-gray-200 overflow-hidden border-b-0 rounded-t-md lg:border-0">
                        <x-next-step-stepper-component index={{ $index+1 }}
                            link="/property/{{ Session::get('property_uuid') }}/rfp/{{ $accountpayable->id }}/step-{{ $index+1 }}"
                            subfeature="{{ $subfeature }}" />
                        @include('layouts.separator')
                    </div>
                </li>
                @endforeach
                </ol>
            </nav>
            <h1 class="py-12 font-light text-gray-800 text-2xl text-center">This step has been approved.</h1>
            <div class="flex justify-center items-center">
                <img src="{{ asset('/brands/approved.png') }}" class="w-48">
            </div>

            <div class="mx-auto py-12 flex justify-center space-x-7 items-center">
            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/rfp'">
                Go Back
            </x-button>

            </div>
        </div>
</x-new-layout>
