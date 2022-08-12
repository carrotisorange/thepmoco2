<x-index-layout>
    @section('title', ' | '.$unit_details->unit)
    <x-slot name="labels">
        {{ $unit_details->unit }}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/unit'">Go back to
            units
        </x-button>
        <x-button data-modal-toggle="add-building-modal">Create a building
        </x-button>

    </x-slot>
    
    @livewire('unit-edit-component', ['unit_details' => $unit_details])

</x-index-layout>