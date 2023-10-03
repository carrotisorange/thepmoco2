<x-new-layout>
    @section('title', $unit->unit.' | '. env('APP_NAME'))

    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $unit->unit }} /
                        Bills / {{ $type }}</h1>
                </div>
            </div>
            @livewire('unit-bill-create-component', ['property' => $property, 'unit' => $unit, 'type' => $type,
            'utility' => $utility])
        </div>
    </div>
</x-new-layout>