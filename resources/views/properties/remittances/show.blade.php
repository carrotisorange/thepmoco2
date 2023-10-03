<x-new-layout>
    @section('title','Unit '. $unit->unit.' | '. env('APP_NAME'))
    @livewire('remittance-show-component',['unit' => $unit])
</x-new-layout>