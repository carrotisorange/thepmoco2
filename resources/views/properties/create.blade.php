<x-index-layout>
    @section('title', '| Properties')
    <x-slot name="labels">
        Create
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='/properties'">
            Go back to main
        </x-button>
    </x-slot>
    @livewire('property-component', ['types' => $types])
</x-index-layout>