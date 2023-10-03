<x-new-layout>
    @section('title', $unit->unit.' | '. env('APP_NAME'))

    @livewire('unit-concern-create-component', ['unit' => $unit])

</x-new-layout>