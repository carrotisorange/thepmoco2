<x-new-layout-base>
    @section('title', 'Edit | '. env('APP_NAME'))

    @livewire('property-edit-component', ['property_details' => $property_details])
</x-new-layout-base>
