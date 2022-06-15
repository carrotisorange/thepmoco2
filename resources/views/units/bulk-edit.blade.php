<x-app-layout>
    @section('title', '| Units | Edit',)
    @livewire('unit-component', ['batch_no' => $batch_no])
    @include('utilities.create-unit-modal')
    @include('utilities.create-building-modal');
</x-app-layout>