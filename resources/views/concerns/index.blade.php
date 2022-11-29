<x-new-layout>
    @section('title','Concerns | '. Session::get('property_name'))
    @can('concern')
    @include('admin.restrictedpages.concern')
    @else
    @livewire('concern-index-component')
    @endcan
</x-new-layout>