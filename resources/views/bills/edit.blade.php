<x-index-layout>
    @section('title', '| Bills')
    <x-slot name="labels">
        <li class="text-gray-500">
            Customized Bills
        <li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/bill'">Go back to bills</x-button>
    </x-slot>

    @livewire('bill-edit-component', ['batch_no' => $batch_no])
</x-index-layout>
