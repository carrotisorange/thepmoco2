<x-new-layout>
    @section('title','Account Payables | '. $property->property)
    
@livewire('create-account-payable-liquidation', ['property'=> $property, 'accountpayable' => $accountpayable])

</x-new-layout>