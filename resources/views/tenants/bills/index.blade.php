<x-new-layout>
    @section('title','Bills | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('tenant-bill-create-component', ['tenant'=> $tenant])
        </div>
    </div>
    @include('modals.create-tenant-bill')
    @include('modals.export-tenant-bill')
    @include('modals.send-tenant-bill')
    @include('modals.create-particular')
</x-new-layout>