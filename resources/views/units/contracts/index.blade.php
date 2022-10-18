<x-index-layout>
    @section('title', '| Contracts')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Contracts</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back to unit </x-button>
    </x-slot>

    @include('admin.tables.contracts')

</x-index-layout>