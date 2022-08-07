<x-index-layout>
    @section('title', '| Banks')
    <x-slot name="labels">
        {{ $unit->unit }} / {{ $owner->owner }} / Bank
    </x-slot>

    <x-slot name="options">
        @if($unit->unit)
        <x-button onclick="window.location.href='/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/representative/{{ Str::random(8) }}/create'">
            Next
        </x-button>
        @else
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Go back to owner
        </x-button>
        @endif
    </x-slot>

    @livewire('bank-component', ['unit' => $unit, 'owner' => $owner])

</x-index-layout>