<x-new-layout>
    @section('title','Concerns | '. Session::get('property'))

    @livewire('tenant-concern-edit-component', ['concern_details' => $concern])
</x-new-layout>