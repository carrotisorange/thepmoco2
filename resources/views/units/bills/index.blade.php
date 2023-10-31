<x-new-layout>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $unit->unit }} /
                        Bills</h1>
                </div>

                <x-form-button onclick="window.location.href='{{ url()->previous() }}'">
                    Go back</a></x-form-button>

            </div>
            @include('tables.bills')
</x-new-layout>
