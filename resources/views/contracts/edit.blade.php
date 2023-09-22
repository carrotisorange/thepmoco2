<x-new-layout>
    @section('title','Contracts | '. env('APP_NAME') )
    @livewire('contract-edit-component', ['contract_details' => $contract])
</x-new-layout>