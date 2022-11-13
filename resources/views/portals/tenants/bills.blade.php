<x-tenant-portal-layout>
    @section('title', 'Bills')
   @livewire('tenant-portal-bill-component', ['tenant' => $tenant])
</x-tenant-portal-layout>