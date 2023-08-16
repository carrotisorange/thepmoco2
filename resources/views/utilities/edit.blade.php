<x-new-layout>
    @section('title','Utilities | '. Session::get('property'))

    @livewire('utility-edit-component', ['batch_no'=> $batch_no, 'option' => $option])
</x-new-layout>