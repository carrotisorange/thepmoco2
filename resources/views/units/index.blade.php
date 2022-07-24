<x-index-layout>
    @section('title', '| Units')
    <x-slot name="labels">
        Units
    </x-slot>

    <x-slot name="options">
        @can('admin')
            @if(!Session::get('tenant_uuid') && !Session::get('owner_uuid'))
            <x-button title="view in table form"
                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/masterlist'"> Masterlist
            </x-button>
            <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ Str::random(8) }}/edit'">
                Create/Edit Units
            </x-button>
            @else
            <x-button 
                onclick="window.location.href='{{ url()->previous() }}'"> Go back
            </x-button>
            @endif
        @endcan
    </x-slot>
    @livewire('unit-index-component')
    @include('utilities.create-unit-modal')
    @include('utilities.configure-contract-modal')
</x-index-layout>