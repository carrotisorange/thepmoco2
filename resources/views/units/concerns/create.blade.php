<x-new-layout>
    @section('title', $unit->unit.' | '.Session::get('property_name'))

    @livewire('unit-concern-create-component', ['unit' => $unit])

</x-new-layout>