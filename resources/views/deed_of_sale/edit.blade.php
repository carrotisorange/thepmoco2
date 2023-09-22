<x-new-layout>
    @section('title','Deed Of Sale | '. env('APP_NAME'))
    @livewire('deed-of-sale-edit-component', ['deedOfSalesDetails' => $deedOfSale])
</x-new-layout>