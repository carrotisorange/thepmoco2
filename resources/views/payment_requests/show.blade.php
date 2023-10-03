<x-new-layout>
    @section('title','Verify Payments | '. env('APP_NAME'))
    <div class="mt-8">
        @livewire('show-payment-request-component', ['paymentRequest' => $paymentRequest])
    </div>
</x-new-layout>