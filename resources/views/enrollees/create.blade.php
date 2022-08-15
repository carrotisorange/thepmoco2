<x-index-layout>
    @section('title', '| Enrollee')
    <x-slot name="labels">
        {{ $unit->unit }} / {{ $owner->owner }} / Enrollee
    </x-slot>

    <x-slot name="options">
        
    </x-slot>

    @livewire('enrollee-component', ['unit' => $unit, 'owner' => $owner])

</x-index-layout>