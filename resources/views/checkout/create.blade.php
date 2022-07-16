<x-index-layout>
    @section('title', 'Select a plan | The Property Manager')

    @section('styles')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @endsection
    <x-slot name="labels">
        Select a plan
    </x-slot>
    <x-slot name="options">
        {{-- <x-button data-modal-toggle="create-particular-modal">
            Create a Particular
        </x-button> --}}
    </x-slot>
    <div class="container p-12 mx-auto">
       @livewire('checkout-component')
    </div>

</x-index-layout>