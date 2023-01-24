<x-new-layout>
    @section('title','Bills | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('owner-bill-component', ['owner'=> $owner])
        </div>
    </div>
    @include('modals.create-owner-bill')
    @include('modals.create-particular')
    @include('modals.export-owner-bill')
    @include('modals.send-owner-bill')
</x-new-layout>
