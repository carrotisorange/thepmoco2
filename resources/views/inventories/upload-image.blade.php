<x-new-layout>
    @section('title', $unit->unit.' | '.Session::get('property'))

    @livewire('unit-inventory-upload-image-component',['unit'=> $unit, 'unit_inventory' => $unit_inventory])
</x-new-layout>