<x-index-layout>
    @section('title', '| Contracts')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $tenant->tenant }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Contracts</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}'">
            Go back to tenant
        </x-button>

        <x-button onclick="window.location.href='units'">
            Add a new contract
        </x-button>

    </x-slot>
    @include('admin.tables.contracts')
</x-index-layout>
@include('tenants.contracts.create')
@include('modals.popup-error-modal')