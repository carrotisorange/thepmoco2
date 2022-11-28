<x-new-layout>
    @section('title', $tenant_details->tenant. ' | '. Session::get('property_name'))
    @livewire('tenant-edit-component', ['tenant_details' => $tenant_details])
</x-new-layout>