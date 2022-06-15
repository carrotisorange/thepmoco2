<x-index-layout>
    @section('title', '| Properties')
    <x-slot name="labels">
        Create
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Go back
        </x-button>
    </x-slot>
    @livewire('property-component', ['types' => $types])
</x-index-layout>