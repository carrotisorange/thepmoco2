<x-new-layout>
    @section('title','Deed Of Sales | '. Session::get('property_name'))
    @livewire('deed-of-sale-edit-component', ['deedOfSale' => $deedOfSale])
    {{-- @livewire('deed-of-sale-edit-component', ['deedOfSale' => $deedOfSale]) --}}
</x-new-layout>