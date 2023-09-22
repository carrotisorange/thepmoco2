<x-index-layout>
    @section('title', $owner->owner .' | '. env('APP_NAME'))
    <x-slot name="labels">
        Enrollees
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/owner/{{ $owner->uuid }}/edit'"><i
                class="fa-solid fa-circle-arrow-left"></i>&nbsp
            Back
        </x-button>
    </x-slot>

    @include('tables.enrollees')
    @if($enrollees->count())
    @include('modals.pullout-unit')
    @endif
</x-index-layout>