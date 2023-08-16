<x-new-layout>
    @section('title','Contracts | '. Session::get('property'))
    @livewire('contract-edit-component', ['contract_details' => $contract])
</x-new-layout>