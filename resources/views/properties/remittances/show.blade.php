<x-new-layout>
    @section('title',Session::get('property').' '.' | Unit '. $unit->unit)
    @livewire('remittance-show-component',['unit' => $unit])
</x-new-layout>