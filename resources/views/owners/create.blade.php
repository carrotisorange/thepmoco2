<x-index-layout>
    @section('title', '| Units')
    <x-slot name="labels">
        {{ $unit->unit }} / Owner 
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back to units
        </x-button>
    </x-slot>

    @livewire('owner-component', ['unit' => $unit])

</x-index-layout>