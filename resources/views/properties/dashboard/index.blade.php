<x-new-layout>

    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js">
    </script>

    @section('title','Dashboard | '. $property->property)

    @livewire('property-show-component', ['property' => $property])
</x-new-layout>