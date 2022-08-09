<x-index-layout>
    @section('title', ' | '.$tenant_details->tenant)
    <x-slot name="labels">
        {{ $tenant_details->tenant}}
    </x-slot>

    <x-slot name="options">
        {{-- @if($tenant_details->email)
        <x-button onclick="window.location.href='/tenant/{{ $tenant_details->uuid }}/user'">Generate credentials
        </x-button>
        @endif --}}
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant'">Go back
            to tenants
        </x-button>
    </x-slot>


    @livewire('tenant-edit-component', ['tenant_details' => $tenant_details])

    @include('utilities.create-guardian-modal')
    @include('utilities.create-reference-modal')

</x-index-layout>