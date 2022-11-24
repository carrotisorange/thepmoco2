<x-new-layout>
    @section('title','Utilities | '. Session::get('property_name'))

    @livewire('utility-edit-component', ['batch_no'=> $batch_no])
</x-new-layout>