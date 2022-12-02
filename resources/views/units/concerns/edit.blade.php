<x-new-layout>
    @section('title', $unit->unit.' | '.Session::get('property_name'))

    @livewire('unit-concern-edit-component', ['concern_details' => $concern])
</x-new-layout>