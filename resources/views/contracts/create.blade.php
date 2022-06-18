<x-index-layout>
    @section('title', '| Contract')
    <x-slot name="labels">
        {{ $unit->unit }} / {{ $tenant->tenant }} /  Contract
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Go back
        </x-button>
    </x-slot>
    @livewire('contract-component', ['unit' => $unit, 'tenant' => $tenant])
</x-index-layout>
