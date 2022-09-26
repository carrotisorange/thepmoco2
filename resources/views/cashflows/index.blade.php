<x-new-layout>
    @section('title','Cashflow | '. Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        @livewire('cashflow-index-component')
    </div>
</x-new-layout>