<x-index-layout>
    @section('title', 'Select a plan | The Property Manager')

    @section('styles')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @endsection
    <x-slot name="labels">
        @if($checkout_option == '1')
            Promo Plan
        @else
            Regular Plan
        @endif
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='/select-a-plan'">Select another plan</x-button>
    </x-slot>
    <div class="container p-6 mx-auto">
        @livewire('checkout-component', ['plan_id' => $plan_id,'checkout_option' => $checkout_option])
    </div>

</x-index-layout>