<x-index-layout>
    @section('title', '| Payments')
    <x-slot name="labels">
       <li class="text-gray-500">{{ $tenant->tenant }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Payments</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/collection/{{ $batch_no }}'">Go back to bills
        </x-button>
    </x-slot>

    @livewire('collection-edit-component', ['collections' => $collections,'tenant' => $tenant,'batch_no' => $batch_no])
    
</x-index-layout>