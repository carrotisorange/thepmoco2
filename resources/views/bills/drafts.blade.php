<x-new-layout>
    @section('title','Bills | '. Session::get('property_name'))

    @livewire('bill-draft-component', ['batch_no'=> $batch_no, 'property_uuid' => $property_uuid])
</x-new-layout>