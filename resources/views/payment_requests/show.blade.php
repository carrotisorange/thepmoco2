<x-new-layout>
    @section('title','Verify Payments | '. Session::get('property'))
    <div class="mt-8">
        @livewire('show-payment-request-component', ['paymentRequest' => $paymentRequest])
    </div>
</x-new-layout>