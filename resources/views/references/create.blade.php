<x-index-layout>
    @section('title', '| References')
    <x-slot name="labels">
        {{ $unit->unit }} / {{ $tenant->tenant }} / References
    </x-slot>

    <x-slot name="options">
        @if($unit->unit)
        <x-button wire:submit.prevent="submitForm"
            onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/create'">
            Next
        </x-button>
        @else
        <x-button wire:submit.prevent="submitForm" onclick="window.location.href='/tenant/{{ $tenant->uuid }}/edit'">
            Go back to tenant
        </x-button>
        @endif
    </x-slot>

    @livewire('reference-component', ['unit' => $unit, 'tenant' => $tenant])

</x-index-layout>