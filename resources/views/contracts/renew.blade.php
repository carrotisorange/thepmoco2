<x-index-layout>
    @section('title', '| Teams')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $contract_details->unit->unit }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">{{ $contract_details->tenant->tenant }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Renew Contract</li>
    </x-slot>

    <x-slot name="options">
        <x-button wire:submit.prevent="submitForm" onclick="window.location.href='{{ url()->previous() }}'">
            Go Back
        </x-button>
    </x-slot>

    @livewire('renew-contract-component', ['contract_details' => $contract_details])

</x-index-layout>