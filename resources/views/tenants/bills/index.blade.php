<x-index-layout>
    @section('title', '| Bills')

    <x-slot name="labels">
        <li class="text-gray-500">{{ $tenant->tenant }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Bills</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}'">Go back to tenant
        </x-button>
        @can('treasury')
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/collections'">View Payments
        </x-button>
        @endcan
    </x-slot>

    @livewire('tenant-bill-component', ['tenant'=> $tenant])

</x-index-layout>
@include('utilities.create-bill-modal')
@include('utilities.export-bill-modal')
@include('utilities.send-bill-modal')
@include('utilities.create-collection-modal')
@include('utilities.create-particular-modal');