<x-index-layout>
    @section('title', '| '.$owner_details->owner)
    <x-slot name="labels">
        {{ $owner_details->owner }}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">Go back
        </x-button>
    </x-slot>

    @livewire('owner-edit-component', ['owner_details' => $owner_details])

</x-index-layout>