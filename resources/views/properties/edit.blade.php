<x-new-layout-base>
    @section('title', 'Edit | '. $property_details->property)

    @livewire('property-edit-component', ['property_details' => $property_details])
</x-new-layout-base>
