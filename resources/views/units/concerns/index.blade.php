<x-new-layout>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $unit->unit }} /
                        Concerns</h1>
                </div>
                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}'">
                    Go back
                    </a></x-button>

            </div>
            @include('tables.concerns')
</x-new-layout>
