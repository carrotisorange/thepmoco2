<x-index-layout>
    @section('title', '| Guardians')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Guardian</li>
    </x-slot>

    <x-slot name="options">
     
    </x-slot>

    @livewire('guardian-component', ['unit' => $unit, 'tenant' => $tenant])

</x-index-layout>