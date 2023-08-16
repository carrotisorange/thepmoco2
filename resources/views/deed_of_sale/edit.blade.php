<x-new-layout>
    @section('title','Deed Of Sale | '. Session::get('property'))
    @livewire('deed-of-sale-edit-component', ['deedOfSalesDetails' => $deedOfSale])
</x-new-layout>