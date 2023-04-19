<x-new-layout>
    @section('title', $unit->unit.' | '.Session::get('property_name'))

    @livewire('unit-inventory-upload-image-component',['unit'=> $unit, 'unit_inventory' => $unit_inventory])
</x-new-layout>