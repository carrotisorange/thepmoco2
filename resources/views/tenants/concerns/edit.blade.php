<x-new-layout>
    @section('title', $tenant->tenant.' | '.Session::get('property_name'))
   
    @livewire('tenant-concern-edit-component', ['concern_details' => $concern])
</x-new-layout>