<x-new-layout>
    @section('title','Bills | '. Session::get('property_name'))
    @can('bill')
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('bill-index-component', ['active_contracts' => $active_contracts, 'active_tenants' =>
            $active_tenants,
            'batch_no' => $batch_no])
        </div>
    </div>
    @include('modals.create-particular-modal')
    @include('modals.create-express-bill')
    @include('modals.create-customized-bill')
</x-new-layout>