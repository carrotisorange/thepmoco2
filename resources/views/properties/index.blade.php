<x-new-layout-base>
    @section('title', 'Portfolio | '. env('APP_NAME'))

    @livewire('property-index-component')

    {{-- @include('modals.tech-support') --}}

</x-new-layout-base>
