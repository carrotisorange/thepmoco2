<x-new-layout-base>
    @section('styles')
    <style>
        #footer {
            color: black;
        }
    </style>
    @endsection

    @section('title','Getting Started | Step 1 of 4' )

    <html class="h-full w-full bg-cover" style="background-image: url('/brands/createprop.png');">
    @livewire('property-create-component')

</x-new-layout-base>