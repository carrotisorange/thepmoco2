<x-new-layout>
    @section('title', 'Concern | '.Session::get('property'))

    @livewire('concern-edit-component', ['concern_details' => $concern])
</x-new-layout>