<x-new-layout>
    @section('title','Cashflow | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @can('accountreceivable')
            @include('admin.restrictedpages.accountreceivable')
            @else
            @livewire('cashflow-index-component')
            @endcan
        </div>
    </div>
</x-new-layout>