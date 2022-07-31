<x-checkout-base-component>
    @section('title', 'Checkout | The Property Manager')

    @section('styles')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @endsection


    <div class="container px-4 -mx-auto">
        @livewire('checkout-component', ['plan_id' => $plan_id,'checkout_option' => $checkout_option, 'discount_code' =>
        $discount_code])
    </div>
</x-checkout-base-component>

{{-- <x-index-layout>
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
        <x-button onclick="window.location.href='/select-a-plan'">Switch plan</x-button>
    </x-slot>


</x-index-layout> --}}