<x-new-layout>
    @section('title','Bills | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('tenant-bill-create-component', [
                'tenant'=> $tenant,
                'property' => $property
            ])
        </div>
    </div>

</x-new-layout>