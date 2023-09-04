<x-new-layout>
    @section('title','Concerns | '. Session::get('property'))

    @livewire('concern-edit-component', ['concern_details' => $concern])
</x-new-layout>