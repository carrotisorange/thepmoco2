<x-index-layout>
    @section('title', '| Guardians')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Guardian</li>
    </x-slot>

    <x-slot name="options">
        @if($unit->unit)
        <x-button wire:submit.prevent="submitForm"
            onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/reference/{{ Str::random(8) }}/create'">
            Next
        </x-button>
        @else
        <x-button wire:submit.prevent="submitForm" onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}'">
            Go back to tenant
        </x-button>
        @endif
    </x-slot>

    @livewire('guardian-component', ['unit' => $unit, 'tenant' => $tenant])

</x-index-layout>