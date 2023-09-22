<x-new-layout>
    @section('title', $unit->unit.' | '. env('APP_NAME'))

    @livewire('unit-inventory-upload-image-component',['unit'=> $unit, 'unit_inventory' => $unit_inventory])
</x-new-layout>