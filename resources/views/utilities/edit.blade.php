<x-new-layout>
    @section('title','Utilities | '. env('APP_NAME'))

    @livewire('utility-edit-component', ['batch_no'=> $batch_no, 'option' => $option])
</x-new-layout>