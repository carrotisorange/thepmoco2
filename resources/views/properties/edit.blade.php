<x-index-layout>
    @section('title', '| '.$property_details->property)
    <x-slot name="labels">
        Edit
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back 
        </x-button>
        <x-button onclick="window.location.href='/property/{{ Str::random(10) }}/create'">Create a new property
        </x-button>
    </x-slot>
    @livewire('property-edit-component', ['property_details' => $property_details])
</x-index-layout>