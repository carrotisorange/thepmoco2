<x-new-layout-base>
    @section('styles')
    <style>
        #footer {
            color: black;
        }
    </style>
    @endsection

    <html class="h-full w-full bg-cover" style="background-image: url('/brands/createprop.png');">

    @livewire('property-create-component')

</x-new-layout-base>
