<x-new-layout>
    @section('title','Deed Of Sale | '. Session::get('property_name'))
    @livewire('deedofsale-edit-component', ['deedOfSalesDetails' => $deedOfSale])
</x-new-layout>