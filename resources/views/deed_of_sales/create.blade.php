<x-index-layout>
    @section('title', '| Deed of Sale')
    <x-slot name="labels">
        {{ $unit->unit }} / {{ $owner->owner }} / Deed of Sales
    </x-slot>

    <x-slot name="options">
        @if(Session::get('owner_uuid'))
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Select another unit
        </x-button>
        @endif
    </x-slot>

    @livewire('deed-of-sale-component', ['unit' => $unit, 'owner' => $owner])

</x-index-layout>