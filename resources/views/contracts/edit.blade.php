<x-new-layout>
    @section('title','Contracts | '. Session::get('property_name'))
    @livewire('contract-edit-component', ['contract_details' => $contract])
</x-new-layout>
