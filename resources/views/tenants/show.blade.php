<x-index-layout>
    @section('title', ' | '.$tenant_details->tenant)
    <x-slot name="labels">
        {{ $tenant_details->tenant}}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/tenant/{{ $tenant_details->uuid }}/user'">
            Generate Credentials
        </x-button>
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant'">Go back
            to tenants
        </x-button>
    </x-slot>


    @livewire('tenant-edit-component', ['tenant_details' => $tenant_details])

    @include('modals.create-guardian-modal')
    @include('modals.create-reference-modal')

</x-index-layout>