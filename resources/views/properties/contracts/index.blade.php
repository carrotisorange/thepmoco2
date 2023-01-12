<x-new-layout>
    @section('title','Contracts | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @can('contract')
            @include('admin.restrictedpages.contract')
            @else
            @livewire('contract-index-component')
            @endcan
        </div>
    </div>
</x-new-layout>

