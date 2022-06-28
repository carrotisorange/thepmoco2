<x-index-layout>
    @section('title', '| Leasing')
    <x-slot name="labels">
        {{ $unit->unit }} / {{ $owner->owner }} / Management Agreement
    </x-slot>

    <x-slot name="options">
        @if($unit)
        <x-button onclick="window.location.href='/owner/{{ $owner->uuid }}/edit'">
            Skip
        </x-button>
        @else
        <x-button onclick="window.location.href='{{ url()->previous() }}/edit}}'">
            Go back to owner
        </x-button>
        @endif
    </x-slot>

    @livewire('enrollee-component', ['unit' => $unit, 'owner' => $owner])

</x-index-layout>