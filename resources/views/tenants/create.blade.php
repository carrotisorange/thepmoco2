<x-index-layout>
    @section('title', ' | '. $unit->unit)
    <x-slot name="labels">
       <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Tenant Information Sheet</li>
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Select another unit
        </x-button>
        <x-button onclick="window.location.href='create/export'">Download Tenant Sheet
        </x-button>
    </x-slot>
    @livewire('tenant-component', ['unit' => $unit])
</x-index-layout>