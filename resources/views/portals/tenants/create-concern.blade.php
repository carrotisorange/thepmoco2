<x-tenant-portal-layout>
    @section('title', 'Concerns | '. env('APP_NAME'))

    @livewire('portal-tenant-concern-component', ['user' => $user])
    
</x-tenant-portal-layout>