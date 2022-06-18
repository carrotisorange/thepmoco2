<x-index-layout>
    @section('title', '| Guardians')
    <x-slot name="labels">
        {{ $unit->unit }} / {{ $tenant->tenant }} / Guardians
    </x-slot>

    <x-slot name="options">
        @if($unit->unit)
        <x-button wire:submit.prevent="submitForm"
            onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/reference/{{ Str::random(8) }}/create'">
            Next
        </x-button>
        @else
        <x-button wire:submit.prevent="submitForm" onclick="window.location.href='/tenant/{{ $tenant->uuid }}/edit'">
            Go back to tenant
        </x-button>
        @endif
    </x-slot>

    @livewire('guardian-component', ['unit' => $unit, 'tenant' => $tenant])

</x-index-layout>