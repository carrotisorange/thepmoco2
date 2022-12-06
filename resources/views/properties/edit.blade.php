<x-new-layout-base>
    @section('title', 'Edit Property | The Property Manager')

    <div class="mx-auto px-12 md:w-1/2 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
        <div>
            <h3 class="text-3xl leading-6 font-medium text-gray-900">{{ $property_details->property }} / Edit</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500"></p>
        </div>
        @livewire('property-edit-component', ['property_details' => $property_details])
    </div>
    </div>
</x-new-layout-base>