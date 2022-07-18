<x-index-layout>
    @section('title', 'Select a plan | The Property Manager')

    @section('styles')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @endsection
    <x-slot name="labels">
        Select a plan
    </x-slot>
    <x-slot name="options">
        @auth
           <x-button onclick="window.location.href='/reset/plan'">Select another plan</x-button> 
        @else
            <x-button onclick="window.location.href='{{ url()->previous() }}'">Select  another plan</x-button>
        @endauth

    </x-slot>
    <div class="container p-6 mx-auto">
       @livewire('checkout-component', ['plan_id' => $plan_id,'checkout_option' => $checkout_option])
    </div>

</x-index-layout>