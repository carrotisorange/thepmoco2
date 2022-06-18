<x-index-layout>
    @section('title', '|'. $unit->unit)
    <x-slot name="labels">
        Create
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Go back to unit
        </x-button>
        <x-button onclick="window.location.href='/tenant_sheet/export'">Download Tenant Sheet
        </x-button>
    </x-slot>
    @livewire('old-tenant-component', ['unit' => $unit])
</x-index-layout>