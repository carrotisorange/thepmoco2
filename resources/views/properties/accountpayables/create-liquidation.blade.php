<x-new-layout>
    @section('title','Account Payables | '. $property->property)
    @livewire('create-account-payable-liquidation-step1-component', ['property'=> $property, 'accountpayable' => $accountpayable])
</x-new-layout>