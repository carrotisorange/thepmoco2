<x-new-layout>
    @section('style')
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js">
    </script>
    @endsection


    @section('title','Dashboard | '. env('APP_NAME'))

    @livewire('property-show-component')
</x-new-layout>
