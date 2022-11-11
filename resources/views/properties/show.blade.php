<x-new-layout>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script> --}}

        <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js">
        </script>

    @section('title','Dashboard | '. $property->property)

    @livewire('property-show-component', ['property' => $property])
</x-new-layout>