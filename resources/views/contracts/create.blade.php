<x-index-layout>
    @section('title', '| Contract')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Contract</li>
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Select another unit
        </x-button>
    </x-slot>
    @livewire('contract-component', ['unit' => $unit, 'tenant' => $tenant])
</x-index-layout>
