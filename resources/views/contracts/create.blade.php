<x-index-layout>
    @section('title', '| Contract')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Contract</li>
    </x-slot>
    <x-slot name="options">
        @if(Session::get('tenant_uuid') && !Session::get('owner_uuid'))
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Select another unit
        </x-button>
        @endif
    </x-slot>
    @livewire('contract-component', ['unit' => $unit, 'tenant' => $tenant])
</x-index-layout>