<x-new-layout>
    @section('title','Concerns | '. Session::get('property_name'))

    @livewire('tenant-concern-edit-component', ['concern_details' => $concern])
</x-new-layout>