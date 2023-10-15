<x-new-layout-base>
    @section('title', 'Edit Documents | '. env('APP_NAME'))

    @livewire('property-edit-document-component', ['property_details' => $property_details])
</x-new-layout-base>
