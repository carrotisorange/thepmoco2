<x-new-layout-base>
    @section('title', 'Success | '. env('APP_NAME'))

    @livewire('property-create-success-component', ['property' => $property])
</x-new-layout-base>


