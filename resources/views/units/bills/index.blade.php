<x-index-layout>
    @section('title', '| '.$unit->unit)
    <x-slot name="labels">
        <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Bills</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Go back
        </x-button>
    </x-slot>
    @include('tables.bills')
</x-index-layout>