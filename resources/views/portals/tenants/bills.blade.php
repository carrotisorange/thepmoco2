<x-tenant-portal-layout>
    @section('title', 'Bills | '. env('APP_NAME'))
   @livewire('tenant-portal-bill-component', ['tenant' => $tenant])
</x-tenant-portal-layout>