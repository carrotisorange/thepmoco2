<x-new-layout>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
        integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>

    @section('title','Dashboard | '. Session::get('property_name'))

    @livewire('property-dashboard-component', ['property' => $property])
</x-new-layout>