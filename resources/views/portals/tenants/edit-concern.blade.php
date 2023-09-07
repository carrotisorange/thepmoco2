<x-tenant-portal-layout>
    @section('title', 'Concerns')

    @livewire('concern-edit-component', ['concern_details' => $concern])
</x-tenant-portal-layout>