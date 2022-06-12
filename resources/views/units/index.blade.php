<x-index-layout>
    @section('title', '| Units')
    <x-slot name="labels">
        Units
    </x-slot>

    <x-slot name="options">
        @can('admin')
        {{-- <x-button title="configure contract" data-modal-toggle="configure-contract-modal"><i
                class="fa-solid fa-edit"></i>&nbsp
            Contract
        </x-button> --}}
        @if(!Session::get('tenant_uuid'))
        <x-button title="view in table form"
            onclick="window.location.href='/property/{{ Session::get('property') }}/units/masterlist'"> Masterlist
        </x-button>
        @endif
        <x-button onclick="window.location.href='/units/{{ Str::random(8) }}/edit'">Edit Units
        </x-button>
        {{-- <x-button title="add new units" data-modal-toggle="create-unit-modal">Create a unit
        </x-button> --}}

        @endcan
    </x-slot>
    @livewire('unit-index-component')
    @include('utilities.create-unit-modal')
    @include('utilities.configure-contract-modal')
</x-index-layout>