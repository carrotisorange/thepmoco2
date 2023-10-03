<x-new-layout>
    @section('title','Bills | '. env('APP_NAME'))

    @livewire('bill-draft-component', ['batch_no'=> $batch_no, 'property_uuid' => $property_uuid])
</x-new-layout>